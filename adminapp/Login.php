<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Admin Login</title>
    <link rel="icon" href="images/logo2.png">

  </head>
  <body>

        <div class="container">
            <div class="row content">
                <div class="col-md-6">
                   <img src="images/logo.jpg" class="img-fluid" alt="Dip Products logo"> 
                </div>
                <div class="col-md-6">
                  <h3 class="signin-text mb-3">Admin Login</h3>
                  <form action="./includes/login.inc.php" method="post">
                    <?php 
                      if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                          echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                        }
                        else if($_GET["error"]=="wronglogin"){
                          echo '<div class="alert alert-danger" role="alert">Incorrect login credentials!</div>';
                        }
                      //   else if($_GET["error"]=="none"){
                      //     echo '<div class="alert alert-success" role="alert">You have signed up successfully, Please login!</div>';
                      //   }
                      // }
                      // if(isset($_GET["newpwd"])){
                      //   if($_GET["newpwd"]=="passwordupdated"){
                      //     echo '<div class="alert alert-success" role="alert">Password updated successfully, Please login!</div>';
                      //   }
                      // }
                       } ?>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control"><br>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="pw" class="form-control"><br>
                        </div>
                        <button type="submit" name="submit" class="btn btn-class">Login</button><br><br>
                        <!-- <p><a href="#">Forgot Password?</a></p> -->
                        <p>Don't have an account? <a href="signup.php">Signup</a></p>
                   </form>
                   
                </div>
     
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>