<?php 

class Database {
    private $conn;
    function __construct() {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "eldenly"
        );

    }
    public function getMemberInfo($id) {
        $result = $this->conn->query("SELECT * FROM member WHERE mem_id = '{$id}' LIMIT 1");
        $member = mysqli_fetch_assoc($result);
        if($member) {
            return $member;
        } else {
            return false;
        }
    }
    public function getAllMember() {
        $result = $this->conn->query("SELECT * FROM member");
        $allMember = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allMember;
    }

    public function updateMember($id ,$mem_name, $mem_address, $mem_date, $mem_email, $mem_tel){
        $this->conn->query("UPDATE `member` 
        SET 
        `mem_name`= '{$mem_name}',
        `mem_address`='{$mem_address}',
        `mem_date`='{$mem_date}',
        `mem_email`='{$mem_email}',
        `mem_tel`='{$mem_tel}'
         WHERE mem_id = {$id}");
    }

    public function register() {
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
        header("Location: /register");
        die;
    }

    public function isUser($user) {
        $sql = "SELECT * FROM member WHERE mem_user = '{$user}' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }

    }
    public function login($user, $passwrod) {
        $sql = "SELECT * FROM member WHERE mem_user  = '{$user}' AND mem_password = '{$passwrod}' LIMIT 1;";
    $result = $this->conn->query($sql);
        $user =  mysqli_fetch_assoc($result);
        if($user) {
            return $user;
        } else {
            return false;
        }

    }
    public function deleteMember($id) {
        $this->conn->query("DELETE FROM member WHERE mem_id = '{$id}'");
    }
    public function addPoll($poll_name, $poll_member_id) {
        $date = date('Y-m-d');
        
        $sql = "INSERT INTO `poll`
        (`poll_id`, `poll_name`, `poll_date`, `poll_member_id`) 
        VALUES (NULL,'{$poll_name}','{$date}','{$poll_member_id}')";
        $this->conn->query($sql);
        $result = $this->conn->query("SELECT * FROM poll ORDER BY poll_id DESC LIMIT 1");
        $poll = mysqli_fetch_assoc($result);
        return $poll['poll_id'];
    }
    public function addPollDetail($poll_id , $poll_detail_post) {
        $sql = "INSERT INTO `poll_detail`
        (`poll_detail_id`, `poll_id`, `poll_detail_post`, `poll_detail_count`) 
    VALUES (NULL, {$poll_id}, '$poll_detail_post', 0);";
    $this->conn->query($sql);
    }
    public function getPoll() {
        $sql = "SELECT * FROM poll";
        $result =  $this->conn->query($sql);
        $pollAll = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $pollAll;
    }
    public function getPollDetaill_ByID($poll_id) {
        $sql = "SELECT * FROM poll_detail WHERE poll_id = {$poll_id}";
        $result = $this->conn->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

$export = null; 