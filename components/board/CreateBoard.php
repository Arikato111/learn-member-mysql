<?php
$export = function () {
    // ส่วนสำหรับป้อนข้อมูลสร้างคำถาม ในหน้า /webboard
    $message = '';
    // เช็คโหมดว่าได้กดปุ่มหรือไม่ และเช็คข้อมูลต่างๆ ว่าถูกต้องหรือไม่
    if(isset($_POST['submit']) && isset($_POST['web_name']) && !empty($_POST['web_name'])) {
        $db = new Database; // สร้างคลาส database
        // ใช้ method เพื่อค้นหาว่า คำถามถูกถามไปแล้วหรือยัง
        $checkBord = $db->checkWebBoard_BYNAME($_POST['web_name'] . '?');
        if($checkBord) {
            // ถ้าถูกถามไปแล้ว จะแสดงข้อความแจ้งเตือน และไม่สามารถถามได้
            $message = '<div class="alert alert-danger text-center">คำถามนี้ถูกตั้งแล้ว</div>';
        } else {
            // ถ้ายังไม่ถูกถาม เพิ่มลงฐานข้อมูล
            $db->createWebBoard($_POST['web_name'] . '?');
            // ไปที่หน้า /webboard ซึ่งก็คือหน้าเดิม เพื่อ refresh ให้โชว์คำถามใหม่ที่พึ่งถาม
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