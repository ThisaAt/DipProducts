<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';
       // require_once 'functions.inc.php';

        $sql = "DELETE FROM categories WHERE categoryId =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/categories.php?deleted");
          } else {
           header("Location: ../dashboard/categories.php?deletefailed");
            // echo  $conn->error;
          }
          
          $conn->close();
