<?php

    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $checkPassword = $_POST['checkPassword'];   

        // echo $firstName;
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createAdmin($conn, $userName, $email, $password);
    }

    else{
       // echo 'Not Setted';
        header("location: ../signup.php");
        exit();
    }