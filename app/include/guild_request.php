<table border=0 width="60%" align=center>
	<tr>
		<td class=main colspan=3><b class=reg>Accept/Reject Requests</b></td>
	<tr>
		<td class=main2><b class=reg>Empire Name</b></td>
		<td class=main2><b class=reg>Experience</b></td>
		<td class=main2><b class=reg>Decision</b></td>
<?
$query_string = "SELECT applicant FROM guildrequests WHERE gl_userid='$userid'";
$result_id = mysql_query($query_string);
while ($row = mysql_fetch_row($result_id))	{

	$applicant_query = mysql_db_query($dbnam, "SELECT ename, exp FROM user WHERE userid='$row[0]'");
	$applicant = mysql_fetch_array($applicant_query);

	$applicant[exp] = number_format($applicant[exp]);

	echo "
	<tr align=center valign=top colspan=6>
		<td bgcolor=#404040>$applicant[ename]</td>
		<td bgcolor=#404040>$applicant[exp]</td>
		<td bgcolor=#404040><a href=guildconfig.php?accept=true&auserid=$row[0]>Accept</a> / <a href=guildconfig.php?reject=true&auserid=$row[0]>Reject</a></td>";
	}
?>
</table>
<br><br>