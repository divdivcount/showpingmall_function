<?php
require_once('modules/db.php');
require_once("modules/admin.php");

//admin_ajax

$mb_num = empty($_GET["mb_num"]) ? "" : $_GET["mb_num"];// 회원번호
$p_id = empty($_GET["p_id"]) ? "" : $_GET["p_id"];//주문번호
$besong= empty($_GET["besong"]) ? "" : $_GET["besong"];//주문번호
echo $mb_num;
echo $p_id;
echo $besong;
if($mb_num&&$p_id&&$besong){
  $dao1 = new ProDAO();
  $dao1->Admin_delivery($mb_num,$p_id,$besong);
  ?>
  <script>
      alert("배송 현황이 완료되었습니다.");
      history.back();
  </script>
  <?php
}else{
  echo "Admin_delivery";
}
//payhistory
$order_id_sel_rm = empty($_GET["order_id_sel_rm"]) ? "" : $_GET["order_id_sel_rm"];//주문번호
$mb_num_sel_rm = empty($_GET["mb_num_sel_rm"]) ? "" : $_GET["mb_num_sel_rm"];// 회원번호
$mb_sel_rm  = empty($_GET["mb_sel_rm"]) ? "" : $_GET["mb_sel_rm"];//환불 처리중
$pu_banpum_check = empty($_GET["pu_banpum_check"]) ? "" : $_GET["pu_banpum_check"]; //버튼 비활성화
$pu_banpum_check = 0;
if($order_id_sel_rm&&$mb_num_sel_rm&&$mb_sel_rm){
  $dao = new ProDAO();
  $dao->User_delivery($order_id_sel_rm,$mb_num_sel_rm,$mb_sel_rm, $pu_banpum_check);
  ?>
  <script>
      alert("반품 신청이 완료되었습니다.");
      history.back();
  </script>
  <?php
}else{
  echo "User_delivery";
}
?>
