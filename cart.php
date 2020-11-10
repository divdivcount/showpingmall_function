<?php
session_start();
$var =$_REQUEST["var"];
$id = $_REQUEST["id"];
$price = $_REQUEST["price"];
$name = $_REQUEST["name"];
if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = "";
}
// $item_array_id = array_column($_SESSION["cart"],"item_id");
// if(!in_array($id, $item_array_id){
//   $_SESSION["cart"] .= "$var,$id,$price,$name,";
// }
$_SESSION["cart"] .= "$var,$id,$price,$name,";

// unset($_SESSION["cart"]);
header("Location:list.php?var=$var");
?>
