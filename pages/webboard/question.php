<?php
// โค้ดเละเกินขอคอมเม้นต์เป็นภาษาไทย
$FrameContent = import('./components/FrameContent');
$CreateAnswer = import('./components/board/CreateAnswer');
$ShowBoardDetail = import('./components/board/ShowBoardDetail');
$title = import('nexit/title');
$DeleteAnswer = import('./components/board/DeleteAnswer');

$Question = function () use ($FrameContent, $CreateAnswer, $ShowBoardDetail, $title, $DeleteAnswer) {
    $message = ''; // เก็บการแจ้งเตือนสถานะต่างๆ
    // เช็คค่า q_id ห้ามหายห้ามขาด
    if(!isset($_GET['q_id']) || empty($_GET['q_id'])) {
        header('Location: /webboard');
    }
    // เมื่อมีการเพิ่มคำตอบ 
    if(isset($_POST['submit'])) {
        // เช็คการ login ถ้ายังไม่ได้ login จะมีการแจ้งเตือน
        if(isset($_SESSION['member'])) {
            $CreateAnswer(); 
        } else {
            $message = '<div class="alert alert-danger text-center">กรุณาเข้าสู่ระบบเพื่อเพิ่มคำตอบ</div>';
        }
        // ฟังค์ชั่นการทำงานเกี่ยวกับการเพิ่มคำตอบ จากนั้นก็ปล่อยให้ทำงานในขั้นต่อไป
        // โดยไม่ต้องมีการหยุด
    }
    $db = new Database; // สร้างคลาส database เพื่อใช้งาน method ต่างๆ
    $Board = $db->getBoard_BYID($_GET['q_id']); // ดึงข้อมูลคำถาม
    // check not found Board
    if(!$Board) { // เช็ค ว่าเจอไหม ถ้าไม่มันก็ไม่มีอะไรโชว์ งั้นก็โชว์หน้า error ไป
        return $FrameContent('<div class="alert alert-danger text-center my-3">ไม่พบคำถาม</div>');
    }
    $mem_ask = $db->getMemberInfo($Board['web_mem_id']);
    $Delete = '';
    // ถ้าผู้เข้าชมเป็นเจ้าของคำถาม
    if($Board && isset($_SESSION['member']) && $Board['web_mem_id'] == $_SESSION['member'] || (isset($_SESSION['status']) && $_SESSION['status'] == 'admin')) {
        // แก้ไขคำถาม เลยต้องมีการเช็คเยอะ
        // เช็ค saveEdit เพื่อบอกว่าเป็นการแก้ไข
        // เช็คค่าอัพเดท ป้องกันข้อมูลว่าง
        if(isset($_POST['saveEdit']) && isset($_POST['web_name']) && !empty($_POST['web_name'])) {
            $db->updateBoardName_BYID($_GET['q_id'],$_POST['web_name'], $_SESSION['member']);
            header("Refresh:0"); // refresh หน้าใหม่เพื่อให้ข้อมูลแสดง
        }
        // โหมดการลบ
        if(isset($_POST['delete'])) {
            // ตรง if ก่อนหน้าเช็คความเป็นเจ้าของคำถามไปแล้ว งั้นไม่ต้องเช็คซ้ำ
            // ใช้ method ใน Database ลบ โดยใช้ q_id ที่ได้มีการเช็คก่อนหน้าแล้ว
            // ถึงจุดนี้ q_id จะไม่ว่างและค้นเจอแน่นอน !
            $db->deleteBoard_BYID($_GET['q_id']);
            header('Location: /webboard'); 
            // ลบแล้วก็ไม่มีอะไรให้โชว์จึงกลับไปที่หน้า โชว์คำถามทั้งหมด
            die;
        }
        // ตัวเก็บปุ่ม `ลบ` และ `แก้ไข` ในกรณีเป็นเจ้าของคำถาม จะปรากฎ
        // ซึ่งอยู่ภายใน if ที่ได้มีการตรวจความเป็นเจ้าของแล้ว
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
    /*********************หน้าแสดง หรือ แก้ไข *************************/
    // จะทำการเช็คโหมด หากเป็นแก้ไขจะโชว์ input tag สำหรับป้อนข้อมูล
    // หากไม่ใช้ โหมดแก้ไข จะเป็น div tag สำหรับโชว์เท่านั้น
    // ส่วนแรก เป็นส่วนสำหรับแก้ไข ส่วนที่สองเป็นส่วนโชว์
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
        /***************** หน้าแสดง หรือ แก้ไข *******************/

    $title($Board['web_name'] . " | Question"); // กำหนด title
    return $FrameContent(<<<HTML
    <div class="my-3">
        {$message}
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