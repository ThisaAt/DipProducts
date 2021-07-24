<?php
session_start();
if(!isset($_SESSION["userName"])){
  header("location: ../login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dip Products - Admin Panel</title>
    <link rel="icon" href="../images/logo2.png">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <?php
       include_once 'components/navbar.php'
    ?>


      <div class="container-fluid">
        <div class="row">
          <?php
              include_once'./components/sidebar.php'
          ?>


         <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php
                        echo '<h1 class="h2">Welcome ' .$_SESSION["userName"]. ' !</h1>'
                    ?>
                    <!-- <h1 class="h2">Dashboard</h1> -->
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                         <a href='./order.php'>  
                         <button type="button" class="btn btn-sm btn-outline-secondary">All Orders</button>
                        </a>
                        <a href='./reports.php'>  
                        <button type="button" class="btn btn-sm btn-outline-secondary">Reports</button>
                        </a>
                        </div>
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button> -->
                    </div>
                </div>

                <div>
                    <?php
                        // echo '<h1 class="text-center">Welcome ' .$_SESSION["userName"]. ' !</h1>'
                    ?>
                    <h1 class="h2 text-center">New Orders</h1>

                    <!-- <iframe width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=4fdd227a-911a-4551-a0dc-bb75782a6a9d&autoAuth=true&ctid=84c31ca0-ac3b-4eae-ad11-519d80233e6f&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLXdlc3QtdXMtcmVkaXJlY3QuYW5hbHlzaXMud2luZG93cy5uZXQvIn0%3D" frameborder="0" allowFullScreen="true"></iframe> -->
                    
                    <!--Display categories table start -->
                    <div class="py-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <thead>
                                    <tr>   
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Customer Id</th>
                                        <th scope="col">Mobile No.</th>
                                        <th scope="col">Delivery Address</th>
                                        <th scope="col">Delivery Charges (Rs.)</th>
                                        <th scope="col">Grand Total (Rs.)</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/newOrders.table.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display table end -->
                       
                </div>
            </main>

            </div>
      </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
  
</body>
</html>