<?php
require_once('modules/db.php');
require_once('modules/notification.php');
$mb_num = empty($_REQUEST["mb"]) ? "" :  $_REQUEST["mb"];
$dao = new ProDAO();
$result = $dao ->UserSelectAll($mb_num);
?>
<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>
    <?php foreach($result as $row) :?>
      <?= $row["mem_rating_name"] ?>
      <?= $row["p_num"] ?>
    <?php endforeach ?>
	</body>
</html>
