<?php 

include("include/igtop.php");

$num_players_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
	$num_players = mysql_result($num_players_query, "num_players");
$online_query = mysql_db_query($dbnam, "SELECT count(online) FROM user WHERE online='1'");
	$users_online = mysql_result($online_query, "users_online");
$spots_left = 600 - $num_players;


echo"
<table border=0 cellpadding=2 cellspacing=0 width=100% valign=top>
	<tr>
		<td>
			<table border=0 bordercolor=#808080 align=center width=50%>
				<tr>
					<td colspan=2 class=main><b class=top>Current Game Information</b></td>
				<tr>
					<td class=inner2><b><font class=red>Version:</font></b> 3.1</td>
					<td class=inner2><b><font class=red>Slots:</font></b> 600</td>
				<tr>
					<td class=inner2><b><font class=red>Game Admins:</font></b> 3</td>
					<td class=inner2><b><font class=red>Slots Taken:</font></b> $num_players</td>
				<tr>
					<td class=inner2><b><font class=red>Multi/Barter Admins:</font></b> 0</td>
					<td class=inner2><b><font class=red>Slots Left:</font></b> $spots_left</td>
		</td>
	</tr>
</table>
</td>
</tr>
</table>
</body>
</html>";
?>