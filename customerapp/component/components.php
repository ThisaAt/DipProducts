<?php
// <small><s class='text-secondary'>$productPrice</s></small>
function component($productImg, $productName,$productSize,$productPrice, $productId ){
    $element = "
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='Index.php' method='POST'>
      <div class='card shadow' id='topic'>
        <div><img src='data:image;base64,".base64_encode($productImg)."' alt='product image' id='img' class='img-fluid card-img-top' style='height: 300px;'>
        </div>
        <div class='card-body'>
          <h4 class='card-title'>$productName</h4>
          <p class='card-text'><b>$productSize</b></p>
          <h6>Rs.
           
            <span class='price'>$productPrice</span>
          </h6>
          <button type='submit' class='btn btn-danger my-3' name='order' >Add to Cart</button>
          <input type='hidden' name='product_id' value='$productId'>
          
          
        </div>
      </div>
    </form>
  </div>
    ";
    echo $element;

}

function cartElement($productImg, $productName,$productSize, $productPrice,$productId,$productQty, $qtyVal){


    $element="
 
    <form action='cart.php?action=remove&id= $productId' method='post' class='cart-items'>
      <div class='border rounded'>
        <div class='row bg-white'>
            <div class='col-md-3 pl-0'>
               <img src='data:image;base64,".base64_encode($productImg)."' alt='product image' class='img-fluid' > 
            </div>
            <div class='col-md-6'>
                <h5 class='pt-2'>$productName</h5>
                <small class='text-secondary'>$productSize</small><br>
                <small >Rs.<small id='unitPrice'>$productPrice</small>/Unit</small>
                <h6 class='pt-2'>Total: Rs. </h6><h6 id='$productId.Id'>$productPrice</h6>
                
                <button type='submit' class='btn btn-danger' name='remove'>Remove</button>
            </div>
            <div class='col-md-3 py-5' >
                <div> 
                  <button type='button' class='btn bg-light border rounded-circle' id='$productId.min' ><i class='fas fa-minus'></i></button>
                  <input id='$productId' type='number' min='1' max='$productQty' class='form-control itemQty w-25 d-inline' value='1' style='width:45px;'>
                  <button type='button' class='btn bg-light border rounded-circle' id='$productId.plus' ><i class='fas fa-plus'></i></button>
                  <h6 class='pt-2'>Available Items:$productQty</h6>
                  <script>
                              
                    var button= document.getElementById('$productId.plus');
                    var button2= document.getElementById('$productId.min');
                    button.addEventListener('click',(e)=>{
                      if (document.getElementById('$productId').value >= $productQty) {
                      }
                      else{
                        document.getElementById('$productId').value++;
                        priceCal($productPrice,document.getElementById('$productId').value);
                        document.getElementById('$productId.Id').innerHTML = ($productPrice*document.getElementById('$productId').value)+'.00';
                        var total = parseInt(document.getElementById('grand').innerHTML);
                        total += $productPrice;
                        updateTotal(total);
                      }
                    }) 
                    button2.addEventListener('click',(e)=>{
                      if (document.getElementById('$productId').value == 1){
                      }
                      else{
                        document.getElementById('$productId').value--;
                        priceCal($productPrice,document.getElementById('$productId').value);
                        document.getElementById('$productId.Id').innerHTML = ($productPrice*document.getElementById('$productId').value)+'.00';
                        var total = parseInt(document.getElementById('grand').innerHTML);
                        total -= $productPrice;
                        updateTotal(total);
                      }
                    })
                    function updateTotal(Val){
                      document.getElementById('grand').innerHTML = Val+'.00';
                      document.getElementById('beforetax').innerHTML = Val+'.00';
                      document.getElementById('totallink').href = 'add2session.php?totalqty='+Val+'.00';
                    }
                  
                  </script> 
                </div>
            </div>
        </div>
    </div>
</form>
    ";
    echo $element;
   
}



  // plus minus button -->
// <button type='button' class='btn bg-light border rounded-circle' id='minus'><i class='fas fa-minus'></i></button>
// <input type='text' value='1' class='form-control w-25 d-inline'>
// <button type='button' class='btn bg-light border rounded-circle' id='plus'><i class='fas fa-plus'></i></button>


 //<input id='$productId' type = 'number' min='1' max='$productQty' class='form-control itemQty' value='$qtyVal' style='width:45px;'>

//  console.log('hello',document.getElementById('$productId').value);