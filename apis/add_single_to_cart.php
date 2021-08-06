<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php

$product_id =  $_POST['p_id'];
$product_quantity =  $_POST['quantity'];
$total_price =  $_POST['total_price'];

    echo $query = "SELECT * FROM `products_tbl` WHERE id=$product_id";
    $data = mysqli_query($conn , $query);
    $name = $image = $price = "";
    while($row = mysqli_fetch_assoc($data)){
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
        $type = $row['type'];
    }

    $u_id = $_SESSION['user_id'];

    echo $check_q = "SELECT `product_id`,`user_id`,`quantity` , `total_price` FROM `cart_tbl` WHERE `product_id`= '$product_id' AND `user_id`='$u_id'";

    $check = mysqli_query($conn,$check_q);

    if(mysqli_num_rows($check)>0){
        
      $res = mysqli_fetch_assoc($check);
      $product_quantity=$res['quantity']+$product_quantity;
      $total_price = $res['total_price']+$total_price;
    
      echo $update_q = "UPDATE `cart_tbl` SET `quantity`='$product_quantity' , `total_price`='$total_price' WHERE `product_id`= '$product_id' AND `user_id`='$u_id'";
      $update = mysqli_query($conn,$update_q);
      if ($update) {
        echo json_encode(array(
        "status" => true,
        "message" => "Item added"
    ));
      }
      else{
        echo json_encode(array(
            "status" => false,
             "message" => "Failed to add to cart."
        ));
      }
    } else{


        echo $insert_cart_q = "INSERT INTO `cart_tbl`(`user_id`, `product_id`, `product_name`, `product_image`,  `product_price`, `product_type` , `quantity` , `total_price`) VALUES ($u_id,$product_id,'$name','$image',$price,'$type' , '$product_quantity',$total_price)";
        $data_cart = mysqli_query($conn , $insert_cart_q);

        if($data_cart){
            echo true;

        }else{
            echo false;
        }
        }


    

?>