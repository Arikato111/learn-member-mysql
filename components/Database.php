<?php

class Database
{
    private $conn;
    function __construct()
    {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "eldenly"
        );
    }
    public function getMemberInfo($id)
    {
        $result = $this->conn->query("SELECT * FROM member WHERE mem_id = '{$id}' LIMIT 1");
        $member = mysqli_fetch_assoc($result);
        if ($member) {
            return $member;
        } else {
            return false;
        }
    }
    public function getAllMember()
    {
        $result = $this->conn->query("SELECT * FROM member");
        $allMember = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allMember;
    }

    public function updateMember($id, $mem_name, $mem_address, $mem_date, $mem_email, $mem_tel)
    {
        $this->conn->query("UPDATE `member` 
        SET 
        `mem_name`= '{$mem_name}',
        `mem_address`='{$mem_address}',
        `mem_date`='{$mem_date}',
        `mem_email`='{$mem_email}',
        `mem_tel`='{$mem_tel}'
         WHERE mem_id = {$id}");
    }

    public function register()
    {
        $name = $_POST['mem_name'];
        $address = $_POST['mem_address'];
        $date = $_POST['mem_date'];
        $email = $_POST['mem_email'];
        $tel = $_POST['mem_tel'];
        $user = $_POST['mem_user'];
        $password = $_POST['mem_password'];

        $sql = "INSERT INTO `member`(`mem_id`, `mem_name`, `mem_address`, `mem_date`, `mem_email`, `mem_tel`, `mem_user`, `mem_password`, `mem_status`)
                VALUES (NULL,'{$name}','{$address}','{$date}','{$email}','{$tel}','{$user}','{$password}','user');";
        $this->conn->query($sql);
        header("Location: /login");
        die;
    }

    public function isUser($user)
    {
        $sql = "SELECT * FROM member WHERE mem_user = '{$user}' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    public function login($user, $passwrod)
    {
        $sql = "SELECT * FROM member WHERE mem_user  = '{$user}' AND mem_password = '{$passwrod}' LIMIT 1;";
        $result = $this->conn->query($sql);
        $user =  mysqli_fetch_assoc($result);
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }
    public function deleteMember($id)
    {
        $this->conn->query("DELETE FROM member WHERE mem_id = '{$id}'");
    }
    public function addPoll($poll_name, $poll_member_id)
    {
        $date = date('Y-m-d');

        $sql = "INSERT INTO `poll`
        (`poll_id`, `poll_name`, `poll_date`, `poll_member_id`) 
        VALUES (NULL,'{$poll_name}','{$date}','{$poll_member_id}')";
        $this->conn->query($sql);
        $result = $this->conn->query("SELECT * FROM poll ORDER BY poll_id DESC LIMIT 1");
        $poll = mysqli_fetch_assoc($result);
        return $poll['poll_id'];
    }
    public function addPollDetail($poll_id, $poll_detail_post)
    {
        $sql = "INSERT INTO `poll_detail`
        (`poll_detail_id`, `poll_id`, `poll_detail_post`, `poll_detail_count`) 
    VALUES (NULL, {$poll_id}, '$poll_detail_post', 0);";
        $this->conn->query($sql);
    }
    public function getPoll(bool $desc = false)
    {
        if ($desc) {
            $sql = "SELECT * FROM poll ORDER BY poll_id DESC";
        } else {
            $sql = "SELECT * FROM poll";
        }
        $result =  $this->conn->query($sql);
        $pollAll = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $pollAll;
    }
    public function getPoll_ByID($poll_id)
    {
        $sql = "SELECT * FROM `poll` WHERE poll_id = {$poll_id} LIMIT 1;";
        $result = $this->conn->query($sql);
        return mysqli_fetch_assoc($result);
    }
    public function getPollDetaill_ByID($poll_id)
    {
        $sql = "SELECT * FROM poll_detail WHERE poll_id = {$poll_id}";
        $result = $this->conn->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function deletePollDetail_ByID($poll_detail_id)
    {
        $sql = "DELETE FROM `poll_detail` WHERE poll_detail_id = {$poll_detail_id};";
        $this->conn->query($sql);
    }

    public function pollDetail_UP($poll_detail_id)
    {
        $sql = "UPDATE `poll_detail` SET `poll_detail_count` = `poll_detail_count`+1 WHERE poll_detail_id = {$poll_detail_id}";
        $this->conn->query($sql);
    }

    public function checkPollPost($poll_id, $mem_id)
    {
        $sql = "SELECT * FROM `poll_post` WHERE poll_poll_id = {$poll_id} AND poll_post_member_id = {$mem_id} LIMIT 1;";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            return true;
        } else {
            return false;
        }
    }
    public function pollPost_INSERT($poll_poll_id, $poll_post_member_id)
    {
        $slq = "INSERT INTO `poll_post`
        (`poll_post_id`, `poll_poll_id`, `poll_post_member_id`) 
        VALUES (NULL,'{$poll_poll_id}','{$poll_post_member_id}');";
        $this->conn->query($slq);
    }
    public function checkWebBoard_BYNAME($web_name)
    {
        $sql = "SELECT * FROM `webbord` WHERE web_name = '{$web_name}';";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            return true;
        } else {
            return false;
        }
    }
    public function createWebBoard($web_name)
    {
        $mem_id = $_SESSION['member'];
        $web_date = date("Y-m-d");
        $sql = "INSERT INTO `webbord`
        (`web_id`, `web_name`, `web_date`, `web_mem_id`) 
        VALUES (NULL,'{$web_name}','{$web_date}','{$mem_id}')";
        $this->conn->query($sql);
    }
    public function getAllBoard($desc = false)
    {
        $sort = $desc ? "ASC" : "DESC";
        $sql = "SELECT * FROM `webbord` ORDER BY web_id {$sort};";
        $result = $this->conn->query($sql);
        return mysqli_fetch_all($result, 1);
    }
    public function getBoard_BYID($web_id) {
        $sql = "SELECT * FROM webbord WHERE web_id = {$web_id} LIMIT 1;";
        $result = $this->conn->query($sql);
        $board = mysqli_fetch_assoc($result);
        return $board;
    }
    public function createBoardDetail($web_id, $web_detail_post, $web_detail_mem_id){
        $web_detail_date = date('Y-m-d');
        $sql = "INSERT INTO `webbord_detail`
            (`web_detail_id`, `web_id`, `web_detail_post`, `web_detail_date`, `web_detail_mem_id`) 
            VALUES (NULL,'{$web_id}','{$web_detail_post}','{$web_detail_date}','{$web_detail_mem_id}');";
        $this->conn->query($sql);
    }
    public function getBoardDetail_BYWEB($web_id){
        $sql = "SELECT * FROM webbord_detail WHERE web_id = {$web_id} ORDER BY web_detail_id DESC;";
        $result = $this->conn->query($sql);
        return mysqli_fetch_all($result, 1);
    }
}

$export = null;
