<?php
$export = function () {
    if (!empty($_POST['delete_poll_post'])) {

        $db = new Database;
        $poll_detail_id = $_POST['delete_poll_post'];
        $db->deletePollDetail_ByID($poll_detail_id);
        return true;
    } else {
        return false;
    }
};
