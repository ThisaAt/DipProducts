<?php

// if(isset($_SESSION['cart'])){
//     $product_id = array_column($_SESSION['cart'],'product_qty');
//     $count = count($_SESSION['cart']);

    
//         foreach($product_id as $id){
//             $item_array= array('product_id' => $_POST['product_id'],'product_qty' => 0);
//             $_SESSION['cart'][$count]= $item_array;
//         }}
session_start();
$_SESSION['total'] = $_GET["totalqty"];
print_r($_SESSION['total']);
header("location: index.php");
        exit();

?>