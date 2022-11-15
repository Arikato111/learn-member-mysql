<?php
$title = import('nexit/title');
$FrameContent = import('./components/FrameContent');
$TableInputPoll = import('./components/TableInputPoll');
$PollAnswer = import('./components/PollAnswer');

$PollPost = function () use ($PollAnswer, $FrameContent, $title, $TableInputPoll) {
    
    if(isset($_GET['poll_id'])) return $PollAnswer();
    $title("แบบสำรวจ");

    return $FrameContent(<<<HTML
    <div>
        <h1 class="text-center p-">แบบสำรวจความคิดเห็น</h1>
        {$TableInputPoll()}
    </div>
    HTML);
};

$export = $PollPost;