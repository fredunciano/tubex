<?session_start();
if (!isset($_SESSION["username"])){
header("Location: index.php?status=pw");
}?>
<?php include("adminHeader.php"); ?>
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

$shorttitle=mysqli_real_escape_string(trim($shorttitle));
$shorttitleeng=mysqli_real_escape_string(trim($shorttitleeng));
$articletitle=mysqli_real_escape_string(trim($articletitle));
$articletitleeng=mysqli_real_escape_string(trim($articletitleeng));
/*$shorttitle = str_replace("'", "&#39;", $shorttitle);
$articletitle = str_replace("'", "&#39;", $articletitle);
$rte1 = str_replace("'", "&#39;", $rte1);
$rte2 = str_replace("'", "&#39;", $rte2);
*/#$shorttitle = str_replace("13", " ", $shorttitle);
#$articletitle = str_replace("13", "&#39;", $articletitle);
#$rte1 = str_replace("13", "&#39;", $rte1);
#$shorttitle = str_replace("10", " ", $shorttitle);
#$articletitle = str_replace("10", " ", $articletitle);
#$rte1 = str_replace("10", " ", $rte1);


$image_url=$_POST["image_url"];
$action=$_POST["action"];
$article_url=$_POST["article_url"];


if($action=='add'){


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





$pdate=date(Y).'-'.date(m).'-'.date(d);

$desc=$rte1;
$desceng=$rte2;

$query="INSERT INTO index_page (shorttitle,shorttitleeng,articletitle,articletitleeng,description,descriptioneng,lang,image,link_url,pdate,article_url,ontop) VALUES ('$shorttitle','$shorttitleeng','$articletitle','$articletitleeng','$desc','$desceng','$lang','$name_file1','$image_url','$pdate','$article_url','$ontop')";
$result = mysqli_query($connect,$query);

//send the mail about first article when adding a new article
include("mail.php");

}
$action="a";
$_POST["rte1"]='';
$_POST["rte2"]='';


?>

<form method=post action="deleteimage.php" name="frm" id="form_id">

<table width="96%" border="0" cellpadding="3" cellspacing="1" class="tab">
  <tr>
    <td height="20" colspan="5" class="content"><strong>List of Articles</strong></td>
  </tr>
  <tr class="tr">
    <td ><strong>Num</strong></td>
	    <td ><strong>shorttitle</strong></td><td ><strong>articletitle</strong></td>

    <!-- <td><strong>Image url</strong></td> --><td><strong> EMail</strong></td><td><strong> Edit</strong></td>
	  <td><strong>Delete</strong></td>
  </tr>
 <?
$startrow=$_REQUEST['startrow'];
   if (empty($startrow))  { $startrow=0; $no=0; }
    $no+=$startrow;
    $display = 20; // to control the number of displayed records in a page
  // First query to find out how many records we have
	  $query = "select * from  index_page order by id desc";

$result = mysqli_query($connect,$query);
$num_record = mysqli_num_rows($result);
$endrow=$startrow + $display;
if ($endrow	> $num_record){
$endrow= $num_record;
}
// end of pagig logic
$query .=" LIMIT $startrow, $display";
$result = mysqli_query($connect,$query);
 $num_rec = mysqli_num_rows($result);
 if (!($num_rec < 1)) {

	 // Fetch the results (Begin loop)
    while($rs = mysqli_fetch_array($result)) {
    $no+=1;
    if($rs["lang"] == 'T')
    {
    	$shorttitle = $rs["shorttitle"];
    	$articletitle = $rs["articletitle"];
	}
    else
    {
    	$shorttitle = $rs["shorttitleeng"];
    	$articletitle = $rs["articletitleeng"];
	}
	?>
<tr class="tr">
 <td ><?php echo $no?></td> <td ><?php echo $shorttitle?></td><td ><a href="articleView.php?ID=<?php echo $rs["id"]?>" onclick="NewWindow(this.href,'name','650','700','yes');return false" target="_blank"><?php echo $articletitle?></a></td>
 <!-- <td ><?php echo $rs["link_url"]?></td> --><td><a href="mail.php?ID=<?php echo $rs["id"] ?>">EMail</a></td><td ><a href='adminEdit.php?ID=<?php echo $rs["id"] ?>'>Edit</a></td>
 <td align="center" ><input type="checkbox" name="articleId[]" value="<?php echo $rs["id"] ?>"></td>
 </tr>
<?}?>
<tr class="tr">
    <td height="20" colspan="6" align="center"><input type="submit" name="Delete" value="Delete" class="box2"></td>
  </tr>


<?
   }else{?>

<tr class="tr">
    <td height="20" colspan="5" class="content">No articles found</td>
  </tr>
<?}?>
</table>
<?php if (!($num_rec < 1)) {?>

	<table width="96%" border="0" cellpadding="3" cellspacing="1" >
	<tr  class="tr">
		<td >
				<a href="#" onClick="select_all('articleId', '1');" class="content"><b>Check All</b></a> /   <a href="#" onClick="select_all('articleId',
			'0');" class="content"><b>Uncheck All</b></a>
		</td>
	</tr>
	</table>
<?}?>
</form>


<!-- code for page break -->
<table width=100%><tr><td align=center>

<?
    // Calculate the previous results, only print 'Previous' if startrow is not equal to zero
    if ($startrow != 0) {
    $prevrow = $startrow - $display;
    print("<a  class=tr href='$PHP_SELF?startrow=$prevrow'>Previous</a> ");

    }
    // Calculate the total number of pages
    $pages = intval($num_record / $display);

    // $pages now contains number of pages needed unless there are left over from division
    if ($num_record % $display) {
    // has left over from division, so add one page
    $pages++;
    }
	//  echo ("$num_record : $display");
    // Print the next pages, first check if there are more pages then 1
    if ($pages > 1) {
    for ($i=1; $i <= $pages; $i++) { // Begin loop
    $nextrow = $display * ($i - 1);
	$presPage=($startrow/$display) +1 ;
	if ($presPage==$i){
    print("<span class=tr><font color=black>$i</span>  ");
	}else{
    print("<a href='$PHP_SELF?startrow=$nextrow' class=tr>$i</a>  ");
	}
		}
    }
    //End loop


    // Check if we are at the last page, if  so, dont print 'Next'
if ($endrow	< $num_record){
		if ($pages != 1){
    // not the last page so print 'Next'
    $nextrow = $startrow + $display;
    print("<a  class=tr href=\"$PHP_SELF?startrow=$nextrow\">Next</a>");
    }}
    // If there are no results at all

   ?>
</td></tr>
</table>
<?php include("adminFooter.php"); ?>

<script type="text/javascript"><!--

var formblock;
var forminputs;

function prepare() {
formblock= document.getElementById('form_id');
forminputs = formblock.getElementsByTagName('input');
}

function select_all(name, value) {
for (i = 0; i < forminputs.length; i++) {
// regex here to check name attribute
var regex = new RegExp(name, "i");
if (regex.test(forminputs[i].getAttribute('name'))) {
if (value == '1') {
forminputs[i].checked = true;
} else {
forminputs[i].checked = false;
}
}
}
}

if (window.addEventListener) {
window.addEventListener("load", prepare, false);
} else if (window.attachEvent) {
window.attachEvent("onload", prepare)
} else if (document.getElementById) {
window.onload = prepare;
}

//--></script>
