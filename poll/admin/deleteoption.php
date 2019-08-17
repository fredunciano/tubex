<? include("../../database/conn.php"); ?>
<?
	$lOptionID = $_REQUEST["ID"];
	$sql = "DELETE FROM Options WHERE OptionID = " . $lOptionID;
	$result = mysql_query($sql);
	$sql = "DELETE FROM Answers WHERE OptionID = " . $lOptionID;
	$result = mysql_query($sql);
	header("Location: ". $_SERVER["HTTP_REFERER"]);
?>