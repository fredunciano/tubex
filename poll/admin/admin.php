<? include("../../database/conn.php"); ?>
<html>
<head>
	<link rel="StyleSheet" HREF="../surveyadmin.css" type="text/css">
	<title>MiniSurvey Admin</title>
</head>

<body>

<?

	$sSQL = "SELECT SurveyID, SurveyName, StartDate, FinishDate, Active FROM Surveys ORDER BY Active, SurveyID DESC";
	$result = mysql_query($sSQL );


?>
<table border=0 cellspacing="1" cellpadding="2" width="600" bgcolor="#ffebcd">
	<tr>
		<td class="smalltext"><a href="http://www.2enetworx.com/projects/minisurvey.asp" target=_blank>MiniSurvey</a> » Admin </td>
	</tr>
</table>
<br>

<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">
	<tr>
		<td class="header2"><a href="edit.php">New Survey</a></td>
	</tr>
</table>
<br>

<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">
	<tr>
		<td width=20></td>
		<td width="30" class="header1">ID</td>
		<td width="320" class="header1">Survey Name</td>
		<td width="100" class="header1" align="right">Start</td>
		<td width="100" class="header1" align="right">Finish</td>
		<td width=30></td>
	</tr>
<?
		while($rs = mysql_fetch_array($result))
		{
			if( $rs["Active"] == 1)
				$sImageURL = "../images/active.gif";
			else
				$sImageURL = "../images/passive.gif";
?>
		<tr bgcolor="#fffaf0">
			<td><img src="<?echo $sImageURL?>" width="20" height="17"></td>
			<td class="smalltext" align=right><?echo $rs["SurveyID"]?></td>
			<td class="smalltext"><a href="edit.php?ID=<?echo $rs["SurveyID"]?>"><?echo $rs["SurveyName"]?></a></td>
			<td class="smalltext" align="right"><?echo $rs["StartDate"]?></td>
			<td class="smalltext" align="right"><?echo $rs["FinishDate"]?></td>
			<td class="smalltext" align=center nowrap>
			<a href="mail.php?ID=<?echo $rs["SurveyID"]?>" title="mail"><img src="../images/mail.gif" width=11 height=9 border=0></a> &nbsp;
			<a href="edit.php?ID=<?echo $rs["SurveyID"]?>" title="edit"><img src="../images/duzenle.gif" width=9 height=11 border=0></a>  &nbsp;
			<a href="delete.php?ID=<?echo $rs["SurveyID"]?>" title="delete"><img src="../images/sil.gif" width=9 height=11 border=0></a></td>
		</tr>
<?
		}
?>

</table>


</body>
</html>
