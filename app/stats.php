<?
include("include/igtop.php");

echo "<div align=center><font class=yellow><b>Statistics page is still being worked on.</b></font></div>";
die();

$avg_players_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
	$avg_players = mysql_fetch_array($avg_players_query);

$avg_users_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
	$avg_users = mysql_fetch_array($avg_users_query);
$avg_units_query = mysql_db_query($dbnam, "SELECT * FROM military");
	$avg_units = mysql_fetch_array($avg_units_query);

$avg_units[thieves] = $avg_units[thieves] / $avg_players[0];
$avg_units[sages] = $avg_units[sages] / $avg_players[0];
$avg_units[explorers] = $avg_units[explorers] / $avg_players[0];
$avg_units[civ] = $avg_units[civ] / $avg_players[0];

echo "
<div align=center><b class=reg>[ <a href='esscores.php'>Strongest Empires</a> ]</b></div>
<div align=center><b class=reg>[ <a href='emland.php'>Most Land</a> ]</b></div>
<div align=center><b class=reg>[ <a href='emmountains.php'>Most Mountains</a> ]</b></div>
<div align=center><b class=reg>[ <a href='setstrength.php'>Strongest Settlements</a> ]</b></div>
<div align=center><b class=reg>[ <a href='sguild.php'>Strongest Guilds</a> ]</b></div>
<div align=center><b class=reg>[ <a href='stats.php'>Statistics</a> ]</b></div>
<br><br>
<table border='0' bordercolor='#404040' width='80%' align='center' cellspacing='1'>
	<tr>
		<td colspan='5' class='main'><b class='reg'>Statistics</b></td>
	<tr>
		<td class='main2'><b class='reg' width='20%'>Avg. Civilians:</b> $avg_units[civ]</td>
		<td class='main2'><b class='reg' width='20%'>Avg. Civilians:</b> $avg_users[sages]</td>
		<td class='main2'><b class='reg' width='20%'>Avg. Civilians:</b> $avg_users[explorers]</td>
	<tr>
		<td class='main2'><b class='reg' width='20%'>Total Thieves:</b> $avg_units[thieves]</td>
		<td class='main2'><b class='reg' width='20%'>Total Sages:</b> $avg_units[sages]</td>
		<td class='main2'><b class='reg' width='20%'>Average Thieves:</b> $avg_units[explorers]</td>
</table> 
</body>
</html>";
?>