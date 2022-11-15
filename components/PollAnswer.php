<?php
$FrameContent = import('./components/FrameContent');
$title = import('nexit/title');
$AddPollDetail = import('./components/poll-detail/AddPollDetail');
$DeletePollDetail = import('./components/poll-detail/DeletePollDetail');
$SaveAnswer = import('./components/SaveAnswer');

$PollList = function () use ($FrameContent, $title, $SaveAnswer) {
    if(!isset($_SESSION['member'])) return $FrameContent("<div class=\"alert alert-danger my-3 \">กรุณาเข้าสู่ระบบเพื่อใช้งานหน้านี้</div>");
    // CHECK NULL OF POLL_ID
    if (!isset($_GET['poll_id']) || empty($_GET['poll_id'])) {
        header("Location: /pollpost");
        die;
    }
    $message = "";
    $db = new Database;
    $p = $db->getPoll_ByID($_GET['poll_id']);
    $title("ตอบคำถาม | " . $p['poll_name']);

    if($db->checkPollPost($_GET['poll_id'], $_SESSION['member'])) {
        return $FrameContent("<div class=\"alert alert-success my-3 \">คุณตอบแบบสอบถามนี้เรียบร้อยแล้ว</div>");
    }

    // SaveAnswer METHO  to save the answer from member
    if(isset($_POST['answer'])) {
        $SaveAnswer();
    }

    
    // loop all polls
    $option = '';
    $op = $db->getPollDetaill_ByID($p['poll_id']);
    // choices for poll
    foreach ($op as $s_op) {
        $option .= <<<HTML
            <div class="fs-5">
                <input type="radio" name="post_detail" value="{$s_op['poll_detail_id']}"> {$s_op['poll_detail_post']}
            </div>
            HTML;
    }

    return $FrameContent(<<<HTML
    <div class="my-3">
        {$message}
    <form method="POST" class="form-control my-3 shadow-sm">
        <h3 class="mt-3">{$p['poll_name']}</h3>
        <div>
            <input type="hidden" name="poll_id" value="{$p['poll_id']}">
        </div>
        <hr>
        <div class="form-control my-3 shadow-sm" id="">
            {$option}
        </div>
        <div class="text-end">
            <button class="btn btn-success mb-1" name="answer">ส่งคำตอบ</button>
        </div>
    </form>
    </div>
    HTML);
};

$export = $PollList;
