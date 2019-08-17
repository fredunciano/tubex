<? include('html2txt.php');
  include('conn.php');
  $pagedetails="http://www.rajinifans.com/news/admin/indeximages/";
  $width=200;
  $height=150;
  $left="left";
  $right="right";
  $rssXML = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\">\n<channel>\n"
  			."<title>Rajinifans News</title>\n<description>"
  			."This is a live feed of news from Rajinifans.com</description>\n"
  			."<link>http://www.rajinifans.com</link>\n"
  			."<language>en</language>\n<docs>http://backend.userland.com/rss</docs>\n";

  $sql = "SELECT id, shorttitle, shorttitleeng, articletitle, articletitleeng, description, image, descriptioneng, lang, "
  	."DATE_FORMAT(pdate,'%a, %d %b %Y %H:%i:%s -0200') as pdate, article_url from index_page order by id desc LIMIT 0, 15";

  $result = mysqli_query($sql);
  while ($row = mysqli_fetch_array($result))
  {
	if($row['lang'] == 'T')
	{
		$imag= $row["image"];
		$outputImg = preg_replace('/\s+|&/', '-', $imag);
		$content = $row['description'];
		$articletitle = $row['articletitle'];
		$shorttitle = $row['shorttitle'];
	}
	else
	{
		$imag= $row["image"];
		$outputImg = preg_replace('/\s+|&/', '-', $imag);
		$content = $row['descriptioneng'];
		$articletitle = $row['articletitleeng'];
		$shorttitle = $row['shorttitleeng'];
	}
	$content = html2text($content);
	$content = str_replace("\n"," ",$content);
	$content = str_replace("\r"," ",$content);
	$pattern = '/\[.*\]/UsS';
	$content = preg_replace($pattern, "", $content);
	$len = strlen($content);
	if($len > 200)
			$len = strpos($content," ", 200);
	$content = substr($content,0,$len) . " .... ";

	$articletitle = str_replace("&#39;","'",$articletitle);
	$shorttitle = str_replace("&#39;","'",$shorttitle);

	
	  $rssXML .= "<item>\n<title><![CDATA[".$shorttitle."]]></title>\n";
		

	  if($row['article_url'] != "")
		$rssXML .= "<link>".$row['article_url']."</link>\n";
	  else
		$rssXML .= "<link>http://www.rajinifans.com/detailview.php?title="
	  				.$row['id']."</link>\n";
	  	$rssXML .= "<guid isPermaLink=\"false\">".$row['id']
	  				."@http://www.rajinifans.com</guid>\n<description>
	  				<![CDATA[ <p><b><i>"
	  				.$articletitle."</i></b></p>
	  				<a href='http://www.rajinifans.com/detailview.php?title="
	  				.$row['id']."'>
	  				<img src=".$pagedetails.$outputImg." width=".$width." height=".$height." align=".$left."></a> 
	  				<p>
	  				".$content." <a href='http://www.rajinifans.com/detailview.php?title="
	  				.$row['id']."'>more... &#187;</a> </p> ]]> </description>\n"
	  				."<pubDate>".$row['pdate']."</pubDate>\n"
					."</item>\n";
					
  }
  $rssXML .= "</channel>\n</rss>\n";

  header("Content-Type: application/xml; charset=utf-8");
  echo $rssXML;
?>
