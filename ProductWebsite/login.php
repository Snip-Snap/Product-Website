<?php
//session_start();
require ('database/connect.php');

if(isset($_POST['sign-in2'])){
  $userName2=$_POST['userName2'];
  $Password2=$_POST['Password2'];
  
   
    //$_SESSION['log']=$username;
    if(empty($userName2) || empty($Password2)) {
        header("Location: login.php?error=emptyfields");
        exit();
    }
    else {
      $usercheck=trim(htmlspecialchars($_POST['userName2']));
      $passwordcheck=trim(htmlspecialchars($_POST['Password2']));
      $sql="SELECT * FROM client WHERE username = '".$usercheck."' AND cpassword = '".$passwordcheck."'";
        $result=pg_query($connect, $sql);
        /*if($row=pg_fetch_array($result)) {
            var_dump($row);
            //$_SESSION['username']=$row['username'];
            //$_SESSION['cpassword']=$row['cpassword'];
            

        }*/
        if(pg_num_rows($result)!=1) {
            header("Location: login.php?error=User OR Password not found");
            exit();
        } else if (pg_num_rows($result)==1) {
          //$_SESSION['sign-in']==true;
          //$_SESSION['password']=$password;
          $_SESSION['username']=$userName2;
          $_SESSION["logged"] = true;
         // $_SESSION["sign-in2"]=true;
         //$_SESSION['username']=$username;
          header("Location: index.php");

        }
    }
    /*if( $password !=$passwordcheck || $username != $emailcheck){
        echo 'sorry username or passowrd is incorrect';
    }else{
        $_SESSION['username']=$username;

    }
    */
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

<link rel="stylesheet" href="login.css"/>

  </head>
<!--
  <body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action=""  method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="inputusername" class="form-control" placeholder="username" required="required" autofocus="autofocus">
              <label for="inputusername">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <div class="text-center">
                  <button type="submit" name="sign-in" class="btn btn-primary my-4">Sign in</button>
                </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
-->

  
  <!--<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>-->

      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
          <form action="login.php"  method="POST">
          <input type="text" name="userName2" id="inputusername" class="form-control" placeholder="username" required="required" autofocus="autofocus">
          <input type="password" name="Password2" id="inputPassword" class="form-control" placeholder="password" required="required">
					<input type="submit" name="sign-in2" class="login loginmodal-submit" value="Login">

				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
      </form>


<!--
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      		<input type="submit" name="sign-in" value="Checkout" class="btn">

      
        <button type="button" class="close" name="sign-in" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
      <input type="text" name="username" class="username form-control" placeholder="Username"/>
          <input type="password" name="password" class="password form-control" placeholder="password"/>
          <input type="submit" class="btn login" name="sign-in" type="submit" value="Login" />
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
-->
</body>
</html>