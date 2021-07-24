<?php
    require_once '../includes/dbh.inc.php';
   
    $sql ="SELECT * 
    FROM orders
    INNER JOIN customer ON orders.customerId =customer.customerId 
    where orderStatus= 'Order Placed';";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){

        $customer_name = $row['firstName']." ".$row['lastName'];
        $customer_phone = $row['mobilePhone'];
        $date =  $row['orderDate'];
        $delivery =  $row['delivery'];
        $total =  $row['total'];
    ?>
    <tr>
        <td><?php echo $row['orderId']; ?></td>
        <td><?php echo $row['firstName']." ".$row['lastName']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
        <td><?php echo $row['delivery'].".00"; ?></td>
        <td><?php echo $row['total'].".00"; ?></td>
        <td><?php echo $row['orderDate']; ?></td>
        <td><?php echo $row['orderStatus']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic outlined example">

            <a href="./orderdetails.php?id=<?=$row['orderId'];?>"><button type="button" class="btn btn-outline-dark">View</button></a>

            
        </div>
    </td>
    </td>
</tr>

<?php
}
?>