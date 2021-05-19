<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>signup</title>


  </head>
  <body>

        <div class="container">
            <div class="row content">
                <div class="col-md-3">
                   <img src="images/logo.jpg" class="img-fluid" alt="Dip Products logo"> 
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="signin-text mb-3">Signup</h3>
                      <form action="">
                         <div class="form-group">
                          <label for="email">Fisrt Name</label>
                            <input type="text" name="fName" class="form-control"><br>
                          </div>
                          <div class="form-group">
                              <label for="">Address</label>
                              <input type="text" name="address1" class="form-control" placeholder="Address Line One">
                              <input type="text" name="address2" class="form-control" placeholder="Address Line Two">
                              <input type="text" name="address3" class="form-control" placeholder="Address Line Three">
                              <input type="text" name="address4" class="form-control" placeholder="Address Line Four"><br>
                            </div>
                            <div class="form-group">
                              <label for="">Contact Number</label>
                              <input type="number" name="mobileNo" class="form-control" placeholder="Mobile Phone">
                              <input type="number" name="landNo" class="form-control" placeholder="Land Phone"> <br>
                            </div>
                    </div>

                    <div class="col-md-6"><br><br>
                      
                            <div class="form-group">
                              <label for="lastName">Last Name</label>
                              <input type="text" name="lastName" class="form-control"><br>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control"><br>
                            </div>  
                            <div class="form-group">
                              <label for="lastName">Gender</label><br>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Female
                                </label>
                              </div>
                            </div> 
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Enter the Password">
                              <input type="password" name="checkPassword" class="form-control" placeholder="Confirm the Password"><br>
                            </div>  
                            <button class="btn btn-class">Login</button>
                    </div>
                    
                    </form>   
                    <p><a href="#">Forgot Password?</a></p>
                      <p>Do not an account? <a href="#">Sign up here</a></p>
                  </div>
                </div>
     
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  
  </body>
</html>