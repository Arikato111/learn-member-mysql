<?php
$FrameContent = import('./components/FrameContent');
$CreateAnswer = import('./components/board/CreateAnswer');
$ShowBoardDetail = import('./components/board/ShowBoardDetail');
$title = import('nexit/title');

$Question = function () use ($FrameContent, $CreateAnswer, $ShowBoardDetail, $title) {
    if(!isset($_GET['q_id']) || empty($_GET['q_id'])) {
        header('Location: /webboard');
    }
    if(isset($_POST['submit'])) {
        $CreateAnswer();
    }
    $db = new Database;
    $Board = $db->getBoard_BYID($_GET['q_id']);
    if(!$Board) {
        return $FrameContent('<div class="alert alert-danger text-center my-3">ไม่พบคำถาม</div>');
    }
    $mem_ask = $db->getMemberInfo($Board['web_mem_id']);
    $Delete = '';
    if($Board && isset($_SESSION['member']) && $Board['web_mem_id'] == $_SESSION['member']) {
        if(isset($_POST['saveEdit']) && isset($_POST['web_name']) && !empty($_POST['web_name'])) {
            $db->updateBoardName_BYID($_GET['q_id'],$_POST['web_name'], $_SESSION['member']);
            header("Refresh:0");
        }
        if(isset($_POST['delete'])) {
            $db->deleteBoard_BYID($_GET['q_id']);
            header('Location: /webboard');
            die;
        }
        $Delete = <<<HTML
        <div class="text-end my-1">
            <form method="POST">
                <button name="edit" class="btn btn-warning">แก้ไข</button>
            </form>
        </div>
        <div class="text-end">
            <form method="post">
                <button name="delete" class="btn btn-danger">ลบคำถาม</button>
            </form>
        </div>
        HTML;
    }
    $ContentMode = isset($_POST['edit']) ? <<<HTML
    <div class="form-control shadow-sm">
        <form method="POST">
            <input class="form-control fs-4" name="web_name" value="{$Board['web_name']}">
            <div class="my-1">ผู้ถาม : {$mem_ask['mem_name']}</div>
            <div>เวลา : {$Board['web_date']}</div>
            <div class="text-end">
                <button name="saveEdit" class="btn btn-success">บันทึก</button>
                <a href="#" onclick="history.back()"><div class="btn btn-danger">ยกเลิก</div></a>
            </div>
        </form>
    </div>
    HTML : <<<HTML
    <div class="form-control shadow-sm">
        <div class="form-control fs-4">{$Board['web_name']}</div>
        <div class="my-1">ผู้ถาม : {$mem_ask['mem_name']}</div>
        <div>เวลา : {$Board['web_date']}</div>
        
        {$Delete}
    </div>
    HTML;

    $title($Board['web_name'] . " | Question");
    return $FrameContent(<<<HTML
    <div class="my-3">
        {$ContentMode}
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