<?php 

$Navbar = function () {
    $Logined = isset($_SESSION['member']) ? '
        <li class="nav-item">
            <a class="nav-link" href="/login?logout">Logout</a>
        </li>' 
        : 
        '<li class="nav-item">
             <a class="nav-link" href="/register">Register</a>
         </li>
          <li class="nav-item">
             <a class="nav-link" href="/login">Login</a>
          </li>
        '
        ;
    return <<<HTML
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Elderly</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link" href="/news">ข่าวประชาสัมพันธ์</a>
                </li>
                {$Logined}
            </ul>
            </div>

        </div>

    </nav>
    HTML;
};

$export = $Navbar;