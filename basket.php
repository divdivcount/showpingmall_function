<?php
session_start();
?>
<!doctype html>
<html>
<head>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>
  <style>
.table {
  border-collapse: collapse;
  border-top: 3px solid #168;
}
.table th {
  color: #168;
  background: #f0f6f9;
  text-align: center;
}
.table th, .table td {
  padding: 10px;
  border: 1px solid #ddd;
}
.table th:first-child, .table td:first-child {
  border-left: 0;
}
.table th:last-child, .table td:last-child {
  border-right: 0;
}
.table tr td:first-child{
  text-align: center;
}
.table caption{caption-side: bottom; display: none;}
  </style>
  <?php require_once('modules/form_head.php'); ?>
</head>
<body>

<?php
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

    ?>
      <table class= "table">
        <th>
        품목
        </th>
        <th>
        품목 아이디
        </th>
        <th>
          이미지
        </th>
        <th>
        제품 이름
        </th>
        <th>
        제품 가격
        </th>
        <th>
        수량
        </th>
        <th>
        삭제
        </th>
        <?php
          $d = $_SESSION["cart"];

        if(empty($d)){
          ?>
          <tr>
            <td colspan="7"><img src="files/gibon/jangba.png"></td>
          </tr>
          <?php
        }else{
          $k = 0;
        foreach ($d as $cat_key => $cat_arr) {
            foreach ($cat_arr as $id_key => $id_val) {
                $k++;
              ?>
        <tr>
          <td>
          <?= $cat_key ?>
          </td>
          <td>
          <?= $id_key ?>
          </td>
          <td>
            <img src="<?= $id_val["img"] ?>" width="75px" height= "75px" />
          </td>
          <td>
          <?= $id_val["name"] ?>
          </td>
          <td>
          <?= $id_val["price"]*$id_val["qty"] ?>
          </td>
          <td>
          <form action="changeqty.php?" method="get">
          <input type="hidden" name="var" value="<?=$cat_key?>">
          <input type="hidden" name="id" value="<?= $id_key ?>">
          <input type="text" id="qty<?= $k ?>" name="qty" value="<?= $id_val["qty"] ?>" readonly/>
          <input type="button" name="" value="^" onclick="document.getElementById('qty<?= $k ?>').value++"/>
          <input type="button" name="" value="v" onclick="document.getElementById('qty<?= $k ?>').value--"/>
          <input type="submit" value="수량변경" />
          </form>
          </td>
          <td>
          <input type="button" class="button vertical" id="obj" value="삭제" onclick="javascript:location.href='cart_del.php?var=<?= $cat_key ?>&id=<?= $id_key ?>&name=<?= $id_val["name"] ?>'"/>
          </td>
        </tr>
          <?php
          $total = [$id_val["price"]*$id_val["qty"]];
          $sum = 0;
          for($i = 0; $i < count($total); $i++){
             $sum += $total[$i];
            }
                }
              }
              echo $sum."총금액";
            }
            ?>
      </table>
      <button id="check_module" type="button" onclick="javascript:location.href='pay.php?var=<?= $cat_key ?>&img=<?= $id_val["img"] ?>&id=<?= $id_key ?>&price=<?= $sum ?>&name=<?= $id_val["name"] ?>'">결제</button>
    </body>
    </html>
