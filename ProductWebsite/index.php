<?php
include_once('includes/function.php');
require ('database/connect.php');
include './includes/navigation.php';
?>
<html>  
      <head>
  
           <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js" integrity="sha256-lY8OdlU6kUK/9tontLTYKJWThbOuSOlWtbINkP0DLKU=" crossorigin="anonymous"></script>
           <link rel="stylesheet" href="index.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
            <link rel="stylesheet" href="inlcudes/nav.css"/>
          <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->


      </head>  
      
      <body>  
      
<!--Start of the old code -->
           <!--<br />  -->
           <nav>
  <?php
  ?>
  </nav>

<!--end of new product display code-->
<!--Aything below here is the old code with the old product display -->
<!--
<div class="container-fuild">
<div class="row">
    <div class="col-lg-3">
     <h3>Filter Product</h3>
     <hr>
     <h6 class="text-info">Select Brand</h6>
     <ul class="list-group">
                    <
                    $query = "SELECT DISTINCT(product_name) FROM product ORDER BY product_name DESC";
                    $result=pg_query($connect,$query); 
                        while($product=pg_fetch_assoc($result)){
                    
                    ?>
                 
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input product_check"
                            value="< echo $product['product_name']; ?>" id="brand"> < echo $product['product_name']; ?>
                        </label>
                        </div>
                        </li>  
                        <
                    }

                    ?>      
                </ul>
                        </div>
                        <div class="col-lg-9">

                        </div>
                        </div>
                        </div>

 <script>
$(document).ready(function(){
    $(".product_check").click(function(){
        var action='data';
        var brand =get_filter_text('brand');
        $.ajax({
            url:'action.php',
            method:'POST',
            data:{action:action,brand:brand},
            success:function(response){
                $("#result").html(respond);
                $("#textChange").text("Filtered Products");
            }
        
        });
    });
    function get_filter_text(text_id){
        var filterData=[];
        $('#'+text_id+':checked').each(function(){

        });
       return filterData; 
    }

        
    });

    
    <style>
    </style> 
    <script>
    

    </script>    

<div class="container-fluid">
    <div class="row">
    
        <div  class="col-lg-9"style="right: -150px;" ><!--style="top: -1040px; right: -300px;"-->
            <h5 class="text-center" id="textChange">All Products</h5>
            <hr>
            <div class="row" id="result">
            <?php
            $query='SELECT * FROM productDisplay';
            /*SELECT * FROM product ORDER by productid ASC */
                $result=pg_query($connect,$query); 
                if($result):
                    if(pg_num_rows($result)>0):
                        while($product=pg_fetch_assoc($result)):
            ?>

            <div class="col-sm-4 col-lg-3 col-md-3">
            <form method="post" action="index.php?action=add&productid=<?php echo $product["productid"]; ?>">  
           
    <div style="border:1px solid #ccc; border-radius:5px;    box-shadow: 10px 10px 5px grey;
 padding:16px; margin-bottom:40px; height:400px; "><!--remove height: % if you want the defalut version of longer height-->
              <img src="<?php echo $product["image"]; ?>" class="img-responsive"  /> <br />
                               <h4 class="text-info"><?php echo $product["product_name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $product["price"]; ?></h4>
                               <input type="text" name="quantity" class="form-control" value="1"  size="2"/>    
                               <input type="hidden" name="product_name" value="<?php echo $product["product_name"]; ?>" />  
                               <input type="hidden" name="price" value="<?php echo $product["price"]; ?>" />  
                               <div  align="center"><input  id="button" name="add_to_cart" type="submit" value="+"></div>
                            </div>
                            <div class="elem-demo"></div>
    </form>  

   </div>
   <?php 
                 endwhile;
                endif;
            endif; 
                ?> 
</div>

</div>          

    

</body>

</html>