<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>signup</title>
    <link rel="icon" href="images/logo2.png">
  </head>
  <body>
  
        <div class="container">
            <?php 
                if (isset($_POST['sendotp'])){

                    require('./sms/textlocal.class.php');
                    require('./sms/credentials.php');
                    
                    $textlocal = new Textlocal(false, false,API_KEY);

                    $numbers = array(MOBILE);
                    // $numbers = array($_POST['mobilePhone']);
                    $sender = 'TXTLCL';
                    $otp = mt_rand(10000,99999);
                    $message =  " This is your OTP for Dip Products signup: " . $otp;

                    try {
                        $result = $textlocal->sendSms($numbers, $message, $sender);
                        setcookie('otp',$otp);
                        echo "OTP send";
                    } catch (Exception $e) {
                        die('Error: ' . $e->getMessage());
                    }
                }
                if (isset($_POST['verify'])){
                    $otp = $_POST['otp'];
                    if($_COOKIE['otp'] == $otp){
                        echo "Mobile Number is verified!";
                    }
                    else {
                        echo "OTP is invalid";
                    }
                } 
            ?>

            <div class="row content">
                <div class="col-md-3">
                   <img src="images/logo.jpg" class="img-fluid" alt="Dip Products logo"> 
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="signin-text mb-3">Signup</h3>
                    </div>
                  </div>
                  <form action="./includes/signup.inc.php" method="post" name="submit">
                
                  <?php 
                    // if (isset($_POST['sendotp'])){

                    //     require('./sms/textlocal.class.php');
                    //     require('./sms/credentials.php');
                        
                    //     $textlocal = new Textlocal(false, false,API_KEY);

                    //     $numbers = array(MOBILE);
                    //     // $numbers = array($_POST['mobilePhone']);
                    //     $sender = 'TXTLCL';
                    //     $otp = mt_rand(10000,99999);
                    //     $message =  " This is your OTP for Dip Products signup: " . $otp;

                    //     try {
                    //         $result = $textlocal->sendSms($numbers, $message, $sender);
                    //         setcookie('otp',$otp);
                    //         echo "OTP send";
                    //     } catch (Exception $e) {
                    //         die('Error: ' . $e->getMessage());
                    //     }
                    // }
                    // if (isset($_POST['verify'])){
                    //     $otp = $_POST['otp'];
                    //     if($_COOKIE['otp'] == $otp){
                    //         echo "Mobile Number is verified!";
                    //     }
                    //     else {
                    //         echo "OTP is invalid";
                    //     }
                    // }

                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                        }
                        else if($_GET["error"]=="invaliduid"){
                            echo '<div class="alert alert-danger" role="alert">Choose a proper username!</div>';
                        }
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
                            <label for="contactNumber">Contact Number</label>
                            <div class="row">
                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <!-- <label for="contactNumber">Contact Number</label> -->
                                            <input type="number" name="mobilePhone" id="mobilePhone" class="form-control" placeholder="Mobile Phone" >
                                            <input type="number" name="landPhone" class="form-control" placeholder="Land Phone" > <br>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button  type="submit" name="sendotp" class="btn btn-danger btn-sm">Send OTP</button>
                                    </div>
                                <!-- </form> -->
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
                        <div class="col-md-6">
                            <!-- <form role="form" method="post" action=""> -->
                                <label for="otp">OTP</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" >
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" name="verify" class="btn btn-danger btn-sm">Verify</button>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-class" data-bs-toggle="modal" data-bs-target="#modelotp" onclick="document.getElementById('mobilePhone').value='<?php $num;?>';">Signup</button>
                            <!-- <button type="submit" name="submit" class="btn btn-class">Signup</button> -->
                            <p>Have an account? <a href="Login.php">Log in here</a></p>
                        </div>
                    </div>

                       <!-- verify otp modal -->

            <div class="modal fade" id="modelotp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mobile Number Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div>
                        <input type="number" id="mobilePhone" name="mobilePhone" >
                        </div>
                            <p>Type the OTP that we have send to your mobile number</p>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="xxxxx">
                                <label for="floatingInput">OTP</label>
                            </div>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-class" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit"  class="btn btn-danger">Verify and Signup</button>
                        </div>
                    </div>
                </div>
            </div>   


                </form>   
             </div>
            </div>

            <!-- verify otp modal -->
<!-- 
            <div class="modal fade" id="modelotp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mobile Number Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <?php //echo $num;?>
                            <p>Type the OTP that we have send to your mobile number</p>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="xxxxx">
                                <label for="floatingInput">OTP</label>
                            </div>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-class" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit"  class="btn btn-danger">Verify and Signup</button>
                        </div>
                    </div>
                </div>
            </div>                -->



        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  
  </body>
</html>