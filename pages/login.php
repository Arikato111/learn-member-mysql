<?php
$Logined = import('./components/Logined');

$logout = function () {
    session_unset();
    header("Location: /login");
    die;
};


$export = function () use ($Logined, $logout) {

    if(isset($_GET['logout'])) return $logout();
    if(isset($_SESSION['member'])) return $Logined();
        
    $error = "";
    if(isset($_POST['submit'])) {
        $db = new Database;
        $member = $db->login($_POST['mem_user'], $_POST['mem_password']);
        if($member) {
            $_SESSION['member'] = $member['mem_user'];
            header("Location: /");
            die;
        } else {
            $error = '<div class="alert alert-danger">Cannot login</div>';
        }
    }

    $GLOBALS['title'] = "Login";
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="form-control py-3 my-3 shadow-sm fs-5" action="/login" method="post">
                    <h1 class="text-center">Login</h1>
                    {$error}

                    <label class="form-label" for="">ชื่อผู้ใช้งาน</label>
                    <input class="form-control" type="text" name="mem_user">

                    <label class="form-label" for="">รหัสผ่าน</label>
                    <input class="form-control" type="password" name="mem_password">

                    <label for=""></label>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="ตกลง">

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};