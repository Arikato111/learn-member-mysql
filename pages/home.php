<?php
$title = import('nexit/title');
$export = function () use ($title) {

    $title("Home");
    return <<<HTML
    <main>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Home page</h1>
            </div>
            <div class="col-md-3"></div>
        </div>
    </main>
    HTML;
};