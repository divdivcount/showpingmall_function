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
  $galleryObj = new Gallery();
  if($ids) {
    foreach ($ids as $id) {
      $galleryObj->Delete($id);
    }
  }
} catch (Exception $e) {
  echo $e->getMessage();
  exit();
}
userGoNow('gallery_list.php');
?>
