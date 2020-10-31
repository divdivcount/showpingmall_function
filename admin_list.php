<?php
require_once('modules/db.php');
require_once('modules/notification.php');
require_once('modules/cat.php');
$result = $dao ->SelectAll();
$pid = Get('p', 1);

?>
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

			</div>
					<div>
						<?php require_once('modules/page_search.php'); ?>
						<div>
							<form action="admin_list.php" method="get">
								<input id="kk" type="hidden"  name="var" value="<?=$link?>">
								<input id="kk" type="text"  name="s_value">
								<input type="submit" value="검색">
						  </form>
						</div>
						<form class="" action="listdel.php?var=<?= $link ?>" method="post">
						  <table id="board">
							<thead>
							  <tr id="field">
								<th><input type="checkbox" class="hidden" id="all" value="all"><label for="all"></label></th>
								<th>번호</th>
								<th>이미지</th>
								<th>이름</th>
								<th>제조사</th>
								<th>제품 정보</th>
								<th>등록 날짜</th>
								<th>가격</th>
								<th colspan="7">
								  <button type="submit" name="button">삭제</button>
								  <span></span>
								</th>
							  </tr>
							</thead>
							<tbody>
							  <?php foreach($list as $row) : ?>
								<tr>
									<td class="center"><input type="checkbox" name="id[]" class="hidden" id="<?= $row['id'] ?>" value="<?= $row['id'] ?>"><label for="<?= $row['id'] ?>"></label></td>
									<td class="center"><a href="<?=$url.$row['id'] ?>"><?= $row['id'] ?></td>
									<td class="center"><img src="<?= $dir.$row['file'] ?>" width="64px" height="64px" /></td>
									<td class="center"><?= $row['name'] ?></td>
									<td class="center"><?= $row['manufacturer'] ?></td>
									<td class="center"><?= $row['info'] ?></li>
									<td class="center"><?= $row["date_format(date,'%Y-%m')"] ?></td>
									<td class="center"><?= $row['price'] ?></td>
								</tr>
							  <?php endforeach ?>
							</tbody>
						  </table>
						</form>
						<br/>
						   <div class="center">
						  <?php for($i=$result['start']; $i<=$result['end']; $i++): ?>
							<a class="abtn <?php if($i === (int)$result['current']) echo 'current' ?>" href="?var=<?=$link?>&p=<?= $i ?>&s_value=<?=$s_value?>"><?= $i ?></a>
						  <?php endfor ?>
						  <button type="button" name="button" onclick="location.href='ProductWrite.php'">글 작성</button>
						</div>
					</div>
		</div>
		<div id="footer">
		</div>
<?php require_once('modules/checkbox.php'); ?>
	</body>
</html>
