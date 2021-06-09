<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM employee;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    
    <td><?php echo $row['firstName'] . $row['lastName']; ?></td>
    <td><?php echo $row['jobRole']; ?></td>
    <td><?php echo $row['nic']; ?></td>
    <td><?php echo $row['landPhone']; ?></td>
    <td><?php echo $row['mobilePhone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['email']; ?></td>
    
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark">Update</button>
            <button type="button" class="btn btn-outline-dark">Delete</button>
        </div>
    </td>
    </td>
</tr>


<?php
}
?>