<!-- cookie까지 자바스크립트 -->
<?php
$var = $_REQUEST["var"];
$id = $_REQUEST["id"];
$qty = $_REQUEST["qty"];

echo $var,$id,$qty;
session_start();
$_SESSION["cart"][$var][$id]["qty"] = $qty;
header("Location:basket.php?");
?>
