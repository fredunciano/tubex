<?
session_start();

include("../database/conn.php");

$key=substr($_SESSION['key'],0,5);
$number = $_REQUEST['number'];

if($number!=$key)
{
  echo '<center><font face="Verdana, Arial, Helvetica, sans-serif" '
  .'color="#FF0000">Word verification string not valid! Please try again!</font></center>';
}
else
{
	$name = $_REQUEST["Name"];
	if($name == "")
		$name = "Anonymous";

	$email = $_REQUEST["Email"];
	$url = $_REQUEST["URL"];
	$comment = $_REQUEST["Comment"];
	$newsid = $_REQUEST["PollID"];
	$ip=$_SERVER['REMOTE_ADDR'];


	$asql = "INSERT INTO poll_comments (PollID, Name, EMail, URL, Comment, IP,DateTime) VALUES (".$newsid.",'".$name."','".$email."','".$url."','".$comment."','".$ip."',CURRENT_TIMESTAMP)";

	$aresult = mysql_query($asql);

	echo "<b>Thank you. Your comment is posted successfully. It will appear once the moderator approves it.</b>";
}
?>