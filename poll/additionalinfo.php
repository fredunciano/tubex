<? include("../database/conn.php"); ?>
<?

/*	 Thanks to Tom Holder, who developed the IP restriction,
	 "additional information" extension and ported graphical
	 display for visitors.
	 Visit his site at http://www.ymonda.co.uk/ for more
	 ASP source code and products.
*/

	$OptionID = !defined($_REQUEST["ID"])? 1 : $_REQUEST["ID"];
	$OptionName = $_REQUEST["name"];

?>
<html>
<head>
	<link rel="StyleSheet" HREF="surveyadmin.css" type="text/css">
	<title><? echo $OptionName; ?></title>

	<script language="javascript">
	<!--
		window.focus();
	//-->
	</script>
</head>

<body bgcolor="#ffe4b5">

<table border="0" cellspacing="1" cellpadding="2" width="100%" bgcolor="#ffe4b5">
	<?
	$sSQL = "SELECT AdditionalInformation FROM Options WHERE OptionID = " . $OptionID;
	$result = mysql_query($sSQL);
		 while($rs = mysql_fetch_array($result))
		 {
	?>
		<tr>
			<td class="smalltext"><? echo $rs["AdditionalInformation"]; ?></td>
		</tr>
	<?
		}

	?>
</table>