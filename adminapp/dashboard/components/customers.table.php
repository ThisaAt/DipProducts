<?php
    require_once '../includes/dbh.inc.php';

    

    $sql = "SELECT * FROM customer;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['firstName'] ." ". $row['lastName']; ?></td>
    <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
    <td><?php echo $row['customerEmail']; ?></td>
    <td><?php echo $row['mobilePhone']; ?></td>
    <td><?php echo $row['landPhone']; ?></td>
 
    
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark">Update</button>
            <button type="button" class="btn btn-outline-dark" name="delete">Delete</button>
        </div>
    </td>
    </td>
</tr>


<?php
}
?>