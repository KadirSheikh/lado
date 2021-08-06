<?php session_start(); ?>
<title>LADO | My Account</title>
<?php include 'common/connect.php' ?>
<?php include 'common/auth.php' ?>
<?php include 'common/header.php' ?>


<style>
body {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.emp-profile {
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0rem;
    background: #fff;
}

.profile-img {
    text-align: center;
}

.profile-img img {
    width: 70%;
    height: 100%;
}

.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -10%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}

.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}

.profile-head h5 {
    color: #333;
}

.profile-head h6 {
    color: #0062cc;
}

.profile-edit-btn {
    border: 1px solid #3F51B5;
    border-radius: 1.5rem;
    width: 70%;
    padding: 4%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
    text-decoration: none !important;
}

.proile-rating {
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}

.proile-rating span {
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}

.profile-head .nav-tabs {
    margin-bottom: 5%;
}

.profile-head .nav-tabs .nav-link {
    font-weight: 600;
    border: none;
}

.profile-head .nav-tabs .nav-link.active {
    border: none;
    border-bottom: 2px solid #0062cc;
}

.profile-work {
    padding: 14%;
    margin-top: -15%;
}

.profile-work p {
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}

.profile-work a {
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}

.profile-work ul {
    list-style: none;
}

.profile-tab label {
    font-weight: 600;
}

.profile-tab p {
    font-weight: 600;
    color: #0062cc;
}

.invite {
    text-decoration: none !important;
    border: 1px solid light;
    padding: 5px 10px;
    border-radius: 20px;
    background-color: black;
}

select {
    width: 470px !important;
}

.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 0px !important;
    outline: 0;
}

.btn-primary {
    color: #fff;
    background-color: #3F51B5 !important;
    border-color: #3F51B5 !important;
    border-radius: 0px !important;
}

.btn-secondary {
    color: #fff;
    background-color: #e74c3c !important;
    border-color: #e74c3c !important;
    border-radius: 0px !important;
}

.para {
    color: #3F51B5 !important;
}

/* a{
    color:#3F51B5 !important;
    text-decoration:none !important;
} */

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

@media (max-width:767px) {
    select {
        width: 310px !important;
    }

    .check_status {
        margin-top: 60px;

    }
}
</style>
<?php 
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM customer_tbl WHERE id=$user_id";
                            $result = mysqli_query($conn , $query);

                            while($row = mysqli_fetch_assoc($result)){
                                $name = $row['full_name'];
                                $mobile = $row['mobile_no'];
                                $email = $row['email'];
                                $referal_code = $row['referal_code'];
                                $img = $row['profile_photo'];
                                
                            }
                            
                        ?>
<?php 
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          
            $user_id = $_SESSION['user_id'];
            if(isset($_POST['update_profile'])){
                $u_name = test_input($_POST['name']);
                $u_email = test_input($_POST['email']);
                $u_mobile = test_input($_POST['mobile']);
      
                echo $update_pro = "UPDATE customer_tbl SET `full_name`='$u_name' , `email`='$u_email' , `mobile_no`='$u_mobile' WHERE id=$user_id";
                $update_res = mysqli_query($conn , $update_pro);
                if($update_res){
                    echo '
                    <script>
                    swal("Profile Updated!", " " , "success").then(() => {
                        window.location.href="my_account.php";
                    });
                    </script>
                    ';
                }else{
                    echo '
                    <script>
                    swal("Profile update failed!", " " , "error");
                    });
                    </script>
                    ';
                }
            }

?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                value="<?php echo $name ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="<?php echo $email ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile No.</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="mobile" placeholder="Mobile No."
                                value="<?php echo $mobile ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn float-right" style="background-color:#3F51B5;color:white"
                                name="update_profile" value="Update">
                        </div>
                    </div>
                </form>



            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div> -->
        </div>
    </div>
</div>

<body>
    <?php

                                $user_id = $_SESSION['user_id'];

                                if (isset($_POST['upload'])) {

                                $profileimg = $_FILES["profileimg"]["name"];
                                $profileimg_tmp = $_FILES["profileimg"]["tmp_name"];

                                $fileinfo = @getimagesize($profileimg_tmp);
                                $width = $fileinfo[0];
                                $height = $fileinfo[1];
                                
                                $allowed_image_extension = array(
                                    "png",
                                    "jpg",
                                    "jpeg"
                                );
                                
                                
                                $file_extension = pathinfo($profileimg, PATHINFO_EXTENSION);
                                
                                
                                if (!file_exists( $profileimg_tmp)) {
                                    $response = array(
                                    "message" => "Choose image file to upload."
                                    );
                                }    
                                else if (!in_array($file_extension, $allowed_image_extension)) {
                                    $response = array(
                                    "message" => "Upload valid images. Only PNG and JPG are allowed."
                                    );
                                    
                                }    
                                else if (($_FILES["profileimg"]["size"] > 2000000)) {
                                    $response = array(
                                    "message" => "Image size exceeds 2MB"
                                    );
                                }else {
                                $target_dir = "assets/images/profilepics/";
                                $target_file = $target_dir . basename($profileimg); 

                                move_uploaded_file($profileimg_tmp, $target_file);
                                }

                                
                                
                                if(!empty($response)) {  
                                $msg = $response["message"];
                                
                                echo "<script type='text/javascript'>
                                swal('$msg' , 'Go back and try again.','error');
                                </script>";
                                
                                }else {
                                $query_upload = "UPDATE `customer_tbl` SET `profile_photo`='{$profileimg}' WHERE `id` = $user_id";
                                    
                                $upload_img = mysqli_query($conn , $query_upload);
                                
                                    
                                echo ".";
                                
                                    if ($upload_img) { 
                                
                                echo '<script type="text/javascript">
                                swal("Profile Uploaded Successfully.", "", "success").then(() => {
                                window.location.href="my_account.php";
                                });
                                
                                </script>';
                                
                                } else { 
                                echo '<script type="text/javascript">
                                swal("Something went wrong.", "Go back and try again.", "error");
                                </script>';
                                    }
                                } 

                                }

                                ?>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0px !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control" name="profileimg">
                        </div>
                        <input type="submit" class="btn float-right btn-primary" value="Upload" name="upload">
                    </form>



                </div>
            </div>
        </div>
    </div>

    <div class="container emp-profile" style="margin-top:100px;margin-bottom:100px;">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="assets/images/profilepics/<?php echo $img ?>" class="img-fluid"
                        style="width:230px;height:200px;" alt="" />
                    <div class="file btn" style="color:white;cursor:pointer;" data-toggle="modal"
                        data-target="#exampleModal1" title="Change Profile">
                        Change Photo

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <div class="row mt-5 ml-3">
                        <div class="col-sm-8 col-6">
                            <h5>
                                <?php echo $name ?>
                            </h5>
                        </div>
                        <div class="col-sm-4 col-6">
                            <a href="" class="profile-edit-btn" data-toggle="modal" data-target="#exampleModal">Edit
                                Profile</a>
                        </div>
                    </div>

                    <!-- <h6>
                        Web Developer and Designer
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:40px;">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true" style="color:black !important;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mywallet-tab" data-toggle="tab" href="#mywallet" role="tab"
                                aria-controls="mywallet" aria-selected="true" style="color:black !important;">My
                                Wallet</a>
                        </li>
                        
                        

                        <li class="nav-item">
                            <a class="nav-link" id="share-tab" data-toggle="tab" href="#share" role="tab"
                                aria-controls="share" aria-selected="false" style="color:black !important;">My Joins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab"
                                aria-controls="status" aria-selected="true" style="color:black !important;">Coupon & Share</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false" style="color:black !important;">Invite</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <div class="profile-work">
                    <p>PEOPLE JOINED</p>
                     <h6>Kadir Sheikh</h6>
                     <h6>Nidhey Indurkar</h6>
                     <h6>Ritwik Chavhan</h6>
                </div> -->
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p class="para"><?php echo $name; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p class="para"><?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p class="para"><?php echo $mobile; ?></p>
                            </div>
                        </div>
                    </div>


                <!-- wallet start -->
                    <div class="tab-pane fade" id="mywallet" role="tabpanel" aria-labelledby="mywallet-tab">

                     
                        <div class="row mb-5" style="padding:2%;">
                            <div class="col-md-6 col-6">
                                Current Balance
                            </div>
                            <div class="col-md-6 col-6">
                                <?php 
                                
                                $balance="";
                                $get_balance = "SELECT `balance` FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'";
                                $result_get_balance = mysqli_query($conn , $get_balance);
                                $row_get_balance = mysqli_fetch_assoc($result_get_balance);

                                $balance =  $row_get_balance['balance'];
                                echo "Rs."." ".$balance;

                                
                                ?>
                            </div>
                        </div>
                        <?php
                     
                     if(mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `id`='$_SESSION[user_id]' AND `first_purchase`=1")) > 0){
                         ?>
                        <div class="row mt-5 mb-5">
                            <!-- <div class="col-md-4 col-6">
                                <a href="#" style="border:1px solid black;padding:5%;border-radius:20px;text-decoration:none !important;color:#3F51B5 !important;"
                                    data-toggle="modal" data-target="#addmoney">Add Money</a>
                            </div> -->
                            <div class="col-md-4 col-6">
                                <a href="#"
                                    style="border:1px solid black;padding:5%;border-radius:20px;text-decoration:none !important;color:#3F51B5 !important;"
                                    data-toggle="modal" data-target="#withdrawmoney">Request Gift</a>
                            </div>
                            <div class="col-md-4 col-8 check_status">
                                <a href="#"
                                    style="border:1px solid black;padding:5%;border-radius:20px;text-decoration:none !important;color:#3F51B5 !important;"
                                    data-toggle="modal" data-target="#checkstatus">Check Status</a>
                            </div>
                        </div>

                        <div class="modal fade" id="checkstatus" tabindex="-1" role="dialog"
                            aria-labelledby="checkstatusLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="checkstatusLabel">Check Status
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                       
                                        $get_status = "SELECT * FROM `withdraw_request_tbl` WHERE `requested_user_id` = $_SESSION[user_id]";
                                        $result_get_status = mysqli_query($conn ,$get_status);

                                        $count_get_status = mysqli_num_rows($result_get_status);
                                        if($count_get_status > 0){
                                            while($row_get_status = mysqli_fetch_assoc($result_get_status)){
                                                ?>
                                        <h6>Your request for <?php echo $row_get_status['pro_name'] ?> made
                                            on <?php echo $row_get_status['request_date'] ?> is
                                            <b><?php echo $row_get_status['request_status'] ?></b>
                                        </h6> <br>
                                        <hr>
                                        <?php
                                            }
                                        }else{
                                            echo "No request made.";
                                        }

                                        
                                        
                                        ?>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="addmoney" tabindex="-1" role="dialog"
                            aria-labelledby="addmoneyLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addmoneyLabel">Add Money</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                    
                                    if(isset($_POST['add_mon_now'])){
                                        $check_user_exist = mysqli_query($conn , "SELECT * FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'");

                                        
                                        $row_current_balance = mysqli_fetch_assoc($check_user_exist);

                                        $current_balance = $row_current_balance['balance'];
                                        $update_balance = $current_balance + $_POST['add_amount'];


                                        $count_user_exist = mysqli_num_rows($check_user_exist);


    
                                         if($count_user_exist > 0){
    
                                           $update_current_balance =  mysqli_query($conn ,"UPDATE `my_wallet_tbl` SET `balance`= $update_balance WHERE `user_id`='$_SESSION[user_id]'");
                                           if($update_current_balance){
                                           
                                        //    $update_id_status =  mysqli_query($conn ,"UPDATE `customer_tbl` SET `is_id_active`='Yes' WHERE `id`='$_SESSION[user_id]'");

                                            echo '<script>
                                            swal("Money added successfully!", "" , "success").then(() => {
                                                window.location.href="my_account.php";
                                                });;
                                            </script>';
                                           }else{
                                            echo '<script>
                                            swal("Fail to add money", "" , "error");
                                            </script>';
                                           }

                                         }else{
                                            echo '<script>
                                            swal("No record found for this account", "" , "error");
                                            </script>';
                                         }
                                    }

                                    
                                    
                                    ?>
                                        <form action="" method="post">
            
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input type="number" name="add_amount" placeholder="Enter Amount"
                                                    class="form-control">
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="add_mon_now" class="btn btn-primary">Add
                                            Now</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="withdrawmoney" tabindex="-1" role="dialog"
                            aria-labelledby="withdrawmoneyLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="withdrawmoneyLabel">Request Gift</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <form action="" method="post">
                                            

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="user_gift_name" placeholder="Enter Your Name"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="mobile_no">Mobile Number</label>
                                                <input type="text" name="mobile_no" id="user_gift_no" placeholder="Enter Mobile Number"
                                                    class="form-control" min="11" max="11" required>
                                            </div>

                                            

                                            <div class="form-group">
                                                <label for="amount">Which product do you want?</label>
                                                <select name="pro_name" id="user_gift_pro_name" class=form-control>
                            
                                                <?php 
                                                $query_pro = mysqli_query($conn , "SELECT `name`, `price` FROM `products_tbl` WHERE `price` <= $balance");
                                                $pro_price = "";
                                                if(mysqli_num_rows($query_pro) > 0){ 
                                                while($row_pro = mysqli_fetch_assoc($query_pro)){

                                                ?>
                                                
                                                <option value='{"pro_name":"<?php echo $row_pro['name'] ?>","pro_price":"<?php echo $row_pro['price'] ?>"}'>
                                                <?php echo $row_pro['name'] ?> - Rs.<?php echo $row_pro['price'] ?>
                                                </option>
                                                
                                                <?php
                                                }
                                                }else{
                                                    ?>
                                                    <option value='{"pro_name":"#","pro_price":"#"}' readonly>No Product Found</option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                              


                                            <div class="form-group">
                                                <label for="amount">Address of delivery</label>
                                                <textarea name="del_add" id="user_del_address" cols="30" rows="3" class="form-control" placeholder="Enter Address of Delivery"></textarea>
                                            </div>

                                            <input type="hidden" name="order_id" id="user_order_id" value="<?php echo  "LADO" . rand(10000,99999999)?>">


                                    </div>
                                    
                                    </form>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button  class="btn btn-primary send_gift">Request
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                     }else{
                         echo "Purchase your first item to make withdraw request...";
                         echo "<a href='shop.php'>Shop Now</a>";
                     }
                     ?>
                     
                    </div>
                    <!-- wallet end -->
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">

                        <ol>
                            <li class="mb-5" style="color:black !important;">Buy a Rs.100 coupon <a href="#"
                                    class="ml-5"
                                    style="color:black !important;border:1px solid black;padding:1%;border-radius:20px;"
                                    data-toggle="modal" data-target="#buycoupon">Buy
                                    now</a> </li>
                            <li class="mt-5" style="color:black !important;">Share your contacts <a href="#"
                                    class="ml-5"
                                    style="color:black !important;border:1px solid black;padding:1%;border-radius:20px;"
                                    data-toggle="modal" data-target="#sharecontact">Share</a> </li>
                        </ol>
                      




                    </div>

                    <div class="modal fade" id="buycoupon" tabindex="-1" role="dialog" aria-labelledby="buycouponLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buycouponLabel">Buy Rs.100 Discount Coupon</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- <p class="para" style="font-style: italic;">This is one of the way to activate your
                                        account.This
                                        Rs.100 discount coupon will be benefitial in your future purchase.</p> -->

                                    <form action="Paytm_kit/PaytmKit/pgRedirect.php" method="post">


                                        <div class="form-group">
                                            <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                                                name="ORDER_ID" autocomplete="off"
                                                value="<?php echo  "LADO" . rand(10000,99999999)?>">
                                            <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12"
                                                name="CUST_ID" autocomplete="off"
                                                value="<?php echo $_SESSION['user_id'] ?>">
                                            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12"
                                                size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                                            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12"
                                                name="CHANNEL_ID" autocomplete="off" value="WEB">




                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="Enter Your Name"
                                                value="<?php echo $name; ?>" class="form-control" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="number" name="mobile" placeholder="Enter Mobile"
                                                value="<?php echo $mobile; ?>" class="form-control" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Amount">Amount(Rs)</label>
                                            <input title="TXN_AMOUNT" tabindex="10" type="number" name="TXN_AMOUNT"
                                                value="100" class="form-control" readonly required>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="buy_discount" class="btn btn-primary">Buy Now</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="sharecontact" tabindex="-1" role="dialog"
                        aria-labelledby="sharecontactLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sharecontactLabel">Share Contacts</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="para" style="font-style: italic;">This is one of the way to activate your
                                        account.Please share your contacts with us who might be interested to join us.If
                                        10 of your contacts join LADO your account will be activaed</p>

                                    <?php 
                   
                                        if(isset($_POST['send_contact'])){
                                            $name_share = $_POST['name'];
                                            $ref_share = $_POST['ref_code'];
                                        

                                            foreach($_POST['contact'] as $val) {
                                                $share_result = mysqli_query($conn , "INSERT INTO `share_tbl`(`username`, `ref_code`, `contacts`) VALUES ('$name' , '$ref_share' , '$val')");
                                                if($share_result){
                                                    echo '<script>
                                                    swal("Thank you for sharing your contacts!", "Once 10 people join your account will get activated." , "success");
                                                    </script>'; 
                                                }else{
                                                    echo '<script>
                                                    swal("Unable to share your contacts!", "Please try again." , "error");
                                                    </script>';
                                                }
                                            }
                                        }
                                        
                                        ?>
                                    <form action="" method="post">


                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="Enter Your Name"
                                                value="<?php echo $name; ?>" class="form-control" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="ref_code">Your Referal</label>
                                            <input type="text" name="ref_code" placeholder="Enter Your d"
                                                value="<?php echo $referal_code; ?>" class="form-control" required
                                                readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="contacts">Contacts</label>
                                            <div id="dynamicCheck">
                                                <div class="row">
                                                    <div class="col-sm-10 col-10"><input class='form-control mb-3'
                                                            placeholder='Your Contact' type='number' name="contact[]"
                                                            required></div>
                                                    <div class="col-sm-2 col-2">
                                                        <button onclick="createNewElement();" type="button"
                                                            class="btn btn-primary"><i class="fa fa-plus"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>


                                            </div>

                                            <div id="newElementId"></div>
                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="send_contact" class="btn btn-primary">Send</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>My Referal</label>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-10 col-8">

                                        <input type="text" value="<?php echo $referal_code; ?>" class="form-control"
                                            id="myInput">
                                    </div>
                                    <div class="col-sm-2 col-4 mt-2">
                                        <span onclick="copy_referal()"><i class="fa fa-files-o"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Invite your friends to LADO</h5>
                                <h6 class="mb-5">Copy your referal code and share it with your family and friends to ask
                                    them join.
                                </h6>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">


                        <table id="dtBasicExample" class="table display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>


                                   
                                </tr>
                            </thead>
                            <?php 
                             
                             $selct_join = "SELECT * FROM `customer_tbl` WHERE `joined_by`='$referal_code'";
                             $result_join = mysqli_query($conn , $selct_join);
                             $count = mysqli_num_rows($result_join);

                             if($count > 0){
                                 $counter = 1;
                             while($row = mysqli_fetch_assoc($result_join)){
                                 ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $counter;  ?>
                                    </td>
                                    <td>
                                        <?php echo $row['full_name']  ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row['email']  ?>
                                    </td>
                                </tr>
                            </tbody>




                            <?php
                            $counter++;
                             }

                            }else{
                                echo "Nobody had use your referal to join LADO";
                            }
                            
                            ?>
                        </table>


                  


                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'common/footer.php' ?>
    <script type="text/JavaScript">

$('.send_gift').on('click', function() {
 

 var balance = <?php echo $balance; ?>;
 var username = $('#user_gift_name').val();
 var mbl_no = $('#user_gift_no').val();
 var del_add = $('#user_del_address').val();
 var order_id = $('#user_order_id').val();
 var product = JSON.parse($('#user_gift_pro_name :selected').val());
 var pro_name = product.pro_name;
 var pro_price = product.pro_price;

//  console.log(pro_name , pro_price);

        $.ajax({
            url: 'apis/send_gift.php',
            method: 'POST',
            data: {
             balance:balance,
             username:username,
             mbl_no:mbl_no,
             del_add:del_add,
             order_id:order_id,
             pro_name:pro_name,
             pro_price:pro_price

            },
            success(response){
                $('#withdrawmoney').modal('hide');
                swal(response , "" , "").then(() => {window.location.href = "my_account.php";});
            }

        });
    });


        function createNewElement() {
    // First create a DIV element.
	var txtNewInputBox = document.createElement('div');

    // Then add the content (a new input box) of the element.
	txtNewInputBox.innerHTML = '<div class="row"><div class="col-sm-10 col-10"><input required class="form-control mb-3" placeholder="Your Contact" type="number" name="contact[]"></div> <div class="col-sm-2 col-2">  <button onclick="createNewElement();" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></div></div>';

    // Finally put it where it is supposed to appear.
	document.getElementById("newElementId").appendChild(txtNewInputBox);
}

function copy_referal() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
//   alert("Copied the text: " + copyText.value);
  swal("Copied referal code: " , copyText.value , "info")
}
</script>
</body>