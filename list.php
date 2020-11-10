<?php
require_once('modules/db.php');
require_once('modules/notification.php');
require_once('modules/cat.php');
$result = $dao ->SelectAll();
$pid = Get('p', 1);
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

			</div>
			<div>
        <?php require_once('modules/page_search.php'); ?>
		<div>
			<form action="list.php" method="get">
				<input id="kk" type="hidden"  name="var" value="<?=$link?>">
				<input id="kk" type="text"  name="s_value">
				<input type="submit" value="검색">
		  </form>
		</div>
				<?php foreach ($list as $row) : ?>
					<ul class="list">
					<li class="list-li check_field"><input type="checkbox" name="id[]" class="hidden" id="<?= $row['id'] ?>" value="<?= $row['id'] ?>"><label for="<?= $row['id'] ?>"></label></li>
					<li class="hdn"><?= $row['id'] ?></li>
					<li class="list-li image_box"><img src="<?= $dir.$row['file'] ?>" width="124px" height="124px" /></li>
					<div class="text_field">
						<li class="list-li name_field"><?= $row['name'] ?></li>
						<li class="list-li info_text"><?= $row['info'] ?></li>
						<li class="list-li  date_text">등록일시 :<?= $row["date_format(date,'%Y-%m')"] ?></li>
					</div>
						<li class="vertical"><?= $row['price'] ?>원</li>
						<input type="button" class="button vertical" id="obj" value="담기" onclick="javascript:location.href='cart.php?var=<?=$link?>&id=<?= $row['id'] ?>&price=<?= $row['price'] ?>&name=<?= $row['name'] ?>'"/>
					</ul>
				<?php endforeach ?>
			</div>
			<div class="center">
          <?php for($i=$result['start']; $i<=$result['end']; $i++): ?>
            <a class="abtn <?php if($i === (int)$result['current']) echo 'current' ?>" href="?var=<?=$link?>&p=<?= $i ?>&s_value=<?=$s_value?>"><?= $i ?></a>
          <?php endfor ?>
        </div>
		</div>
		<div id="footer">
			<?php
			$cart = explode(',', $_SESSION["cart"]);
			for ($i = 0; $i < count($cart); $i+=4) {
							echo $cart[$i]; // 품목
			        echo $cart[$i + 1]; // 제품 아이디
			        echo $cart[$i + 2]; // 제품 가격
			        echo $cart[$i + 3]; // 이름
							echo "<br>";
							$var = $cart[$i];
							if(!empty($var)){
							$id = $cart[$i + 1];
							$price = $cart[$i + 2];
							$name = $cart[$i + 3];
							$d[$var][$id]["price"] = $price;
							$d[$var][$id]["name"] = $name;
							$d[$var][$id]["qty"]++;
						}
					}

				 foreach ($d as $cat_key => $cat_arr) {
				     foreach ($cat_arr as $id_key => $id_val) {
				          echo $cat_key, ",", $id_key, ",",$id_val["name"],",", $id_val["price"]*$id_val["qty"], ",", $id_val["qty"], "<br>";
				     }
				 }

			 ?>
		</div>
	</body>
</html>
