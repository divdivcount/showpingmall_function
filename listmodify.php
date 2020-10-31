<?php

// Load Modules

require_once('modules/notification.php');
require_once('modules/db.php');


// Parameter
require_once('modules/cat.php');
$id = Get('id', 0);
$name = Post('name', null);
$manufacturer = Post('manufacturer', null);
$info = Post('info', null);
$date = Post('date', null);
$price = Post('price', null);

require_once('upload.php');
// Functions

// Process
try {
  if(!($name && $manufacturer && $info && $date && $price &&$file)) {
    userGoto('모든 입력란을 채워야 합니다.', '');
  }

  $dao = new Cpu();
  if((int)$id > 0) {
    $dao->listModify($id,$name,$manufacturer,$info,$date,$price,$file);
    userGoto('수정이 완료되었습니다.', "admin_list.php?var=$link");
  }
  else {

  }
}
catch (PDOException $e) {
  userGoto('데이터베이스가 작동하지 않습니다:'.$e->getMessage(), '');
}
catch (Exception $e) {
  userGoto($e->getMessage(), '');
}
?>
