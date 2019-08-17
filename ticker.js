			document.onmouseover = MouseHandler;
			document.onmouseout = MouseHandler;
			document.onmousedown = DownHandler;
			document.onmouseup = UpHandler;

			var nScrollDelay = 25
			var browser = navigator.appName;
			var preSpeed=0;

			function IncreaseSpeed()
			{

			if (browser == "Netscape")	{
			preSpeed=document.getElementById('net1').scrollAmount;
			if (preSpeed < 14)
			{
				document.getElementById('net1').scrollAmount= parseInt(preSpeed) + 2;
			}
			
			//alert(document.getElementById('net1').scrollAmount);
			  }else{
				if(nScrollDelay > 10 && nScrollDelay<10000)
				{
					nScrollDelay -= 5 ;
					marquee.scrollDelay = nScrollDelay;
					marquee.trueSpeed = 1;	
					marquee.scrollAmount = 1;
					SaveScrollDelay();
				}
				else if(nScrollDelay > 10000)
				{
					nScrollDelay = 25 ;
					marquee.scrollDelay = nScrollDelay;
					marquee.trueSpeed = 1;	
					marquee.scrollAmount = 1;
					SaveScrollDelay();
				}
			}
			}
			function StopTicker()
			{
			if (browser == "Netscape")	{
			document.getElementById('net1').scrollAmount=0;
			  }else{
				if(nScrollDelay==100000 )
				{
					marquee.scrollDelay = 20;
					nScrollDelay=marquee.scrollDelay;
				}
				else
				{
					marquee.scrollDelay = 100000;
					nScrollDelay=marquee.scrollDelay;
					SaveScrollDelay();
				}				
			}
			}

			function DecreaseSpeed()
			{
			if (browser == "Netscape")	{
			preSpeed=document.getElementById('net1').scrollAmount;
			if (preSpeed > 2)
			{
				document.getElementById('net1').scrollAmount= parseInt(preSpeed) - 2;
			}
			
			//alert(document.getElementById('net1').scrollAmount);
			  }else{
				if(nScrollDelay < 40)
				{
					nScrollDelay += 5;
					marquee.scrollDelay = nScrollDelay ;
					marquee.trueSpeed = 1;
					marquee.scrollAmount = 1;
					SaveScrollDelay();
				}
				else if(nScrollDelay > 10000)
				{
					nScrollDelay = 25 ;
					marquee.scrollDelay = nScrollDelay;
					marquee.trueSpeed = 1;	
					marquee.scrollAmount = 1;
					SaveScrollDelay();
				}

			}
			}


			function SaveScrollDelay()
			{
				var exp = new Date();
				var tenYearsFromNow = exp.getTime() + (10 * 365 * 24 * 60 * 60 * 1000);				
				exp.setTime(tenYearsFromNow);
				document.cookie = "scrolldelay=" + nScrollDelay + "; expires=" + exp.toGMTString();				
			}
			function MouseHandler()
			{
			   if (browser == "Netscape")	
			    return;
				var element = window.event.srcElement;
				if(element.className == "LeftNavOff")
				{
					element.className = "LeftNavUp";
				}
				else if(element.className == "LeftNavUp" || element.className == "LeftNavDown")
				{
					element.className = "LeftNavOff";
				}

			}

			function DownHandler()
			{
			   if (browser == "Netscape")	
			    return;			
				var element = window.event.srcElement;
				if(element.className == "LeftNavOff" || element.className == "LeftNavUp")
				{
					element.className = "LeftNavDown";
				}
			}

			function UpHandler()
			{
			   if (browser == "Netscape")	
			    return;			
				var element = window.event.srcElement;
				if(element.className == "LeftNavDown")
				{
					element.className = "LeftNavUp"
				}

			}