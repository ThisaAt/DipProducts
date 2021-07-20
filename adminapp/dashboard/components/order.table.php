<?php
    require_once '../includes/dbh.inc.php';
   
    $sql ="SELECT * 
    FROM orders
    INNER JOIN customer ON orders.customerId =customer.customerId ;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){

        $customer_name = $row['firstName']." ".$row['lastName'];
        // $customer_address=$row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row    ['address4'] ;
        $customer_phone = $row['mobilePhone'];
        $date =  $row['orderDate'];
        $total =  $row['total'];
    ?>
    <tr>
        <td><?php echo $row['orderId']; ?></td>
        <td><?php echo $row['firstName']." ".$row['lastName']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
        <td><?php echo $row['total'].".00"; ?></td>
        <td><?php echo $row['orderDate']; ?></td>
        <td><?php echo $row['orderStatus']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic outlined example">

            <a href="./orderdetails.php?id=<?=$row['orderId'];?>"><button type="button" class="btn btn-outline-dark">View</button></a>

            <!-- <button type="button" class="btn btn-outline-dark"  data-bs-toggle="modal" data-bs-target="#viewOrderModel" onclick="
            document.getElementById('orderIdView').value='<?php // echo $row['orderId'];?>';">View</button> -->
            
           <a> <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('orderStatus').value ='<?php echo$row['orderStatus']; ?>';
            document.getElementById('orderIdupdate').value='<?php echo $row['orderId'];?>';">Update</button></a>

            <a href="./invoice-db.php ?id=<?=$row['orderId'];?>
            &cid=<?=$row['customerId'];?>
            &name=<?=$customer_name;?>
            &address1=<?=$row['address1'];?>
            &address2=<?=$row['address2'];?>
            &address3=<?=$row['address3'];?>
            &address4=<?=$row['address4'];?>
            &phone=<?=$customer_phone;?>
            &total=<?=$total;?>
            &date=<?=$date;?>"><button type="button" class="btn btn-outline-dark">Invoice</button></a>

            <!-- <a href="./invoice-db.php.php ?id=<? //=$row['orderId'];?>&cid=<?= $row['customerId'];?>&name=<?=$customer_name;?>&address=<?=$customer_address;?>&phone=<?=$customer_phone;?>"><button type="button" class="btn btn-outline-dark">Invoice</button></a> -->
        </div>
    </td>
    </td>
</tr>

<?php
}
?>