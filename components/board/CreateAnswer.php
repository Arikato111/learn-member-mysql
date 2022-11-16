<?php
$export = function () {
    if(isset($_POST['answer']) && !empty($_POST['answer'])) {
        $db = new Database;
        $db->createBoardDetail($_GET['q_id'], $_POST['answer'], $_SESSION['member']);
        header("Refresh:0");
    }
};
