<?php

// Load Modules
require_once('db_dao.php');


// Parameter

// Functions

	class Member extends ProDAO {
			protected $quTable = 'member';
			protected $quTableId = 'mb_num';

			public function Member_Delete($mb_num) {
			try{
				// 회원 탈퇴
				$sql = "delete from $quTable where mb_num=:mb_num";
				$query = $this->db->prepare($sql);
				$query->bindValue(":mb_num", $mb_num, PDO::PARAM_INT);
				$query->execute();
				}catch(PDOException $e){
				exit($e ->getMessage());
				}
			}

}
?>
