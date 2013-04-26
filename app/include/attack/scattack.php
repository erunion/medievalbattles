<form type=post action="scattack.php">
<?php

if($setchg == 1)	{

	if($snum > 30 OR $snum <= 0)	{
		echo"<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";
		die();
	}

	include("include/connect.php");
	mysql_query("UPDATE user SET csnum='$snum' WHERE email='$email' AND pw='$pw'");
	echo "
		<font class=inner2>You are viewing Settlement $snum</font><br><br>
			<select name=empvalue>
				<option selected value=ns>-Suicide Attack-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$snum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
	}

	echo "</select><br><br>";
}
else	{

	include("include/connect.php");
	echo "
		<font class=inner2>You are viewing Settlement $csnum</font><br><br>
			<select name=empvalue>
				<option selected value=ns>-Suicide Attack-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$csnum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
    }

	echo "</select><br><br>";
}
echo "
</center>
<table border=0 width=50% align=center>
	<tr>
		<td class=main colspan=3><b>Suicide Attack</b>
	<tr>
		<td class=main2><b class=reg>Type</b></td>
		<td class=main2><b class=reg>Available</b></td>
		<td class=main2><b class=reg>Amount</b></td>
	<tr>
		<td class=inner2><b>Suicide Civilian</b></td>
		<td class=inner2>$suicide</td>
		<td class=inner2><input type=number name=send size=8></td>
	<tr>
		<td class=inner2>
			<select name=toatk>
				<option value=ns selected>Suicide on what?</option>
				<option value=civ>Civilians</option>
				<option value=thieve>Thieves</option>
			</select>
		</td>
		<td class=inner2 colspan=2><input type=submit name=suicideatk value=Send class=button></td>
			<input type=hidden name=suicideatk value=1>";
?>