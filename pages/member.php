<?php
$title = import('nexit/title');
$fetchMemberList = import('./components/FetchMemberList');

$Member = function() use ($title, $fetchMemberList) {
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