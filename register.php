<?php
require_once("modules/db.php"); // DB연결을 위한 같은 경로의 dbconn.php를 인클루드합니다.

if(isset($_SESSION['ss_mb_id']) && $_GET['mode'] == 'modify') { // 세션이 있고 회원수정 mode라면 회원 정보를 가져옴
	$mb_id = $_SESSION['ss_mb_id'];

	$sql = " SELECT * FROM member WHERE mb_id = '$mb_id' "; // 회원 정보를 조회
	$result = mysqli_query($conn, $sql);
	$mb = mysqli_fetch_assoc($result);
	mysqli_close($conn); // 데이터베이스 접속 종료

	$mode = "modify";
	$title = "회원수정";
	$modify_mb_info = "readonly";
} else {
	$mode = "insert";
	$title = "회원가입";
	$modify_mb_info = '';
}
?>
<html>
<head>
	<title>Register</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(e) {
		$(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
			var self = $(this);
			var mb_id;
			if(self.attr("id") === "mb_id"){
				mb_id = self.val();
			}
			$.post( //post방식으로 register_update.php에 입력한 userid값을 넘깁니다
				"./register_update.php",
				{ mb_ids : mb_id },
				function(data){
					if(data){ //만약 data값이 전송되면

						self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
						self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
					}
				}
			);
		});
	});
	</script>
</head>
<body>

<h1><?php echo $title ?></h1>

<form action="./register_update.php" onsubmit="return fregisterform_submit(this);" method="post">
	<input type="hidden" name="mode" value="<?php echo $mode ?>">

	<table>
		<tr>
			<th>아이디</th>
			<td><input type="text" name="mb_id" id="mb_id"  class="check" value="<?php echo $mb['mb_id'] ?>" <?php echo $modify_mb_info ?>><div id="id_check"></div></td>
		</tr>
		<tr>
			<th>비밀번호</th>
			<td><input type="password" name="mb_password"></td>
		</tr>
		<tr>
			<th>비밀번호 확인</th>
			<td><input type="password" name="mb_password_re"></td>
		</tr>
		<tr>
			<th>이름</th>
			<td><input type="text" name="mb_name" value="<?php echo $mb['mb_name'] ?>" <?php echo $modify_mb_info ?>></td>
		</tr>
		<tr>
			<th>이메일</th>
			<td><input type="text" name="mb_email" value="<?php echo $mb['mb_email'] ?>"></td>
		</tr>
		<tr>
			<th>성별</th>
			<td>
				<label><input type="radio" name="mb_gender" value="남자" <?php echo ($mb['mb_gender'] == "남자") ? "checked" : "";?> >남자</label>
				<label><input type="radio" name="mb_gender" value="여자" <?php echo ($mb['mb_gender'] == "여자") ? "checked" : "";?> >여자</label>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="td_center"><input type="submit" value="<?php echo $title ?>"> <a href="./login.php">취소</a></td>
		</tr>
	</table>
</form>

<script>
function fregisterform_submit(f) { // submit 최종 폼체크

	if (f.mb_id.value.length < 1) { // 회원아이디 검사
		alert("아이디를 입력하십시오.");
		f.mb_id.focus();
		return false;
	}

	if (f.mb_name.value.length < 1) { // 이름 검사
		alert("이름을 입력하십시오.");
		f.mb_name.focus();
		return false;
	}

	if (f.mb_password.value.length < 3) {
		alert("비밀번호를 3글자 이상 입력하십시오.");
		f.mb_password.focus();
		return false;
	}

	if (f.mb_password.value != f.mb_password_re.value) {
		alert("비밀번호가 같지 않습니다.");
		f.mb_password_re.focus();
		return false;
	}

	if (f.mb_password.value.length > 0) {
		if (f.mb_password_re.value.length < 3) {
			alert("비밀번호를 3글자 이상 입력하십시오.");
			f.mb_password_re.focus();
			return false;
		}
	}

	if (f.mb_email.value.length < 1) { // 이메일 검사
		alert("이메일을 입력하십시오.");
		f.mb_email.focus();
		return false;
	}

	if (f.mb_email.value.length > 0) { // 이메일 형식 검사
		var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
		if (f.mb_email.value.match(regExp) == null) {
			alert("이메일 주소가 형식에 맞지 않습니다.");
			f.mb_email.focus();
			return false;
		}
	}

	return true;

}
</script>

</body>
</html>
