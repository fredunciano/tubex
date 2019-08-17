<?php

$query = "SELECT shorttitleeng,articletitle, articletitleeng, DATE_FORMAT(pdate,'%W, %D %M %Y') as pdate, description, descriptioneng, views FROM index_page where id =". $title;
$result = mysqli_query($query);
while($rs = mysqli_fetch_array($result))
{
	$views = $rs["views"];
	if($lang == 'T')
	{
		$content = $rs["description"];
		if ($content== "")
			$content = "<br><br><font size=3><b>&#2951;&#2984;&#3021;&#2980;&#32;&#2951;&#2975;&#3009;&#2965;&#3016;&#32;&#2951;&#2985;&#3021;&#2985;&#3009;&#2990;&#3021;&#32;&#2980;&#2990;&#3007;&#2996;&#3006;&#2965;&#3021;&#2965;&#2990;&#3021;&#32;&#2970;&#3014;&#2991;&#3021;&#2991;&#2986;&#3021;&#2986;&#2975;&#2997;&#3007;&#2994;&#3021;&#2994;&#3016;&#46;&#32;&#2970;&#3007;&#2993;&#3007;&#2980;&#3009;&#32;&#2984;&#3015;&#2992;&#2990;&#3021;&#32;&#2965;&#2996;&#3007;&#2980;&#3021;&#2980;&#3009;&#32;&#2990;&#3008;&#2979;&#3021;&#2975;&#3009;&#2990;&#3021;&#32;&#2951;&#2984;&#3021;&#2980;&#32;&#2951;&#2975;&#3009;&#2965;&#3016;&#2991;&#3016;&#2986;&#3021;&#32;&#2986;&#3006;&#2992;&#3021;&#2965;&#3021;&#2965;&#2997;&#3009;&#2990;&#3021;&#46;</b></font><br><br>";
		$articletitle = $rs["articletitle"];
	}
	else
	{
		$content = $rs["descriptioneng"];
		if ($content== "")
			$content = "<br><br><font size=3><b>English Translation for this article is not yet"
							." available. Please visit us after some time.</b></font><br><br>";
		$articletitle = $rs["articletitleeng"];
	}

   $t1=$title-1;    $t2=$title+1;
    $query1 = "SELECT * FROM index_page where id =". $t1;
$result1 = mysqli_query($query1);
$rr1=mysqli_num_rows($result1);


    $query2 = "SELECT * FROM index_page where id =". $t2;
$result2 = mysqli_query($query2);
$rr2=mysqli_num_rows($result2);

?>
<SCRIPT language=JavaScript src="/script/common.js"></SCRIPT>
<SCRIPT language=JavaScript src="/script/tamil.js"></SCRIPT>
<SCRIPT type="text/javascript" src="/script/remem.js"></SCRIPT>

<table width="527" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="37">	<img src="http://rajinifans.com/images/box1.jpg" border="0" alt=""></td>

		<td width="466" height="39" background="http://rajinifans.com/images/boxtopbg.jpg" class="pageTile" align="left" >Article </td>
		<td width="35"><img src="http://rajinifans.com/images/box2.jpg" width="35" height="39" border="0" alt=""></td>
	</tr>
	<tr>
	<td background="http://rajinifans.com/images/boxlhsbg.jpg" valign="top" width="37"><img src="http://rajinifans.com/images/boxlhs.jpg" width="37" height="100" border="0" alt=""></td>
	<TD>

										<table cellpadding='4' cellspacing='0' border='0' width='100%' class='content' align='center'>
										<tr>
											<td class='heading' ><? echo $articletitle; ?></td>
										</tr>
										<tr>
											<td  class='content' ><b>(<? echo $rs["pdate"] ?>)</b></td>
										</tr>
										<tr>
										<td  class='content' valign="top" align="left" colspan="2"><img src="<? echo "http://www.rajinifans.com/news/admin/indeximages/".$outputImg; ?>" /><? echo $content ?></td>
										</tr>
                                        <tr>
                                        <td align=left colspan="4">
                                        
                                        
                                        
                                        
                                        
                                         <!-- Share This Button Start-->
                                        
                                        
                                        
                               					<span class='st_facebook_hcount' displayText='Facebook'></span>
								<span class='st_twitter_hcount' displayText='Tweet'></span>
								<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
								<span class='st_email_hcount' displayText='Email'></span>
                                        
                                        
                                        
                                         <!-- Share This Button End-->
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </td>
                                      
                                        </tr>
                                        <tr>
                                        <?php if($rr2 ==1):  ?>
                                        <td align=left><a href="detailview.php?title=<?php echo $title+1; ?>"><span style="font-size:14px ">
                                        		 <img src="http://rajinifans.com/images/photoprevious.jpg" /><br>Previous</span></a></td>
                                      
                                        <?php else: 
                                        
                                        	?>
                                        <td align=left><a href="detailview.php?title=<?php 	
                                        
                                        for($i=2; $i<200; $i++)
                                        	{
                                        	$t3=$title+$i;
                                        	 $query1 = "SELECT * FROM index_page where id =". $t3;
											 $result1 = mysqli_query($query1);
											 $rr3=mysqli_num_rows($result1);
											 if($rr3==1)
											 {
											 	echo $t3;
											 	break;
											 }
											 else{
											 	echo $title;
											 	break;
											 }								 
                                        	}

                                        	 ?>">
                                        		 
                                        	 <span style="font-size:14px ">
                                        	 <img src="http://rajinifans.com/images/photoprevious.jpg" /><br>
                                        	 Previous</span></a></td>
                                        <?php endif; ?>

										<?php if($rr1 ==1):  ?>
                                        <td align=left><a href="detailview.php?title=<?php echo $title-1; ?>">	<span style="font-size:14px "> <img src="http://rajinifans.com/images/photonext.jpg" /><br>Next</span></a></td>
                                      
                                        <?php else: 
                                       
                                        	?>
                                        <td align=right><a href="detailview.php?title=<?php 	
                                        
                                        for($j=2; $j<200; $j++)
                                        	{
                                        	$t4=$title-$j;
                                        	 $query1 = "SELECT * FROM index_page where id =". $t4;
											 $result1 = mysqli_query($query1);
											 $rr4=mysqli_num_rows($result1);
											 if($rr4==1)
											 {
											 	echo $t4;
											 	break;
											 }								 
                                        	}
                                        	 ?>">
                                        
                                        	 <span style="font-size:14px ">
                                        	 		 <img src="http://rajinifans.com/images/photonext.jpg" /><br>
                                        	 Next</span></a></td>
                                        <?php endif; ?>
                                        </tr>
										</table>

										<form name="commentform" method=post>
                                        <table cellpadding='1' cellspacing='0' border='0' width='100%' class='content' align='center'>
										<tr>
											<td class='heading' >&nbsp;</td>
										</tr>
										<tr>
											<td class='heading' ><input type="button" name="commentlink" onclick="javascript:hideseek()" value="Add your comments"> &nbsp; &nbsp;
											<? if($lang == 'E' && $rs["description"] != "")  { ?>
											<input type="button" value="View this article in Tamil" onclick="javascript:location.href='detailview.php?title=<? echo $title ?>&lang=T'"></td>
										<? } elseif ($lang == 'T' && $rs["descriptioneng"] != "") { ?>
                                           <input type="button" value="View this article in English" onclick="javascript:location.href='detailview.php?title=<? echo $title ?>&lang=E'"></td>
                                        <? } ?>
											</td>
										</tr>
                                        </tr><td>

                                        <div id="commentbox" style="display:none;visibility:hidden;">
                                        <font size=2>Please note that your comment WILL NOT be published if:<br>
										<ul>
										<li>It is not related to the above article.</li>
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
											<td><font size=2><b>Language:</b><input type=radio name=kb value="english" onclick="toggleKBMode(event,this)" checked="true">English <input type=radio name=kb value="roman" onclick="toggleKBMode(event,this)">Tamil</font></td>
										</tr>
										<tr>
											<td colspan="2"><font size=1>Use F12 to toggle English & Tamil. Tamil typing powered by <a href="http://www.higopi.com/ucedit/Tamil.html" target="_blank">Thagadoor</a></font> <br>
											<textarea name="Comment" rows="5" cols="50" charset="utf-8" onKeyDown="toggleKBMode(event)" onKeyPress="javascript:convertThis(event)"></textarea><br>
											<font size=2><b><input type=checkbox onclick="showMap(this)"> Show Keymap &nbsp; <input type=checkbox onclick="showHelp(this)" checked="true"> Online Keymap Help</b></font></td>
										</tr>
										<tr>
											<td colspan="2"><font size=1>Fields marked with * are compulsary. Your Email id is just for our reference. It will not be displayed here or shared with anyone.</font>
											</td>
										</tr>

										<tr>
											<td colspan=2><input type="hidden" name="NewsID" value="<?echo $title?>">
											<input type="button" name="Submit" value="Submit" onclick="validate()"></td>
										</tr>
										<tr>
										<td colspan=2><div id='postresult'></div></td>
										</tr>
										</table>
										</div>
                                         </form>
										</td>
										</tr>
										<?

		$rowsperpage = 20;
		$page = $_GET['currentPage'];
		if (empty($page))
      	$page=0;
  		$totquery = "SELECT * FROM index_comments where NewsID =". $title ." and Approved = 'Y' ";
		$totresult = mysqli_query($totquery);
		$totnumrows=mysqli_num_rows($totresult);
		$totpages = round($totnumrows/$rowsperpage);

			$cquery = "SELECT ID, Name,Email,URL, DateTime as Date1, DATE_FORMAT(DateTime,'%W, %D %M %Y at %T') as DateTime, Comment FROM index_comments where NewsID ="
			. $title ." and Approved = 'Y' ORDER BY Date1 DESC LIMIT ".($page*$rowsperpage).", $rowsperpage";
			$cresult = mysqli_query($cquery);
			echo "<tr><td><table cellpadding='0' cellspacing='0' border='0' width='100%'><td align='left' class='heading'>"
					."<a name='comments'></a>".$totnumrows." Comment(s)</td><td align='right' class='heading' style='color: #ffffff;'>Views: "
					.$views."</td></tr></table><hr style='size=1px'></td></tr>";
?>
<tr><td align=right>
<table align=center>
<tr>
<td>
<?
		if ($totnumrows > $rowsperpage )
		{
			if($page != 0)
				echo '<td valign=top><a href="/detailview.php?title='.$title.'&currentPage='.($page-1).'#comments" class="photolink">'
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
						echo '<td><a href="detailview.php?title='.$title.'&currentPage='.$i.'#comments"  class="photolink">'
								.'<B>'.($i+1).'</b></a></td>';
				}

			if($page != $totpages && $totpages != 0)
				echo '<td valign=top><a href="detailview.php?title='.$title.'&currentPage='.($page+1)
						.'#comments" class="photolink"><img  alt="Next Page" src="/images/photonext.jpg"'
						.' border=0><br>Next</a></td>';
		}
  ?>
  </td></tr>
</table>
</td>

                                        </tr>
<?


				if(mysqli_num_rows($cresult))
					while($crs = mysqli_fetch_array($cresult))
					{
						echo "<tr><td><a name='cmt".$crs["ID"]."'></a><a href='#cmt".$crs["ID"]
								."'><b><font size=2 color='black'>".$crs['Name']."</font></b></a>,".$crs['URL'];
						echo"<br><font size=1>".$crs['DateTime']."</font><br><br><font size=2>"
								. str_replace  ( "\n"  , "<br>\n" ,$crs['Comment'])."</font><hr style='size=1px'></td></tr>";

					}
				else
					echo "<tr><td><font size=2>No comments yet. Be the first one to comment.</font><br><hr style='size=1px'></td></tr>";
										?>

<tr><td align=right>
<table align=center>
<tr>
<td>
<?
		if ($totnumrows > $rowsperpage )
		{
			if($page != 0)
				echo '<td valign=top><a href="/detailview.php?title='.$title.'&currentPage='.($page-1).'#comments" class="photolink">'
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
						echo '<td><a href="detailview.php?title='.$title.'&currentPage='.$i.'#comments"  class="photolink">'
								.'<B>'.($i+1).'</b></a></td>';
				}

			if($page != $totpages && $totpages != 0)
				echo '<td valign=top><a href="detailview.php?title='.$title.'&currentPage='.($page+1)
						.'#comments" class="photolink"><img  alt="Next Page" src="/images/photonext.jpg"'
						.' border=0><br>Next</a></td>';
		}
  ?>
  </td></tr>
</table>
</td></tr>
										</table>

	</TD>
	<td background="http://rajinifans.com/images/boxrhsbg.jpg" valign="bottom" width="35"><img src="http://rajinifans.com/images/boxrhs.jpg" width="35" height="113" border="0" alt=""></td>
	</td>
	</tr>
	<tr>
		<td width="37"><img src="http://rajinifans.com/images/box4.jpg" width="37" height="39" border="0" alt=""></td>
		<td width="466" background="http://rajinifans.com/images/boxbot.jpg"  align="right"><img src="http://rajinifans.com/images/boxbot.jpg" width="466" height="39" border="0" alt=""></td>
		<td width="35" align="right"><img src="http://rajinifans.com/images/box3.jpg" width="35" height="39" border="0" alt=""></td>
	</tr>
	</table>

  <script language="JavaScript">
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
    				"&NewsID="+ encodeURI( document.commentform.NewsID.value ) +
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
  </script>
<?  $txtTitle=$rs["articletitle"];
$txtTitle=$txtTitle . " - Rajinifans.com";
}

$views = $views + 1;
$uquery = "UPDATE index_page set views = ".$views." where id =". $title ;
$uresult = mysqli_query($uquery);
?>