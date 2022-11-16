<?php
$FrameContent = import('./components/FrameContent');
$title = import('nexit/title');
$AddPollDetail = import('./components/poll-detail/AddPollDetail');
$DeletePollDetail = import('./components/poll-detail/DeletePollDetail');
$ReportPollDetail = import('./components/poll-detail/ReportPollDetail');

$PollList = function () use ($FrameContent, $title, $AddPollDetail, $DeletePollDetail, $ReportPollDetail) {
    // CHECK NULL OF POLL_ID
    if (!isset($_GET['poll_id'])) {
        header("Location: /admin/poll");
        die;
    }
    // check method DELETE || ADD
    $message = "";
    if (isset($_POST['delete']))
         $message = $DeletePollDetail() 
         ? '<div class="alert alert-success text-center">ลบสำเร็จ</div>' :
           '<div class="alert alert-danger text-center">ข้อมูลไม่ถูกต้อง</div>';
    if (isset($_POST['add']))
         $message = $AddPollDetail() ? '<div class="alert alert-success text-center">เพิ่มสำเร็จ</div>' : '<div class="alert alert-danger text-center">ข้อมูลไม่ถูกต้อง</div>';
    
    $db = new Database;
    $p = $db->getPoll_ByID($_GET['poll_id']);
    // loop all polls
    $option = '';
    $op = $db->getPollDetaill_ByID($p['poll_id']);
    // choices for poll
    foreach ($op as $s_op) {
        $option .= <<<HTML
            <div class="fs-5 d-flex justify-content-around">
                <div>
                    <input type="radio" name="delete_poll_post" value="{$s_op['poll_detail_id']}"> {$s_op['poll_detail_post']}
                </div>
                <div>
                    <span class="border rounded border-secondary p-1 fs-6"> มีจำนวน {$s_op['poll_detail_count']} โหวต</span>
                </div>
            </div>
            HTML;
    }

    $title("poll config");
    return $FrameContent(<<<HTML
    <div class="my-3">
        {$message}
    <form method="POST" class="form-control my-3 shadow-sm">
        <label class="mt-3">{$p['poll_name']}</label>
        <div>
            <input type="hidden" name="poll_id" value="{$p['poll_id']}">
            <label for="">เพิ่มคำตอบ</label>
            <input class="form-control shadow-sm" type="text" name="poll_detail_post">
            <div class="text-end my-1">
                <button class="btn btn-success m-1" name="add">+ เพิ่มคำตอบ</button>
            </div>
        </div>
        <hr>
        <label for="">ลบคำตอบ</label>
        <div class="form-control my-3 shadow-sm" name="delete_poll_post" id="">
            {$option}
        </div>
        <div class="text-end">
            <button class="btn btn-danger mb-1" name="delete">ลบคำตอบที่เลือก</button>
        </div>
    </form>
    {$ReportPollDetail()}
    </div>
    HTML);
};

$export = $PollList;
