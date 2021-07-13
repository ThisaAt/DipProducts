<?php

    require 'dbh.inc.php';
    require 'functions.inc.php';

    if(isset($_POST["reset"])){
        // $email = $_POST["email"];

        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $token = md5(rand());
















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