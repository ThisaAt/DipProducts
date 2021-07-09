<?php

function emptyInputSignup($firstName, $lastName, $address1, $address2, $address3, $address4, $email,$gender, $mobilePhone,$landPhone,$password,  $checkPassword){
        // $result;
    if(empty($firstName) || empty($lastName) || empty($address1) || empty($address2) || empty($address3) || empty($address4) || empty($email) || empty($gender) || empty($mobilePhone) || empty($landPhone)|| empty($password)|| empty($checkPassword)){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}

function invalidEmail($email){
     
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}

function pwdMatch($password, $checkPassword){
       
    if($password !== $checkPassword){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}

function invalidContactNo($mobilePhone){
        // $result;
    if(!is_numeric($mobilePhone) || strlen($mobilePhone) != 10){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}

function uidExists($conn, $email){
    $sql = "SELECT * FROM customer WHERE customerEmail = ?";
    $stmt = mysqli_stmt_init($conn);
   
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    
        $resultData = mysqli_stmt_get_result($stmt);
    
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result=false;
            return $result;
            
        }
    
        mysqli_stmt_close($stmt);
}
    
function createUser($conn, $firstName, $lastName, $address1, $address2, $address3, $address4, $email,$gender, $mobilePhone,$landPhone,$password){
    // encrypting the password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
       // $sql = "INSERT INTO customer (firstName, lastName, address1, address2, address3, address4, customerEmail, mobilePhone, landPhone, customerPw) VALUES (? ,?, ?, ?, ? ,?, ?, ?, ?,?)";

    $sql = "INSERT INTO customer (firstName, lastName, address1, address2, address3, address4, customerEmail,gender, mobilePhone, landPhone, customerPw) VALUES ('$firstName', '$lastName', '$address1', '$address2', '$address3', '$address4', '$email', '$gender', '$mobilePhone','$landPhone','$hashedPwd')";
         
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){ 
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }
    
    if(mysqli_query($conn, $sql)) {   //if(mysqli_query($conn, $sql))
        echo 'success';
        // echo $gender;
    }
    else {
        echo  $conn->error;
    }
            //$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

             // mysqli_stmt_bind_param($stmt, $firstName, $lastName, $address1, $address2, $address3, $address4, $email, $mobilePhone, $landPhone, $hashedPwd);
    mysqli_stmt_execute($stmt, $sql);
    mysqli_stmt_close($stmt);
    
    header("location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($email, $pw){
  
    if(empty($email) || empty($pw)){
    $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}
function loginUser($conn, $email, $pw){
    $uidExists = uidExists($conn, $email);

    if($uidExists == false){
       header("location: ../login.php?error=wronglogin");
        //echo  $conn->error;
        exit();
    }
    //$tstMnk = password_hash($uidExists["customerPw"], PASSWORD_DEFAULT);

    $pwdHashed = $uidExists["customerPw"];
    $checkPwd = password_verify($pw, $pwdHashed);

    if($checkPwd == false){
    header("location: ../Login.php?error=wronglogin");
        exit(); 
    }
    else if($checkPwd == true){
        session_start();
        $_SESSION["customerId"]= $uidExists["customerId"];

          require_once '../includes/dbh.inc.php';
            $id =$_SESSION["customerId"];
            $sql = "SELECT firstName, lastName, mobilePhone, address1, address2, address3, address4, customerEmail  FROM customer WHERE customerId = '$id'";
            $result =mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            $_SESSION["firstName"] =$row['firstName'];
            $_SESSION["lastName"] =$row['lastName'];
            $_SESSION["customerName"] =$row['firstName']. " ".$row['lastName'];
            $_SESSION["customerEmail"] =$row['customerEmail'];
            $_SESSION["mobile"] =$row['mobilePhone'];
            $_SESSION["address1"] =$row['address1'];
            $_SESSION["address2"] =$row['address2'];
            $_SESSION["address3"] =$row['address3'];
            $_SESSION["address4"] =$row['address4'];

        // $_SESSION["firstName"]= $uidExists["firstName"];

        header("location: ../index.php");
        exit();
    }
}
// public
 function getData(){
    // require_once('./dbh.inc.php');
    $serverName="localhost";
    $dbUserName="root";
    $dBPassword="123";
    $dbName="dipol_db"; 

  //  $conn = mysqli_connect("localhost","root","","dipol_db");
    $conn = mysqli_connect($serverName, $dbUserName, $dBPassword, $dbName);

    $sql = "SELECT * FROM product;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }

}

function addFeedback($conn, $name,$email,$type, $comment){

    $sql = "INSERT INTO feedback (name, email, type, comment) VALUES ('$name', '$email','$type','$comment')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("location: ../feedback.php?success"); 
    }else{
        header("location: ../feedback.php?error=submitfail"); 
        // echo  $conn->error;
    }

}

