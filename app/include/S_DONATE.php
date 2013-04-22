	<form type=post action="donate.php">

<table border="1" bordercolor="#000000" align=center width="50%">
	  <tr>
		<td class=main colspan=2>Donating</td>
	  <tr>
		<td class=main2 colspan=2>Here, you can donate metal or gold to the funds
<br><? 	$yyourgold = mysql($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
			$yourgold = mysql_result($yyourgold,"yourgold");

			$yyouriron = mysql($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
			$youriron = mysql_result($yyouriron,"youriron");
echo"Your settlement has $yourgold gp and $youriron iron in the funds"; ?></td>
	<tr>
		<td class=inner2>Gold:</td><td class=inner2><input type="number" name="donateg" size=10></td>
	<tr>
		<td class=inner2>Iron:</td><td class=inner2><input type="number" name="donatei" size=10></td>

	<tr>
		<td class=inner2 colspan=2><input type="submit" name="donate" value="Donate" class=button></td>
			<input type="hidden" name="donate" value="3">

</form>