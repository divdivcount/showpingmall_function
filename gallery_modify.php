<?php
// Load Modules
require_once("modules/notification.php");
require_once("modules/db.php");
require_once("modules/admin.php");

// Parameter
$id = Post('id', null);
$description = Post('description', null);

// Functions

// Process
try {
  $galleryObj = new Gallery;
  if($id && $description) {
    $galleryObj->ModifyGallery($id, ['description' => $description]);
  }
  else {
    userGoto('잘못된 인수 전달.', '');
  }
} catch (Exception $e) {
  echo $e->getMessage();
  exit();
}
userGoNow('gallery_list.php');
?>
