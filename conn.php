<?php
//for login
// $user_hostname = "db5000150747.hosting-data.io";// The hostname of server
// $user_username = "dbu362393";// The username of server
// $user_password = "Rajini#12121950";// The password of server
// $user_database = "dbs145883";// The database of the tables
// $connect = mysqli_connect("$user_hostname", "$user_username", "$user_password");
// mysqli_select_db("$user_database", $connect);
$host_name = '35.222.200.63';
$database = 'dbs145883';
$user_name = 'root';
$password = 'qwerty';
$connect = mysqli_connect($host_name, $user_name, $password, $database);
return $connect
?>