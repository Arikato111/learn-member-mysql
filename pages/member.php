<?php
$deleteMember = import('./components/deleteMember');
$editMember = import('./components/editMember');
$fetchMemberList = import('./components/FetchMemberList');
$title = import('nexit/title');

$MustRegister = function () {
    return <<<HTML
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger text-center my-3">
                    You must login to view this page
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    HTML;
};

$Member = function() use ($title, $fetchMemberList, $editMember, $deleteMember, $MustRegister) {
    if(!isset($_SESSION['member'])) return $MustRegister();

    if(isset($_GET['delete'])) return $deleteMember();
    if(isset($_GET['edit'])) return $editMember();
    
    $title("Member");
    return <<<HTML
    <main>
        <div class="container">
            <div class="row mt-5 form-control">
                <div class="col-12">
                    <h2 class="text-center fw-bold m-3">รายชื่อสมาชิก</h2>
                    <table class="table table-hover">
                        <thead>
                            <th>ชื่อ - นามสกุล</th>
                            <th>ที่อยู่</th>
                            <th>วันเกิด</th>
                            <th>อีเมล</th>
                            <th>หมายเลขโทรศัพท์</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </thead>
                        <tbody>
                           {$fetchMemberList()}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    HTML;
};

$export = $Member;