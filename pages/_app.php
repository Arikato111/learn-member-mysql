<?php
session_start();
import("./components/Database");
$Navbar = import('./components/Navbar');

$export = function ($Component) use ($Navbar) {
    $GLOBALS['title'] = 'title';
    $content = $Component();

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
    </body>
    </html>
    HTML;
};
?>
