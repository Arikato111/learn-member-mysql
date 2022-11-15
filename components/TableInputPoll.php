<?php
$export = function () {

  $db = new Database;
  $poll = $db->getPoll(desc: true);
  $content = '';
  $count = 0;
  foreach ($poll as $p) {
    $color = 'primary';
    if(isset($_SESSION['member'])) {
      $color = $db->checkPollPost($p['poll_id'], $_SESSION['member']) ? 'success': 'primary';
    }
    $status = $color == 'primary'? 'ตอบ': 'ตอบแล้ว';
    $count += 1;
    $content .= <<<HTML
      <tr>
        <td>{$count}</td>
        <td>{$p['poll_name']}</td>
        <td>{$p['poll_date']}</td>
        <td>
          <a class="btn btn-{$color}" href="?poll_id={$p['poll_id']}">
            {$status}
          </a>
        </td>
      </tr>
    HTML;
  }

  return <<<HTML
  <div class="p-3 border rounded">
    <table class="table table-hover text-center">
      <tbody>
        {$content}
      </tbody>
    </table>
  </div>
  HTML;
};
