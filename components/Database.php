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
        mysqli_query($this->conn, $sql);
        header("Location: /register");
        die;
    }

    public function isUser($user) {
        $sql = "SELECT * FROM member WHERE mem_user = '{$user}' LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }

    }
    public function login($user, $passwrod) {
        $sql = "SELECT * FROM member WHERE mem_user  = '{$user}' AND mem_password = '{$passwrod}' LIMIT 1;";
        $result = mysqli_query($this->conn, $sql);
        $user =  mysqli_fetch_assoc($result);
        if($user) {
            return $user;
        } else {
            return false;
        }

    }
}

$export = null; 