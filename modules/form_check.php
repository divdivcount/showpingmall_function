<?php
/*
FileName: form_check.php
Modified Date: 20190923
Description: 폼: 페이지 체커
*/

// Load Modules
require_once('modules/module_protect1.php');

// Parameter

// Functions
function UserPage() {
  $list = [
    '/ky_project/basket.php', '/ky_project/consulting_upload.php', '/ky_project/cart.php',
    '/ky_project/changeqty.php','/ky_project/consulting_user.php','/ky_project/list.php','/ky_project/index.php',
    '/ky_project/login.php','/ky_project/payhistory.php','/ky_project/register.php','/ky_project/User_page.php'

  ];
  foreach ($list as $file) {
    if($_SERVER['DOCUMENT_ROOT'].$file == $_SERVER['SCRIPT_FILENAME']) {
      return true;
    }
  }
  return false;
}

function AdminPage() {
  $list = [
    '/ky_project/admin_index.php', '/ky_project/admin_list.php', '/ky_project/admin_login.php',
    '/ky_project/consulting_list.php', '/ky_project/calendar_list.php', '/ky_project/calendar_update.php',
    '/ky_project/consulting_checked.php', '/ky_project/consulting_delete.php', '/ky_project/consulting_list.php',
    '/ky_project/consulting_upload.php', '/ky_project/dashboard.php', '/ky_project/gallery_delete.php',
    '/ky_project/gallery_list.php', '/ky_project/gallery_modify.php', '/ky_project/gallery_upload.php',
    '/ky_project/sign-modify.php', '/ky_project/test.php'
  ];
  foreach ($list as $file) {
    if($_SERVER['DOCUMENT_ROOT'].$file == $_SERVER['SCRIPT_FILENAME']) {
      return true;
    }
  }
  return false;
}

// Process

?>
