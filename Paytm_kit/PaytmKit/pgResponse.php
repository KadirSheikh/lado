
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
		$get_user_data_buy1 = mysqli_query($conn , "SELECT * FROM `buy_100_coupon_tbl` WHERE `order_id`='$_POST[ORDERID]'");
		$res_get_data_buy1 = mysqli_fetch_assoc($get_user_data_buy1);
		

		$check_user_exist1 = mysqli_query($conn , "SELECT * FROM `my_wallet_tbl` WHERE `user_id`='$res_get_data_buy1[user_id]'");
		$row_current_balance1 = mysqli_fetch_assoc($check_user_exist1);

		$current_balance1 = $row_current_balance1['balance'];
		$update_balance1 = $current_balance1 + 100;
		$update_current_balance1 =  mysqli_query($conn ,"UPDATE `my_wallet_tbl` SET `balance`= $update_balance1,`is_dc_buy`='Yes' WHERE `user_id`='$res_get_data_buy1[user_id]'");
		if($update_current_balance1){
		
		$update_id_status1 =  mysqli_query($conn ,"UPDATE `customer_tbl` SET `is_id_active`='Yes' WHERE `id`='$res_get_data_buy1[user_id]'");
		if($update_id_status1){
           $update_pay_status = mysqli_query($conn , "UPDATE `buy_100_coupon_tbl` SET `status`='complete' WHERE `order_id`='$_POST[ORDERID]'");
		
		   if($update_pay_status){
			echo '
			<script>
			swal("Payment Successful!", "Thank You!" , "success").then(() => {
				window.location.href="../../my_account.php";
			});
			</script>';
		   }
		}else{
			echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_account.php";
			});
			</script>';
		}

		 
		}else{
			echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_account.php";
			});
			</script>';
		}


		// print_r($_SESSION);
		
	
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo '
			<script>
			swal("Payment Failed!", "Try Again" , "error").then(() => {
				window.location.href="../../my_account.php";
			});
			</script>';
	}

	
	if (isset($_POST) && count($_POST)>0 ){ 

			
		$get_user_data_buy = mysqli_query($conn , "SELECT * FROM `buy_100_coupon_tbl` WHERE `order_id`='$_POST[ORDERID]'");
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

