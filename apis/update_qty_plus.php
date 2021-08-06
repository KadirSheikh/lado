<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 
 $qty = $_POST['quantity'];
 $p_id = $_POST['product_id'];
 $total_price = $_POST['price']*$qty;

 $user_id = $_POST['user_id'];

 $get_profit = mysqli_query($conn,"SELECT * FROM `cart_tbl` WHERE `product_id`= '$p_id' AND `user_id`='$user_id'");
 $res_profit = mysqli_fetch_assoc($get_profit);
 $total_pro_profit = $res_profit['product_profit'] + $res_profit['total_profit'];


$query = "UPDATE `cart_tbl` SET `quantity`=$qty , `total_price`=$total_price , `total_profit`='$total_pro_profit' WHERE `product_id` = $p_id AND `user_id`=$user_id";
$result = mysqli_query($conn , $query);

$sum_total_price = "";

$sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
$result_sum = mysqli_query($conn , $sum_query);
 while($row = mysqli_fetch_assoc($result_sum)){
    $sum_total_price = $row['total'];
 }
 
if($result){
    echo json_encode(array(
        "status" => true,
        "total" => $total_price,
        "subtotal" => $sum_total_price
    ));
}else{
    echo json_encode(array(
        "status" => false,
        "total" => $total_price,
        "subtotal" => $sum_total_price
    ));
}

?>