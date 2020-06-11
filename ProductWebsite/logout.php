<?php
session_start();
/*
session_start();

if(session_destroy()) // Destroying All Sessions
{
echo 'logout succesful';
header("Location: index.php"); // Redirecting To Home Page
}*/
//first method
/*
if (isset($_GET['logout'])) { 
unset($_SESSION['userName2']); 
unset($_SESSION["Password2"]);
session_destroy();
header("Location: index.php?status=loggedout");
exit;
} */
//second method
if(isset($_SESSION['userC']))
{
    unset($_SESSION['userC']); 

}
header("Location: index.php");
?>