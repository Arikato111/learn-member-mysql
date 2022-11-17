<?php
$EditAnswer = import('./components/board/EditAnswer');
$export = function () use($EditAnswer) {
    $db = new Database;
    $BoardDetail = $db->getBoardDetail_BYWEB($_GET['q_id']);
    if(isset($_POST['deleteAnswer']) && isset($_POST['web_detail_id'])) {
        $db->deleteBoardDetail_BYID($_POST['web_detail_id']);
        header("Refresh:0");
        die;
    }
    if(isset($_POST['editAnswer'])) return $EditAnswer();
    $content = '';
    foreach ($BoardDetail as $bd) {
        $mem_ask = $db->getMemberInfo($bd['web_detail_mem_id']);
        $SecretMenu = '';
        if (isset($_SESSION['member'])) {
            $mem_ask = $db->getMemberInfo($_SESSION['member']);
            if ($mem_ask['mem_id'] == $bd['web_detail_mem_id'] || $_SESSION['status'] == 'admin') {
                $SecretMenu = <<<HTML
            <div class="text-end">
                <form method="POST">
                    <input type="hidden" name="web_detail_id" value="{$bd['web_detail_id']}">
                    <button name="editAnswer" class="btn btn-warning">แก้ไข</button>
                    <button name="deleteAnswer" class="btn btn-danger">ลบคำตอบ</button>
                </form>
            </div>
            HTML;
            }
        }
        $content .= <<<HTML
        <div class="form-control my-3">
            <div class="form-control">{$bd['web_detail_post']}</div>
            <div class="p-1">ผู้ตอบ : {$mem_ask['mem_name']}</div>
            <div class="p-1">เวลา : {$bd['web_detail_date']}</div>

            {$SecretMenu}
        </div>
        HTML;
    }

    return $content;
};
