<?php
session_start();
if(!isset($_SESSION["adminId"])){
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
                include_once 'components/sidebar.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Customer Orders</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Product
                            </button> -->
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                    
                    </div>

                    <!--Display categories table start -->
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <h2 class="h3">Order Details</h2>
                            <table class="table table-hover">
                                <thead>
                                    <tr>   
                                        <th scope="col"> </th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Ordered Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/orderDetails.table.php'
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

    <?php
        // }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
  
</body>
</html> 