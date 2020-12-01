<?php
// Load Modules
require_once('modules/db.php');
//유저페이지에서 1개값 받아옴
$u_mb_id = empty($_REQUEST["mb"]) ? "" :  $_REQUEST["mb"];

?>
<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>
    <h4><?=$u_mb_id?>님 회원 탈퇴 하시겠습니까?</h4>
    <h4>비밀번호를 한 번 더 입력해주세요.</h4>
    <form action="User_leave_check.php?mb=<?=$u_mb_id?>" method="post">
      <input type="password" name="password" placeholder="비밀번호를 입력해주세요.">
      <input type="submit" value="확인" />
    </form>
	</body>
</html>
