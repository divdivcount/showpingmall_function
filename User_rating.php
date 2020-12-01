<?php
// Load Modules
require_once('modules/db.php');

//유저페이지에서 3개값 받아옴
$mb_p_num = empty($_REQUEST["mb_p_num"]) ? "" :  $_REQUEST["mb_p_num"];
$mb = empty($_REQUEST["mb"]) ? "" :  $_REQUEST["mb"];
$mb_rating = empty($_REQUEST["mb_rating"]) ? "" :  $_REQUEST["mb_rating"];

echo $mb_p_num."<br>";
echo $mb."<br>";
echo $mb_rating."<br>";
?>
<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>
	</body>
</html>
