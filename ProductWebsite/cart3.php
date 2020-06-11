<?php
include_once('includes/function.php');
include_once('login.php');
global $x;
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <!--<link rel="stylesheet" href="test.css"/>-->
           <!--<link rel="stylesheet" href="includes/nav.css"/>-->

</head>
<body>
<?php
  include './includes/navigation.php';
  ?>
  <style>
 #ty {
    margin: 40px;
    width:50%;
}
h3{
    margin:40px 40px;
    border-bottom: 1px solid #E0E0E0;
    overflow: auto;
}

th{
    background-color: #F0F0F0;
}
button{
    padding: 9px 25px;
    background-color: rgba(0,136,169,1);
    border:none;
    margin-left: 555px;    
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}
button:hover{
    background-color: rgba(0,136,169,0.8);
}

  </style>
             <div id="op" style="clear:both"></div>      
                <h3>Order Details</h3>  
                <div id="ty"class="table-responsive"> 
			
                <?php
			         if(isset($_POST["submit2"])){
                        $product_name=$_POST['product_name'];
                         $quantity=$_POST['quantity'];
                         $price=$_POST['price'];
            }
			    ?>
				<form method="post" action="finalcheck.php">
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Product</th>  
                               <th >Quantity</th>  
                               <th >Price</th>  
                               <th >Total</th>  
                               <th>Action</th>
                          </tr>  
                          <?php   
                          
                          if(!empty($_SESSION["shopping_cart"])):  
                          
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $product):  
                                
                               // $_SESSION['name']=$product['product_name'];
                               // $cart_contents = array($product['product_name']);
                               
                               
                          ?>  
                          <tr>  
                               <td><?php echo $product["product_name"]; ?></td>  
                               <td align="center"><?php echo $product["quantity"]; ?></td>  
                               <td>$ <?php echo $product["price"]; ?></td>  
                               <td>$ <?php echo number_format($product["quantity"] * $product["price"], 2); ?></td>  
                               <td><a href="cart3.php?action=delete&productid=<?php echo $product["productid"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($product["quantity"] * $product["price"]);  
                                endforeach;

                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total:</td>  
                               <td align="left"><strong>$ <?php echo number_format($total, 2); ?></strong></td>  
                               <td></td>  

                          </tr>  
        <!--<td colspan="5">-->
       <!-- <div class="cart-view">
        
       <a title="View Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 < echo '('.my_shopping_cart_total_product_count().' items )' ?> </a>
    </div>
    <style>
        .cart-view{
            float: right;
border: 2px dashed #F89B00;
padding: 5px;
margin-bottom: 10px;
        }    
    </style>
        <div class="cart-view">-->
       

            <?php
                if(isset($_SESSION['shopping_cart'])):
                if(count($_SESSION['shopping_cart'])>0):	
				
            ?>

          

			
                <?php endif; endif; ?>

			<!--<input type="submit" name="submit2" value="Checkout" class="btn" dont inlcude comment out> -->
            <!--</td>-->
            </tr>
            
            <?php
                endif;
            ?> 			
                
            </table>
     
            <button id="myBtn"style="color:white;" class="button">Checkout2</button>
			<!--<input type="submit" name="submit2" value="Checkout" class="btn">-->
                </div>
				</form>
           </div>  
           <br />  
		  
	<!--End of the old code -->
	   
</body>

 <!--<script>
			var btn = document.getElementById('myBtn');
			btn.addEventListener('click',function() {
				document.location.href='finalcheck.php';
			});
		   </script>-->
</html>