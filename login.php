<?php session_start(); ?>
<title>LADO | Login</title>
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

display:none;

}


@media (max-width:767px) {
    .avatar {
        display: none;
    }

    .avatar1 {
        display:block;
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
.required{
    color:red;
}
</style>

<?php 
   
   date_default_timezone_set('Asia/Kolkata');
   
   
   function generate_token() {

         $token = md5(uniqid(rand(), TRUE));
         $_SESSION["token"] = $token;
   
     return $token;
   }
   
   function verify_token($token){
       if ( $token != $_SESSION["token"]) {
           // Reset token
           $_SESSION["token"] = '' ;
        //    die("CSRF token validation failed");
         }
   }

   
 

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $db_mobile = $db_psw = "";
    if(isset($_POST['login'])) {

    verify_token($_POST["csrf_token"]);

   $mobile =test_input($_POST['mobile']);
   $password = test_input($_POST['password']);

   
  
   $query = "SELECT * FROM `customer_tbl` WHERE mobile_no = '{$mobile}'";
   $data = mysqli_query($conn , $query);
   $num_rows = mysqli_num_rows($data);
   if ($num_rows == 1) {
     $_SESSION['loggedin'] = true;
 }
   

        while($row = mysqli_fetch_assoc($data)){
          
          $db_mobile = $row['mobile_no'];
          $db_psw = $row['password'];
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['user_name'] = $row['full_name'];
          $_SESSION['referal_code'] = $row['referal_code'];

          
        }
        
$verify = password_verify($password, $db_psw);
if($mobile === $db_mobile){
  if($verify){
    
    echo '<script>
    swal("Login Successful!", "Lets Shop" , "success").then(() => {
        window.location.href="index.php";
        });
    </script>'; 

   }else{
    echo '<script>
    swal("Incorrect Password!", "" , "error");
    </script>'; 

   }

 
}else{
    echo '<script>
    swal("Incorrect Mobile Number!", "" , "error");
    </script>'; 

   }



}
   ?>

<body>

    <div class="container login-container" style="margin-top:200px;background-color:white;">
        <div class="row">
            <div class="col-md-6 login-form-1" style="border-right:2px solid black;">
            <img src="assets/images/signinup/smile.png" class="avatar">
                <img src="assets/images/signinup/smile.png" class="avatar1">
                <h3 style="font-weight:700;">Sign In</h3>
                <form action="" method="post" name="login">
                <input type="hidden" class="form-control" name="csrf_token"
                                value="<?php echo generate_token(); ?>">
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label><span class="required"> *</span>
                        <input type="number" class="form-control1" placeholder="Enter Mobile No." value="" name="mobile" id="mobile" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><span class="required"> *</span>
                        <div class="row">
                            <div class="col-md-10 col-10">
                                <input type="password" class="form-control1" placeholder="Enter Password" id="password" name="password"
                                    value="" />
                            </div>
                            <div class="col-md-2 mt-2 col-2">
                                <i class="fa fa-eye" id="togglePassword" style="font-size:20px;"></i>
                            </div>
                        </div>


                    </div>
 
                    <div class="form-group">
                        <input type="submit" class="btnSubmit btn-block" value="Sign In" name="login"/>
                    </div>
                    <div class="form-group text-center">
                        <a href="forget_password.php" class="ForgetPwd">Forget Password?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form-2" style="text-align:center;transform: translateY(15%);">
                <img src="assets/images/signinup/signincake.jpg" alt="" class="img-fluid">
                <h3>First time here? <a href="registration.php" style="color:#3F51B5;text-decoration:none !important;">Sign Up</a> </h3>

            </div>
        </div>
    </div>
    </div>


    <?php include 'common/footer.php' ?>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    $(document).ready(function(){
        $(function() {
        $("form[name='login']").validate({
            rules: {

                mobile: {
                    required: true,
                    mobile: true
                },
                password: {
                    required: true,

                }
            },
            messages: {
                mobile: "Please enter mobile number",

                password: {
                    required: "Please enter password",

                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    })
    </script>
</body>