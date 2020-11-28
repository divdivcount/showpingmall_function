<?php
// Load Modules
require_once("modules/db.php");
require_once('modules/notification.php');
?>

<html>
<head>
	<title>Login</title>
	<link href="./tyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php if(!isset($_SESSION['ss_mb_id'])) { // 로그인 세션이 있을 경우 로그인 화면 ?>

<h1>로그인</h1>

	<form action="./login_check.php" method="post">
		<table>
			<tr>
				<th>아이디</th>
				<td><input type="text" name="mb_id"></td>
			</tr>
			<tr>
				<th>비밀번호</th>
				<td><input type="password" name="mb_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="td_center">
					<input type="submit" value="로그인">
					<a href="./register.php">회원가입</a>
				</td>
			</tr>
		</table>
	</form>

<?php } else { // 로그인 세션이 없을 경우 로그인 완료 화면 ?>
	<?php
	$mb_id = $_SESSION['ss_mb_id'];

	$sql = " select * from member where mb_id = TRIM('$mb_id') ";
	$result = mysqli_query($conn, $sql);
	$mb = mysqli_fetch_assoc($result);

	mysqli_close($conn); // 데이터베이스 접속 종료

		userGoNow('index.php');

 } ?>

</body>
</html>
