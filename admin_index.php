<?php
    require_once('modules/db.php');
    require_once('modules/admin.php');
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
				<?php
        		$id = $_SESSION['user'];
				?>
<table>
	<tr>
		<td><?php echo $id.'님 어서오세요'?><a href="./sign-out.php">로그아웃</a></td>
	</tr>
</table>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=cpu' "/>admin_Cpulist</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=mainboard' "/>admin_Mainboardlist</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=power' "/>admin_Powerlist</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=case' "/>admin_Caselist</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=cooler' "/>admin_Coolerlist</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=memory' "/>admin_Memory</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=graphicscard' "/>admin_GraphicsCard</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=odd' "/>admin_Odd</button>
      <button class="btn1"  onclick = "location.href = 'admin_list.php?var=storage' "/>admin_Storage</button>
			</div>
		</div>
		<div id="footer">
		</div>
	</body>
</html>
