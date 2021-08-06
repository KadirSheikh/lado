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

    <title>LADO | Add Product</title>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Catagory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php 
                        
                        if(isset($_POST['add_name'])){
                            if(!empty($_POST['cat_name'])){
    
                                $res_cat = mysqli_query($conn , "INSERT INTO `catagory_tbl`(`cat_name`) VALUES ('$_POST[cat_name]')");
                                if($res_cat){
                                    echo '
                                <script>
                                 alert("Added...")
                                </script>
                                ';
                                }else{
                                    echo '
                                    <script>
                                     alert("Fail to add...")
                                    </script>
                                    '; 
                                }
                            }
                            
                        }

                        ?>
                           <form action="" method="post">
                           <div class="form-group">
                           <label for="Cat_name">Catagory Name</label>
                           <input type="text" class="form-control" name="cat_name" placeholder="Catagory Name">
                           </div>
                           <div class="form-group">
                           <button type="submit" class="btn btn-primary" name="add_name">
                           Add
                           </button>
                           </div>
                           </form>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php 
                        
                        if(isset($_POST['add_unit'])){
                            if(!empty($_POST['unit_name'])){
    
                                $res_cat = mysqli_query($conn , "INSERT INTO `unit_tbl`(`unit_name`) VALUES ('$_POST[unit_name]')");
                                if($res_cat){
                                    echo '
                                <script>
                                 alert("Unit Added...")
                                </script>
                                ';
                                }else{
                                    echo '
                                    <script>
                                     alert("Fail to add...")
                                    </script>
                                    '; 
                                }
                            }
                            
                        }

                        ?>
                           <form action="" method="post">
                           <div class="form-group">
                           <label for="Cat_name">Unit</label>
                           <input type="text" class="form-control" name="unit_name" placeholder="Unit">
                           </div>
                           <div class="form-group">
                           <button type="submit" class="btn btn-primary" name="add_unit">
                           Add
                           </button>
                           </div>
                           </form>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'common/nav.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add Product</h1>
                    <div class="justify-content-end d-flex">
                        <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">Add Catagory</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Add Unit</button>
                    </div>
                    <?php

                            function test_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            $target_dir = "../assets/images/products/";

                            $uploadOk = 1;

                            // Check if image file is a actual image or fake image
                            if(isset($_POST["add"])) {
                            
                            $product_name = test_input($_POST['product_name']);
                            $product_buying_price = test_input($_POST['product_bprice']);
                            $product_selling_price = test_input($_POST['product_price']);
                            $product_type = test_input($_POST['product_type']);
                            $product_unit = test_input($_POST['product_unit']);
                            $product_des = test_input($_POST['product_des']);
                            $profit = $product_selling_price - $product_buying_price;
                            
                            $target_file = $target_dir . basename($_FILES["product_photo"]["name"]);
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                            
                            if ($_FILES["product_photo"]["size"] > 5242880) {
                                
                                echo '<div class="alert alert-danger" id="msg_large">Sorry, your file is too large.Please upload below 5 MB.</div>
                                <script>
                                setTimeout(fade_out, 2000);

                                function fade_out() {
                                $("#msg_large").fadeOut().empty();
                                }
                                </script>
                                ';
                                $uploadOk = 0;
                            }


                            else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                                
                                echo '<div class="alert alert-danger" id="msg_only">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>
                                <script>
                                setTimeout(fade_out, 2000);

                                function fade_out() {
                                $("#msg_only").fadeOut().empty();
                                }
                                </script>
                                ';
                                $uploadOk = 0;
                            }

                            else if ($uploadOk == 0) {
                               
                                echo '<div class="alert alert-danger" id="msg_file">Sorry, your file was not uploaded.</div>
                                <script>
                                setTimeout(fade_out, 2000);

                                function fade_out() {
                                $("#msg_file").fadeOut().empty();
                                }
                                </script>
                                ';

                            } else {
                                if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $target_file)) {
                                    
                                    $path = basename( $_FILES["product_photo"]["name"]);

                                    $add_pro = "INSERT INTO `products_tbl`(`name`, `image`, `price`,`buying_price`,`profit`,`type`, `unit`, `description`) VALUES ('$product_name','$path','$product_selling_price','$product_buying_price','$profit','$product_type','$product_unit','$product_des')";
                                    $result = mysqli_query($conn, $add_pro);
                                    if($result){
                                    echo '<div class="alert alert-success" id="msg_s">Product Added Successfully</div>
                                    <script>
                                    setTimeout(fade_out, 2000);

                                    function fade_out() {
                                    $("#msg_s").fadeOut().empty();
                                    }
                                    </script>';
                                    
                                    }
                                    else{
                                    
                                    echo '<div class="alert alert-danger" id="msg_f">Failed To Add</div>
                                    <script>
                                    setTimeout(fade_out, 2000);

                                    function fade_out() {
                                    $("#msg_f").fadeOut().empty();
                                    }
                                    </script>';
                                    }

                                } else {
                                    echo '<div class="alert alert-danger" id="msg_u">Sorry, there was an error uploading your file.</div>
                                    <script>
                                    setTimeout(fade_out, 2000);

                                    function fade_out() {
                                    $("#msg_u").fadeOut().empty();
                                    }
                                    </script>';
                                    
                                    
                                }
                            }
                            }


?>

                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="text-center d-flex">
                                    <h1 class="h4 text-gray-900 mb-4">Add new product</h1>


                                </div>
                                <form class="user" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="Price">Name</label>
                                            <input type="text" class="form-control" id="exampleFirstName" required
                                                name="product_name" placeholder="Product name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Photo">Photo</label>
                                            <input type="file" name="product_photo" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="Price">Buying Price</label>
                                            <input type="text" class="form-control" id="exampleLastName" required
                                                name="product_bprice" placeholder="Product buying price">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Price">Selling Price</label>
                                            <input type="text" class="form-control" id="exampleLastName" required
                                                name="product_price" placeholder="Product selling price">
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="type">Type</label>
                                            <select name="product_type" id="" class="form-control" required>
                                                <?php 
                                            $query_cat = "SELECT * FROM `catagory_tbl`";
                                            $result_cat = mysqli_query($conn , $query_cat);
                                            while($row_cat = mysqli_fetch_assoc($result_cat)){
                                                ?>
                                                <option value="<?php echo $row_cat['cat_name'] ?>">
                                                    <?php echo $row_cat['cat_name'] ?></option>
                                                <?php
                                            }
                                            ?>


                                            </select>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="unit">Unit</label>
                                            <select name="product_unit" id="" class="form-control" required>
                                            <?php 
                                            $query_unit = "SELECT * FROM `unit_tbl`";
                                            $result_unit = mysqli_query($conn , $query_unit);
                                            while($row_unit = mysqli_fetch_assoc($result_unit)){
                                                ?>
                                                <option value="<?php echo $row_unit['unit_name'] ?>">
                                                    <?php echo $row_unit['unit_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="Photo">Description</label>
                                        <textarea name="product_des" id="" cols="30" rows="3" class="form-control"
                                            placeholder="Product description" required></textarea>
                                    </div>

                                    <input type="submit" name="add" value="Add"
                                        class="btn btn-primary btn-user btn-block">



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

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>