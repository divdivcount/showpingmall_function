<?php
// Load Modules
require_once('modules/db.php');
require_once('modules/notification.php');
//유저페이지에서 3개값 받아옴
// $mb_num = empty($_REQUEST["mb"]) ? "" :  $_REQUEST["mb"];
// $mb_rating = empty($_REQUEST["mb_rating"]) ? "" :  $_REQUEST["mb_rating"];
$mb_p_num = empty($_REQUEST["mb_p_num"]) ? "" :  $_REQUEST["mb_p_num"];
// $m_dao = new Pay_history();
// $m_result = $m_dao -> GoSelectAll();
// foreach ($m_result as $m_row) {
// 	$mb_num = $m_row["mb_num"];
// 	$mb_rating = $m_row["mem_rating_num"];
// 	// $mb_p_num = $m_row["pr_num"];
// }
echo $mb_num."GoSelectAll<br>";
echo $mb_rating."GoSelectAll<br>";
echo $mb_p_num."GoSelectAll<br>";
if($mb_p_num >= 1500000){
	$mb_ratings = 1;
	echo "P";
}else if($mb_p_num >= 999999){
	$mb_ratings = 2;
	echo "G";
}else if($mb_p_num > 50000){
	$mb_ratings = 3;
}else if($mb_rating == 4){
	$mb_ratings = 4;
	echo "I";
}
echo $mb_ratings."UserSelectAll 들어가는<br>";
$dao = new ProDAO();
$result = $dao ->UserSelectAll($mb_num, $mb_ratings, $mb_p_num);
?>
<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>
    <?php
			foreach($result as $row){
				$row["mem_rating_name"];
				echo $row["p_num"]."<br>";
			}
	    echo  $row["mem_rating_name"];

			?>
	</body>
</html>
