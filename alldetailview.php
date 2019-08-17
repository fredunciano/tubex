<?
$fileName="allarticleview.php";
$query = "SELECT id,article_url,articletitle,articletitleeng,lang,DATE_FORMAT(pdate,'%d/%m/%Y') as pdate FROM index_page where id !='' order by id Desc ";
$result = mysqli_query($query);
$pageSize = 50;
$totalSize = mysqli_num_rows($result);

$currentPage = $_REQUEST["currentPage"];
if( $currentPage == "" || $currentPage == 1)
{
	$currentPage = 1;
	$slno=1;
}
$slno= ($pageSize * $currentPage ) - ($pageSize - 1);
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
	$rowCount = 0;
	while(($rs = mysqli_fetch_array($result)) && $rowCount < ($currentPage-1)*$pageSize )
	{
		$rowCount = $rowCount + 1;
	}
	$rowCount = 0;
}
?>

 <table cellpadding='4' cellspacing='4' border='0' width='720' class='content' align='center'>
	<tr><td class='heading'>Article</td><td class='heading'>Posted Date</td></tr>

	<?
	while(($rs = mysqli_fetch_array($result)) && $rowCount < $pageSize )
	{
		if($rs["lang"] == 'T')
			$articletitle = $rs["articletitle"];
		else
			$articletitle = $rs["articletitleeng"];
		?>
		<tr>
			<td valign="top">
			<? if($rs["article_url"] !== "") {?>
			<A  HREF="<? echo $rs['article_url']; ?>" class="movieReview"><? echo $articletitle; ?></A>
			<? } else { ?>
			<A HREF="detailview.php?title=<? echo $rs['id'] ?>" class="movieReview"><? echo $articletitle; ?></A>
			<? } ?>
			</td>
			<td valign="top"><? echo $rs["pdate"] ?></td>
		</tr>

<?
	$slno= $slno + 1;
	$rowCount = $rowCount + 1;
	}
?>
</table>

<table align=center>
<tr>
<td>
 	<table  class="content"><tr><td valign=top>
		<?
		if( ($rs = mysqli_fetch_array($result)) || $currentPage != 1 )
		{
			if($currentPage == 1)
			{
				if( defined($prev_Page) )
				{
				?>
				<a href='<? echo $fileName; ?>?currentPage=<? echo $prev_Page?>&cat=<? echo  $cat ?>'>Prev</a>
			<?
				}
			}
			else
			{
			  $prev_Page = $currentPage - 1;
			 ?>
			  <a href='<? echo $fileName; ?>?currentPage=<? echo $prev_Page ?>&cat=<? echo  $cat ?>'>Prev</a>
		 <? } ?>

	&nbsp;&nbsp;&nbsp;&nbsp;
    <? for($i=1;$i<= $totalSize/$pageSize + 1; $i++)
    	{
		if($currentPage == $i)
		{
	?>
		<? echo $currentPage ?>
		<? } else { ?>
			<a href="<? echo $fileName ?>?currentPage=<? echo $i?>&cat=<? echo $cat ?> " class="content"><font size=1><b><? echo $i ?></b></a>
		<?  }  ?>
	<? } ?>
	&nbsp;&nbsp;&nbsp;&nbsp;
<?
	    if( $currentPage <= $totalSize/$pageSize )
	    {
			if(defined($next_Page))
			{?>
					<a href="<? echo $fileName ?>?currentPage=<? echo $next_Page ?>&cat=<? echo $cat ?>">Next</a>
			<?
			}
			else
			{
			  $next_Page = $currentPage + 1;
			 ?>
				<a href="<? echo $fileName ?>?currentPage=<? echo $next_Page ?>&cat=<? echo $cat ?>">Next</a>
		<? }
		}
?>
  </td></tr></table>
<?
	}
?>
  </td></tr>

</table>
