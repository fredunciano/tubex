<? include("../database/conn.php"); ?>
<?
		$sSQL = "SELECT SurveyID, SurveyName, SurveyQuestion FROM Surveys order by SurveyID desc LIMIT 0, 15";
		$result = mysql_query($sSQL );

		$rssXML = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n<rss version=\"2.0\">\n<channel>\n"
  			."<title>Rajinifans Polls</title>\n<description>"
  			."This is a live feed of polls from Rajinifans.com</description>\n"
  			."<link>http://www.rajinifans.com</link>\n"
  			."<language>en</language>\n<docs>http://backend.userland.com/rss</docs>\n";

		while($rs = mysql_fetch_array($result))
		{
			$lSecenek = 0;
			$rssXML .= "<item>\n<title><![CDATA[ Poll: ".$rs['SurveyName']."]]></title>\n";
			$rssXML .= "<link>http://www.rajinifans.com/poll/rssvote.php?ID=".$rs['SurveyID']."</link>\n";
			$rssXML .= "<guid isPermaLink=\"false\">".$rs['SurveyID']
	  				."@http://www.rajinifans.com</guid>";
			$sSurveyQuestion = $rs["SurveyQuestion"];
			$RSSDesc = "<b>Poll Question: </b>". $sSurveyQuestion . "<br/><br/>";
			$RSSDesc  .= "<b>Answer Options: </b><br/><br/>";

			$sSQL2 = "SELECT Count(Answers.OptionID) AS TotalAnswers, Options.OptionID, Options.OptionText ";
			$sSQL2 .=  "FROM Options LEFT JOIN Answers ON Options.OptionID = Answers.OptionID ";
			$sSQL2 .=  "WHERE Options.SurveyID=" . $rs["SurveyID"] .  " ";
			$sSQL2 .=  "GROUP BY Options.OptionID, Options.OptionText ";
			$sSQL2 .=  "ORDER BY TotalAnswers DESC, Options.OptionID;";

			$result2 = mysql_query($sSQL2 );

			while($rs2 = mysql_fetch_array($result2))
			{
				if ($lToplamOy != 0)
					$lYuzde = ($rs2["TotalAnswers"] / $lToplamOy) * 100;
				else
					$lYuzde = 0;
				$lSecenek = $lSecenek + 1;
				$RSSDesc .=  $lSecenek. "." . $rs2["OptionText"] . " ( ".$rs2["TotalAnswers"]." votes so far)<br/>";
			}
			$rssXML .= "<description><![CDATA["
			.$RSSDesc."]]></description>\n</item>\n";
		}
		$rssXML .= "</channel>\n</rss>\n";
		echo $rssXML;
?>
