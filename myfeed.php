<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<style>
.rss_box  { font-size:10pt; font-family:arial}

.rss_items
{
  margin-top:0;
  margin-left:20;
  list-style-type:circle;
  padding-left: 0;
}

.rss_item
{
  margin-top:0;
  margin-left:0;
  list-style-type:circle;
  padding-left: 0;
}
</style>
</head>

<body  marginwidth=0 marginheight=0  background="http://www.rajinifans.com/images/ty_bg.jpg">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber1" >
   <tr valign=top>
     <td width="60%" valign="top" background="http://www.rajinifans.com/images/ty_bg.jpg">
     <p style="margin-top: 0; margin-bottom: 0"><b>
     <!-- <img src="http://www.rajinifans.com/images/tick_ty.jpg" align="absmidle"> -->
     <font size="4" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp; </font>
     <font face="Verdana">Superstar Media News</font></td>
     <td width="40%" rowspan="2" background="http://www.rajinifans.com/images/ty_bg.jpg" valign=top>
     <img src="http://www.rajinifans.com/images/media3.jpg"></td>
   </tr>
   <tr>
    <td valign="top" class="content" nowrap width="313" background="http://www.rajinifans.com/images/ty_bg.jpg"><p>
<?php
include("htmlparser.inc");

$weburl = "http://tamilxprez.blogspot.com/atom.xml";

$parser = HtmlParser_ForURL($weburl);

echo "<ul style='rss_items'>";

while ($parser->parse())
  {
		if($parser->iNodeName == "entry"  && $parser->iNodeType == NODE_TYPE_ELEMENT)
		{
			//skip 14 tags
			$parser->parse();$parser->parse();$parser->parse();$parser->parse();
			$parser->parse();$parser->parse();$parser->parse();$parser->parse();
			$parser->parse();$parser->parse();$parser->parse();$parser->parse();
			$parser->parse();$parser->parse();
			$linktxt = $parser->outputNode();
			//skip 5 tags
			$parser->parse();$parser->parse();$parser->parse();$parser->parse();
			$parser->parse();
			$url = $parser->iNodeAttributes["href"];
			echo "<li style=rss_item><a href='/showurl.php?url=" . $url
			. "' target='_top'><span style='font-size:8pt;font-family:arial,verdana,sans serif;font-weight:bold;'>"
			. $linktxt  . "</span></a></li>";
		}
	}
echo "</ul>"

?>
    </td>
   </tr>
 </table>

</body>
</html>