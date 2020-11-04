<?php
session_start();
$c =$_REQUEST["c"];
$id = $_REQUEST["id"];
$price = $_REQUEST["price"];
if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = "";
}
$_SESSION["cart"] .= "$c,$id,$price";

echo $c;
echo $id;
echo $price;
// header("Location:list.php");

?>
