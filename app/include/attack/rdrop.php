<?
echo "
<form type=post action=attackr.php>
<div align=center>";

if($setchg == 1)	{
	$maxset0 = mysql_db_query($dbnam, "SELECT max(setid) AS maxset FROM settlement");
		$maxset = mysql_result($maxset0,"maxset");

	if($snum > $maxset OR $snum <= 0)	{
		echo"<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";
		die();
	}

	mysql_query("UPDATE user SET csnum =\"$snum\" WHERE email='$email' AND pw='$pw'");

	echo "
		<font class=inner2>You are viewing Settlement $snum</font><br><br>
		<select name=empvalue>
			<option selected value=ns>-Resource Attack-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$snum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
	}

	echo "
		</select><br><br>";
}
else	{
	
	echo "
		<font class=inner2>You are viewing Settlement $csnum</font><br><br>
		<select name=empvalue>
			<option selected value=ns>-Resource Attack-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$csnum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
    }

	echo "
		</select>
		<br><br>";
}
echo "</div>";
?>