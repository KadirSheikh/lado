<?php session_start();

$_SESSION['user_id'] = "";
$_SESSION['user_name'] = "";
$_SESSION['loggedin'] = false;

session_destroy();

header("Location:login.php");

?>