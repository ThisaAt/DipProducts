<header id="header">
<!-- navbar fixed-top navbar-light bg-light -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
                <!-- logo -->
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="./index.php">
                         <img src="images/logo1.png" alt="" width="30" height="24"></a> 
                </div>
            </nav>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bestBuys">SHOP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">FEEDBACKS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>

                
                <form class="d-flex">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-outline-danger" type="submit" name="search">Search</button>
                </form>

                <nav class="navbar navbar-light bg-light">
                    <form class="container-fluid justify-content-start">
                      <a href="./Login.php"><button class="btn btn-sm btn-danger me-2" type="button">Login</button> </a>  
                      <a href="./signup.php"> <button class="btn btn-sm btn-danger" type="button">Signup</button></a> 
                    
                    </form>
                </nav>
                <nav class="navbar navbar-light bg-light">
                    <a href="cart.php" class="nav-item nav-link active" id="cart">
                        <h6 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i>Cart
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo " <span id='cartCount' class='text-warning' bg-light>$count</span>" ;
                                }
                                else{
                                    echo " <span id='cartCount' class='text-warning' bg-light>0</span>" ; 
                                }
                            ?>
                           
                        </h5>
                    </a>
                </nav>

            </div>
        </div>
    </nav>

</header>