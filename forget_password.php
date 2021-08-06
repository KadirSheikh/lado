<?php session_start(); ?>
<title>LADO | Forget Password</title>
<?php include 'common/connect.php' ?>
<?php include 'common/header.php' ?>

<style>
body {
    margin: 0;
    padding: 0;
    background: url(assets/images/signinup/bg2.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}

.login-container {
    margin-top: 5%;
    margin-bottom: 5%;

    padding-top: 50px;
    padding-bottom: 60px;

    border-radius: 20px;
}

.login-form-1 {
    padding: 5%;

}

.login-form-1 h3 {
    text-align: center;

}

.login-container form {
    padding: 10%;
}

.btnSubmit {
    width: 50%;
    border-radius: 1rem;
    padding: 4%;
    border: none;
    cursor: pointer;
    background-color: black !important;
}

.login-form-1 .btnSubmit {
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}

.login-form-1 .ForgetPwd {
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
    color: black !important;
}

label {
    font-size: 20px;
    font-weight: 700;
}

.form-control1 {
    display: block;
    width: 100%;
    padding: 1rem .5rem;
    font-size: 1rem;
    line-height: 1.25;
    color: black;
    border: 1px solid white;
    border-bottom: 2px solid black !important;
}

textarea:focus,
input:focus {
    outline: none;
    border-bottom: 3px solid #3F51B5 !important;
}

.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -100px;
    right: -55px;
    background-color: white;
}

.avatar1 {

    display: none;

}


@media (max-width:767px) {
    .avatar {
        display: none;
    }

    .avatar1 {
        display: block;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        top: -100px;
        right: 120px;
        background-color: white;
    }
}

.error {
    color: red;
    font-size: 13px;
}

.form-control1.error {
    color: black !important;
}

.required {
    color: red;
}
</style>


<body>


    <?php 
	
   use PHPMailer\PHPMailer\PHPMailer; 
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception; 
    
   require 'PHPMailer/Exception.php'; 
   require 'PHPMailer/PHPMailer.php'; 
   require 'PHPMailer/SMTP.php';
   require 'vendor/autoload.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST['send_otp'])){

    $otp = mt_rand(100000,999999);
    $email = test_input($_POST['email']);
    $check_email = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `email`='$email'");
    if(mysqli_num_rows($check_email) > 0){
    $_SESSION['email'] = $email;
    
    $insert_otp = mysqli_query($conn,"INSERT INTO `forget_pass_otp_tbl`(`email`,`otp`, `is_expired`) VALUES ('$_SESSION[email]','$otp','0')");

    if($insert_otp){
        

        $mail = new PHPMailer(true);

        
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'ladoecom@gmail.com';          // SMTP username 
        $mail->Password = 'Amit@2407';         // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 

        $mail->setFrom('ladoecom@gmail.com', 'LADO'); 
        $mail->addReplyTo('ladoecom@gmail.com', 'LADO');

        $mail->addAddress($_SESSION['email']);

        $mail->isHTML(true);

        $mail->Subject = "Reset Your Password - LADO";

        $bodyContent = '<p> Dear Sir/Madam,</p>';
        $bodyContent .= '<p><b> Please use the following OTP to reset your password. </b></p>'; 
        $bodyContent .=  '<h2>'. $otp. '</h2>'; 
        $mail->Body = $bodyContent;


	if($mail->send()){

        echo '<script type="text/javascript">
        swal("OTP For Password Reset", "OTP for password reset has been sent to your email address.", "success").then(() => {
            window.location.href = "confirm_otp.php";
        });;
                 
      </script>';
	}else{
    echo '<script type="text/javascript">
    swal("Something went wrong :(", "Go back and try again.", "error");
  </script>';

  }

}


}else{
    echo '<script type="text/javascript">
    swal("Entered email not found!", "Please use registered email.", "error");
  </script>';
}
  
}


?>

    <div class="container login-container" style="margin-top:150px;background-color:white;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 login-form-1">
                <!-- <img src="assets/images/signinup/smile.png" class="avatar"> -->
                <!-- <img src="assets/smile.png" class="avatar1"> -->
                <h3 style="font-weight:700;" class="mb-5">Forget Password</h3>
                <form action="" method="post" name="login">

                    <div class="form-group">
                        <label for="email">Email Address</label> <span class="required">*</span>
                        <input type="email" class="form-control1" placeholder="Enter Your Registered Email" value=""
                            id="email" name="email" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit btn-block" value="Send" name="send_otp" />
                    </div>
                    <!-- <div class="form-group text-center">
                        <a href="login.php" class="ForgetPwd">Login</a>
                    </div> -->
                </form>
            </div>
            <div class="col-md-2"></div>
            <!-- <div class="col-md-6 login-form-2" style="text-align:center;transform: translateY(15%);">
                <img src="assets/images/signinup/signincake.jpg" alt="" class="img-fluid">
                <h3>First time here? <a href="registration.php" style="color:#3F51B5;text-decoration:none !important;">Sign Up</a> </h3>

            </div> -->
        </div>
    </div>
    </div>



    <?php include 'common/footer.php' ?>
    <script>
    $(document).ready(function() {
        $(function() {
            $("form[name='login']").validate({
                rules: {

                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: "Please enter a valid email address"

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    })
    </script>
</body>