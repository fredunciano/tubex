<?php
$host_name = 'db5000150747.hosting-data.io';
$database = 'dbs145883';
$user_name = 'dbu362393';
$password = 'Rajini#12121950';
$connect = mysqli_connect($host_name, $user_name, $password, $database);
// return $connect

if (mysqli_connect()) {
die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
} else {
echo '<p>Connection to MySQL server successfully established.</p >';
}
?>