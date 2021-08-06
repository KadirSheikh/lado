<?php session_start(); ?>
<?php include "../common/connect.php"; ?>
<?php 

$request_id=$_POST["r_id"];
$amount_req=$_POST["amount_req"];


$date = date('Y-m-d');

$check_user_exist = mysqli_query($conn , "SELECT * FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'");
$row_current_balance = mysqli_fetch_assoc($check_user_exist);

$current_balance = $row_current_balance['balance'];
$update_balance = $current_balance - $amount_req;
if($current_balance > $amount_req){
    $query = mysqli_query($conn ,"UPDATE `withdraw_request_tbl` SET `is_read`='1',`request_status`='paid',`allow_date`='$date' WHERE `request_id`=$request_id");
    $result_update_b_s = mysqli_query($conn , "UPDATE `my_wallet_tbl` SET `balance`=$update_balance,`is_dc_buy`='No' WHERE `user_id`='$_SESSION[user_id]'");
}else{
    echo "Insufficient amount in user's wallet";
}



?>