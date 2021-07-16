<?php

    // session_start();
    require_once('./component/components.php');
    require_once('./includes/functions.inc.php');

    require_once './includes/dbh.inc.php';
    $id = $_SESSION['customerId'];

    $sql = "SELECT * FROM orders WHERE customerId =  $id ";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['orderId']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
    <td><?php echo $row['total'].".00"; ?></td>
    <td><?php echo $row['orderDate']; ?></td>
    <td><?php echo $row['orderStatus']; ?></td>
    
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">

            <a href="./orderdetails.php ?id=<?=$row['orderId'];?>"><button type="button" class="btn btn-outline-danger">View</button></a>
      
        </div>
    </td>
  
</tr>


<?php
}
?>