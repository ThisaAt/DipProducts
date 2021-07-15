<?php
  session_start();
  require_once('./includes/dbh.inc.php');
  require_once('./component/components.php');
  require_once('./includes/functions.inc.php');

//   if(!isset($_SESSION["customerId"])){
//     header("location: ./Login.php");
//     exit();
//   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./main.css">


    <title>Dip Products (Pvt) Ltd.</title>
    <link rel="icon" href="images/logo2.png">
  
</head>
<body >

    <?php
        require_once('./component/header.php');
    ?>

    <div class="container-fluid px-5 py-2">

    <div class="row content">
           
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                    <h3 class="signin-text mb-3">Customer Profile</h3>
                </div>
                </div>
                <form action="./includes/signup.inc.php" method="post" name="submit">
            
                <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                    }
                //     else if($_GET["error"]=="invaliduid"){
                //         echo '<div class="alert alert-danger" role="alert">Choose a proper username!</div>';
                //     }
                    else if($_GET["error"]=="invalidemail"){
                        echo '<div class="alert alert-danger" role="alert">Choose a proper email!</div>';
                    }
                    else if($_GET["error"]=="passworddontmatch"){
                        echo '<div class="alert alert-danger" role="alert">Passwords does not match!</div>';
                    }
                    else if($_GET["error"]=="stmtfailed"){
                        echo '<div class="alert alert-danger" role="alert">Something went wrong, please try again!</div>';
                    }
                    else if($_GET["error"]=="usernametaken"){
                        echo '<div class="alert alert-danger" role="alert">Email is already taken, please signup with a different email!</div>';
                    }
                    else if($_GET["error"]=="invalidContactNo"){
                    echo '<div class="alert alert-danger" role="alert">Choose a proper contact number!</div>';
                }
                    }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" class="form-control" ><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" class="form-control" ><br>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address1" class="form-control" placeholder="Address Line One" required>
                            <input type="text" name="address2" class="form-control" placeholder="Address Line Two" required>
                            <input type="text" name="address3" class="form-control" placeholder="Address Line Three" >
                            <!-- <input type="text" name="address4" class="form-control" placeholder="Address Line Four"><br> -->
                            <select class="form-select small" name="address4" id="unit">
                                <option selected><small>District</small></option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Kandy">Kandy</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required><br>
                        </div>  
                        <div class="form-group">
                            <label for="lastName">Gender</label><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"id="flexRadioDefault1" value="Male" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"id="flexRadioDefault2" value="Female" required>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                        </div>
                                    </div>
                                </div>
                        </div> 
                        </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="number" name="mobilePhone" class="form-control" placeholder="Mobile Phone" >
                            <input type="number" name="landPhone" class="form-control" placeholder="Land Phone" > <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password <small class="text-danger"> *Must be 8-20 characters long</small></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter the Password" >
                            <input type="password" name="checkPassword" class="form-control" placeholder="Confirm the Password" ><br>
                        </div> 
                    </div>
                </div>
                <div class="row"><br>
                    <div class="col-md-8">
                        <button type="submit" name="submit" class="btn btn-class">Update</button>
                        <!-- <p>Have an account? <a href="Login.php">Log in here</a></p> -->
                    </div>
                </div>
            </form>   
            </div>
        </div>
        
    </div>


    



                 



    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // $(document).ready(function(){
        //     $(".itemQty").on('change',function(){
        //         var $el = $(this).closest('tr');
        //         var 
        //     })
        // })
    
    
    </script>

    <script src="js/scriptIndex.js"></script>

  
</body>
</html>