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
    // require_once '../includes/dbh.inc.php';

    // $sql = "SELECT categoryName FROM categories;";
    // $sql_run = mysqli_query($conn, $sql);
    // $categories = mysqli_fetch_array($sql_run);
    //  echo $categories[0];
    ?>

    <?php
       include_once 'components/navbar.php'
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
                include_once'components/sidebar.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Products</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Product
                            </button>
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Price (Rs.)</th>
                                        <th scope="col">Discount (%)</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Sales</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/products.table.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display categories table end -->
                </div>

                 <!-- Modal -->
                 <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/products.inc.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="productName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Product Name"
                                                id="productName" name="productName">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="categoryName" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">                                            
                                            <select class="form-select" name="categoryName" id="unit">
                                                <option selected>Category</option> 
                                                <?php
                                                require_once '../includes/dbh.inc.php';

                                                $sql = "SELECT * FROM categories;";
                                                $sql_run = mysqli_query($conn, $sql);

                                                while($row = mysqli_fetch_array($sql_run)){ ?>
                                                       
                                                    <option value='<?php echo $row['categoryName']?>'><?php echo $row['categoryName']; ?></option> 

                                                <?php } ?>
                                            </select>
                                         
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="productSize" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Product Size" id="productSize" name="productSize">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="unit" id="unit">
                                                        <option selected>Unit</option>
                                                        <option value="Kg"> Kg</option>
                                                        <option value="g"> g</option>
                                                        <option value="L"> L</option>
                                                        <option value="ml"> ml</option>
                                                    </select>
                                                </div>
                                            </div>
                                       
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productPrice" class="col-sm-2 col-form-label">Price (Rs.)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">Rs.</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-form-label" placeholder="Product Price" id="productPrice" name="productPrice">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">.00</span>
                                                </div>
                                            </div>                                                                      
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productQty" class="col-sm-2 col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Product Quantity"
                                                id="productQty" name="productQty">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productDiscount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <div class="row"> 
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Product Discount" id="productDiscount" name="productDiscount">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3 row">
                                        <label for="categoryDescription"
                                            class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Category Description"
                                                id="categoryDescription" rows="3" name="categoryDescription"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="mb-3 row">
                                        <label for="productImg" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="productImg" type="file"
                                                name="productImg" accept=".jpg,.jpeg">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                 
                  <!-- Modal update -->
              
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/update.products.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="productName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Product Name"
                                                id="productNameUpdate" name="productName" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="categoryName" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">                                            
                                            <!-- <select class="form-select" name="categoryName" id="categoryNameUpdate" disabled>
                                                <option selected>Category</option> 
                                                <?php
                                                // require_once '../includes/dbh.inc.php';

                                                // $sql = "SELECT * FROM categories;";
                                                // $sql_run = mysqli_query($conn, $sql);

                                                // while($row = mysqli_fetch_array($sql_run)){ ?>
                                                       
                                                    <option value='<?php //echo $row['categoryName']?>'><?php //echo $row['categoryName']; ?></option> 

                                                <?php // } ?>
                                            </select> -->
                                            <input class="form-control" type="text" placeholder="Product Name"
                                                id="categoryNameUpdate" name="categoryName" disabled>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="productSize" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Product Size" id="productSizeUpdate" name="productSize" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="unit" id="unit">
                                                        <option selected>Unit</option>
                                                        <option value="Kg"> Kg</option>
                                                        <option value="g"> g</option>
                                                        <option value="L"> L</option>
                                                        <option value="ml"> ml</option>
                                                    </select>
                                                </div>
                                            </div>
                                       
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productPrice" class="col-sm-2 col-form-label">Price (Rs.)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">Rs.</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control col-form-label" placeholder="Product Price" id="productPriceUpdate" name="productPrice">
                                                </div>
                                                <!-- <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">.00</span>
                                                </div> -->
                                            </div>                                                                      
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productQty" class="col-sm-2 col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Product Quantity" id="productQtyUpdate" name="productQty">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productDiscount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <div class="row"> 
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Product Discount" id="productDiscountUpdate" name="productDiscount">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="productImg" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="productImgUpdate" type="file"
                                                name="productImg" accept=".jpg,.jpeg">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" id="productIdupdate" name="productId" hidden>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                                                       

                   <!-- Delete Alert Model -->

                <div class="modal fade " id="deleteAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Warnning!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure to delete the product?</h5>  
                            </div>
                                                
                            <div> <!-- product  id -->
                                <input type="text" id="productIdDelete" name="productId" hidden>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 

                                <button type="button" class="btn btn-primary" onclick="window.location.href = '../includes/delete.products.php?delete='+document.getElementById('productIdDelete').value;">Delete</button></a> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end delete model -->
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