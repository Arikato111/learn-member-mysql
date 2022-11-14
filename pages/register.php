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
            <div class="col-md-3 text-end">
                <button onclick="window.history.back()" class="btn btn-outline-danger my-3">back</button>
            </div>
            <div class="col-md-6">
                <h3 class="text-center my-3">Elderly social system</h3>
                <h4>ระบบลงทะเบียนผู้สูงอายุ</h4>
                <form class="form-control fs-5 shadow-sm py-3 mb-5" action="/register" method="post">
                    <label for="">ชื่อ - สกุล</label>
                    <input class="form-control" type="text" name="mem_name" required>

                    <label for="">ที่อยู่</label>
                    <textarea class="form-control" name="mem_address" id="" cols="30" rows="5" required></textarea>

                    <label for="">วัน/เดือน/ปี เกิด</label>
                    <input class="form-control" type="date" name="mem_date" required>

                    <label for="">อีเมล์</label>
                    <input class="form-control" type="email" name="mem_email" required>

                    <label for="">หมายเลขโทรศัพท์</label>
                    <input class="form-control" type="number" name="mem_tel" required>

                    <label for="">ชื่อผู้ใช้งาน</label>
                    <input class="form-control" type="text" name="mem_user" required>

                    <label for="">รหัสผ่าน</label>
                    <input class="form-control" type="password" name="mem_password" required>

                    <label for=""></label>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="ตกลง" >

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};