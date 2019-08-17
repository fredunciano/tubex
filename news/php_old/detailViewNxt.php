
<?include("admin/config.php");
$title=$_REQUEST['title'];
$query = "SELECT * FROM index_page where id < '$title' order by id Desc limit 0,10" ;

    $result = mysql_query($query);
	
		$num_record = mysql_num_rows($result);
		if (!($num_record < 1))  {
	?>
	
 document.write("<table cellpadding='4' cellspacing='4' border='0' width='' class='content' align='center'>");
	<?
			 while($rs = mysql_fetch_array($result)) {
			 $description=$rs["description"];
			 $image=$rs["image"];
			 $title1=$rs["shorttitle"];
             $description=addslashes($description);
?>			
document.write("<tr><td class='heading'><?=$title1;?></td></tr>");
<?			 
			 
			 }
			 }

?>
document.write("</table>");

<!-- document.write("<?=$description?>");  -->