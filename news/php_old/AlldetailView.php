
<?include("admin/config.php");
$display=$_REQUEST['display'];
$startrow=$_REQUEST['startrow'];
	if (empty($startrow))  { $startrow=0; $no=0; }
      $display = 2; 
 	$query = "SELECT * FROM index_page where id !='' order by id Desc " ;

$result = mysql_query($query);
$num_record = mysql_num_rows($result);
$endrow=$startrow + $display;
if ($endrow	> $num_record){
$endrow= $num_record;
}

$query .=" LIMIT $startrow, $display";
$result = mysql_query($query);
 $num_rec = mysql_num_rows($result);
 if (!($num_rec < 1)) {

	?>
	
 document.write("<table cellpadding='4' cellspacing='4' border='0' width='720' class='content' align='center'>");
	document.write("<tr><td class='heading'>Article</td><td class='heading'>Short Title</td><td class='heading'>Date</td></tr>");
	
	<?
    while($rs = mysql_fetch_array($result)) {
	$no+=$startrow;
	
	
			 $description=$rs["description"];
			 $image=$rs["image"];
			 $title1=$rs["shorttitle"];
			  $pdate=$rs["pdate"];
             $description=addslashes($description);

?>			
document.write("<tr><td class=''><?=$description;?></td><td class=''><?=$title1;?></td><td class=''><?=$pdate;?></td></tr>");
<?			 
			 
			 }
			 }

?>
document.write("</table>");



document.write("<table width=100%><tr><td align=center>");

<?
  
    if ($startrow != 0) { 
    $prevrow = $startrow - $display;
	?>
document.write("<a  class=tr href='AllArticleView.asp?startrow=<?=$prevrow?>'>Previous</a> ");
<?	
    } 
    
    $pages = intval($num_record / $display);
   
  
    if ($num_record % $display) {

    $pages++;
    }
	
    if ($pages > 1) {
    for ($i=1; $i <= $pages; $i++) { 
    $nextrow = $display * ($i - 1);
	$presPage=($startrow/$display) +1 ;
	if ($presPage==$i){
	?>
document.write("<span class=tr><font color=black>&nbsp;<?=$i?></span> ");
<?	
   
	}else{
		?>
document.write("<a href='AllArticleView.asp?startrow=<?=$nextrow?>' class=tr><?=$i?></a>");
<?	

	}
		} 
    }
    
if ($endrow	< $num_record){
		if ($pages != 1){
   $nextrow = $startrow + $display;

   ?>
document.write("<a  class=tr href='AllArticleView.asp?startrow=<?=$nextrow?>'>&nbsp;Next</a>");
<?	

	
	}}
   
   ?> 
document.write("</td></tr>");
document.write("</table>");

<!-- document.write("<?=$description?>");  -->