<?php session_start(); ?>
<title>LADO | My Cart</title>
<?php include 'common/connect.php' ?>
<?php include 'common/auth.php' ?>
<?php include 'common/header.php' ?>

<style>
input,
textarea {
    border: 1px solid #eeeeee;
    box-sizing: border-box;
    margin: 0;
    outline: none;
    padding: 10px;
}

input[type="button"] {
    -webkit-appearance: button;
    cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

.input-group {
    clear: both;
    margin: 15px 0;
    position: relative;
}

.input-group input[type='button'] {
    background-color: #eeeeee;
    min-width: 38px;
    width: auto;
    transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
    font-weight: bold;
    height: 38px;
    padding: 0;
    width: 38px;
    position: relative;
}

.input-group .quantity-field {
    position: relative;
    height: 38px;
    left: -6px;
    text-align: center;
    width: 62px;
    display: inline-block;
    font-size: 13px;
    margin: 0 0 5px;
    resize: vertical;
}

.button-plus {
    left: -13px;
}

input[type="number"] {
    -moz-appearance: textfield;
    -webkit-appearance: none;
}

.modal-xl {
    width: 95%;
    max-width: 1000px;
}

.go_to_pay {
    border-radius: 30px;
    padding: 18px 110px;
    background-color: #3F51B5;
    color: white;
}

@media (max-width:767px) {

    .go_to_pay {
        border-radius: 20px;
        padding: 9px 55px;
        background-color: #3F51B5;
        color: white;
    }
}

.form-control {
    display: block;
    width: 100%;
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.25;
    color: #495057;
    background-color: #F5F5F5;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .4rem;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.delete_cart_item {
    color: red;
    font-size: 25px;
    cursor: pointer;

}

.btn-buy:link,
.btn-buy:visited {
    border: 1px solid #3F51B5;
    color: #3F51B5;
    border-radius: 20px;
    padding: 10px 22px;
    margin-top: 20px;
}

.btn-buy:hover,
.btn-buy:active {

    color: white !important;
    background-color: #3F51B5;
    text-decoration: none !important;
}
</style>
<?php 

if(isset($_GET['id'])){

    $id = base64_decode($_GET['id']);
    $query = "SELECT * FROM `products_tbl` WHERE id=$id";
    $data = mysqli_query($conn , $query);
    $name = $image = $price = $type = "";
    while($row = mysqli_fetch_assoc($data)){
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
        $profit = $row['profit'];
        $type = $row['type'];
    }

    $u_id = $_SESSION['user_id'];

    $check = mysqli_query($conn,"SELECT * FROM `cart_tbl` WHERE `product_id`= '$id' AND `user_id`='$u_id'");

    if(mysqli_num_rows($check)>0){
        
      $res = mysqli_fetch_assoc($check);
      $product_quantity = $res['quantity']+1;
      $total_price = $res['total_price']+$price;
      $total_profit = $res['total_profit']+$res['product_profit'];
      $update_cart_q = "UPDATE `cart_tbl` SET `quantity`='$product_quantity',`total_price`='$total_price',`total_profit`='$total_profit' WHERE `product_id`= '$id' AND `user_id`='$u_id'";
      $update = mysqli_query($conn,$update_cart_q);
      if ($update) {
        echo '
        <script>
        swal("Item Added!", "Continue Shopping" , "success").then(() => {
            window.location.href="my_cart.php";
          });
        </script>
        ';
      }else{
        echo '
        <script>
        swal("Fail to add!", "Try again" , "error").then(() => {
            window.location.href="my_cart.php";
          });
        </script>
        ';
      }
    } else{


        $insert_cart_q = "INSERT INTO `cart_tbl`(`user_id`, `product_id`, `product_name`, `product_image`,  `product_price`,`product_profit`,`total_profit`, `product_type` , `quantity` , `total_price`) VALUES ($u_id,$id,'$name','$image',$price,'$profit','$profit','$type' , '1', $price)";
        $data_cart = mysqli_query($conn , $insert_cart_q);

        if($data_cart){
            echo '
            <script>
            swal("Item Added!", "Continue Shopping" , "success").then(() => {
                window.location.href="my_cart.php";
              });
            </script>
            ';

        }else{
            echo '
            <script>
            swal("Fail to add!", "Try again" , "error").then(() => {
                window.location.href="my_cart.php";
              });
            </script>
            ';
          }
        }


    }
?>

<body>
    <div class="container" style="margin-top:100px;">
        <a href="shop.php" class="btn-buy">&#x2190;Continue Shopping</a>
        <section style="padding-bottom:200px;">
            <h2 style="color:#3F51B5;" class="mt-5">Cart Products</h2>

            <div class="row">
                <div class="col-sm-8 col-12" style="border-right:2px solid lightgray;">

                    <hr>
                    <div class="is_cart_empty"></div>
                    <?php 
                    $u_id = $_SESSION['user_id'];
                     $get_cart = "SELECT * FROM `cart_tbl` WHERE `user_id`=$u_id ORDER BY `cart_id` DESC";
                    $cart_data = mysqli_query($conn , $get_cart);
                    
                    while($row1 = mysqli_fetch_assoc($cart_data)){
                        
                    ?>

                    <div class="row mb-5">
                        <div class="col-sm-1 col-2 mt-5">
                            <span class="delete_cart_item" data-cd="<?php echo $row1['cart_id'] ?>">&times;</span>
                        </div>
                        <div class="col-sm-3 col-6">
                            <img src="assets/images/products/<?php echo $row1['product_image'] ?>"
                                style="width:150px;height:100px;" class="img-fluid mt-3" alt="">
                        </div>
                        <div class="col-sm-3 col-4 mt-5">
                            <h5><?php echo $row1['product_name'] ?></h5>

                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="input-group mt-5 qty">
                                <input type="button" value="-" class="button-minus text-primary" data-field="quantity">
                                <input type="number" step="1" max="" value="<?php echo $row1['quantity'] ?>" name="qty"
                                    class="quantity-field count" data-pid="<?php echo $row1['product_id'] ?>"
                                    data-price="<?php echo $row1['product_price'] ?>"
                                    data-cid="<?php echo $row1['cart_id'] ?>">
                                <input type="button" value="+" class="button-plus text-primary" data-field="quantity">
                            </div>

                        </div>

                        <div class="col-sm-2 col-6 mt-5">
                            <p id="total_price_<?php echo $row1['cart_id']; ?>">Rs.<?php echo $row1['total_price'] ?>
                            </p>
                        </div>


                    </div>
                    <hr>
                    <?php } ?>

                </div>

                <div class="col-sm-1"></div>

                <div class="col-sm-3 col-12 checkout_cart">
                    <div class="row">
                        <div class="col-sm-10 col-8 col-8">
                            <h5>Subtotal</h5>
                        </div>
                        <?php 
                        $user_id = $_SESSION['user_id'];
                        $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
                        $result_sum = mysqli_query($conn , $sum_query);
                            while($row = mysqli_fetch_assoc($result_sum)){
                                ?>
                        <div class="col-sm-2 col-4 mb-4 col-4">
                            Rs.<span class="subtotal" id="sub_total_price"><?php echo $row['total'] ?></span>
                        </div>
                        <?php
                                
                            }

                         ?>


                        <div class="col-sm-10 col-8">
                            <h5>Shipping Fee</h5>
                        </div>
                        <div class="col-sm-2 mb-4 col-4">
                            Free
                        </div>

                        <?php 
                        
                        $check_coupon = mysqli_query($conn , "SELECT `is_dc_buy` FROM `my_wallet_tbl` WHERE `user_id` = '$_SESSION[user_id]'");

                        $res_check_coupon = mysqli_fetch_assoc($check_coupon);

                        if($res_check_coupon['is_dc_buy'] == 'Yes'){
                            ?>
                        <div class="col-sm-10 col-8 is_coupon_applied">
                            <h5>Coupon</h5>
                        </div>
                        <div class="col-sm-2 mb-4 col-4 is_coupon_applied">
                            <a href="" data-toggle="modal" data-target="#apply_coupon"
                                style="padding:5px 10px;border:1px solid #3F51B5;color:#3F51B5 !important;text-decoration:none !important;">Apply</a>
                        </div>
                        <?php
                        }
                        
                       

                        ?>

                        <div class="col-sm-10 col-8  yes_coupon_applied" style="display:none;">
                            <h5>Coupon Applied</h5>
                        </div>
                        <div class="col-sm-2 mb-4 col-4 yes_coupon_applied" style="display:none;">
                            <button class="cancel_coupon"
                                style="padding:5px 10px;border:1px solid red;color:red !important;text-decoration:none !important;">Cancel</button>
                        </div>

                        <!-- apply coupon modal start -->
                        <div class="modal fade" id="apply_coupon" tabindex="-1" role="dialog"
                            aria-labelledby="apply_couponLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="apply_couponLabel">Apply Discount Coupon</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-sm-2 col-2">
                                                <input type="radio" class="form-control mt-4" checked name="coupon_d">
                                            </div>
                                            <div class="col-sm-10 col-10">
                                                <h5 class="mt-3"> Discount Coupon (Rs.100)</h5>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            style="border:none !important;background-color:#e74c3c !important;border-radius:0px !important;">Close</button>
                                        <button type="button" class="btn btn-primary apply_d_c"
                                            style="background-color:#3F51B5 !important;border-radius:0px !important;">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- apply coupon modal end -->

                        <!-- use wallet modal start -->
                        <div class="modal fade" id="use_wallet" tabindex="-1" role="dialog"
                            aria-labelledby="use_walletLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="use_walletLabel">Use Wallet Balance</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <?php 
                                     
                                     $balance='';
                                     $get_balance_modal = "SELECT `balance` FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'";
                                     $result_get_balance_modal = mysqli_query($conn , $get_balance_modal);
                                     $row_get_balance_modal = mysqli_fetch_assoc($result_get_balance_modal);
                         
                                     $balance =  $row_get_balance_modal['balance'];
                                    ?>

                                        <h6 class="text-center">Your Current Wallet Balance is
                                            Rs.<?php echo $balance; ?></h6>

                                        <div class="form-group">
                                            <label for="Use Wallet">Use wallet balance</label>
                                            <input type="text" id="enter_wallet_balance" class="form-control"
                                                placeholder='Enter amount less than current balance.'>
                                        </div>
                                        <div class="form-group">
                                        <mark>Note: Onced used wallet money cannot get reverted after clicking "Use" button.</mark>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            style="border:none !important;background-color:#e74c3c !important;border-radius:0px !important;">Close</button>
                                        <button type="button" class="btn btn-primary use_wallet_balance"
                                            style="background-color:#3F51B5 !important;border-radius:0px !important;">Use</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- use wallet modal end -->
                        <?php 
                                
                                
                                $get_balance = "SELECT `balance` FROM `my_wallet_tbl` WHERE `user_id`='$_SESSION[user_id]'";
                                $result_get_balance = mysqli_query($conn , $get_balance);
                                $row_get_balance = mysqli_fetch_assoc($result_get_balance);
                    
                                $balance =  $row_get_balance['balance'];
                                if($balance >=0){
                                    ?>



                        <div class="col-sm-10 col-8 mb-4 use_wallet_div">
                            <h5>Wallet Balance</h5>
                        </div>

                        <div class="col-sm-2 col-4 mb-4 use_wallet_div">
                            <button
                                style="background-color:#3F51B5 !important;border-radius:0px !important;color:#fff !important;"
                                data-toggle="modal" data-target="#use_wallet">Use</button>
                        </div>

                        <?php
                                }
                    
                                
                                ?>



                        <div class="col-sm-12 mb-4">
                            <hr>
                        </div>

                        <div class="col-sm-10 col-8">
                            <h5>Total</h5>
                        </div>
                        <?php 
                        $user_id = $_SESSION['user_id'];
                        $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
                        $result_sum = mysqli_query($conn , $sum_query);
                            while($row = mysqli_fetch_assoc($result_sum)){
                                ?>

                        <div class="col-sm-2 mb-5 col-4">
                            Rs.<span class="subtotal" id="total_price"><?php echo $row['total'] ?></span>
                        </div>
                        <?php
                                
                            }

                         ?>

                        <div class="col-sm-12 mb-4" style="text-align:center;">
                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                style="padding: 18px 110px;background-color: #3F51B5;color: white;text-decoration: none;">Checkout</a>
                        </div>


                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel" style="color:#3F51B5;">Make Payment
                                    </h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" style="color:#3F51B5;font-size:40px;">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" style="padding:70px 50px;">

                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group field">

                                                <input type="text" class="form-control" placeholder="First Name"
                                                    name="firstname" id="firstname">
                                            </div>

                                            <div class="form-group field">

                                                <input type="text" class="form-control" placeholder="Last Name"
                                                    name="lastname" id="lastname">
                                            </div>
                                            <div class="form-group field">
                                                <label for="" style="color:#3F51B5;font-size:20px;">Select Payment
                                                    Mode</label>
                                                <div class="row">
                                                    <div class="col-sm-6 col-10">
                                                        <i class="fa fa-money mr-3" aria-hidden="true"
                                                            style="color:#3F51B5;"></i> Cash on
                                                        delivery
                                                    </div>
                                                    <div class="col-sm-2 col-2">
                                                        <input type="radio" value="cod" class="form-control mt-2"
                                                            name="payment_mode">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-10">
                                                        <i class="fa fa-paypal mr-4" aria-hidden="true"
                                                            style="color:#3F51B5;"></i> Paytm
                                                    </div>
                                                    <div class="col-sm-2 col-2">
                                                        <input type="radio" value="paytm" class="form-control mt-2"
                                                            name="payment_mode">
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                        <div class="col-sm-6 col-10">
                                                            <i class="fa fa-credit-card-alt mr-3" aria-hidden="true"
                                                                style="color:#3F51B5;"></i> Credit or Debit Card
                                                        </div>
                                                        <div class="col-sm-2 col-2">
                                                            <input type="radio" value="card" class="form-control mt-2"
                                                                name="payment_mode">
                                                        </div>
                                                    </div> -->
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="form-group field">

                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email Address" id="email">
                                            </div>
                                            <div class="form-group field">

                                                <textarea cols="30" rows="5" class="form-control"
                                                    placeholder="Address of delivery" name="address"
                                                    id="address"></textarea>
                                            </div>
                                            <div class="form-group field">

                                                <input type="number" class="form-control" placeholder="Mobile Number"
                                                    name="mobile" id="mobile">
                                            </div>
                                            <div class="form-group field">

                                                <input type="text" class="form-control" placeholder="Your City"
                                                    name="city" id="city">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mt-5 actions" style="text-align:center;">

                                        <input type="submit" class="go_to_pay" name="proceed_checkout"
                                            value="Proceed Checkout" style="cursor:pointer;" disabled="disabled">

                                    </div>


                                </div>
                                <!-- <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-primary">Go to payment</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="paytm_checkout" tabindex="-1" role="dialog" aria-labelledby="paytm_checkoutLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paytm_checkoutLabel">Next Step</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body_paytm">

                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>


    <?php include 'common/footer.php' ?>
    <?php

        $check_query = "SELECT * FROM cart_tbl WHERE `user_id`='$_SESSION[user_id]'";
        $result_check = mysqli_query($conn , $check_query);
        $count_check = mysqli_num_rows($result_check);

        if($count_check == 0){
        echo "<script>
        $('.checkout_cart').hide();
        $('.is_cart_empty').html('<h3>No item in cart.</h3>');
        </script>";  
        }



        ?>
    <script>
    $(document).ready(function() {

        $('.apply_d_c').on('click', function() {
            var total_price = $('#total_price').text() - 100;
            var sub_total_price = $('#sub_total_price').text() - 100;
            $.ajax({
                url: 'apis/update_coupon_balance.php',
                method: 'POST',
                data: {},
                success: function(response) {

                    $('#total_price').text(total_price);
                    $('#sub_total_price').text(sub_total_price);
                    $('.is_coupon_applied').hide();
                    $('.yes_coupon_applied').show();
                    $('#apply_coupon').modal('hide');

                }
            });
        });


        $('.use_wallet_balance').on('click', function() {
            var balance = '<?php echo $balance; ?>';
            var enter_w_b = $('#enter_wallet_balance').val();
          
             console.log(balance , enter_w_b);

            var total_price = $('#total_price').text() - enter_w_b;
            var sub_total_price = $('#sub_total_price').text() - enter_w_b;

            if (parseInt(enter_w_b) >= parseInt(balance)) {
                
                swal("Entered amount is more than current balance!", "", "error")
            } else if (parseInt(enter_w_b) > parseInt($('#total_price').text())) {
                
                swal("Entered amount is more than product price!", "", "error")
            } else {

                $.ajax({
                    url: 'apis/use_wallet_bal.php',
                    method: 'POST',
                    data: {
                        balance: balance,
                        entered_amount: enter_w_b
                    },
                    success: function(response) {

                        if (response) {
                            $('#total_price').text(total_price);
                            $('#sub_total_price').text(sub_total_price);
                            $('.use_wallet_div').hide();
                            $('#use_wallet').modal('hide');
                        } else {
                            swal("Failed to use wallet balance!", "", "error");
                            $('#use_wallet').modal('hide');
                        }


                    }
                });



            }
            $('#use_wallet').modal('hide');

        })


        $('.cancel_coupon').on('click', function() {
            console.log("okk");
            var total_price = parseInt($('#total_price').text()) + 100;
            var sub_total_price = parseInt($('#sub_total_price').text()) + 100;
            $.ajax({
                url: 'apis/cancel_coupon.php',
                method: 'POST',
                data: {},
                success: function(response) {

                    $('#total_price').text(total_price);
                    $('#sub_total_price').text(sub_total_price);
                    $('.is_coupon_applied').show();
                    $('.yes_coupon_applied').hide();

                }
            });
        })


        $('.field input').on('keyup', function() {
            let empty = false;

            $('.field input').each(function() {
                empty = $(this).val().length == 0;
            });

            if (empty)
                $('.actions input').attr('disabled', 'disabled');
            else
                $('.actions input').attr('disabled', false);
        });



        $('.go_to_pay').on('click', function() {


            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var payment_mode = $('input[name="payment_mode"]:checked').val();
            var total_price = $('#total_price').text();

            $.ajax({
                url: 'apis/checkout.php',
                method: 'POST',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    mobile: mobile,
                    address: address,
                    city: city,
                    payment_mode: payment_mode,
                    total_price: total_price

                },
                success: function(response) {

                    console.log(response.length);
                    if (response.length > 100) {

                        $('#exampleModal').modal('hide');


                        $("#paytm_checkout").modal('show');
                        $(".modal-body_paytm").html(response);
                    } else {

                        var response = JSON.parse(response);
                        console.log(response);


                        if (response.status == 'ok') {
                            $('#exampleModal').modal('hide');
                            swal("Order placed", "", "success").then(() => {
                                window.location.href = "my_cart.php";
                            });
                        } else {
                            swal("Fail to place order", "", "error");
                        }
                    }




                }
            });



        })

        $('.count').prop('disabled', true);

        $(document).on('click', '.button-plus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count')
                .val()) + 1);

            var quantity = $(this).siblings('.count').val();
            var pro_id = $(this).siblings('.count').attr('data-pid');
            var pro_price = $(this).siblings('.count').attr('data-price');
            var cart_id = $(this).siblings('.count').attr('data-cid');
            var product_profit = $(this).siblings('.count').attr('data-profit');
            var total_product_profit = $(this).siblings('.count').attr('data-totalprofit');
            var user_id = <?php echo $_SESSION['user_id'];?>

            console.log(quantity, pro_id, pro_price, cart_id, user_id);

            $.ajax({
                url: 'apis/update_qty_plus.php',
                method: 'POST',
                data: {
                    quantity: quantity,
                    product_id: pro_id,
                    price: pro_price,
                    user_id: user_id

                },
                success: function(response) {
                    // console.log(response);
                    var response = JSON.parse(response);
                    console.log(response);

                    if (response) {

                        $('#total_price_' + cart_id).html("Rs." +
                            response.total +
                            "");
                        $('.subtotal').html("" + response.subtotal +
                            "");

                    }
                }

            });
        });


        $(document).on('click', '.button-minus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count')
                .val()) - 1);
            if ($(this).siblings('.count').val() == 0) {
                $(this).siblings('.count').val(1);
            };


            var quantity = $(this).siblings('.count').val();
            var pro_id = $(this).siblings('.count').attr('data-pid');
            var pro_price = $(this).siblings('.count').attr('data-price');
            var cart_id = $(this).siblings('.count').attr('data-cid');
            var user_id = <?php echo $_SESSION['user_id'];?>

            console.log(quantity, pro_id, pro_price, cart_id, user_id);

            $.ajax({
                url: 'apis/update_qty_minus.php',
                method: 'POST',
                data: {
                    quantity: quantity,
                    product_id: pro_id,
                    price: pro_price,
                    user_id: user_id

                },
                success: function(response) {
                    console.log(response)
                    var response = JSON.parse(response);
                    console.log(response);

                    if (response.status) {

                        $('#total_price_' + cart_id).html("Rs." +
                            response.total +
                            "");
                        $('.subtotal').html("" + response.subtotal +
                            "");
                    }
                }

            });
        });

        $('.delete_cart_item').on('click', function() {
            var cart_id = $(this).attr('data-cd');
            console.log(cart_id);


            swal("Are you sure want to delete?", {
                    buttons: {
                        cancel: "No",
                        catch: {
                            text: "Yes",
                            value: "catch",
                        }
                    },
                })
                .then((value) => {
                    switch (value) {

                        case "catch":
                            $.ajax({
                                url: 'apis/delete_cart_item.php',
                                method: 'POST',
                                data: {
                                    cart_id: cart_id

                                },
                                success: function(response) {
                                    console.log(response);
                                    var response = JSON.parse(response);
                                    console.log(response);

                                    if (response.status) {
                                        swal(response.message, "",
                                            "success").then(
                                            () => {
                                                window.location
                                                    .href =
                                                    "my_cart.php";
                                            });

                                    } else {
                                        swal(response.message, "",
                                            "error");
                                    }
                                }

                            });
                            break;

                        default:
                            swal("Item is not deleted!");
                    }
                });






        });

    });
    </script>


</body>

<!-- align-self-center -->