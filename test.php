<?php
require_once('modules/db.php');
require_once('modules/notification.php');
$mb_id = $_SESSION['ss_mb_id'];
$sql = " select * from member where mb_id = TRIM('$mb_id') ";
$result = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($result);
mysqli_close($conn); // 데이터베이스 접속 종료
$link = "test";
$dao = new Pay_history();
$result = $dao ->SelectHistory();
$pid = Get('p', 1);
$current_id = 0;
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
    				<input id="kk" type="date"  name="s_value">
    				<input type="submit" value="검색">
    		  </form>
    		</div>
        <?php $priv_order_id = 0; ?>
    				<?php foreach ($list as $row) : ?>
              <!--current_id = 0 -->
              <?php
              // if ($priv_order_id != $row["order_id"]) {
            	// 	echo "새 주문 건 시작";
            	// }
              //   $priv_order_id = $row["order_id"];
              if ($priv_order_id != $row["order_id"]) {
              		if ($priv_order_id != 0) {
              			echo "이 주문 건의 총액: ", $priv_total."<br>";
              		}
              		echo "새 주문 건 시작"."<br>";
              	}
                  $priv_order_id = $row["order_id"];
                  $priv_total = $row["pr_num"];
                  // echo $row["pr_num"];
                ?>

              <ul class="list">
    					<li class="">주문 번호 :<?= $row['order_id'] ?></li>
              <li class="">물품 아이디 : <?= $row['pu_id'] ?></li>
    					<li class="list-li image_box"><img src="<?= $row['pr_img'] ?>" width="124px" height="124px" /></li>
    					<div class="text_field">
    						<li class="list-li name_field"><?= $row['pr_name'] ?></li>
    						<li class="list-li info_text">주문수량 :<?= $row['pr_qty'] ?></li>
    						<li class="list-li  date_text">등록일시 :<?= $row["date_format(pr_now,'%Y-%m')"] ?></li>
    					</div>
    						<li class="vertical"><?= $row['pa'] ?>원</li>
    					</ul>
    				<?php endforeach ?>
            <?php echo "이 주문 건의 총액: ", $priv_total."<br>"; ?>
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
