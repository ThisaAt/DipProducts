<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';
      
      $orderStatus =$_POST['orderStatus'];
      $orderId =$_POST['orderId'];
      $customerId =$_POST['cid'];
    
        $sql = "UPDATE orders 
        SET orderStatus='$orderStatus'
        WHERE orderId =$orderId ";
   
        $sql_run = mysqli_query($conn, $sql);

        if($orderStatus=='Order Dispatched'){
          sendOrderDispatched($conn,$orderId,$customerId);
        } 
        if($orderStatus=='Delivered'){
          sendDelivered($conn,$orderId,$customerId);
        } 

      if ($sql_run){
        
        header("Location: ../dashboard/order.php?errornone");
      }else {
        header("Location: ../dashboard/order.php?error=noneupdatefail");
      }

  }
  else{
      header("Location: ../dashboard/order.php");
  }


//   if($orderStatus == NULL){
//     echo  $orderStatus;
//     echo  $orderId;
//   }
//   else {
//     $sql = "UPDATE orders 
//     SET orderStatus=' $orderStatus'
//     WHERE orderId =$orderId ";
//   }