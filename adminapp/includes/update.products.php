<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      
      $productName = $_POST['productName'];
      // $categoryName= $_POST['categoryName'];
      $productPrice = $_POST['productPrice'];
      $productQty = $_POST['productQty'];
      // $productDiscount = $_POST['productDiscount'];
      $productImg = addslashes(file_get_contents($_FILES['productImg']['tmp_name']));  
      $productId = $_POST['productId'];
      
      if($productImg == NULL){
        $sql = "UPDATE product 
        SET productName=' $productName', productPrice ='$productPrice', productQty ='$productQty'  
        WHERE productId =$productId ";
      }
      else {
        $sql = "UPDATE product 
        SET productName=' $productName', productPrice ='$productPrice', productQty ='$productQty' ,  productImg ='$productImg' 
        WHERE productId =$productId ";

      }

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/products.php?updated");
      }else {
        header("Location: ../dashboard/products.php?updatefail");
      }

  }
  else{
      header("Location: ../dashboard/products.php");
  }

  // $sql = "UPDATE product 
  //       SET productName=' $productName', productPrice ='$productPrice', productQty ='$productQty' , productDiscount ='$productDiscount', productImg ='$productImg' 
  //       WHERE productId =$productId ";