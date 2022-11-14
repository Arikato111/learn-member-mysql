<?php
$Logined = function () {
    $GLOBALS['title'] = 'you are now logind';
    return <<<HTML
    <main class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-success text-center mt-5">
                    You are now Logined
                </div>
                    
            </div>
            <div class="col-md-3"></div>

        </div>
    </main>
    HTML;
};

$export = $Logined;