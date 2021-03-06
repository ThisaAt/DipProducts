<?php

    // $checkPassword = $_POST['checkPassword'];
    // $checkPassword = $_POST['checkPassword'];

function emptyInputSignup($userName, $email, $password,  $checkPassword){
        
    if(empty($userName) || empty($email) ||  empty($password)|| empty($checkPassword)){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}

function invalidUid($userName){
      
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
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

function uidExists($conn, $email){
    $sql = "SELECT * FROM admin WHERE adminEmail = ?;";
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

function pwdMatch($password, $checkPassword){
    
    if($password !== $checkPassword){
        $result=true;
    }
    else{
        $result=false;
    }
        return $result;
}    
    
function createAdmin($conn, $userName, $email, $password){
    
    // encrypting the password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (userName, adminEmail, adminPw) VALUES ('$userName', '$email','$hashedPwd')";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){ 
        header("location: ../signup.php?error=stmtfailed"); 
            exit();
    }
    if(mysqli_query($conn, $sql)) {  
        echo 'success';
    }
    else {
        echo  $conn->error;
    }

    mysqli_stmt_execute($stmt, $sql);
    mysqli_stmt_close($stmt);
    
    header("location: ../login.php?error=none");
    exit();
}

function addCategory($conn, $categoryName, $categoryImage){

    $sql = "INSERT INTO categories (categoryName,categoryImg) VALUES ('$categoryName','$categoryImage')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/categories.php?success");
    }else{
        header("Location: ../dashboard/categories.php?error");
        //echo  $conn->error;
    }

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

function loginAdmin($conn, $email, $pw){

    $uidExists = uidExists($conn, $email);

    if($uidExists === false){
       header("location: ../login.php?error=wronglogin");
        //echo  $conn->error;
        exit();
    }

    $pwdHashed = $uidExists["adminPw"];
    $checkPwd = password_verify($pw, $pwdHashed);

    if($checkPwd === false){
    header("location: ../Login.php?error=wronglogin");
        exit(); 
    }
    else if($checkPwd === true){
        // echo "true";
        session_start();
        $_SESSION["adminId"]= $uidExists["adminId"];
        $_SESSION["userName"]= $uidExists["userName"];
        header("location: ../dashboard/admin.php");
        exit();
    }
    // else if($pwdHashed == $pw){
    //     echo "true";
    //     session_start();
    //     $_SESSION["adminId"]= $uidExists["adminId"];
    //     $_SESSION["adminEmail"]= $uidExists["adminEmail"];
    //     header("location: ../dashboard/admin.php");
    //     exit();
    // }
}

function addProduct($conn, $productName,$categoryName,$productSize, $productPrice, $productQty, $productDiscount, $productImg){

    $sql = "INSERT INTO product (productName, categoryName, productSize, productPrice, productQty,productDiscount,productImg) VALUES ('$productName', '$categoryName', '$productSize','$productPrice','$productQty','$productDiscount','$productImg')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/products.php?success");
       
    }else{
        header("Location: ../dashboard/products.php?addfailed");
        
    }

}


function addEmployee($conn, $firstName, $lastName, $jobRole, $nic, $landNum, $mobileNum, $address1, $address2, $address3, $address4, $email ){

    $sql = "INSERT INTO employee (firstName, lastName, jobRole, nic, landPhone, mobilePhone, address1, address2, address3, address4, email) VALUES ('$firstName', '$lastName', '$jobRole','$nic','$landNum','$mobileNum','$address1', '$address2', '$address3', '$address4','$email')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/employee.php?success");
       // echo $productSize;
    }else{
        header("Location: ../dashboard/employee.php?error=addfailed");
        // echo  $conn->error;
    }

}

function deleteCategory($conn,$categoryName){

    $sql = "DELETE FROM categories (categoryName,categoryImg) WHERE categoryName='$categoryName'";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
       header("Location: ../dashboard/categories.php?deleted");
    }else{
       header("Location: ../dashboard/categories.php?deletefailed");
        //echo  $conn->error;
    }
}

function categoryExists($conn, $categoryName){
    $sql = "SELECT * FROM categories WHERE categoryName = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../dashboard/categories.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $categoryName);
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

function employeeExists($conn, $nic){
    $sql = "SELECT * FROM employee WHERE nic= ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../dashboard/employee.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $nic);
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


function get_safe_value($conn,$str){ //??
	if($str!=''){
		$str=trim($str);
		return strip_tags( mysqli_real_escape_string($conn,$str));
	}
}