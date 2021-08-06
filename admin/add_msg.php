<?php session_start(); ?>
<?php include '../common/connect.php'; ?>

<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LADO | Send Message</title>
    <link rel="icon" href="../assets/images/other/logo.jpeg" type="image/jpeg" sizes="16x16">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'common/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'common/nav.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Send Message to Users</h1>
                    <?php

                            function test_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            

                            // Check if image file is a actual image or fake image
                            if(isset($_POST["send_msg"])) {
                            
                                $add_query = "INSERT INTO `msg_tbl`(`message`, `date`) VALUES ('$_POST[message]','$_POST[date]')";
                                $add_msg = mysqli_query($conn , $add_query);

                                if($add_msg){
                                    echo '<div class="alert alert-success" id="msg_s">Message Sent Successfully</div>
                                    <script>
                                    setTimeout(fade_out, 2000);

                                    function fade_out() {
                                    $("#msg_s").fadeOut().empty();
                                    }
                                    </script>';
                                }
                                
                            }


?>

                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Send Message</h1>

                                </div>
                                <form class="user" action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Photo">Message</label>
                                        <textarea name="message" id="" cols="30" rows="5" class="form-control"
                                            placeholder="Write Message..." required></textarea>
                                    </div>

                                    <input type="submit" name="send_msg" value="Send"
                                        class="btn btn-primary btn-user btn-block">

                                        <!-- coronanmc@gmail.com
                                        Corona@NMC -->

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'common/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>