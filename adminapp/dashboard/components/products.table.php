<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM product;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['productImg']).'" alt="Product Image"  style="width: 100px; height: 100px;">';?>
    <td><?php echo $row['productName']; ?></td>
    <td><?php echo $row['categoryName']; ?></td>
    <td><?php echo $row['productSize']; ?></td>
    <td><?php echo $row['productPrice']; ?></td>
    <td><?php echo $row['productDiscount']; ?></td>
    <td><?php echo $row['productQty']; ?></td>
    <td><?php echo $row['productSales']; ?></td>
    
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark">Update</button>
            <a href="../includes/delete.products.php?delete=<?php echo $row['productId'];?>"><button type="button" class="btn btn-outline-dark" >Delete</button></a>
        </div>
    </td>
    </td>
</tr>


<?php
}
?>