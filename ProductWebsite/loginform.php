<?php
ob_start();
require ('database/connect.php');
include './includes/navigation.php';

if(isset($_POST['logIN'])){
  $UserName3=$_POST['UserName3'];
  $PassWord3=$_POST['PassWord3'];
  
   
    //$_SESSION['log']=$username;
    if(empty($UserName3) || empty($PassWord3)) {
		header("Location: loginform.php?error=emptyfields");
        exit();
    }
    else {
      $usercheck=trim(htmlspecialchars($_POST['UserName3']));
      $passwordcheck=trim(htmlspecialchars($_POST['PassWord3']));
      $sql="SELECT * FROM client WHERE username = '".$usercheck."' AND cpassword = '".$passwordcheck."'";
        $result=pg_query($connect, $sql);
        /*if($row=pg_fetch_array($result)) {
            var_dump($row);
            //$_SESSION['username']=$row['username'];
            //$_SESSION['cpassword']=$row['cpassword'];
            

        }*/
        if(pg_num_rows($result)!=1) {
			header("Location: loginform.php?error=User OR Password not found");
            exit();
        } else if (pg_num_rows($result)==1) {
          //$_SESSION['sign-in']==true;
          //$_SESSION['password']=$password;
          $_SESSION['userC']=$UserName3;
          //$_SESSION["logged"] = true;
         // $_SESSION["sign-in2"]=true;
		 //$_SESSION['username']=$username;
		 header("Location: index.php");

        }
    }

  }
  ob_end_flush();
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
<body>
<style>
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}

</style>
<div class="wrapper">
    <form class="form-signin" action="loginform.php"  method="POST">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="UserName3"placeholder="Username" required="required" autofocus="autofocus" />
      <input type="password" class="form-control" name="PassWord3" placeholder="Password" required="required"/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" name="logIN"type="submit">Login</button>   
    </form>
  </div>

		  </body>
		  </html>