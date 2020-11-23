<?php
require_once('modules/db.php');
require_once('modules/notification.php');
$mb_id = $_SESSION['ss_mb_id'];
$sql = " select * from member where mb_id = TRIM('$mb_id') ";
$result = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($result);
mysqli_close($conn); // 데이터베이스 접속 종료
$link = "puhistory";
$dao = new Pay_history();
$result = $dao ->SelectHistory();
$pid = Get('p', 1);
if(!$mb['mb_num']){
?>
  <script>
    alert("로그인이 필요합니다.");
    history.back();
  </script>
<?php }else{ ?>
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
			<form action="test.php" method="get">
				<input id="kk" type="hidden"  name="var" value="<?=$link?>">
				<input id="kk" type="text"  name="s_value">
				<input type="submit" value="검색">
		  </form>
		</div>
				<?php foreach ($list as $row) : ?>
				<?php endforeach ?>
			</div>
			<div class="center">
          <?php for($i=$result['start']; $i<=$result['end']; $i++): ?>
            <a class="abtn <?php if($i === (int)$result['current']) echo 'current' ?>" href="?var=<?=$link?>&p=<?= $i ?>&s_value=<?=$s_value?>"><?= $i ?></a>
          <?php endfor ?>
        </div>
		</div>
		<div id="footer">
			<?php
			 ?>
		</div>
  <?php }?>
	</body>
</html>
