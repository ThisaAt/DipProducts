<?php

    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $checkPassword = $_POST['checkPassword'];   

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

    //error handlers

        if(emptyInputSignup($userName, $email, $password,  $checkPassword) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if(invalidUid($userName)!==false){
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
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
     
        createAdmin($conn, $userName, $email, $password);
    }

    else{
       // echo 'Not Setted';
        header("location: ../signup.php");
        exit();
    }