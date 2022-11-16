<?php 
$title = import('nexit/title');
$NotFound = import('./pages/_error');

$export = function () use ($title, $NotFound) {
    $message = "";
    if(!isset($_SESSION['member'])) {
        return $NotFound();
    }
    
    $db = new Database;

    if(isset($_POST['submit']))  {
        $db->updateMember($_SESSION['member'], $_POST['mem_name'], $_POST['mem_address'], $_POST['mem_date'], $_POST['mem_email'], $_POST['mem_tel']);
        $message = <<<HTML
        <div class="alert alert-success text-center">update successfuly</div>
        HTML;
    }

    $member = $db->getMemberInfo($_SESSION['member']);

    $title("Edit member | {$member['mem_user']}");
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center my-3">Elderly social system</h3>
                <h4>ระบบลงทะเบียนผู้สูงอายุ</h4>
                {$message}
                <form class="form-control fs-5 shadow-sm py-3" method="post">
                    <label for="">ชื่อ - สกุล</label>
                    <input class="form-control" type="text" name="mem_name" value="{$member['mem_name']}" required>

                    <label for="">ที่อยู่</label>
                    <textarea class="form-control" name="mem_address" id="" cols="30" rows="5" required>{$member['mem_address']}</textarea>

                    <label for="">วัน/เดือน/ปี เกิด</label>
                    <input class="form-control" type="date" name="mem_date"  value="{$member['mem_date']}" required>

                    <label for="">อีเมล์</label>
                    <input class="form-control" type="email" name="mem_email"  value="{$member['mem_email']}" required>

                    <label for="">หมายเลขโทรศัพท์</label>
                    <input class="form-control" type="number" name="mem_tel"  value="{$member['mem_tel']}" required>

                    <label for=""></label>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="ตกลง" >

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    HTML;
};
