<?php
session_start();
$var =$_REQUEST["var"];
$id = $_REQUEST["id"];
$price = $_REQUEST["price"];
$name = $_REQUEST["name"];

// $_SESSION["cart"]["cpu"] = 3;
if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = "";
}
// $item_array_id = array_column($_SESSION["cart"],"item_id");
// if(!in_array($id, $item_array_id){
//   $_SESSION["cart"] .= "$var,$id,$price,$name,";
// }
$_SESSION["cart"] .= "$var,$id,$price,$name,";
// if (isset($_SESSION["cart"][$var][$id])){
//     $_SESSION["cart"][$var][$id]["qty"]++;
// } else {
//     $_SESSION["cart"][$var][$id]["price"] = $price;
//     $_SESSION["cart"][$var][$id]["name"] = $name;
//     $_SESSION["cart"][$var][$id]["qty"] = 1;
// }
// unset($_SESSION["cart"]);
header("Location:list.php?var=$var");
?>
