<?php
$export = function () {
    $message = '';
    if(isset($_POST['submit']) && isset($_POST['web_name']) && !empty($_POST['web_name'])) {
        $db = new Database;
        $checkBord = $db->checkWebBoard_BYNAME($_POST['web_name']);
        if($checkBord) {
            $message = '<div class="alert alert-danger">คำถามนี้ถูกตั้งแล้ว</div>';
        } else {
            $db->createWebBoard($_POST['web_name']);
            header('Location: /webboard');
            die;
        }

    }
    return <<<HTML
    <div class="text-end my-3 shadow-sm">
        {$message}
        <form class="form-control" method="post">
            <div class="row">
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="web_name" >
                </div>
                <div class="col-sm-4">
                    <button name="submit" class="btn btn-primary">สร้างคำถาม</button>
                </div>
            </div>
        </form>
    </div>
    HTML;
};