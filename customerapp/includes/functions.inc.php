<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

            // $_SESSION["customerId"]  =$row['firstName'];
            $_SESSION["firstName"] =$row['firstName'];
            $_SESSION["lastName"] =$row['lastName'];
            $_SESSION["customerName"] =$row['firstName']. " ".$row['lastName'];
            $_SESSION["customerEmail"] =$row['customerEmail'];
            $_SESSION["mobile"] =$row['mobilePhone'];
            $_SESSION["landphone"] =$row['landPhone'];
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

    $sql = "SELECT * FROM product WHERE categoryName='Sanitizers';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }

}

function getDataDetergents(){
    // require_once('./dbh.inc.php');
    $serverName="localhost";
    $dbUserName="root";
    $dBPassword="123";
    $dbName="dipol_db"; 

  //  $conn = mysqli_connect("localhost","root","","dipol_db");
    $conn = mysqli_connect($serverName, $dbUserName, $dBPassword, $dbName);

    $sql = "SELECT * FROM product WHERE categoryName='Detergents';";
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

function sendOTP($conn,$email){

    $randstr = uniqid($email);
    $body = "Hello! <br>Your temporary password is <strong>" .$randstr."</strong>.<br>Please reset your password once you logged in.";
    
    $sql = "UPDATE customer SET customerPw = ? WHERE customerEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {

        // header("location:  ../User/login.php?error=stmtfailed"); //directs back to the login page
        exit();
    }
    $hashedPwd = password_hash($randstr, PASSWORD_DEFAULT); //hashing auto updates
    mysqli_stmt_bind_param($stmt,"ss",$hashedPwd, $email);
    mysqli_stmt_execute($stmt);

    $subject ="Recover Password";
    sendEmail($email, $body, $subject);

    header("location: ../login.php?error=none");
    exit();  
}

function sendEmail($email, $body, $subject){
    // Load Composer's autoloader
    require '../vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    include('../smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Port       = 587;                      // Set the SMTP server to send through
        $mail->SMTPSecure = 'tls';  
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dippro10339@gmail.com';                     // SMTP username
        $mail->Password   = '#dipol123';                               // SMTP password
        // $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        // $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('dippro10339@gmail.com');
        $mail->addAddress($email);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

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

function sendBill($conn,$orderId,$customerId){

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

    $subject ="Order Details";
    while ($item = mysqli_fetch_array($query)) {
        $body = "Hello ".$customerName. "! <br><br>
        <b>Order Details of Order No:".$orderId."</b><br>
        ".$item['productName']." (". $item['productSize'].") - ".$item['qty'] ."<br>  
        <hr>
        Grand Total(Rs.): ".  $total.".00<br><br>
        Ordered Date and Time: ".  $date."<br>
        Delivery Address: ".  $address."<br>
        Mobile Number: ".  $phone."<br><br>
        Thank you for shopping with Dip Products.";
    }

    sendBillEmail($email, $body, $subject);
    header("Location:../order.php?orderPlaced");
    exit();  
}

function sendBillEmail($email, $body, $subject){
    
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

function smsOrder($conn,$orderId,$customerId){

    // require_once '<div class=""> ';
    require '../sms/vendor/autoload.php';
    
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

    $basic  = new \Vonage\Client\Credentials\Basic("10ad1919", "e22FNx0SBWdslaDv");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS("94703067121", "BRAND_NAME", 'A text message sent using the Nexmo SMS API')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }

}