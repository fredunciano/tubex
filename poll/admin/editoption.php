<? include("../../database/conn.php"); ?>
<?

/*	 Thanks to Tom Holder, who developed the IP restriction,
	 "additional information" extension and ported graphical
	 display for visitors.
	 Visit his site at http://www.ymonda.co.uk/ for more
	 ASP source code and products.
*/

	$lSecenekID = $_REQUEST["ID"] == "" ? 0:$_REQUEST["ID"];
	$lAnketID = $_REQUEST["AnketID"];

	if ($_REQUEST["kaydet"] != "")
	{
		if($lSecenekID == 0)
		{
			$sSQL = "INSERT INTO Options ( SurveyID, OptionText, AdditionalInformation) VALUES"
				."(".$lAnketID.",'".$_REQUEST["txtOptionText"]."','"
				.$_REQUEST["txtAdditionalInfo"]."')";
			$result = mysql_query($sSQL );
			$sSQL = "SELECT MAX(SurveyID) as SurveyID from Surveys;";
			$result = mysql_query($sSQL );
			while($rs = mysql_fetch_array($result))
				$lAnketID = $rs['SurveyID'];
		}
		else
		{
			 $sSQL = "UPDATE Options SET SurveyID = ".$lAnketID.", OptionText = '".$_REQUEST["txtOptionText"]
		 		."', AdditionalInformation = '".$_REQUEST["txtAdditionalInfo"]
		 		."' WHERE OptionID = " . $lSecenekID;
			$result = mysql_query($sSQL);
		}
		header("Location: edit.php?ID=" . $lAnketID);
	}
	else
	{
		$sSQL = "SELECT SurveyID, OptionText, AdditionalInformation FROM Options WHERE OptionID = " . $lSecenekID;
		$result = mysql_query($sSQL);
		while($rs = mysql_fetch_array($result))
		{
			$sOptionText = $rs["OptionText"];
			$sAdditionalInfo = $rs["AdditionalInformation"];
			$lAnketID = $rs["SurveyID"];
		}

		$sSQL = "SELECT SurveyName, SurveyQuestion FROM Surveys WHERE SurveyID = " . $lAnketID;
		$result = mysql_query($sSQL);
		while($rs = mysql_fetch_array($result))
		{
			$sSurveyName = $rs["SurveyName"];
			$sSurveyQuestion = $rs["SurveyQuestion"];
		}
?>

<html>
<head>
	<link rel="StyleSheet" HREF="../surveyadmin.css" type="text/css">
	<title>MiniSurvey Admin</title>
</head>

<body>
<table border=0 cellspacing="1" cellpadding="2" width="600" bgcolor="#ffebcd">
	<tr>
		<td class="smalltext"><a href="http://www.2enetworx.com/projects/minisurvey.asp" target=_blank>MiniSurvey</a> » <a href="admin.php">Admin</a> » <a href="edit.php?ID=<? echo $lAnketID?>">Edit Survey</a> » Edit Option</td>
	</tr>
</table>

<form action="editoption.php?kaydet=1&ID=<? echo $lSecenekID; ?>&AnketID=<? echo $lAnketID; ?>" method="post">
<table border="0" cellspacing="1" cellpadding="3" width="600" bgcolor="#ffe4b5">
	<tr>
		<td colspan=2 class="header1" align=center bgcolor="#d2b48c"><? echo $sSurveyName; ?></td>
	</tr>
	<tr>
		<td class="header2" width=100>Option</td>
		<td class="smalltext" bgcolor="#fffaf0"><input type="text" name="txtOptionText" value="<? echo $sOptionText; ?>" size="50" maxlength="50" class="flattextbox"></td>
	</tr>
	<tr>
		<td class="header2" width=100>Additional Information</td>
		<td class="smalltext" bgcolor="#fffaf0"><textarea rows="5" cols="50" name="txtAdditionalInfo" class="flattextbox"><? echo $sAdditionalInfo ?></textarea></td>
	</tr>
</table>

<br>

<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">
	<tr>
		<td width=100></td>
		<td>
			<input type="submit" name="cmdKaydet" value=" Save " class="flatbutton">
			<input type="button" name="cmdIptal" value=" Cancel " class="flatbutton" onClick="javasctipt:history.back();">
		</td>
	</tr>
</table>
</form>

</body>
</html>

<?
	}
?>