<?php
  require_once('modules/notification.php');
  require_once("modules/admin.php");
  $mb_p_num = empty($_POST["mb_p_num"]) ? "1" : $_POST["mb_p_num"];
  $order_p_id = empty($_POST["order_p_id"]) ? "2" : $_POST["order_p_id"];
  $pu_p_id = empty($_POST["pu_p_id"]) ? "3" : $_POST["pu_p_id"];
  $pr_p_name = empty($_POST["pr_p_name"]) ? "4" : $_POST["pr_p_name"];
  $pr_p_qty = empty($_POST["pr_p_qty"]) ? "5" : $_POST["pr_p_qty"];
  $p_pa = empty($_POST["p_pa"]) ? "6" : $_POST["p_pa"];
  $p_date = empty($_POST["p_date"]) ? "7" : $_POST["p_date"];
  $p_be = empty($_POST["p_be"]) ? "7" : $_POST["p_be"];
  //에코 테이블 만들어 입력 폼도 만들어
  echo "<table class='table'>";
  echo "<tr>";
  echo "<th>회원 번호</th>";
  echo "<th>주문 번호</th>";
  echo "<th>물품 번호</th>";
  echo "<th>물품 이름</th>";
  echo "<th>주문 수량</th>";
  echo "<th>구매 가격</th>";
  echo "<th>구매 일시</th>";
  echo "<th>배송 처리</th>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><font color='red'>",$mb_p_num,"</font></td>";
  echo "<td><font color='red'>",$order_p_id,"</font></td>";
  echo "<td><font color='red'>",$pu_p_id ,"</font></td>";
  echo "<td><font color='red'>",$pr_p_name,"</font></td>";
  echo "<td><font color='red'>",$pr_p_qty,"</font></td>";
  echo "<td><font color='red'>",$p_pa,"</font></td>";
  echo "<td><font color='red'>",$p_date,"</font></td>";
  echo "<td>";
  echo "<form action='admin_delivery_ok.php' method='get'>";
  echo "<select name='besong'>";
  echo "<option value='접수 완료'>접수 완료</option>";
  echo "<option value='배송중'>배송중</option>";
  echo "<option value='배송 완료'>배송 완료</option>";
  echo "<option value='반품중'>반품중</option>";
  echo "<option value='반품 완료'>반품 완료</option>";
  echo "</select>";
  echo "<input type='hidden' name='mb_num' value='$mb_p_num' />";
  echo "<input type='hidden' name='p_id' value='$order_p_id' />";
  echo "<input type='submit' value='처리' />";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  //c. php 로 만들어 배송 처리 한다.
?>
