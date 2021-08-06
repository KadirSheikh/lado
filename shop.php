<?php session_start(); ?>
<title>LADO | Shop</title>
<?php include 'common/connect.php' ?>
<?php include 'common/header.php' ?>
<style>
header {
    background-image: url(assets/images/other/home.png);
    background-size: cover;
    background-position: center;
    height: 70vh;

    background-attachment: fixed;
}

.hero-text-box {
    position: absolute;
    width: 1000px;
    top: 40%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

h1.bg {
    margin-top: 0;
    color: white;
    font-weight: 600;
    font-size: 60px;

}

.card {
    box-shadow: 5px 5px 5px 5px lightgray;
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

/* background-color:white;color:#3F51B5;padding:10px 27px;border-radius:20px;border:1px solid #3F51B5; */




.behclick-panel .list-group {
    margin-bottom: 0px;
}

.behclick-panel .list-group-item:first-child {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

.behclick-panel .list-group-item {
    border-right: 0px;
    border-left: 0px;
}

.behclick-panel .list-group-item:last-child {
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
}

.behclick-panel .list-group-item {
    padding: 5px;
}

.behclick-panel .panel-heading {
    /* 				padding: 10px 15px;
                            border-bottom: 1px solid transparent; */
    border-top-right-radius: 0px;
    border-top-left-radius: 0px;
    border-bottom: 1px solid darkslategrey;
}

.behclick-panel .panel-heading:last-child {
    /* border-bottom: 0px; */
}

.behclick-panel {
    border-radius: 0px;
    border-right: 0px;
    border-left: 0px;
    border-bottom: 0px;
    box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
}

.behclick-panel .radio,
.checkbox {
    margin: 0px;
    padding-left: 10px;
}

.behclick-panel .panel-title>a,
.panel-title>small,
.panel-title>.small,
.panel-title>small>a,
.panel-title>.small>a {
    outline: none;
}

.behclick-panel .panel-body>.panel-heading {
    padding: 10px 10px;
}

.behclick-panel .panel-body {
    padding: 0px;
}

/* unvisited link */
.behclick-panel a:link {
    text-decoration: none;
}

/* visited link */
.behclick-panel a:visited {
    text-decoration: none;
}

/* mouse over link */
.behclick-panel a:hover {
    text-decoration: none;
}

/* selected link */
.behclick-panel a:active {
    text-decoration: none;
}

.filter_by {
    text-align: center;
    background-color: #3F51B5;
    color: white;
    padding: 15px 60px;
    border-radius: 30px;
    text-decoration: none !important;
}

.filter_by:hover {
    text-align: center;
    background-color: white;
    color: #3F51B5;
    border: 1px solid #3F51B5;
    padding: 15px 60px;
    border-radius: 30px;
}

@media (max-width:767px) {
    h1.bg {
        margin-top: 0;
        color: white;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 25px;

    }

    .filter_by {
        text-align: center;
        background-color: #3F51B5;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none !important;
    }

    .filter_by:hover {
        text-align: center;
        background-color: white;
        color: #3F51B5;
        border: 1px solid #3F51B5;
        padding: 10px 20px;
        border-radius: 20px;
    }
}
</style>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#3F51B5;">Filter Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="accordion" class="panel panel-primary behclick-panel">
                        <div class="panel-body">
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a class="toggle_filter" data-toggle="collapse" href="#collapse1"
                                        style="color:black;">
                                        Type
                                        <span style="float:right;">+</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <ul class="list-group">
                                <li class="list-group-item">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="radio" value="all"
                                                            name="type" checked>
                                                        <span
                                                            style="color:black !important;">All</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <?php 
                                            $query_cat = "SELECT * FROM `catagory_tbl`";
                                            $result_cat = mysqli_query($conn , $query_cat);
                                            while($row_cat = mysqli_fetch_assoc($result_cat)){
                                                ?>


                                            <li class="list-group-item">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="radio" value="<?php echo $row_cat['cat_name'] ?>"
                                                            name="type" checked>
                                                        <span
                                                            style="color:black !important;"><?php echo ucfirst($row_cat['cat_name']) ?></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                </ul>
                            </div>
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a class="toggle_filter" data-toggle="collapse" href="#collapse0"
                                        style="color:black;">
                                        Price<span style="float:right;">+</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse0" class="panel-collapse collapse in">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="0 AND 200" name="price">
                                                <span style="color:black !important;">0 - Rs.200</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="200 AND 400" name="price">
                                                <span style="color:black !important;">Rs.200 - Rs.400</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="400 AND 600" name="price">
                                                <span style="color:black !important;">Rs.400 - Rs.600</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="600 AND 800" name="price">
                                                <span style="color:black !important;">Rs.600 - Rs.800</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="800 AND 1000" name="price">
                                                <span style="color:black !important;">Rs.800 - Rs.1000</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-block apply_filter"
                        style="background-color:#3F51B5;color:white;">Apply</button>
                </div>
            </div>
        </div>
    </div>


    <header>
        <div class="hero-text-box text-center">
            <h1 class="text-light bg">Our Products</h1>
        </div>
    </header>
    <div class="container">
        <div class="row" style="padding-top:130px;">
            <div class="col-sm-9 col-6">
                <h6 style="color:#3F51B5;" class="showing_all_result">Showing all results</h6>
            </div>
            <div class="col-sm-3 col-6 mb-5" style="text-align:center;">
                <a href="#" data-toggle="modal" data-target="#exampleModal" class="filter_by"><i class="fa fa-sliders"
                        aria-hidden="true"></i> Filter
                    By</a>
            </div>
        </div>
        <section style="padding-bottom:130px;">

            <div class="message"></div>
            <div class="row" id="render_products">
                <?php 
                    
                    $query_shop = "SELECT * FROM `products_tbl`";
                    $result_shop = mysqli_query($conn , $query_shop);
                    if(mysqli_num_rows($result_shop) > 0){
                    while($row = mysqli_fetch_assoc($result_shop)){
                        ?>
                <div class="col-sm-4 col-12 mb-5">
                    <div class="card m-auto" style="width:300px;">
                        <img class="card-img-top" src="assets/images/products/<?php echo $row['image']; ?>"
                            alt="Card image" style="width:300px;height:270px;">
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-sm-7 col-7">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                </div>
                                <div class="col-sm-5 col-5 d-flex">
                                    <h6 style="font-size:15px;" class="card-text mb-5">Rs.<?php echo $row['price']."/".$row['unit']; ?></h6>
                                </div>



                            </div>
                            <div  style="text-align:center;">
                            <?php 
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                            ?>
                            <a href="my_cart.php?id=<?php echo base64_encode($row['id']) ?>" class="add-cart">Add
                                to cart</a>
                            <a href="product_detail.php?id=<?php echo base64_encode($row['id']) ?>"
                                class="btn-buy">Quick view</a>
                            <?php 
                            }else{
                                ?>
                           <a href="login.php" class="add-cart">Shop Now</a>
                            <a href="product_detail.php?id=<?php echo base64_encode($row['id']) ?>"
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
                        echo "<h4 class='ml-3'>No product added yet!</h4>";
                        echo "<script>
                        document.querySelector('.showing_all_result').style.display = 'none';
                        document.querySelector('.filter_by').style.display = 'none';
                        </script>";
                    }

            ?>


            </div>

        </section>
    </div>
</body>

<?php include 'common/footer.php' ?>
<script>
$(document).ready(function() {
    $('.toggle_filter').click(function() {
        if ($(this).find('span').text() == '+') {
            $(this).find('span').text('-');
        } else {
            $(this).find('span').text('+');
        }
    });


    $(".apply_filter").click(function() {

        var type = $("input[name='type']:checked").val();
        var price = $("input[name='price']:checked").val();



        $.ajax({
            url: 'apis/filter.php',
            method: 'POST',
            data: {
                type: type,
                price: price
            },
            success: function(response) {
                console.log();

                $('#exampleModal').modal('hide');
                $('#render_products').html(response);
                $('.showing_all_result').html('Showing filtered results.');

                if (response.length < 10) {
                         
                    $('.message').html('<h2>No Item Found!</h2>');
                    

                } else {
                    
                    $('.message').html('');
                }
            }

        });

    });

});
</script>