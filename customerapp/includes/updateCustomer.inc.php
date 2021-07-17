<?php
    session_start();

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      $firstName = $_POST['firstName'];
      $lastName= $_POST['lastName'];
      $email = $_POST['email'];
      $mobileNum = $_POST['mobilePhone'];
      $address1 = $_POST['address1'];
      $address2 = $_POST['address2'];
      $address3 = $_POST['address3'];
      $address4 = $_POST['address4'];
      $password = $_POST['password'];
      $checkPassword = $_POST['checkPassword'];   
      $customerId = $_SESSION["customerId"] ;

        if(invalidEmail($email)!==false){
            header("location: ../profile.php?error=invalidemail");
            exit();
        }
        if(pwdMatch($password, $checkPassword)!==false){
            header("location: ../profile.php?error=passworddontmatch");
            exit();
        }
        // if(uidExists($conn, $email)!==false){
        //     header("location: ../profile.php?error=usernametaken");
        //     exit();
        // }
        // if(invalidContactNo($mobilePhone)!==false){
        //     header("location: ../profile.php?error=invalidContactNo");
        //     exit();
        // }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE customer 
              SET firstName=' $firstName', lastName ='$lastName', mobilePhone ='$mobileNum' , address1 ='$address1', address2 ='$address2' , address3 ='$address3' , address4 ='$address4', customerEmail ='$email', customerPw = '$hashedPwd'      
              WHERE customerId  =$customerId ";

        $sql_run = mysqli_query($conn, $sql);

        if ($sql_run){
            header("Location: ../profile.php?updated");
        }else {
            header("Location: ../profile.php?updatefail");
        }

  }
  else{
      header("Location: ../profile.php?");
  }
