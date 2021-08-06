<?php session_start(); ?>
<?php include '../common/connect.php'; ?>

<?php

$deduct_amt = $_POST['balance'] - $_POST['entered_amount'];

$update_wall_bal = mysqli_query($conn , "UPDATE `my_wallet_tbl` SET `balance`='$deduct_amt' WHERE `user_id`='$_SESSION[user_id]'");

if($update_wall_bal){
    echo true;
}else{
    echo false;
}
?>