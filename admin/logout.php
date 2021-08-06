<?php 

$_SESSION['admin_id'] = "";
session_destroy();

header("Location:login.php");

?>