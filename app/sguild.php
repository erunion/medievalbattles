<?php

include("include/igtop.php");

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
		<td colspan='5' class='main'><b class='reg'>Strongest Guilds</b></td>
	<tr>
		<td class='main2'></td>
		<td class='main2' width='50%'><b class='reg'>Guild</b></td>
		<td class='main2'><b class='reg' width='15%'>Empires</b></td>
		<td class='main2'><b class='reg' width='15%'>Strength</b></td>";

	$query_string = "SELECT gname, mem, strength FROM guild ORDER BY strength DESC LIMIT 0,10";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{

		$placeno = $placeno + 1;
		$row[2] = number_format($row[2]);
		
		$guild_mem_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user WHERE guild='$row[0]'");
			$guildmem = mysql_result($guild_mem_query, "guildmem");

echo "
	<tr align='center' valign='top' colspan='7'>
		<td bgcolor='#404040'>$placeno</td>
		<td bgcolor='#404040' align='left'>$row[0]</td>
		<td bgcolor='#404040'>$guildmem</td>
		<td bgcolor='#404040'>$row[2]</td>";
    }

echo "
</table>
</body>
</html>";
?>