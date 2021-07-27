<?php
  session_start();
  require_once('./includes/dbh.inc.php');
  require_once('./component/components.php');
  require_once('./includes/functions.inc.php');

  $serverName="localhost";
  $dbUserName="root";
  $dBPassword="123";
  $dbName="dipol_db"; 


  $conn = mysqli_connect($serverName, $dbUserName, $dBPassword, $dbName);
  
  if(isset($_POST['order'])){
    //  print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

     $item_array_id = array_column($_SESSION['cart'], 'product_id');
    // print_r($item_array_id);

     if(in_array($_POST['product_id'],$item_array_id)){
       echo "<script>alert('Product is already added')</script>";
       echo "<script>window.location=index.php</script>";
     }else{
        $count = count($_SESSION['cart']);
        $item_array= array('product_id' => $_POST['product_id'],'product_qty' => 1);
        $_SESSION['cart'][$count]= $item_array;
        // print_r($_SESSION['cart']);
     }

      // print_r($_SESSION['cart']); *
    }
    else{
      $item_array = array ('product_id'=>$_POST['product_id'],'product_qty' => 1 );
      $_SESSION['cart'][0]=$item_array;
    // print_r($_SESSION['cart']); *
    }
  }

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
<body  >

  <!-- header and the nav bar -->

    <?php require_once("./component/header.php"); ?>
    
     <!-- carousel -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/Banner 1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/Banner 2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/Banner 3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
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
<!-- carousel end  -->

  <!-- category cards -->
  <div class="row row-cols-1 row-cols-md-3 g-4 px-5 pt-5"id="categories">
      
    <div class="col text-center">
      <div class="card shadow">
        <a href="./Index.php#bestBuys">
          <img src="./images/st2.jpg" class="card-img-top" alt="...">  
        </a>
        <div class="card-body">
          <h2 class="card-title"><b>Sanitizers</b></h2>
        </div>
      </div>
    </div>

    <div class="col text-center">
      <div class="card shadow" >
      <a href="./Index.php#detergents">
        <img src="./images/cat det.jpg" class="card-img-top" alt="..."> </a>
        <div class="card-body">
          <h2 class="card-title"><b>Detergents</b></h2>
        </div>
       
      </div>
    </div>

    <div class="col text-center">
      <div class="card shadow">
      <a href="./Index.php#handwash">
        <img src="./images/cathw.jpg" class="card-img-top" alt="...">
      </a>
        <div class="card-body">
          <h2 class="card-title"><b>Hand Wash</b></h2>
        </div>
      </div>
    </div>

 
  </div>





        <!-- products -->
<div class="container" id="bestBuys">
  <div class="row text-center py-5">
    <h1 class="title" >Sanitizers</h1>
      <?php
      // component('./images/wp png.png','Washing Powder', '1 Kg', 150);
       $result = getData();
       while($row = mysqli_fetch_assoc($result)){
        component($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId']);
       }
        
      //  $result = getData();
      //  while($row = mysqli_fetch_assoc($result)){
      //   component($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId']);
      //  }

      ?>
  </div>
</div>

<div class="container " id="detergents">
  <div class="row text-center py-5">
    <h1 class="title" >Detergents</h1>
      <?php
      // component('./images/wp png.png','Washing Powder', '1 Kg', 150);
       $result = getDataDetergents();
       while($row = mysqli_fetch_assoc($result)){
        component($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId']);
       }
        
      ?>
  </div>
</div>


<div class="container " id="handwash">
  <div class="row text-center py-5">
    <h1 class="title" >Hand Wash</h1>
      <?php
      // component('./images/wp png.png','Washing Powder', '1 Kg', 150);
       $result = getDataHandWash();
       while($row = mysqli_fetch_assoc($result)){
        component($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId']);
       }
        
      ?>
  </div>
</div>

<div>

    <?php require_once("./component/footer.php"); ?>

</div>
<a href="Index.php" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

    



    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="js/scriptIndex.js"></script>
</body>
</html>