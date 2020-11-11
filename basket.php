<?php
session_start();
echo $_SESSION["cart"];
?>
<!doctype html>
<html>
<head>
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

    <?php require_once('modules/form_head.php'); ?>
  </style>
</head>
<body>

<?php
$cart = explode(',', $_SESSION["cart"]);
for ($i = 0; $i < count($cart); $i+=4) {

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

    ?>
      <table class= "table">
        <th>
        품목
        </th>
        <th>
        품목 아이디
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
        if(!$d){
          ?>
          <tr>
            <td>장바구니를 담아주세요</td>
          </tr>
          <?php
        }else{
        foreach ($d as $cat_key => $cat_arr) {
            foreach ($cat_arr as $id_key => $id_val) {
              ?>
        <tr>
          <td>
          <?= $cat_key ?>
          </td>
          <td>
          <?= $id_key ?>
          </td>
          <td>
          <?= $id_val["name"] ?>
          </td>
          <td>
          <?= $id_val["price"]*$id_val["qty"] ?>
          </td>
          <td>
          <?= $id_val["qty"] ?>
          </td>
          <td>
          <input type="button" class="button vertical" id="obj" value="삭제" onclick="javascript:location.href='cart_del.php?var=<?= $cat_key ?>&id=<?= $id_key ?>&name=<?= $id_val["name"] ?>'"/>
          </td>
        </tr>
        <?php
                }
              }
            }
            ?>
      </table>
    </body>
    </html>
