<?php 
     session_start();
     require_once('./dbh.inc.php');
     require_once('../component/components.php');
     require_once('./functions.inc.php');

    if(isset($_POST['submit'])){
        require_once 'dbh.inc.php';
      
        $mobile = $_POST['mobileNum'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $address4 = $_POST['address4'];
        $customerId = $_POST['customerId'];
        $billtotal = $_POST['billtotal'];

        // insert into orders table 

        $sql = "INSERT INTO orders (phone, customerId, address1, address2, address3, address4, total) VALUES ('$mobile', '$customerId', '$address1', '$address2', '$address3', '$address4', '$billtotal')";

        $sql_run = mysqli_query($conn, $sql);

        if ($sql_run){
            // header("Location:  ../cart.php?error=none");
            $orderId = mysqli_insert_id($conn);
            // echo $orderId;
        }else {
            header("Location:  ../cart.php?error=orderfailed");
        }
          

        if(isset($_SESSION['cart'])){
            $product_id = array_column($_SESSION['cart'],'product_id');

            $result = getData();
            while($row = mysqli_fetch_assoc($result)){
                foreach($product_id as $id){
                    if($row['productId']==$id){
                      
                        $productId = $row['productId'];
                        $productQty = "1";
                        // $productQty = $row['productQty'];
                        $productPrice = $row['productPrice'];
                        // echo  $productQty ;

                        $sqlproduct = "SELECT * FROM product where productId = $productId ;";
                        $sqlproduct_run = mysqli_query($conn, $sqlproduct);

                        $qtyget = (int)$row['productQty'];
                        $salesget = (int)$row['productSales'];

                        $Qty =  $qtyget - $productQty;
                        $Sales = $salesget +  $productQty ;


                        $sqlUpdate = "UPDATE product 
                            SET productQty=' $Qty', productSales ='$Sales'    
                            WHERE productId =$productId ";
                         $sqlUpdate_run = mysqli_query($conn, $sqlUpdate);
                   
                        // cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                        // $total = $total +(int)$row['productPrice'];
                        // echo $total; 

                                        // insert into orderdetails table 

                        $sql1 = "INSERT INTO orderdetails (orderId, ProductId, qty, price) VALUES ('$orderId','$productId', '$productQty', '$productPrice')";

                        $sql1_run = mysqli_query($conn, $sql1);

                        // if ($sql1_run){
                        //   header("Location:  ../orders.php?orderPlaced");
                        // }else {
                        //   header("Location:  ../cart.php?error=orderdetailsfailed");
                        //   echo  $conn->error;
                        }    
                    }
                }
            }

            $result = getDataDetergents();
            while($row = mysqli_fetch_assoc($result)){
                foreach($product_id as $id){
                    if($row['productId']==$id){
                      
                        $productId = $row['productId'];
                        $productQty = "1";
                        // $productQty = $row['productQty'];
                        $productPrice = $row['productPrice'];

                        $sqlproduct = "SELECT * FROM product where productId = $productId ;";
                        $sqlproduct_run = mysqli_query($conn, $sqlproduct);

                        $qtyget = (int)$row['productQty'];
                        $salesget = (int)$row['productSales'];

                        $Qty =  $qtyget - $productQty;
                        $Sales = $salesget +  $productQty ;


                        $sqlUpdate = "UPDATE product 
                            SET productQty=' $Qty', productSales ='$Sales'    
                            WHERE productId =$productId ";
                         $sqlUpdate_run = mysqli_query($conn, $sqlUpdate);

                        $sql1 = "INSERT INTO orderdetails (orderId, ProductId, qty, price) VALUES ('$orderId','$productId', '$productQty', '$productPrice')";

                        $sql1_run = mysqli_query($conn, $sql1);

                        // if ($sql1_run){
                        //   header("Location:  ../orders.php?orderPlaced");
                        // }else {
                        //   header("Location:  ../cart.php?error=orderdetailsfailed");
                        // }    
                    }
                }
            }

            if ($sql_run ){
                sendBill($conn,$orderId,$customerId);
                header("Location:  ../order.php?orderPlaced");
              }else {
                header("Location:  ../cart.php?error=orderdetailsfailed");
              } 
            

        }else {
            header("Location: ../cart.php");
        }