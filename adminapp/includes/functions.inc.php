<?php

    // $checkPassword = $_POST['checkPassword'];
    // $checkPassword = $_POST['checkPassword'];

function uidExists($conn, $email){
    $sql = "SELECT * FROM customer WHERE customerEmail = ?;";
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

    
function createUser($conn, $firstName, $lastName, $address1, $address2, $address3, $address4, $email, $mobilePhone,$landPhone,$password){
    // encrypting the password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

       // $sql = "INSERT INTO customer (firstName, lastName, address1, address2, address3, address4, customerEmail, mobilePhone, landPhone, customerPw) VALUES (? ,?, ?, ?, ? ,?, ?, ?, ?,?)";
    $sql = "INSERT INTO customer (firstName, lastName, address1, address2, address3, address4, customerEmail, mobilePhone, landPhone, customerPw) VALUES ('$firstName', '$lastName', '$address1', '$address2', '$address3', '$address4', '$email', '$mobilePhone','$landPhone','$hashedPwd')";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){ // if(!mysqli_stmt_prepare($stmt, $sql))
            header("location: ../signup.php?error=stmtfailed"); //me mokkda
            exit();
        }
        if(mysqli_query($conn, $sql)) {   //if(mysqli_query($conn, $sql))
            echo 'success';
        }
        else {
            echo  $conn->error;
        }

       // mysqli_stmt_bind_param($stmt, $firstName, $lastName, $address1, $address2, $address3, $address4, $email, $mobilePhone, $landPhone, $hashedPwd);
        mysqli_stmt_execute($stmt, $sql);
        mysqli_stmt_close($stmt);
        
        header("location: ../login.php?error=none");
        exit();
}

function addCategory($conn, $categoryName, $categoryImage){

    $sql = "INSERT INTO categories (categoryName,categoryImg) VALUES ('$categoryName','$categoryImage')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/categories.php?error=none");
    }else{
        header("Location: ../dashboard/categories.php?error=addfailed");
        //echo  $conn->error;
    }

}


function loginUser($conn, $email, $pw){
    $uidExists = uidExists($conn, $email);
    $e1=11;
    $e2=22;
    // echo "hello";
    if($uidExists === false){
       header("location: ../login.php?error=wronglogin");
        //echo  $conn->error;
        $e1=11;
        echo $e1;
        exit();
    }

    $pwdHashed = $uidExists["customerPw"];
    $checkPwd = password_verify($pw, $pwdHashed);

    if($checkPwd === false){
    header("location: ../Login.php?error=wronglogin");
        exit(); 
    }
    else if($checkPwd === true){
        echo "true";
        session_start();
        $_SESSION["customerId"]= $uidExists["customerId"];
        $_SESSION["customerEmail"]= $uidExists["customerEmail"];
        header("location: ../dashboard/admin.php");
        exit();
    }
    else if($pwdHashed == $pw){
        echo "true";
        session_start();
        $_SESSION["customerId"]= $uidExists["customerId"];
        $_SESSION["customerEmail"]= $uidExists["customerEmail"];
        header("location: ../dashboard/admin.php");
        exit();
    }
}



function addProduct($conn, $productName,$categoryName,$productSize, $productPrice, $productQty, $productDiscount, $productImg){

    $sql = "INSERT INTO product (productName, categoryName, productSize, productPrice, productQty,productDiscount,productImg) VALUES ('$productName', '$categoryName', '$productSize','$productPrice','$productQty','$productDiscount','$productImg')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/products.php?error=none");
       // echo $productSize;
    }else{
        header("Location: ../dashboard/products.php?error=addfailed");
        //echo  $conn->error;
    }

}
