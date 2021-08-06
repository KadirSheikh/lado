<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 


$user_id =  $_POST['user_id'];
$order_id =  $_POST['order_id'];
$status =  $_POST['status'];


$update_query = "UPDATE `withdraw_request_tbl` SET `request_status`='$status' WHERE `requested_user_id` = '$user_id' AND `order_id`='$order_id'";
$result = mysqli_query($conn , $update_query);

if($result){
    
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