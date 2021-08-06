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

    <title>LADO | Orders</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Orders</h1>
                    <div class="is_data_empty"></div>
                    <div class="accordion" id="accordionExample">

                        <?php 
                        $product = mysqli_query($conn,"SELECT * FROM `order_tbl` WHERE `cancel_request` = 0 ORDER BY `ID` DESC");
                        $counter = 1;
                        while( $row = mysqli_fetch_assoc($product) ){
                        ?>
                        <form method="POST">
                            <input type="text" name="order_id" value="<?php echo $row['ID']; ?>" hidden>
                            <input type="text" name="order_id_num" value="<?php echo $row['order_id']; ?>" hidden>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row mb-0">
                                        <div class="col-10 col-sm-10" data-toggle="collapse"
                                            data-target="#collapse<?php echo $counter; ?>" aria-expanded="true"
                                            aria-controls="collapse<?php echo $counter; ?>" style="cursor:pointer;">
                                            <h6> <b>Order ID:</b> <?php echo $row['order_id']; ?> |<b>Customer Name:</b> <?php echo $row['shipName']; ?>
                                                 | <b>Quantity:
                                                </b>
                                                <?php echo $row['product_quantity']; ?> | <b>Total: </b> Rs.
                                                <?php echo $row['total_price']; ?> |
                                                <b>Status:</b> <?php echo $row['status'];
                                                ?>
                                            </h6>
                                        </div>
                                        <div class="col-2 col-sm-2">
                                            <button class="btn btn-link btn-block text-right" type="button"
                                                data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>"
                                                aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-arrows-angle-expand" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="col-sm-12">
                                                    <h2>Order Detail</h2>
                                                </div>

                                                <div class="container">
                                                    <div class="container">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Order Id:
                                                                        </td>
                                                                        <td class="text-primary">
                                                                            <?php echo $row['order_id']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Customer Id:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['user_id']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Placed On:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['purchase_date']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Payment Mode:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['payment_mode']; ?>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm-12">
                                                    <h2>Shipping Detail</h2>
                                                </div>
                                                <div class="container">
                                                    <div class="container">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Ship Name:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['shipName']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Ship Email:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['shipEmail']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Ship Phone:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['shipPhone']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Ship Address:
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['shipAddress']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Ship City & Zip
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['shipCity'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <a class="btn btn-1 btn-outline-success"
                                                                                href="viewProduct.php?product_id=<?php echo base64_encode($row['product_id']); ?>">View
                                                                                Product</a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 text-center">

                                             <div id="loading_<?php echo $row['product_id'];  ?>" style="display:none;">Updating Status...</div>
                                                <div class="row">
                                                    <div class="col-sm-4" style="text-align:center;">
                                                        <label> <b>Change Order Status:-</b> </label>
                                                    </div>

                                                    <div class="col-sm-4">

                                                        <select name="change_status" id=""
                                                            data-pid="<?php echo $row['product_id']; ?>"
                                                            data-oid="<?php echo $row['order_id']; ?>"
                                                            class="form-control change_order_status">
                                                            <option value="Order pending">Order pending</option>
                                                            <option value="Order confirmed">Order confirmed</option>
                                                            <option value="Order picked up">Order picked up</option>
                                                            <option value="Order on the way">Order on the way</option>
                                                            <option value="Order delivered">Order delivered</option>
                                                        </select>

                                                    </div>
                                                    <!-- <div class="col-sm-2">
                            <button class="btn btn-success change_status">Change</button>
                            </div> -->
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

$check_query = "SELECT * FROM order_tbl WHERE `cancel_request` = 0";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.is_data_empty').html('<h3>No order found.</h3>');
  
  </script>";  
}



?>

    <script>
    $('.change_order_status').on('change', function() {
        var product_id = $(this).attr('data-pid');
        var order_id = $(this).attr('data-oid');
        var status = $(this).children("option:selected").val();

        $.ajax({
            url: 'change_status.php',
            method: 'POST',
            data: {
                o_id: order_id,
                status: status


            },
            beforeSend: function() {
                $('#loading_'+product_id).show();
                
            },
            complete: function() {

                setTimeout(function() {
                    $('#loading_'+product_id).html("Status changed to "+status);


                    setTimeout(function() {
                        location.reload(true);
                        
                    }, 1500);

                }, 1500);

            }

        });
    });
    </script>

</body>

</html>