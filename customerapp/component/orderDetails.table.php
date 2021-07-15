<?php
    require_once('./component/components.php');
    require_once('./includes/functions.inc.php');

    require_once './includes/dbh.inc.php';
    $order_id = $_GET['id'];

    
    $sql ="SELECT * 
    FROM orderdetails 
    INNER JOIN product ON orderdetails.ProductId  =product.productId
    WHERE orderId= $order_id  ;";
   
    $sql_run = mysqli_query($conn, $sql);
    $title ="<h1 class='h2 pb-2'>Order Details of Order Number $order_id</h1>"; 
    echo $title;
    while($row = mysqli_fetch_array($sql_run)){
    ?>
    <tr >
        <td><?php echo $row['orderId'];?></td>
        <!-- <td><?php //echo $row['productName']; ?></td> -->
        <td><?php echo $row['productName']." (".$row['productSize'].")"; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $row['price']; ?></td>
    </tr>


<?php
}
?>