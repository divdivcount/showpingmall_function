<?php
/*
FileName: sign-in.php
Modified Date: 20190925
Description: 로그인 실행
*/

// Load Modules
require_once('modules/notification.php');
require_once('modules/db.php');

// Parameter
$id = Post('id', null);
$pw = Post('pw', null);

// Functions

// Process
if(!$id || !$pw) {
  userGoto('모든 입력란을 입력하십시오.', '');
}
$loginObj = new ProLogin();
if($loginObj->SignIn($id, $pw)) {
  userGoNow('admin_index.php');
}
else {
  userGoto('로그인 실패', '');
}

?>
