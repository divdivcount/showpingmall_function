<?php
	try {
	  $s_value = empty($_REQUEST["s_value"]) ? "" : $_REQUEST["s_value"];
	  $result = $dao->SelectPageLength($pid, 10, $s_value);
	  $list = $dao->SelectPageList($result['current'], 10,$s_value);
	} catch (PDOException $e) {
	  $result = null;
	  $list = null;
	 echo $e->getMessage();
	}
?>
