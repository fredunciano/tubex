<table width="95%" border="0" align="center" valign="top" cellpadding="0" cellspacing="10">
			<tr>
			   <td>

			   <!-- most discussed topics end -->
			   </td>
			</tr>
			<tr>
				<td>

				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>

				</tr>
				<tr><td>
				<!-- photo of the day start -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tr>
<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1aa.jpg'></td>
<td colspan='2' background='images/yy_topbg.jpg' class='no_Rx' valign='top' >
<img src='images/spacer.gif' width='136' height='10'><br>
<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'>
<span class='hometitle'>Punch Dialogues</span><br><img src='images/spacer.gif' width='136' height='5'><br>
<span class='yy_contentB'>&nbsp;
    <div name="IT2" id="IT2" align="center">Loading...</div>&nbsp;
</span></td>
<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2aa.jpg' ></td></tr>
<tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>
<td colspan='2' valign='top' class='yy_contentB'></td>
<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>
<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td> </tr>
<tr>
<td height='20' class='yy_link'></td>
<td height='20' valign='bottom' align='right'><img src='images/yy_flip.jpg' width='56' height='20'></td></tr>
<tr><td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>
<td colspan='2' align='right' background='images/yy_botbg.jpg'>
<img src='images/yy_botbit.jpg' width='56' height='3'></td><td><img src='images/yy4.jpg' width='3' height='3'></td>
</tr>
</table>
				</tr>
				</table>
				<!-- photo of the day end -->

				</td>
			</tr>
			<tr>
				<td>
							   <!-- most discussed topics start -->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tr>
<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1aa_b.jpg'></td>
<td colspan='2' background='images/yy_b_topbg.jpg' class='no_Rx' valign='top' >
<img src='images/spacer.gif' width='136' height='10'><br>
<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'>
<span class='hometitle'>Most Discussed</span><br><img src='images/spacer.gif' width='136' height='5'><br>
<span class='yy_contentB'>
<style>
.mdtopics
{
	text-decoration:none;
	color:black
	}
</style>
<ul style="list-style-image:url('/images/arrow.jpg');margin-left: 10; padding-left: 10;">
<?php
$msql = "SELECT count( NewsId ) AS comcnt, p.ID, p.shorttitleeng,p.articletitle, p.articletitleeng, p.lang FROM index_comments c, index_page p "
		."WHERE c.NewsID = p.ID AND p.pdate > date_sub( now( ) , INTERVAL +60 DAY ) and c.Approved = 'Y' GROUP BY NewsId "
		."ORDER BY comcnt DESC , ID DESC LIMIT 0 , 5";

$mresult = mysqli_query($connect,$msql);
while($mrs = mysqli_fetch_array($mresult))
{
	if($mrs["lang"] == 'T')
		$articletitle = $mrs["articletitle"];
	else
		$articletitle = $mrs["articletitleeng"];
	echo "<li><a href='detailview.php?title=".$mrs["ID"]."' class='mdtopics'>".$articletitle."</a></li>";
}
?>
</ul>
</span></td>
<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2aa_b.jpg' ></td></tr>
<tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>
<td colspan='2' valign='top' class='yy_contentB'></td>
<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>
<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td> </tr>
<tr>
<td height='20' class='yy_link'></td>
<td height='20' valign='bottom' align='right'><img src='images/yy_flip.jpg' width='56' height='20'></td></tr>
<tr><td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>
<td colspan='2' align='right' background='images/yy_botbg.jpg'>
<img src='images/yy_botbit.jpg' width='56' height='3'></td><td><img src='images/yy4.jpg' width='3' height='3'></td>
</tr>
</table>

			   <!-- most discussed topics end -->				</td>
			</tr>
			<tr>
			<td>
			<!-- Join Us Start -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">

	   <!-- most discussed topics end -->	   


 <? include("banner-sub.php") ?>




	

<tr>
<td height="10">
<p></p>
<p></td>
</tr>
</table>
<!-- Join Us End -->
			</td>
			</table>