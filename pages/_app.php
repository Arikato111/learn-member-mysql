<?php
session_start();
import('wisit-router');

import("./components/Database");
$Navbar = import('./components/Navbar');
$NotFountPage = import('./pages/_error');

$export = function ($Component) use ($Navbar, $NotFountPage) {
  $GLOBALS['title'] = 'title'; // default title

  $content = $Component();
  if(getParams(0) == 'admin') {
    // check permission
    if(!isset($_SESSION['member']) || !isset($_SESSION['status']) || $_SESSION['status'] != 'admin') {
      // if have no permission show notfound page
      $content = $NotFountPage();
    } else {
      // check admin to change navbar
      $Navbar = import('./components/admin/AdminNavbar');
    }
  }
  
  return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- <link rel="icon" href="/public/logo.svg" type="image/svg" sizes="16x16"> -->
      <title>{$GLOBALS['title']}</title>
      <link rel="stylesheet" href="/styles/bootstrap/css/bootstrap.min.css">

    </head>
    <body>
      {$Navbar()}
      {$content}
      <script src="/styles/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="/styles/script.js"></script>
    </body>
    </html>
    HTML;
};
