<?php 

include("include/igtop.php");

echo "
<center><br><br>
<table border=1 bordercolor=#000000 align=center width=95% cellpadding=0 cellspacing=0>
	<tr>
		<td class=main colspan=10><b class=reg>All Users</b></td>
	<tr>
		<td class=main2><b class=reg>Name</b></td>
		<td class=main2><b class=reg>Email</b></td>
		<td class=main2><b class=reg>IP</b></td>
		<td class=main2><b class=reg>Mtns</b></td>
		<td class=main2><b class=reg>Land</b></td>
		<td class=main2><b class=reg>Exp</b></td>
		<td class=main2><b class=reg>Guild</b></td>
		<td class=main2><b class=reg>LastLogin</b></td>";

$result_id = mysql_db_query($dbnam, "SELECT ename, email, ip, mts, land, exp, guild, lastlogin FROM user ORDER BY email ASC");
while ($row = mysql_fetch_row($result_id))	{
	echo "
	<tr align=center valign=top colspan=10>
		<td class=main2><font class=grey>$row[0]</td>
		<td class=main2><font class=grey>$row[1]</td>
		<td class=main2><font class=grey>$row[2]</td>
		<td class=main2><font class=grey>$row[3]</td>
		<td class=main2><font class=grey>$row[4]</td>
		<td class=main2><font class=grey>$row[5]</td>
		<td class=main2><font class=grey>$row[6]</td>
		<td class=main2><font class=grey>$row[7]</td>\n";
}
echo "</table><br>
</td>
</tr>
</table>
</body>
</html>";