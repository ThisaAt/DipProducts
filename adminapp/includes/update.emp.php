<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      $firstName = $_POST['firstName'];
      $lastName= $_POST['lastName'];
      $jobRole = $_POST['jobRole'];
      $nic = $_POST['nic'];
      $landNum = $_POST['landNum'];
      $mobileNum = $_POST['mobileNum'];
      $address1 = $_POST['address1'];
      $address2 = $_POST['address2'];
      $address3 = $_POST['address3'];
      $address4 = $_POST['address4'];
      $email = $_POST['email'];
      $employeeId = $_POST['employeeId'];
    

      $sql = "UPDATE employee 
              SET firstName=' $firstName', lastName ='$lastName', jobRole ='$jobRole' , nic ='$nic' , landPhone ='$landNum' , mobilePhone ='$mobileNum' , address1 ='$address1', address2 ='$address2' , address3 ='$address3' , address4 ='$address4', email ='$email'     
              WHERE employeeId =$employeeId ";

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/employee.php?error=none");
      }else {
        header("Location: ../dashboard/employee.php?error=noneupdatefail");
        
      }

  }
  else{
      header("Location: ../dashboard/employee.php");
  }
