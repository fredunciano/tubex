<?php include("../database/conn.php"); ?>
<html>
<head>
	<link rel="StyleSheet" HREF="surveyadmin.css" type="text/css">
	<title>Survey</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script>
	function open_window(url)
	{
		mywin = window.open(url,"window",'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=250,height=250');
	}
	</script>
</head>
<body class=pollbg>
<?php

/*	 Thanks to Tom Holder, who developed the IP restriction,
	 "additional information" extension and ported graphical
	 display for visitors.
	 Visit his site at http://www.ymonda.co.uk/ for more
	 ASP source code and products.
*/
	$lAnketID ='';

	if ($_REQUEST["ID"] == NULL ){
		$sSQL = "SELECT max(SurveyID) as ID FROM Surveys WHERE ACTIVE = TRUE";
		$result = mysqli_query($connect,$sSQL);

		if(mysqli_num_rows($result) > 0)
		{
			while($rs = mysqli_fetch_array($result)){
				$lAnketID = $rs["ID"];
			}
			
		}else{
			echo "Error : Survey not found<br>Survey ID:" . $lAnketID;
			exit();
		}
	}

	$sSQL = "SELECT SurveyID, SurveyName, SurveyQuestion FROM Surveys WHERE SurveyID = " . $lAnketID;
	$result = mysqli_query($connect,$sSQL);
	if(mysqli_num_rows($result) == 0)
	{
		echo "Error : Survey not found<br>Survey ID:" . $lAnketID;
		exit();
	}else{
		while($rs = mysqli_fetch_array($result)){
			$sSurveyName = $rs["SurveyName"];
			$sSurveyQuestion = $rs["SurveyQuestion"];
		}
	}
?>
<script language="">
<!--
function viewResults()
{
	document.castForm.opt.value="view";
	document.castForm.submit();
}

function submitResults()
{
	optSecenek = 0;
	for(i=0;i<document.castForm.optSecenek.length;i++)
		if(document.castForm.optSecenek[i].checked)
			optSecenek = document.castForm.optSecenek[i].value;
	if(optSecenek == 0)
		alert("You should select an option");
	else
		document.castForm.submit();
}

//-->
</script>
<form action="cast.php" method="post" name=castForm target=_top>
<input type=hidden name=opt value=cast>
<input type=hidden name=ID value="<? echo $lAnketID;?>">
<table border="0" cellspacing="1" cellpadding="2" width="100%" class=pollbg>
	<tr>
		<td class="header2" width=200 nowrap><? echo  $sSurveyQuestion; ?></td>
	</tr>
	<?php
	$sSQL = "SELECT OptionID, OptionText, AdditionalInformation FROM Options WHERE SurveyID = " . $lAnketID;
	$result = mysqli_query($connect,$sSQL);
	while($rs = mysqli_fetch_array($result))
	{
	
	?>
	<tr>
			<td class="smalltext" nowrap>
				<input type="radio" name="optSecenek" value="<?php echo $rs["OptionID"];?>">
				<?php if( $rs["AdditionalInformation"] <> "") { ?>
					<a href="javascript:open_window('additionalinfo.php?id=<?php echo $rs["OptionID"];?>&name=<?php echo urlencode($rs["OptionText"]); ?>')"><?php echo $rs["OptionText"]; ?></a>
				<?php } else { ?>
					<?php echo $rs["OptionText"]; ?>
				<?php } ?>
			</td>
		</tr>
	<?php
	}
	?>
		
	<tr>
		<td align=center><input type="button" name="cmdOyVer" value=" Vote " class="flatbutton" onclick="submitResults()">
		<br><a href="javascript:viewResults()"><span class="smalltext">View results</span></a>
		</td>
	</tr>
</table>
</form>
</body>
</html>