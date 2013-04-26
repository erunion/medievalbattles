<?php 

include("include/igtop.php");

$set_notice_query = mysql_db_query($dbnam, "SELECT setnotice FROM settlement WHERE setid='$setid'");
	$setnotice = mysql_fetch_array($set_notice_query);

$guild_notice_query = mysql_db_query($dbnam, "SELECT notice FROM guild WHERE gname='$empireguild'");
	$guildnotice = mysql_fetch_array($guild_notice_query);

echo"
<table border=0 cellpadding=2 cellspacing=0 width=100% valign=top>
	<tr>
		<td>
			<table border=0 bordercolor=#808080 align=center width=70%>
				<tr>
					<td colspan=2 class=main><b class=top>Main Menu</b></td>
				<tr>	
					<td colspan=2 class=main2>The empire of <b class=top> $ename ($setid)</td>
				<tr>
					<td class=inner2><b><font class=red>Race/Class:</font></b> $race $class</td>
					<td class=inner2><b><font class=red>Civilians:</font></b> $civ</td>
				<tr>
					<td class=inner2><b><font class=red>Experience:</font></b> $exp</td>
					<td class=inner2><b><font class=red>Iron:</font></b> $iron</td>
				<tr>
					<td class=inner2><b><font class=red>Land:</font></b> $land</td>
					<td class=inner2><b><font class=red>Mountains:</font></b> $mts</td>	
				<tr>
					<td class=inner2><b><font class=red>Gold Pieces:</font></b> $gp</td>
					<td class=inner2><b><font class=red>Food:</font></b> $food</td>
				<tr>";
if($res[r13pts] >= 125000)	 {
	echo "
					<td class=inner2><b><font class=red>Lumber:</font></b> $lumber</td>
					<td class=inner2><b><font class=red>Empire Defense:</font></b> $tdefense</td>";	
}
else	{
	echo "		
					<td class=inner2 colspan=2><b><font class=red>Empire Defense:</font></b> $tdefense</td>";
}
echo "				</tr>
			</table>
		</td>
	</tr>
	<tr align=center>
		<td>
			<table border=0 bordercolor=#808080 width=70%>
				<tr><td class=slglnotice><b><font class=red>SL Notice:</font></b></td><td class=slglnotice width=80%>$setnotice[0]</td>";
	if($empireguild != None)	{
		echo "<tr><td class=slglnotice><b><font class=red>GL Notice:</font></b></td><td class=slglnotice width=80%>$guildnotice[0]</td>";
	}
?>
		</td>
	</tr>
</table>
<br><br>
<?
// are they a guild leader?
$guild_leader_query = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
	$GL = mysql_fetch_array($guild_leader_query);

echo "<div align=center>
	<b>&nbsp;[&nbsp;<a href=main.php?pageid=news>Empire News</a>&nbsp;]&nbsp;</b>";
if($sl == yes)	{	echo "<b>&nbsp;[&nbsp;<a href=sl.php>Settlement Management</a>&nbsp;]&nbsp;</b>";	}
if($GL[0] == $userid)		{	echo "<b>&nbsp;[&nbsp;<a href=guildconfig.php>Guild Management</a>&nbsp;]&nbsp;</b>";	 }

echo "</b></div><br><br>";

if ($pageid == 'news')	{
	$empnews_sel = mysql_db_query($dbnam, "SELECT count(yourid) FROM empnews WHERE yourid='$userid'") or die(mysql_error());	
	$emp_sel = mysql_result($empnews_sel,"emp_sel");
	
	if($emp_sel == 0 OR $emp_sel == "")	{
		echo"<div align=center><font class=yellow>You do not have any news to display.</font></div>";
		die();
	}

	mysql_query("UPDATE user SET nno='0' WHERE email='$email' AND pw='$pw'");

echo "
		<table border=0 bordercolor=#404040 width=80% align=center cellspacing=1>
			<tr>
				<td colspan=3 class=main><b class=reg>Empire News</b></td>
			<tr>
				<td class=main2 width=20%><b class=reg>Date</b></td>
				<td class=main2><b class=reg>News</b></td>";

	$query_string = "SELECT date, news FROM empnews WHERE yourid='$userid' ORDER BY date DESC";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "
			<tr align=left valign=top>
				<td bgcolor=404040>$row[0]</td>
				<td bgcolor=404040>$row[1]</td>\n";
	}
?>

</table>
</td></table>
<? } ?>

</td>
</tr>
</table>
</body>
</html>