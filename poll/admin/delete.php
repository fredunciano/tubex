<? include("../../database/conn.php"); ?>
<?
	$lSurveyID = $_REQUEST["ID"];
	$sql = "DELETE FROM Surveys WHERE SurveyID = " . $lSurveyID;
	$result = mysql_query($sql);
	$sql = "DELETE FROM Options WHERE SurveyID = " . $lSurveyID;
	$result = mysql_query($sql);
	$sql = "DELETE FROM Answers WHERE SurveyID = " . $lSurveyID;
	$result = mysql_query($sql);
	header("Location: ". $_SERVER["HTTP_REFERER"]);
?>