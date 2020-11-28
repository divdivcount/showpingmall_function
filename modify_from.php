<?php
// Load Modules
require_once('modules/db.php');
require_once('modules/cat.php');
$id = Get('id', 0);

?>

<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php');?>
		<title></title>
	</head>
	<body>
		<?php
			try {
				?>
		<?php if((int)$id > 0): ?>
			<?php $board = $dao ->SelectId($id);?>
		<form class="" action="listmodify.php?var=<?= $link ?>&id=<?=$board["id"]?>" method="post" enctype="multipart/form-data">
					<input type="text" value="<?=$link?>" readonly/>
					<div><b>이름</b><input type="text" size=10 name="name" value="<?= $board["name"]?>"></div>
					<div><b>제조사</b><input type="text" size=10  name="manufacturer" value="<?= $board["manufacturer"]?>"></div>
					<div><b>정보</b><input type="text" size=60  name="info" value="<?= $board["info"]?>"></div>
					<div><b>제조일자</b><input type="date" size=60 name="date" value="<?= $board["date"]?>"></div>
					<div><b>가격</b><input type="text" size=60 name="price" value="<?= $board["price"]?>"></div>
					<div><b>현재 등록 사진</b><br/><img src="<?=$dir.$board['file']?>" width="128px" height="128px"><br/><b>파일명 : </b><?= $board['file']?></div>
					<div><input type="file" name="file"></div>
					<input type="submit" value="수정">
		</from>
			<?php else :?>
		<?php endif ?>
		<?php
	}
	catch (PDOException $e) {
		echo '데이터베이스가 작동하지 않음.';
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	//userGoto('데이터베이스 오류.', '');
	//userGoto('게시물이 존재하지 않습니다.', '');
	//userGoto('정의되지 않은 오류.', '');
?>
	</body>
</html>
