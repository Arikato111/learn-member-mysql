<?php
$export =function () {
    $db = new Database;
    $BoardDetail = $db->getBoardDetail_BYWEB($_GET['q_id']);
    $content = '';
    foreach($BoardDetail as $bd) {
        $mem_ask = $db->getMemberInfo($bd['web_detail_mem_id']);
        $content .= <<<HTML
        <div class="form-control my-3">
            <div class="form-control">{$bd['web_detail_post']}</div>
            <div class="p-1">ผู้ตอบ : {$mem_ask['mem_name']}</div>
            <div class="p-1">เวลา : {$bd['web_detail_date']}</div>
        </div>
        HTML;
    }
    
    return $content;
};