<?php 

include("include/igtop.php");

echo "
<center><br><br>
<table border=1 bordercolor=#000000 align=center width=100% cellpadding=0 cellspacing=0>
	<tr>
		<td colspan=10><b>All Users by Su ID</b></td>
	<tr>
		<td><b>Name</b></td>
		<td><b>Email</b></td>
		<td><b>IP</b></td>
		<td><b>Su ID</b></td>
		<td><b>Cur ID</b></td>
		<td><b>Exp</b></td>
		<td><b>Guild</b></td>
		<td><b>LastLogin</b></td>";

$result_id = mysql_db_query($dbnam, "SELECT ename, email, ip, signup_comp_id, current_comp_id, exp, guild, lastlogin FROM user ORDER BY signup_comp_id ASC");
while ($row = mysql_fetch_row($result_id))	{
	echo "
	<tr align=center valign=top colspan=10>
		<td><tt>$row[0]</tt></td>
		<td><tt>$row[1]</tt></td>
		<td><tt>$row[2]</tt></td>
		<td><tt>$row[3]</tt></td>
		<td><tt>$row[4]</tt></td>
		<td><tt>$row[5]</tt></td>
		<td><tt>$row[6]</tt></td>
		<td><tt>$row[7]</tt></td>\n";
}
echo "</table><br>
</td>
</tr>
</table>
</body>
</html>";