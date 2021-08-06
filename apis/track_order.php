<?php session_start(); ?>
<?php include '../common/connect.php'; ?>

<?php 

    $o_id = $_POST['o_id'];
    $u_id =  $_SESSION['user_id'];


   $track_query = "SELECT `status` , `purchase_date`, `expected_date` FROM `order_tbl` WHERE `user_id`= $u_id AND `order_id`='$o_id'";
   $result_track = mysqli_query($conn , $track_query);
     

     while($row = mysqli_fetch_assoc($result_track)){
         $status = $row['status'];
         $expected_date = $row['expected_date'];
         
     }

   

    if($status == 'Order pending'){
        echo json_encode(array(
            "status" => $status,
            "expected_date" => $expected_date,
            "dom" => '<div class="steps-header">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="steps-body">
        <div class="step step-active"><i class="fa fa-clock-o" aria-hidden="true"></i> Order pending</div>
        <div class="step"><i class="fa fa-check" aria-hidden="true"></i>
              Order confirmed</div>
       
          <div class="step"><i class="fa fa-truck" aria-hidden="true"></i>
              Order picked up</div>
          <div class="step"><i class="fa fa-road" aria-hidden="true"></i> On the way</div>
          <div class="step"><i class="fa fa-home" aria-hidden="true"></i> Order delivered
          </div>
        </div>'
        )); 
    }else if($status == 'Order confirmed'){
        echo json_encode(array(
            "status" => $status,
            "expected_date" => $expected_date,
            "dom" => '<div class="steps-header">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 20%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="steps-body">
        <div class="step "><i class="fa fa-clock-o" aria-hidden="true"></i> Order pending</div>
        <div class="step step-active"><i class="fa fa-check" aria-hidden="true"></i>
              Order confirmed</div>
       
          <div class="step"><i class="fa fa-truck" aria-hidden="true"></i>
              Order picked up</div>
          <div class="step"><i class="fa fa-road" aria-hidden="true"></i> On the way</div>
          <div class="step"><i class="fa fa-home" aria-hidden="true"></i> Order delivered
          </div>
        </div>'
        )); 
    }else if($status == 'Order picked up'){
         echo json_encode(array(
            "status" => $status,
            "expected_date" => $expected_date,
            "dom" => '<div class="steps-header">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 40%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="steps-body">
        <div class="step "><i class="fa fa-clock-o" aria-hidden="true"></i> Order pending</div>
        <div class="step"><i class="fa fa-check" aria-hidden="true"></i>
              Order confirmed</div>
       
          <div class="step step-active"><i class="fa fa-truck" aria-hidden="true"></i>
              Order picked up</div>
          <div class="step"><i class="fa fa-road" aria-hidden="true"></i> On the way</div>
          <div class="step"><i class="fa fa-home" aria-hidden="true"></i> Order delivered
          </div>
        </div>'
        )); 

    }else if($status == 'Order on the way'){
         echo json_encode(array(
            "status" => $status,
            "expected_date" => $expected_date,
            "dom" => '<div class="steps-header">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 60%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="steps-body">
        <div class="step "><i class="fa fa-clock-o" aria-hidden="true"></i> Order pending</div>
        <div class="step"><i class="fa fa-check" aria-hidden="true"></i>
              Order confirmed</div>
       
          <div class="step"><i class="fa fa-truck" aria-hidden="true"></i>
              Order picked up</div>
          <div class="step step-active"><i class="fa fa-road" aria-hidden="true"></i> On the way</div>
          <div class="step"><i class="fa fa-home" aria-hidden="true"></i> Order delivered
          </div>
        </div>'
        )); 

   }else if($status == 'Order delivered'){
        echo json_encode(array(
            "status" => $status,
            "expected_date" => $expected_date,
            "dom" => '<div class="steps-header">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="steps-body">
        <div class="step "><i class="fa fa-clock-o" aria-hidden="true"></i> Order pending</div>
        <div class="step"><i class="fa fa-check" aria-hidden="true"></i>
              Order confirmed</div>
       
          <div class="step"><i class="fa fa-truck" aria-hidden="true"></i>
              Order picked up</div>
          <div class="step"><i class="fa fa-road" aria-hidden="true"></i> On the way</div>
          <div class="step step-active"><i class="fa fa-home" aria-hidden="true"></i> Order delivered
          </div>
        </div>'
        )); 

   }else{
       echo "ok";
   }

     



?>