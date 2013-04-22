			<?
			$yyourgold = mysql($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
			$yourgold = mysql_result($yyourgold,"yourgold");

			$yyouriron = mysql($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
			$youriron = mysql_result($yyouriron,"youriron");
			?>
		

			<form type=post action=sl.php>
			<table border=0 width=\"60%\" align=center>
			  <tr>
				<td colspan=2 class=main><b class=reg>Funds</b></td>
			  <tr>
				<td colspan=2 class=main2>Your settlement has <? echo"$yourgold gp"; ?> and <? echo"$youriron iron";?> in the fund.</td>
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

$query_string = "SELECT userid, ename FROM user WHERE setid = '$setid'";
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