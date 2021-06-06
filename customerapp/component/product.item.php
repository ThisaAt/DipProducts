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

// function component($productImg, $productName,$productSize,$productPrice){
//     $element = '
//     <div class="col-md-3 col-sm-6 my-3 my-md-0">
//     <form action="Index.php" method="POST">
//       <div class="card shadow">
//         <div><img src="$productImg" alt="detergents" id="img" class="img-fluid card-img-top"></div>
//         <div class="card-body">
//           <h4 class="card-title">$productName</h4>
//           <p class="card-text"><b>$productSize</b></p>
//           <h6>
//             <small><s class="text-secondary">$productPrice</s></small>
//             <span class="price">Rs.120.00</span>
//           </h6>
//           <button type="submit" class="btn btn-danger my-3" name="order" >Order Now</button>
//         </div>
//       </div>
//     </form>
//   </div>
    
    
    
//     ';
//     echo $element;

// }


