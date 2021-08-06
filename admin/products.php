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

    <title>LADO | Products</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Products</h1>
                    <?php 
              if (isset($_GET['product_id'])) {
                  $p_id = base64_decode($_GET['product_id']);
                $delete = mysqli_query($conn,"DELETE FROM `products_tbl` WHERE `id`=$p_id");
                if($delete){
                  echo '<div class="alert alert-success" id="msg_success">Product deleted</div>
                  <script>
                  setTimeout(fade_out, 999);

                  function fade_out() {
                  $("#msg_success").fadeOut().empty();
                  }
                  window.setTimeout(function() {
                    window.location.href = "products.php";
                }, 1000);


                  </script>
                  ';
                }
                else{
                  echo '<div class="alert alert-success" id="msg_fail">Fail to delete product</div>
                  <script>
                  setTimeout(fade_out, 2000);

                  function fade_out() {
                  $("#msg_fail").fadeOut().empty();
                  }
                  </script>
                  ';
                }
              }
              ?>
                    <div class="is_data_empty"></div>
                    <div class="accordion" id="accordionExample">
    <?php 
      $product = mysqli_query($conn,"SELECT * FROM `products_tbl`");
      $counter = 1;
      while( $row = mysqli_fetch_assoc($product) ){
    ?> 
      <!-- Product List Accordian -->
      <div class="card">
        <div class="card-header">
          <div class="row mb-0">
            <div class="col-10 col-sm-10" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>" style="cursor:pointer;">
              <h6> <b>Product ID:</b> <?php echo $row['id']; ?> | <b>Name:</b> <?php echo $row['name']; ?> | <b>Price:</b>  Rs. <?php echo $row['price']; ?></h6>
            </div>
            <div class="col-2 col-sm-2" >
              <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrows-angle-expand" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
              </svg>
            </button>
            </div>
          </div>
        </div>

        <div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
      
              
            <div class="card mb-3" style="width: 100%">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="../assets/images/products/<?php echo $row['image']; ?>" class="card-img" style="width: 18rem;height: 18rem;max-width: auto;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <h6 class="card-title">Rs.<?php echo $row['price']; ?></h6>
                 
                    <p class="card-text"><?php echo $row['description']; ?>
                    </p>
                    <p class="card-text">
                   
                      <a href="edit_product.php?product_id=<?php echo base64_encode($row['id']); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    

                      <a href="products.php?product_id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger delete_product"><i class="fas fa-trash"></i></a>
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $counter++; 
        }
      ?>
     


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
    <?php

$check_query = "SELECT * FROM products_tbl";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.is_data_empty').html('<h3>No product found.</h3>');
  
  </script>";  
}



?>
</body>

</html>