<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM categories;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['categoryImg']).'" alt="Category Image"  style="width: 100px; height: 100px;">';?>
    <td><?php echo $row['categoryName']; ?></td>
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