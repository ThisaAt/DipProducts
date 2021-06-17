<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';

        $sql = "DELETE FROM product WHERE productId  =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/products.php?itemdeleted");
          } else {
            header("Location: ../dashboard/products.php?error=deletefailed");
            
          }
          
          $conn->close();
