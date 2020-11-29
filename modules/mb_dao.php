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
				$this->openDB();
				$sql = "delete from member where mb_num=$mb_num";
				$query = $this->db->prepare($sql);
				$query->execute();
				session_unset(); // 모든 세션변수를 언레지스터 시켜줌
				session_destroy(); // 세션해제함
				?>
				<script>
					alert("아이디가 삭제되었습니다.");
					window.top.location.href = "../ky_project/index.php";
				</script>
				<?php
				}catch(PDOException $e){
				exit($e ->getMessage());
				}
			}
			public function Member_Search($mb_num) {
				// 회원 번호 찾기
				$this->openDB();
				$query = $this->db->prepare("select * from paygo where mb_num like $mb_num");
				$query->execute();
				$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
				if($fetch){
					return $fetch;
				}
				else return null;
			}


}
?>
