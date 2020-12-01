<?php
// Load Modules
require_once('modules/db.php');
require_once("modules/admin.php");
$id = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <link href="css/css_sub2.css" rel="stylesheet" type="text/css">
    <?php require_once('modules/form_head.php'); ?>
    <title></title>
    <style media="screen">
      tr.clicked {
        background-color: #0df;
      }
    </style>
  </head>
  <body>
    <?php require_once('modules/form_navigation.php'); ?>
    <header>
      <h1> <span style="float:right; color:#fff;"><?= $id ?>관리자</span></h1>
    </header>
    <main>
      <iframe id="admin_frame" align="right" frameBorder="" src="gallery_list.php" height="800px" width="100%"></iframe>
    </main>
    <script>
    function changeIframeUrl(url){
      document.getElementById("admin_frame").src = url;
    }
    </script>
  </body>
</html>
