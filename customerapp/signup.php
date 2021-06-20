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

    <div>
        <?php 
        //   if(isset($_POST['create'])){
        //       echo 'submit';
        //   }  
        ?>
    </div>

        <div class="container">
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
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                        }
                    //     else if($_GET["error"]=="invaliduid"){
                    //         echo '<div class="alert alert-danger" role="alert">Choose a proper username!</div>';
                    //     }
                    //     else if($_GET["error"]=="invalidemail"){
                    //         echo '<div class="alert alert-danger" role="alert">Choose a proper email!</div>';
                    //     }
                    //     else if($_GET["error"]=="passworddontmatch"){
                    //         echo '<div class="alert alert-danger" role="alert">Passwords does not match!</div>';
                    //     }
                    //     else if($_GET["error"]=="stmtfailed"){
                    //         echo '<div class="alert alert-danger" role="alert">Something went wrong, please try again!</div>';
                    //     }
                    //     else if($_GET["error"]=="usernametaken"){
                    //         echo '<div class="alert alert-danger" role="alert">Username already taken, please try another one!</div>';
                    //     }
                        else if($_GET["error"]=="invalidContactNo"){
                        echo '<div class="alert alert-danger" role="alert">Choose a proper contact no!</div>';
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
                                <input type="text" name="address4" class="form-control" placeholder="Address Line Four"><br>
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
                            <button type="submit" name="submit" class="btn btn-class">Signup</button>
                            <p>Have an account? <a href="Login.php">Log in here</a></p>
                        </div>
                    </div>
                </form>   
             </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  
  </body>
</html>