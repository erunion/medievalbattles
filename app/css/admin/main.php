<?php 

include("include/igtop.php");

$num_players_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
	$num_players = mysql_result($num_players_query, "num_players");
$online_query = mysql_db_query($dbnam, "SELECT count(online) FROM user WHERE online='1'");
	$users_online = mysql_result($online_query, "users_online");
$spots_left = 450 - $num_players;


echo "
	<p>&nbsp;</p>
	<b>Current Game Information</b><br>
	<br>
	Slots: 450<br>
	Slots Taken: $num_players<br>
	Slots Left: $spots_left<br>

	</body>
	</html>";

?>