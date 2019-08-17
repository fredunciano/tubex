<?php

session_start();
session_destroy();

//echo "<h1 align=center>Successfully Logged Out</h1>";
header("Location: index.php?status=out"); 
?>