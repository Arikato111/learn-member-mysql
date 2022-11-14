<?php
$export = function () {
    $db = new Database;
    $poll_id = $db->addPoll($_POST['poll_head'], $_SESSION['member']);
    $poll_detail = $_POST['poll_detail'];
    if (sizeof($poll_detail)) {
        foreach ($poll_detail as $pd) {
            $db->addPollDetail($poll_id, $pd);
        }
    }
};
