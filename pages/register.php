<?php

$title = import('nexit/title');

$export = function () use ($title) {
    if(isset($_POST['submit'])) {
        $conn = new Database;
        $conn->register();
    }

    $title("Register");
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center my-3">Elderly social system</h3>
                <h4>ระบบลงทะเบียนผู้สูงอายุ</h4>
                <form class="form-control fs-5 shadow-sm py-3" action="/register" method="post">
                    <label for="">ชื่อ - สกุล</label>
                    <input class="form-control" type="text" name="mem_name">
                    <label for="">ที่อยู่</label>
                    <textarea class="form-control" name="mem_address" id="" cols="30" rows="5"></textarea>

                    <label for="">วัน/เดือน/ปี เกิด</label>
                    <input class="form-control" type="date" name="mem_date">

                    <label for="">อีเมล์</label>
                    <input class="form-control" type="email" name="mem_email">

                    <label for="">หมายเลขโทรศัพท์</label>
                    <input class="form-control" type="number" name="mem_tel">

                    <label for="">ชื่อผู้ใช้งาน</label>
                    <input class="form-control" type="text" name="mem_user">

                    <label for="">รหัสผ่าน</label>
                    <input class="form-control" type="password" name="mem_password">

                    <label for=""></label>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="ตกลง">

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};