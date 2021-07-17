<?php
  session_start();
  require_once('./includes/dbh.inc.php');
  require_once('./component/components.php');
  require_once('./includes/functions.inc.php');

  if(!isset($_SESSION["customerId"])){
    header("location: ./Login.php");
    exit();
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
  
</head>
<body class="bg-light">

    <?php
        require_once('./component/header.php');
    ?>

    <div class="container-fluid ">


        <?php 
            $msg ="";
            if(isset($_GET['orderPlaced'])){
                $msg="Order Placed Successfully.An email has been sent to your email address with order details ";
                echo '<div class="alert alert-success">'.$msg.'</div>';
            }
        ?>

        <div class="row content">
        <div class="col-md-1"></div>
      <!--Display categories table start -->
        <div class="col-md-10" >
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="h2 py-3 ">Your Orders</h1>
                <table class="table table-hover  border-danger ">
                    <thead id="tableHead" class="border-danger border border-2 ">
                        <tr>   
                            <th scope="col">Order Id</th>
                            <!-- <th scope="col">Customer Id</th> -->
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Delivery Address</th>
                            <th scope="col">Grand Total (Rs.)</th>
                            <th scope="col">Date</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once './component/order.table.php'
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-md-1"></div>
     <!--Display table end -->
        
        
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