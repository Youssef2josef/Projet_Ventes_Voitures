<?php
session_start();
$_SESSION['logout'] = "ok";
unset($_SESSION['namelogin']);

header("Location: dashboardadmin.php");


?>