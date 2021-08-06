<?php session_start(); ?>
<title>LADO | Register</title>
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
    border: 1px solid black;
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
<?php 
   
                        // session_regenerate_id( true );
                        date_default_timezone_set('Asia/Kolkata');
                        
                        
                        function generate_token() {

                                $token = md5(uniqid(rand(), TRUE));
                                $_SESSION["token"] = $token;
                        
                            return $token;
                        }
                        
                        function verify_token($token){
                            if ( $token != $_SESSION["token"]) {
                                // Reset token
                                unset($_SESSION["token"]);
                                die("CSRF token validation failed");
                                }
                        }

   
                  function test_input($data) {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                 }
                   
                   if(isset($_POST['register'])){
   
                       verify_token($_POST["csrf_token"]);

                       if(!empty($_POST['name'])  && !empty($_POST['mobile']) && !empty($_POST['email']) && !empty($_POST['password'])){
                           $csrf = $_POST["csrf_token"];
                           $name = test_input($_POST['name']);
                           $mobile = test_input($_POST['mobile']);
                           $email = test_input($_POST['email']);
                           $joined_code = test_input($_POST['ref_code']);
                           $leg_count="";
                           $level="";

                          if(mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `mobile_no`='$mobile'")) > 0){
                            
                                          echo '<script>
                                                    swal("Mobile Number Already Exists!", "Entered mobile number already exists." , "error");
                                                </script>'; 

                          }else{

                            $check_referal = "SELECT * FROM `customer_tbl` WHERE `referal_code`='$joined_code'";
                            $result_check_referal = mysqli_query($conn , $check_referal);
         
                            $count = mysqli_num_rows($result_check_referal);
                          
                            if($count > 0){
                              $select_referal = "SELECT `leg_count` , `level` FROM `customer_tbl` WHERE `referal_code`='$joined_code'";
                              $result_referal = mysqli_query($conn , $select_referal);
                              
                              while($row = mysqli_fetch_assoc($result_referal)){

                                $leg_count = $row['leg_count'];
                                $level = $row['level'];
                            
                              }
                              // echo $leg_count;
                                      if($leg_count >= 10){
                                          echo '<script>
                                                  swal("Limit Reached!", "Referal limit of joining 10 people reached.Please use someone else referal to join." , "warning");
                                              </script>'; 
                                      }else{

                                          $leg_count = $leg_count + 1;
                                          $update_leg_count = "UPDATE `customer_tbl` SET `leg_count`='$leg_count' WHERE `referal_code`='$joined_code'";
                                          $result_update_leg_count = mysqli_query($conn , $update_leg_count);
                                          if($result_update_leg_count){
                                              $update_level = $level + 1;
                                              $referal_code = 'LADOR'.date("d").date("m").date("Y").(mt_rand());
                                              $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                              $query = "INSERT INTO `customer_tbl`(`full_name`, `email`, `mobile_no`, `password`, `csrf_token` , `referal_code` , `joined_by`,`level`) VALUES ('$name','$email',$mobile,'$password','$csrf','$referal_code','$joined_code','$update_level')";
                                              $insert = mysqli_query($conn , $query);
                      
                                              if($insert){
                                                  
                                                  $query_wallet = "SELECT `id` FROM `customer_tbl` WHERE `referal_code`='$referal_code'";
                                                  $result_wallet = mysqli_query($conn , $query_wallet);
                                                  $row_wallet = mysqli_fetch_assoc($result_wallet);
                                                  $user_wallet_id =  $row_wallet['id'];

                                                  $insert_wallet = "INSERT INTO `my_wallet_tbl`(`user_id`, `user_name`, `mobile_no`, `email`) VALUES ('$user_wallet_id' , '$name' , '$mobile' , '$email')";
                                                  $result_insert_wallet = mysqli_query($conn , $insert_wallet);

                                                  if($result_insert_wallet){
                                                  echo '<script>
                                                  swal("Registration Successful!", "Please Login" , "success").then(() => {
                                                      window.location.href="login.php";
                                                    });
                                                  </script>';
                                                  }else{
                                                      echo '
                                                          <script>
                                                          swal("Registration Failed!", " " , "error");
                                                          </script>';
                                                  }
                                                  
                                                   
                                                 
                                              }else{
                                                  echo '<script>
                                                              swal("Somthing went wrong!", "Please try again" , "error");
                                                              </script>';
                                              }
                                          }else{
                                              echo '<script>
                                                          swal("Somthing went wrong!", "Please try again" , "error");
                                                          </script>';
                                          }
          
                                    
                                      }
                            }else{
                              echo '<script>
                              swal("Incorrect Referal Code!", "Entered referal do not matched." , "error");
                              </script>'; 
                            }

                          }

                             
                         
                            }

                       



                   }



   ?>

<body>

    <div class="container login-container" style="margin-top:200px;background-color:white;">
        <div class="row">
            <div class="col-md-6 login-form-1" style="border-right:2px solid black;">
                <img src="assets/images/signinup/smile.png" class="avatar">
                <img src="assets/images/signinup/smile.png" class="avatar1">
                <h3 style="font-weight:700;">Sign Up</h3>
                <form name="registration" action="" method="post">
                    <input type="hidden" class="form-control" name="csrf_token" value="<?php echo generate_token(); ?>">
                    <div class="form-group">
                        <label for="name">Full Name</label> <span class="required">*</span>
                        <input type="text" class="form-control1" placeholder="Your Full Name" value="" id="name"
                            name="name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label> <span class="required">*</span>
                        <input type="text" class="form-control1" placeholder="Your Email" value="" id="email"
                            name="email" />
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label><span class="required">*</span>
                        <input type="number" class="form-control1" placeholder="Your Mobile Number" value="" id="mobile"
                            name="mobile" />
                    </div>
                    <div class="form-group">
                        <label for="ref_code">Referal Code</label><span class="required">*</span>

                        <div class="row">
                            <div class="col-md-10 col-10">
                                <input type="text" class="form-control1" placeholder="Referal Code" value=""
                                    id="ref_code" name="ref_code" />
                            </div>
                            <div class="col-md-2 mt-2 col-2">
                            <i class="fa fa-hand-paper-o get_referal mt-2"  style="font-size:20px;cursor:pointer;"></i>
                                <!-- <span class="btn " style="background-color:black!important;color:#fff !important;" >Get Referal</span> -->
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label> <span class="required">*</span>
                        <div class="row">
                            <div class="col-md-10 col-10">
                                <input type="password" class="form-control1" placeholder="Your Password" id="password"
                                    name="password" value="" />
                            </div>
                            <div class="col-md-2 mt-2 col-2">
                                <i class="fa fa-eye" id="togglePassword" style="font-size:20px;cursor:pointer;"></i>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label> <span class="required">*</span>
                        <div class="row">
                            <div class="col-md-10 col-10">

                                <input type="password" class="form-control1" placeholder="Confirm Password" value=""
                                    id="confirm_password" name="confirm_password" />
                            </div>
                            <div class="col-md-2 mt-2 col-2">
                                <i class="fa fa-eye" id="togglePassword1" style="font-size:20px;cursor:pointer;"></i>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit btn-block" name="register" value="Sign Up" />
                    </div>



                </form>
            </div>
            <div class="col-md-6 login-form-2" style="text-align:center;transform: translateY(20%);">


                <img src="assets/images/signinup/signincake.jpg" alt="" class="img-fluid">
                <h3>Already have an account? <a href="login.php"
                        style="color:#3F51B5;text-decoration:none !important;">Sign In</a> </h3>

            </div>
        </div>
    </div>
    </div>


    <?php include 'common/footer.php' ?>
    <?php 
        $rand_ref ="";
          $query_rand_referal =  mysqli_query($conn , "SELECT `referal_code` FROM customer_tbl WHERE `leg_count`<10 ORDER BY RAND() LIMIT 1");
          $result_rand_referal = mysqli_fetch_assoc($query_rand_referal);
          $rand_ref = $result_rand_referal['referal_code'];
         ?>
    <script>
     $('.get_referal').on('click' , function(){
           
           var rand_ref = "<?php echo $rand_ref; ?>";
           $('#ref_code').val(rand_ref);

           
            
        })


    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });


    const togglePassword1 = document.querySelector('#togglePassword1');
    const cpassword = document.querySelector('#confirm_password');

    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        cpassword.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });


    $(document).ready(function() {
        $(function() {

            $("form[name='registration']").validate({
                rules: {
                    name: "required",
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    ref_code: "required",
                    password: {
                        required: true,
                        minlength: 8
                    },

                    confirm_password: {
                        required: true,
                        minlength: 8,
                        equalTo: password
                    }
                },

                messages: {
                    name: "Please enter your name",
                    mobile: {
                        required: "Please enter your mobile number",
                        minlength: "Please enter a valid mobile number"
                    },
                    email: "Please enter a valid email address",
                    ref_code: "You can't join LADO without a referal",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long",
                        equalTo: "Password do not match"
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