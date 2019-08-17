<?php include("header.php") ?>
<?php include("link.php") ?>
<?php 
$aa = 'à®°à®œà®¿à®©à®¿à®¯à®¿à®©à¯ à®ªà®¾à®°à®¾à®Ÿà¯à®Ÿà¯à®®à¯ à®•à®£à¯à®Ÿà®©à®®à¯à®®à¯'; 
	
	echo $aa;
?>

<head>
<!-- Njoroge Ndung'u -->
<meta name="google-site-verification" content="8j4yFrzIRaRe7cNUtebiaCNon0vo4hqKkgYfs-txzCs" />
<meta charset="UTF-8">
<meta http-equiv=Content-Type content=text/html; charset=utf-8 />
  <!-- header end -->
  <!-- body st -->
  <style>
.mdtopics
{
	text-decoration:none;
	color:black
	}
</style>

  <meta http-equiv="Content-Language" content="en-us">
	<link rel="StyleSheet" HREF="/poll/surveyadmin.css" type="text/css">
	<style>
<!--
.post {
margin: 0 16px 14px 29px;
padding: 0;
border-bottom: 3px solid #d8e7f7;
}

.newstab1
{
			float: left;
			display: inline;

}
img.third
{

		display: list-item;



}


    table.photorow { width:100%;margin:0 0 15px 0; }
-->

</style>

<script language=JavaScript>
 moz=document.getElementById&&!document.all
 mozHeightOffset=0

function picDiv()
{
	x=1;y="-2";
	if(!moz)
	{ y=0 }
	document.write('<div style="position:relative;left:'+x+'px;top:'+y+'px">')
}

function getRequest()
{
	http_request = false;
	if (window.XMLHttpRequest)
	{ // Mozilla, Safari,...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType)
			http_request.overrideMimeType('text/html');
	}
	else if (window.ActiveXObject)
	{
		try {	http_request = new ActiveXObject("Msxml2.XMLHTTP");	}
		catch (e) {	try {	   http_request = new ActiveXObject("Microsoft.XMLHTTP");	}
					catch (e) {}
		}
	}
	if (!http_request)
	{
	alert('Cannot create XMLHTTP instance');
	return false;
	}
	return http_request;
}

function getPage(url,mydiv,http_request)
{
	var mdiv;
	mozver = navigator.userAgent
	mozver = mozver.substring(mozver.lastIndexOf("/")+1).split(".")[0];

	if(moz && mozver == "3")
		http_request.mdiv = document.getElementById(mydiv);
	else
		mdiv = document.getElementById(mydiv);
	http_request.onreadystatechange = function ()
										{
	  										if (moz && mozver == "3" && http_request.readyState==4)
												this.mdiv.innerHTML = http_request.responseText;
											if((!moz  || (moz && mozver != "3" )) &&  http_request.readyState==4)
												mdiv.innerHTML = http_request.responseText;
										};
	http_request.open('GET', url, moz);
	http_request.send(null);
}

function viewResults()
{
	document.castForm.action="/poll/cast.php";
	document.castForm.opt.value="view";
	document.castForm.submit();
}

function submitResults()
{
	document.castForm.action="/poll/cast.php";
	optSecenek = 0;
	for(i=0;i<document.castForm.optSecenek.length;i++)
		if(document.castForm.optSecenek[i].checked)
			optSecenek = document.castForm.optSecenek[i].value;
	if(optSecenek == 0)
		alert("You should select an option");
	else
		document.castForm.submit();
}



 </script>

  </head>

  <tr>
    <td colspan="3" >
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >

        <tr><td width="25" valign="top" background="images/lborderbg.jpg"><img src="images/lbordertop.jpg" width="25" height="43"></td>
          <td valign="top" bgcolor="#ffffff" >
		  <table width="850" align="center" border="0" cellspacing="5" cellpadding="0">

		  <tr><td valign="top" >


<!-- ab_convert str -->



<table width="100%"   border="0" cellspacing="0" cellpadding="0">

   <!-- evinec box str vel include start -->
<?php include("database/conn.php"); ?>
<tr>
					<td colspan="2">
							<!-- TOP SECTION START -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr height="39">
		<td width="37">	<img src="http://rajinifans.com/images/box1.jpg" border="0" alt=""></td>
		<td width="550" height="39" background="http://rajinifans.com/images/boxtopbg.jpg" class="pageTile" align="left" >
		Superstar Rajinikanth Latest News</td>
		<td width="35"><img src="http://rajinifans.com/images/box2.jpg" width="35" height="39" border="0" alt=""></td>
	</tr>
	<tr>
	<td background="http://rajinifans.com/images/boxlhsbg.jpg" valign="top" width="37"><img src="http://rajinifans.com/images/boxlhs.jpg" width="37" height="100" border="0" alt=""></td>
	<TD width="550">
	<span class='yy_contentB'>

<?php
	error_reporting(E_ALL);
	$no = 0;
	$sql = "SELECT * FROM index_page ORDER BY ontop DESC,id DESC LIMIT 0 , 18 ";
	$result = mysqli_query($connect,$sql);


	// Fetch the results (Begin loop)
	$no = 1 + $no;
	$rs = mysqli_fetch_array($result);
	print_r($rs);die();
	$title1='';
	$articletitle1='';

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
     <style>
     a
     {
       text-decoration: none !important;
     }
     #im
     {
       border:2px solid #54C760;
     }

     .audio
     {
      text-decoration: none !important;
     }

     .moviereview1
      {
      text-decoration: none !important;
     }
     @font-face{
     	font-family:Bamini;
     	src: url(Bamini.TFF);
     }
</style>
<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px;font-family:Bamini;' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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

<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
</span>
	</td>
</tr>

<?php
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

<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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
<td valign='top'><table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table></td></tr>
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

<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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
<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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

<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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

<table width='330px' border='0' cellspacing='0' cellpadding='0'>
<tr><td><img src='images/cmaudio1.gif' width='12' ></td>
<td class='audio' colspan="2"><a class="audio" href='detailview.php?title=<?php echo $rs["id"] ?>' ><?php echo $title1 ?></a></td>
</tr>
<tr><td width='14'></td>
<td style='margin-top: 0; margin-left: 10px' width='300' align='center' valign='middle' height='200'>
 <?php if($rs["image"] !== "") { ?>
 <a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='news/admin/indeximages/<?php echo $rs["image"] ?>' width='300' height='200' border='0' alt=''> </a>
<?php } elseif($rs["link_url"] !== "") { ?>
	<a href='detailview.php?title=<?php echo $rs["id"] ?>' ><img id="im" src='<?php echo $rs["link_url"] ?>' width='300' height='200' border='0' alt=''></a>
<?php } ?></td>
 </tr>
 <tr><td colspan=2><p style="margin-top: 0; margin-left: 20px;font-size:13px;padding-bottom:5px;background:transparent;"><a  style="color:black !important;" href="detailview.php?title=<?php echo $rs["id"] ?>"><?php echo $articletitle1 ?></a></p></td></tr>
 </table>
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



<tr><td valign='top' align="left" colspan="2">



&nbsp;</td>



</tr>



<tr><td valign='top' align="left">



<table width="527" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="37">
                                        <img src="http://rajinifans.com/images/box1.jpg" border="0" alt="" width="37" height="39"></td>

                      <td width="466" height="39" background="http://rajinifans.com/images/boxtopbg.jpg" class="pageTile">
                      Rajinikanth Facebook Page </td>
										<td width="35"><img src="http://rajinifans.com/images/box2.jpg" width="35" height="39" border="0" alt=""></td>
									</tr>
									<tr>
										<td background="http://rajinifans.com/images/boxlhsbg.jpg" valign="top" width="37"><img src="http://rajinifans.com/images/boxlhs.jpg" width="37" height="100" border="0" alt=""></td>

                      <td  valign="top" class="content" width="466" >


	  















<div class="fb-page" data-href="https://www.facebook.com/fbrajinifans/" data-tabs="timeline" data-width="700" data-height="2000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/fbrajinifans/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/fbrajinifans/">Rajinifans.com</a></blockquote></div>




















<p>&nbsp;</p>
<p>&nbsp;</td>
										<td background="http://rajinifans.com/images/boxrhsbg.jpg" valign="bottom" width="35"><img src="http://rajinifans.com/images/boxrhs.jpg" width="35" height="113" border="0" alt=""></td>
									</tr>
									<tr>
										<td width="37"><img src="http://rajinifans.com/images/box4.jpg" width="37" height="39" border="0" alt=""></td>
										<td width="466">
										<img src="http://rajinifans.com/images/boxbot.jpg" width="100%" height="39" border="0" alt=""></td>
										<td width="35"><img src="http://rajinifans.com/images/box3.jpg" width="35" height="39" border="0" alt=""></td>
									</tr>
									</table>



</td>



	<td valign='top' align="left">



&nbsp;<table width='360' border='0' cellspacing='0' cellpadding='0'>
<tr><td width='14'><img src='images/pollcon1_c.jpg' width='14' height='14'></td>
<td background='images/polltopbg_c.jpg'></td>
<td width='12'><img src='images/pollcon2_c.jpg' width='12' height='14'></td>
</tr>
<tr>
<td background='images/polllhsbg_c.jpg'>&nbsp;</td>
<td bgcolor='E9EEF3'>
<table border='0' width='300'><tr><td><img src='images/pollbutton.jpg' width='14' height='14' border='0' alt=''></td>
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
<?php if($rs["article_url"] !== "") { ?>
<a href='<?php echo $rs["article_url"] ?>' class='yy_contentB'><?php echo $articletitle1 ?></a>
<?php } else { ?>
<a href='detailview.php?title=<?php echo $rs["id"] ?>' class='yy_contentB'><?php echo $articletitle1 ?></a>
<?php } ?>
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

<!-- weekly poll start -->
				<p>&nbsp;</p>
				<table align="right" width="360" height="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="14"><img src="images/pollcon1.jpg" width="14" height="14"></td>
                            <td background="images/polltopbg.jpg"></td>
                            <td width="12"><img src="images/pollcon2.jpg" width="12" height="14"></td>
                          </tr>
                          <tr>
                            <td background="images/polllhsbg.jpg">&nbsp;</td>
                            <td bgcolor="EDF2EA">
                              <table valign="top"  width="100%"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="12%"><img src="http://rajinifans.com/images/pollstar.jpg" width="25" height="24"></td>
                                  <td width="88%" class="hometitle">Weekly Poll</td>
                                </tr>
                                <tr>
                                  <td colspan="2" class='homecontent' width="100%">
                              <div name="PL1" id="PL1">Loading...</div>
								</td>
								</td>
                                </tr>
                                <tr><td></td></tr>
                                </table>
							</td>
                            <td background="images/pollrhsbg.jpg">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top"><img src="images/pollcon4.jpg" width="14" height="13"></td>
                            <td background="images/pollbtbg.jpg" height="13"></td>
                            <td><img src="images/pollcon3.jpg" width="12" height="13"></td>
                          </tr>
              </table>

			  <!-- weekly poll end -->
			  
			  
			  
			  
			  
			  
			<!-- photo of the day start -->  
			  
			  
			  
			  <p>&nbsp;</p>
				<table align="right" width="360" height="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="14"><img src="images/pollcon1.jpg" width="14" height="14"></td>
                            <td background="images/polltopbg.jpg"></td>
                            <td width="12"><img src="images/pollcon2.jpg" width="12" height="14"></td>
                          </tr>
                          <tr>
                            <td background="images/polllhsbg.jpg">&nbsp;</td>
                            <td bgcolor="EDF2EA">

                              <table valign="top"  width="100%"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="12%"><img src="http://rajinifans.com/images/pollstar.jpg" width="25" height="24"></td>
                                  <td width="88%" class="hometitle">Random Photos</td>
                                </tr>
                                <tr>
                                  <td colspan="2" class='homecontent' width="100%"></br>
                              <div name="IT3" id="IT3" align="center">Loading...</div>
								</td>
								</td>
                                </tr>
                                <tr><td></td></tr>
                                </table>
				
							</td>
                            <td background="images/pollrhsbg.jpg">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top"><img src="images/pollcon4.jpg" width="14" height="13"></td>
                            <td background="images/pollbtbg.jpg" height="13"></td>
                            <td><img src="images/pollcon3.jpg" width="12" height="13"></td>
                          </tr>
              </table>
			  
			  
			  <!-- photo of the day end -->
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  


<p>&nbsp;</td>



</tr>



<tr><td valign='top' align="left" colspan="2">



&nbsp;</td>



</tr>



<tr><td valign='top' align="left">
<BR></td>



<!-- 5th box end-->

<!-- 6th box str-->		<td valign="top" align="right" >
				&nbsp;</td><!-- 6th box end-->
</tr>
</table>


   </td>    <!-- evinec box end -->





	<!-- rhs str --><td rowspan="2" valign="top">
	<?php include("right-banner.php") ?>

	
</td> <!-- rhs end-->
  </tr>
  <tr>
   <!-- media report box str -->     <td valign="top">

&nbsp;</td>    <!-- media report box str -->
  </tr>
</table>
<!-- ab_convert end-->
		  </td>

          <td width="25" background="images/rborderbg.jpg"><img src="images/rborderbg.jpg" width="25" height="8"></td>
        </tr>
      </table></td>
  </tr>
  <!-- body end -->
   <!-- footer st -->
 <?php include("footer.php") ?>
<script>
getPage("/poll/vote.php","PL1",getRequest());
getPage("/tod/tod.php","IT2",getRequest());
getPage("/tod/pod.php","IT3",getRequest());
</script>