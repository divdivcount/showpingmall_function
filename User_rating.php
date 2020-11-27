<?php
require_once('modules/db.php');
require_once('modules/notification.php');
$mb_num = empty($_REQUEST["mb"]) ? "" :  $_REQUEST["mb"];
$mb_rating = empty($_REQUEST["mb_rating"]) ? "" :  $_REQUEST["mb_rating"];
$mb_p_num = empty($_REQUEST["mb_p_num"]) ? "" :  $_REQUEST["mb_p_num"];
$dao = new ProDAO();
$result = $dao ->UserSelectAll($mb_num, $mb_rating, $mb_p_num);
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
				echo $row["p_num"];
			}
	    echo  $row["mem_rating_name"];

			?>
	</body>
</html>
