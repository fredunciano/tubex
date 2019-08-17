<? include("conn.php") ?>
<tr>
					<td colspan="3">
					<!-- TOP SECTION START -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr height="39">
		<td width="37">	<img src="http://rajinifans.com/images/box1.jpg" border="0" alt=""></td>
		<td width="550" height="39" background="http://rajinifans.com/images/boxtopbg.jpg" class="pageTile" align="left" >Latest News</td>
		<td width="35"><img src="http://rajinifans.com/images/box2.jpg" width="35" height="39" border="0" alt=""></td>
	</tr>
	<tr>
	<td background="http://rajinifans.com/images/boxlhsbg.jpg" valign="top" width="37"><img src="http://rajinifans.com/images/boxlhs.jpg" width="37" height="100" border="0" alt=""></td>
	<TD width="550">
	<span class='yy_contentB'>

<?	$no = 0;
	$sql = "SELECT * FROM index_page ORDER BY ontop DESC,id DESC LIMIT 0 , 18 ";
	$result = mysqli_query($sql);


	// Fetch the results (Begin loop)
	$no = 1 + $no;
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>
<table width='100%' border='0' cellspacing='10' cellpadding='0'>
<!-- INNER TOP START -->
<tr>
<td valign='top'>
	<span class='yy_contentB'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/cmaudio1bg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>


</td></tr>
<tr><td><img src='images/cmaudio1bt.jpg' width='15' height='13'></td>
<td width='132'><img src='images/cmaudio1btl.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td>
<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>
<td valign='top'>
	<span class='yy_contentB'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/cmaudio1bg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>


</td></tr>
<tr><td><img src='images/cmaudio1bt.jpg' width='15' height='13'></td>
<td width='132'><img src='images/cmaudio1btl.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td>
</tr>

<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}

?>
<!-- INNER TOP SECOND ROW -->

<tr><td valign='top'>
	<span class='yy_contentB'>

	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/moviereview.gif' width='12' ></td>
<td class='moviereview1' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/moviereviewbg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>
</td></tr>
<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>
<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td>
<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}

?>
<td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/moviereview.gif' width='12' ></td>
<td class='moviereview1' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/moviereviewbg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>
</td></tr>
<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>
<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table></td></tr>
<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>
<!-- INNER TOP 3RD ROW -->
<tr>
<td valign='top'>
	<span class='yy_contentB'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/cmaudio1bg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>


</td></tr>
<tr><td><img src='images/cmaudio1bt.jpg' width='15' height='13'></td>
<td width='132'><img src='images/cmaudio1btl.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td>
<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>
<td valign='top'>
	<span class='yy_contentB'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/cmaudio1lhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/cmaudio1bg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>


</td></tr>
<tr><td><img src='images/cmaudio1bt.jpg' width='15' height='13'></td>
<td width='132'><img src='images/cmaudio1btl.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td></tr>

<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>
<!-- INNER TOP 4TH ROW -->

<tr><td valign='top'>
	<span class='yy_contentB'>

	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/moviereview.gif' width='12' ></td>
<td class='moviereview1' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/moviereviewbg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>
</td></tr>
<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>
<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td>
<?
	$rs = mysqli_fetch_array($result);
	if($rs["lang"] == 'T')
	{
		$title1= $rs["shorttitle"];
		$articletitle1 = $rs["articletitle"];
	}
	else
	{
		$title1= $rs["shorttitleeng"];
		$articletitle1 = $rs["articletitleeng"];
	}
?>

<td valign='top'>
	<span class='yy_contentB'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/moviereview.gif' width='12' ></td>
<td class='moviereview1' colspan="2"><?echo $title1 ?></td>
</tr>
<tr><td width='14'><img src='images/moviereviewlhs.jpg' width='15' height='91'></td>
<td width='134' align='center' valign='middle' background='images/moviereviewbg.jpg' height='91'>
<script>picDiv();</script><? if($rs["image"] !== "") { ?>
	<img src='news/admin/indeximages/<? echo $rs["image"] ?>' width='122' height='81' border='0' alt=''>
<? } elseif($rs["link_url"] !== "") { ?>
	<img src='<? echo $rs["link_url"] ?>' width='122' height='81' border='0' alt=''>
<? } ?></div></td>
<td height='86' valign='top' class='homecontent' >

<table width='100%' border='0' cellspacing='0' cellpadding='0' class='yy_contentB' >
<tr>
	<td height='80' valign='top'><p style='margin-top: 0; margin-bottom: 0'><?echo $articletitle1 ?></p></td>
</tr>
<tr>
<? if($rs["article_url"]!== "") { ?>
<td>&#187; <a href='<? echo $rs["article_url"] ?>' class='more'>more</a></td>
<? } else  { ?>
<td>&#187; <a href='detailview.php?title=<? echo $rs["id"] ?>' class='more'>more</a></td>
<? } ?>
</tr>
</table>
</td></tr>
<tr><td><img src='images/moviereviewcon.jpg' width='15' height='13'></td>
<td width='132'><img src='images/moviereviewbt.jpg' width='134' height='13'></td>
<td class='more' align='right'></td>
</tr></table>
</span>
	</td></tr>
<!-- INNER TOP END -->
</table>
</span>
	</TD>
	<td background="http://rajinifans.com/images/boxrhsbg.jpg" valign="bottom" width="35"><img src="http://rajinifans.com/images/boxrhs.jpg" width="35" height="113" border="0" alt=""></td>
	</td>
	</tr>
	<tr>
		<td width="37" align="right" valign="top"><img src="http://rajinifans.com/images/box4.jpg" width="37" height="39" border="0" alt=""></td>
		<td width="550" background="http://rajinifans.com/images/boxbot.jpg"  align="right"><img src="http://rajinifans.com/images/boxbot.jpg" width="466" height="39" border="0" alt=""></td>
		<td width="35" align="top" valign="top"><img src="http://rajinifans.com/images/box3.jpg" width="35" height="39" border="0" alt=""></td>
	</tr>
</table>
<!-- TOP SECTION END -->
<BR></td></tr>



<tr><td valign='top' align="left"><table width='320' border='0' cellspacing='0' cellpadding='0'>
<tr><td width='14'><img src='images/pollcon1_c.jpg' width='14' height='14'></td>
<td background='images/polltopbg_c.jpg'></td>
<td width='12'><img src='images/pollcon2_c.jpg' width='12' height='14'></td>
</tr>
<tr>
<td background='images/polllhsbg_c.jpg'>&nbsp;</td>
<td bgcolor='E9EEF3'>
<table border='0' width='270'><tr><td><img src='images/pollbutton.jpg' width='14' height='14' border='0' alt=''></td>
<td class='moviereview1'>What's happening?</td>
</tr>
<?
while($rs = mysqli_fetch_array($result))
{
	if($rs["lang"] == 'T')
		$articletitle1 = $rs["articletitle"];
	else
		$articletitle1 = $rs["articletitleeng"];
?>
<tr><td align='center' valign="top"><img src='images/spacer.gif' height='5'><br><img src='images/arrow.jpg' width='8' height='7' border='0' alt=''></td>
<td valign="top" class='yy_contentB'>
<? if($rs["article_url"] !== "") { ?>
<a href='<? echo $rs["article_url"] ?>' class='yy_contentB'><? echo $articletitle1 ?></a>
<? } else { ?>
<a href='detailview.php?title=<? echo $rs["id"] ?>' class='yy_contentB'><? echo $articletitle1 ?></a>
<? } ?>
</td></tr>
<tr>
	<td height='2'></td>
</tr>
<?
}
?>
<tr><td colspan=2 align=center><input type="button" value=" View All Articles " class="flatbutton" onclick="location.href='http://rajinifans.com/allarticleview.php?Submit=View+All+Articles'"></td></tr>
</table></td><td background='images/pollrhsbg_c.jpg'>&nbsp;</td>
</tr><tr><td valign='top'><img src='images/pollcon4_c.jpg' width='14' height='13'></td>
<td background='images/pollbtbg_c.jpg' height='13'></td>
<td><img src='images/pollcon3_c.jpg' width='12' height='13'></td>
</tr></table>
<BR></td>

