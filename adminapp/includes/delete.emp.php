<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';

        $sql = "DELETE FROM employee WHERE employeeId =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/employee.php?deleted");
          } else {
           header("Location: ../dashboard/employee.php?deletefailed");
            // echo  $conn->error;
          }
          
          $conn->close();
