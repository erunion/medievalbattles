<form type=post action="exp-atk.php">
<?php

if($setchg == 1)	{

	if($snum > 60 OR $snum <= 0)	{
		echo"<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";
		die();
	}

	include("include/connect.php");
	mysql_query("UPDATE user SET csnum='$snum' WHERE email='$email' AND pw='$pw'");
	echo "<select name=empvalue>
				<option selected value=ns>-Select an Empire-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$snum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
	}

	echo "</select><br><br>";
}
else	{

	include("include/connect.php");
	echo "<select name=empvalue>
				<option selected value=ns>-Select an Empire-</option>";

	$query_string = "SELECT userid, ename FROM user WHERE setid = '$csnum'";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "<option value=$row[0]>$row[1]\n</option>";
    }

	echo "</select><br><br>";
}
?>
</center>
<table border="1" bordercolor="#000000" align=center width="40%" cellpadding=0 cellspacing=0>
	<tr>
		<td class=main colspan=2><b class=reg>Explorer Attack</b></td>
	<tr>
		<td class=main2 colspan=2>Here, you can attack someones explorers.<br>
		You have <? echo "$dogs Rottweilers"; ?> available.</td>
	<tr>
		<td class=inner2>Thieves:</td><td class=inner2><input type="number" name="send" size=10></td>
	

	<tr>
		<td class=inner2 colspan=2><input type="submit" name="exploreratk" value="Send" class=button></td>
			<input type="hidden" name="exploreratk" value="1">