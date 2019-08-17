<?php include("../database/conn.php"); ?>
<html>
<head>
<?php 
	$lAnketID = $_REQUEST["ID"];
	$lSecenekID = $_REQUEST["optSecenek"];
	$UserIP = $_SERVER["REMOTE_ADDR"];

	if ($lSecenekID == 0 && $_REQUEST["opt"] !== "view")
	{
		?>
			</head><body><p class="smalltext">
			You should select an option.<br>
			<a href="/">Back</a></body></html>
		<?php 		exit();
	}

	$sSQL = "SELECT SurveyQuestion From Surveys where SurveyID = " . $lAnketID;
	$result = mysqli_query($connect,$sSQL);

	if(mysqli_num_rows($result) == 0)
	{
		echo "</head><body>Error : No other Surveys found.<a href='/'>Back</a></body></html>";
		exit();
	}
	while($rs = mysqli_fetch_array($result))
	{
		$sSurveyQuestion = $rs["SurveyQuestion"];
	}

	$sSQL = "SELECT OptionText FROM Options WHERE SurveyID=" . $lAnketID .  " ";
	$result = mysqli_query($connect,$sSQL);
	$sSurveyAnswers = "";
	while($rs = mysqli_fetch_array($result))
	{
		$sSurveyAnswers .= $rs["OptionText"] . ", ";
	}

?>
<title>Poll: <?php echo $sSurveyQuestion; ?> - Rajinifans.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="<?php echo $sSurveyQuestion;?>  <?php echo $sSurveyAnswers; ?> - Weekly Poll on South Indian Tamil Superstar Rajinikanth is conducted. Join and share your feedback with us!">
<SCRIPT language=JavaScript src="/script/common.js"></SCRIPT>
<SCRIPT language=JavaScript src="/script/tamil.js"></SCRIPT>
<SCRIPT type="text/javascript" src="/script/remem.js"></SCRIPT>

<?php include("../header2.php"); ?>
<?php include("../sublinks.php"); ?>
<?php include("../left_banner.php"); ?>
<td width="488" valign="top">
<!-- vote results start here -->
<STYLE TYPE="text/css" MEDIA="screen, projection">
<!--
  @import url(surveyadmin.css);
 -->
</STYLE>
	<span class='header1'><?php echo $sSurveyQuestion; ?></span><br><br>
		<table border="0" cellspacing="1" cellpadding="2" width="100%" class=pollbg>

<?php 
	$sSQL = "SELECT IP FROM Answers WHERE IP ='" . $UserIP . "' AND SurveyID = " . $lAnketID;
	$result = mysqli_query($sSQL);

	if(mysqli_num_rows($result) == 0 && $_REQUEST["opt"] !== "view")
	{
		$sSQL = "INSERT INTO Answers (SurveyID, OptionID, IP) VALUES (". $lAnketID .","
				. $lSecenekID .",'". $UserIP . "')";
		$result = mysqli_query($connect,$sSQL);
		?>
<tr>
	<td colspan=2 bgcolor=white><font face=arial size=2>Thank you for participating in our survey.</font></td>
</tr>
<?php }
   else
   {
      if($_REQUEST["opt"] == "cast") {?>
      <tr>
	<td colspan=2 bgcolor=white><font face=arial size=2>Sorry, someone with the same IP address as you has already voted.</font></td>
</tr>
<?php  }
   }

	$sSQL = "SELECT COUNT(AnswerID) AS TotalAnswers From Answers WHERE OptionId IS NOT NULL and SurveyID = " . $lAnketID;
	$result = mysqli_query($connect,$sSQL);
	while($rs = mysqli_fetch_array($result))
	{
		$lToplamOy = $rs["TotalAnswers"];
	}

	$sSQL = "SELECT Count(Answers.OptionID) AS TotalAnswers, Options.OptionText ";
	$sSQL .= "FROM Answers INNER JOIN Options ON Answers.OptionID = Options.OptionID ";
	$sSQL .= "WHERE Answers.OptionId IS NOT NULL and Answers.SurveyID=" . $lAnketID .  " ";
	$sSQL .= "GROUP BY Options.OptionText ";
	$sSQL .= "ORDER BY TotalAnswers DESC;";

	$result = mysqli_query($sSQL);

	echo "<tr><td colspan=2 class='header2'>Total " . $lToplamOy . " votes cast.</td></tr>";
	while($rs = mysqli_fetch_array($result))
	{
		if( $lToplamOy != 0 )
			$lYuzde = round($rs["TotalAnswers"]/$lToplamOy*100,2);
		else
			$lYuzde = 0;
		?>
			<tr>
				<td class="smalltext" nowrap><?php echo $rs["OptionText"];?></td>
				<td class="smalltext" align=right nowrap><?php echo $rs["TotalAnswers"];?>( <?php echo round($rs["TotalAnswers"]/$lToplamOy*100,2) . "%"; ?>) </td>
			</tr>
			<tr>
				<td class="smalltext" colspan=2><img src="images/pb.gif" height=8 width="<?php echo ($lYuzde*0.9); ?>%"><img src="images/pbw.gif" height=8 width=<?php echo (100-$lYuzde)*0.9; ?>%"></td>
			</tr>
		<?php 	}
?>
</td></tr>
</table>

										<form name="commentform" method=post>
                                        <table cellpadding='4' cellspacing='0' border='0' width='100%' class='content' align='center'>
										<tr>
											<td class='heading' ><input type="button" name="commentlink" onclick="javascript:hideseek()" value="Add your comments"></td>
											<td class=heading><input type=button value='Previous Polls' onclick='javascript:location.href="prevpoll.php"'></td>
										</tr>
                                        </tr><td colspan=2>

                                        <div id="commentbox" style="display:none;visibility:hidden;">
                                        <font size=2>Please note that your comment WILL NOT be published if:<br>
										<ul>
										<li>It is not related to the above poll.</li>
										<li>It has marketing/promotion content.</li>
										<li>It has personal attacks/verbal abuse/indecent words.</li>
										<li>It has content that may hurt the feelings of anyone.</li>
										</ul>
										Thank you in advance for being decent when you express your comments.<br>
										<table bgcolor="#ffcc99">
										<tr>
										    <td><font size=2><b>Remember me?:</b></font></td><td><input type="checkbox" id="checker" name="checker" checked="true"></td>
										</tr>
										<tr>
											<td><font size=2><b>*&nbsp;Name:</b></font></td><td><input type=text name="Name" size="50"></td>
										</tr>
										<tr>
											<td><font size=2><b>*&nbsp;Email:</b></font></td><td><input type=text name="Email" size="50"><font size="1"><br>(Will not be published)</font></td>
										</tr>
										<tr>
											<td><font size=2><b>Country/City:</b></font></td><td><input type=text name="URL" size="50"></td>
										</tr>
										<tr>
                              				<td><font size=2><b>Word verification:<b></font></td>
                              				<td ><img src="/captcha/captcha.php" alt="CAPTCHA image" align="top"><br>
												<input name="number" type="text" id="number"></td>
                            			</tr>
										<tr>
											<td><font size=2><b>*&nbsp;Comment:</b></font></td>
											<td><font size=2><b>Language:</b><input type=radio name=kb value="english" onclick="toggleKBMode(event,this)" checked="true">English <input type=radio name=kb value="tamil" onclick="toggleKBMode(event,this)">Tamil</font></td>
										</tr>
										<tr>
											<td colspan="2"><font size=1>Use F12 to toggle English & Tamil. Tamil typing powered by <a href="http://www.higopi.com/ucedit/Tamil.html" target="_blank"><font color='#0000ff'>Thagadoor</font></a></font> <br>
											<textarea name="Comment" rows="5" cols="50" charset="utf-8" onKeyDown="toggleKBMode(event)" onKeyPress="javascript:convertThis(event)"></textarea></td>
										</tr>
										<tr>
											<td colspan="2"><font size=1>Fields marked with * are compulsary. Your Email id is just for our reference. It will not be displayed here or shared with anyone.</font>
											</td>
										</tr>

										<tr>
											<td colspan=2><input type="hidden" name="PollID" value="<?echo $lAnketID ?>">
											<input type="button" name="Submit" value="Submit" onclick="validate()"></td>
										</tr>
										<tr>
										<td colspan=2><div id='postresult'></div></td>
										</tr>
										</table>
										</div>
                                         </form>

</td></tr>
								<?php 
		$rowsperpage = 20;
		$page = $_GET['currentPage'];
		if (empty($page))
      	$page=0;
  		$totquery = "SELECT * FROM poll_comments where PollID =". $lAnketID ." and Approved = 'Y' ";
		$totresult = mysqli_query($totquery);
		$totnumrows=mysqli_num_rows($totresult);
		$totpages = round($totnumrows/$rowsperpage);

			$cquery = "SELECT ID,Name,Email,URL, DateTime as Date1, DATE_FORMAT(DateTime,'%W, %D %M %Y at %T') as DateTime, Comment FROM poll_comments where PollID ="
			. $lAnketID ." and Approved = 'Y' ORDER BY Date1 DESC LIMIT ".($page*$rowsperpage).", $rowsperpage";
			$cresult = mysqli_query($cquery);
						echo "<tr><td class='heading' colspan=2><a name='comments'></a>".$totnumrows." Comment(s)<hr style='size=1px'></td></tr>"
?>
<tr><td align=right colspan=2>
<table align=center>
<tr>
<td>
<?php 		if ($totnumrows > $rowsperpage )
		{
			if($page != 0)
				echo '<td valign=top><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.($page-1).'#comments" class="photolink">'
						.'<img  alt="Previous Page" src="/images/photoprevious.jpg" border=0><br>'
						.'Previous</a></td>';
				$start = $page - 12;
				if($start < 1)
					$start = 0;
				$end = $start+25;
				if($end > $totpages+1)
					$end = $totpages+1;
				for($i=$start;$i<$end;$i++)
				{
					if($i == $page)
						echo '<td><span  class="photolink">'.($page+1).'</span></td>';
					else
						echo '<td><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.$i.'#comments"  class="photolink">'
								.'<B>'.($i+1).'</b></a></td>';
				}

			if($page != $totpages && $totpages != 0)
				echo '<td valign=top><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.($page+1)
						.'#comments" class="photolink"><img  alt="Next Page" src="/images/photonext.jpg"'
						.' border=0><br>Next</a></td>';
		}
  ?>
  </td></tr>
</table>
</td></tr>
<?php 

				if(mysqli_num_rows($cresult))
					while($crs = mysqli_fetch_array($cresult))
					{
							echo "<tr><td colspan=2><a name='cmt".$crs['ID']."'></a><a href='#cmt".$crs['ID']."'><b><font size=2 color='black'>".$crs['Name']."</font></b></a>,".$crs['URL'];
						echo"<br><font size=1>".$crs['DateTime']."</font><br><br><font size=2>"
								. str_replace  ( "\n"  , "<br>\n" ,$crs['Comment'])."</font><hr style='size=1px'></td></tr>";

					}
				else
					echo "<tr><td colspan=2><font size=2>No comments yet. Be the first one to comment.</font><br><hr style='size=1px'></td></tr>";
										?>
<tr><td align=right colspan=2>
<table align=center>
<tr>
<td>
<?php 		if ($totnumrows > $rowsperpage )
		{
			if($page != 0)
				echo '<td valign=top><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.($page-1).'#comments" class="photolink">'
						.'<img  alt="Previous Page" src="/images/photoprevious.jpg" border=0><br>'
						.'Previous</a></td>';
				$start = $page - 12;
				if($start < 1)
					$start = 0;
				$end = $start+25;
				if($end > $totpages+1)
					$end = $totpages+1;
				for($i=$start;$i<$end;$i++)
				{
					if($i == $page)
						echo '<td><span  class="photolink">'.($page+1).'</span></td>';
					else
						echo '<td><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.$i.'#comments"  class="photolink">'
								.'<B>'.($i+1).'</b></a></td>';
				}

			if($page != $totpages && $totpages != 0)
				echo '<td valign=top><a href="cast.php?ID='.$lAnketID.'&opt=view&currentPage='.($page+1)
						.'#comments" class="photolink"><img  alt="Next Page" src="/images/photonext.jpg"'
						.' border=0><br>Next</a></td>';
		}
  ?>
  </td></tr>
</table>
</td></tr>
</table>
<script language=JavaScript>
<!--
  function hideseek()
  {
	  document.commentform.kb[1].click();
	  if(document.getElementById("commentbox").style.visibility == "hidden")
	  {
		document.commentform.commentlink.value  = "Close comment box";
	  	document.getElementById("commentbox").style.visibility = "visible";
	  	document.getElementById("commentbox").style.display = "inline";
  	  }
	  else
	  {
		document.commentform.commentlink.value = "Add your comments";
	  	document.getElementById("commentbox").style.visibility = "hidden";
	  	document.getElementById("commentbox").style.display = "none";
  	  }
  }

  String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };
  function validate()
  {
	  invalid = "";
	  if(document.commentform.Name.value.trim() == "")
	  	invalid += "Name\n";
	  emailval = document.commentform.Email.value.trim()
	  if(emailval == "" || emailval.indexOf("@") <= 0 || emailval.indexOf(".") <= 0 )
	  	invalid += "Email\n";
	  if(document.commentform.Comment.value.trim() == "")
	  	invalid	+= "Comment\n";
	  if(document.commentform.number.value.trim() == "")
	  	invalid	+= "Word Verification\n";

	  if(invalid != "")
	  	alert("Please enter valid values for the following:\n\n"+invalid)
	  else
	  {
		document.commentform.Submit.value = "Please wait.."  ;
		document.commentform.Submit.enabled = false;
		doRemem(document.commentform);
	  	saveRecord();
	  	document.commentform.Submit.value = "Submit";
	  	document.commentform.Submit.enabled = true;
	  	document.commentform.Comment.value = "";
  	  }
  }

 function saveRecord()
{
	commdiv = document.getElementById('postresult');
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
    var poststr = "Name=" + encodeURI( document.commentform.Name.value ) +
    				"&Email="+encodeURI( document.commentform.Email.value ) +
    				"&URL="+encodeURI( document.commentform.URL.value ) +
    				"&PollID="+ encodeURI( document.commentform.PollID.value ) +
                    "&Comment=" + encodeURI( document.commentform.Comment.value ) +
                    "&number=" + encodeURI( document.commentform.number.value );

	  http_request.onreadystatechange = alertContents;
      http_request.open('POST', 'addcomment.php', true);
      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      http_request.setRequestHeader("Content-length", poststr.length);
      http_request.setRequestHeader("Connection", "close");
      http_request.send(poststr);
}

function alertContents() {
      if (http_request.readyState == 4) {
         if (http_request.status == 200) {
                result = http_request.responseText;
            commdiv.innerHTML = result;
         } else {
            alert('There was a problem with the request.');
         }
      }
}


  function doRemem(obj)
  {
	  if (obj.checker.checked) toMem(obj)
	  else delMem(obj);
  }
	remCookie(document.commentform);

//   document.title = "Poll: <?php echo $sSurveyQuestion; ?> - Rajinifans.com";
//-->
</script>
  <!-- body end -->
   <!-- footer st -->
</td>
                      </tr>

                    </table>
                  </div></td>




              </tr>
            </table>
			</td>
<?php include("../footer1.php"); ?>
