<?php
$title = import('nexit/title');
$export = function () use ($title) {

    $title("admin");
    return <<<HTML
    <main class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Admin page</h1>
            </div>
            <div class="col-md-3"></div>
        </div>
    </main>
    HTML;
};