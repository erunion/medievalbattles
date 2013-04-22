<?php
 			
echo"<form type=get action=guildconfig.php>";
// Extract Setno1
$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE owner=\"$ename\"");
$set1 = mysql_result($settlement1,"set1");

// Extract Setno2
$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE owner=\"$ename\"");
$set2 = mysql_result($settlement2,"set2");

// Extract Setno3
$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE owner=\"$ename\"");
$set3 = mysql_result($settlement3,"set3");

// Extract Setno4
$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE owner=\"$ename\"");
$set4 = mysql_result($settlement4,"set4");

// Extract Setno5
$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE owner=\"$ename\"");
$set5 = mysql_result($settlement5,"set5");

echo"<br><br>
	<table border=0 bordercolor=\"#000000\" width=40%  align=center>
	<tr class=main>
	  <td class=main colspan=2><b class=other>Kick a Settlement</b></td>
	<tr>
	  <td class=main2><b class=other>Settlement:</b></td>
	  <td class=inner2><select name=kset>
	    <option selected value=ns>-Settlement-</option>";
		if($set1 != 0)echo"<option value=$set1>$set1</option>";
		if($set2 != 0)echo"<option value=$set2>$set2</option>";
		if($set3 != 0)echo"<option value=$set3>$set3</option>";
		if($set4 != 0)echo"<option value=$set4>$set4</option>";
		if($set5 != 0)echo"<option value=$set5>$set5</option>";
		echo"
		<tr>
		  <td class=inner2 colspan=2><input class=button type=submit name=kick value=Kick></center>
						   <input type=hidden name=kick value=1></select></td></table><br><br>";
		
echo"</form>";
?>