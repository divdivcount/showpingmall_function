<?php
require_once('modules/db.php');
session_start();
// print_r($_SESSION["cart"]);
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
$mb_num = $_REQUEST["mb_num"];
$num = $_REQUEST["num"];
$var =$_REQUEST["var"];
$id =$_REQUEST["id"];
$name =$_REQUEST["name"];

// unset($d[$var][$id]);
// $_SESSION["cart"] = "";
// if(!($id && $var && $name)){
//   header("Location:basket.php");
// }else{
//  unset($_SESSION["cart"][$var][$id]);
//   // foreach ($d as $cat_key => $cat_arr) {
//   //     foreach ($cat_arr as $id_key => $id_val) {
//   //       for ($i = 0; $i < $id_val["qty"]; $i++) {
//   //           $_SESSION["cart"] .= "$cat_key,$id_key,$id_val[price],$id_val[name],";
//   //       }
//   //     }
//   //   }
//     header("Location:basket.php");
// }
if(!($id && $var && $name)){
  $timestamp = strtotime("Now");
  $now = date("Y-m-d H:i:s", $timestamp);
echo "현재 일시 : ".$now."<br/>";
  echo $mb_num;
  echo $num;
  $d = $_SESSION["cart"];
  $last_id = 0;
  foreach ($d as $cat_key => $cat_arr) {
      foreach ($cat_arr as $id_key => $id_val) {
         $pr_img = $id_val["img"];
         $pr_name = $id_val["name"];
         $pr_qty = $id_val["qty"];
         $pa = $id_val["price"]*$id_val["qty"];
        ?>
        <table>
        <tr>
          <td>
          <?= $cat_key ?>
          </td>
          <td>
          <?= $id_key ?>
          </td>
          <td>
            <img src="<?= $pr_img ?>" width="75px" height= "75px" />
          </td>
          <td>
          <?= $pr_name ?>
          </td>
          <td>
          <?= $pa ?>
          </td>
          <td>
          <input type="text" id="qty<?= $k ?>" name="qty" value="<?= $pr_qty ?>" readonly/>
          </td>
        </tr>
      </table>
        <?php

        $dao = new Pay_history();
        $last_id = $dao -> Gohistory($cat_key, $id_key, $pr_img, $pr_name, $pa, $pr_qty, $mb_num,$num,$now,$last_id);
        //구매 이력을 데베로 넣을때 하나씩 들어감
        //문제 1 총 합계가 계속 들어가는 문제
        //테이블은 나눠서 하는것인가
      }
    }

  unset($_SESSION["cart"]);
  header("Location:basket.php");

}else{
  unset($_SESSION["cart"][$var][$id]);
  if(empty($_SESSION["cart"][$var])) {
    unset($_SESSION["cart"][$var]);
  }
  header("Location:basket.php");
}
?>
