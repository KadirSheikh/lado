<?php session_start(); ?>
<title>LADO | Contact Us</title>
<?php include 'common/connect.php' ?>
<?php include 'common/header.php' ?>

<body>
    <style>
    h1,
    h5,
    p {
        color: white;
    }

    .left-side {
        background-color: #3F51B5;
        padding: 200px 0px;
        padding-left: 50px;
    }

    .form-control1 {
        display: block;
        width: 90%;
        padding: 1.5rem .5rem;
        font-size: 1rem;
        line-height: 1.25;
        color: black;
        border: 1px solid gray;

    }

    textarea:focus,
    input:focus {
        outline: none;
        border: 2px solid #3F51B5 !important;
    }

    .btn-send {
        background-color: #3F51B5;
        color: white;
        padding: 20px 140px;
        border-radius: 30px;
        margin-left: 130px;
    }

    @media (max-width:767px) {
        .btn-send {
            background-color: #3F51B5;
            color: white;
            padding: 10px 70px;
            border-radius: 30px;
            margin-left: 65px;
        }

    }

    .con {
        margin-top: 200px;
        margin-bottom: 100px;
        box-shadow: 2px 2px 2px 2px lightgray;
    }
    </style>

                                        <?php
                                        use PHPMailer\PHPMailer\PHPMailer; 
                                        use PHPMailer\PHPMailer\SMTP;
                                        use PHPMailer\PHPMailer\Exception; 
                                         
                                        require 'PHPMailer/Exception.php'; 
                                        require 'PHPMailer/PHPMailer.php'; 
                                        require 'PHPMailer/SMTP.php';
                                        require 'vendor/autoload.php';


                                            if(isset($_POST['contact_us'])){
                                      
                                                $name = $_POST['name'];
                                                $email = $_POST['email'];
                                                $message = $_POST['message'];
                                                

                                        $mail = new PHPMailer(true);
                                        
                                        $mail->isSMTP();                      // Set mailer to use SMTP 
                                        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                                        $mail->SMTPAuth = true;               // Enable SMTP authentication 
                                        $mail->Username = 'ladoecom@gmail.com';  // SMTP username 
                                        $mail->Password = 'Amit@2407';   // SMTP password 
                                        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                                        $mail->Port = 587;                    // TCP port to connect to 




                                        $mail->setFrom($email , $name); 
                                        $mail->addReplyTo($email , $name);


                                        $mail->addAddress('ladoecom@gmail.com' , 'LADO');

                                        $mail->isHTML(true);

                                        $mail->Subject = "Somebody contacted us";

                                        $bodyContent = "<h3>Name : $name <br><br>Email : $email <br><br>Message : $message</h3>";;


                                        $mail->Body = $bodyContent;


                                        if($mail->send()){
                                        echo "<script>swal('Mail Sent!' , 'Thank you for contacting us!' , 'success')</script>";
                                        }else{
                                            echo "<script>swal('Fail to send mail!' , 'Please try again!' , 'error')</script>"; 
                                        }

                                        }



                                       ?>
    <div class="container con" style="">
        <div class="row">
            <div class="col-sm-5 left-side">
                <h1 class="mb-5">Get in touch</h1>
                <h5>Location</h5>
                <p class="mb-5">20 Prince Hakerem Lekki Phase 1, Lagos</p>

                <h5>Phone Number</h5>
                <p class="mb-5">+91 88067660677</p>

                <h5>Email Address</h5>
                <p>Ladofamilysite@gmail.com</p>

            </div>
            <div class="col-sm-7">

                <form action="" style="margin-top:100px;" class="ml-4" method="post">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="name" class="form-control1" placeholder="Your Name" value="" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control1" placeholder="Your Email" value="" />
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control1" id="" cols="30" rows="7"
                            placeholder="Type your message"></textarea>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" name="contact_us" class="btn btn-send" style="cursor:pointer;">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

  
    </div>


    <?php include 'common/footer.php' ?>

</body>