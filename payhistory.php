<?php
    require_once('modules/db.php');
    require_once('modules/notification.php');
    $mb_id = $_SESSION['ss_mb_id'];
    $sql = " select * from member where mb_id = TRIM('$mb_id') ";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn); // 데이터베이스 접속 종료
    $dao = new Pay_history();
    $result = $dao ->SelectHistory();
if(!$mb['mb_num']){
?>
  <script>
    alert("로그인이 필요합니다.");
    history.back();
  </script>
<?php
}else{
  foreach($result as $row){
    $row["cat_key"];
  }
}
 ?>
