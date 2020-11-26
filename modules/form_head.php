<?php
  require_once('modules/form_check.php');
?>
<?php if(UserPage()) : ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="script/navigation.js"></script>
  <link href="css/css_sub2.css" rel="stylesheet" type="text/css">
  <link href="css/index_css.css" rel="stylesheet" type="text/css">
  <link href="css/Userpage.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php elseif(AdminPage()) : ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="css/administrator.css" rel="stylesheet" type="text/css">
  <link href="css/admin_cul.css" rel="stylesheet" type="text/css">
<?php endif ?>



<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
