<?php

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){

        $categoryName = $_POST['categoryName'];
        $categoryImage = addslashes(file_get_contents($_FILES['categoryImage']['tmp_name']));  
        //$categoryImage = "";

      //  echo $categoryImage;
        
    
        // if(emptyInputCategory($categoryImage, $categoryName, $categoryDescription) !== false){
        //     header("location: ../ui/categories.php?error=emptyinput");
        //     exit();
        //   }
        // if(categoryExists($conn, $categoryName) !== false){
        //     header("location: ../ui/categories.php?error=categoryexists");
        //     exit();
        // }
    
        addCategory($conn, $categoryName, $categoryImage);
    
    }else{
       header("Location: ../dashboard/categories.php");
    }

    if(isset($_GET['delete'])){
        $categoryName = $_GET['categoryName'];


        deleteCategory($conn, $categoryName);
    }