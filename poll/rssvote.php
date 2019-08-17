<html>
<head>
<title>Superstar Rajinikanth E-Fans Association - Rajinifans.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="South Indian Superstar Rajinikanth. All related to his movies, wallpaper, photo gallery, video,etc">
<? include("../header2.php"); ?>
<? include("../sublinks.php"); ?>


<!-- feed start here -->
					  <meta http-equiv="Content-Language" content="en-us">
					  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="106%" id="AutoNumber1">
                        <tr>
                          <td width="100%">
                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
                            <tr>
                              <td width="100%">
                              <div style="text-align:center"></div></td>
                            </tr>
                          </table>
                          </td>
                        </tr>
</table>

<? include("_db.php"); ?>
<html>
<head>
	<link rel="StyleSheet" HREF="surveyadmin.css" type="text/css">
	<title>Survey</title>

	<script>
	function open_window(url)
	{
		mywin = window.open(url,"window",'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=250,height=250');
	}
	</script>
</head>
<body class=pollbg>
<?

/*	 Thanks to Tom Holder, who developed the IP restriction,
	 "additional information" extension and ported graphical
	 display for visitors.
	 Visit his site at http://www.ymonda.co.uk/ for more
	 ASP source code and products.
*/
	$lAnketID = $_REQUEST["ID"];
	if ($lAnketID == NULL )
	{
		$sSQL = "SELECT max(SurveyID) as ID FROM Surveys WHERE ACTIVE = TRUE";
		$result = mysql_query($sSQL);
		if(mysql_num_rows($result) == 0)
		{
			echo "Error : Survey not found<br>Survey ID:" . $lAnketID;
			exit();
		}
		while($rs = mysql_fetch_array($result))
		{
			$lAnketID = $rs["ID"];
		}
	}
	$sSQL = "SELECT SurveyID, SurveyName, SurveyQuestion FROM Surveys WHERE SurveyID = " . $lAnketID;
	$result = mysql_query($sSQL);
	if(mysql_num_rows($result) == 0)
	{
		echo "Error : Survey not found<br>Survey ID:" . $lAnketID;
		exit();
	}

	while($rs = mysql_fetch_array($result))
	{
		$sSurveyName = $rs["SurveyName"];
		$sSurveyQuestion = $rs["SurveyQuestion"];
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
	<?
	$sSQL = "SELECT OptionID, OptionText, AdditionalInformation FROM Options WHERE SurveyID = " . $lAnketID;
	$result = mysql_query($sSQL);
	while($rs = mysql_fetch_array($result))
	{
	?>
		<tr>
			<td class="smalltext" nowrap>
				<input type="radio" name="optSecenek" value="<? echo $rs["OptionID"];?>">
				<?if( $rs["AdditionalInformation"] <> "") { ?>
					<a href="javascript:open_window('additionalinfo.php?id=<? echo $rs["OptionID"];?>&name=<? echo urlencode($rs["OptionText"]); ?>')"><? echo $rs["OptionText"]; ?></a>
				<? } else { ?>
					<? echo $rs["OptionText"]; ?>
				<?}?>
			</td>
		</tr>
	<?
	}
	?>
	<tr>
		<td align=center><input type="button" name="cmdOyVer" value=" Vote " class="flatbutton" onclick="submitResults()">
		<br><a href="javascript:viewResults()"><span class="smalltext">View results</span></a>
		</td>
	</tr>
</table>
</form>


</td>

                      </tr>

                    </table>

                  </div></td>



              </tr>
            </table>
			</td>
  <? include("../footer1.php"); ?>