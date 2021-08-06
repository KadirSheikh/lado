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

    <title>LADO | Referal Tree</title>
    <link rel="icon" href="../assets/images/other/logo.jpeg" type="image/jpeg" sizes="16x16">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .tree li {
        list-style-type: none;
        margin: 0;
        padding: 10px 5px 0 5px;
        position: relative
    }

    .tree li::before,
    .tree li::after {
        content: '';
        left: -20px;
        position: absolute;
        right: auto
    }

    .tree li::before {
        border-left: 2px solid #000;
        bottom: 50px;
        height: 100%;
        top: 0;
        width: 1px
    }

    .tree li::after {
        border-top: 2px solid #000;
        height: 20px;
        top: 25px;
        width: 25px
    }

    .tree li span {
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 2px solid #000;
        border-radius: 3px;
        display: inline-block;
        padding: 3px 8px;
        text-decoration: none;
        cursor: pointer;
    }

    .tree>ul>li::before,
    .tree>ul>li::after {
        border: 0
    }

    .tree li:last-child::before {
        height: 27px
    }

    .tree li span:hover {
        background: #4D72DE;
        border: 2px solid #94a0b4;
    }

    [aria-expanded="false"]>.expanded,
    [aria-expanded="true"]>.collapsed {
        display: none;
    }
    </style>
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
                    <h1 class="h3 mb-4 text-gray-800">Referal Tree</h1>
                    <div class="tree col-12" style="overflow-x: scroll;overflow-y: scroll;">
                        <ul>

                            <?php 
                        
                                $query_leg_count = "SELECT `leg_count`,`level` FROM `customer_tbl` WHERE `referal_code`='LADOADMINR23032021518947647'";
                                $result_leg_count = mysqli_query($conn , $query_leg_count);
                                $row_leg_count = mysqli_fetch_assoc($result_leg_count);
                            ?>

                            <li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#Web"
                                        aria-expanded="true" aria-controls="Web">ADMIN
                                        (<?php echo $row_leg_count['leg_count']; ?>) | <b>LEVEL <?php echo $row_leg_count['level']; ?>/ROOT</b></a></span>
                                <div id="Web" class="collapse show">

                                    <ul>
                                        <?php 
                                         
                                         $query = "SELECT * FROM `customer_tbl` WHERE `joined_by`='LADOADMINR23032021518947647'";
                                         $result = mysqli_query($conn , $query);
                                         $counter = 1;

                                         while($row = mysqli_fetch_assoc($result)){
                                             ?>

                                        <li><span><a style="color:#000; text-decoration:none;"><?php echo $row['full_name']; ?> | <?php echo $row['mobile_no']; ?> | (<?php echo $row['leg_count']; ?>) | <b>LEVEL <?php echo $row['level']; ?></b></a></span>

                                            <ul>
                                                <div class="collapse show">
                                                    <?php 
                                            
                                                    $query_1 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row[referal_code]'";
                                                    $result_1 = mysqli_query($conn , $query_1);
                                                    
                                                    while($row_1 = mysqli_fetch_assoc($result_1)){
                                                        ?>
                                                    <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_1['full_name'] ?> | <?php echo $row_1['mobile_no']; ?> | (<?php echo $row_1['leg_count']; ?>) | <b>LEVEL <?php echo $row_1['level']; ?></b></a></span>

                                                        <ul>

                                                            <div class="collapse show">
                                                                <?php 
                                            
                                                                $query_2 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_1[referal_code]'";
                                                                $result_2 = mysqli_query($conn , $query_2);
                                                                
                                                                while($row_2 = mysqli_fetch_assoc($result_2)){
                                                                    ?>
                                                                <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_2['full_name'] ?> | <?php echo $row_2['mobile_no']; ?> | (<?php echo $row_2['leg_count']; ?>) | <b>LEVEL <?php echo $row_2['level']; ?></b></a></span>

                                                                    <ul>

                                                                        <div class="collapse show">
                                                                            <?php 
                                            
                                                                            $query_3 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_2[referal_code]'";
                                                                            $result_3 = mysqli_query($conn , $query_3);
                                                                            
                                                                            while($row_3 = mysqli_fetch_assoc($result_3)){
                                                                                ?>
                                                                            <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_3['full_name'] ?> | <?php echo $row_3['mobile_no']; ?> | (<?php echo $row_3['leg_count']; ?>) | <b>LEVEL <?php echo $row_3['level']; ?></b></a></span>
                                                                                        
                                                                                        <ul>
                                                                                        <div class="collapse show">
                                                                            <?php 
                                            
                                                                            $query_4 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_3[referal_code]'";
                                                                            $result_4 = mysqli_query($conn , $query_4);
                                                                            
                                                                            while($row_4 = mysqli_fetch_assoc($result_4)){
                                                                                ?>
                                                                            <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_4['full_name'] ?> | <?php echo $row_4['mobile_no']; ?> | (<?php echo $row_4['leg_count']; ?>) | <b>LEVEL <?php echo $row_4['level']; ?></b></a></span>
                                                                                        
                                                                                        <ul>
                                                                                        
                                                                            <div class="collapse show">
                                                                            <?php 
                                            
                                                                            $query_5 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_4[referal_code]'";
                                                                            $result_5 = mysqli_query($conn , $query_5);
                                                                            
                                                                            while($row_5 = mysqli_fetch_assoc($result_5)){
                                                                                ?>
                                                                            <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_5['full_name'] ?> | <?php echo $row_5['mobile_no']; ?> | (<?php echo $row_5['leg_count']; ?>) | <b>LEVEL <?php echo $row_5['level']; ?></b></a></span>
                                                                                        
                                                                                        <ul>
                                                                                        
                                                                                        <div class="collapse show">
                                                                            <?php 
                                            
                                                                            $query_6 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_5[referal_code]'";
                                                                            $result_6 = mysqli_query($conn , $query_6);
                                                                            
                                                                            while($row_6 = mysqli_fetch_assoc($result_6)){
                                                                                ?>
                                                                            <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_6['full_name'] ?> | <?php echo $row_6['mobile_no']; ?> | (<?php echo $row_6['leg_count']; ?>) | <b>LEVEL <?php echo $row_6['level']; ?></b></a></span>
                                                                                        
                                                                                        <ul>
                                                                                        
                                                                                          <div class="collapse show">
                                                                                          <?php 
                                            
                                                                                            $query_7 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_6[referal_code]'";
                                                                                            $result_7 = mysqli_query($conn , $query_7);
                                                                                            
                                                                                            while($row_7 = mysqli_fetch_assoc($result_7)){

                                                                                                ?>

                                                                                               <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_7['full_name'] ?> | <?php echo $row_7['mobile_no']; ?> | (<?php echo $row_7['leg_count']; ?>) | <b>LEVEL <?php echo $row_7['level']; ?></b></a></span>
                                                                                               
                                                                                               <ul>
                                                                                               
                                                                                               <div class="collapse show">
                                                                                               <?php 
                                            
                                                                                                $query_8 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_7[referal_code]'";
                                                                                                $result_8 = mysqli_query($conn , $query_8);
                                                                                                
                                                                                                while($row_8 = mysqli_fetch_assoc($result_8)){
                                                                                                    ?>
                                                                                                     <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_8['full_name'] ?> | <?php echo $row_8['mobile_no']; ?> | (<?php echo $row_8['leg_count']; ?>) | <b>LEVEL <?php echo $row_8['level']; ?></b></a></span>
                                                                                                     
                                                                                                     <ul>
                                                                                                     <div class="collapse show">
                                                                                                     <?php 
                                            
                                                                                                    $query_9 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_8[referal_code]'";
                                                                                                    $result_9 = mysqli_query($conn , $query_9);
                                                                                                    
                                                                                                    while($row_9 = mysqli_fetch_assoc($result_9)){
                                                                                                        ?>
                                                                                                    <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_9['full_name'] ?> | <?php echo $row_9['mobile_no']; ?> | (<?php echo $row_9['leg_count']; ?>) | <b>LEVEL <?php echo $row_9['leg_count']; ?></b></a></span>
                                                                                                    
                                                                                                    <ul>
                                                                                                    
                                                                                                    <div class="collapse show">
                                                                                                    <?php 
                                            
                                                                                                    $query_10 = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$row_9[referal_code]'";
                                                                                                    $result_10 = mysqli_query($conn , $query_10);
                                                                                                    
                                                                                                    while($row_10 = mysqli_fetch_assoc($result_10)){

                                                                                                        ?>
                                                                                                    <li><span><a style="color:#000; text-decoration:none;"><?php echo $row_10['full_name'] ?> | <?php echo $row_10['mobile_no']; ?> | (<?php echo $row_10['leg_count']; ?>) | <b>LEVEL <?php echo $row_10['level']; ?></b></a></span></li>
                                                                                                        <?php
                                                                                                    }
                                                                                                        ?>
                                                                                                    
                                                                                                    </div>
                                                                                                    
                                                                                                    </ul>
                                                                                                    
                                                                                                    </li>
                                                                                                        <?php
                                                                                                    }
                                                                                                        ?>
                                                                                                     </div>
                                                                                                     </ul>
                                                                                                     </li>
                                                                                                    <?php

                                                                                                }

                                                                                                    ?>
                                                                                               </div>
                                                                                               
                                                                                               </ul>
                                                                                               
                                                                                               <li>
                                                                                                <?php
                                                                                            }
                                                                                                ?>
                                                                                          
                                                                                          </div>
                                                                                        
                                                                                        </ul>
                                                                                        
                                                                                        </li>
                                                                                <?php

                                                                            }
                                                                                ?>
                                                                            </div>
                                                                                        
                                                                                        </ul>
                                                                                        
                                                                                        </li>
                                                                                <?php

                                                                            }
                                                                                ?>
                                                                            </div>
                                                                                        
                                                                                        </ul>
                                                                                        
                                                                                        </li>
                                                                                <?php

                                                                            }
                                                                                ?>
                                                                        </div>
                                                                                        
                                                                                        </ul>
                                                                                        
                                                                                        </li>
                                                                                <?php

                                                                            }
                                                                                ?>
                                                                        </div>

                                                                    </ul>
                                                                </li>
                                                                <?php
                                                                }
                                                                    ?>
                                                            </div>
                                                        </ul>

                                                    </li>
                                                    <?php
                                                    
                                                    }
                                                ?>

                                                    <div>
                                            </ul>


                                        </li>

                                        <?php
                                             $counter++;
                                         }
                                         
                                         ?>

                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

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