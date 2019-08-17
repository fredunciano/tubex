<?php
session_start();
$username =$_POST["username"];
$password =$_POST["password"];

if (($username=="admin")&&($password=="billa1980"))

{
//echo $username;
//echo $password;
//session_register("username");
$_SESSION["username"]=$username;
header("Location: adminHome.php"); 
}
else{
header("Location: index.php?status=pw");  
}


?>