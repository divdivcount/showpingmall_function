<?php require_once('modules/db.php'); ?>
<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>
		<div id="header">

		</div>
		<div id="content_container">
			<div id="navigation">
					<?php

							$mb_id = $_SESSION['ss_mb_id'];
							$sql = " select * from member where mb_id = TRIM('$mb_id') ";
							$result = mysqli_query($conn, $sql);
							$mb = mysqli_fetch_assoc($result);

							mysqli_close($conn); // 데이터베이스 접속 종료
					?>
					<table>
						<tr>
							<td><?php echo $mb['mb_num'] ?><td>
								<?php
									 	if($mb['mb_num']){
											echo "<td>".$mb['mb_name']."님 어서오세요"."\t<a href=./register.php?mode=modify>회원정보수정</a>"."&nbsp;<a href='./logout.php'>로그아웃</a>"."&nbsp;<a href='./User_page.php'>마이페이지</a>"."</td>";
										}else {
											echo "<td><a href='./login.php'>login</a></td>";
										}
								 ?>
						</tr>
					</table>
					<div class="click_box">
						<div>
							<iframe id="main_frame" src="list.php?var=cpu" height="800px" width="70%"></iframe>
						</div>
						<div class="gnb_wrap">
							<div class="nav">
								<ul class="gnb">
									<!--세션, 코드번호 담기,
										if (empty($_SESSION["cart"])) {
										    $_SESSION["cart"] = "";
										}
										$_SESSION["cart"] .= "구분코드,물품이,수량,가격"

										$cart = explode(',', $_SESSION["cart"]);

										for ($i = 0; $i < count($cart); $i+=3) {
										    if ($cart[$i] == "CPU") {
										        echo $cart[$i + 1]; // 물품코드
										        echo $cart[$i + 2]; // 수량
										    }
										}
									-->
										<li><a class="clicker" href="#" onclick="changeIframeUrl('list.php?var=cpu')">cpu</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=mainboard')">mainboard</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=power')">power</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=case')">case</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=cooler')">cooler</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=odd')">Odd</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=memory')">memory</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=graphicscard')">graphicscard</a></li>
										<li><a class ="clicker" href="#" onclick="changeIframeUrl('list.php?var=storage')">storage</a></li>
								</ul>
							</div>
						</div>
					</div>
			</div>
		</div>
		<div id="footer">
		</div>
		<script>
		function changeIframeUrl(url){
			document.getElementById("main_frame").src = url;
		}
		</script>

	</body>
</html>
