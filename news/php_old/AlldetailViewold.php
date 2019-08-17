
<?include("admin/config.php");
$title=$_REQUEST['title'];
$query = "SELECT * FROM index_page where id !='' order by id Desc " ;

    $result = mysql_query($query);
	
		$num_record = mysql_num_rows($result);
		if (!($num_record < 1))  {
	?>
	
 document.write("<table cellpadding='4' cellspacing='4' border='0' width='720' class='content' align='center'>");
	document.write("<tr><td class='heading'>Article</td><td class='heading'>Title</td><td class='heading'>Date</td></tr>");
	
	<?
			 while($rs = mysql_fetch_array($result)) {
			 $description=$rs["description"];
			 $image=$rs["image"];
			 $title1=$rs["title"];
			  $pdate=$rs["pdate"];
             $description=addslashes($description);

?>			
document.write("<tr><td class=''><?=$description;?></td><td class=''><?=$title1;?></td><td class=''><?=$pdate;?></td></tr>");
<?			 
			 
			 }
			 }

?>
document.write("</table>");

<!-- document.write("<?=$description?>");  -->