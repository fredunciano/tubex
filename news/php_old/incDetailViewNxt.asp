<%
title=REQUEST("title")
query = "SELECT * FROM index_page where id <" & title & " order by id Desc limit 0,10" 

SET rs2=SERVER.CREATEOBJECT("ADODB.recordset")
rs2.open query,strConnection
%>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td align="right"><img src="/images/lhsbox1.jpg" width="13" height="33" border="0" alt=""></td>
	<td background="/images/lhsboxtopbg.jpg" width="150" height="33" align="left" valign="middle" class="movieReview">&nbsp;&nbsp;Other Articles</td>
	<td align="left"><img src="/images/lhsbox2.jpg" width="14" height="33" border="0" alt=""></td>
</tr>
<tr>
	<td background="/images/lhsbox_lhsbg.jpg" width="13" height="11"></td>
	<td  bgcolor="#EAEFF2">

				<table cellpadding='4' cellspacing='4' border='0' width='' class='content' align='center'>
				<% while not  rs2.EOF %>			
						<tr>
						<td width="13%" height="20" align="center"><img src="http://rajinifans.com/images/star.jpg" width="8" height="7"></td>
						<td class='heading'>
						<%if(rs("article_url")<>"") then%>
						<A  HREF=<%=rs2("article_url")%> class="movieReview" target="_blank"><%=rs2("articletitle")%></A>
						<%else%>
						<A  HREF="detailView.asp?title=<%=rs2("id")%>" class="movieReview"><%=rs2("articletitle")%></A>
						<%end if%>
						</td>
						</tr>
				<%	rs2.movenext
					wend

				rs2.close()
				SET rs2=NOTHING


				%>
				</table>

	<td width="14" height="13" background="/images/lhsbox_rhsbg.jpg" class="movieReview" ></td>
</tr>
<tr>
	<td><img src="/images/lhsbox4.jpg" width="13" height="11" border="0" alt=""></td>
	<td><img src="/images/lhsbox_botbg.jpg" width="150" height="11" border="0" alt=""></td>
	<td><img src="/images/lhsbox3.jpg" width="14" height="11" border="0" alt=""></td>
</tr>
</table>

