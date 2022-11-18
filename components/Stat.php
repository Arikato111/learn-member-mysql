<?php
$export = function () {
    $db = new Database;
    if (isset($_SESSION['member'])) {
        $db->State_UP($_SESSION['member']);
    }
    $allMember = $db->getAllMember();
    $total = 0;
    foreach ($allMember as $am) {
        $total += (int) $am['mem_stat'];
    }
    return "สถิติผู้ใช้งานระบบ : " .  $total;
};
