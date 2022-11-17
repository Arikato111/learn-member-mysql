<?php
$export = function () {
    $db = new Database;
    // method SAVE เพื่อทำการบันทึกข้อมูลหลังจากอัพเดท
    if(isset($_POST['save'])) {
        $db->updateBoardDetail($_POST['web_detail_id'], $_POST['web_detail_post']);
        header("Refresh: 0");
        die;
    }
    // ทำการดึงข้อมูล `คำตอบ` มาแสดงเพื่อทำการแก้ไข
    $web_detail_id = $_POST['web_detail_id']; 
    // ดึงข้อมูลผู้ใช้งานที่เป็นคนตอบคำถาม
    $mem_ask = $db->getMemberInfo($_SESSION['member']);
    // ดึงข้อมูลรายละเอียดของคำตอบ
    $bd = $db->getBoardDetail_BYID($web_detail_id);
    return <<<HTML
    <div>
        <form class="form-control" method="POST">
            <input type="hidden" name="save">
            <input type="hidden" name="editAnswer">
            <input type="hidden" name="web_detail_id" value="{$_POST['web_detail_id']}">
            <input class="form-control my-3" type="text" name="web_detail_post" value="{$bd['web_detail_post']}">
            <div class="p-1">ผู้ตอบ : {$mem_ask['mem_name']}</div>
            <div class="p-1">เวลา : {$bd['web_detail_date']}</div>

            <div class="text-end">
                <button class="btn btn-success">บันทึก</button>
                <div onclick="history.back()" class="btn btn-danger">ยกเลิก</div>
            </div>
        </form>
    </div>
    HTML;
};