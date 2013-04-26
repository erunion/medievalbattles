<?php 

include("include/igtop.php");

if($empireguild == None)	{
	echo"<div align=center><font class=yellow><b>You must be the member of a guild to view this page.</b></font></div>";
	die();
}
// leave the guild?
if(!IsSet($leave))	{
	echo "<div align=center><b>[ <a href=gmembers.php?leave=true>Leave: $empireguild</a> ]</b>";
}
else	{	
	
	//	insert leaving msg into guild news
	$guild_id_query = mysql_db_query($dbnam, "SELECT gid, owner FROM guild WHERE gname='$empireguild'");
		$guild_id = mysql_fetch_array($guild_id_query);

	$Guild_MaxID = mysql_db_query($dbnam, "SELECT max(gnid) FROM guildnews");
		$mgnid = mysql_result($Guild_MaxID, "mgnid");
		$gnid = $mgnid + 1;

	if($userid == $guild_id[owner])	{
		echo "<div align=center><font class=yellow>You cannot leave your guild because you are Guild Leader.</a><br>";
		die();
	}

	echo "<div align=center><font class=yellow>You have left $empireguild</a><br>";
	
	mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=blue>$ename has left $empireguild</font>', '$guild_id[gid]' , '$gnid') ");
	mysql_query("UPDATE user SET guild='None' WHERE email='$email' AND pw='$pw'");
}

//	display all empires in your guild
echo "
<br><br>
<table border='1' bordercolor='#000000' align='center' width='80%' cellpadding='0' cellspacing='0'>
	<tr>
		<td class='main' colspan='10'><b class=reg>Members of $empireguild</b></td>
	<tr>
		<td class='main2'><b class='reg'></b></td>
		<td class='main2'><b class='reg'>Empire Name</b></td>
		<td class='main2'><b class='reg'>AIM</b></td>
		<td class='main2'><b class='reg'>MSN</b></td>
		<td class='main2'><b class='reg'>Experience</b></td>
		<td class='main2'><b class='reg'>Last Login</b></td>";

$query_string = "SELECT ename, aim, msn, exp, userid, lastlogin FROM user WHERE guild='$empireguild' ORDER BY exp DESC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))	{
		
	$SETID_SELECT = mysql_db_query($dbnam, "SELECT setid FROM user WHERE ename='$row[0]'");	
		$t_setid = mysql_result($SETID_SELECT, "t_setid");
	$ONLINE_NO = mysql_db_query($dbnam, "SELECT online FROM user WHERE userid='$row[4]'");	
		$OLINE = mysql_result($ONLINE_NO, "OLINE");
	
	if($OLINE == 1)	{	$O_line = "<font class=red>*</font>";	 }
	else	{	$O_line = "";	}

	$row[3] = number_format($row[3]);	
	$their_name = urlencode($row[0]);
	$num = $num + 1;
		
    echo "
	<tr align='center' valign='top' colspan='6'>
		<td bgcolor=000000>$num</td>
		<td class='inner2'><a href=messaging.php?value=$their_name&snum=$t_setid&setchg=1>$row[0]($t_setid)</a>$O_line</td>
		<td class='inner2'>$row[1]</td>
		<td class='inner2'>$row[2]</td>
		<td class='inner2'>$row[3]</td>
		<td class='inner2'>$row[5]</td>\n";
}

$guild_strength_query = mysql_db_query($dbnam, "SELECT sum(exp) FROM user WHERE guild='$empireguild'");
	$guild_strength_total = mysql_result($guild_strength_query, "guild_strength_total");
	$guild_strength_total = number_format($guild_strength_total);

echo "
</table>
<br><br>
<div align=center><b><font class=red>Guild Strength:</font></b> $guild_strength_total</div>";
?>
</td>
</tr>
</table>
</body>
</html>