<?php 

$export = function () {
    if(isset($_GET['id'])) {
        $db = new Database;
        $db->deleteMember($_GET['id']);
        header("Location: /member");
        die;
    }
    
};