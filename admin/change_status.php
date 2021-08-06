<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 


$id =  $_POST['o_id'];

$status =  $_POST['status'];

if($status == "Order delivered"){
    $update_first_purchase = mysqli_query($conn , "UPDATE `customer_tbl` SET `first_purchase`=1 WHERE `id`='$_SESSION[user_id]'");
    
}

$update_query = "UPDATE `order_tbl` SET `status`='$status' WHERE `order_id` = '$id' AND `cancel_request` = 0";
$result = mysqli_query($conn , $update_query);

if($result){
    $update_pro_status = mysqli_query($conn ,"UPDATE `profit_log_tbl` SET `order_status`='$status' WHERE `order_id` LIKE '%$id%' AND `is_order_cancelled` = 0");
    if($update_pro_status){
        echo json_encode(array(
            "status" => true
        ));
    }
   
}else{
    echo json_encode(array(
        "status" => false
    ));
}


   




?>