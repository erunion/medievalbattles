<?php
 			
echo"<form type=get action=guildconfig.php>";

// Retrieve Guild Name
$guild_name_query = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE owner='$userid'");
	$guild_name = mysql_result($guild_name_query, "guild_name");

echo "<br><br>
<table border=0 bordercolor=#000000 width=20%  align=center>
	<tr class=main>
		<td class=main><b class=reg>Remove an Empire</b></td>
	<tr>
		<td class=inner2>
			<select name=remp>
			<option selected value=ns>- - - - - - - -</option>";
				$query_string = "SELECT userid, ename FROM user WHERE guild='$guild_name' ORDER BY userid ASC";
				$result_id = mysql_db_query($dbnam, $query_string);
				while ($row = mysql_fetch_row($result_id))	{
					echo "<option value=$row[0]>$row[1]</option>\n";
				}
echo "
</table>
<br>
<center><input class=button type=submit name=kick value=Remove></center>
<input type=hidden name=kick value=1></select><br><br>";
		
echo "</form>";
?>