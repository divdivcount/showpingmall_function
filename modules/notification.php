<?php
/*
FileName: notification.php
Modified Date: 20190902
Description: 페이지 알림 및 변경 함수 정의
*/
// Load Modules
require_once('modules/module_protect1.php');

// Parameter

// Functions
function userGoNow($url)
{
  header('Location: '.$url);
  exit();
}

function userGoto($msg, $url)
{
  $directlink = ($url == '')?'history.back();':'location.href=\''.$url.'\';';
?>
<!doctype html>
<html>
<head><meta charset="utf-8">
</head>
<body>
  <script type="text/javascript">
    alert('<?= $msg ?>');
    <?= $directlink ?>
  </script>
</body>
<?php
  exit();
}

// Process
// <meta http-equiv="refresh" content="0 url=/page/board/read.php?idx=">
?>
