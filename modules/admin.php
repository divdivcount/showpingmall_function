<?php
/*
FileName: admin.php
Modified Date: 20190923
Description: 이 모듈이 포함된 페이지는 관리자만 접근 가능
*/
// Load Modules
require_once('modules/module_protect1.php');
require_once('modules/notification.php');
require_once('modules/db.php');

// Parameter

// Functions

// Process
$loginObj = new ProLogin();
if($loginObj->SignedIn()) {
  ;
}
else {
  userGoto('관리자만 접근할 수 있습니다.', '');
  exit(0);
}
?>
