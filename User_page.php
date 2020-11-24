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
<table>
  <tr>
    <td style="width:200px; height:83px;">
      <a href="index.php"><img src="files/logo/logo.png" width="100%" height="64px;"/></a>
    </td>
      <?php
          if($mb['mb_num']){
          }else {
            echo "<td style='float:right; margin-top:20px;'><a href='./login.php'>login</a></td>";
          }
       ?>
  </tr>
</table>
<script type="text/javascript">
  alert("로그인이 필요합니다.");
  location.href = "login.php";
</script>
<?php
}else{
?>
<!doctype html>
<html>
  <head>
    <?php require_once('modules/form_head.php'); ?>
  </head>
  <body>
    <table>
      <tr>
        <td style="width:200px; height:83px;">
          <a href="index.php"><img src="files/logo/logo.png" width="100%" height="64px;"/></a>
        </td>
        <td style="float:right; margin-top:20px;"><?= $mb['mb_name']."님"."\t"?>&nbsp;<a href='./logout.php'>로그아웃</a></td>
      </tr>
    </table>
    <div class="u_main_wrap">
      <div class="u_nav">
        <div class="u_nav_Tocks">
          <h4>나의 Toks</h4>
        </div>
        <div class="u_nav_wrap">
            <ul>
              <li>
                <p style="font-weight:bold; margin-bottom:10px;">나의 쇼핑</p>
              </li>
              <li>
              <a href="./register.php?mode=modify">나의 맴버쉽</a>
              </li>
              <li>
                <a href="./basket.php">장바구니</a>
              </li>
              <li>
                <a href="./test.php">구매목록</a>
              </li>
            </ul>
        </div>
        <div class="u_nav_wrap">
            <ul>
              <li>
                <p style="font-weight:bold; margin-bottom:15px;">나의 정보</p>
              </li>
              <li>
                <a href="./register.php?mode=modify">회원정보수정</a>
              </li>
              <li>
                <a href="#">회원탈퇴</a>
              </li>
            </ul>
        </div>
      </div>
      <div class="u_gnb">
        <div class="u_gnb_wrap">
          <h6>나의 등급</h6>
        </div>
        <div class="u_gnb_wrap">
          <h6>배송중</h6>
        </div>
        <div class="u_gnb_wrap">
          <h6>할인쿠폰</h6>
        </div>
        <div class="u_gnb_wrap">
          <h6>상담 신청</h6>
        </div>
      </div>
    </div>
    <div class"u_iframe">
    </div>
  </body>
</html>
<?php
}
?>
