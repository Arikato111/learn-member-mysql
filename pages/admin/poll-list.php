<?php
$FrameContent = import('./components/FrameContent');
$title = import('nexit/title');

$PollList = function () use ($FrameContent, $title) {
    $db = new Database;
    $poll = $db->getPoll();
    // print_r($poll);
    $content = '';
    // loop all polls
    foreach ($poll as $p) {
        $option = '';
        $op = $db->getPollDetaill_ByID($p['poll_id']);
        // choices for poll
        foreach($op as $s_op) {
            $option .= "<option>{$s_op['poll_detail_post']}</option>";
        }

        // insert choices inside polll
        $content .= <<<HTML
        <div>
            <label class="mt-3">{$p['poll_name']}</label>
            <select class="form-select my-3" name="" id="">
                {$option}
            </select>
        </div>
        HTML;
    }

    $title("Show Poll");
    return $FrameContent(<<<HTML
    <form class="form-control my-3">
        $content
    </form>
    HTML);
};

$export = $PollList;