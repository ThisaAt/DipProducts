<?php 

    if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $type = $_POST['type'];
       $comment = $_POST['comment'];

       if(empty($name) || empty($email) || empty($type) || empty($comment)){
        header("location: ../feedback.php?error");
       }
       else {
          
       }

    }
  
?>