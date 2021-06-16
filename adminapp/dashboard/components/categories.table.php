<?php
   
   require_once '../includes/dbh.inc.php';


if(!$conn){
    die("connection failed :".mysqli_connect_error());
}


    $sql = "SELECT * FROM categories;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['categoryImg']).'" alt="Category Image"  style="width: 100px; height: 100px;">';?>
    <td><?php echo $row['categoryName']; ?></td>
    <?php  $row['categoryId']; ?>
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            
            <!-- <a href="./components/categories.update.form.php ?id=<?//=$row['categoryId'];?>"><button type="button" class="btn btn-outline-dark">Update</button></a> -->

            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('categoryNameupdate').value ='<?php echo $row['categoryName']; ?>';
            // document.getElementById('categoryImgUpdate').value ='<?php// echo '<img src='data:image;base64,'.base64_encode($row['categoryImg']).'''; ?>';
            document.getElementById('categoryIdupdate').value='<?php echo $row['categoryId'];?>';">Update</button>

            


            <!-- <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="document.getElementById('categoryNameupdate').value ='<?php //echo $row['categoryName']; ?>';console.log('MNK');">Update</button> -->


        <!-- <button type="button" class="btn btn-outline-dark" >Delete</button> -->

            <a href="../includes/delete.cat.php?delete=<?php echo $row['categoryId'];?>"><button type="button" class="btn btn-outline-dark" >Delete</button></a>
                
           
        </div>
    </td>
    </td>
</tr>


<?php
}
?>