<?php session_start(); ?>
<?php include '../common/connect.php'; ?>

<?php 

   $p_id = $_POST['p_id'];
   $u_id =  $_SESSION['user_id'];


   $update_query = "UPDATE `order_tbl` SET `cancel_request`=1 WHERE `user_id`= $u_id AND `order_id`='$p_id'";
   
   $result_update = mysqli_query($conn , $update_query);
       if($result_update){
        $cancel_order_pro = mysqli_query($conn ,"UPDATE `profit_log_tbl` SET `is_order_cancelled`=1 WHERE `order_id` LIKE '%$p_id%' AND `is_order_cancelled` = 0");
        if($cancel_order_pro){
            echo json_encode(array(
                "status" => true
            ));
    
        }else{
            echo json_encode(array(
           "status" => false
       ));

      }
    
          
       }else{
             echo json_encode(array(
            "status" => false
        ));

       }

?>