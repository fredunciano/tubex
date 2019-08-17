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

	$no=0;
	$query = "SELECT * FROM index_page ORDER BY id DESC LIMIT 0 , 10 " ;
	$result = mysql_query($query);
	$num_record = mysql_num_rows($result);
      if (!($num_record < 1))  {
	// Fetch the results (Begin loop)
    while($rs = mysql_fetch_array($result)) {
	$no+=1;
	$title1= $rs["shorttitle"];
	//echo $no;



if($no==1){
$strTemp = CropSentence(addslashes($rs["description"]), 100, "...");
?>
<SCRIPT>
<!--
document.write("<tr> <td valign='top' width='100%'>");
document.write("<table width='100%' border='0' cellspacing='2' cellpadding='2'><tr>");
document.write("<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'><tr>");
document.write("<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1_b.jpg' width='3' height='26'></td>");
document.write("<td width='136' rowspan='3' valign='top' background='images/yy_b_topbg.jpg' align='center' class='no_Rx'>");
document.write("<img src='images/spacer.gif' width='136' height='15'><br>");
document.write("<img src='admin/indeximages/<?=$rs["image"]?>' width='122' height='81' border='0' alt=''></td>");
document.write("<td colspan='2' background='images/yy_b_topbg.jpg' class='no_Rx' valign='top' class='yy_head'>");
document.write("<img src='images/spacer.gif' width='136' height='10'><br>");
document.write("<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'> ");
document.write("<span class='yy_head'>"+"<?=$rs["shorttitle"]?>"+"</span></td> ");
document.write("<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2_b.jpg' width='3' height='26'></td>");
document.write("</tr><tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>");
document.write("<td colspan='2' valign='top' class='yy_contentB'>"+"<?=$strTemp?>"+ "</td>");
document.write("<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>");
document.write("<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td> </tr>");
document.write("<tr><td  height='20' class='yy_link'>» <a href='detailView.asp?title=<?=$rs["id"]?>'class='yy_link'>more</a></td>");
document.write("<td width=' height='20' valign='bottom' align='right'><img src='images/yy_flip.jpg' width='56' height='20'></td></tr>");
document.write("<tr><td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>");
document.write("<td colspan='3' align='right' background='images/yy_botbg.jpg'>");
document.write("<img src='images/yy_botbit.jpg' width='56' height='3'></td><td><img src='images/yy4.jpg' width='3' height='3'></td>");
document.write("</tr></table></td>");
//-->
</SCRIPT>
<?}if ($no=='2'){
	$strTemp = CropSentence(addslashes($rs["description"]), 100, "...");?>
<SCRIPT>
<!--
document.write("<td width='50%' valign='top'>");
document.write("<table width='' border='0' align='center' cellpadding='0' cellspacing='0' ><tr>");
document.write("<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1.jpg' width='3' height='26'></td>");
document.write("<td width='136' rowspan='3' valign='top' background='images/yy_topbg.jpg' align='center' class='no_Rx'>");
document.write("<img src='images/spacer.gif' width='136' height='15'><br>");
document.write("<img src='admin/indeximages/<?=$rs["image"]?>' width='122' height='81' border='0' alt=''></td>");
document.write("<td colspan='2' background='images/yy_topbg.jpg' class='no_Rx' valign='top' class='yy_head'>");
document.write("<img src='images/spacer.gif' width='136' height='10'><br>");
document.write("<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'> ");
document.write("<span class='yy_head'>"+"<?=$rs["shorttitle"]?>"+"</span></td>");
document.write("<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2.jpg' width='3' height='26'></td>");
document.write("</tr><tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>");
document.write("<td colspan='2' valign='top' class='yy_contentB'>"+"<?=$strTemp;?>"+ "</td>");
document.write("<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>");
document.write("<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td></tr>");
document.write("<tr><td  height='20' class='yy_link'>» <a href='detailView.asp?title=<?=$rs["id"]?>' class='yy_link'>more</a></td>");
document.write("<td width='' height='20' valign='bottom' align='right'>");
document.write("<img src='images/yy_flip.jpg' width='56' height='20'></td></tr>");
document.write("<tr> <td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>");
document.write("<td colspan='3' align='right' background='images/yy_botbg.jpg'>");
document.write("<img src='images/yy_botbit.jpg' width='56' height='3'></td>");
document.write("<td><img src='images/yy4.jpg' width='3' height='3'></td></tr></table></td></tr>");
//-->
</SCRIPT>
<?}if ($no=='3'){
	$strTemp = CropSentence(addslashes($rs["description"]), 100, "...");?>

<SCRIPT>
<!--
document.write("<tr><td valign='top'> <table  border='0' cellspacing='0' cellpadding='0'  ><tr>");
document.write("<td width='146'>");
document.write("<table width='100%' border='0' cellspacing='0' cellpadding='0'  ><tr>");
document.write("<td><img src='Images/cmaudio1.jpg' width='12'  border='0' alt=''></td>");
document.write("<td class='audio'>"+"<?=$rs["shorttitle"]?>"+"</td></tr>");
document.write("<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='14' height='91'></td>");
document.write("<td width='129' align='center' valign='middle' background='images/cmaudio1bg.jpg' width='122' height='81'>");
document.write("<div align='right'><img src='admin/indeximages/<?=$rs["image"]?>' width='122' height='81'></div></td>");
document.write("</tr><tr><td><img src='images/cmaudio1bt.jpg' width='14' height='13'></td>");
document.write("<td width='132'><img src='images/cmaudio1btl.jpg' width='132' height='13'></td>");
document.write("</tr></table>");
document.write("</td><td width='122' valign='top'> ");
document.write("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
document.write("<tr><td height='2' class='homecontent'>&nbsp;</td>");
document.write("</tr><tr><td height='90' class='more1' >");
document.write("<p style='margin-top: 0; margin-bottom: 0'>"+"<?=$strTemp;?>"+ "</p>");
document.write("<p align='right' style='margin-top: 0; margin-bottom: 0'><a href='detailView.asp?title=<?=$rs["id"]?>' class='more'>» more</a></td>");
document.write("</tr></table></td></tr></table></td> ");
//-->
</SCRIPT>
<?}if ($no=='4'){
	$strTemp = CropSentence(addslashes($rs["description"]), 100, "...");?>
<SCRIPT>
<!--
document.write("<td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>");
document.write("<tr><td><img src='images/moviereview.jpg' width='12' ></td>");
document.write("<td class='moviereview1'>"+"<?=$rs["shorttitle"]?>"+"</td>");
document.write("<td  class='homecontent'>&nbsp;</td> </tr>");
document.write("<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>");
document.write("<td width='129' align='center' valign='middle' background='images/moviereviewbg.jpg' width='122' height='81'>");
document.write("<div align='right'><img src='admin/indeximages/<?=$rs["image"]?>' width='122' height='81'></div></td>");
document.write("<td height='86' valign='top' class='homecontent' >");
document.write("<p style='margin-top: 0; margin-bottom: 0'>");
document.write("<font face='Verdana' size='1'>"+"<?=$strTemp;?>"+ "</font></p>");
document.write("</td></tr>");
document.write("<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>");
document.write("<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>");
document.write("<td class='more' align='right' height='19'><a href='detailView.asp?title=<?=$rs["id"]?>' class='more'>» more</a></td>");
document.write("</tr></table></td></tr>");

document.write("<tr><td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>");
document.write("<tr><td width='14'><img src='images/pollcon1_c.jpg' width='14' height='14'></td>");
document.write("<td background='images/polltopbg_c.jpg'></td>");
document.write("<td width='12'><img src='images/pollcon2_c.jpg' width='12' height='14'></td>");
document.write("</tr>");
document.write("<tr>");
document.write("<td background='images/polllhsbg_c.jpg'>&nbsp;</td>");
document.write("<td bgcolor='E9EEF3'>");
document.write("<table border='0'><tr><td><img src='Images/pollbutton.jpg' width='14' height='14' border='0' alt=''></td>");
document.write("<td class='moviereview1'>what's happening</td>");
document.write("</tr>");
//-->
</SCRIPT>
<?}if ($no>4){
	?>
<SCRIPT>
<!--
document.write("<tr><td align='center'><img src='Images/arrow.jpg' width='8' height='7' border='0' alt=''></td>");
document.write("<td  class='yy_contentB'><a href='detailView.asp?title=<?=$rs["id"]?>'>"+"<?=$rs["shorttitle"]?>"+""+ "</a></td></tr>");
//-->
</SCRIPT>
<?}?>
<?}}?>
<SCRIPT>
<!--
document.write("</table></td><td background='images/pollrhsbg_c.jpg'>&nbsp;</td>");
document.write("</tr><tr><td valign='top'><img src='images/pollcon4_c.jpg' width='14' height='13'></td>");
document.write("<td background='images/pollbtbg_c.jpg' height='13'></td>");
document.write("<td><img src='images/pollcon3_c.jpg' width='12' height='13'></td>");
document.write("</tr></table></td>");
//-->
</SCRIPT>