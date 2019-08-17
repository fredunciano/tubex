<? include("../../database/conn.php"); ?>

<?
	$lAnketID = $_REQUEST["ID"];
	if ($lAnketID == "" )
	{
		$iSQL  = "select max(SurveyID) as SurveyID from  Surveys";
		$result = mysql_query($iSQL );
		while($rs = mysql_fetch_array($result))
			$lAnketID = $rs["SurveyID"];
	}

?>
<html>
<head>
	<style> table { font-family: arial; font-size:10pt; }</style>
	<title>MiniSurvey Admin</title>
</head>

<body>

<table border=0 cellspacing="1" cellpadding="2" width="600" bgcolor="#ffebcd">
	<tr>
		<td class="smalltext"><a href="http://www.2enetworx.com/projects/minisurvey.asp" target=_blank>MiniSurvey</a> » <a href="admin.php">Admin</a> » Email Survey</td>
	</tr>
</table>

<?

	if ($lAnketID != 0)
	{
		$sSQL = "SELECT SurveyID, SurveyName, SurveyQuestion, StartDate, FinishDate, Active FROM Surveys WHERE SurveyID = " . $lAnketID;
		$result = mysql_query($sSQL );

		while($rs = mysql_fetch_array($result))
		{
			$sSurveyName = $rs["SurveyName"];
			$sSurveyQuestion = $rs["SurveyQuestion"];
			$sStartDate = $rs["StartDate"];
			$sFinishDate = $rs["FinishDate"];
			$bActive = $rs["Active"];
		}
	}
	$MailCont = "<style> table { font-family: arial; font-size:10pt; }</style>"
			 ."<table border='0' cellspacing='1' cellpadding='3' width='600' bgcolor='#ffe4b5'>"
			."<tr><td colspan=2 class='header1' align=center bgcolor='#d2b48c'><b>Poll Info</b></td></tr>"
			."<tr><td class='header2'>Poll Question</td><td class='smalltext' bgcolor='#fffaf0'><b>"
			. $sSurveyQuestion . "</b></td></tr></table><br>";

if ($lAnketID != 0 )
{
//If new survey, dont show the options
	$MailCont  = $MailCont . "<table border='0' cellspacing='1' cellpadding='2' width='600'"
		." bgcolor='#ffe4b5'><tr><td colspan=5 class='header1' align=center bgcolor='#d2b48c'><b>"
		."Answer Options</b></td></tr>";

	$sSQL = "SELECT COUNT(AnswerID) AS TotalAnswers From Answers WHERE SurveyID = " . $lAnketID;
	$result = mysql_query($sSQL );

	if($rs = mysql_fetch_array($result))
		$lToplamOy = $rs["TotalAnswers"];

 	if ($lToplamOy != 0 )
		$MailCont = "<font face=arial size=2>Hi Rajini Fans,<br><br>" . $MailCont . "<tr><td></td><td></td><td class='header2'>Total <b>" . $lToplamOy
					."</b> votes cast.</td><td></td><td></td></tr>";
	else
		$MailCont = "<font face=arial size=2>Hi Rajini Fans,<br><br>A new poll has been awaiting your response." . $MailCont;

	$sSQL = "SELECT Count(Answers.OptionID) AS TotalAnswers, Options.OptionID, Options.OptionText ";
	$sSQL .=  "FROM Options LEFT JOIN Answers ON Options.OptionID = Answers.OptionID ";
	$sSQL .=  "WHERE Options.SurveyID=" . $lAnketID .  " ";
	$sSQL .=  "GROUP BY Options.OptionID, Options.OptionText ";
	$sSQL .=  "ORDER BY TotalAnswers DESC, Options.OptionID;";
	$result = mysql_query($sSQL );

	while($rs = mysql_fetch_array($result))
	{
		if ($lToplamOy != 0)
			$lYuzde = ($rs["TotalAnswers"] / $lToplamOy) * 100;
		else
			$lYuzde = 0;
		$lSecenek = $lSecenek + 1;
		$MailCont = $MailCont . "<tr><td class='header2' align=center>" . $lSecenek
					. "</td>"."<td class='smalltext'>" . $rs["OptionText"] . "</td>";
		if ($lToplamOy != 0 )
			$MailCont = $MailCont . "<td class='smalltext' align=right>"
				. round($lYuzde,2) . "%</td><td width=100><table width=100><td width='"
				. ($lYuzde)*0.9 . "%' bgcolor='#000066'>&nbsp;</td><td width='" . (100-$lYuzde)*0.9
				. "%'>&nbsp;</td></table></td>";
		$MailCont = $MailCont . "</tr>";
	}
	$MailCont = $MailCont . "</table><br>Visit <a href='http://www.rajinifans.com/'>Rajinifans</a>"
		." website to cast your vote.<br><br>Thanks,<br><br>Rajinifans.com Admin";
}

$to      = 'Rajinifansdiscussions@yahoogroups.com';
$subject =  "Poll : " . $sSurveyQuestion;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: polls@rajinifans.com' . "\r\n" .
    'Reply-To: polls@rajinifans.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set("sendmail_from", 'polls@rajinifans.com');
//ini_set("SMTP","mail.rajinifans.com");
//ini_set("smtp_port","25");
if(mail($to, $subject, $MailCont, $headers))
{
?>
EMail sent with below content:<br><br>
<? echo $MailCont; ?>
<?
}
else
	echo "Mail not sent.";
?>
</body>
</html>