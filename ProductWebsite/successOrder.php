<?php 
//session_start();
include './includes/navigation.php';

/*if(!isset($_REQUEST['id'])){ 
    header("Location: index.php"); 
} */
 
// Include the database config file 
 
// Fetch order details from database 
//$query='SELECT r.*, c.full_name,c.email, c.address, c.state,c.zip FROM orders as r 
//LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']';
//$query='select c.firstname,c.lastname, c.phonenumber,co.address,co.state,co.city,co.zip from cli_order as co,composed_of as cf, client as c  
//where co.clientid=c.clientid AND co.orderid=cf.orderid';
//$result=pg_query($connect,$query); 
//$result = $db->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']); 
//if($result):
 //   if(pg_num_rows($result)>0):
 //       while($product=pg_fetch_assoc($result)):
/*if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: index.php"); 
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Order Status - PHP Shopping Cart</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<style>
body {
    font-size: 14px;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
line-height: 1.5;
color: #212529;
text-align: left;
}
.ord-addr-info .hdr {
    font-size: 18px;
    font-weight: 500;
    padding-bottom: 10px;
    color: #646464;
}

.ord-addr-info {
    background-color: #fff;
    border-radius: 2px;
    background-color: #f1f1f1;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    margin: 16px 0;
    padding: 0;
    width: 100%;
    padding: 24px;
}
.col-lg-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    position: relative;
}
.row {
    display: flex;
    flex-wrap: wrap;
}
.ord-addr-info p {
    float: left;
    width: 100%;
    font-size: 16px;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.container {
    max-width: 1140px;
    width: 100%;
padding-right: 15px;
padding-left: 15px;
margin-right: auto;
margin-left: auto;
}

*, ::after, ::before {
    box-sizing: border-box;
}

.clearfix::before, .clearfix::after, .container::before, 
.container::after, .container-fluid::before, .container-fluid::after, 
.row::before, .row::after, .form-horizontal .form-group::before, 
.form-horizontal .form-group::after, .btn-toolbar::before, .btn-toolbar::after, 
.btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after, 
.nav::before, .nav::after, .navbar::before, .navbar::after, .navbar-header::before, 
.navbar-header::after, .navbar-collapse::before, .navbar-collapse::after, .pager::before, 
.pager::after, .panel-body::before, .panel-body::after, .modal-footer::before, .modal-footer::after {
    display: table;
    content: " ";
}
</style>
<div class="container">
    <h1>ORDER STATUS</h1>
    <div class="col-12">
        <!--< if(!empty($orderInfo)){ ?>-->
            <?php
            require_once 'database/connect.php'; 
            $account=$_SESSION['userC'];
            //echo $account;
            
            $query="select c.firstname,co.orderid,c.username,c.lastname, c.phonenumber,co.address,co.state,co.city,co.zip from cli_order as co,composed_of as cf, client as c  
            where co.clientid=c.clientid AND co.orderid=cf.orderid AND username='$account'";
            $result=pg_query($connect,$query); 
            if($result):
            if(pg_num_rows($result)>0):
            while($orderInfo=pg_fetch_assoc($result)):
        ?>
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>
			
            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="hdr">Order Info</div>
                <p><b>Reference ID:</b> #<?php echo $orderInfo['orderid']; ?></p>
                <!--<p><b>Total:</b> < $_SESSION['t']?></p>-->
                <p><b>Placed On: </b><?php echo $currentDate = date("n/j/Y H:i:s");?></p>
                <p><b>Buyer Name:</b> <?php echo $orderInfo['firstname'].' '.$orderInfo['lastname']; ?></p>
                <!--<p><b>Email:</b> rtrtr</p>-->
                <p><b>Phone:</b> <?php echo $orderInfo['phonenumber']; ?></p>
            </div>
			<?php  
                 endwhile;
                endif;
            endif; 
                ?> 

            <!-- Order items -->
            <!--
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <
                        // Get order items from the database 
                        $result = $db->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result->num_rows > 0){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
                        <tr>
                            <td>< echo $item["name"]; ?></td>
                            <td>< echo '$'.$price.' USD'; ?></td>
                            <td>< echo $quantity; ?></td>
                            <td>< echo '$'.$sub_total.' USD'; ?></td>
                        </tr>
                        < } 
                        } ?>
                    </tbody>
                </table>
            </div>-->
        <!--<} else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        < } ?>-->
        
    </div>
    <input type="submit" id="myBtn" name="submit2" value="Print Recipt" class="btn">
    <script>
			var btn = document.getElementById('myBtn');
			btn.addEventListener('click',function() {
				document.location.href='oldPDF.php';
			});
		   </script>
</div>
</body>
</html>
