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
                <form class="form-control shadow-sm fs-5 shadow-sm py-3 mb-5" action="/register" method="post">
                    <label class="mt-3" for="">ชื่อ - สกุล</label>
                    <input class="form-control shadow-sm" type="text" name="mem_name" required>

                    <label class="mt-3" for="">ที่อยู่</label>
                    <textarea class="form-control shadow-sm" name="mem_address" id="" cols="30" rows="5" required></textarea>

                    <label class="mt-3" for="">วัน/เดือน/ปี เกิด</label>
                    <input class="form-control shadow-sm" type="date" name="mem_date" required>

                    <label class="mt-3" for="">อีเมล์</label>
                    <input class="form-control shadow-sm" type="email" name="mem_email" required>

                    <label class="mt-3" for="">หมายเลขโทรศัพท์</label>
                    <input class="form-control shadow-sm" type="number" name="mem_tel" required>

                    <label class="mt-3" for="">ชื่อผู้ใช้งาน</label>
                    <input class="form-control shadow-sm" type="text" name="mem_user" required>

                    <label class="mt-3" for="">รหัสผ่าน</label>
                    <input class="form-control shadow-sm" type="password" name="mem_password" required>

                    <label class="mt-3" for=""></label>
                    <input class="form-control shadow-sm btn btn-primary" type="submit" name="submit" value="ตกลง" >

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};