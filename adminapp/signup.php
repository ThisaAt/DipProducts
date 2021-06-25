<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Admin Signup</title>
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
                      <h3 class="signin-text mb-3">Admin Signup</h3>
                    </div>
                  </div>
                  <form action="./includes/signup.inc.php" method="post" name="submit">
                
                  <?php 
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
                 
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userName">User Name</label>
                                <input type="text" name="userName" class="form-control" required><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required><br>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter the Password" required >
                                
                            </div> 
                        </div>
                        <div class="col-md-6"><br>
                            <div class="form-group">
                                <input type="password" name="checkPassword" class="form-control" placeholder="Confirm the Password" required>
                            </div> 
                        </div>
                    </div><br>
                    <div class="row"><br>
                        <div class="col-md-8">
                            <button type="submit" name="submit" class="btn btn-class">Signup</button><br>
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