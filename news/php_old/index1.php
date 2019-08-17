<link href="css/common.css" rel="stylesheet" type="text/css">
<script language="javascript"  type="text/javascript">
<!--
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',resizable'
win = window.open(mypage,myname,settings)
}
-->
</script>
<?include("admin/config.php");
 function CropSentence ($strText, $intLength, $strTrail) 
{
    $wsCount = 0;
    $intTempSize = 0;
    $intTotalLen = 0;
    $intLength = $intLength - strlen($strTrail);
    $strTemp = "";

    if (strlen($strText) > $intLength) {
        $arrTemp = explode(" ", $strText);
        foreach ($arrTemp as $x) {
            if (strlen($strTemp) <= $intLength) $strTemp .= " " . $x;
        }
        $CropSentence = $strTemp . $strTrail;
    } else {
        $CropSentence = $strText;
    }

    return $CropSentence;
}
?><table cellpadding="0" cellspacing="0" border="1" width="100%" class="contentB" align="center">
<tr>
	

	<td valign="top">

	
<?
	$query = "SELECT * FROM index_page ORDER BY id DESC LIMIT 0 , 5 " ;
    $result = mysql_query($query);
	
		$num_record = mysql_num_rows($result);
 if (!($num_record < 1))  {
	// Fetch the results (Begin loop)
    while($rs = mysql_fetch_array($result)) {
	$no+=1;
?>
		<tr>
			<td colspan="2"><table cellpadding="4" cellspacing="0" border="0" width="100%" class="contentB" >
				
					<tr><td class="topicB" align="center"><?=$rs["title"]?></td></tr> 
					
					<tr><td valign="top"><?if($rs["image"]!=""){?>
						<table cellpadding="4" cellspacing="0" border="1" width="95%" class="contentB" align="center"><tr><td width="170" align="center"><img src="admin/indeximages/<?=$rs["image"]?>" width="150" height="80" border=0 alt=""></td>
						<td  class="contentB"><?//=$rs["description"];	
					$strTemp = CropSentence($rs["description"], 170, "..."); 
					print $strTemp;									
					?><br><div align="left"><a  href="detailview.php?tit=<?=$rs["id"]?>" onclick="NewWindow(this.href,'name','400','400','yes');return false"  class="link">More</a></div></td>
					</tr></table><?}else{?><table cellpadding="4" cellspacing="0" border="0" width="95%" class="contentB" align="center"><tr><td  class="contentB"<?//=$rs["description"];
					$strTemp = CropSentence($rs["description"], 170, "..."); 
					print $strTemp;
					?>
					<br><div align="right"><a href="detailview.php?tit=<?=$rs["id"]?>"  onclick="NewWindow(this.href,'name','400','400','yes');return false" class="link">More</a></div><?}?></td></tr>
			</table>
			<hr size="1" width="95%" noshade>
			</td>
		</tr>

<?}}?>
