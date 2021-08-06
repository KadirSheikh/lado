
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php session_start(); ?>
<?php include '../../common/connect.php' ?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		// echo "<b>Transaction status is success</b>" . "<br/>";

		$get_user_data_buy = mysqli_query($conn , "SELECT * FROM `checkout_payment_tbl` WHERE `order_id`='$_POST[ORDERID]'");
		$res_get_data_buy = mysqli_fetch_assoc($get_user_data_buy);
		
        mysqli_query($conn , "UPDATE `checkout_payment_tbl` SET `status`='complete' WHERE `order_id`='$_POST[ORDERID]'");

		mysqli_query($conn , "UPDATE `customer_tbl` SET `first_purchase`=1 WHERE `id`='$res_get_data_buy[user_id]'");

		$select = mysqli_query($conn,"SELECT cart_tbl.cart_id, cart_tbl.product_id, cart_tbl.quantity, cart_tbl.user_id, products_tbl.id, products_tbl.name, products_tbl.price, products_tbl.image FROM `cart_tbl` INNER JOIN `products_tbl` ON cart_tbl.product_id = products_tbl.id WHERE cart_tbl.user_id = '$res_get_data_buy[user_id]'");
		while($row = mysqli_fetch_assoc($select)){
		  $product_name = $row['name'];
		  $expected_date  = date('Y/m/d', strtotime('+3 days'));
		  $sql = "INSERT INTO `order_tbl`(`order_id`,`user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name` , `product_quantity`, `total_price`,`payment_mode`,`expected_date`)  VALUES ('$_POST[ORDERID]','$res_get_data_buy[user_id]','$res_get_data_buy[user_name]','$res_get_data_buy[email]','$res_get_data_buy[mobile]','$res_get_data_buy[address]','$res_get_data_buy[city]','$row[product_id]', '$product_name' , '$row[quantity]','$res_get_data_buy[amount]','$res_get_data_buy[payment_mode]','$expected_date')";
		
		 $insert = mysqli_query($conn,$sql);
			 if($insert){
	
			   
			   $get_user_data = "SELECT * FROM `customer_tbl` WHERE `id`='$res_get_data_buy[user_id]'";
			   $result_get_data = mysqli_query($conn , $get_user_data);
		   
			   $res_get = mysqli_fetch_assoc($result_get_data);
		   
			   $user_level =  $res_get['level'];
			   $user_join =  $res_get['joined_by'];
			   $user_id_array = array();
		   
		   
			   if($user_level>=7){
				 //level n-1
				 $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
				 $res_1 = mysqli_fetch_assoc($result_get_data_func1);
				 if(mysqli_num_rows($result_get_data_func1) > 0){
				   
				   array_push($user_id_array,$res_1['id']);
				 }
				 
		   
				 //level n-2
				 $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
				 $res_2 = mysqli_fetch_assoc($result_get_data_func2);
				 if(mysqli_num_rows($result_get_data_func2) > 0 ){
				   
				   array_push($user_id_array,$res_2['id']);
				 }
				 
		   
				 //level n-3
				 $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
				 $res_3 = mysqli_fetch_assoc($result_get_data_func3);
				 if(mysqli_num_rows($result_get_data_func3) > 0){
				   
				   array_push($user_id_array,$res_3['id']);
				 }
				 
		   
				 //level n-5
				 $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
				 $res_4 = mysqli_fetch_assoc($result_get_data_func4);
				 if(mysqli_num_rows($result_get_data_func4) > 0){
				   
				   array_push($user_id_array,$res_4['id']);
				 }
				 
		   
				 //level n-6
				 $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
				
				 $res_5 = mysqli_fetch_assoc($result_get_data_func5);
				 if(mysqli_num_rows($result_get_data_func5)>0){
				   
				   array_push($user_id_array,$res_5['id']);
				 }
		   
			   }else if($user_level == 6){
				//level n-1
				$result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
				$res_1 = mysqli_fetch_assoc($result_get_data_func1);
				if(mysqli_num_rows($result_get_data_func1) > 0){
				  
				  array_push($user_id_array,$res_1['id']);
				}
				
		   
				//level n-2
				$result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
				$res_2 = mysqli_fetch_assoc($result_get_data_func2);
				if(mysqli_num_rows($result_get_data_func2) > 0 ){
				  
				  array_push($user_id_array,$res_2['id']);
				}
				
		   
				//level n-3
				$result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
				$res_3 = mysqli_fetch_assoc($result_get_data_func3);
				if(mysqli_num_rows($result_get_data_func3) > 0){
				  
				  array_push($user_id_array,$res_3['id']);
				}
				
		   
				//level n-5
				$result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
				$res_4 = mysqli_fetch_assoc($result_get_data_func4);
				if(mysqli_num_rows($result_get_data_func4) > 0){
				  
				  array_push($user_id_array,$res_4['id']);
				}
		   
			   }else if($user_level == 5){
				//level n-1
				$result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
				$res_1 = mysqli_fetch_assoc($result_get_data_func1);
				if(mysqli_num_rows($result_get_data_func1) > 0){
				  
				  array_push($user_id_array,$res_1['id']);
				}
				
		   
				//level n-2
				$result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
				$res_2 = mysqli_fetch_assoc($result_get_data_func2);
				if(mysqli_num_rows($result_get_data_func2) > 0 ){
				  
				  array_push($user_id_array,$res_2['id']);
				}
				
		   
				//level n-3
				$result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
				$res_3 = mysqli_fetch_assoc($result_get_data_func3);
				if(mysqli_num_rows($result_get_data_func3) > 0){
				  
				  array_push($user_id_array,$res_3['id']);
				}
			   }else if($user_level == 4){
				//level n-1
				$result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
				$res_1 = mysqli_fetch_assoc($result_get_data_func1);
				if(mysqli_num_rows($result_get_data_func1) > 0){
				  
				  array_push($user_id_array,$res_1['id']);
				}
				
		   
				//level n-2
				$result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
				$res_2 = mysqli_fetch_assoc($result_get_data_func2);
				if(mysqli_num_rows($result_get_data_func2) > 0 ){
				  
				  array_push($user_id_array,$res_2['id']);
				}
			   }else if($user_level == 3){
			   //level n-1
			   $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
			   $res_1 = mysqli_fetch_assoc($result_get_data_func1);
			   if(mysqli_num_rows($result_get_data_func1) > 0){
				 
				 array_push($user_id_array,$res_1['id']);
			   }
			   }else if($user_level == 2){
				 $user_id_array = array();
			   }else{
				$user_id_array = array();
			   }
		   
			  //  print_r($user_id_array);
		   
			   //calculate total profit for this user
		   
			   $num_users = sizeof($user_id_array);
	
	
			  $cart_profit = mysqli_query($conn , "SELECT SUM(`total_profit`) AS `total_cart_profit` FROM `cart_tbl` WHERE `user_id`='$res_get_data_buy[user_id]'");
			  $res_cart_profit = mysqli_fetch_assoc($cart_profit);
			  $total_profit_cart =  $res_cart_profit['total_cart_profit'];
			  $admin_profit = "";
			  $user_profit = "";
			  $each_user_profit = "";
	
		
		if($num_users == 5){
	
		  $admin_profit = round((50/100)*$total_profit_cart);
		  $user_profit = round($total_profit_cart - $admin_profit);
		  $each_user_profit = round($user_profit/$num_users);
		  
			
		}else if($num_users == 4){
	
		  $admin_profit = round((60/100)*$total_profit_cart);
		  $user_profit = round($total_profit_cart - $admin_profit);
		  $each_user_profit = round($user_profit/$num_users);
		  
	
		}else if($num_users == 3){
	
		  $admin_profit = round((70/100)*$total_profit_cart);
		  $user_profit = round($total_profit_cart - $admin_profit);
		  $each_user_profit = round($user_profit/$num_users);
		  
	
		}else if($num_users == 2){
	
		  $admin_profit = round((80/100)*$total_profit_cart);
		  $user_profit = round($total_profit_cart - $admin_profit);
		  $each_user_profit = round($user_profit/$num_users);
		  
	
		}else if($num_users == 1){
	
		  $admin_profit = round((90/100)*$total_profit_cart);
		  $user_profit = round($total_profit_cart - $admin_profit);
		  $each_user_profit = round($user_profit/$num_users);
		  
	
		}else{
		  $admin_profit = round($total_profit_cart);
		  $each_user_profit = 0;
		  
		}
	
		if($num_users == 0){
	
		   //admin wallet balance
		$result_admin_balance =  mysqli_query($conn , "SELECT `balance` FROM `admin_wallet_tbl` WHERE id=1");
		$res_admin_balance = mysqli_fetch_assoc($result_admin_balance);
		$update_adimin_balance = $admin_profit + $res_admin_balance['balance'];
	
	
	   $insert_admin_profit =  mysqli_query($conn ,"UPDATE `admin_wallet_tbl` SET `balance`='$update_adimin_balance' WHERE id=1");
	   if($insert_admin_profit){
		$query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$res_get_data_buy[user_id]'";
		$result_cart_delete = mysqli_query($conn , $query_cart_delete);
	
		if($result_cart_delete)
		{
			echo '
			<script>
			swal("Payment Successful!", "Thank You!" , "success").then(() => {
				window.location.href="../../my_cart.php";
			});
			</script>';
		}else
		{
			echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_cart.php";
			});
			</script>';
		}
	
	   }
		  
		}else{
	
		//admin wallet balance
		$result_admin_balance =  mysqli_query($conn , "SELECT `balance` FROM `admin_wallet_tbl` WHERE id=1");
		$res_admin_balance = mysqli_fetch_assoc($result_admin_balance);
		$update_adimin_balance = $admin_profit + $res_admin_balance['balance'];
	
	
	   $insert_admin_profit =  mysqli_query($conn ,"UPDATE `admin_wallet_tbl` SET `balance`='$update_adimin_balance' WHERE id=1");
	
	
	   foreach($user_id_array as $val){
		$update_profile_log = mysqli_query($conn , "SELECT * FROM `profit_log_tbl` WHERE `purchase_by_user_id` = '$res_get_data_buy[user_id]' AND `distribute_user_id` = $val");
		$update_profit_amount = $update_distributed_amount = $update_admin_profit = "";
		
		if(mysqli_num_rows($update_profile_log)>0){
		  while($row_update_profile_log = mysqli_fetch_assoc($update_profile_log)){
			$update_profit_amount =  $row_update_profile_log['profit_amount'];
			$update_distributed_amount =  $row_update_profile_log['distributed_amount'];
			$update_admin_profit =  $row_update_profile_log['admin_profit'];
		}
		
	
		$updated_pro_amount = $update_profit_amount + $total_profit_cart;
		$updated_dis_amount = $update_distributed_amount + $each_user_profit;
		$updated_admin_pro = $update_admin_profit + $admin_profit;
	
		$update_pre_data = mysqli_query($conn ,"UPDATE `profit_log_tbl` SET `profit_amount`='$updated_pro_amount',`distributed_amount`='$updated_dis_amount',`admin_profit`='$updated_admin_pro' WHERE `purchase_by_user_id` = '$res_get_data_buy[user_id]' AND `distribute_user_id` = $val");
		if($update_pre_data){
		  
		  $query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$res_get_data_buy[user_id]'";
		  $result_cart_delete = mysqli_query($conn , $query_cart_delete);
	
		  if($result_cart_delete){
			echo '
			<script>
			swal("Payment Successful!", "Thank You!" , "success").then(() => {
				window.location.href="../../my_cart.php";
			});
			</script>';
		  }
	
		}
	
	
		}
		else{
		  
			$result_insert_profit = mysqli_query($conn , "INSERT INTO `profit_log_tbl`(`purchase_by_user_id`, `distribute_user_id`, `profit_amount`, `distributed_amount`, `admin_profit` , `order_id`) VALUES ('$res_get_data_buy[user_id]','$val','$total_profit_cart','$each_user_profit','$admin_profit','$_POST[ORDERID]')");
			if($result_insert_profit){
			  
			  $query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$res_get_data_buy[user_id]'";
			  $result_cart_delete = mysqli_query($conn , $query_cart_delete);
			  
			  if($result_cart_delete){
				echo '
					<script>
					swal("Payment Successful!", "Thank You!" , "success").then(() => {
						window.location.href="../../my_cart.php";
					});
					</script>';
			  }
	
			}
			
		}
	
	  
	}
	
	// echo $success_msg;
		  
	
		}
	
		}else{
			echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_cart.php";
			});
			</script>';
			 }
	
			//  while end
		 
		}

		// print_r($_SESSION);
		
	
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_cart.php";
			});
			</script>';
	}

	
	if (isset($_POST) && count($_POST)>0 ){ 

			
		$get_user_data_buy = mysqli_query($conn , "SELECT * FROM `checkout_payment_tbl` WHERE `order_id`='$_POST[ORDERID]'");
		$res_get_data_buy = mysqli_fetch_assoc($get_user_data_buy);

		// echo $res_get_data_buy['user_id'];

		$_SESSION['loggedin'] = true;
		$_SESSION['user_id'] = $res_get_data_buy['user_id'];
		$_SESSION['user_name'] = $res_get_data_buy['user_name'];
	

}
// print_r($_SESSION);	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

