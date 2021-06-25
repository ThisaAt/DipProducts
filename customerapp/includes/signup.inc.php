<?php

    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $address4 = $_POST['address4'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $mobilePhone = $_POST['mobilePhone'];
        $landPhone = $_POST['landPhone'];
        $password = $_POST['password'];
        $checkPassword = $_POST['checkPassword'];   

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        //error handlers

    if(emptyInputSignup($firstName, $lastName, $address1, $address2, $address3, $address4, $email,$gender, $mobilePhone,$landPhone,$password,  $checkPassword) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    // if(invalidUid($username)!==false){
    //     header("location: ../ui/signup.php?error=invaliduid");
    //     exit();
    // }
    if(invalidEmail($email)!==false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password, $checkPassword)!==false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }
    if(uidExists($conn, $email)!==false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    if(invalidContactNo($mobilePhone)!==false){
        header("location: ../signup.php?error=invalidContactNo");
        exit();
    }

    createUser($conn, $firstName, $lastName, $address1, $address2, $address3, $address4, $email, $gender, $mobilePhone,$landPhone,$password);
    }

    else{
        header("location: ../signup.php");
        exit();
    }