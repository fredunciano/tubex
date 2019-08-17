<html>
<head>
<title>404 Page Not Found - Rajinifans.com</title>
</head>
<body>
<h2>404 Page Not Found</h2>
The page you have requested is not found on our server.
<script language="JavaScript">
<!--

	if(location.href.toLowerCase().indexOf(".asp") >= 0 )
		newpath = location.href.toLowerCase().replace(/\.asp/i,".php");
	else
		newpath = location.href.toLowerCase();
	if(document.referrer != newpath)
	{

		redirectURL = "http://www.rajinifans.com";
		newpath = newpath.replace(/\\/g,"%5c");
      newpath = newpath.replace(/www\.rajinifans\.com/g,'rajinifans.com');
      newpath = newpath.replace(/rajinifans\.com/g,'rajinifans.com');
      newpath = newpath.replace(/old\.old\.rajinifans/g,'rajinifans.com');
		document.write('It is possible that the page you requested might have'
			+' got moved as some other page. Please click on the link to'
			+' try loading the new page if you are not redirected automatically'
			+' in 5 seconds:<br><br><a href="'+newpath+'">'+newpath+'</a>');
		setTimeout("location.href= redirectURL;",5000);
	}
//-->
</script>
<p>We regret the inconvenience caused.</p>
</body>
<html>

