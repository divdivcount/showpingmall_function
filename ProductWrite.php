<?php
// Load Modules
require_once('modules/db.php');
?>

<!doctype html>
<html>
	<head>
		<?php require_once('modules/form_head.php'); ?>
		<title></title>
	</head>
	<body>

		<form method="post">
			<select id="select_box" name="product">
				 <option value="cpu" selected="selected">Cpu</option>
				 <option value="cooler">Cooler</option>
				 <option value="mainboard">Mainboard</option>
				 <option value="memory">Memory</option>
				 <option value="graphicscard">GraphicsCard</option>
				 <option value="storage">Storage</option>
				 <option value="cases">Case</option>
				 <option value="power">Power</option>
				 <option value="odd">Odd</option>
				 <input type="submit" value="submit1" onclick="javascript: form.action='ProductWrite.php';">
			</select>
		</form>
			<?php
			//error_reporting(0);
			?>
			<form method="post" action='ProductInsert.php' enctype="multipart/form-data">
			<?php
				if($_POST['product'] == "cpu"){
					$name = "cpu";
				}else if($_POST['product'] == "mainboard"){
					$name = "mainboard";
				} else if($_POST['product'] == "cooler"){
					$name = "cooler";
				} else if($_POST['product'] == "memory"){
					$name = "memory";
				} else if($_POST['product'] == "graphicscard"){
					$name = "graphicscard";
				} else if($_POST['product'] == "storage"){
					$name = "storage";
				}else if($_POST['product'] == "cases"){
					$name = "cases";
				}else if($_POST['product'] == "power"){
					$name = "power";
				}else if($_POST['product'] == "odd"){
					$name = "odd";
				}else{

				}
			?>
			 <b>제품</b><input type="text" value="<?=$name?>" name="<?=$name?>" readonly/>
			<div>
				<div><b>이름</b><input type="text" size=10 name="name"></div>
				<div><b>제조사</b><input type="text" size=10  name="manufacturer"></div>
				<div><b>정보</b><input type="text" size=10  name="info"></div>
				<div><b>제조일자</b><input type="date" size=60 name="date"></div>
				<div><b>가격</b><input type="text" size=60 name="price"></div>
				<div><input type="file" name="file"></div>
			</div>
		<input type="submit" value="submit">
		<input type="reset" value="rewrite">
		</form>
	</body>
</html>
