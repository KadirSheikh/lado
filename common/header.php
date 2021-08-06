<title>Lado</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="" content="" />
<meta name="author" content="codedthemes">
<!-- Favicon icon -->

<link rel="icon" href="assets/images/other/logo.jpeg" type="image/jpeg" sizes="16x16">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">


<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">

<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
body {
    overflow-x: hidden !important;
}

.nav-item::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #fff;
    transition: width .3s;
}

.nav-item:hover::after {
    width: 100%;
    transition: width .3s;
}



.active {
    font-weight: 800;
    border-bottom: 2px solid white;

}



.btn-ghost:link,
.btn-ghost:visited {
    border: 2px solid white;
    color: white;
    border-radius: 30px;

}

.btn-ghost:hover,
.btn-ghost:active {

    color: #3F51B5 !important;
    background-color: white;
}

.swal-button {
    background-color: #3F51B5;
    color: #fff;
    border: none;
    box-shadow: none;
    font-weight: 600;
    font-size: 14px;
    padding: 10px 24px;
    margin: 0;
    cursor: pointer;
    border-radius: 0;
}


.swal-overlay--show-modal .swal-modal {
    opacity: 1;
    pointer-events: auto;
    box-sizing: border-box;
    -webkit-animation: showSweetAlert .3s;
    animation: showSweetAlert .3s;
    will-change: transform;
    border-radius: 0;
}

.swal-button:not([disabled]):hover {
    background-color: #9c88ff;
}

.btn-notify {
    background-color: #6c5ce7;
    color: white;
    text-decoration: none;
    padding: 8px 10px;
    position: relative;
    display: inline-block;
    border-radius: 2px;
}

/* Darker background on mouse-over */
.btn-notify:hover {
    background: #341f97;
}

.btn-notify .badge {
    position: absolute;
    top: -10px;
    right: -10px;
    padding: 2px 5px;
    border-radius: 50%;
    background-color: red;
    color: white;
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

@media (max-width:767px) {
    .nav-item::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: transparent;
        transition: width .3s;
    }

    .nav-item:hover::after {
        width: 100%;
        transition: width .3s;
    }
}
</style>

<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color:#3F51B5;padding:15px;">

    <img src="assets/images/other/logo.jpeg" onclick="window.location.href = 'index.php'" class="img-fluid"
        style="cursor:pointer;width:70px;height:70px;border-radius:50%;" alt="">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        style="background-color: white">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">

        </ul>
        <ul class="navbar-nav">

            <li class="nav-item mr-5 <?= ($activePage == 'index') ? 'active':''; ?>">
                <a class="nav-link text-light" href="index.php"><i class="ti-home"></i> Home</a>
            </li>
            <li class="nav-item mr-5 <?= ($activePage == 'shop') ? 'active':''; ?>">
                <a class="nav-link text-light" href="shop.php"><i class="ti-shopping-cart"></i> Shop</a>
            </li>
            <?php 
               if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            ?>

            <li class="nav-item mr-5 <?= ($activePage == 'my_order') ? 'active':''; ?>">
                <a class="nav-link text-light" href="my_order.php"><i class="ti-list" aria-hidden="true"></i> My
                    Order</a>
            </li>
            <li class="nav-item mr-5 <?= ($activePage == 'my_account') ? 'active':''; ?>">
                <a class="nav-link text-light" href="my_account.php"><i class="ti-user" aria-hidden="true"></i> My
                    Account</a>
            </li>
            <li class="nav-item mr-4 <?= ($activePage == 'my_cart') ? 'active':''; ?>">
                <?php 
                $user_id = $_SESSION['user_id'];
                $query_total_cart_item = "SELECT COUNT('cart_id') as 'cart_item_count' FROM `cart_tbl` WHERE `user_id`=$user_id";
                $result_cart = mysqli_query($conn , $query_total_cart_item);
                while($row = mysqli_fetch_assoc($result_cart)){
                ?>
                <a class="nav-link text-light" href="my_cart.php"><i class="ti-shopping-cart-full"
                        aria-hidden="true"></i> My Cart<span
                        class="badge badge-pill badge-primary ml-1"><?php echo $row['cart_item_count'] ?></span></a>
                <?php
    }

    ?>
            </li>
            <?php } ?>
            <li class="nav-item mr-5 <?= ($activePage == 'about') ? 'active':''; ?>">
                <a class="nav-link text-light" href="about.php"><i class="ti-info" aria-hidden="true"></i> About us</a>
            </li>
            <li class="nav-item <?= ($activePage == 'contact') ? 'active':''; ?>">
                <a class="nav-link text-light" href="contact.php"><i class="ti-email" aria-hidden="true"></i> Get in
                    touch</a>
            </li>


        </ul>
        <ul class="form-inline my-2 my-lg-0" style="list-style-type: none;">
            <?php 
               if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            ?>
            <li>
                <?php 
              
              $query_total_notification = "SELECT COUNT('id') as 'notitfication_count' FROM `profit_log_tbl` WHERE `distribute_user_id`='$_SESSION[user_id]' AND `is_money_sent`='Yes' AND `is_read_by_user`=0";
              $result_total_notification = mysqli_query($conn , $query_total_notification);
              $res_total_notification = mysqli_fetch_assoc($result_total_notification);
              
              $noti_count = $res_total_notification['notitfication_count'];
              
                  ?>
                <a href="#" class="btn-notify" data-toggle="modal" data-target="#notification">
                    <span class="fa fa-bell"></span>
                    <span class="badge">
                        <span id="Count"><?php echo $noti_count ; ?></span>
                    </span>
                </a>



            </li>
            <li>
                <a class="nav-link btn-ghost mr-2" style="margin-left:80px;" href="logout.php">Logout</a>
            </li>

            <?php }else{ ?>

            <a class="nav-link btn-ghost mr-2" style="margin-left:60px;" href="login.php">Login/Register</a>
            <?php } ?>

            <li>
                <a class="nav-link btn-ghost" href="assets/apk/lado.apk" download rel="noopener noreferrer"
                    target="_blank" style="font-weight:700;">
                    <i class="ti-download" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

    </div>
</nav>
<?php 
               if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            ?>
<div class="fixed-top" style="margin-top:6rem;">
    <span class="btn btn-block" style="background-color:#3F51B5!important;color:#fff !important;"> <strong> My Wallet
            Balance:</strong>
        <?php 
                                
            $balance="";
            $get_balance = "SELECT `balance` FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'";
            $result_get_balance = mysqli_query($conn , $get_balance);
            $row_get_balance = mysqli_fetch_assoc($result_get_balance);

            $balance =  $row_get_balance['balance'];
            echo "<strong>Rs."." ".$balance."</strong>";

            
            ?>
    </span>
</div>
<marquee style="margin-top:8rem;background-color:#3F51B5!important;font-size:20px;color:#fff;" width="100%" direction="right" height="4%">
    <?php
    date_default_timezone_set('Asia/Kolkata');
    
    $get_msg = mysqli_query($conn , "SELECT * FROM `msg_tbl`");
    while($row_msg = mysqli_fetch_assoc($get_msg)){

        echo '&#9733;'.$row_msg['message'] ."-(".$row_msg['date'].")"." "."";
        
    }
    

    
    ?>
</marquee>

<?php } ?>




<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="notificationLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationLabel">Notifications</h5>

                </button>
            </div>
            <div class="modal-body">
                <?php 
         
         $result_notification = mysqli_query($conn , "SELECT `distributed_amount` FROM `profit_log_tbl` WHERE `distribute_user_id`='$_SESSION[user_id]' AND `is_money_sent`='Yes' AND `is_read_by_user`=0");
         if(mysqli_num_rows($result_notification) > 0){
            $res_notification =  mysqli_fetch_assoc($result_notification);
            $receive_amount = $res_notification['distributed_amount'];
           echo "You receive Rs.$receive_amount as referal profit in your wallet.";
         }else{
             echo "No notification here.";
         }
         

        ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary read_notification"
                    style="background-color: #3F51B5;border-color: #3F51B5 !important;border-radius:0px !important;">Okay!</button>
            </div>
        </div>
    </div>
</div>