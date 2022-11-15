<?php
$export = function () {
    if(
        isset($_GET['poll_id']) && !empty($_GET['poll_id']) &&
        isset($_POST['post_detail']) && !empty($_POST['post_detail'])
    ) {

        $db = new Database;
        $db->pollPost_INSERT($_GET['poll_id'], $_SESSION['member']);
        $db->pollDetail_UP($_POST['post_detail']);
        header("Location: /pollpost");
    }
};
