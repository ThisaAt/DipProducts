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

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto ">
                <div class="card mt-2">
                    <div class="card-title text-center">
                        <img class="py-3" src="images/dip_logo.jpg" alt="logo">
                        <h2 class="text-center">Submit Your Feedbacks</h2>
                        <hr>
                        <?php 
                            $msg ="";
                            if(isset($_GET['error'])){
                                $msg="Error Submitting the Feedback";
                                echo '<div class="alert alert-danger">'.$msg.'</div>';
                            }

                            if(isset($_GET['success'])){
                                $msg="Successfully Submitted the Feedback";
                                echo '<div class="alert alert-success">'.$msg.'</div>';
                            }


                        ?>
                    </div>

                    <div class="card-body">
                        <form action="./includes/feedback.inc.php" method="POST">

                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" id="floatingInput" value="<?php echo$_SESSION["customerName"] ?>" required>

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control mb-2"  value="<?php echo$_SESSION["customerEmail"] ?>" required>

                        <label for="type">Feedback Type</label>
                        <div class="form-floating" >
                            <select class="form-select mb-2" name="type" id="floatingSelect" aria-label="Floating label select example" required>
                                <option selected>Select a Feedback Type</option>
                                <option value="Customer Service">Customer Service</option>
                                <option value="Product Quality">Product Quality</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Other">Other</option>
                            </select>
                            <!-- <label for="floatingSelect">Type</label> -->
                        </div>
                        <label for="comment">Comment</label>
                        <div class="form-floating">
                            <textarea name="comment" class="form-control mb-2" placeholder="Leave your feedback here" id="floatingTextarea2" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2"></label>
                        </div>
                        <button type="submit" class="btn btn-danger" name="submit"> Submit </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



   
    <?php 
    //  require_once("./component/footer.php"); 
    ?>

                 



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