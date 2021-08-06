<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 


mysqli_query($conn , "UPDATE `profit_log_tbl` SET `is_read_by_user`=1 WHERE `distribute_user_id`='$_SESSION[user_id]'");

?>