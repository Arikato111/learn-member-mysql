<?php
$fetchMemberList = function () {
    $db = new Database;
    $allMember = $db->getAllMember();

    $content = '';
    foreach($allMember as $mb){
        $content .= <<<HTML
        <tr>
            <td>{$mb['mem_name']}</td>
            <td>{$mb['mem_address']}</td>
            <td>{$mb['mem_date']}</td>
            <td>{$mb['mem_email']}</td>
            <td>{$mb['mem_tel']}</td>
            <td>{$mb['mem_user']}</td>
            <td><a href="/admin/member?edit&id={$mb['mem_id']}"><button class="btn btn-info text-white">แก้ไข</button></a></td>
            <td><a href="/admin/member?delete&id={$mb['mem_id']}"><button class="btn btn-danger">ลบ</button></a></td>
        </tr>
        HTML;
    }
    return $content;
};

$export = $fetchMemberList;