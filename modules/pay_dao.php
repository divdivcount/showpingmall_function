<?php

// Load Modules
require_once('db_dao.php');


// Parameter

// Functions
//전체 출력 GraphicsCard정보
class Pay_history extends ProDAO {
protected $quTable = 'puhistory';
protected $quTableId = 'pu_id';

  public function Gopay($mb_num,$num) {
    $this->openDB();
    $query = $this->db->prepare("insert into paygo values (null,:mb_num,:pr_num)");
    $query -> bindValue(":mb_num", $mb_num, PDO::PARAM_STR);
    $query -> bindValue(":pr_num", $num, PDO::PARAM_STR);
    $query->execute();
  }
}
?>
