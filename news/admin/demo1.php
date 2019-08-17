<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>
<script language="JavaScript" type="text/javascript">
<!--
<?php

//format content for preloading
if (!(isset($_POST["rte2"]))) {
	//$content = "here's the " . chr(13) . "\"preloaded <b>content</b>\"";
	$content1 = rteSafe($content1);
} else {
	//retrieve posted value
	$content1 = rteSafe($_POST["rte2"]);
}
?>//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)

writeRichText('rte2', '<?=$content1;?>', 1000, 1000, true, false);
//-->
</script>

<!-- <p>Click submit to post the form and reload with your rte content.</p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>
 -->
