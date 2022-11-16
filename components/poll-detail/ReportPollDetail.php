<?php
$ReportPollDetail = function () {
    $db = new Database();
    $pollDetail = $db->getPollDetaill_ByID($_GET['poll_id']);
    $content = '';
    $allVote = 0;

    foreach ($pollDetail as $pd) {
        $allVote += $pd['poll_detail_count'];
    }
    if($allVote > 0) {

        foreach ($pollDetail as $pd) {
            $count = (int) $pd['poll_detail_count'] / $allVote * 100;
            $content .= <<<HTML
            <label>
                {$pd['poll_detail_post']}
            </label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {$count}%;" aria-valuenow="{$count}" aria-valuemin="0" aria-valuemax="100">
                    {$count}%
                </div>
            </div>
            HTML;
        }
    } else {
        $content = <<<HTML
        <div class="text-center">ยังไม่มีการโหวต</div>
        HTML;
    }
    return <<<HTML
    <div class="form-control py-3">
        {$content}
    </div>
    HTML;
};

$export = $ReportPollDetail;
