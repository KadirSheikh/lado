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

if(isset($_POST['confirm_otp'])){

    

    $verify_otp = mysqli_query($conn,"SELECT * FROM `forget_pass_otp_tbl` WHERE `otp`='$_POST[otp]' AND `is_expired`='0' AND `email`='$_SESSION[email]'");
    if(mysqli_num_rows($verify_otp)>0){
      $expire_otp = mysqli_query($conn,"UPDATE `forget_pass_otp_tbl` SET `is_expired`='1' WHERE `otp`='$_POST[otp]' AND `email`='$_SESSION[email]'");
      if($expire_otp){

  
       echo '<script type="text/javascript">
       swal("OTP Verification Successful :)", "Reset your password.", "success").then(() => {
       window.location.href="reset_password.php";
       });
       
       </script>';
       
        
      }else { 
        echo '<script type="text/javascript">
         swal("Invalid OTP", "Go back and try again.", "error");
    
       </script>';
          }
    }else { 
      echo '<script type="text/javascript">
       swal("Invalid OTP", "Go back and try again.", "error");
  
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
                <h3 style="font-weight:700;" class="mb-5">Verify OTP</h3>
                <form action="" method="post" name="login">

                    <div class="form-group">
                        <label for="email">OTP</label> <span class="required">*</span>
                        <input type="number" class="form-control1" placeholder="Enter OTP" value=""
                            id="otp" name="otp" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit btn-block" value="Check OTP" name="confirm_otp" />
                    </div>
                    <div class="form-group text-center">
                        <a href="forget_password.php" class="ForgetPwd">Get OTP</a>
                    </div>
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

                    otp: {
                        required: true,
                        otp: true
                    }
                },
                messages: {
                    otp: "Please enter OTP sent to your email address."

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    })
    </script>
</body>