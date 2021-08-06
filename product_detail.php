<?php session_start(); ?>
<title>LADO | View</title>
<?php include 'common/connect.php' ?>
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

.atc {
    width: 50%;
    border-radius: 2rem;
    padding: 20px 40px;
    border: none;
    cursor: pointer;
    background-color: #3F51B5 !important;
    color: white;
    text-decoration: none !important;
}

.atc:hover {
    width: 50%;
    border-radius: 2rem;
    padding: 20px 40px;
    border: none;
    cursor: pointer;
    background-color: #3F51B5 !important;
    color: white;
    text-decoration: none !important;
}

.fa-star {
    color: #FFD700;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: black !important;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid #3F51B5 !important;
    font-size: 16px;
    font-weight: bold;
}

.card {
    box-shadow: 5px 5px 5px 5px lightgray;
}

.add_to_card {
    margin-left: 60px;
    background-color: #3F51B5;
    color: white;
    padding: 10px 30px;
    border-radius: 20px;
    text-decoration: none !important;
}

.add_to_card:hover {
    margin-left: 60px;
    background-color: white;
    color: #3F51B5;
    border: 1px solid #3F51B5;
    padding: 10px 30px;
    border-radius: 20px;
    text-decoration: none !important;
}

.btn-buy:link,
.btn-buy:visited {
    border: 1px solid #3F51B5;
    color: #3F51B5;
    border-radius: 20px;
    padding: 10px 22px;
}

.btn-buy:hover,
.btn-buy:active {

    color: white !important;
    background-color: #3F51B5;
    text-decoration: none !important;
}


.add-cart:link,
.add-cart:visited {
    color: white;
    border-radius: 20px;
    padding: 12px 23px;
    background-color: #3F51B5;
    margin-right: 5px;
}

.add-cart:hover,
.add-cart:active {
    border: 1px solid #3F51B5;
    padding: 12px 22px;
    color: #3F51B5 !important;
    background-color: white;
    text-decoration: none !important;
}
</style>

<body>
    <?php 
                if(isset($_GET['id'])){
                
                $id = base64_decode($_GET['id']);
                $query = "SELECT * FROM `products_tbl` WHERE id=$id";
                $data = mysqli_query($conn , $query);
                while($row = mysqli_fetch_assoc($data)){
                    
                    $name = $row['name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $unit = $row['unit'];
                    $description = $row['description'];
                    $type = $row['type'];
                    
                }

                }

?>
    <div class="container">

        <section style="padding-top:100px;padding-bottom:30px;">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <img src="assets/images/products/<?php echo $image; ?>" class="img-fluid" style="width:430px;height:330px;" alt="">
                </div>
                <div class="col-sm-6 col-12">
                    <h2 class="mt-5"><?php echo $name; ?></h2>
                    <h3 class="mt-5 mb-5">Rs.<span class="total_price_detail"><?php echo $price."/".$unit; ?></span> </h3>

                    <?php 
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                            ?>
                    <div class="input-group mb-5 qty">
                        <input type="button" value="-" class="button-minus text-primary" data-field="quantity">
                        <input type="number" step="1" max="" value="1" name="qty" class="quantity-field count">
                        <input type="button" value="+" class="button-plus text-primary" data-field="quantity">
                    </div>
                    <span class="atc add_single_product">Add to cart</span>
                    <?php 
                            }else{
                                ?>
                                <a href="login.php" class="atc add_single_product">Shop Now</a>
                                <?php
                            }
                            ?>

                </div>
                <div class="col-sm-12 col-12 mt-5">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true"
                                style="color:black;">Description</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false"
                                style="color:black;">Reviews</a>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mt-5" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h2 class="mb-5" style="color:#3F51B5;">Description</h2>
                            <p style="font-weight:500;"><?php echo $description; ?></p>
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <h2 class="mb-5" style="color:#3F51B5;">Reviews</h2>
                            <div class="review">

                               <?php 
                                if(isset($_GET['id'])){
                               $p_id = base64_decode($_GET['id']);
                              $query_review_data = "SELECT * FROM `review_product_tbl` WHERE product_id = '$p_id'";
                             
                               $res_review_data = mysqli_query($conn , $query_review_data);
                               if(mysqli_num_rows($res_review_data)>0){
                                while($row_review = mysqli_fetch_assoc($res_review_data)){
                                    ?>
  
                                  <h4><?php 
                                     $res_user = mysqli_fetch_assoc(mysqli_query($conn , "SELECT `full_name` FROM `customer_tbl` WHERE id=$row_review[user_id]")); 
                                     echo $res_user['full_name'];
                                  ?></h4>
                                  <h6><i class="fa fa-star"></i><?php echo $row_review['rating'] ?></h6>
                                  <p style="font-weight:500;"><?php echo $row_review['review'] ?>!</p>
                                  <hr>
                                    <?php
                                }
                               }else{
                                   echo "<p>No review yet!</p>";
                               }
                              
                            } 
                               ?>
                                  
                             
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </section>

        <hr>
        <h2 style="color:#3F51B5;">Related Products</h2>
        <div class="row mt-5">
             <?php 
           
           $pro_id = base64_decode($_GET['id']);
           $query_feature1 = "SELECT * FROM `products_tbl` WHERE `type`='$type' AND `id`!=$pro_id  ORDER BY 'id' DESC LIMIT 3";
           $result_feature1 = mysqli_query($conn , $query_feature1);
           if(mysqli_num_rows($result_feature1) > 0){
           while($row1 = mysqli_fetch_assoc($result_feature1)){
               $name1 = $row1['name'];
               $price1 = $row1['price'];
               $unit1 = $row1['unit'];
               $img1 = $row1['image'];
               $id = $row1['id'];
               ?>
            <div class="col-sm-4 col-12 mb-5">
                <div class="card m-auto" style="width:300px;">
                    <img class="card-img-top" src="assets/images/products/<?php echo $img1 ?>" alt="Card image"
                    style="width:300px;height:270px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7 col-7">
                                <h5 class="card-title"><?php echo $name1 ?></h5>
                            </div>
                            <div class="col-sm-5 col-5">
                                <h6 style="font-size:15px;" class="card-text mb-5">Rs.<?php echo $price1."/".$unit1 ?></h6 >
                            </div>



                        </div>
                        <div  style="text-align:center;">
                            <?php 
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                            ?>
                            <a href="my_cart.php?id=<?php echo base64_encode($id) ?>" class="add-cart">Add
                                to cart</a>
                            <a href="product_detail.php?id=<?php echo base64_encode($id) ?>"
                                class="btn-buy">Quick view</a>
                            <?php 
                            }else{
                                ?>
                            <a href="login.php" class="add-cart">Shop Now</a>
                            <a href="product_detail.php?id=<?php echo base64_encode($id) ?>"
                                class="btn-buy">Quick view</a>
                            <?php
                            }
                            ?>
                            </div>
                    </div>
                </div>
            </div>
            <?php 
           }
        }else{
            echo "<h4 class='mb-5 ml-3'>No related product added yet!</h4>";
        }
           ?>

        </div>

    </div>
    <?php include 'common/footer.php' ?>
    <script>
    $(document).ready(function() {
        $('.count').prop('disabled', true);
        $(document).on('click', '.button-plus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count')
                .val()) + 1);

            $('.total_price_detail').text(<?php echo $price ?> * parseInt($(this).siblings('.count')
                .val()));

            //  * parseInt($('.p_price_d').text());
        });

        $(document).on('click', '.button-minus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count')
                .val()) - 1);
            if ($(this).siblings('.count').val() == 0) {
                $(this).siblings('.count').val(1);
            };

            $('.total_price_detail').text($('.total_price_detail').text() - <?php echo $price ?>);

            if ($('.total_price_detail').text() == 0) {
                $('.total_price_detail').html(<?php echo $price ?>);
            }
        });


        $('.add_single_product').on('click', function() {

            var product_id = <?php echo $id ?>;
            var qty = $('.count').val();
            var total_price = $('.total_price_detail').text();


            $.ajax({
                url: 'apis/add_single_to_cart.php',
                method: 'POST',
                data: {
                    p_id: product_id,
                    quantity: qty,
                    total_price: total_price


                },
                success: function(response) {

                    if (response) {
                        swal("Item Added!", " ", "success").then(() => {
                            window.location.href = "my_cart.php";
                        });

                    } else {
                        swal("Failed to add!", " ", "error");
                    }
                }

            });


        });


    });
    </script>
</body>