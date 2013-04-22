<?
include("include/connect.php");
$tablename = "user";

// Determine Guild Name
$setgname = mysql_db_query($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
$setguildname = mysql_result($setgname,"setguildname");

// Extract Setno1
$settlement1 = mysql_db_query($dbnam, "SELECT setno1 FROM guild WHERE gname = '$setguildname'");
$set1 = mysql_result($settlement1,"set1");

// Extract Setno2
$settlement2 = mysql_db_query($dbnam, "SELECT setno2 FROM guild WHERE gname = '$setguildname'");
$set2 = mysql_result($settlement2,"set2");

// Extract Setno3
$settlement3 = mysql_db_query($dbnam, "SELECT setno3 FROM guild WHERE gname = '$setguildname'");
$set3 = mysql_result($settlement3,"set3");

// Extract Setno4
$settlement4 = mysql_db_query($dbnam, "SELECT setno4 FROM guild WHERE gname = '$setguildname'");
$set4 = mysql_result($settlement4,"set4");

// Extract Setno5
$settlement5 = mysql_db_query($dbnam, "SELECT setno5 FROM guild WHERE gname = '$setguildname'");
$set5 = mysql_result($settlement5,"set5");

// Extract Guilds Gold
$yguildgold = mysql_db_query($dbnam, "SELECT fgold FROM guild WHERE setno1 = '$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
$guildgold = mysql_result($yguildgold,"guildgold");

// Extract Guilds Gold
$yguildiron = mysql_db_query($dbnam, "SELECT firon FROM guild WHERE setno1 = '$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");	
$guildiron = mysql_result($yguildiron,"guildiron");

if ($guildgold > 0) {
	$guildgold = $guildgold;
}
else {
	$guildgold = 0;
}

if ($guildiron > 0) {
	$guildiron = $guildiron; 
}
else {
	$guildiron = 0;
}
?>
		

			<form type=post action=guildconfig.php>
			<table border=0 width=\"60%\" align=center>
			  <tr>
				<td colspan=2 class=main><b class=reg>Funds</b></td>
			  <tr>
				<td colspan=2 class=main2>Your settlement has <? echo"$guildgold gp"; ?> and <? echo"$guildiron iron";?> in the fund.</td>
			  <tr>
				<td class=inner2><b class=other>Gold:</b></td><td class=inner2><input type=number name=goldd></td>
			  <tr>
				<td class=inner2><b class=other>Iron:</b></td><td class=inner2><input type=number name=irond></td>	
			  <tr>
				<td class=inner2 colspan=2><br>
			
<?php

include("include/connect.php");
$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Donate-</option>
		";

$query_string = "SELECT userid, ename FROM user WHERE setid='$set1' OR setid='$set2' OR setid='$set3' OR setid='$set4' OR setid='$set5'";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
    print("<option value=$row[0]>$row[1]\n</option>");
    }


echo "
		
		</select>
<br><br>";

?>
			</td>
		<tr>
			<center><td class=inner2 colspan=2><input class=button type="submit" name="donate" value="Donate"></center>
			<input type="hidden" name="donate" value="3">
	</table>
			</form>