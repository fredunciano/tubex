<?
$title= $_REQUEST["title"];
$query = "SELECT * FROM index_page where id < " . $title . " order by id Desc limit 0,10" ;
$result = mysqli_query($query);
?>

<table cellpadding='4' cellspacing='4' border='0' width='' class='content' align='center'>
<? while($rs2 = mysqli_fetch_array($result))
   {
		if($rs2["lang"] == 'T')
			$articletitle = $rs2["articletitle"];
	   	else
	   		$articletitle = $rs2["articletitleeng"];
	?>
		<tr><td class='heading'><? echo $articletitle; ?></td></tr>
<?
   }
	?>
</table>

