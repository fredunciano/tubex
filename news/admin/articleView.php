<?session_start();
if (!isset($_SESSION["username"])){
header("Location: index.php?status=pw");
}?>

<?
include ("config.php");


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table width="96%" border="0" cellpadding="3" cellspacing="1" class="tab">





 <?
$ID=$_GET["ID"];
	  $query = "select * from  index_page where id='$ID'";

$result = mysqli_query($query);

 $num_rec = mysqli_num_rows($result);
 if (!($num_rec < 1)) {

	 // Fetch the results (Begin loop)
    while($rs = mysqli_fetch_array($result)) {
    $no+=1;


	?>
<tr class="tr">  <td ><strong>Always on top</strong></td>  <td ><?
	if($rs["ontop"] == 'Y')
		echo 'Yes';
	else
		echo 'No';
?></td> </tr>
<tr class="tr">
  <td ><strong>Shorttitle</strong></td><td ><?=$rs["shorttitle"]?></td>
<tr class="tr">
  <td ><strong>Shorttitle(English)</strong></td><td ><?=$rs["shorttitleeng"]?></td>
<tr class="tr">  <td ><strong>Articletitle</strong></td>  <td ><?=$rs["articletitle"]?></td> </tr>
<tr class="tr">  <td ><strong>Articletitle(English)</strong></td>  <td ><?=$rs["articletitleeng"]?></td> </tr>
<tr class="tr">  <td ><strong>Default language</strong></td>  <td ><?
	if($rs["lang"] == 'T')
		echo 'Tamil';
	else
		echo 'English';
?></td> </tr>

<?if($rs["image"]!=""){?>
	<tr class="tr"> <td><strong>Image</strong></td>  <td ><img src="indeximages/<?=$rs["image"]?>" width="50" height="50" border="0" alt=""></td> </tr>
<?}elseif ($rs["link_url"]!=""){?>
	<tr class="tr">
		<td><strong>Image</strong></td>
		<td ><img src="<?=$rs["link_url"]?>" border="0" alt=""></td>

	</tr>
<?}
	if($rs["description"]!="" || $rs["descriptioneng"]!="" ){
	?>
		<tr class="tr">     <td valign=top><strong>Description</strong></td> <td ><?=$rs["description"]?></td> </tr>
<?
		if($rs["descriptioneng"]!="") {
	?>
		<tr class="tr">     <td valign=top><strong>Description(English)</strong></td> <td ><?=$rs["descriptioneng"]?></td> </tr>
<?
		}
	}elseif($rs["article_url"]!=""){?>
			<tr class="tr">     <td><strong>Article URL</strong></td> <td ><?=$rs["article_url"]?></td> </tr>

<?
	}

}}?>

<tr><td colspan="2" align="center"><br><input type="button" value="Close" onclick="window.close();"></td></tr>
</table>
</body>
</html>
