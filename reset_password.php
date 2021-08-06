<?php session_start(); ?>
<title>LADO | Reset Password</title>
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
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
	
	
	if (isset($_POST['reset'])) {

        $pass = test_input($_POST['password']);

            $password = password_hash($pass, PASSWORD_DEFAULT);

			$query = "UPDATE `customer_tbl` SET `password`=  '$password' WHERE email='$_SESSION[email]'";
			$data = mysqli_query($conn , $query);
     
			if ($data) { 
                $_SESSION['email'] = "";
                session_destroy();
		 
		 echo '<script type="text/javascript">
		 swal("Password Reset Successfully :)", "Please Login.", "success").then(() => {
		 window.location.href="login.php";
		 });
		 
		 </script>';
		 
		  } else { 
		 echo '<script type="text/javascript">
		  swal("Something went wrong :(", "Go back and try again.", "error");
		</script>';
		   }
			
		  

	}  
    
    ?>

<body>

    <div class="container login-container" style="margin-top:150px;background-color:white;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 login-form-1">
            <!-- <img src="assets/images/signinup/smile.png" class="avatar"> -->
                <!-- <img src="assets/smile.png" class="avatar1"> -->
                <h3 style="font-weight:700;">Reset Password</h3>
                <form action="" method="post" name="login">
              
                                <div class="form-group">
                        <label for="password">New Password</label> <span class="required">*</span>
                        <div class="row">
                            <div class="col-md-10 col-10">
                                <input type="password" class="form-control1" placeholder="Enter New Password" id="password"
                                    name="password" value="" />
                            </div>
                            <div class="col-md-2 mt-2 col-2">
                                <i class="fa fa-eye" id="togglePassword" style="font-size:20px;"></i>
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
                                <i class="fa fa-eye" id="togglePassword1" style="font-size:20px;"></i>
                            </div>
                        </div>

                    </div>
 
                    <div class="form-group">
                        <input type="submit" class="btnSubmit btn-block" value="Reset Password" name="reset"/>
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

    $(document).ready(function(){
        $(function() {
        $("form[name='login']").validate({
            rules: {

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