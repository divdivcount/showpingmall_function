<?php
// Load Modules
require_once('modules/notification.php');

// Parameter

// Functions

// Process
session_start();
session_destroy();
userGoNow('admin_login.php');
?>
