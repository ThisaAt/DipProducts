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
    <!-- <td><?php // echo $row['productDiscount']; ?></td> -->
    <td><?php echo $row['productQty']; ?></td>
    <td><?php echo $row['productSales']; ?></td>
    <?php  $row['productId']; ?>
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('productNameUpdate').value ='<?php echo$row['productName']; ?>'.trim();
            document.getElementById('categoryNameUpdate').value ='<?php echo $row['categoryName']; ?>';
            document.getElementById('productSizeUpdate').value ='<?php echo $row['productSize']; ?>';
            document.getElementById('productPriceUpdate').value ='<?php echo $row['productPrice']; ?>';
            document.getElementById('productQtyUpdate').value ='<?php echo$row['productQty']; ?>'.trim();
            document.getElementById('productDiscountUpdate').value ='<?php echo$row['productDiscount']; ?>'.trim();
            document.getElementById('productIdupdate').value='<?php echo $row['productId'];?>';">Update</button>


            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert" onclick="document.getElementById('productIdDelete').value ='<?php echo$row['productId']; ?>';">Delete</button>

        </div>
    </td>
    </td>
</tr>


<?php
}
?>