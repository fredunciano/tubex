<? include("config.php"); ?>
<?	$no=0;
	$sql = "SELECT * FROM index_page ORDER BY id DESC LIMIT 0 , 14 ";
	$result = mysqli_query($connect,$sql);

	// Fetch the results (Begin loop)
	while ($rs= mysqli_fetch_array($result))
	{
	$no=1+$no;
	$title1= $rs["shorttitle"];
?>
<tr> <td valign='top' >
<img src='images/spacer.gif' width='320' height='1' border='0'><br><table width='100%' border='0' cellspacing='2' cellpadding='2'><tr>
<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'><tr>
<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1aa_b.jpg'></td>
<td width='136' rowspan='3' valign='top' background='images/yy_b_topbg.jpg' align='center' class='no_Rx'>
<img src='images/spacer.gif' width='136' height='15'><br>
<? if($rs["image"]!=="") { ?>
	<img src='News/admin/indeximages/<? echo $rs["image"]; ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"]!=="") { ?>
	<img src='<? echo $rs["link_url"]; ?>' width='122' height='81' border='0' alt=''>
<? } ?>
</td>
<td colspan='2' background='images/yy_b_topbg.jpg' class='no_Rx' valign='top' >
<img src='images/spacer.gif' width='136' height='10'><br>
<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'>
<span class='yy_head'><? echo $rs["shorttitle"] ?></span><br><img src='images/spacer.gif' width='136' height='5'><br><span class='yy_contentB'><? echo $rs["articletitle"] ?></span></td>
<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2aa_b.jpg' ></td>
</tr><tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>
<td colspan='2' valign='top' class='yy_contentB'></td>
<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>
<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td> </tr>
<tr>
<? if($rs["article_url"]!=="") { ?>
<td  height='20' class='yy_link'>» <a href='<? echo $rs["article_url"]; ?>' class='yy_link' >more</a></td>
<? } else {?>
<td  height='20' class='yy_link'>» <a href='detailView.asp?title=<? echo $rs["id"]; ?>'class='yy_link'>more</a></td>
<? } ?>


<td width=' height='20' valign='bottom' align='right'><img src='images/yy_flip.jpg' width='56' height='20'></td></tr>
<tr><td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>
<td colspan='3' align='right' background='images/yy_botbg.jpg'>
<img src='images/yy_botbit.jpg' width='56' height='3'></td><td><img src='images/yy4.jpg' width='3' height='3'></td>
</tr></table></td>
<?
$rs= mysqli_fetch_array($result);

?>

<td valign='top'>
<img src='images/spacer.gif' width='305' height='1' border='0'><br><table border='0' align='center' cellpadding='0' cellspacing='0' ><tr>
<td width='3' valign='top' background='images/yy_lhsbg.jpg'><img src='images/yy1aa.jpg' ></td>
<td width='136' rowspan='3' valign='top' background='images/yy_topbg.jpg' align='center' class='no_Rx'>
<img src='images/spacer.gif' height='15'><br>

<?if($rs["image"] !=="") {?>
	<img src='News/admin/indeximages/<? echo $rs["image"]; ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !=="") {?>
	<img src='<? echo $rs["link_url"]; ?>' width='122' height='81' border='0' alt=''>
<?}?>

</td>
<td colspan='2' background='images/yy_topbg.jpg' class='no_Rx' valign='top'>
<img src='images/spacer.gif' width='100' height='10'><br>
<img src='images/yy_but1.gif' width='14' height='13' border='0' alt='' align='absmiddle'>
<span class='yy_head'><? echo $rs["shorttitle"]; ?></span><br><img src='images/spacer.gif' width='100' height='5'><br><span class='yy_contentB'><? echo $rs["articletitle"]; ?></span></td>
<td width='3' valign='top' background='images/yy_rhsbg.jpg'><img src='images/yy2aa.jpg'></td>
</tr><tr> <td rowspan='2' background='images/yy_lhsbg.jpg'></td>
<td colspan='2' valign='top' class='yy_contentB'></td>
<td rowspan='2' valign='bottom' background='images/yy_rhsbg.jpg'>
<img src='images/yy_flip_rhs.jpg' width='3' height='20'></td></tr>
<tr>
<? if($rs["article_url"] !== "") { ?>
<td  height='20' class='yy_link'>» <a href='<? echo $rs["article_url"]; ?>' class='yy_link'>more</a></td>
<? } else { ?>
<td  height='20' class='yy_link'>» <a href='detailView.asp?title=<? echo $rs["id"]; ?>'class='yy_link'>more</a></td>
<? } ?>

<td width='' height='20' valign='bottom' align='right'>
<img src='images/yy_flip.jpg' width='56' height='20'></td></tr>
<tr> <td width='3' height='3'><img src='images/yy3.jpg' width='3' height='3'></td>
<td colspan='3' align='right' background='images/yy_botbg.jpg'>
<img src='images/yy_botbit.jpg' width='56' height='3'></td>
<td><img src='images/yy4.jpg' width='3' height='3'></td></tr></table></td></tr>
<?
$rs= mysqli_fetch_array($result);
?>


<tr>
	<td height="5">&nbsp;</td>
</tr>



<tr><td valign='top'> <table  border='0' cellspacing='0' cellpadding='0'  ><tr>
<td >
<table width='100%' border='0' cellspacing='0' cellpadding='0'  >
<tr><td><img src='Images/cmaudio1.jpg' width='12'  border='0' alt=''></td>
<td class='audio'><? echo $rs["shorttitle"] ?></td></tr>
<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='14' height='91'></td>
<td width='129' align='center' valign='middle' background='images/cmaudio1bg.jpg' width='122' height='81'>
<div align='right'>

<?if($rs["image"]!=="") { ?>
	<img src='News/admin/indeximages/<? echo $rs["image"]; ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !=="") { ?>
	<img src='<? echo $rs["link_url"]; ?>' width='122' height='81' border='0' alt=''>
<? } ?>

</div></td>
</tr><tr><td><img src='images/cmaudio1bt.jpg' width='14' height='13'></td>
<td width='132'><img src='images/cmaudio1btl.jpg' width='132' height='13'></td>
</tr></table>
</td><td width='122' valign='top'>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='2' class='homecontent'>&nbsp;</td>
</tr><tr><td height='90' class='more1' valign='top'>

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr><td>&nbsp;</td></tr>
<tr>
	<td height='90' valign='center' class=''><? echo $rs["articletitle"] ?></td>
</tr>
<tr>
<? if($rs["article_url"] !=="") { ?>
<td>» <a href='<? echo $rs["article_url"]; ?>' class='more' >more</a></td>
<? } else { ?>
<td>» <a href='detailView.asp?title=<? echo $rs["id"]; ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>

</td>
</tr></table></td></tr></table></td>

<?
$rs= mysqli_fetch_array($result);
?>

<td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/moviereview.jpg' width='12' ></td>
<td class='moviereview1'><? echo $rs["shorttitle"] ?></td>
<td  class='homecontent'>&nbsp;</td> </tr>
<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>
<td width='129' align='center' valign='middle' background='images/moviereviewbg.jpg' width='122' height='81'>
<div align='right'>
<? if($rs["image"]!=="") { ?>
	<img src='News/admin/indeximages/<? echo $rs["image"]; ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"]!=="") { ?>
	<img src='<? echo $rs["link_url"]; ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><? echo $rs["articletitle"] ?></p></td>
</tr>
<tr>
<? if($rs["article_url"] !=="") { ?>
<td>» <a href='<? echo $rs["article_url"]; ?>' class='more'>more</a></td>
<? } else { ?>
<td>» <a href='detailView.asp?title=<? echo $rs["id"]; ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>


</td></tr>
<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>
<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table></td></tr>



<tr>
	<td height="5">&nbsp;</td>
</tr>



<tr><td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td width='14'><img src='images/pollcon1_c.jpg' width='14' height='14'></td>
<td background='images/polltopbg_c.jpg'></td>
<td width='12'><img src='images/pollcon2_c.jpg' width='12' height='14'></td>
</tr>
<tr>
<td background='images/polllhsbg_c.jpg'>&nbsp;</td>
<td bgcolor='E9EEF3'>
<table border='0'><tr><td><img src='Images/pollbutton.jpg' width='14' height='14' border='0' alt=''></td>
<td class='moviereview1'>what's happening</td>
</tr>
<? $rs= mysqli_fetch_array($result);
?>
<tr><td align='center' valign="top"><img src='images/spacer.jpg' height='5'><br><img src='Images/arrow.jpg' width='8' height='7' border='0' alt=''></td>
<td valign="top" class='yy_contentB'>
<? if($rs["article_url"]!=="") { ?>
<a href='<? echo $rs["article_url"]; ?>' class='yy_contentB'><? echo $rs["articletitle"] ?></a>
<? } else { ?>
<a href='detailView.asp?title=<? echo $rs["id"]; ?>' class='yy_contentB'><? echo $rs["articletitle"] ?></a>
<? } ?>

</td></tr>


<tr>
	<td height='2'></td>
</tr>

<?
$rs= mysqli_fetch_array($result);
}
?>
</table></td><td background='images/pollrhsbg_c.jpg'>&nbsp;</td>
</tr><tr><td valign='top'><img src='images/pollcon4_c.jpg' width='14' height='13'></td>
<td background='images/pollbtbg_c.jpg' height='13'></td>
<td><img src='images/pollcon3_c.jpg' width='12' height='13'></td>
</tr></table></td>