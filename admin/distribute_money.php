<?php session_start(); ?>
<?php include "../common/connect.php"; ?>
<?php 
 use PHPMailer\PHPMailer\PHPMailer; 
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception; 
  
 require '../PHPMailer/Exception.php'; 
 require '../PHPMailer/PHPMailer.php'; 
 require '../PHPMailer/SMTP.php';
 require '../vendor/autoload.php';

$user_id =  $_POST['share_id'];
$amount =  $_POST['dis_amount'];
$dis_admin_pro =  $_POST['dis_admin_pro'];
$user_email =  $_POST['user_email'];


$date = date("Y-m-d");
$query_user_balance = "SELECT `balance` FROM `my_wallet_tbl` WHERE `user_id`=$user_id";
$result_user_balance =  mysqli_query($conn ,  $query_user_balance);
$res_user_balance = mysqli_fetch_assoc($result_user_balance);
$pre_balance =  $res_user_balance['balance'];

$updated_balance = $pre_balance + $amount;

 $update_user_balance = mysqli_query($conn , "UPDATE `my_wallet_tbl` SET `balance`=$updated_balance WHERE `user_id`=$user_id");

 if($update_user_balance){
    $money_sent = mysqli_query($conn , "DELETE FROM `profit_log_tbl` WHERE distribute_user_id = $user_id");
    if($money_sent){

        $user_user_send = mysqli_query($conn , "INSERT INTO `profit_transfer_history_tbl`(`userid`, `profit_amount`, `admin_profit`) VALUES ($user_id , $amount , $dis_admin_pro)");
       
        if($user_user_send){
            $mail = new PHPMailer(true);
                                        
            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'ladoecom@gmail.com';  // SMTP username 
            $mail->Password = 'Amit@2407';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 




            $mail->setFrom('ladoecom@gmail.com', 'LADO'); 
            $mail->addReplyTo('ladoecom@gmail.com', 'LADO');


            $mail->addAddress($user_email);

            $mail->isHTML(true);

            $mail->Subject = "Money recevied.";

            $bodyContent = "You recevied Rs.$amount in your LADO wallet.";


            $mail->Body = $bodyContent;


            if($mail->send()){
            echo "Email Sent";
            }else{
                echo "Fail to send money"; 
            }
        }
        
    }else{
       echo "Fail to send money"; 
    }
     
 }else{
     echo "Fail to send money";
 }



?>