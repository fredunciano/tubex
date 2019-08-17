<?
$fileName="allarticleview.php";
$query = "SELECT id,article_url,articletitle,DATE_FORMAT(pdate,'%d/%m/%Y') as pdate FROM index_page WHERE articletitle LIKE 'Rasigan Pathilgal%' order by id Desc";
$result = mysqli_query($query);
$totalSize = mysqli_num_rows($result);

if ($totalSize == 0)
{
?>

					<br><br><br><br>
					<table width=50% align=center height=30>
					<tr class=evinceCellShdr>
					<td colspan="4" ><font size="2"><b>No records Found</b></font></td>
					</tr></table>
					<br><br><br><br><br>
					<?
}
else
{
?>

 <table cellpadding='4' cellspacing='4' border='0' width='720' class='content' align='center'>
	<tr><td class='heading'>Article</td><td class='heading'>Posted Date</td></tr>

	<?
	while(($rs = mysqli_fetch_array($result)))
	{
		?>
		<tr>
			<td valign="top">
			<? if($rs["article_url"] !== "") {?>
			<A  HREF="<? echo $rs['article_url']; ?>" class="movieReview"><? echo $rs["articletitle"]; ?></A>
			<? } else { ?>
			<A HREF="detailview.php?title=<? echo $rs['id'] ?>" class="movieReview"><? echo $rs["articletitle"]; ?></A>
			<? } ?>
			</td>
			<td valign="top"><? echo $rs["pdate"] ?></td>
		</tr>

<?	}	?>
</table>
<?
}	?>

