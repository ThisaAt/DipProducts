<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';
      
      $orderStatus = $_POST['orderStatus'];
      $orderId = $_POST['orderId'];
    
        $sql = "UPDATE orders 
        SET orderStatus=' $orderStatus'
        WHERE orderId =$orderId ";
   
        $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/order.php?error=none");
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