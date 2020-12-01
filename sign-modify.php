<?php
// Load Modules
require_once('modules/db.php');

// Parameter

// Functions

// Process
$loginObj = new ProLogin();
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <title></title>
    <link href="css/css_sub2.css" rel="stylesheet" type="text/css">
    <link href="css/admin_cul.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </head>
  <body>
    <main>
      <form class="sign_pw_bg" action="sign-pwchange.php" method="post">
        <div class="sign_pw">
          <div class="sign_box">
        <div class="textbox">
            <input type="password" placeholder="현재 비밀번호" name="old">
        </div>
          <br>
        <div class="textbox">
          <input type="password" placeholder="새 비밀번호" name="new">
        </div>
          <br>
        <div class="textbox">
          <input type="password" placeholder="새 비밀번호 확인" name="newre">
        </div>
          <br>
        <button type="submit" class="btn" value="">변경하기</button>
        </div>
      </div>
      </form>
    </main>
  </body>
</html>
