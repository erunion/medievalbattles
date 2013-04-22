<form type=post action="messaging.php">
<center>

<?php
if($setchg == 1)	{
	if($snum > 60 OR $snum <= 0)	{
		echo "<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";
		die();
	}

	include("include/connect.php");
	$tablename = "user";
	mysql_query("UPDATE user SET csnum ='$snum' WHERE email='$email' AND pw='$pw'");
	echo "
		<select name=empvalue>
			<option selected value=ns>-Select an Empire-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$snum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		print("<option value=$row[0]>$row[1]\n</option>");
	}

	echo "
		</select>
		<br><br>";
	}
	else	{

		include("include/connect.php");
		$tablename = "user";

		echo "
			<select name=empvalue>
			<option selected value=ns>-Select an Empire-</option>";

		$query_string = "SELECT userid, ename FROM user WHERE setid = '$csnum'";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))	{
			print("<option value=$row[0]>$row[1]\n</option>");
		}

		echo "
			</select>
			<br><br>";
	}
?>
</center>
<table border="0" bordercolor="silver" width="80%"  align=center>
	<tr>
		<td align=center><textarea name="umessage" rows=15 cols=50 wrap></textarea>
</table>
<center><input type="submit" name="sendmessage" value="Send Message" class=button></center>
<input type="hidden" name="sendmessage" value="1">