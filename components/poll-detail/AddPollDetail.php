<?php
$export = function () {
    if (!empty($_POST['poll_detail_post'])) {
        $poll_post = $_POST['poll_detail_post'];
        $poll_id = $_POST['poll_id'];
        $db = new Database;
        $db->addPollDetail($poll_id, $poll_post);
        return true;
    } else {
        return false;
    }
};
