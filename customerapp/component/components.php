<?php

function component($productImg, $productName,$productSize,$productPrice,$productId ){
    $element = "
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='Index.php' method='POST'>
      <div class='card shadow' id='topic'>
        <div><img src='data:image;base64,".base64_encode($productImg)."' alt='product image' id='img' class='img-fluid card-img-top' width='250' height='25000'></div>
        <div class='card-body'>
          <h4 class='card-title'>$productName</h4>
          <p class='card-text'><b>$productSize</b></p>
          <h6>
            <small><s class='text-secondary'>$productPrice</s></small>
            <span class='price'>Rs.120.00</span>
          </h6>
          <button type='submit' class='btn btn-danger my-3' name='order' >Order Now</button>
          <input type='hidden' name='product_id' value='$productId'>
          
        </div>
      </div>
    </form>
  </div>
    ";
    echo $element;

}

function cartElement($productImg, $productName,$productSize, $productPrice){
    $element="

    <form action='cart.php' method='get' class='cart-items'>
      <div class='border rounded'>
        <div class='row bg-white'>
            <div class='col-md-3 pl-0'>
               <img src='data:image;base64,".base64_encode($productImg)."' alt='product image' class='img-fluid'> 
            </div>
            <div class='col-md-6'>
                <h5 class='pt-2'>$productName</h5>
                <small class='text-secondary'>$productSize</small>
                <h6 class='pt-2'>$productPrice</h6>
                <button type='submit' class='btn btn-danger' name='remove'>Remove</button>
            </div>
            <div class='col-md-3 py-5' >
                <div>
                    <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-minus'></i></button>
                    <input type='text' value='1' class='form-control w-25 d-inline'>
                    <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-plus'></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
    ";
    echo $element;
}