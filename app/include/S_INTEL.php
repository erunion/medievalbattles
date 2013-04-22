<form type=post action="intel.php">
<?php

	
	if($setchg == 1)
	{

		if($snum > 40 OR $snum <= 0)
			{echo"<font class=yellow><div align=center>Settlement $snum does not exist.</font></div><br><br>";die();}

			include("include/connect.php");
			$tablename = "user";
			mysql_query("UPDATE user SET csnum =\"$snum\" WHERE email='$email' AND pw='$pw'");
		echo "
			<select name=empvalue>
				<option selected value=ns>-Select an Empire-</option>
		";

		$query_string = "SELECT userid, ename FROM user WHERE setid = '$snum'";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {
		    print("<option value=$row[0]>$row[1]\n</option>");
		    }

		echo "
				</select>
				<br><br>
		";
	}
	else
	{

	include("include/connect.php");
	$tablename = "user";


echo "
	<select name=empvalue>
	    <option selected value=ns>-Select an Empire-</option>
		";

/* Download list of Presidents */
$query_string = "SELECT userid, ename FROM user WHERE setid = '$csnum'";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
    print("<option value=$row[0]>$row[1]\n</option>");
    }

echo "
		</select>
		<br><br>
";

	}
?>
</center>



</center>
<table border="1" bordercolor="#000000" align=center width="60%">
	<tr>
		<td class=main colspan=2><b class=reg>Itelligence</b></td>
	<tr>
		<td class=main2 colspan=2>Here, you can gather information on an empire.<br>
		You have <? echo"$thieves thieves"; ?> available.</td>
	<tr>
		<td class=inner2>Thieves:</td><td class=inner2><input type="number" name="send" size=4></td>
	

	<tr>
		<td class=inner2 colspan=2><input type="submit" name="gather" value="Send" class=button></td>
			<input type="hidden" name="gather" value="1">

