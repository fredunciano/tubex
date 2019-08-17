<?session_start();
if (!isset($_SESSION["username"])){
header("Location: index.php?status=pw");
}?>
<? include("adminHeader.php");
include ("config.php");
$ID=$_REQUEST['ID'];
//$action="a";


$query = "select * from  index_page  WHERE id='$ID'";//order by pdate desc

$result = mysqli_query($connect,$query);
  $result = mysqli_query($connect,$query);
		$num_record = mysqli_num_rows($result);
		if (!($num_record < 1)) {
		// Fetch the results (Begin loop)
		$num=0;
		while($rs = mysqli_fetch_array($result)) {
			//$num++;

?>
<form name="adminimage" action="adminEditSucc.php?ID=<?=$rs["id"]?>" method="post"  ENCTYPE="multipart/form-data" onSubmit ="return nullcheck();" >
<table width="96%" border="0" cellpadding="3" cellspacing="0" class="tab">
  <tr>
    <td height="20" colspan="3" class="content"><strong>Edit article</strong></td>
  </tr>
<tr class="tr">
      <td width="15%">Always stay on top<br></td>
       <td colspan=2 align=left><input type="radio" name="ontop" value='Y' <?if($rs['ontop'] == 'Y' ) echo 'checked'?> > Yes
    <input type="radio" name="ontop" value='N' <?if($rs['ontop'] == 'N' ) echo 'checked'?> > No
	&nbsp;</td>
  </tr>
<tr class="tr">
    <td width="15%">Short Title(Tamil)<br></td>
    <td width="25%"><input type="text" name="shorttitle"  class="box1" value="<?=$rs["shorttitle"]?>"></td>
	<td>&nbsp;</td>
  </tr>
  <tr class="tr">
    <td>Article Title(Tamil)<br></td>
    <td><input type="text" name="articletitle"   class="box" value="<?=$rs["articletitle"]?>"></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td width="15%">Short Title(English)<br></td>
    <td width="25%"><input type="text" name="shorttitleeng"  class="box1" value="<?=$rs["shorttitleeng"]?>"></td>
	<td>&nbsp;</td>
  </tr>
  <tr class="tr">
    <td>Article Title(English)<br></td>
    <td><input type="text" name="articletitleeng"   class="box" value="<?=$rs["articletitleeng"]?>"></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Default Language:<br></td>
    <td colspan=2 align=left><input type="radio" name="lang" value='T' <?if($rs['lang'] == 'T' ) echo 'checked'?> > Tamil
    <input type="radio" name="lang" value='E' <?if($rs['lang'] == 'E' ) echo 'checked'?> > Englsih
	&nbsp;</td>
  </tr>

  <tr class="tr">
    <td>Image<br></td>
    <td><input type="file" name="file" class="box1"><br>
		<!-- <input type="text" name="browsedImage" value="<?=$rs['image']?>"> -->
	</td>
	<td align="left"><?if($rs["image"]!=""){?><img src="indeximages/<?=$rs["image"]?>" width="50" height="50" border="0" alt=""><?}?>&nbsp;</td>
  </tr>

  <tr class="tr">
    <td>&nbsp;</td>
	<td align="center"><b>(OR)</b></td>
	<td>&nbsp;</td>

  </tr>

    <tr class="tr">
    <td>Enter URL<br></td>
    <td><input type="text" name="link_url" value="<?=$rs["link_url"]?>"  class="box" ></td>
	<td align="left"> <?if($rs["link_url"]!=""){?><img src="<?=$rs["link_url"]?>" width="50" height="50" border="0" alt=""><?}?>&nbsp;</td>
  </tr>

  <tr class="tr">
     <td  valign="top" colspan="3">Description(Tamil)
     <textarea class="ckeditor" cols="180" id="editor1" name="rte1" rows="20"><? echo $rs["description"] ?></textarea>
	 </td>
  </tr>

  <tr class="tr">
     <td  valign="top" colspan="3">Description (English)
	 <textarea class="ckeditor" cols="180" id="editor1" name="rte2" rows="20"><? echo $rs["descriptioneng"];?></textarea></td>
  </tr>

   <tr class="tr">
     <td  valign="top" colspan="3"> <B>(OR)</B></td>

  </tr>

   <tr class="tr">
     <td  valign="top" colspan="3"> Enter Article url :<input name="article_url" type="text" value="<?=$rs["article_url"]?>"  class="box1">(http://www.yahoo.com/article.php)</td>

  </tr>



  <tr class="tr">
    <td height="18">&nbsp;</td>
    <td align="right"><input name="submit" type="submit" class="box2" value="Submit"></td>
    <td height="18">&nbsp;</td>

  </tr>
</table>
</form>



<?}}?>

<? include("adminFooter.php"); ?>
<script language="JavaScript">
<!--
function nullcheck(){
		ad=document.adminimage;
	if (ad.lang[0].checked && ad.shorttitle.value==""){
		alert("Enter a shorttitle");
		ad.shorttitle.focus();
		return false;

	}
	if (ad.lang[1].checked && ad.shorttitleeng.value==""){
		alert("Enter a shorttitle(English)");
		ad.shorttitleeng.focus();
		return false;

	}
	if (ad.lang[0].checked && ad.articletitle.value.length<5){
		alert("Enter a articletitle");
		ad.articletitle.focus();
		return false;

	}
	if (ad.lang[1].checked && ad.articletitleeng.value.length<5){
		alert("Enter a articletitle(English)");
		ad.articletitleeng.focus();
		return false;

	}
  /*	if (ad.file.value!="" && ad.link_url.value!=""){
		alert("Choose either one, browse image or image url.Can't choose both");
		ad.file.focus();
		return false;

	}

	if (ad.file.value=="" && ad.link_url.value==""){
		alert("Choose either one, browse image  or  image url.Both can't be empty");
		ad.file.focus();
		return false;

	}*/

	updateRTE('rte1');
	updateRTE('rte2');

	if ((ad.rte1.value!="" || ad.rte2.value!="" ) && ad.article_url.value!=""){
		alert("Choose either one, Posting article or article url.Can't choose both");
		//ad.index_image.focus();
		return false;
	}


	if (ad.rte1.value=="" && ad.rte2.value==""  && ad.article_url.value==""){
	alert("Enter   article description or article URL.Both can't be empty");
		//document.frm.rte1.focus();
		return false;
	}


	}
//-->
</script>




