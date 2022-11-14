<?php 
$export = function ($component) {
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">{$component}</div>
            <div class="col-md-3"></div>
        </div>
    </div>
    HTML;
};