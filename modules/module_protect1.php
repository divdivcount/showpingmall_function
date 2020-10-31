<?php
/*
FileName: module_protect.php
Modified Date: 20190902
Description: 직접 파일 접근 방지 함수 정의
*/
// Load Modules
require_once('modules/strequ.php');

// Parameter

// Functions
function nodirect() {
  if(startsWith($_SERVER['SCRIPT_FILENAME'],'/modules')) {
    require_once('modules/notification.php');
    userGoto('잘못된 페이지 접근입니다.', '');
  }
}

// Process
nodirect();
?>
