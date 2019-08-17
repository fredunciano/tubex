<?session_start();
if (!isset($_SESSION["username"])){
header("Location: index.php?status=pw");
}?>
<?
   include("../../database/conn.php");
   include("../../html2txt.php");
	$lAnketID = $_REQUEST["ID"];
	$isMsg = true;
	if (!isset($_REQUEST["ID"]))
	{
		$iSQL  = "select max(ID) as ID from  index_page";
		$result = mysql_query($iSQL );
		while($rs = mysql_fetch_array($result))
			$lAnketID = $rs["ID"];
		$isMsg = false;
	}
	else
	{	include("adminHeader.php");	}

   if($isMsg)
   {
?>

<table border=0 cellspacing="1" cellpadding="2" width="600" bgcolor="#ffebcd">
	<tr>
		<td class="smalltext">News</a> » <a href="adminHome.php">Admin</a> » Email News</td>
	</tr>
</table>

<?
	}
	if ($lAnketID != 0)
	{
		$sSQL  = "select * from  index_page  WHERE id=". $lAnketID;
		$result = mysql_query($sSQL );

		while($rs = mysql_fetch_array($result))
		{
			if($rs["lang"] == 'T')
			{
				$articletitle = $rs["articletitle"];
				$shorttitle = $rs["shorttitle"];
				$content=$rs["description"];
			}
			else
			{
				$articletitle = $rs["articletitleeng"];
				$shorttitle = $rs["shorttitleeng"];
				$content=$rs["descriptioneng"];
			}
			$articletitle = str_replace("&#39;", "'", $articletitle);
			$shorttitle = str_replace("&#39;", "'", $shorttitle);


			$content = html2text($content);
			$len = strlen($content);
			$pattern = '/\[.*\]/UsS';
			$content = preg_replace($pattern, "", $content);
			if($len > 600)
				$len = strpos($content," ",600);
			$content = substr($content,0,$len) . " .... ";

		}
	$MailCont = "<style> table { font-family: arial; font-size:10pt; }</style>"
			 ."<table border='0' cellspacing='1' cellpadding='3' width='600' bgcolor='#ffe4b5'>"
			."<tr><td colspan='2' class='header1' align=center bgcolor='#d2b48c'><b>News Article</b></td></tr>"
			."<tr><td class='header2'><b>Headline</b></td><td class='smalltext' bgcolor='#fffaf0'>"
			. $shorttitle . "</td></tr><tr><td class='header2' bgcolor='#d2b48c'><b>"
			."News Title</b></td><td>".$articletitle."</td></tr><tr><td class='header1' valign=top bgcolor='#fffaf0'><b>"
			."Description</b></td><td class='smalltext' bgcolor='#fffaf0'>".$content."</td></tr></table>";

	$MailCont = "<font face=arial size=2>Hi Rajini Fans,<br><br>" . $MailCont . "<br>Visit <a href='http://www.rajinifans.com/detailview.php?title=".$lAnketID."'>Rajinifans</a>"
		." website to read the full news.<br><br>Thanks,<br><br>Rajinifans.com Admin";
}
$to      = 'Rajinifansdiscussions@yahoogroups.com';

define("ENCODING", "UTF-8");
$subject =  "=?" . ENCODING . "?B?" . base64_encode("Rajinifans News: " . $articletitle) . "?=";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: polls@rajinifans.com' . "\r\n" .
    'Reply-To: polls@rajinifans.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set("sendmail_from", 'polls@rajinifans.com');
//ini_set("SMTP","smtp.rajinifans.com");
//ini_set("smtp_port","587");
if(mail($to, $subject, $MailCont, $headers))
{
	if($isMsg)
	{
?>
EMail sent with below content:<br><br>
<? echo $MailCont;
	}
	else
	{
		echo "New Article Added and Mail sent successfully.";
	}
}
else
	echo "Mail not sent.";

 if($isMsg)
{	include("adminFooter.php"); 	}
?>