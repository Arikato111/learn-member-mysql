<?php
$title = import('nexit/title');
$export = function() use ($title) {
    $title("Not Found");
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger text-center m-3">Not found this page</div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    HTML;
};