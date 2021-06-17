<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      
      $categoryName = $_POST['categoryName'];
      $categoryImage = addslashes(file_get_contents($_FILES['categoryImage']['tmp_name']));
      $categoryId = $_POST['categoryId'];
      
      if($categoryImage == NULL){
        // $image= addslashes(file_get_contents($_FILES['categoryImg']['tmp_name']));
        $sql = "UPDATE categories 
        SET categoryName=' $categoryName'
        WHERE categoryId =$categoryId ";
      }
      else {
        // $image= addslashes(file_get_contents($_FILES['categoryImage']['tmp_name'])); 
        $sql = "UPDATE categories 
        SET categoryName=' $categoryName', categoryImg ='$categoryImage'  
        WHERE categoryId =$categoryId ";

      }

      // $sql = "UPDATE categories 
      //         SET categoryName=' $categoryName', categoryImg ='$image'  
      //         WHERE categoryId =$categoryId ";

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/categories.php?error=none");
      }else {
        header("Location: ../dashboard/categories.php?error=noneupdatefail");
        //  echo  $conn->error;
      }

    

  }
  else{
      header("Location: ../dashboard/categories.php");
  }





        // if(isset($_GET['id'])){
        //   require_once 'dbh.inc.php';
        //   require_once 'functions.inc.php';

        //   $categoryName = $_GET['categoryName'];
        //   $categoryImage = addslashes(file_get_contents($_FILES['categoryImage']['tmp_name'])); 

        //   $sql = "SELECT * FROM categories WHERE categoryId =$id";
        //   $sql_run = mysqli_query($conn, $sql);

        //   if(mysqli_num_rows($sql_run)>0){
        //     $row = mysqli_fetch_assoc($sql_run);
        //   }else {
        //     header("Location: ../dashboard/categories.php");
        //   }

        // }


