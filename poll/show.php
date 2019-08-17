<? include("../database/conn.php"); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-9">
	<link rel="StyleSheet" HREF="anketadmin.css" type="text/css">
	<title>Mini</title>
</head>

<body>

<?

	$lAnketID = $_REQUEST["ID"];
	$sSQL = "SELECT SurveyID, SurveyName, SurveyQuestion, StartDate, FinishDate, Active FROM Surveys WHERE SurveyID = " . $lAnketID;
	$result = mysql_query($sSQL);
	 if($rs = mysql_fetch_array($result))
	 {
		$sAnketAdi = $rs["SurveyName"];
		$sAnketSorusu = $rs["SurveyQuestion"];
		$sBaslangicTarihi = $rs["StartDate"];
		$sBitisTarihi = $rs["FinishDate"];
		$bAktif = $rs["Active"];
	}
?>

<table border="0" cellspacing="1" cellpadding="2" width="600" bgcolor="#ffe4b5">
	<tr>
		<td width=100 class="header2">Anket Adı</td>
		<td class="smalltext" bgcolor="#fffaf0"><? echo $sAnketAdi; ?></td>
	</tr>
	<tr>
		<td class="header2">Anket Sorusu</td>
		<td class="smalltext" bgcolor="#fffaf0"><? echo $sAnketSorusu ;?></td>
	</tr>
	<tr>
		<td class="header2">Başlangıç Tarihi</td>
		<td class="smalltext" bgcolor="#fffaf0"><? echo $sBaslangicTarihi; ?></td>
	</tr>
	<tr>
		<td class="header2">Bitiş Tarihi</td>
		<td class="smalltext" bgcolor="#fffaf0"><? echo $sBitisTarihi; ?></td>
	</tr>
</table>
<br>
<table border="0" cellspacing="1" cellpadding="2" width="300" bgcolor="#ffe4b5">

<?
	$sSQL = "SELECT COUNT(CevapID) AS Toplam From Cevaplar WHERE AnketID = " & lAnketID;
	$result = mysql_query($sSQL);
	 while($rs = mysql_fetch_array($result))
	 {
		 $lToplamOy = $rs["Toplam"];
	}

	$sSQL = "SELECT Count(Cevaplar.SecenekID) AS Toplam, Secenekler.SecenekYazisi ";
	$sSQL .= "FROM Cevaplar INNER JOIN Secenekler ON Cevaplar.SecenekID = Secenekler.SecenekID ";
	$sSQL .= "WHERE Cevaplar.AnketID=" . $lAnketID .  " ";
	$sSQL .= "GROUP BY Secenekler.SecenekYazisi ";
	$sSQL .= "ORDER BY Count(Cevaplar.SecenekID) DESC";

	echo "<tr><td colspan=2 class='header2'>Toplam " . $lToplamOy . " oy verildi.</td></tr>";

	$result = mysql_query($sSQL);
	 while($rs = mysql_fetch_array($result))
	 {
		$lYuzde = ($rs["Toplam"] / $lToplamOy)*100
		?>
			<tr>
				<td class="smalltext"><? echo $rs["SecenekYazisi"]?></td>
				<td class="smalltext" align=right><? echo round(lYuzde,2) & "%"?></td>
				<td width=100><img src="images/pb.gif" height=8 width=<? echo (lYuzde)*0.9?>%"><img src="images/pbw.gif" height=8 width=<? echo (100-lYuzde)*0.9?>%"></td>
			</tr>
		<?
	}
?>
</table>
</body>
</html>
