<?php
$FrameContent = import('./components/FrameContent');
$CreateAnswer = import('./components/board/CreateAnswer');
$ShowBoardDetail = import('./components/board/ShowBoardDetail');

$Question = function () use ($FrameContent, $CreateAnswer, $ShowBoardDetail) {
    if(!isset($_GET['q_id']) || empty($_GET['q_id'])) {
        header('Location: /webboard');
    }
    if(isset($_POST['submit'])) {
        $CreateAnswer();
    }
    $db = new Database;
    $Board = $db->getBoard_BYID($_GET['q_id']);
    $mem_ask = $db->getMemberInfo($Board['web_mem_id']);
    if(!$Board) {
        return $FrameContent('<div class="alert alert-danger text-center my-3">ไม่พบคำถาม</div>');
    }
    return $FrameContent(<<<HTML
    <div class="my-3">
        <div class="form-control shadow-sm">
            <div class="form-control fs-4">{$Board['web_name']}</div>
            <div class="my-1">ผู้ถาม : {$mem_ask['mem_name']}</div>
            <div>เวลา : {$Board['web_date']}</div>
        </div>
        <div class="my-3">
            <form class="form-control" method="POST">
                <div class="row">
                    <div class="col-sm-10">
                        <input type="text" name="answer" class="form-control">
                        <input type="hidden" name="submit">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary">ตอบ</button>
                    </div>
                </div>
            </form>
        </div>
        {$ShowBoardDetail()}
    </div>
    HTML);
};

$export = $Question;