<?php 
$FrameContent = import('./components/FrameContent');
$CreateBoard = import('./components/board/CreateBoard');
$title = import('nexit/title');

$Webboard = function () use ($FrameContent, $CreateBoard, $title) {
    $title('Web board');
    if(!isset($_SESSION['member'])) {
        $CreateBoard =fn()=> "";
    }
    $db = new Database;
    $AllWebboard = $db->getAllBoard();
    $content = '';
    foreach($AllWebboard as $abb) {
        $mem_ask = $db->getMemberInfo($abb['web_mem_id']);
        $content .= <<<HTML
        <a style="text-decoration: none" href="/webboard/question?q_id={$abb['web_id']}">
            <div class="form-control my-3">
                <div class="fs-4 block">{$abb['web_name']}</div>
                <div class="text">ผู้ถาม : {$mem_ask['mem_name']}</div>
            </div>
        </a>
        HTML;
    }
    return $FrameContent(<<<HTML
        <div>
            {$CreateBoard()}            
            <table class="table table-hover border rounded">
                {$content}
            </table>
        </div>
    HTML);
};

$export = $Webboard;