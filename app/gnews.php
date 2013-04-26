<?php 

include("include/igtop.php");

if($empireguild == None)	{
	echo "<div align=center><font class=yellow><b>You must be the member of a guild to view this page.</b></font></div>";
	die();
}

echo  "
<div align=center>		
	<font class=blue>Empire Leaving/Joining a Guild</font><br>
	<font class=yellow>Attacking (successful/unsuccessful)</font><br>
	<font class=orange>Successfully defended empire</font><br>
	<font class=lg>Unsuccessfully defended empire</font><br>
</div>";

//	determine guild id
$guild_id_query = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname='$empireguild'");
	$guild_id = mysql_fetch_array($guild_id_query);

// display all news in said guild
echo "  
<br><br>
<table border=0 bordercolor=#404040 width=95% align=center cellspacing=1 cellpadding = 0>
	<tr>
		<td colspan=4 class=main><b class=reg>News for $empireguild</b></td>
	<tr align=left>
		<td class=main2 width=20% align=left><b class=reg>Date/Time</b></td>
		<td class=main2 align=left><b class=reg width=80%>News</b></td>";

$query_string = "SELECT date, news, gnid FROM guildnews WHERE gid='$guild_id[gid]' ORDER BY date DESC LIMIT 0, 60";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))	{
	$num = $num + 1;
echo "
	<tr align=center valign=top colspan=6>
		<td bgcolor=404040 align=left>$row[0]</td>
		<td bgcolor=404040 align=left>$row[1]</td>\n";
}
?>

</td>
</tr>
</table>
</body>
</html>