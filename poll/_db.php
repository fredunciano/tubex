<?php
//for login
$user_hostname = "db471949039.db.1and1.com";// The hostname of server
$user_username = "dbo471949039";// The username of server
$user_password = "superstar";// The password of server
$user_database = "db471949039";// The database of the tables
$dbPrefix="Poll_";
$connect = mysql_connect("$user_hostname", "$user_username", "$user_password");
mysql_select_db("$user_database", $connect);

?>