<?php
// Load Modules
require_once("modules/notification.php");
require_once("modules/db.php");
require_once("modules/admin.php");

// Parameter
$ids = Post('id', null);

// Functions

// Process
try {
  if($ids) {
    $consultObj = new Consulting();
    foreach ($ids as $id) {
      $consultObj->Delete($id);
    }
  }
} catch (Exception $e) {
  echo $e->getMessage();
  exit();
}
userGoNow('consulting_list.php');
?>
