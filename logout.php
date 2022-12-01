<?php 
session_start();
unset($_SESSION['logged_in']);
unset($_SESSION['u_id']);
session_destroy();

header("location: login.php");
?>