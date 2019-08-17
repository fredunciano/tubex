<?
error_reporting(1);
include("database/conn.php");

if(!isset($_REQUEST["id"]))
	$id = 1;
else
	$id = $_REQUEST["id"];
$ct = 0;
$query = "SELECT count FROM visit_counts where id = ". $id;
$result = mysqli_query($query);

while($rs = mysqli_fetch_array($result))
{
	$ct = $rs["count"];
}

if(!isset($_COOKIE["rajinifans"]))
{

	@ setcookie("rajinifans", "Visit Count Cookie", time()+3600);
	$ct = $ct + 1;
	$query = "update visit_counts set count = ".$ct." where id = ". $id;
	mysqli_query($connect,$query);
}

$cstx = strval($ct);

for($idx=0;$idx<strlen($cstx);$idx++)
	echo "<img src='".$domainname."/images/counter/dg".$cstx[$idx].".gif' width='15' height='19' alt='".$cstx[$idx]."'>";

?>
