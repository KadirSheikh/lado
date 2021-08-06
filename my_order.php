<?php session_start(); ?>
<title>LADO | My Order</title>
<?php include 'common/connect.php' ?>
<?php include 'common/auth.php' ?>
<?php include 'common/header.php' ?>
<style>
@media (max-width:767px) {

    .config {
        display: none;
    }

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

.modal-body {
    background-color: #fff;
    border-color: #fff
}

.close {
    color: #000;
    cursor: pointer
}

.close:hover {
    color: #000
}

.theme-color {
    color: #004cb9
}

hr.new1 {
    border-top: 2px dashed #fff;
    margin: 0.4rem 0
}

.btn-primary {
    color: #fff;
    background-color: #004cb9;
    border-color: #004cb9;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px
}

.btn-primary:hover {
    color: #fff;
    background-color: #004cb9;
    border-color: #004cb9;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px
}

.steps {
    border: 1px solid #e7e7e7
}

.steps-header {
    padding: .375rem;
    border-bottom: 1px solid #e7e7e7
}

.steps-header .progress {
    height: .25rem
}

.steps-body {
    display: table;
    table-layout: fixed;
    width: 100%
}

.step {
    display: table-cell;
    position: relative;
    padding: 1rem .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-right: 1px dashed #dfdfdf;
    color: rgba(0, 0, 0, 0.65);
    font-weight: 600;
    text-align: center;
    text-decoration: none
}

.step:last-child {
    border-right: 0
}

.step-indicator {
    display: block;
    position: absolute;
    top: .75rem;
    left: .75rem;
    width: 1.5rem;
    height: 1.5rem;
    border: 1px solid #e7e7e7;
    border-radius: 50%;
    background-color: #fff;
    font-size: .875rem;
    line-height: 1.375rem
}

.has-indicator {
    padding-right: 1.5rem;
    padding-left: 2.375rem
}

.has-indicator .step-indicator {
    top: 50%;
    margin-top: -.75rem
}

.step-icon {
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    margin: 0 auto;
    margin-bottom: .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    color: #888
}

.step:hover {
    color: rgba(0, 0, 0, 0.9);
    text-decoration: none
}

.step:hover .step-indicator {
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-color: transparent;
    background-color: #f4f4f4
}

.step:hover .step-icon {
    color: rgba(0, 0, 0, 0.9)
}

.step-active,
.step-active:hover {
    color: rgba(0, 0, 0, 0.9);
    pointer-events: none;
    cursor: default;
    background-color: lightgray;
}

.step-active .step-indicator,
.step-active:hover .step-indicator {
    border-color: transparent;
    background-color: #5c77fc;
    color: #fff
}

.step-active .step-icon,
.step-active:hover .step-icon {
    color: #5c77fc;
    background-color: lightgray;
}

.step-completed .step-indicator,
.step-completed:hover .step-indicator {
    border-color: transparent;
    background-color: rgba(51, 203, 129, 0.12);
    color: #33cb81;
    line-height: 1.25rem
}

.step-completed .step-indicator .feather,
.step-completed:hover .step-indicator .feather {
    width: .875rem;
    height: .875rem
}

@media (max-width: 575.98px) {
    .steps-header {
        display: none
    }

    .steps-body,
    .step {
        display: block
    }

    .step {
        border-right: 0;
        border-bottom: 1px dashed #e7e7e7
    }

    .step:last-child {
        border-bottom: 0
    }

    .has-indicator {
        padding: 1rem .75rem
    }

    .has-indicator .step-indicator {
        display: inline-block;
        position: static;
        margin: 0;
        margin-right: 0.75rem
    }

}

.bg-secondary {
    background-color: #f7f7f7 !important;
}

.modal-lg {
    max-width: 80% !important;
}

.rating {
  display: inline-block;
}

.star {
  background: none;
  border: none;
  font-size: 1.5em;
  padding: 0 0.15em;
  cursor: pointer;
}

.star.is-active {
  color: #F9DC5C;
}

.screen-reader {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}


@media (max-width: 767px) {
    .modal-lg {
        max-width: 100% !important;
    }

    .price_hide {
        display: none;
    }

    .track_order {
        font-size: 11px;
    }

    .review_product {
        font-size: 11px;
    }

    .cancel_order {
        font-size: 11px;
    }


}
</style>

<body>
    <div class="container" style="margin-top:200px;">
        <a href="shop.php" class="btn-buy">&#x2190;Continue Shopping</a>
        <section style="padding-bottom:200px;">
            <h2 style="color:#3F51B5;" class="mb-5 mt-5">My Orders</h2>

            <div class="col-sm-12 col-12 config">
                <div class="row">
                    <div class="col-sm-2 col-6 mb-5">
                        <h5>Product</h5>
                    </div>
                    <div class="col-sm-2 col-4 mb-5">
                        <h5>Name</h5>

                    </div>
                    <div class="col-sm-2 col-6 mb-5">
                        <h5>Quantity</h5>
                    </div>

                    <div class="col-sm-2 col-6 mb-5">
                        <h5>Price</h5>
                    </div>

                    <div class="col-sm-3 col-6 mb-5">
                        <h5>Total Price</h5>
                    </div>
                    <!-- <div class="col-sm-2 col-6 mb-5">
                        <h5>Action</h5>
                    </div> -->
                </div>
            </div>


            <div class="col-sm-12 col-12">
                <div class="is_order_empty"></div>
                <?php

                    $total = 0;
                    $user_id = $_SESSION['user_id'];
                    $order = mysqli_query($conn,"SELECT 
                                                        * 
                                                FROM 
                                                    `order_tbl`
                                                INNER JOIN
                                                        `products_tbl`
                                                ON
                                                    order_tbl.product_id = products_tbl.id 
                                                WHERE 
                                                    order_tbl.user_id = $user_id
                                                AND
                                                        order_tbl.cancel_request = 0
                                                ORDER BY order_tbl.ID DESC");
                    while( $row = mysqli_fetch_assoc($order) )
                    {
                   ?>
                <div class="row mb-5" style="border-bottom:2px solid #3F51B5;">

                    <div class="col-sm-2 col-6 mb-5">
                        <img src="assets/images/products/card1.png" style="width:100px;height:auto;" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-sm-2 col-4 mt-4">
                        <h5><?php echo $row['product_name'] ?></h5>

                    </div>
                    <div class="col-sm-2 col-6 mt-4">
                        <?php echo $row['product_quantity'] ?>
                    </div>

                    <div class="col-sm-2 col-6 mt-4 price_hide">
                        <span>Rs.<?php echo $row['price'] ?></span>
                    </div>

                    <div class="col-sm-3 col-6 mt-4">
                        <span>Rs.<?php echo $row['total_price'] ?></span>
                    </div>

                    <div class="col-sm-6 col-12 mt-4 mb-5">



                        <div class="row">
                            <div class="col-sm-4 col-4">
                                <span class="btn btn-outline-primary track_order"
                                    data-oid="<?php echo $row['order_id']?>">Track Your Order</span>
                            </div>
                            <div class="col-sm-4 col-4">
                                <span class="btn btn-outline-success review_product" data-toggle="modal"
                                    data-target="#reviewproduct" data-pid="<?php echo $row['product_id']?>">Review
                                    Product</span>
                            </div>

                            <div class="col-sm-4 col-4">
                                <span class="btn btn-outline-danger cancel_order"
                                    data-pid="<?php echo $row['order_id']?>">Cancel Order</span>
                            </div>
                        </div>
                    </div>


                </div>


                <?php 
                  
                  } 
                ?>

                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body ">
                                <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                                <div class="px-4 py-5">
                                    <h5 class="text-uppercase"><?php echo $_SESSION['user_name']; ?></h5>
                                    <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>
                                    <span> <b>Order Id:</b> </span>
                                    <span class="theme-color order_id"></span>
                                    <div class="mb-3">
                                        <hr class="new1">
                                    </div>
                                    <div class="row mb-3">
                                        <!-- <div class="col-sm-4 mb-2">
                                        <div class="bg-secondary p-4 text-dark text-center"><span
                                                class="font-weight-semibold mr-2">Shipped via:</span>UPS Ground</div>
                                    </div> -->
                                        <div class="col-sm-6 mb-2">
                                            <div class="bg-secondary p-4 text-dark text-center"><span
                                                    class="font-weight-semibold mr-2">Status:</span> <span
                                                    class="order_status"></span> </div>
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <div class="bg-secondary p-4 text-dark text-center"><span
                                                    class="font-weight-semibold mr-2">Expected date:</span> <span
                                                    class="expected_date"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Progress-->
                                    <div class="steps">

                                    </div>
                                    <div class="text-center mt-5"> <button class="btn btn-primary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                
                if(isset($_POST['make_review'])){
                    
                    $insert_review = mysqli_query($conn , "INSERT INTO `review_product_tbl`(`user_id`,`product_id`, `rating`, `review`) VALUES ('$_SESSION[user_id]','$_POST[product_id]','$_POST[rating]','$_POST[review]')");

                    if($insert_review){
                        echo ' <script>swal("Review added" , "Thank you for review" , "success");</script>';
                    }
                }
                
                
                ?>
                
               

                <div class="modal fade" id="reviewproduct" tabindex="-1" role="dialog"
                    aria-labelledby="reviewproductLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewproductLabel">Review Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="rating" id="product1" action="" method="post">
                                <input type="hidden" name="product_id" id="product_id_each" value="">
                                <input type="hidden" name="rating" id="rating_pro" value="">
                                <div class="form-group">
                                <label for="">Rating : </label>
                                    <button type="submit" class="star" data-star="1">
                                        &#9733;
                                        <span class="screen-reader">1 Star</span>
                                    </button>

                                    <button type="submit" class="star" data-star="2">
                                        &#9733;
                                        <span class="screen-reader">2 Stars</span>
                                    </button>

                                    <button type="submit" class="star" data-star="3">
                                        &#9733;
                                        <span class="screen-reader">3 Stars</span>
                                    </button>

                                    <button type="submit" class="star" data-star="4">
                                        &#9733;
                                        <span class="screen-reader">4 Stars</span> </button>

                                    <button type="submit" class="star" data-star="5">
                                        &#9733;
                                        <span class="screen-reader">5 Stars</span>
                                    </button>
                                </div>
                                

                                     <div class="form-group">
                                     <label for="">Review : </label>
                                    <textarea name="review" id="" cols="70" rows="3"  placeholder="Your Review" class="form-control"></textarea>
                                     </div>
                                    
                                
                            </div>
                            <div class="modal-footer">

                                <button type="submit" name="make_review" class="btn btn-primary" >Review</button>
                            </div></form>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-5" style="border-bottom:2px solid #3F51B5;">

                    <div class="col-sm-2 col-6 mb-5">
                        <img src="assets/images/products/card1.png" style="width:100px;height:auto;" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-2 col-4 mt-4">
                        <h5>Cupcake</h5>

                    </div>
                    <div class="col-sm-2 col-6 mt-4">
                        2
                    </div>

                    <div class="col-sm-2 col-6 mt-4">
                        <span>Rs.300</span>
                    </div>

                    <div class="col-sm-2 col-6 mt-4">
                        <span>Rs.600</span>
                    </div>

                    <div class="col-sm-2 col-6 mt-4 mb-5">
                        <button class="btn btn-outline-danger">Cancel Order</button>
                    </div>


                </div> -->


            </div>


        </section>
    </div>

    <?php include 'common/footer.php' ?>
    <?php

$check_query = "SELECT * FROM order_tbl WHERE `user_id`='$_SESSION[user_id]' AND cancel_request = 0";
$result_check = mysqli_query($conn , $check_query);
$count_check = mysqli_num_rows($result_check);

if($count_check == 0){
echo "<script>
$('.config').hide();
$('.is_order_empty').html('<h3>No record found.</h3>');

</script>";  
}



?>
    <script>
    $(document).ready(function() {

        $('.cancel_order').on('click', function() {
            var p_id = $(this).attr('data-pid');


            swal("Are you sure want to cancel this order?", {
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
                                url: 'apis/cancel_product.php',
                                method: 'POST',
                                data: {
                                    p_id: p_id


                                },
                                success: function(response) {
                                    console.log(response);
                                    var response = JSON.parse(response);
                                    if (response.status) {
                                        swal("Order canceled!", " ", "success").then(
                                            () => {
                                                window.location.href =
                                                    "my_order.php";
                                            });

                                    } else {
                                        swal("Failed to cancel order!", " ", "error");
                                    }
                                }

                            });
                            break;

                        default:
                            swal("Order is not cancelled!");
                    }
                });


        });



        $('.track_order').on('click', function() {
            var o_id = $(this).attr('data-oid');
            // var myDate = new Date();
            // myDate.setDate(myDate.getDate() + 1);
            // var dt = myDate.getDate() + '/' + ("0" + (myDate.getMonth() + 1)).slice(-2) + '/' + myDate.getFullYear();

            $.ajax({
                url: 'apis/track_order.php',
                method: 'POST',
                data: {
                    o_id: o_id


                },
                success: function(response) {
                    console.log(response);
                    var response = JSON.parse(response);

                    $("#staticBackdrop").modal('show');
                    $('.order_id').html(o_id);
                    $('.steps').html(response.dom);
                    $('.order_status').html(response.status);
                    $('.expected_date').html(response.expected_date);

                }

            });


        });
    });

const productRating = document.getElementById('product1');
const stars = productRating.querySelectorAll('.star');
let rating = 0;

/*
* Event Listeners
*/
window.addEventListener('click', e => {
  if(!e.target.matches('.star')) return;
  e.preventDefault();

  const starID = parseInt(e.target.getAttribute('data-star'));
  const starScreenReaderText = e.target.querySelector('.screen-reader');
    
  removeClassFromElements('is-active', stars);
  highlightStars(starID);
  
  resetScreenReaderText(stars);
  starScreenReaderText.textContent = `${starID} Stars Selected`;
  
  rating = starID; // set rating

console.log(rating);
document.getElementById("rating_pro").value = rating;
 
});

// Highlight on hover
window.addEventListener('mouseover', e => {
  if(!e.target.matches('.star')) return;
  
  removeClassFromElements('is-active', stars);
  const starID = parseInt(e.target.getAttribute('data-star'));
  highlightStars(starID);
});

//If a rating has been clicked, snap back to that rating on mouseleave
productRating.addEventListener('mouseleave', e => {
  removeClassFromElements('is-active', stars);
  if (rating === 0) return;
  highlightStars(rating);
});

/*
* Functions
*/

// Highlight active star and all those upto it
function highlightStars(starID) {  
  for (let i = 0; i < starID; i++) {
    stars[i].classList.add('is-active')
  }
}

function removeClassFromElements(className, elements) {
  for(let i = 0; i < elements.length; i++) {
    elements[i].classList.remove(className)
  }
}

function resetScreenReaderText(stars) {
  for(let i = 0; i < stars.length; i++) {
    const starID = stars[i].getAttribute('data-star');
    const text = stars[i].querySelector('.screen-reader');
    
    text.textContent = `${starID} Stars`;
  }
}

$('.review_product').on('click', function() {

// console.log(rating);
var product_id = $(this).attr('data-pid');
$('#product_id_each').val(product_id);



})
    </script>
</body>