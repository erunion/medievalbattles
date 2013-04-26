<?php

echo "
	<table border='1' bordercolor='#000000' align='center' width='80%'>
		<tr>
			<td class='main' colspan='7' cellpadding='1' cellspacing='0'><b class='reg'>Government for Settlement $setid</b></td>
		<tr>
			<td class='main2'><b class='reg'>Empire Name</b></td>
			<td class='main2'><b class='reg'>AIM</b></td>
			<td class='main2'><b class='reg'>MSN</b></td>
			<td class='main2'><b class='reg'>Last Logged In</b></td>
			<td class='main2'><b class='reg'>Votes Received</b></td>
			<td class='main2'><b class='reg'>Voting For</b></td>";
$query_string = "SELECT ename, aim, msn, lastlogin, vote, votefor, sl, userid FROM user WHERE setid='$setid' ORDER BY userid ASC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))	{
	//	Check to see if AIM is not blank
		$A_result = mysql_db_query($dbnam, "SELECT aim FROM user WHERE aim='$row[aim]'");
		$AIMcheck = mysql_fetch_array($A_result);
			if($AIMcheck[0] != "")	{
				$AIM_SELECT = mysql_db_query($dbnam, "SELECT aim FROM user WHERE ename='$row[0]'");	
	   			$AIM_S = mysql_result($AIM_SELECT, "AIM_S");
				$row[1] = urlencode($row[1]);
				$AIM_VAR = "<a href=\"aim:goim?screenname=$row[1]&message=Hey+its+$ename\"><img src=\"images/aim.gif\" border=\"0\"></a>";
			}
	//	Check to see if SL is there
		$SL_result = mysql_db_query($dbnam, "SELECT sl FROM user WHERE ename='$row[0]'");
		$SLcheck = @mysql_fetch_array($SL_result);
			if($SLcheck[0] == yes)	 {
				$color = "#632910";
				$SL_SELECT = mysql_db_query($dbnam, "SELECT ename FROM user WHERE sl='yes' AND setid='$setid'");
    			$SL_S = mysql_result($SL_SELECT,"SL_S");
			}
			if($SLcheck[0] != yes)	{
				$color = "#404040";
			}
	echo "
		<tr align='center' valign='top' colspan='7'>
			<td bgcolor=$color>$row[0]</td>";
if($AIMcheck[0] != "")	{	echo "<td bgcolor=$color>$AIM_VAR</td>";	}
else	{	echo "<td bgcolor=$color></td>";	}
	echo "
			<td bgcolor=$color>$row[2]</td>
			<td bgcolor=$color>$row[3]</td>
			<td bgcolor=$color>$row[4]</td>
			<td bgcolor=$color>$row[5]</td>\n";
}

echo "</table>"; 

?>
