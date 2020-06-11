<?php
ob_start();
include_once('includes/function.php');
require ('database/connect.php');
include './includes/navigation.php';
if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
  $id=intval($_GET['id']); 
    
  if(isset($_SESSION['cart'][$id])){ 
        
      $_SESSION['cart'][$id]['quantity']++; 
        
  }else{ 
        
      $sql_s="SELECT * FROM products 
          WHERE productid={$id}"; 
      $query_s=pg_query($sql_s); 
      if(pg_num_rows($query_s)!=0){ 
          $row_s=pg_fetch_array($query_s); 
            
          $_SESSION['shopping_cart'][$row_s['productid']]=array( 
                  "quantity" => 1, 
                  "price" => $row_s['price'] 
              ); 
              
            
            
      }else{ 
            
          $message="This product id it's invalid!"; 
            
      } 
        
  } 
    
} 

//print_r($_SESSION);

/*if(isset($_POST["submit1"])){
	//full_name=$_POST['full_name'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  //$email=$_POST['email'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
  $zip=$_POST['zip'];
  $hash='rtrtrt'
  */
	//	$connect= pg_connect('host= user= password= dbname='); 
    //$query='SELECT * FROM client where ';
    //$res = pg_last_oid($query);
   /*
   $sql2="INSERT INTO cli_order (first_name,last_name, address, city, state, zip) VALUES 
    ('$first_name','$last_name', '$address','$city','$state','$zip')";
    */
    /*
    $result=pg_query($connect,$sql);
		
		if($sql==true){
            echo '<div class="alert alert-success" role="alert">Your order submission Successful.</div>';
    }
    else{
        echo '<div class="alert alert-danger">Your order submission failed.</div>';
    }
    if($result){
      header("Location:successOrder.php");
      }
//);
	*/
?>
<head>
<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<style>
.container {
  display:flex;
  flex-direction: column-reverse;
}
</style>

<div class="container">
               
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo my_shopping_cart_total_product_count() ?></span>
        <!--<span class="badge badge-secondary badge-pill">3</span>-->
      </h4>
      <?php   
                          if(!empty($_SESSION["shopping_cart"])):  
                            
                            $cartOutput='';
                             $total = 0;
                             $i=0;
  
                               foreach($_SESSION["shopping_cart"] as $keys=> $product): 
                                $item_id = $product['productid'];
                                //echo $item_id;
                                $sql = pg_query("SELECT * from product WHERE productid='$item_id' LIMIT 1");
                               //echo $sql;
                                while ($row = pg_fetch_array($sql)) {
                                  $product_name = $row["product_name"];
                                    
                                    $price = $row["price"];
                                   

                                    //$details = $row["description"];
                                    //$image = '<img style="border:#666 1px solid;" src = "admin123/products/' . $item_id . '.jpg" alt="' . $product_name. '" width="50" height="50" border="1" />';
                                }
                                //$pricetotal = $price * $product['quantity'];
                               // $cartTotal = $pricetotal + $cartTotal;
                                //$total = $total+ ($product["quantity"] * $product["price"]);  
                              
                                
                                
                                $cartOutput .='  <form action="finalcheck.php" method="post">
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                                        <a href="store.php?pid='.$item_id.'">'.$product_name.'</a>
                                                    </div>
                                
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                                        <p>Price: '.$price.'&nbsp;€&nbsp;</p>
                                                    </div>
                                
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column quantity">
                                                        <div class="quantity buttons_added pm-checkout-quantity">
                                                              <input type="number" size="4" class="input-text qty cart text" title="Qty" value="' . $product['quantity'] . '" name="quantity" min="1" step="1" >                    
                                                        </div><!-- quantity buttons end -->
                                                    </div>
                                
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                                        <p>Sub-Total: '.$total.'&nbsp;€&nbsp;</p>
                                                    </div>
                                
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                                                        <a href="cart.php?index_to_remove='.$i.'" class="pm-rounded-btn pm-primary pm-cart-remove">Remove</a>
                                                    </div>
                                                    <input type="hidden" name="order-pname[]" value="'.$product_name.'">
                                                    <input type="hidden" name="order-price[]" value=" '.$price.'">
                                                    <input type="hidden" name="order-qty[]" value="' . $product['quantity'] . '">
                                                    <input type="hidden" name="order-total[]" value="'.$total.'">
                                                    <input type="hidden" name="item-id[]" value="' . $item_id . '">
                                
                                                     ';
                                                     $i++;
                                                    
if(isset($_POST['submit1']))
{    $allpid = $_POST['item-id'];
   
  $oqty=$_POST['order-qty'];
    $ototal=$_POST['order-total'];
    $opname=$_POST['order-pname'];
    $oprice=$_POST['order-price'];
    echo  $oqty;
    $i=0;
    foreach($allpid as $id)
    {
    $pid=$id;
    $ocname = $_SESSION['fname'];
    $oqty=$oqty[$i];
     $ototal=$ototal[$i];
     $opname=$opname[$i];
    $oprice=$oprice[$i];
    $oclname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $address=$_SESSION['address']; 
    $city=$_SESSION['city'];
    $state=$_SESSION['state'];
    $country=$_SESSION['country'];
    $zip= $_SESSION['zip'];
    echo $_SESSION['zip'];
    $phone=$_SESSION['phone'];
   $sql= "insert into cli_order (address,state,city,zip) value ($address,$state,$city,$zip) RETURNING orderid as id";
$sql2="insert into composed_of(productid,orderid,price,quantity) value ($pid,id,$oprice,$oqty)";
pg_query($sql1, $con);
pg_query($sql2, $con);
    //$sql =pg_query("INSERT INTO cli_orders (productid, customer_name, customer_lname, product_name, qty, price, total, date_added, customer_email, customer_address, customer_city, customer_state, customer_country, customer_zip, customer_phone ) 
    //VALUES('$pid','$ocname','$oclname', '$opname', '$oqty','$oprice','$ototal', now(), '$email','$address','$city','$state','$country','$zip','$phone' ) ") or die(mysql_error());
    $i=$i+1;
    }
    }


                                //$_SESSION['something']=array();
                               //array_push($_SESSION['something'],array'productid' => $_GET['productid']));
                              //echo $_SESSION['something'];
                               // $_SESSION['id']=$product['productid'];
                              
                              
                               // global $_SESSION['id'];
                                //echo $_SESSION['id'];
                                // $_SESSION['id']=$product['productid']; 
                         // echo $_SESSION['id']; 
                          //$tv=implode(" ",$_SESSION['shopping_cart'][1]);
                         
                        
                               
                          ?> 
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
          <input type="hidden" name="p[]" value="<?php echo $product['productid']?>"> 
            <h6 class="my-0"><?php echo $product["product_name"]; ?></h6>
            <!--<h6 class="my-0" style="margin-right: 100px;">Price: $< echo $product["price"]; ?></h6>- margin-left:250px to make it move to the right-->
          </div>
          <span class="text-muted">Qty: <?php echo $product["quantity"]; ?></span>
          <span class="text-muted" >Price: $<?php echo $product["price"]; ?></span>
        </li>
        <input type="hidden" name="order-pname[]" value="'.$product_name.'">
        <input type="hidden" name="order-price[]" value=" '.$price.'">
        <input type="hidden" name="order-qty[]" value="' . $product['quantity'] . '">
       <input type="hidden" name="order-total[]" value="'.$total.'">
       <input type="hidden" name="item-id[]" value="' . $item_id . '">
        <!--<li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        -->

        <?php
                                    $tax=0.0725*$product['price'];
                                    $total = $total+ ($product["quantity"] * $product["price"]);  
                                    $final=$total+$tax;
                                    $_SESSION['t']=$final;
                                endforeach;
                               

?>
        <li class="list-group-item d-flex justify-content-between">
        <span>SubTotal $ </span>
        <strong><?php echo number_format($total, 2); ?></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
        <span>Taxes $ </span>
        <strong><?php echo number_format($tax, 2); ?></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
       
          <span>Total (USD) $ </span>
          <strong><?php echo number_format($final, 2); ?></strong>
        </li>
      </ul>
     
      <?php
                if(isset($_SESSION['shopping_cart'])):
                
                if(count($_SESSION['shopping_cart'])>0):	
                    
            ?>
    <?php endif; endif; ?>
                    <?php endif;?>
                   


</div>
   
   
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" action='finalcheck.php'method="post" novalidate>
      <!--style="border:1px solid black;"-->
      <?php
      $connect = pg_connect('host= user= password= dbname=');                 
      $account=$_SESSION['userC'];
     // $b=$_SESSION['id']; 
      // echo $account;
      //$query="SELECT * FROM client WHERE username = '$account'";
      $query="select c.clientid,co.orderid,c.username,c.firstname,c.lastname, c.phonenumber,co.address,co.state,co.city,co.zip from cli_order as co,composed_of as cf, client as c  
      where co.clientid=c.clientid AND co.orderid=cf.orderid AND username='$account'";
      $result=pg_query($connect,$query);

      while($data=pg_fetch_assoc($result)){
        $_SESSION['firstN']=$data['firstname'];
           $_SESSION['last']=$data['lastname'];
           $_SESSION['phone']=$data['phonenumber'];
           $_SESSION['cli_id']=$data['clientid'];
           //$_SESSION['address']=$data['address'];
        if(isset($_POST['submit1'])){
          if(count($_POST)>0) { 
          $connect = pg_connect('host= user= password= dbname=');                 
           $user=$_SESSION['userC'];
           //$user=$_POST['id'];
           $address=$_POST['address'];
            $_SESSION['address']=$_POST['address'];
           $city=$_POST['city'];
           $state=$_POST['state'];
           $zip=$_POST['zip'];
           $order=$_POST['idid'];
          
           // echo $user;
           $query3="UPDATE cli_order SET address='$address', 
           city='$city', state='$state', zip='$zip'
           WHERE orderid=$order";
    //  var_dump($order);
           //$query3="update cli_order set address= '$address', city='$city', state='$state', zip='$zip' 
           //where 'username'='$user'";
           pg_query($connect,$query3);
             
           $sql2="WITH rows AS (
            INSERT INTO cli_order
                (address,state,city,zip)
            VALUES
                ('$address,$state,$city,$zip)
            RETURNING id
        )
        
        INSERT INTO composed_of (productid,orderid,price,quantity)
          VALUES($productid,id,$price,$quantity)
            SELECT id
            FROM rows;
            RETURNING id;
            ";
           //$sql1 ="insert into cli_order (address,state,city,zip) value ($address,$city,$state,$zip) RETURNING orderid as id";
           //$sql2 ="insert into composed_of(productid,orderid,price,quantity) value ($productid,id,$price,$quantity)";
            //pg_query($connect,$sql1);
            pg_query($connect,$sql2); 
           //$message = "Record Modified Successfully";
           //echo $message;
           header('Location: successOrder.php');    

          }
         }
        
         ob_end_flush();
      ?>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <!-- this where we need to get the id to update the certain row or username-->
            
            <input type="hidden" name='idid' class="txtField" value="<?php echo $data['orderid']; ?>">
            <!--<input type="text" name='orderid'  value="< echo $data['orderid']; ?>">-->
            <input type="text" name='first_name' class="form-control" id="firstName" placeholder="" value="<?php echo $data['firstname'];?>" required>
            <div class="invalid-feedback">
             first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" name='last_name' class="form-control" id="lastName" placeholder="" value="<?php echo $data['lastname'];?>" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <!--<div class="input-group mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" id="username" name="username" value="< echo $data['username'];?>"placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>-->

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" name='address' class="form-control" id="address" placeholder="" value="<?php echo $data['address'];?>" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        
        <div class="row">
        <div class="col-md-3 mb-3">
            <label for="zip">City</label>
            <input type="text" class="form-control" name='city' id="city" placeholder="" value="<?php echo $data['city'];?>"required>
            <div class="invalid-feedback">
              City required.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">State</label>
            <input type="text" class="form-control" id="state" name='state' placeholder="" value="<?php echo $data['state'];?>" required>
            <div class="invalid-feedback">
              State required.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name='zip' placeholder="" value="<?php echo $data['zip'];?>" required>
            <div class="invalid-feedback">
            <!--<echo $data["orderid"]; ?>-->
              Zip code required.
            </div>
          </div>
        </div>
      
        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <!--
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>-->
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <!--<
          if(isset($_POST['submit1'])){
           $connect = pg_connect('host= user= password= dbname=');                 
            $user=$_SESSION['userC'];
            //$user=$_POST['id'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $zip=$_POST['zip'];
            echo $user;
            $query3="update cli_order set address= '$address', city='$city', state='$state', zip='$zip' 
            where username=jvenn0";
            pg_query($connect,$query3);   
            $message = "Record Modified Successfully";
            //echo $message;
            //header('Location: finalcheck.php');    
          }
      ?>-->
        <button class="btn btn-primary btn-lg btn-block" name="submit1" type="submit">Continue to checkout</button>
      </form>
    </div>
    
  </div>

  <?php  
      }
    ?>
</div>