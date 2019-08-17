<? include("../../database/conn.php"); ?>
<?

	$lAnketID = $_REQUEST["ID"] == "" ? 0:$_REQUEST["ID"];

	if ($_REQUEST["kaydet"] != "")
	{
		if($lAnketID == 0)
		{
			$sSQL = "INSERT INTO Surveys (SurveyName, SurveyQuestion, StartDate, "
				."FinishDate, Active) VALUES('".$_REQUEST["txtSurveyName"]
				."','".$_REQUEST["txtSurveyQuestion"]."','".$_REQUEST["txtStartDate"]
				."','".$_REQUEST["txtFinishDate"]."','".$_REQUEST["chkActive"]."')";
			$result = mysql_query($sSQL );
			$sSQL = "SELECT MAX(SurveyID) as SurveyID from Surveys;";
			$result = mysql_query($sSQL );
			while($rs = mysql_fetch_array($result))
				$lAnketID = $rs['SurveyID'];
		}
		else
		{
			$sSQL = "UPDATE Surveys SET SurveyName = '".$_REQUEST["txtSurveyName"]
				."', SurveyQuestion = '".$_REQUEST["txtSurveyQuestion"]."', StartDate = '"
				.$_REQUEST["txtStartDate"]."', FinishDate = '".$_REQUEST["txtFinishDate"]
				."', Active = '".$_REQUEST["chkActive"]."' WHERE SurveyID = " . $lAnketID;
			$result = mysql_query($sSQL );
		}
		header("Location: edit.php?ID=" . $lAnketID);
	}
	else
	{
?>
<html>
<head>
	<link rel="StyleSheet" HREF="../surveyadmin.css" type="text/css">
	<title>MiniSurvey Admin</title>
</head>

<body>

<table border=0 cellspacing="1" cellpadding="2" width="600" bgcolor="#ffebcd">
	<tr>
		<td class="smalltext"><a href="http://www.2enetworx.com/projects/minisurvey.asp" target=_blank>MiniSurvey</a> » <a href="admin.php">Admin</a> » Edit Survey</td>
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
?>

<form action="edit.php?kaydet=1&ID=<? echo $lAnketID; ?>" method="post">
<table border="0" cellspacing="1" cellpadding="3" width="600" bgcolor="#ffe4b5">
	<tr>
		<td colspan=2 class="header1" align=center bgcolor="#d2b48c">Survey Info</td>
	</tr>
	<tr>
		<td class="header2" width=100>Survey Name</td>
		<td class="smalltext" bgcolor="#fffaf0"><input type="text" name="txtSurveyName" value="<? echo $sSurveyName;?>" size="50" maxlength="50" class="flattextbox"></td>
	</tr>
	<tr>
		<td class="header2">Survey Question</td>
		<td class="smalltext" bgcolor="#fffaf0"><input type="text" name="txtSurveyQuestion" value="<? echo $sSurveyQuestion; ?>" size="80" maxlength="250" class="flattextbox"></td>
	</tr>
	<tr>
		<td class="header2">Start Date</td>
		<td class="smalltext" bgcolor="#fffaf0"><input type="text" name="txtStartDate" value="<? echo $sStartDate;?>" size="15" maxlength="15" class="flattextbox"></td>
	</tr>
	<tr>
		<td class="header2">Finish Date</td>
		<td class="smalltext" bgcolor="#fffaf0"><input type="text" name="txtFinish" value="<? echo $sFinishDate;?>" size="15" maxlength="15" class="flattextbox"></td>
	</tr>
	<tr>
		<td class="header2">State</td>
		<td class="smalltext">
		<?
			if ($bActive == 1)
				echo "<input type='checkbox' name='chkActive' value='1' checked>";
			else
				echo "<input type='checkbox' name='chkActive' value='1'>";
		?>
		Active
		</td>
	</tr>
</table>

<br>

<?

if ($lAnketID != 0)
{
?>

	<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">

		<tr>
			<td colspan=5 class="header1" align=center bgcolor="#d2b48c">Answer Options</td>
		</tr>

		<tr>
			<td width="25"></td>
			<td width="15"></td>
			<td class="smalltext"><a href="editoption.php?AnketID=<?echo $lAnketID;?>">(Add Answer Option)</a></td>
			<td></td>
			<td></td>
		</tr>


<?
	$sSQL = "SELECT COUNT(AnswerID) AS TotalAnswers From Answers WHERE SurveyID = " . $lAnketID;
	$result = mysql_query($sSQL );

		while($rs = mysql_fetch_array($result))
		{
				$lToplamOy = $rs["TotalAnswers"];
		}

	$sSQL = "SELECT Count(Answers.OptionID) AS TotalAnswers, Options.OptionID, Options.OptionText ";
	$sSQL .= "FROM Options LEFT JOIN Answers ON Options.OptionID = Answers.OptionID ";
	$sSQL .= "WHERE Options.SurveyID=" . $lAnketID .  " ";
	$sSQL .= "GROUP BY Options.OptionID, Options.OptionText ";
	$sSQL .= "ORDER BY TotalAnswers DESC, Options.OptionID;";

	$result = mysql_query($sSQL );

	echo "<tr><td></td><td></td><td class='header2'>Total " . $lToplamOy . " votes cast.</td><td></td><td></td></tr>";
	while($rs = mysql_fetch_array($result))
	{
		if($lToplamOy != 0)
			$lYuzde = ($rs["TotalAnswers"] / $lToplamOy) * 100;
		else
			$lYuzde = 0;
		$lSecenek = $lSecenek + 1
		?>
			<tr>
				<td class="smalltext"><a href="deleteoption.php?ID=<?echo $rs["OptionID"]?>">(delete)</a></td>
				<td class="header2" align=center><?echo $lSecenek ?>.</td>
				<td class="smalltext"><a href="editoption.php?ID=<?echo $rs["OptionID"]?>"><?echo $rs["OptionText"]?></a></td>
				<td class="smalltext" align=right><?echo round($lYuzde,2) . "%"?></td>
				<td width=100><img src="../images/pb.gif" height=8 width=<?echo ($lYuzde)*0.9?>%"><img src="../images/pbw.gif" height=8 width=<?echo (100-$lYuzde)*0.9 ?>%"></td>
			</tr>
		<?
	}
?>
</table>
<?
}
?>

<br>

<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">
	<tr>
		<td width=100></td>
		<td>
			<input type="submit" name="cmdKaydet" value=" Save " class="flatbutton">
			<input type="button" name="cmdIptal" value=" Email " class="flatbutton" onClick="location.href= 'mail.php'">
			<input type="button" name="cmdIptal" value=" Cancel " class="flatbutton" onClick="location.href= 'admin.php'">
		</td>
	</tr>
</table>
</form>


</body>
</html>
<?
	}
?>