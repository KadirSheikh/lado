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

    <title>LADO | Edit Product</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

                    <?php

                                    function test_input($data) {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }
                                    if(isset($_GET['product_id'])){



                                    $target_dir = "../assets/images/products/";

                                    $uploadOk = 1;

                                    if (isset($_POST['update'])) {
                                    
                                    $product_name = test_input($_POST['product_name']);
                                    $product_price = test_input($_POST['product_price']);
                                    $product_type = test_input($_POST['product_type']);
                                    $product_des = test_input($_POST['product_des']);
                                    
                                    
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

                                            $pro_id = base64_decode($_GET['product_id']);

                                        $add_pro = "UPDATE `products_tbl` SET `name`='$product_name',`image`='$path',`price`='$product_price',`type`='$product_type',`description`= '$product_des' WHERE `id`=$pro_id";
                                            $result = mysqli_query($conn, $add_pro);
                                            if($result){
                                                echo '<div class="alert alert-success" id="msg_s">Product Updated Successfully</div>
                                                <script>
                                                setTimeout(fade_out, 2000);
            
                                                function fade_out() {
                                                $("#msg_s").fadeOut().empty();
                                                }
                                                </script>
                                               
                                                ';
                                            
                                            }
                                            else{
                                                echo '<div class="alert alert-danger" id="msg_f">Failed To Update Product</div>
                                                <script>
                                                setTimeout(fade_out, 2000);
            
                                                function fade_out() {
                                                $("#msg_f").fadeOut().empty();
                                                }
                                                </script>
                                                ';
                                            
                                            }

                                        } else {
                                            echo '<div class="alert alert-danger" id="msg_u">Sorry, there was an error uploading your file.</div>
                                            <script>
                                            setTimeout(fade_out, 2000);
        
                                            function fade_out() {
                                            $("#msg_u").fadeOut().empty();
                                            }
                                            </script>
                                            ';
                                            
                                        }
                                    }


                                    }

                                    }

                                ?>



                    <?php
                                    
                                    if(isset($_GET['product_id'])){
                                        $p_id = base64_decode($_GET['product_id']);

                                $get_product = mysqli_query($conn,"SELECT * FROM `products_tbl` WHERE `ID` = $p_id");

                                $row = mysqli_fetch_assoc($get_product);

                                ?>
                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit this product</h1>
                                </div>

                                <form class="user" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="Price">Name</label>
                                            <input type="text" class="form-control" id="exampleFirstName" required
                                                name="product_name" placeholder="Product name"
                                                value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Price">Price</label>
                                            <input type="text" class="form-control" id="exampleLastName" required
                                                name="product_price" placeholder="Product price"
                                                value="<?php echo $row['price']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="Price">Type</label>
                                            <select name="product_type" id="" class="form-control" required>
                                                <option value="cake">Cake</option>
                                                <option value="ghee">Ghee</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <label for="Photo">Photo</label>
                                                    <input type="file" name="product_photo" required
                                                        class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="btn btn-primary" style="margin-top:30px;"
                                                        data-toggle="modal" data-target="#exampleModal">View</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Photo">Description</label>
                                        <textarea name="product_des" id="" cols="30" rows="3" class="form-control"
                                            placeholder="Product description"
                                            required><?php echo $row['description']; ?></textarea>
                                    </div>

                                    <input type="submit" name="update" value="Update"
                                        class="btn btn-primary btn-user btn-block">



                                </form>

                            </div>
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Uploaded Product Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <img src="../assets/images/products/<?php echo $row['image']; ?>" alt="" class="img-fluid">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php }else{
              echo "<script>window.location.href='add_product.php';</script>";
              die;
            } ?>
                </div>
                <!-- /.container-fluid -->
             
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