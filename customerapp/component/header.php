<div class="container-fluid">

<header id="header">
<!-- navbar fixed-top navbar-light bg-light style="position:fixed; width:100%;" -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top border-bottom" >
        <div class="container-fluid">
                <!-- logo -->
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="./index.php">
                        <img src="images/logo2.png" alt="" width="50" height=auto ></a> 
                </div>
            </nav>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php#categories">SHOP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="./feedback.php">FEEDBACKS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php#footer">ABOUT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php#footer">CONTACT US</a>
                    </li>
                </ul>

<!--             
                <form class="d-flex">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-outline-danger" type="submit" name="search">Search</button>
                </form> -->

                

                <nav class="navbar navbar-light bg-light">
                    <form class="container-fluid justify-content-start">
                        <?php
                            if(isset($_SESSION["customerId"])){
                                $name = $_SESSION['firstName'];
                                echo "<div class='btn-group'>
                                <button type='button' class='btn btn-danger btn-sm dropdown-toggle me-0' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Welcome $name!
                                </button>
                                <ul class='dropdown-menu' role='menu' >
                                    <li><a class='dropdown-item' href='./profile.php'>Profile</a></li>
                                    <li><a class='dropdown-item' href='./order.php'>Orders</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='./includes/logout.inc.php'>Logout</a></li>
                                </ul>
                            </div>   ";

                                // echo "<a href='./order.php'> <button class='btn btn-sm btn-danger me-2' type='button'>Orders</button></a> ";
                                // echo "<a href='./includes/logout.inc.php'> <button class='btn btn-sm btn-danger' type='button'>Logout</button></a> ";
                         
                            }
                            else{
                                echo "<a href='./Login.php'> <button class='btn btn-sm btn-danger me-2' type='button'>Login</button></a> ";
                                echo "<a href='./signup.php'> <button class='btn btn-sm btn-danger' type='button'>Signup</button></a> ";
                            }
                        ?> 
                    </form>
                </nav> 


                <nav class="navbar navbar-light bg-light">
                    <a href="cart.php" class="nav-item nav-link active " id="cart">
                        <!-- <h6 class="px-5 cart "> -->
                        <div class="row">
                        <!-- <div class="col-6">
                        <i class="fas fa-shopping-cart"></i>
                        </div> -->
                        <!-- <div class="col-6"> -->
                        <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo " <div id='cartCount' class='text-danger text-left' bg-light><i class='fas fa-shopping-cart'>$count</i></div>" ;
                                }
                                else{
                                    // echo " <span id='cartCount' class='text-danger' bg-light>0</span>" ; 
                                    echo " <div id='cartCount' class='text-danger text-left' bg-light><i class='fas fa-shopping-cart'>0</i></div>" ;
                                }
                            ?>
                        <!-- </div> -->
                        </div>
                            <!-- <i class="fas fa-shopping-cart"></i>
                            <?php
                                // if(isset($_SESSION['cart'])){
                                //     $count = count($_SESSION['cart']);
                                //     echo " <span id='cartCount' class='text-warning' bg-light>$count</span>" ;
                                // }
                                // else{
                                //     echo " <span id='cartCount' class='text-warning' bg-light>0</span>" ; 
                                // }
                            ?> -->
                           
                            <!-- </h6> -->
                    </a>
                </nav>

            </div>
        </div>
    </nav>

</header>

</div>

<!-- <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
</button>                  
<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Welcome - <?php //echo $_SESSION['firstName']?></a>
    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
    <a class='dropdown-item' href='./order.php'>Order</a><br>
    <a class='dropdown-item' href='./profile.php'>Profile</a><br>
    <a class='dropdown-item' href='./includes/logout.inc.php'>Logout</a>
    </div>
</li>                          -->




 <!-- <div class='btn-group'>
    <button type='button' class='btn btn-danger btn-sm dropdown-toggle me-2' data-bs-toggle='dropdown' aria-expanded='false'>
        Action
    </button>
    <ul class='dropdown-menu' role='menu' >
        <li><a class='dropdown-item' href='./profile.php'>Profile</a></li>
        <li><a class='dropdown-item' href='./order.php'>Orders</a></li>
        <li><hr class='dropdown-divider'></li>
        <li><a class='dropdown-item' href='./includes/logout.inc.php'>Logout</a></li>
    </ul>
</div>  -->



