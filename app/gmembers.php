<?php 

include("include/igtop.php");

include("include/connect.php");
//	determine guild name
$empire_guild_query = mysql_db_query($dbnam, "SELECT guild FROM user WHERE email='$email' AND pw='$pw'");	
$empireguild = mysql_result($empire_guild_query,"empireguild");

if($empireguild == None)	{
	echo"<div align=center><font class=yellow>You must be the member of a guild to view this page.</font></div>";
	die();
}

//	display all empires in said guild
echo "  
<br><br>
<table border=1 bordercolor=#000000 align=center width=80% cellpadding=0 cellspacing=0>
	<tr>
		<td class=main colspan=5><b class=reg>$empireguild Members</b></td>
	<tr>
		<td class=main2 width=><b class=reg></b></td>
		<td class=main2 width=><b class=reg>Empire Name</b></td>
		<td class=main2 width=><b class=reg>AIM</b></td>
		<td class=main2 width=><b class=reg>MSN</b></td>
		<td class=main2 width=><b class=reg>Experience</b></td>";

$query_string = "SELECT ename, aim, msn, exp, userid FROM user WHERE guild='$empireguild' ORDER BY exp DESC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))	{
		
	$SETID_SELECT = mysql_db_query($dbnam, "SELECT setid FROM user WHERE ename='$row[0]'");	
		$t_setid = mysql_result($SETID_SELECT,"t_setid");
	$ONLINE_NO = mysql_db_query($dbnam, "SELECT online FROM user WHERE userid='$row[4]'");	
		$OLINE = mysql_result($ONLINE_NO,"OLINE");
	
	if($OLINE == 1)	{	$O_line = "<font class=red>*</font>";	 }
	else	{	$O_line = "";	}

	$row[3] = number_format($row[3]);	
	$num = $num + 1;
		
    echo "
	<tr align=center valign=top colspan=6>
		<td bgcolor=404040>$num</td>
		<td bgcolor=404040><a href=messaging.php?value=$row[0]&snum=$t_setid&setchg=1>$row[0]($t_setid)</a>$O_line</td>
		<td bgcolor=404040>$row[1]</td>
		<td bgcolor=404040>$row[2]</td>
		<td bgcolor=404040>$row[3]</td>\n";
}
?>
</table>
</td>
</tr>
</table>
</body>
</html>