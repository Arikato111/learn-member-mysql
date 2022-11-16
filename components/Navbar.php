<?php 

$Navbar = function () {
    $AddminMenu = isset($_SESSION['status']) && $_SESSION['status'] == 'admin' ?
    <<<HTML
    <li class="nav-item">
        <a class="nav-link" href="/admin/">admin</a>
    </li>
    HTML: "";

    $Logined = isset($_SESSION['member']) ? '': 
        '<li class="nav-item">
             <a class="nav-link" href="/register">สมัครสมาชิก</a>
         </li>
          <li class="nav-item">
             <a class="nav-link" href="/login">เข้าสู่ระบบ</a>
          </li>';
    $LogoutDisplay = "";
    if(isset($_SESSION['member'])) {
        $db = new Database;
        $member = $db->getMemberInfo($_SESSION['member']);
        $LogoutDisplay = <<<HTML
        {$member['mem_name']} / <a class="nav-link text-danger" style="cursor:pointer" onclick="confirmLogout()"> ออกจากระบบ</a>
        HTML;
    }
    $db = new Database;
    return <<<HTML
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Elderly</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {$AddminMenu}
                    <li class="nav-item">
                        <a class="nav-link" href="/news">ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pollpost">แบบสำรวจ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webboard">กระดานสนทนา</a>
                    </li>
                        {$Logined}
                </ul>
            </div>
            {$LogoutDisplay}
        </div>
    </nav>
    HTML;
};

$export = $Navbar;