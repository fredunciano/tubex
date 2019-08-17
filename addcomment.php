<?
session_start();

include("conn.php");

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
	$email = $_REQUEST["Email"];
	$url = $_REQUEST["URL"];
	$comment = $_REQUEST["Comment"];
	$newsid = $_REQUEST["NewsID"];
	$ip=$_SERVER['REMOTE_ADDR'];

	if($name == "")
	{
		echo "<font color=red><b>Error:Comment not posted. Enter your name.</b></font>";
		exit;
	}
	if($email == "")
	{
		echo "<font color=red><b>Error:Comment not posted. Enter your email id.</b></font>";
		exit;
	}

	if($comment == "")
	{
		echo "<font color=red><b>Error:Comment not posted. Enter your comment.</b></font>";
		exit;
	}

	$asql = "INSERT INTO index_comments (NewsID, Name, EMail, URL, Comment,IP, DateTime) VALUES (".$newsid.",'".$name."','".$email."','".$url."','".$comment."','".$ip."',CURRENT_TIMESTAMP)";

	$aresult = mysqli_query($asql);

	echo "<b>Thank you. Your comment is posted successfully. It will appear once the moderator approves it.</b>";
}
?>