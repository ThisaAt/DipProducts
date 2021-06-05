<?php

    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $address4 = $_POST['address4'];
        $email = $_POST['email'];
        // $gender = $_POST['gender'];
        $mobilePhone = $_POST['mobilePhone'];
        $landPhone = $_POST['landPhone'];
        $password = $_POST['password'];
        $checkPassword = $_POST['checkPassword'];   

        // echo $firstName;
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createUser($conn, $firstName, $lastName, $address1, $address2, $address3, $address4, $email, $mobilePhone,$landPhone,$password);
    }

    else{
       // echo 'Not Setted';
        header("location: ../signup.php");
        exit();
    }