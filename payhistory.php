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
$start_s_value = empty($_REQUEST["start_s_value"]) ? "" : $_REQUEST["start_s_value"];
$s_value = empty($_REQUEST["s_value"]) ? "" : $_REQUEST["s_value"];
$result = $dao ->SelectHistory($s_value, $start_s_value);
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
    		<div>
    			<form action="payhistory.php" method="get">
    				<input id="kk" type="hidden"  name="var" value="<?=$link?>">
            <input id="kk" type="month" name="start_s_value" value=""><span>~</span>
    				<input id="kk" type="month" id="currnetMonth" name="s_value" value="">
    				<input type="submit" value="검색">
    		  </form>
          <!-- <script>
            document.getElementById('currnetMonth').value= new Date().toISOString().slice(0, 7);
          </script> -->
    		</div>
        <?php $priv_order_id = 0; ?>
    				<?php foreach ($result as $row) : ?>

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
              		echo "새 주문 건 시작"."\t<span class=''>구매 일시:".$row["date_format(pr_now,'%Y-%m')"]."</span>"."<br>";
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

    					</div>
    						<li class="vertical"><?= $row['pa'] ?>원</li>
    					</ul>
    				<?php endforeach ?>
            <?php
            if(empty($priv_total)){
              echo "";
            }else{
              echo "이 주문 건의 총액: ", $priv_total."<br>";
            }
             ?>
			</div>
		</div>
		<div id="footer">
			<?php
			 ?>
		</div>
  <?php }?>

	</body>
</html>
