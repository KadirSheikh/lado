<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 


$user_id = $_POST['u_id'];

$result_activate = mysqli_query($conn , "UPDATE `customer_tbl` SET `is_id_active`='No' WHERE `id`='$user_id'");

if($result_activate){
    echo json_encode(array(
        "status" => true,
        "message" => "Inctivated Successfully."
    ));

}else{
    echo json_encode(array(
        "status" => false,
        "message" => "Fail to inactivate."
    ));
}





?>