<?php

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pw = $_POST["pw"];

        require 'dbh.inc.php';
        require 'functions.inc.php';

        // $e4=223;
        // echo $e4;

    //error handlers

    //     if(emptyInputLogin($username, $pwd) !== false){
    //         header("location: ../login.php?error=emptyinput");
    //         exit();
    //      }

        loginAdmin($conn, $email, $pw);
     }
     else{
        header("location: ../login.php");
         exit();
    }