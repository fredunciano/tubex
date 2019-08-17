
<?include("admin/config.php");
$title=$_REQUEST['title'];
$query = "SELECT * FROM index_page where id = '$title' " ;

    $result = mysql_query($query);
	
		$num_record = mysql_num_rows($result);
		if (!($num_record < 1))  {
			 while($rs = mysql_fetch_array($result)) {
			 $description=$rs["description"];
			 $image=$rs["image"];
			 $title1=$rs["title"];
             $description=addslashes($description);
			 }
			 }

?>

document.write("<table cellpadding='4' cellspacing='4' border='0' width='720' class='content' align='center'><tr>");
document.write("<td class='heading'><?=$title1;?></td></tr><tr>");
document.write("<td  class='content'><IMG SRC='admin/indeximages/<?=$image;?>' align='left'><?=$description;?>");
document.write("</td>");
document.write("</tr>");
document.write("</table>");
<!-- document.write("<?=$description?>");  -->