<?php
  session_start();
  require_once('./includes/dbh.inc.php');
  require_once('./component/components.php');
  require_once('./includes/functions.inc.php');

  if(!isset($_SESSION["customerId"])){
    header("location: ./Login.php");
    exit();
  }
  

  if(isset($_POST['remove'])){
     if($_GET['action']=='remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($value["product_id"]==$_GET['id']){
                 unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
             }
         }
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

    <link rel="stylesheet" type="text/css" href="./main.css">


    <title>Dip Products (Pvt) Ltd.</title>
    <link rel="icon" href="images/logo2.png">
    <script>
        var count1=0;
        var input_value = [];
        var unit = [];

        function priceCal(x,y){
            console.log(x*y)
        }
    </script>
</head>
<body class="bg-light">
<div class="container-fluid">

<header id="header">
<!-- navbar fixed-top navbar-light bg-light style="position:fixed; width:100%;" -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top " >
        <div class="container-fluid" style="inline-size: auto !important;">
                <!-- logo -->
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" width="50" height=auto ></a> 
                </div>
            </nav>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php echo"<a class='nav-link active' aria-current='page' id='totallink' href='index.php'>HOME</a>"; ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</header>

</div>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php
                        $delivery=300;
                        $total =0;
                        $qtyVal =1;
                        if(isset($_SESSION['cart'])){
                            $product_id = array_column($_SESSION['cart'],'product_id');
                            // print_r($_SESSION['cart']);
                            $result = getData();
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['productId']==$id){
                                        cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                                        $total = $total +(int)$row['productPrice'];
                                       
                                     }
                                }
                            }
                            $result = getDataDetergents();
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['productId']==$id){
                                        cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                                        $total = $total +(int)$row['productPrice'];
                                       
                                     }
                                }
                            }
                        }
                        else{
                            echo"<h5>Cart is Empty</h5>";
                        }
                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 ">
            <form action="./includes/order.inc.php" method="POST" enctype="multipart/form-data">
                <div class="pt-4">
                    <h5>Order Details</h5>
                    <hr>
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9"> 
                            <input class="form-control" type="number" placeholder="Mobile Phone" id="mobileNumUpdate" name="mobileNum" value="<?php echo $_SESSION["mobile"] ?>">
                           
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address1" class="col-sm-3 col-form-label">Delivery Address</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Address Line one" id="address1Update" name="address1" value="<?php echo$_SESSION["address1"] ?>">
                            <input class="form-control" type="text" placeholder="Address Line two" id="address2Update" name="address2" value="<?php echo$_SESSION["address2"] ?>">
                            <input class="form-control" type="text" placeholder="Address Line three" id="address3Update" name="address3" value="<?php echo$_SESSION["address3"] ?>">
                            <!-- <input class="form-control" type="text" placeholder="Address Line four" id="address4Update" name="address4" id="address4" value=" <?php echo $_SESSION["address4"] ?>" onchange="totalCal()"> -->

                            <select class="form-select small" name="address4" id="address4" onchange="totalCal()">
                                <option selected><small><?php echo $_SESSION["address4"] ?></small></option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Kandy">Kandy</option>
                            </select>

                            <input type="hidden" name="customerId" value=" <?php echo $_SESSION["customerId"] ?>" >
                        </div>
                    </div><br>  

                    <h6>Price Details(Cash on delivery)</h6>
                    <!-- <p><small>*A delivery charge of Rs.50.00 will be added to every per 1Kg/1L</small></p>    -->
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<h6 >Price($count items)</h6>";
                                    // echo "<h6 >Delivery</h6>"; 
                                }
                                else{
                                    echo "<h6>Price (0 items)</h6>";
                                }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Grand Total</h6>
                            <hr>
                           
                        </div>
              
                        <div class="col-md-6">
                            <h6><?php 
                            
                            if(isset($_SESSION['cart'])){
                                if(isset($_SESSION['total'])){
                                    $total = $_SESSION['total'];
                                }
                                if ($_SESSION['cart'] == NULL){
                                    echo "<script>
                                    document.getElementById('grand').innerHTML = '0.00';
                                    document.getElementById('beforetax').innerHTML = '0.00';
                                    </script>";
                                  
                                    unset($_SESSION['total']);
                                    $total = 0.00;
                                }
                            }
                            
                            echo "Rs.<span id='beforetax'>$total.00</span></h6>";
                            // echo "Rs.<span>500.00</span></h6>";
                            ?>
                            <!-- <h6 class="text-success">FREE</h6> -->
                            <!-- <input type="disabled" class="form-control" id="deliveryCharges" name="deliveryCharges" disabled> -->
                            <h6><?php echo "Rs.<span id='deliveryCharges'>$delivery.00</span>"; ?></h6>
                            <hr>
                            <h6><?php echo "Rs.<span id='grand'>$total.00</span>"; ?></h6>
                            <!-- <input type="disabled" class="form-control" id="grand" name="grand" disabled> -->
                            <hr>
                            <?php 
                                if(isset($_SESSION['cart'])):
                                if(count($_SESSION['cart'])>0):
                            ?>
                            <!-- <button class='btn btn-md btn-danger my-3' type='button' data-bs-toggle="modal" data-bs-target="#placeOrderAlert">Place the Order</button> -->
                            <input class="form-control" type="hidden" id="billtotal" name="billtotal" value="<?php echo $total ?>">
                            <input class="form-control" type="hidden" id="delivery" name="delivery" value="<?php echo $delivery ?>">
                            <button class='btn btn-md btn-danger my-3' type='submit' name="submit">Place the Order</button><br>
                           <?php endif; endif; ?>
                      
                        </div>
                    </div> 

                </div>
            </form>
            </div>
            
        </div>
        <!-- Are you sure to place the order Model -->

        <div class="modal fade " id="placeOrderAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter the Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./includes/order.inc.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9"> 
                                    <input class="form-control" type="number" placeholder="Mobile Phone" id="mobileNumUpdate" name="mobileNum" value="<?php echo $_SESSION["mobile"] ?>">
                                    <input class="form-control" type="hidden" id="billtotal" name="billtotal" value="<?php echo $total ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address1" class="col-sm-3 col-form-label">Enter the Delivery Address</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Address Line one" id="address1Update" name="address1" value=" <?php echo $_SESSION["address1"] ?>">
                                    <input class="form-control" type="text" placeholder="Address Line two" id="address2Update" name="address2" value=" <?php echo $_SESSION["address2"] ?>">
                                    <input class="form-control" type="text" placeholder="Address Line three" id="address3Update" name="address3" value=" <?php echo $_SESSION["address3"] ?>">
                                    <input class="form-control" type="text" placeholder="Address Line four" id="address4Update" name="address4" value=" <?php echo $_SESSION["address4"] ?>">
                                    <input type="hidden" name="customerId" value=" <?php echo $_SESSION["customerId"] ?>" >
                                </div>
                            </div>

                            <?php
                        //     if(isset($_SESSION['cart'])){
                        //     $product_id = array_column($_SESSION['cart'],'product_id');

                        //     $result = getData();
                        //     while($row = mysqli_fetch_assoc($result)){
                        //         foreach($product_id as $id){
                        //             if($row['productId']==$id){
                        //                 cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                        //                 $total = $total +(int)$row['productPrice'];
                        //             }
                        //         }
                        //     }
                        // }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="./Index.php"><button type="button" class="btn btn-outline-danger" >Order More Items</button></a> 
                      <button type="submit" name="submit" class="btn btn-danger" >Place the Order</button>
                      <!-- <a href="./Invoice.php"></a>   -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div>

<?php 
// require_once("./component/footer.php"); 
?>

</div>   
 <!-- jquery cdn -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

    function totalCal(){   

    var district=document.getElementById("address4").value;
    
    if(district=="Colombo") 
    {
        document.getElementById("deliveryCharges").innerHTML='200.00';
    }
    else if(district=="Gampaha") 
    {
        document.getElementById("deliveryCharges").innerHTML='300.00';
    }
    else if(district=="Kalutara") 
    {
        document.getElementById("deliveryCharges").innerHTML='250.00';
    }
    else if(district=="Kandy") 
    {
        document.getElementById("deliveryCharges").innerHTML='500.00';
    }
    else if(district=="Kegalle") 
    {
        document.getElementById("deliveryCharges").innerHTML='700.00';
    }
    else
    {
        document.getElementById("deliveryCharges").innerHTML='750.00';
    }
   
    document.getElementById("grand").innerHTML=parseInt(document.getElementById("beforetax").innerHTML) + parseInt(document.getElementById("deliveryCharges").innerHTML) +'.00';

    }

  </script> 

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

   

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

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