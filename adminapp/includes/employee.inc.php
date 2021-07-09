<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
      
        $firstName = $_POST['firstName'];
        $lastName= $_POST['lastName'];
        $jobRole = $_POST['jobRole'];
        $nic = $_POST['nic'];
        $landNum = $_POST['landNum'];
        $mobileNum = $_POST['mobileNum'];
        // $address = $_POST['address1']. ", ".$_POST['address2'] .", ".  $_POST['address3'] .", ". $_POST['address4'] ;
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $address4 = $_POST['address4'];
        $email = $_POST['email'];
        
        if(employeeExists($conn, $nic) !== false){
            header("Location: ../dashboard/employee.php?exists");
            exit();
        }
        addEmployee($conn, $firstName, $lastName, $jobRole, $nic, $landNum, $mobileNum, $address1, $address2, $address3, $address4, $email );
    
    }else{
        header("Location: ../dashboard/employee.php");
    }