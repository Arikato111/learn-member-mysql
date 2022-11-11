<?php
$logout = function () {
    session_unset();
    header("Location: /login");
    die;
};

$Logined = function () {
    $GLOBALS['title'] = 'you are now logind';
    return <<<HTML
    <main class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-success text-center mt-5">
                    You are now Logined
                </div>
                    
            </div>
            <div class="col-md-3"></div>

        </div>
    </main>
    HTML;
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
                <h3>Elderly social system</h3>
                <h4>ระบบลงทะเบียนผู้สูงอายุ</h4>
                    {$error}
                <form class="form-control" action="/login" method="post">

                    <label for="">ชื่อผู้ใช้งาน</label>
                    <input class="form-control" type="text" name="mem_user">

                    <label for="">รหัสผ่าน</label>
                    <input class="form-control" type="password" name="mem_password">

                    <label for=""></label>
                    <input class="form-control btn btn-success" type="submit" name="submit" value="ตกลง">

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};