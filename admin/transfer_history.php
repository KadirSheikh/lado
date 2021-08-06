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

    <title>LADO | Share History</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Transaction History</h1>
                    <div class="is_data_empty"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Share profit History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Sr.No</th>
                                        
                                        <th>Shared to</th>
                                        <th> Shared amount</th>
                                        <th> Admin profit</th>
                                        <th>Shared on</th>
                                     


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Sr.No</th>
                                        
                                        <th>Shared to</th>
                                        <th> Shared amount</th>
                                        <th> Admin profit</th>
                                        <th>Shared on</th>
                               


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                  
                        $query = "SELECT * FROM `profit_transfer_history_tbl` ORDER BY id DESC";
                        $data = mysqli_query($conn , $query);

              
                        $counter = 1;
                
                        while($row = mysqli_fetch_assoc($data)){
                          
                          $userid = $row['userid'];
                          $profit_amount = $row['profit_amount'];
                          $admin_profit = $row['admin_profit'];
                          $shared_on = $row['shared_on'];
    
                          
                   
                          
                          ?>

                                        <tr>
                                        <td><?php echo $counter; ?></td>
                                        
                                        <td>
                                        
                                        <?php 
                                        $result_user_name = mysqli_query($conn , "SELECT `full_name` FROM `customer_tbl` WHERE `id`=$userid");
                                        $res_user_name = mysqli_fetch_assoc($result_user_name);

                                        echo $res_user_name['full_name'];
                                        ?>
                                        </td>
                                       
                                        <td>Rs.<?php echo $profit_amount; ?></td>
                                        <td>Rs.<?php echo $admin_profit; ?></td>
                                        <td><?php echo $shared_on; ?></td>
                                 
                                        </tr>
                                        <?php
                                        $counter++;
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


</body>

</html>

