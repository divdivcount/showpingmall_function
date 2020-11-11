<?php
session_start();
// $cart = explode(',', $_SESSION["cart"]);
// for ($i = 0; $i < count($cart); $i+=4) {
//
//         $var = $cart[$i];
//         if(!empty($var)){
//         $id = $cart[$i + 1];
//         $price = $cart[$i + 2];
//         $name = $cart[$i + 3];
//         $d[$var][$id]["price"] = $price;
//         $d[$var][$id]["name"] = $name;
//         $d[$var][$id]["qty"]++;
//       }
//     }
$var =$_REQUEST["var"];
$id =$_REQUEST["id"];
$name =$_REQUEST["name"];

// unset($d[$var][$id]);
// $_SESSION["cart"] = "";
if(!($id && $var && $name)){
  header("Location:basket.php");
}else{
 unset($_SESSION["cart"][$var][$id]);
  // foreach ($d as $cat_key => $cat_arr) {
  //     foreach ($cat_arr as $id_key => $id_val) {
  //       for ($i = 0; $i < $id_val["qty"]; $i++) {
  //           $_SESSION["cart"] .= "$cat_key,$id_key,$id_val[price],$id_val[name],";
  //       }
  //     }
  //   }
    echo $_SESSION["cart"];
}

?>
