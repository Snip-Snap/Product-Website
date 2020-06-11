<?php
session_start();
$product_ids=array();

//session_destroy();
//check if add to cart has been submitted
if(filter_input(INPUT_POST,'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        //keep track of how many products are in the shopping cart
        $count= count($_SESSION['shopping_cart']);
        //creates sequential array for matching array keys to products id's
        $product_ids = array_column($_SESSION['shopping_cart'],'productid');
        if(!in_array(filter_input(INPUT_GET,'productid'),$product_ids)){
            $_SESSION['shopping_cart'][$count]=array
            (
                'productid'=> filter_input(INPUT_GET,'productid'),
                'product_name'=> filter_input(INPUT_POST,'product_name'),
                'price'=>filter_input(INPUT_POST,'price'),
                'quantity'=>filter_input(INPUT_POST,'quantity')
            );
        }  else {//product already exist, increase quantiy
            //match array key to id of the prouct being addded to the cart
            for($i=0;$i<count($product_ids);$i++){
                if($product_ids[$i] == filter_input(INPUT_GET,'productid')){
                    //add item quantity to teh existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST,'quantity');
                }
            }
        }
    }
    else {//if the shopping cart does not exist, create first product with array with key 0
        //create array using submitted from data, start from key 0 and fill it with values.
        $_SESSION['shopping_cart'][0]=array
        (
            'productid'=> filter_input(INPUT_GET,'productid'),
            'product_name'=> filter_input(INPUT_POST,'product_name'),
            'price'=>filter_input(INPUT_POST,'price'),
            'quantity'=>filter_input(INPUT_POST,'quantity')
        );
    }
}
if(filter_input(INPUT_GET,'action')=='delete'){
    //loop through all products in the shopping cart until it match ss with the GET id variable
    foreach($_SESSION['shopping_cart'] as $key=> $product){
        if($product['productid'] ==filter_input(INPUT_GET,'productid')){
            //remove product from the shopping cart when it matches with GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array kesy so they match with products ids numeric arrays
    $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
}
function my_shopping_cart_total_product_count() {
    $product_counts = 0;

    if ( isset( $_SESSION['shopping_cart'] ) ) {
        $product_counts = array_sum( array_column( $_SESSION['shopping_cart'], 'quantity' ) );
    } 

    return $product_counts;
}
?>