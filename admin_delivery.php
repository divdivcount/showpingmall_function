<?php
// Load Modules
require_once('modules/db.php');
require_once('modules/notification.php');

$mb_id = $_SESSION['ss_mb_id'];
$sql = " select * from member where mb_id = TRIM('$mb_id') ";
$result = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($result);
mysqli_close($conn); // 데이터베이스 접속 종료

$link = "admin_delivery";
$dao = new Pay_history();
$start_s_value = empty($_REQUEST["start_s_value"]) ? "" : $_REQUEST["start_s_value"];
$s_value = empty($_REQUEST["s_value"]) ? "" : $_REQUEST["s_value"];
$result = $dao ->SelectHistory($s_value, $start_s_value);
// echo $result["mb_num"];
$pid = Get('p', 1);

?>

<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
    <style>
    .table {
      border-collapse: collapse;
      border-top: 3px solid #168;
      width:100%;
      text-align: center;
    }
    .table th {
      color: #168;
      background: #f0f6f9;
      text-align: center;
    }
    .table th, .table td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    .table th:first-child, .table td:first-child {
      border-left: 0;
    }
    .table th:last-child, .table td:last-child {
      border-right: 0;
    }
    .table tr td:first-child{
      text-align: center;
    }
    .table caption{caption-side: bottom; display: none;}
    #test{text-align:center; border:none; margin: 0; padding: 0; font-size:16px;}
      </style>
	</head>
	<body>
		<div id="header">

		</div>
		<div id="content_container">
			<div id="navigation">

			</div>
			<div>
      		<div>
      			<form action="admin_delivery.php" method="get">
      				<input id="kk" type="hidden"  name="var" value="<?=$link?>">
              <input id="kk" type="month" name="start_s_value" value=""><span>~</span>
      				<input id="kk" type="month" id="currnetMonth" name="s_value" value="">
      				<input type="submit" value="검색">
      		  </form>
      		</div>
          <div>
            <!-- 제이쿼리로 두번 클릭시 데이터 값 가져오기 -->
          </div>
        <?php $priv_order_id = 0; ?>
    				<?php foreach ($result as $row) : ?>
              <?php
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
                      <table class="table">

                    <th>
                      회원 번호
                    </th>
                    <th>
                      주문 번호
                    </th>
                    <th>
                      물품 아이디
                    </th>
                    <th>
                      물품 이름
                    </th>
                    <th>
                      주문 수량
                    </th>
                    <th>
                      구매 가격
                    </th>
                    <th>
                      구매 일시
                    </th>
                    <tr>
                      <td>
                        <input id="test" type="text" value="<?= $row["mb_num"] ?>" readonly/>
                      </td>
                      <td>
                        <input id="test" type="text" value="<?= $row['order_id'] ?>" readonly/>
                      </td>
                      <td>
                         <input id="test" type="text" value="<?= $row['pu_id'] ?>" readonly/>
                      </td>
                      <td>
                        <input id="test" type="text" value="<?= $row['pr_name'] ?>" readonly/>
                      </td>
                      <td>
                        <input id="test" type="text" value="<?= $row['pr_qty'] ?>" readonly/>
                      </td>
                      <td>
                        <input id="test" type="text" value="<?= $row['pa'] ?>" readonly/>
                      </td>
                      <td>
                        <input id="test" type="text" value="<?= $row["date_format(pr_now,'%Y-%m')"] ?>" readonly/>
                      </td>
                    </tr>
                  </table>
                    <!-- <ul class="list">
          					<li class="">주문 번호 :<?//= $row['order_id'] ?></li>
                    <li class="">물품 아이디 : <?//= $row['pu_id'] ?></li>
          					<li class="list-li image_box"><img src="<?//= $row['pr_img'] ?>" width="124px" height="124px" /></li>
          					<div class="text_field">
          						<li class="list-li name_field"><?//=$row['pr_name'] ?></li>
          						<li class="list-li info_text">주문수량 :<?//= $row['pr_qty'] ?></li>

          					</div>
          						<li class="vertical"><?//= $row['pa'] ?>원</li>
          					</ul> -->
            <?php endforeach; ?>
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
    <div class="row">
  <table id="example-table-1" width="100%" class="table table-bordered table-hover text-center">
    <thead>
      <tr>
        <th>No. </th>
        <th>아이디</th>
        <th>이름</th>
        <th>이메일</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>user01</td>
        <td>홍길동</td>
        <td>hong@gmail.com</td>
      </tr>
      <tr>
        <td>2</td>
        <td>user02</td>
        <td>김사부</td>
        <td>kim@naver.com</td>
      </tr>
      <tr>
        <td>3</td>
        <td>user03</td>
        <td>존</td>
        <td>John@gmail.com</td>
      </tr>
    </tbody>
  </table>
  <div class="col-lg-12" id="ex1_Result1" ></div>
  <div class="col-lg-12" id="ex1_Result2" ></div>
</div>
    <script>

    // 테이블의 Row 클릭시 값 가져오기
		$("#example-table-1 tr").click(function(){

			var str = ""
			var tdArr = new Array();	// 배열 선언

			// 현재 클릭된 Row(<tr>)
			var tr = $(this);
			var td = tr.children();

			// tr.text()는 클릭된 Row 즉 tr에 있는 모든 값을 가져온다.
			console.log("클릭한 Row의 모든 데이터 : "+tr.text());

			// 반복문을 이용해서 배열에 값을 담아 사용할 수 도 있다.
			td.each(function(i){
				tdArr.push(td.eq(i).text());
			});

			console.log("배열에 담긴 값 : "+tdArr);

			// td.eq(index)를 통해 값을 가져올 수도 있다.
			var no = td.eq(0).text();
			var userid = td.eq(1).text();
			var name = td.eq(2).text();
			var email = td.eq(3).text();


			str +=	" * 클릭된 Row의 td값 = No. : <font color='red'>" + no + "</font>" +
					", 아이디 : <font color='red'>" + userid + "</font>" +
					", 이름 : <font color='red'>" + name + "</font>" +
					", 이메일 : <font color='red'>" + email + "</font>";

			$("#ex1_Result1").html(" * 클릭한 Row의 모든 데이터 = " + tr.text());
			$("#ex1_Result2").html(str);
		});
</script>
	</body>
</html>
