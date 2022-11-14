<?php 

$Navbar = function () {
    $db = new Database;
    $member = $db->getMemberInfo($_SESSION['member']);
    return <<<HTML
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Admin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/member">รายชื่อสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/poll">สร้างแบบสอบถาม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/poll-list">รายการแบบสอบถาม</a>
                    </li>
                </ul>
            </div>
            <span class="text-white">{$member['mem_name']} / </span>
            <a class="text-danger" onclick="confirmLogout()">ออกจากระบบ</a>
        </div>
    </nav>
    HTML;
};

$export = $Navbar;