<?session_start();
if (!isset($_SESSION["username"])){
header("Location: index.php?status=pw");
}?>
<?

include("adminHeader.php"); ?>
<form name="adminimage" action="adminHome.php" method="post"  ENCTYPE="multipart/form-data" onSubmit="return nullcheck();" >
<table width="96%" border="0" cellpadding="3" cellspacing="0" class="tab">
  <tr>
    <td height="20" colspan="2" class="content"><strong>Add New Articles</strong></td>
  </tr>
<tr class="tr">
    <td>Always stay on top:<br></td>
    <td colspan=2 align=left><input type="radio" name="ontop" value='Y'> Yes <input type="radio" name="ontop" value='N' checked> No
	&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Short Title (Tamil):<br></td>
    <td><input type="text" name="shorttitle" class="box1" ></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Article Title (Tamil):<br></td>
    <td><input type="text" name="articletitle" class="box1" ></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Short Title (English):<br></td>
    <td><input type="text" name="shorttitleeng" class="box1" ></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Article Title (English):<br></td>
    <td><input type="text" name="articletitleeng" class="box1" ></td>
	<td>&nbsp;</td>
  </tr>
<tr class="tr">
    <td>Default Language:<br></td>
    <td colspan=2 align=left><input type="radio" name="lang" value='T' checked> Tamil <input type="radio" name="lang" value='E'> Englsih
	&nbsp;</td>
  </tr>

  <tr class="tr">
    <td>Image<br></td>
    <td><input type="file" name="file" class="box1" >&nbsp; &nbsp; (OR) &nbsp;&nbsp;</td>
    <td> Enter url :<input name="link_url" type="text" class="box1">(http://www.yahoo.com/images/logo_new.gif)</td>

  <tr class="tr">
     <td  valign="top" colspan="3">Description (Tamil)<textarea class="ckeditor" cols="80" id="editor1" name="rte1" rows="10">
			 </textarea></td>
  </tr>

  <tr class="tr">
     <td  valign="top" colspan="3">Description (English)<textarea class="ckeditor" cols="80" id="editor1" name="rte2" rows="10">
			 </textarea></td>
  </tr>

   <tr class="tr">
     <td  valign="top" colspan="3"> <B>(OR)</B></td>

  </tr>

   <tr class="tr">
     <td  valign="top" colspan="3"> Enter Article url :<input name="article_url" type="text" class="box1">(http://www.yahoo.com/article.php)</td>

  </tr>


  <!-- hidden variables -->
  <input name="action" type="hidden" value="add">
  <tr class="tr">
    <td height="18">&nbsp;</td>
    <td align="center"><input name="submit" type="submit" class="box2" value="Submit"></td>
    <td>&nbsp;</td>

  </tr>
</table>
</form>
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
	if (ad.index_image.value!="" && ad.link_url.value!=""){
		alert("Choose either one, browse image or image url.Can't choose both");
		ad.index_image.focus();
		return false;

	}

	if (ad.index_image.value=="" && ad.link_url.value==""){
		alert("Choose either one, browse image  or  image url.Both can't be empty");
		ad.index_image.focus();
		return false;

	}

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