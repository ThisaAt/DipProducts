<?php

    // $checkPassword = $_POST['checkPassword'];
    // $checkPassword = $_POST['checkPassword'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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

function sendOrderDispatched($conn,$orderId,$customerId){
    
    $sqlOrder = "SELECT * FROM orders WHERE orderId = $orderId;";
    $resultOrder = mysqli_query($conn, $sqlOrder);
    $rowOrder = mysqli_fetch_array($resultOrder);
    $total= $rowOrder['total'];
    $phone= $rowOrder['phone'];
    $address= $rowOrder['address1'].", ".$rowOrder['address2'].", ".$rowOrder['address3'].", ".$rowOrder['address4'];
    $date= $rowOrder['orderDate'];

    $sqlCustomer = "SELECT * FROM customer WHERE customerId = $customerId;";
    $resultCustomer = mysqli_query($conn, $sqlCustomer);
    $rowCustomer = mysqli_fetch_array($resultCustomer);
    $customerName= $rowCustomer['firstName']." ".$rowCustomer['lastName'];
    $email= $rowCustomer['customerEmail'];

    $sqlEmail ="SELECT * 
    FROM orderdetails 
    INNER JOIN product ON orderdetails.ProductId  =product.productId
    WHERE orderId= $orderId ;";

    $query =mysqli_query($conn, $sqlEmail);

    $subject ="Order Dispatched";
    $body = "Hello ".$customerName. "! <br><br>
    <b>Your order number ".$orderId.", have been dispatched</b><br><br>
    Delivery Address: ".  $address."<br>
    Mobile Number: ".  $phone."<br><br>
    Visit our website for more information.";

    sendOrderDispatchedEmail($email, $body, $subject);
    header("Location: ../dashboard/order.php?error=none");
    exit(); 

}

function sendOrderDispatchedEmail($email, $body, $subject){
    
    require '../vendor/autoload.php';

    include('../smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Port       = 587;                      // Set the SMTP server to send through
        $mail->SMTPSecure = 'tls';  
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dippro10339@gmail.com';                     // SMTP username
        $mail->Password   = '#dipol123';                               // SMTP password

        //Recipients
        $mail->setFrom('dippro10339@gmail.com');
        $mail->addAddress($email);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('dippro10339@gmail.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'logo.jpg');    // Optional name
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send(); 
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendDelivered($conn,$orderId,$customerId){
    
    $sqlOrder = "SELECT * FROM orders WHERE orderId = $orderId;";
    $resultOrder = mysqli_query($conn, $sqlOrder);
    $rowOrder = mysqli_fetch_array($resultOrder);
    $total= $rowOrder['total'];
    $phone= $rowOrder['phone'];
    $address= $rowOrder['address1'].", ".$rowOrder['address2'].", ".$rowOrder['address3'].", ".$rowOrder['address4'];
    $date= $rowOrder['orderDate'];

    $sqlCustomer = "SELECT * FROM customer WHERE customerId = $customerId;";
    $resultCustomer = mysqli_query($conn, $sqlCustomer);
    $rowCustomer = mysqli_fetch_array($resultCustomer);
    $customerName= $rowCustomer['firstName']." ".$rowCustomer['lastName'];
    $email= $rowCustomer['customerEmail'];

    $subject ="Order Delivered";
    $body = "Hello ".$customerName. "! <br><br>
    <b>Your order number ".$orderId.", have been delivered.</b><br><br>
    Delivery Address: ".  $address."<br>
    Mobile Number: ".  $phone."<br><br>
    Thank you for shopping with Dip Products.";

    sendDeliveredEmail($email, $body, $subject);
    header("Location: ../dashboard/order.php?error=none");
    exit(); 

}

function sendDeliveredEmail($email, $body, $subject){
    
    require '../vendor/autoload.php';

    include('../smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Port       = 587;                      // Set the SMTP server to send through
        $mail->SMTPSecure = 'tls';  
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dippro10339@gmail.com';                     // SMTP username
        $mail->Password   = '#dipol123';                               // SMTP password

        //Recipients
        $mail->setFrom('dippro10339@gmail.com');
        $mail->addAddress($email);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('dippro10339@gmail.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'logo.jpg');    // Optional name
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send(); 
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}