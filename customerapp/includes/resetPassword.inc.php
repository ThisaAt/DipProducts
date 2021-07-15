<?php
    
    session_start();
    require 'dbh.inc.php';
    require 'functions.inc.php';

    if (isset($_POST["reset"])) {

        $email = $_POST["email"];
        // $username = $_POST["uid"];

        // require_once 'db.inc.php';
        // require_once 'functions.inc.php';

        
        // if (invalidEmaildouble($email) !== false) {
        //     header("location: ../User/login.php?error=invalidemailmodal");
        //     exit();
        // }

        // if (uidExistsdouble($link, $username, $email) == false) {
        //     header("location: ../User/login.php?error=invalidinfomodal");
        //     exit();
        // }

        sendOTP($conn,$email);
    }

    else{
        // header("location: ../User/login.php");
        exit();
    }




























    // session_start();
    // require 'dbh.inc.php';
    // require 'functions.inc.php';

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // function  sendPwReset($getName,$getEmail,$token){

    //     //Load Composer's autoloader
    //     require '../vendor/autoload.php';
    // //Create an instance; passing `true` enables exceptions

    //     $mail = new PHPMailer(true);
    //    try {
    //     //Server settings
    //     //$mail->SMTPDebug = 2;                      // Enable verbose debug output
    //     $mail->isSMTP();                                            // Send using SMTP
    //     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //     $mail->Username   = 'abc@gmail.com';                     // SMTP username
    //     $mail->Password   = 'password';                               // SMTP password
    //     $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //     //Recipients
    //     $mail->setFrom('dlmslk2021@gmail.com', 'E-License');
    //     $mail->addAddress($email, $name);     // Add a recipient
    //     //$mail->addAddress('ellen@example.com');               // Name is optional
    //     //$mail->addReplyTo('info@example.com', 'Information');
    //     //$mail->addCC('cc@example.com');
    //     //$mail->addBCC('bcc@example.com');

    //     // Attachments
    //     //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //     //$mail->addAttachment('/tmp/image.jpg', 'logo.jpg');    // Optional name
        
    //     // Content
    //     $mail->isHTML(true);                                  // Set email format to HTML
    //     $mail->Subject = $subject;
    //     $mail->Body    = $body;
    //     $mail->AltBody = strip_tags($body);

    //     $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }

        
    // }

    // if(isset($_POST["reset"])){
    //     // $email = $_POST["email"];

    //     $email = mysqli_real_escape_string($conn,$_POST["email"]);
    //     $token = md5(rand());

    //     $checkEmail = "SELECT * FROM customer WHERE customerEmail='$email' LIMIT 1";
    //     $checkEmailRun = mysqli_query($conn,$checkEmail);

    //     if(mysqli_num_rows($checkEmailRun)>0){

    //         $row = mysqli_fetch_array($checkEmailRun);
    //         $getName = $row['firstName'];
    //         $getEmail = $row['customerEmail'];

    //         $updateToken = "UPDATE customer SET token='$token' WHERE customerEmail='$getEmail' LIMIT 1";
    //         $updateTokenRun = mysqli_query($conn,$updateToken);

    //         if($updateTokenRun){

    //             sendPwReset($getName,$getEmail,$token);
    //             $_SESSION['status'] = "Password email link send ";
    //             header("location: ../resetPassword.php");
    //             exit(0);
    //         }
    //         else {
    //             $_SESSION['status'] = "Something went wrong #1 ";
    //             header("location: ../resetPassword.php");
    //             exit(0);
    //         }


    //     }
    //     else {
    //         $_SESSION['status'] = "No Email Found";
    //         header("location: ../resetPassword.php");
    //         exit(0);
    //     }
















    //error handlers
        // if(emptyInputLogin($email, $pw) !== false){
        //     header("location: ../login.php?error=emptyinput");
        //     exit();
        //  }

        // loginUser($conn, $email, $pw);
    //  }
    //  else{
        // header("location: ../login.php");
        //  exit();
    // }