<form type=post action="messaging.php">
<center>

<?php
if($setchg == 1)	{
	if($snum > 30 OR $snum <= 0)	{
		echo "<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";
		die();
	}

	mysql_query("UPDATE user SET csnum='$snum' WHERE email='$email' AND pw='$pw'");
	echo "
		<font class='inner2'>You are viewing Settlement $snum</font><br><br>
		<select name='empvalue'>
			<option selected value='ns'>-Select an Empire-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid='$snum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value='$row[0]' ";
		if($row[0] == $send_to)	{	echo "selected";	}
		echo " >$row[1]</option>";
	}

	echo "
		</select>
		<br><br>";
	}
	else	{

		echo "
		<font class='inner2'>You are viewing Settlement $csnum</font><br><br>
		<select name='empvalue'>
			<option selected value='ns'>-Select an Empire-</option>";

		$query_string = "SELECT userid, ename FROM user WHERE setid='$csnum'";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))	{
			echo "<option value='$row[0]' ";
			if($row[0] == $send_to)	{	echo "selected";	}
			echo " >$row[1]</option>";
		}

		echo "
			</select>
			<br><br>";
	}

echo "
</center>
<table border='0' bordercolor='silver' width='80%' align='center'>
	<tr>
		<td align='center'><textarea name='umessage' rows='10' cols='50' wrap='physical'></textarea>
</table>
<center><input type='submit' name='sendmessage' value='Send Message' class='button'></center>
<input type='hidden' name='sendmessage' value='1'>";
?>