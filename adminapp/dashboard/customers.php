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

    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">

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
                    <h1 class="h2">Customers</h1>
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
                        <?php 
                    //     if(isset($_GET["error"])){
                    //     if($_GET["error"]=="emptyinput"){
                    //         echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                    //     }
                    //     else if($_GET["error"]=="categoryexists"){
                    //         echo '<div class="alert alert-danger" role="alert">Category already exists, Please try another one!</div>';
                    //     }
                    //     else if($_GET["error"]=="none"){
                    //         echo '<div class="alert alert-success" role="alert">Category added successfully!</div>';
                    //     }
                    //     else if($_GET["error"]=="addfailed"){
                    //         echo '<div class="alert alert-danger" role="alert">Category adding failed, Please try again!</div>';
                    //     }
                    //     else if($_GET["error"]=="categoryimagetoobig"){
                    //         echo '<div class="alert alert-danger" role="alert">Category image size is too big, Please select a file smaller than 5MB!</div>';
                    //     }
                    // }
                    ?>
                    </div>

                    <!--Display categories table start -->
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover" id="customer">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile Phone</th>
                                        <th scope="col">Land Phone</th>
                                        <th scope="col">Registered Date</th>
                                        <!-- <th scope="col">Actions</th>  -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/customers.table.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display categories table end -->
                </div>

             </main>
        </div>
    </div>

    <?php
        // }
    ?>

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>           
      <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>  
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>  

      <script> 
        $(document).ready(function() {
            $('#customer').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );                
        </script> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
  
</body>
</html> 