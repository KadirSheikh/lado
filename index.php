<?php session_start(); ?>
<title>LADO | Home</title>
<?php include 'common/connect.php' ?>
<?php include 'common/header.php' ?>
<style>
header {
    background-image: url(assets/images/other/home.png);
    background-size: cover;
    background-position: center;
    height: 100vh;

    background-attachment: fixed;
}

.hero-text-box {
    position: absolute;
    width: 1000px;
    top: 50%;
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

a.shop_now {
    padding: 20px 50px;
    border-radius: 40px;
    background-color: #3F51B5;
    color: white;
    text-decoration: none;
}

a.shop_now:hover {

    background-color: #a29bfe;

    text-decoration: none;
}

@media (max-width:767px) {
    a.shop_now {
        padding: 10px 25px;
        border-radius: 20px;
        background-color: #3F51B5;
        color: white;
        text-decoration: none;
    }

    h1.bg {
        margin-top: 0;
        color: white;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 25px;

    }

    h3 {
        margin: auto;
        font-size: 15px;
        padding-left: 30px;

    }

    .mbl-head {
        font-size: 20px !important;

    }

    .mbl-sub {
        font-size: 18px !important;

    }

}

.card {
    box-shadow: 5px 5px 5px 5px lightgray;
}

#client-testimonial-carousel {
    min-height: 200px;
}

.fa-star {
    color: #FFD700;
}

.view_more {
    text-align: center;
    background-color: #3F51B5;
    color: white;
    padding: 10px 30px;
    border-radius: 20px;
    text-decoration: none !important;
}

.quick_view {
    margin-left: 60px;
    background-color: #3F51B5;
    color: white;
    padding: 10px 30px;
    border-radius: 20px;
    text-decoration: none !important;

}

.view_more:hover {
    text-align: center;
    background-color: white;
    padding: 10px 30px;
    border-radius: 20px;

    border: 1px solid #3F51B5;
    color: #3F51B5 !important;
    text-decoration: none !important;
}

.quick_view:hover {
    margin-left: 60px;
    background-color: white;
    border: 1px solid #3F51B5;
    color: #3F51B5;
    padding: 10px 30px;
    border-radius: 20px;
    text-decoration: none !important;

}

.carousel-item-next,
.carousel-item-prev,
.carousel-item.active {
    display: block;
    border: none !important;
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
</style>

<body>
    <header>
        <div class="hero-text-box text-center">
            <h1 class="mbl-head text-light bg">The Best Products and Services</h1>
            <h3 class="mbl-sub text-light mb-5">खर्चे से सुरू होगी कमाई.</h3>
            <a href="shop.php" class="shop_now">Shop Now</a>
            <a href="registration.php" class="shop_now">Join Now</a>
        </div>
    </header>

    <div class="container">


        <section style="padding-top:130px;">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2 style="color:#3F51B5;" class="mb-4">Our Featured Products</h2>
                </div>
                <div class="col-sm-3 col-6 mb-5" style="text-align:center;">
                    <a href="shop.php" class="view_more" style="">View
                        more</a>
                </div>
                <div class="col-sm-3 col-6 mb-5" style="text-align:center;">
                    <a href="shop.php" class="view_more" style="" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-sliders" aria-hidden="true"></i> Filter</a>
                </div>
            </div>

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



            <div class="message"></div>
            <div class="row" id="render_products">
                <?php 
           
            
           $query_feature1 = "SELECT * FROM `products_tbl` ORDER BY 'id' DESC LIMIT 3";
           $result_feature1 = mysqli_query($conn , $query_feature1);
           if(mysqli_num_rows($result_feature1) > 0){
           while($row_feature = mysqli_fetch_assoc($result_feature1)){
               $name1 = $row_feature['name'];
               $price1 = $row_feature['price'];
               $unit1 = $row_feature['unit'];
               $img1 = $row_feature['image'];
               $id = $row_feature['id'];

               ?>
                <div class="col-sm-4 col-12 mb-5">
                    <div class="card m-auto" style="width:300px;">
                        <img class="card-img-top" src="assets/images/products/<?php echo $img1; ?>" alt="Card image"
                            style="width:300px;height:270px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-7 col-7">
                                    <h5 class="card-title"><?php echo $name1; ?></h5>
                                </div>
                                <div class="col-sm-5 col-5 d-flex">
                                    <h6 style="font-size:15px;" class="card-text mb-5">
                                        Rs.<?php echo $price1."/".$unit1; ?></h6>
                                </div>



                            </div>
                            <div style="text-align:center;">
                                <?php 
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                            ?>
                                <a href="my_cart.php?id=<?php echo base64_encode($id) ?>" class="add-cart">Add
                                    to cart</a>
                                <a href="product_detail.php?id=<?php echo base64_encode($id) ?>" class="btn-buy">Quick
                                    view</a>
                                <?php 
                            }else{
                                ?>
                                <a href="login.php" class="add-cart">Shop Now</a>
                                <a href="product_detail.php?id=<?php echo base64_encode($id) ?>" class="btn-buy">Quick
                                    view</a>
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
                        echo "<h4 class='ml-5'>No Product added yet!</h4>";
                        echo "<script>document.querySelector('.view_more').style.display = 'none';</script>";
                    }
           
           ?>

            </div>

        </section>

        <section style="padding:130px 0px;">
            <div class="row">
                <!-- <div class="col-sm-6 col-12">
                    <img src="assets/images/other/cupcake.png" class="img-fluid" style="width:350px;height:350px;"
                        alt="">
                </div> -->
                <div class="col-sm-12 col-12">
                    <h1 style="color:#3F51B5;" class="mb-5">About Lado</h1>
                    <div class="row">
                        <div class="col-sm-6">

                            <!-- <h3 style="color:#3F51B5;">Our Aim</h3> -->
                            <p style="font-size:17px;" class="mb-5">
                                Local area development organization has been working for the prosperity of local area
                                for
                                the
                                last 10 years. We believe that if we want to bring prosperity in our region, then we
                                have to try
                                ourselves, no one can come from outside and do anything for us. Our community depends
                                only on
                                our efforts.
                                Keeping this in mind, taking the youth section of our region together and making them
                                aware of
                                their competitive exam, they created our institute Star Study Group to join the job in
                                government service. Have done
                                Also, with the aim of providing employment to unemployed youth and the Kisan brothers
                                should get
                                fair price of milk, our organization established Samriddhi Milk. Through this, people
                                are
                                connected with us. With Jesus, our endemic area can prosper.
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-size:17px;" class="mb-5">
                                स्थानिक क्षेत्र समृद्धी संस्था पिछले 10 वर्षो से स्थानिक क्षेत्र के समृद्धी के लिये
                                कार्य कर रही है. हमारा यह मानना है की अगर हमारे क्षेत्र में अगर समृद्धी लानी है तो हमे
                                खुद को ही प्रयास करणा होगा कोई बाहर से आकर हमारे लिये कुछ नही कर सकता. हमारी समुद्धी
                                केवल हमारे प्रयासो पर निर्भर है.
                                इसी बात को ध्यान मे रखते हुये हमारे क्षेत्र के युवा वर्ग को साथ लेते हुये उने स्पर्धा
                                परीक्षा के बारे मे जागरूक कर सरकारी सेवा मे नोकरी मिलणें के लिये हमारी संस्थाने स्टार
                                स्टडी ग्रुप का निर्माण किया जीस के माध्यम से आज कही युवा सरकारी नोकरी प्राप्त कर चुके
                                है.
                                साथ ही बेरोजगार युवा वो को रोजगार प्राप्त हो और किसाण भाईयो को दूध का उचित मूल्य प्राप्त
                                हो इस उद्देश को ध्यान मे रखते हुये हमारी संस्था ने समृद्धी मिल्क की स्थापना की. इस के
                                माध्यम से हमारे साथ शेकडो लोग जूडे हुये है. जीस से हमारा स्थानिक क्षेत्र समृद्ध हो सके.
                            </p>
                        </div>

                    </div>

                    <a href="shop.php" class="shop_now">Shop Now</a>
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div class="row">
                <!-- <div class="col-sm-6 col-12">
                    <img src="assets/images/other/cupcake.png" class="img-fluid" style="width:350px;height:350px;"
                        alt="">
                </div> -->
                <div class="col-sm-12 col-12">
                    <h1 style="color:#3F51B5;" class="mb-5">For our partner</h1>
                    <div class="row">
                        <div class="col-sm-6">

                            <!-- <h3 style="color:#3F51B5;">Our Aim</h3> -->
                            <p style="font-size:17px;" class="mb-5">
                                We are going to give such a chance to all your partners by Lado Ecom which till date no
                                system has given you. You can get life time benefit by registering for free in Lado
                                Ecom. The benefits coming in the Lado Ecom will be shared equally with all your
                                partners. For this, you will have to buy any one of the products of Daily Need given
                                below, along with this you will become a partner of our Lado Ecom.
                                <br>
                                You have started your business or want to do it and you have to increase it further
                                For this, you need to dress up your products to more customers. Of lado ecom
                                Through this, it will be very simple and absolutely beneficial for you. Join us for more
                                information
                                Must contact
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-size:17px;" class="mb-5">
                                लाडो इकॉम् द्वारा हम आप सभी पार्टनर को एक ऐसा मौका देने वाले है जो आज तक किसी भी सिस्टम
                                ने आपको नही दिया होगा. लाडो इकॉम मे फ्री मे रजिस्टर होकर आप पा सकते है लाईफ टाइम
                                बेनीफिट. लाडो इकॉम् मे आने वाले फायदे को आप सभी पार्टनर के साथ बराबर बाटा जायेगा. इसके
                                लिये आपको नीचे दि गये डेली नीड के प्रॉडक्ट्स मे से कोई भी एक प्रॉडक्ट खरीदना होगा इस के
                                साथ ही आप हमारे लाडो इकॉम के पार्टनर बन जायेंगे.

                                <br>
                                आप ने अपना बिजनेस स्टार्ट कर लिया है या करणा चाहते हो और आपको उसे और अधिक बढा करणा है
                                इसके लिये आपको अपने प्रॉडक्ट्स को ज्यादा ग्राहको तक पोहचाणा बहोत जरुरी है. लाडो इकॉम के
                                माध्यम से ये आपके लिये होगा बिल्कुल सरल और एकदम फायदेमंद. अधिक जाणकारी के लिये हमारे साथ
                                अवश्य संपर्क करे.
                            </p>
                        </div>

                    </div>


                </div>
            </div>
        </section>





        <h2 style="color:#3F51B5;" class="mb-5">Our Happy Customers</h2>
    </div>

    <?php 
    
    if(mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `review_product_tbl` ORDER BY 'id' DESC LIMIT 3")) >= 3){
        ?>



    <div class="col-sm-12 col-12 offset-lg-1 pt-5 pb-5 mb-5 text-light" style="background-color:#3F51B5;">
        <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
            <div class="carousel-inner" role="listbox">

                <?php 
                
                
                $result_review = mysqli_query($conn , "SELECT * FROM `review_product_tbl` WHERE `id`=1");
                while($row1 = mysqli_fetch_assoc($result_review)){
                    $user_id1 = $row1['user_id'];
                    $rating1 = $row1['rating'];
                    $review1 = $row1['review'];

                    ?>
                <div class="carousel-item active text-center p-4">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i> <?php echo $review1; ?> <i
                                class="fa fa-quote-right"></i>
                        </p>
                        <footer class="blockquote-footer"><?php 

                        $res_user1 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT `full_name` FROM `customer_tbl` WHERE id=$user_id1")); 
                        echo $res_user1['full_name'];
                        ?>
                        </footer>
                        <!-- Client review stars -->
                        <!-- "fa fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                        <p class="client-review-stars">
                            <?php 
                         for($i=1;$i<=$rating1;$i++){
                             ?>
                            <i class="fa fa-star"></i>
                            <?php
                         }
                         ?>
                        </p>
                    </blockquote>
                </div>
                <?php
                }
                    ?>







                <?php 
            $result_review2 = mysqli_query($conn , "SELECT * FROM `review_product_tbl` WHERE `id`=2");
                            while($row2 = mysqli_fetch_assoc($result_review2)){
                                $user_id2 = $row2['user_id'];
                                $rating2 = $row2['rating'];
                                $review2 = $row2['review'];

                                ?>
                <div class="carousel-item text-center p-4">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i> <?php echo $review2; ?> <i
                                class="fa fa-quote-right"></i>
                        </p>
                        <footer class="blockquote-footer">
                            <?php 
                        $res_user2 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT `full_name` FROM `customer_tbl` WHERE id=$user_id2")); 
                        echo $res_user2['full_name'];
                        ?>
                        </footer>
                        <!-- Client review stars -->
                        <!-- "fa fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                        <p class="client-review-stars">
                            <?php 
                         for($i=1;$i<=$rating2;$i++){
                             ?>
                            <i class="fa fa-star"></i>
                            <?php
                         }
                         ?>
                        </p>
                    </blockquote>
                </div>
                <?php
                }
                    ?>



                <?php  
                
                
                $result_review3 = mysqli_query($conn , "SELECT * FROM `review_product_tbl` WHERE `id`=3");
                while($row3 = mysqli_fetch_assoc($result_review)){
                    $user_id3 = $row3['user_id'];
                    $rating3 = $row3['rating'];
                    $review3 = $row3['review'];

                    ?>
                <div class="carousel-item  text-center p-4">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i> <?php echo $review3; ?> <i
                                class="fa fa-quote-right"></i>
                        </p>
                        <footer class="blockquote-footer"><?php 
                        $res_user3 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT `full_name` FROM `customer_tbl` WHERE id=$user_id3")); 
                        echo $res_user3['full_name'];
                        ?>
                        </footer>
                        <!-- Client review stars -->
                        <!-- "fa fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                        <p class="client-review-stars">

                            <?php 
                         for($i=1;$i<=$rating3;$i++){
                             ?>
                            <i class="fa fa-star"></i>
                            <?php
                         }
                         ?>


                        </p>
                    </blockquote>
                </div>
                <?php
                }
                    ?>





                <!-- <div class="carousel-item text-center p-4">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i> Imagination is more important than
                            knowledge. Knowledge is limited. Imagination encircles the world.
                        </p>
                        <footer class="blockquote-footer">Albert Einstein <cite title="Source Title">genius</cite>
                        </footer>
                        
                        <p class="client-review-stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p>
                    </blockquote>
                </div> -->
                <!-- <div class="carousel-item text-center p-4">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i> A person who never made a mistake never
                            tried anything new.
                        </p>
                        <footer class="blockquote-footer">Albert Einstein <cite title="Source Title">genius</cite>
                        </footer>
                        
                        <p class="client-review-stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p>
                    </blockquote>
                </div> -->
            </div>
            <!-- <ol class="carousel-indicators">
                <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
                <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
            </ol> -->

            <a class="carousel-control-prev" href="#client-testimonial-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#client-testimonial-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <?php

}else{
    echo "<div class='container'><h4 class='mb-5'>No review yet!</h4></div>";
}

?>

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
                

                if (response.length < 10) {
                         
                    $('.message').html('<h2>No Item Found!</h2>');
                    

                } else {
                    
                    $('.message').html('');
                }
            }

        });

    });

});

function copy_referal() {
    var copyText = document.getElementById("copy_rand_referal");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    //   alert("Copied the text: " + copyText.value);
    swal("Use this referal code to join LADO", copyText.value, "info")
}
</script>