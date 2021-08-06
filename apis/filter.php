<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php 
error_reporting(0);
$type = $_POST['type'];
$price = $_POST['price'];


 //only for price filter
      if($type == 'all'){
          if(isset($_POST['price'])){
             $select_query = "SELECT * FROM `products_tbl` WHERE `price` BETWEEN $price";
          }else{
             $select_query = "SELECT * FROM `products_tbl`";
          }
         
        $select = mysqli_query($conn , $select_query);
    
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo '<div class="col-sm-4 col-12 mb-5">
            <div class="card ml-3" style="width:300px;">
                <img class="card-img-top" src="assets/images/products/'.$row['image'].'"
                    alt="Card image" style="width:300px;height:270px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7 col-7">
                            <h5 class="card-title">'.$row['name'].'</h5>
                        </div>
                        <div class="col-sm-5 col-5">
                            <h6 class="card-text mb-5">Rs'.$row['price']."/".$row['unit'].'</h6>
                        </div>



                    </div>
                    <div  style="text-align:center;">';
                    
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                    
                    echo '<a href="my_cart.php?id='.base64_encode($row['id']).'" class="add-cart">Add
                        to cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }else{
                    
                    echo '<a href="login.php" class="add-cart">Shop Now</a>';
                    echo '<a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }
                    echo '</div></div></div></div>';

      } 

    //   echo json_encode($menu);//both filter
      }else if(isset($price)){
         $select_query = "SELECT * FROM `products_tbl` WHERE `type`='$type' AND `price` BETWEEN $price";
        $select = mysqli_query($conn , $select_query);
    
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo '<div class="col-sm-4 col-12 mb-5">
            <div class="card ml-3" style="width:300px;">
                <img class="card-img-top" src="assets/images/products/'.$row['image'].'"
                    alt="Card image" style="width:300px;height:270px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <h4 class="card-title">'.$row['name'].'</h4>
                        </div>
                        <div class="col-sm-4 col-4">
                            <h5 class="card-text mb-5">Rs'.$row['price'].'</h5>
                        </div>



                    </div>
                    <div  style="text-align:center;">';
                    
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                    
                    echo '<a href="my_cart.php?id='.base64_encode($row['id']).'" class="add-cart">Add
                        to cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }else{
                        
                    echo '<a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }
                    echo '</div></div></div></div>';

           

         
      } 

    //   echo json_encode($menu);


       //type filter
    }else{
         $select_query = "SELECT * FROM `products_tbl` WHERE `type`='$type'";
        $select = mysqli_query($conn , $select_query);
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo '<div class="col-sm-4 col-12 mb-5">
            <div class="card ml-3" style="width:300px;">
                <img class="card-img-top" src="assets/images/products/'.$row['image'].'"
                    alt="Card image" style="width:300px;height:270px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <h4 class="card-title">'.$row['name'].'</h4>
                        </div>
                        <div class="col-sm-4 col-4">
                            <h5 class="card-text mb-5">Rs'.$row['price'].'</h5>
                        </div>



                    </div>
                    <div  style="text-align:center;">';
                    
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                    
                    echo '<a href="my_cart.php?id='.base64_encode($row['id']).'" class="add-cart">Add
                        to cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }else{
                        
                    echo '<a href="product_detail.php?id='.base64_encode($row['id']).'"
                        class="btn-buy">Quick view</a>';
                    
                    }
                    echo '</div></div></div></div>';

        
      } 

    //   echo json_encode($menu);
    } 


?>