<?
include ("config.php");

$rte1=$_POST['rte1'];
$rte2=$_POST['rte2'];
$shorttitle=$_POST["shorttitle"];
$shorttitleeng=$_POST["shorttitleeng"];
$articletitle=$_POST["articletitle"];
$articletitleeng=$_POST["articletitleeng"];
$lang=$_POST["lang"];
$ontop=$_POST["ontop"];
$link_url=$_POST["link_url"];
$action=$_POST["action"];
$ID=$_REQUEST['ID'];
$article_url=$_POST["article_url"];


/*$rte1 = str_replace("'", "&#39;", $rte1);
$rte2 = str_replace("'", "&#39;", $rte2);*/



$shorttitle=mysqli_real_escape_string(trim($shorttitle));
$shorttitleeng=mysqli_real_escape_string(trim($shorttitleeng));
$articletitle=mysqli_real_escape_string(trim($articletitle));
$articletitleeng=mysqli_real_escape_string(trim($articletitleeng));

#$shorttitle = str_replace("13", " ", $shorttitle);
#$articletitle = str_replace("13", "&#39;", $articletitle);
#$rte1 = str_replace("13", "&#39;", $rte1);
#$shorttitle = str_replace("10", " ", $shorttitle);
#$articletitle = str_replace("10", " ", $articletitle);
#$rte1 = str_replace("10", " ", $rte1);


		  $change="";
$abc="";


 define ("MAX_SIZE","400");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;


 	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];


 	if ($image)
 	{

 		$filename = stripslashes($_FILES['file']['name']);

  		$extension = getExtension($filename);
 		$extension = strtolower($extension);


 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
 		{

 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['file']['tmp_name']);


if ($size > MAX_SIZE*1024)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=60;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=640;
$newheight1=360;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);


$filename = "indeximages/ori/".date("Ymd").time(). $_FILES['file']['name'];

$filename1 = "indeximages/".date("Ymd").time().$_FILES['file']['name'];



imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}}




   /*	$tmp_file =  $_FILES['index_image']['tmp_name'];
	 $name_file1 = $_FILES['index_image']['name'];
				move_uploaded_file($tmp_file,$filename);*/

               $name_file1=substr($filename1,12);


			 /*	$tmp_file = $_FILES['index_image']['tmp_name'];
				$name_file1 = $_FILES['index_image']['name'];
				move_uploaded_file($tmp_file,$path.$name_file1);*/



$desc=$rte1;
$desceng=$rte2;
if($name_file1=='')
{
  $query="update index_page set shorttitle='$shorttitle', shorttitleeng='$shorttitleeng', articletitle='$articletitle', "
	."articletitleeng='$articletitleeng', description='$desc', descriptioneng='$desceng', lang='$lang', link_url='$link_url', "
	."article_url='$article_url',ontop='$ontop' where id='$ID' ";
}
else
{  
 $query="update index_page set shorttitle='$shorttitle', shorttitleeng='$shorttitleeng', articletitle='$articletitle', "
	."articletitleeng='$articletitleeng', description='$desc', descriptioneng='$desceng', lang='$lang', link_url='$link_url', "
	."image='$name_file1', article_url='$article_url',ontop='$ontop' where id='$ID' ";

}


$result = mysqli_query($query);

header("Location: adminHome.php");
?>
