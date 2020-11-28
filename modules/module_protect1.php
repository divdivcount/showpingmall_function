<?php
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
