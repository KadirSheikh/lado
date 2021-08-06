<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 
$check_user_exist = mysqli_query($conn , "SELECT * FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'");
$row_current_balance = mysqli_fetch_assoc($check_user_exist);

$current_balance = $row_current_balance['balance'];
if($current_balance > 100){
    $update_balance = $current_balance -100;


    $count_user_exist = mysqli_num_rows($check_user_exist);
    if($count_user_exist > 0){
        $result_update_b_s = mysqli_query($conn , "UPDATE `my_wallet_tbl` SET `balance`=$update_balance,`is_dc_buy`='Applied' WHERE `user_id`='$_SESSION[user_id]'");
        
    }
}else{
    echo "Technical Error!";
}





?>