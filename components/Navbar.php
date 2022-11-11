<?php 

$Navbar = function () {
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
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ข่าวประชาสัมพันธ์</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/login?logout">Logout</a>
                </li>
            </ul>
            </div>

        </div>

    </nav>
    HTML;
};

$export = $Navbar;