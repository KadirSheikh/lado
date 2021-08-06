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

    <title>LADO | Gift Requests</title>
    <link rel="icon" href="../assets/images/other/logo.jpeg" type="image/jpeg" sizes="16x16">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Gift Requests</h1>
                    <div class="is_data_empty"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div id="loading" style="display:none;">Updating Status...</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                       
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Amount</th>
                                        <th>Address</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                         <th>Action</th>


                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <tr>
                                    <?php 
                  
                        $query = "SELECT * FROM `withdraw_request_tbl` ORDER BY request_id DESC";
                        $data = mysqli_query($conn , $query);

              
                
                        while($row = mysqli_fetch_assoc($data)){
                          
                          
                          $requested_user_id = $row['requested_user_id'];
                          $requested_username = $row['requested_username'];
                          $mobile = $row['mobile_no'];
                          $delivery_add = $row['delivery_add'];
                          $is_read = $row['is_read'];
                          $pro_amount = $row['pro_amount'];
                          $pro_name = $row['pro_name'];
                          $request_date = $row['request_date'];
                          $allow_date = $row['allow_date'];
                          $request_status = $row['request_status'];
                          $order_id = $row['order_id'];
                          
                          ?>

                            <td><?php echo $requested_username; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $pro_amount; ?></td>
                            <td><?php echo $delivery_add; ?></td>
                            <td><?php echo $pro_name; ?></td>
                            <td><?php echo $request_status; ?></td>
                    
                             
                            <td>
                            <select data-uid="<?php echo $requested_user_id; ?>" data-oid="<?php echo $order_id; ?>" class="change_gift_status form-control">
                            <option value="">Select</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="picked up">Picked up</option>
                            <option value="on the way">On the way</option>
                            <option value="delivered">Delivered</option>
                            </select>
                            </td>
                            

                                        
                                        </tr>
                                        <?php
                        }
                  
                  ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <?php

$check_query = "SELECT * FROM withdraw_request_tbl";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.is_data_empty').html('<h3>No order found.</h3>');
  
  </script>";  
}



?>

<script>
$('.change_gift_status').on('change', function() {
        var user_id = $(this).attr('data-uid');
        var order_id = $(this).attr('data-oid');
        var status = $(this).children("option:selected").val();

     
     console.log(user_id , order_id , status);

        $.ajax({
            url: 'change_gift_status.php',
            method: 'POST',
            data: {
                user_id:user_id,
                order_id: order_id,
                status: status


            },
            beforeSend: function() {
                $('#loading').show();
                
            },
            complete: function() {

                setTimeout(function() {
                    $('#loading').html("Status changed to "+status);


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
