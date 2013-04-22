<br><br><br>
<form type=post action="gmembers.php">

<table border="1" bordercolor="#000000" align=center width="50%" cellpadding=1 cellpadding=1>
	  <tr>	<td>&nbsp;</td>
	  <tr><td>&nbsp;</td>
	  <tr>
		<td class=main colspan=2>Donate</td>
	  <tr>
		<td class=main2 colspan=2>You can donate gold or iron to your guild's fund.
<br>
<?

include("include/connect.php");
$tablename = "user";

// Determine Guild Name
$setgname = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");	
$setguildname = mysql_result($setgname,"setguildname");

// Extract Setno1
$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE gname='$setguildname'");
$set1 = mysql_result($settlement1,"set1");

// Extract Setno2
$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE gname='$setguildname'");
$set2 = mysql_result($settlement2,"set2");

// Extract Setno3
$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE gname='$setguildname'");
$set3 = mysql_result($settlement3,"set3");

// Extract Setno4
$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE gname='$setguildname'");
$set4 = mysql_result($settlement4,"set4");

// Extract Setno5
$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE gname='$setguildname'");
$set5 = mysql_result($settlement5,"set5");

// Extract Guilds Gold
$yguildgold = mysql($dbnam, "SELECT fgold FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
$guildgold = mysql_result($yguildgold,"guildgold");

// Extract Guilds Gold
$yguildiron = mysql($dbnam, "SELECT firon FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");	
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

echo"Your guild has $guildgold gp and $guildiron iron in the funds";
?></td>

	<tr>
		<td class=inner2>Gold:</td><td class=inner2><input type="number" name="donateg" size=4></td>
	<tr>
		<td class=inner2>Iron:</td><td class=inner2><input type="number" name="donatei" size=4></td>

	<tr>
		<td class=inner2 colspan=2><input type="submit" name="donate" value="Donate" class=button></td>
			<input type="hidden" name="donate" value="3">
	</table>

</form>