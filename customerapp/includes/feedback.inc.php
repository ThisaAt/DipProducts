<?php 

    if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $type = $_POST['type'];
       $comment = $_POST['comment'];

       require_once 'dbh.inc.php';
       require_once 'functions.inc.php';

       addFeedback($conn, $name,$email,$type, $comment);

        // $to = "thisalattygalle@gmail.com";
        // if (mail($to,$type,$comment,$email)){
        //     header("location: ../feedback.php?success"); 
        // }

    //    if(empty($name) || empty($email) || empty($type) || empty($comment)){
    //     header("location: ../feedback.php?error");
    //    }
    //    else {
       
    //    }

    }else {
        header("location: ../feedback.php?error");
    }
  
?>