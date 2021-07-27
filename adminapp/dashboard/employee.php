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
                include_once'components/sidebar.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Employees</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Employee
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <?php 
                               $msg ="";
                               if(isset($_GET['error'])){
                                   $msg="Error adding the employee";
                                   echo '<div class="alert alert-danger">'.$msg.'</div>';
                               }
                               if(isset($_GET['exists'])){
                                    $msg="Employee Already Exists";
                                    echo '<div class="alert alert-danger">'.$msg.'</div>';
                                }
                               if(isset($_GET['success'])){
                                   $msg="Successfully added the employee";
                                   echo '<div class="alert alert-success">'.$msg.'</div>';
                               }
                               if(isset($_GET['updated'])){
                                    $msg="Successfully Updated the employee";
                                    echo '<div class="alert alert-success">'.$msg.'</div>';
                                }
                               if(isset($_GET['updatefail'])){
                                    $msg="Error Updating the employee";
                                    echo '<div class="alert alert-success">'.$msg.'</div>';
                                }     
                               if(isset($_GET['deleted'])){
                                    $msg="Employee Deleted";
                                    echo '<div class="alert alert-success">'.$msg.'</div>';
                                }     
                               if(isset($_GET['deletefailed'])){
                                    $msg="Employee Deleted Fail";
                                    echo '<div class="alert alert-success">'.$msg.'</div>';
                                }
                        ?>
                    </div>

                    <!--Display categories table start -->
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data" >
                            <table class="table table-hover" id="employee">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Job Role</th>
                                        <th scope="col">NIC Number</th>
                                        <th scope="col">Land Phone</th>
                                        <th scope="col">Mobile Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Registered Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      include_once '../dashboard/components/employee.table.php'
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
                                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/employee.inc.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="First Name"
                                                id="firstName" name="firstName">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Last Name"
                                                id="lastName" name="lastName">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jobRole" class="col-sm-2 col-form-label">Job Role</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Job Role"
                                                id="jobRole" name="jobRole">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nic" class="col-sm-2 col-form-label">NIC No.</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="NIC Number"
                                                id="nic" name="nic">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="phone" class="col-sm-2 col-form-label">Contact Numbers</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Land Phone" id="landNum" name="landNum">
                                            <input class="form-control" type="text" placeholder="Mobile Phone" id="mobileNum" name="mobileNum">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="address1" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Address Line one" id="address1" name="address1">
                                            <input class="form-control" type="text" placeholder="Address Line two" id="address2" name="address2">
                                            <input class="form-control" type="text" placeholder="Address Line three" id="address3" name="address3">
                                            <!-- <input class="form-control" type="text" placeholder="Address Line four" id="address4" name="address4"> -->
                                            <select class="form-select small" placeholder="District" name="address4" id="unit">
                                                <option selected><small>District</small></option>
                                                <option value="Anuradhapura">Anuradhapura</option>
                                                <option value="Ampara">Ampara</option>
                                                <option value="Badulla">Badulla</option>
                                                <option value="Batticola">Batticola</option>
                                                <option value="Colombo">Colombo</option>
                                                <option value="Galle">Galle</option>
                                                <option value="Gampaha">Gampaha</option>
                                                <option value="Hambanthota">Hambanthota</option>
                                                <option value="Jaffna">Jaffna</option>
                                                <option value="Kaluthara">Kaluthara</option>
                                                <option value="Kandy">Kandy</option>
                                                <option value="Kegalle">Kegalle</option>
                                                <option value="Kilinochchi">Kilinochchi</option>
                                                <option value="Kandy">Kurunagala</option>
                                                <option value="Mannar">Mannar</option>
                                                <option value="Kandy">Matale</option>
                                                <option value="Matara">Matara</option>
                                                <option value="Monaragala">Monaragala</option>
                                                <option value="Mullaitivu">Mullaitivu</option>
                                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                                <option value="Polonnaruwa">Polonnaruwa</option>
                                                <option value="Puttlam">Puttlam</option>
                                                <option value="Ratnapura">Ratnapura</option>
                                                <option value="Kandy">Trincomalee</option>
                                                <option value="Vavuniya">Vavuniya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Email"
                                                id="email" name="email">
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
                                    <!-- <div class="mb-3 row">
                                        <label for="productImg" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="productImg" type="file"
                                                name="productImg" accept=".jpg,.jpeg">
                                        </div>
                                    </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Update Model  -->
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/update.emp.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="First Name"
                                                id="firstNameupdate" name="firstName">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Last Name"
                                                id="lastNameUpdate" name="lastName">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jobRole" class="col-sm-2 col-form-label">Job Role</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Job Role"
                                                id="jobRoleUpdate" name="jobRole">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nic" class="col-sm-2 col-form-label">NIC No.</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="NIC Number"
                                                id="nicUpdate" name="nic">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="phone" class="col-sm-2 col-form-label">Contact Numbers</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Land Phone" id="landNumUpdate" name="landNum">
                                            <input class="form-control" type="text" placeholder="Mobile Phone" id="mobileNumUpdate" name="mobileNum">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="address1" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Address Line one" id="address1Update" name="address1">
                                            <input class="form-control" type="text" placeholder="Address Line two" id="address2Update" name="address2">
                                            <input class="form-control" type="text" placeholder="Address Line three" id="address3Update" name="address3">
                                            <input class="form-control" type="text" placeholder="Address Line four" id="address4Update" name="address4">
                                        
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Email"
                                                id="emailUpdate" name="email">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" id="employeeIdupdate" name="employeeId" hidden>
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
                          <h5>Are You Sure to Delete the Employee?</h5>  
                    </div>
                    
                    <div>
                        <input type="text" id="employeeIdDelete" name="employeeId" hidden>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 

                    <button type="button" class="btn btn-primary" onclick="window.location.href = '../includes/delete.emp.php?delete='+document.getElementById('employeeIdDelete').value;">Delete</button></a> 
                        
                    </div>
                </div>
            </div>
        </div>
                <!-- end delete model -->
             </main>
        </div>
    </div>


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
            $('#employee').DataTable( {
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