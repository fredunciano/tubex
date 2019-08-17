<?php 
include("conn.php");
include("html2txt.php");

$titleH = $_REQUEST["title"];
$lang = $_REQUEST["lang"];

$query = "SELECT * FROM index_page where id =". $titleH;
$result = mysqli_query($query);
$titleHeader = "";
while($rs = mysqli_fetch_array($result))
{
	$views = $rs["views"];
	$imag= $rs["image"];
	$outputImg = preg_replace('/\s+|&/', '-', $imag);
	if($lang == "")
		$lang = $rs["lang"];

	if($lang == 'T')
	{
		$articletitle = $rs["articletitle"];
		$shorttitle = $rs["shorttitle"];
		$content = $rs["description"];
	}
	else
	{
		$articletitle = $rs["articletitleeng"];
		if($articletitle == "" )
			$articletitle = $rs["articletitle"];
		$shorttitle = $rs["shorttitleeng"];
		if($shorttitle == "" )
			$shorttitle = $rs["shorttitle"];
		$content = $rs["descriptioneng"];
	}
}


$titleHeader= $articletitle ." - Rajinifans.com";
$content = html2text($content);
$content = str_replace("\n"," ",$content);
$content = str_replace("\r"," ",$content);
$pattern = '/\[.*\]/UsS';
$content = preg_replace($pattern, "", $content);
$len = strlen($content);
if($len > 600)
	$len = strpos($content," ",600);
$content = substr($content,0,$len) . " .... ";

$enddesc = "";
?>
<!-- Current page function -->
<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<!-- -->
<html>
<head>
<title><? echo $titleHeader ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="description" content="<? echo $shorttitle ?> : <? echo $content ?>, <? echo $enddesc  ?>">

<!-- Facebook open graph data-->
<meta property="og:title" content="<? echo $titleHeader ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo curPageURL();?>" />

<meta property="og:image" content="<? echo "http://www.rajinifans.com/news/admin/indeximages/".$outputImg; ?>" />
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:image" content="<? echo "http://www.rajinifans.com/news/admin/indeximages/".$outputImg; ?>" />
<meta property="og:description" content="<? echo $content; ?>" /> 
<meta property="og:site_name" content="Rajinifans.com" />
<!-- -->

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
</style><? include("header2.php") ?><? include("sublinks.php") ?>
<!-- header end -->
<!-- body st -->
<!-- body main table str -->
 <table width="100%" align="center" border="0" cellspacing="10" cellpadding="0" valign="top">
<TR>
<TD valign="top"><form name='artView' action='allarticleview.php'>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<TR><TD><? include("incdetailviewnxt.php") ?></TD>
				</TR>
				<tr><td align="center"><input type="submit" value="View All Articles" name="Submit" class="button1"><p>

					<table border="0" cellpadding="0" cellspacing="0" width="200">

 					<? include("banner-sub.php") ?>
	
					</table>



					</td></tr>
				</table>
				</form>
	</TD>

<td valign="top" width="650">
<? $title=$_REQUEST["title"]; ?>
<? include("incdetailview.php") ?>
</td>


</TR>
</TABLE>
<!-- body main table str -->
</td>

</table>
</td></tr></table>
<!-- <td width="25" background="images/rborderbg.jpg"><img src="images/rborderbg.jpg" width="25" height="8"></td> -->
<!--
</tr></table> -->

<? include("footer1.php")  ?>