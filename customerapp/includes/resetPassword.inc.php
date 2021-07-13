<?php

    require 'dbh.inc.php';
    require 'functions.inc.php';

    if(isset($_POST["reset"])){
        // $email = $_POST["email"];

        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $token = md5(rand());

        $checkEmail = "SELECT * FROM customer WHERE customerEmail='$email' LIMIT 1";
        $checkEmailRun = mysqli_query($conn,$checkEmail);

        if(mysqli_num_rows($checkEmailRun)>0){
            $row = mysqli_fetch_array($checkEmailRun);
            $getName = $row['firstName'];
            $getName = $row['customerEmail'];
        }
        else {
            $_SESSION['status'] = "No Email Found";
            header("location: ../resetPassword.php");
            exit(0);
        }
















    //error handlers
        // if(emptyInputLogin($email, $pw) !== false){
        //     header("location: ../login.php?error=emptyinput");
        //     exit();
        //  }

        // loginUser($conn, $email, $pw);
     }
     else{
        // header("location: ../login.php");
        //  exit();
    }