<?php
  require_once('./includes/dbh.inc.php');
  require_once('./component/product.item.php');
  require_once('./includes/functions.inc.php')

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

    <link rel="stylesheet" type="text/css" href="main.css">


    <title>Dip Products (Pvt) Ltd.</title>
    <link rel="icon" href="images/logo2.png">
</head>
<body>

    <!-- header and the nav bar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
                <!-- logo -->
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                         <img src="images/logo1.png" alt="" width="30" height="24"></a> 
                </div>
            </nav>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SHOP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">FEEDBACKS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>

                
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
                </form>

                <nav class="navbar navbar-light bg-light">
                    <form class="container-fluid justify-content-start">
                        <button class="btn btn-sm btn-outline-secondary" type="button">Login</button> 
                        <button class="btn btn-sm btn-outline-secondary" type="button">Signup</button>
                    </form>
                </nav>

            </div>
        </div>
    </nav>
   

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/Banner-2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/Banner-3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/new-home-slode.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container" id="bestBuys">
  <div class="row text-center py-5">
    <h1 class="title" >Best Buys</h1>
      <?php
      // component('./images/wp png.png','Washing Powder', '1 Kg', 150);
       $result = getData();
       while($row = mysqli_fetch_assoc($result)){
        component($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice']);
       }
        
      ?>
  </div>
</div>




<section id="bestBuys">
      <div class="container text-center">
        <h1 class="title">Best Buys</h1>
        <div class="row text-center">
          <div class="col-md-4">
           <a href="#"><img src="./images/wp png.png" alt="washp" class="washp"></a> 
            <h4>Dipol Washing Powder</h4><p> 1 Kg | Rs.150.00</p>
            <!-- <p>First cod boys trip.Visited in 2019 May.hsabfihb hbfisadfb ihbfishbfi pibhfiupsbfib.</p> -->
          </div>
          <div class="col-md-4">
          <a href="#"><img src="./images/wp png.png" alt="washp" class="washp"></a> 
            <h4>Dipol Washing Powder</h4><p> 1 Kg | Rs.150.00</p>
           
          </div>
          <div class="col-md-4">
          <a href="#"><img src="./images/wp png.png" alt="washp" class="washp"></a> 
            <h4>Dipol Washing Powder</h4><p> 1 Kg | Rs.150.00</p>
           
          </div>
        </div>
        <!-- <a href="https://www.youtube.com/channel/UC31ZtCfn_UjjpR7vpKYMcZA" target="_blank"><button type="button" class="btn btn-primary" >Discover More</button> </a> -->
      </div> 
    </section>
    


    






    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <script src="js/scriptIndex.js"></script>
</body>
</html>