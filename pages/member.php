<?php
$EditMyUser = import('./components/member/EditMyUser');
$Member = function () use ($EditMyUser) {
    return $EditMyUser();
};

$export = $Member;