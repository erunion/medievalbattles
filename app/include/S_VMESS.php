<font class=orange><div align=center><b>All messages get deleted after 4 days</b></div></font><br>
<?php
 

			include("include/connect.php");
			$tablename = "user";
echo "  <br><br>
		<table border=1 bordercolor=#000000 align=center width=\"90%\" cellpadding = 3 cellspacing = 0>
		<tr>
		  <td class=\"main\" colspan=\"5\"><b class=\"reg\">View Messages</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Origin</b></td>
		  <td class=\"main2\" width=80%><b class=\"reg\">Message</b></td>
		 

";

		$query_string = "SELECT origin, datesent, message, mid FROM messages WHERE yourid = '$userid' ORDER BY datesent DESC";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {
				$link = $row[0];
				// check to see if he/shes allready a GL
					$squery = ("SELECT setid FROM user WHERE ename=\"$row[0]\"");
					$sresult = mysql_query($squery);
					$setcheck = mysql_fetch_array($sresult);
					if($setcheck[0] != "")
						{
							$their_set = mysql($dbnam, "SELECT setid FROM user WHERE ename = \"$row[0]\"");	
							$snum = mysql_result($their_set,"snum");
							$link = "<a href=\"messaging.php?value=$row[0]&snum=$snum&setchg=1\">$row[0]($snum)</a>";
						}

					$row[2] = htmlspecialchars($row[2]);
		    print("<TR ALIGN=center VALIGN=TOP colspan=6>
				   <td bgcolor=#404040>$link</td>
				  
				   <td bgcolor=#404040 align=left width=75%>$row[2]<br><br><font size=1px class=orange><i>Recieved $row[1]</i></font></td>\n");
		    }

	


		echo "
				</table>
				<br>
		";
?>