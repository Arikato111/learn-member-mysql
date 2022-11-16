<?php
$title = import('nexit/title');
$LoginPage = import('./pages/login');

$Home = function () use ($title, $LoginPage) {
  if(!isset($_SESSION['member'])) return $LoginPage();
  $isLogin = isset($_SESSION['member']) ? "logined": "Not login";
  $color_status = isset($_SESSION['member']) ? "success": "danger";
  
  $title('Home'); // use title function to change title
  return <<<HTML
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1>
            Welcome
          </h1>
          <div class="alert alert-{$color_status} text-center">
            {$isLogin}
          </div>
        </div>  
      </div>
      <div class="col-md-3"></div>
    </div>
    HTML;
};

$export = $Home;