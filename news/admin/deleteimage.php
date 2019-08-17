<?
include("config.php");
foreach( $_POST["articleId"] as $index=> $value){
	$aId=$value;
	 $query = "DELETE FROM index_page where id='$aId'";//echo $query."<BR>";
	 mysqli_query($query);
header("location: adminHome.php");

}

//echo "hai "$_POST["articleId][];
/*$ID=$_GET['ID'];
 $query = "DELETE FROM index_page where id='$ID'";
//echo $query;


$result = mysqli_query($query);
header("Location: adminHome.php"); */

?>	