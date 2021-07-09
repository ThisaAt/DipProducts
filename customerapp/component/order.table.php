<?php
    require_once './includes/dbh.inc.php';

    

    $sql = "SELECT * FROM orders ;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['orderId']; ?></td>
    <td><?php echo $row['customerId']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
    <td><?php echo $row['total']; ?></td>
    <td><?php echo $row['orderDate']; ?></td>
    <td><?php echo $row['orderStatus']; ?></td>
   
 
    
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark"  data-bs-toggle="modal" data-bs-target="#viewOrderModel">View</button>
            
            <!-- <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('orderStatus').value ='<?php echo$row['orderStatus']; ?>';
            document.getElementById('orderIdupdate').value='<?php echo $row['orderId'];?>';">Update</button> -->
        </div>
    </td>
  
</tr>


<?php
}
?>