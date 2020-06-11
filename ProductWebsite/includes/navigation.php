<?php
require_once('includes/function.php');
//require_once('loginform.php');
?>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <link rel="icon" href="snipsnap_manvir.png" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <img id="brand-image" alt="Website Logo" src="snipsnap_manvir.png">
      </a>
      <div id="naer"class="navbar-brand" href="#">Snip Snap</div>

    </div>

<style>
  #brand-image {
    height:50px;
    width:50px;
    margin: -12px;
    padding-bottom: 5px;

  }
  #naer{
    padding-left:30px;
  }
  .navbar {
  min-height: 50px;
}
</style>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       <!-- <li  style="padding-right: 1rem;"><a href="index.php">Home</a></li>-->
        <li  style="padding-right: 1rem;"><a href="index.php">Products</a></li>
        <!--<div class="cart-view">-->
        
        <li  style="padding-right: 1rem;"><a class="cart-view" title="View Cart" href="cart3.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 <?php echo '('.my_shopping_cart_total_product_count().' items )' ?> </a></li>
    <!--</div>-->
    <style>
        .cart-view{
            /*float: right;*/
/*border: 2px dashed #F89B00;*/
padding: 5px;
/*margin-bottom: 10px;*/
        }    
    </style>
        <!--<li style="padding-right: 1rem;"><a href="login.php">Cart</a></li>-->
        <?php
            if(isset($_SESSION['userC']))
            {?>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="">
                    <div style="color:#333">
                      <?php
                        echo "Welcome ".$_SESSION['userC']; 
                      ?>
                    </div>
                  </a></li>
                  <li style="padding-right: 1rem;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li style="padding-right: 1rem;"><a href="loginform.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                
                <li style="padding-right: 1rem;"><a href="registration.php"><span class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->

              </ul>
                <?php
            }
          ?>
       <!--<li style="padding-right: 1rem;">-->
<!--<

if($_SESSION['logged']==true)
    { 
      echo $_SESSION["username"];
      echo '<a href="logout.php?logout">LogOut</a></li>';
    }
  elseif($_SESSION['logged']==false)
    {
      echo '<a href="login.php">LogIN</a></li>';
    }

?>-->
<!--
if(isset($_SESSION["logged"])==true){
          echo $_SESSION['username'];
          echo '<li style="padding-right: 1rem;"><a href="logout.php?logout">LogOut</a></li>';

        }elseif(isset($_SESSION['logged'])==false){
          echo '<li style="padding-right: 1rem;"><a href="login.php">Login</a></li>';

        }
  -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NavBar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
  <header>
    
    <img class="logo" width="50" height="50" src="./snipSnap.jpg" >
    alt="logo"

    <nav>
        <ul class="nav__links">
          <li><a href="#">Services</a></li>
          <li><a href="#">Project</a></li>
          <li><a href="#">About</a></li>
      </ul>
    </nav>
    <a class="cta" href="#"><button>Contact</button></a>
  </header>
</body>
</html>-->

<!--<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="#">
    <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
  </a>
  <a class="navbar-brand" href="#">Snip Snip Barber Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div  class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
        <li  style="padding-right: 1rem;"class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li  style="padding-right: 1rem;" class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li  style="padding-right: 1rem;"class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li style="padding-right: 1rem;" class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    
        </ul>
    </div>
</nav>-->

<!--Navbar -->
<!--/.Navbar -->
</body>
</html>







 

