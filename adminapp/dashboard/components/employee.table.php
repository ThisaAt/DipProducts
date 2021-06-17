<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM employee;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    
    <td><?php echo $row['firstName'] ." ". $row['lastName']; ?></td>
    <td><?php echo $row['jobRole']; ?></td>
    <td><?php echo $row['nic']; ?></td>
    <td><?php echo $row['landPhone']; ?></td>
    <td><?php echo $row['mobilePhone']; ?></td>
    <td><?php echo $row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row['address4'] ;?></td>
    <td><?php echo $row['email']; ?></td>
    <?php  $row['employeeId']; ?>
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('firstNameupdate').value ='<?php echo$row['firstName']; ?>'.trim();
            document.getElementById('lastNameUpdate').value ='<?php echo $row['lastName']; ?>'.trim();
            document.getElementById('jobRoleUpdate').value ='<?php echo $row['jobRole']; ?>';
            document.getElementById('nicUpdate').value ='<?php echo $row['nic']; ?>'.trim();
            document.getElementById('landNumUpdate').value ='<?php echo $row['landPhone']; ?>';
            document.getElementById('mobileNumUpdate').value ='<?php echo $row['mobilePhone']; ?>';
            document.getElementById('address1Update').value ='<?php echo $row['address1']; ?>';
            document.getElementById('address2Update').value ='<?php echo $row['address2']; ?>';
            document.getElementById('address3Update').value ='<?php echo $row['address3']; ?>';
            document.getElementById('address4Update').value ='<?php echo $row['address4']; ?>';
            document.getElementById('emailUpdate').value ='<?php echo $row['email']; ?>';
            document.getElementById('employeeIdupdate').value='<?php echo $row['employeeId'];?>';">Update</button>


            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert" onclick="document.getElementById('employeeIdDelete').value ='<?php echo$row['employeeId']; ?>';">Delete</button>
                

        </div>
    </td>
    </td>
</tr>


<?php
}
?>