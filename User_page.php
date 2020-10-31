<?php
    require_once('modules/db.php');
    require_once('modules/notification.php');
    $mb_id = $_SESSION['ss_mb_id'];
    $sql = " select * from member where mb_id = TRIM('$mb_id') ";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn); // 데이터베이스 접속 종료

if(!$mb_id){
?>
<script type="text/javascript">
  alert("로그인이 필요합니다.");
  location.href = "login.php";
</script>
<?php
}else{
  echo $mb["mb_name"];
}
?>
