<?php session_start(); ?>
<?php include '../common/connect.php'; ?>
<?php

  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");

  // following files need to be included
 

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  
    $user_id = $_SESSION['user_id'];
  
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $fullname = $firstname ." ". $lastname;
    $email = test_input($_POST['email']);
    $mobile = test_input($_POST['mobile']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);		
    $order_id = 'LADO'.date("d").date("m").date("Y").(mt_rand()).$user_id.'';
    $payment_mode = test_input($_POST['payment_mode']);
    $total_price = $_POST['total_price'];
    if($payment_mode == 'paytm'){

      echo '<form method="post" action="Paytm_kit/PaytmKit/pgRedirectC.php">
          <table border="1">
            <tbody>
              <tr>
                <th>S.No</th>
                <th>Label</th>
                <th>Value</th>
              </tr>
              <tr>
                <td>1</td>
                <td><label>ORDER_ID::*</label></td>
                <input type="hidden" name="name" value="'.$fullname.'">
                <input type="hidden" name="email" value="'.$email.'">
                <input type="hidden" name="mobile" value="'.$mobile.'">
                <input type="hidden" name="address" value="'.$address.'">
                <input type="hidden" name="city" value="'.$city.'">
                <input type="hidden" name="payment_mode" value="'.$payment_mode.'">
                <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                  name="ORDER_ID" autocomplete="off"
                  value="'.$order_id.'">
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><label>CUSTID ::*</label></td>
                <td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="'.$user_id.'"></td>
              </tr>
              <tr>
                <td>3</td>
                <td><label>INDUSTRY_TYPE_ID ::*</label></td>
                <td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
              </tr>
              <tr>
                <td>4</td>
                <td><label>Channel ::*</label></td>
                <td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
                  size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td><label>txnAmount*</label></td>
                <td><input title="TXN_AMOUNT" tabindex="10"
                  type="text" name="TXN_AMOUNT"
                  value="'.$total_price.'">
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><input value="CheckOut" type="submit"	onclick=""></td>
              </tr>
            </tbody>
          </table>';
    
    }else{

      $select = mysqli_query($conn,"SELECT cart_tbl.cart_id, cart_tbl.product_id, cart_tbl.quantity, cart_tbl.user_id, products_tbl.id, products_tbl.name, products_tbl.price, products_tbl.image FROM `cart_tbl` INNER JOIN `products_tbl` ON cart_tbl.product_id = products_tbl.id WHERE cart_tbl.user_id = $user_id");
      while($row = mysqli_fetch_assoc($select)){
        $product_name = $row['name'];
        $expected_date  = date('Y/m/d', strtotime('+3 days'));
        $sql = "INSERT INTO `order_tbl`(`order_id`,`user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name` , `product_quantity`, `total_price`,`payment_mode`,`expected_date`)  VALUES ('$order_id','$user_id','$fullname','$email','$mobile','$address','$city','$row[product_id]', '$product_name' , '$row[quantity]','$total_price','$payment_mode','$expected_date')";
      
       $insert = mysqli_query($conn,$sql);
           if($insert){
  
             
             $get_user_data = "SELECT * FROM `customer_tbl` WHERE `id`='$_SESSION[user_id]'";
             $result_get_data = mysqli_query($conn , $get_user_data);
         
             $res_get = mysqli_fetch_assoc($result_get_data);
         
             $user_level =  $res_get['level'];
             $user_join =  $res_get['joined_by'];
             $user_id_array = array();
         

             if($user_level>=11){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
        
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
        
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
              
        
              //level n-4
              $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
              $res_4 = mysqli_fetch_assoc($result_get_data_func4);
              if(mysqli_num_rows($result_get_data_func4) > 0){
                
                array_push($user_id_array,$res_4['id']);
              }
              
        
              //level n-5
              $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
             
              $res_5 = mysqli_fetch_assoc($result_get_data_func5);
              if(mysqli_num_rows($result_get_data_func5)>0){
                
                array_push($user_id_array,$res_5['id']);
              }

              // level n-6

              $result_get_data_func6 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_5[joined_by]'");
             
              $res_6 = mysqli_fetch_assoc($result_get_data_func6);
              if(mysqli_num_rows($result_get_data_func6)>0){
                
                array_push($user_id_array,$res_6['id']);
              }

               // level n-7

               $result_get_data_func7 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_6[joined_by]'");
             
               $res_7 = mysqli_fetch_assoc($result_get_data_func7);
               if(mysqli_num_rows($result_get_data_func7)>0){
                 
                 array_push($user_id_array,$res_7['id']);
               }

               // level n-8

               $result_get_data_func8 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_7[joined_by]'");
             
               $res_8 = mysqli_fetch_assoc($result_get_data_func8);
               if(mysqli_num_rows($result_get_data_func8)>0){
                 
                 array_push($user_id_array,$res_8['id']);
               }

               // level n-9

               $result_get_data_func9 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_8[joined_by]'");
             
               $res_9 = mysqli_fetch_assoc($result_get_data_func9);
               if(mysqli_num_rows($result_get_data_func9)>0){
                 
                 array_push($user_id_array,$res_9['id']);
               }
              
            }else if($user_level==10){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
        
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
        
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
              
        
              //level n-4
              $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
              $res_4 = mysqli_fetch_assoc($result_get_data_func4);
              if(mysqli_num_rows($result_get_data_func4) > 0){
                
                array_push($user_id_array,$res_4['id']);
              }
              
        
              //level n-5
              $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
             
              $res_5 = mysqli_fetch_assoc($result_get_data_func5);
              if(mysqli_num_rows($result_get_data_func5)>0){
                
                array_push($user_id_array,$res_5['id']);
              }

              // level n-6

              $result_get_data_func6 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_5[joined_by]'");
             
              $res_6 = mysqli_fetch_assoc($result_get_data_func6);
              if(mysqli_num_rows($result_get_data_func6)>0){
                
                array_push($user_id_array,$res_6['id']);
              }

               // level n-7

               $result_get_data_func7 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_6[joined_by]'");
             
               $res_7 = mysqli_fetch_assoc($result_get_data_func7);
               if(mysqli_num_rows($result_get_data_func7)>0){
                 
                 array_push($user_id_array,$res_7['id']);
               }

               // level n-8

               $result_get_data_func8 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_7[joined_by]'");
             
               $res_8 = mysqli_fetch_assoc($result_get_data_func8);
               if(mysqli_num_rows($result_get_data_func8)>0){
                 
                 array_push($user_id_array,$res_8['id']);
               }
              
            }
            else if($user_level==9){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
        
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
        
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
              
        
              //level n-4
              $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
              $res_4 = mysqli_fetch_assoc($result_get_data_func4);
              if(mysqli_num_rows($result_get_data_func4) > 0){
                
                array_push($user_id_array,$res_4['id']);
              }
              
        
              //level n-5
              $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
             
              $res_5 = mysqli_fetch_assoc($result_get_data_func5);
              if(mysqli_num_rows($result_get_data_func5)>0){
                
                array_push($user_id_array,$res_5['id']);
              }

              // level n-6

              $result_get_data_func6 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_5[joined_by]'");
             
              $res_6 = mysqli_fetch_assoc($result_get_data_func6);
              if(mysqli_num_rows($result_get_data_func6)>0){
                
                array_push($user_id_array,$res_6['id']);
              }

               // level n-7

               $result_get_data_func7 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_6[joined_by]'");
             
               $res_7 = mysqli_fetch_assoc($result_get_data_func7);
               if(mysqli_num_rows($result_get_data_func7)>0){
                 
                 array_push($user_id_array,$res_7['id']);
               }
              
            }
            else if($user_level==8){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
        
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
        
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
              
        
              //level n-4
              $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
              $res_4 = mysqli_fetch_assoc($result_get_data_func4);
              if(mysqli_num_rows($result_get_data_func4) > 0){
                
                array_push($user_id_array,$res_4['id']);
              }
              
        
              //level n-5
              $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
             
              $res_5 = mysqli_fetch_assoc($result_get_data_func5);
              if(mysqli_num_rows($result_get_data_func5)>0){
                
                array_push($user_id_array,$res_5['id']);
              }

              // level n-6

              $result_get_data_func6 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_5[joined_by]'");
             
              $res_6 = mysqli_fetch_assoc($result_get_data_func6);
              if(mysqli_num_rows($result_get_data_func6)>0){
                
                array_push($user_id_array,$res_6['id']);
              }
              
            }else if($user_level==7){
               //level n-1
               $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
               $res_1 = mysqli_fetch_assoc($result_get_data_func1);
               if(mysqli_num_rows($result_get_data_func1) > 0){
                 
                 array_push($user_id_array,$res_1['id']);
               }
               
         
               //level n-2
               $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
               $res_2 = mysqli_fetch_assoc($result_get_data_func2);
               if(mysqli_num_rows($result_get_data_func2) > 0 ){
                 
                 array_push($user_id_array,$res_2['id']);
               }
               
         
               //level n-3
               $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
               $res_3 = mysqli_fetch_assoc($result_get_data_func3);
               if(mysqli_num_rows($result_get_data_func3) > 0){
                 
                 array_push($user_id_array,$res_3['id']);
               }
               
         
               //level n-4
               $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
               $res_4 = mysqli_fetch_assoc($result_get_data_func4);
               if(mysqli_num_rows($result_get_data_func4) > 0){
                 
                 array_push($user_id_array,$res_4['id']);
               }
               
         
               //level n-5
               $result_get_data_func5 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_4[joined_by]'");
              
               $res_5 = mysqli_fetch_assoc($result_get_data_func5);
               if(mysqli_num_rows($result_get_data_func5)>0){
                 
                 array_push($user_id_array,$res_5['id']);
               }
         
             }else if($user_level == 6){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
         
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
         
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
              
         
              //level n-4
              $result_get_data_func4 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_3[joined_by]'");
              $res_4 = mysqli_fetch_assoc($result_get_data_func4);
              if(mysqli_num_rows($result_get_data_func4) > 0){
                
                array_push($user_id_array,$res_4['id']);
              }
         
             }else if($user_level == 5){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
         
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
              
         
              //level n-3
              $result_get_data_func3 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_2[joined_by]'");
              $res_3 = mysqli_fetch_assoc($result_get_data_func3);
              if(mysqli_num_rows($result_get_data_func3) > 0){
                
                array_push($user_id_array,$res_3['id']);
              }
             }else if($user_level == 4){
              //level n-1
              $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
              $res_1 = mysqli_fetch_assoc($result_get_data_func1);
              if(mysqli_num_rows($result_get_data_func1) > 0){
                
                array_push($user_id_array,$res_1['id']);
              }
              
         
              //level n-2
              $result_get_data_func2 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$res_1[joined_by]'");
              $res_2 = mysqli_fetch_assoc($result_get_data_func2);
              if(mysqli_num_rows($result_get_data_func2) > 0 ){
                
                array_push($user_id_array,$res_2['id']);
              }
             }else if($user_level == 3){
             //level n-1
             $result_get_data_func1 = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `referal_code`='$user_join'");
             $res_1 = mysqli_fetch_assoc($result_get_data_func1);
             if(mysqli_num_rows($result_get_data_func1) > 0){
               
               array_push($user_id_array,$res_1['id']);
             }
             }else if($user_level == 2){
               $user_id_array = array();
             }else{
              $user_id_array = array();
             }
         
            //  print_r($user_id_array);
         
             //calculate total profit for this user
         
             $num_users = sizeof($user_id_array);
  
  
            $cart_profit = mysqli_query($conn , "SELECT SUM(`total_profit`) AS `total_cart_profit` FROM `cart_tbl` WHERE `user_id`='$_SESSION[user_id]'");
            $res_cart_profit = mysqli_fetch_assoc($cart_profit);
            $total_profit_cart =  $res_cart_profit['total_cart_profit'];
            $admin_profit = "";
            $user_profit = "";
            $each_user_profit = "";
  
      
            
        if($num_users == 9){

          $each_user_profit = round($total_profit_cart * 0.05);
          $admin_profit = $total_profit_cart - ($each_user_profit*9);

            
        }else if($num_users == 8){

          $each_user_profit = round($total_profit_cart * 0.05);
          $admin_profit = $total_profit_cart - ($each_user_profit*8);
          
            
        }else if($num_users == 7){

          $each_user_profit = round($total_profit_cart * 0.05);
          $admin_profit = $total_profit_cart - ($each_user_profit*7);
          
            
        }else if($num_users == 6){

          $each_user_profit = round($total_profit_cart * 0.05);
          $admin_profit = $total_profit_cart - ($each_user_profit*6);
          
            
        }else if($num_users == 5){
  
        $each_user_profit = round($total_profit_cart * 0.05);
        $admin_profit = $total_profit_cart - ($each_user_profit*5);
        
          
      }else if($num_users == 4){
  
        $each_user_profit = round($total_profit_cart * 0.05);
        $admin_profit = $total_profit_cart - ($each_user_profit*4);
        
  
      }else if($num_users == 3){
  
        $each_user_profit = round($total_profit_cart * 0.05);
        $admin_profit = $total_profit_cart - ($each_user_profit*3);
        
  
      }else if($num_users == 2){
  
       $each_user_profit = round($total_profit_cart * 0.05);
       $admin_profit = $total_profit_cart - ($each_user_profit*2);
        
  
      }else if($num_users == 1){
  
        $each_user_profit = round($total_profit_cart * 0.05);
        $admin_profit = $total_profit_cart - ($each_user_profit*1);
        
  
      }else{
        $admin_profit = round($total_profit_cart);
        $each_user_profit = 0;
        
      }
  
      if($num_users == 0){
  
         //admin wallet balance
      $result_admin_balance =  mysqli_query($conn , "SELECT `balance` FROM `admin_wallet_tbl` WHERE id=1");
      $res_admin_balance = mysqli_fetch_assoc($result_admin_balance);
      $update_adimin_balance = $admin_profit + $res_admin_balance['balance'];
  
  
     $insert_admin_profit =  mysqli_query($conn ,"UPDATE `admin_wallet_tbl` SET `balance`='$update_adimin_balance' WHERE id=1");
     if($insert_admin_profit){
      $query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$_SESSION[user_id]'";
      $result_cart_delete = mysqli_query($conn , $query_cart_delete);
  
      if($result_cart_delete)
      {
            echo json_encode(array(
                "status" => "ok"
            ));
      }else
      {
            echo json_encode(array(
            "status" => "not ok"
            ));
      }
  
     }
        
      }else{
  
      //admin wallet balance
      $result_admin_balance =  mysqli_query($conn , "SELECT `balance` FROM `admin_wallet_tbl` WHERE id=1");
      $res_admin_balance = mysqli_fetch_assoc($result_admin_balance);
      $update_adimin_balance = $admin_profit + $res_admin_balance['balance'];
  
  
     $insert_admin_profit =  mysqli_query($conn ,"UPDATE `admin_wallet_tbl` SET `balance`='$update_adimin_balance' WHERE id=1");
  
  
     foreach($user_id_array as $val){
      $update_profile_log = mysqli_query($conn , "SELECT * FROM `profit_log_tbl` WHERE `purchase_by_user_id` = '$_SESSION[user_id]' AND `distribute_user_id` = $val");
      $update_profit_amount = $update_distributed_amount = $update_admin_profit = "";
      
      if(mysqli_num_rows($update_profile_log)>0){
        while($row_update_profile_log = mysqli_fetch_assoc($update_profile_log)){
          $update_profit_amount =  $row_update_profile_log['profit_amount'];
          $update_distributed_amount =  $row_update_profile_log['distributed_amount'];
          $update_admin_profit =  $row_update_profile_log['admin_profit'];
      }
      
  
      $updated_pro_amount = $update_profit_amount + $total_profit_cart;
      $updated_dis_amount = $update_distributed_amount + $each_user_profit;
      $updated_admin_pro = $update_admin_profit + $admin_profit;
  
      $update_pre_data = mysqli_query($conn ,"UPDATE `profit_log_tbl` SET `profit_amount`='$updated_pro_amount',`distributed_amount`='$updated_dis_amount',`admin_profit`='$updated_admin_pro' WHERE `purchase_by_user_id` = '$_SESSION[user_id]' AND `distribute_user_id` = $val");
      if($update_pre_data){
        
        $query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$_SESSION[user_id]'";
        $result_cart_delete = mysqli_query($conn , $query_cart_delete);
  
        if($result_cart_delete){
          $success_msg = json_encode(array(
                             "status" => "ok"
                          ));
        }
  
      }
  
  
      }
      else{
        
          $result_insert_profit = mysqli_query($conn , "INSERT INTO `profit_log_tbl`(`purchase_by_user_id`, `distribute_user_id`, `profit_amount`, `distributed_amount`, `admin_profit` , `order_id`) VALUES ('$_SESSION[user_id]','$val','$total_profit_cart','$each_user_profit','$admin_profit','$order_id')");
          if($result_insert_profit){
            
            $query_cart_delete = "DELETE FROM `cart_tbl` WHERE `user_id`='$_SESSION[user_id]'";
            $result_cart_delete = mysqli_query($conn , $query_cart_delete);
            
            if($result_cart_delete){
              $success_msg = json_encode(array(
                                         "status" => "ok"
                                          ));
            }
  
          }
          
      }
  
    
  }
  
  echo $success_msg;
        
  
      }
  
      }else{
             echo json_encode(array(
              "status" => "not ok"
          ));
           }
  
          //  while end
       
      }

    }
  ?>