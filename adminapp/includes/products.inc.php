<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
      
        $productName = $_POST['productName'];
        $categoryName= $_POST['categoryName'];
        $productSize = $_POST['productSize'] . " " . $_POST['unit'] ;
        $productPrice = $_POST['productPrice'] . ".00";
        $productQty = $_POST['productQty'];
        $productDiscount = $_POST['productDiscount'];
        $productImg = addslashes(file_get_contents($_FILES['productImg']['tmp_name']));  
    
        addProduct($conn, $productName,$categoryName,$productSize, $productPrice, $productQty, $productDiscount, $productImg);
    
    }else{
        header("Location: ../dashboard/products.php");
    }