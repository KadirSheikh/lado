<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 



if($_POST['balance'] < 100){
    echo 'Insufficient balance!';
}else if($_POST['pro_name'] == "#" && $_POST['pro_price'] == "#"){
    echo 'No Product Match!'; 
}
else{
    $make_wallet_req = "INSERT INTO `withdraw_request_tbl`(`requested_user_id`, `requested_username`, `mobile_no`, `delivery_add`,`pro_name`,`pro_amount`,`order_id`) VALUES ('$_SESSION[user_id]' , '$_POST[username]' , '$_POST[mbl_no]' , '$_POST[del_add]' , '$_POST[pro_name]' , '$_POST[pro_price]','$_POST[order_id]')";
    $result_wallet_req = mysqli_query($conn , $make_wallet_req);

    if($result_wallet_req){
        $update_wall_balance = mysqli_query($conn , "UPDATE `my_wallet_tbl` SET `balance`=`balance`-$_POST[pro_price] WHERE `user_id`='$_SESSION[user_id]'");
        if($update_wall_balance){
            echo 'Your request has been sent!';
        }else{
            echo 'Fail to sent request!'; 
        }
         
    }else{
        echo 'Fail to sent request!'; 
    }
}

?>