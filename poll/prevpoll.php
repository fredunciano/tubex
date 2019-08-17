<? include("../database/conn.php"); ?>
<html>
<head>
<title>Weekly Poll - Rajinifans.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="Weekly Poll on South Indian Tamil Superstar Rajinikanth is conducted. Join and share your feedback with us!">
<? include("../header2.php"); ?>
<? include("../sublinks.php"); ?>
<? include("../left_banner.php"); ?>
<td width="488" valign="top">
<!-- vote results start here -->
<STYLE TYPE="text/css" MEDIA="screen, projection">
<!--
  @import url(surveyadmin.css);
 -->
</STYLE>

<table><tr>
<td><br><span class='header1'>Previous Polls:</span>
<p>
<?
	$sSQL = "SELECT SurveyID, SurveyQuestion From Surveys Order By SurveyID Desc";
	$result = mysql_query($sSQL);
	if(mysql_num_rows($result) == 0)
	{
		echo "Error : No other Surveys found.";
		exit();
	}
	while($rs = mysql_fetch_array($result))
	{
		$sSurveyQuestion = $rs["SurveyQuestion"];
		$sSurveyID = $rs["SurveyID"];
?>
	<a href="javascript:viewResult('<? echo $sSurveyID; ?>')"><font color='#0000ff' size=2><? echo $sSurveyQuestion; ?></font></a><br>
<?
	}
?>
</td></tr>
</table>
<form name=viewForm action='cast.php' method=get>
<input type=hidden name=opt value='view'>
<input type=hidden name=ID>
</form>
<script language=JavaScript>
<!--
function viewResult(sid)
{
	document.viewForm.ID.value = sid;
	document.viewForm.submit();
}
//-->
</script>
  <!-- body end -->
   <!-- footer st -->
</td>
                      </tr>

                    </table>
                  </div></td>




              </tr>
            </table>
			</td>
<? include("../footer1.php"); ?>
