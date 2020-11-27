<?php

// Load Modules
require_once('db_dao.php');


// Parameter

// Functions
//전체 출력 GraphicsCard정보
class Pay_history extends ProDAO {
protected $quTable = 'puhistory';
protected $quTableId = 'pu_id';

  public function Gopay($mb_num,$num, $rating ,$mb_id) {
    $this->openDB();
    echo "<br>".$mb_num."쿼리<br>";
    echo "<br>".$num."쿼리<br>";
    echo "<br>".$mb_id."쿼리<br>";
    $query = $this->db->prepare("insert into paygo (mb_num, mb_id, pr_num, mem_rating_num) values (:mb_num,:mb_id,:pr_num,:rating)");
    $query -> bindValue(":mb_num", $mb_num, PDO::PARAM_STR);
    $query -> bindValue(":pr_num", $num, PDO::PARAM_STR);
    $query -> bindValue(":mb_id", $mb_id, PDO::PARAM_STR);
    $query -> bindValue(":rating", $rating, PDO::PARAM_STR);
    $query->execute();

  }
}
?>
