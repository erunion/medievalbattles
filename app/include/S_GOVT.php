


<?php

 include("include/connect.php");
	$tablename = "user";

echo "
		<table border=1 bordercolor=#000000 align=center width=\"80%\">
		<tr>
		  <td class=\"main\" colspan=\"7\" cellpadding=1 cellspacing=0><b class=\"reg\">Settlement: $setid</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">AIM</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">MSN</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Last Logged In</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Votes Received</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Voting For</b></td>
		
";


		$query_string = "SELECT ename, aim, msn, lastlogin, vote, votefor, sl, userid FROM user WHERE setid='$setid' ORDER BY userid ASC";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

					//CHECK TO SEE IF AIM NAME ISNT BLANK
						$A_query = ("SELECT aim FROM user WHERE aim='$row[1]'");
						$A_result = mysql_query($A_query);
						$AIMcheck = mysql_fetch_array($A_result);
							if($AIMcheck[0] != "")
								{

									$AIM_SELECT = mysql($dbnam, "SELECT aim FROM user WHERE ename = \"$row[0]\"");	
	    							$AIM_S = mysql_result($AIM_SELECT,"AIM_S");
									$AIM_VAR = "<a href=\"aim:goim?screenname=$row[1]&message=Hey+its+$ename\"><img src=\"images/aim.gif\" border=\"0\"></a>";

								}
					 

						//CHECK TO SEE IF SL IS THERE
						$SL_query = ("SELECT sl FROM user WHERE ename='$row[0]'");
						$SL_result = mysql_query($SL_query);
						$SLcheck = mysql_fetch_array($SL_result);
							if($SLcheck[0] == yes)
								{$color = "#632910";
									$SL_SELECT = mysql($dbnam, "SELECT ename FROM user WHERE sl='yes' AND setid='$setid'");	
	    							$SL_S = mysql_result($SL_SELECT,"SL_S");

								}
							if($SLcheck[0] != yes)
								{$color = "#404040";} 

				


		    	print("<TR ALIGN=center VALIGN=TOP colspan=7>
				<td bgcolor=$color>$row[0]</td>");
			//"#404040"	
				if($AIMcheck[0] != ""){echo"<td bgcolor=$color>$AIM_VAR</td>";} else{echo"<td bgcolor=$color></td>";}
				print("
				<td bgcolor=$color>$row[2]</td>
				<td bgcolor=$color>$row[3]</td>
				<td bgcolor=$color>$row[4]</td>
				<td bgcolor=$color>$row[5]</td>
				\n");
		    }

		echo "</table>"; 

?>