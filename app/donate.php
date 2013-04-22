<?php

  @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(deadon4thline);
$dbnam = "medievalbattles_com";
// save time() in a session var, and on the session start, if that var is older than however long, delete the //session
	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>
<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">
</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>
</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->
 <br><br><br>
<?php
if (!IsSet($donate))
{
?>
<form type=post action="donate.php">
<table border="1" bordercolor="#000000" align=center width="80%">
	<tr>
		<td class=main colspan=2>Donating</td>
	<tr>
		<td class=main2 colspan=2>Here, you can donate metal or gold to the funds</td>
	<tr>
		<td class=inner2>Gold:</td><td class=inner2><input type="number" name="donateg" size=4></td>
	<tr>
		<td class=inner2>Iron:</td><td class=inner2><input type="number" name="donatei" size=4></td>

	<tr>
		<td class=inner2 colspan=2><input type="submit" name="donate" value="Donate" class=button></td>
			<input type="hidden" name="donate" value="3">
</form>

</table>

<?php
}
else
{
		
if($donateg == "" AND $donatei == "")
	{echo"You did not donate anything.";
	}
	else
	{

			$yyourgold = mysql($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
			$yourgold = mysql_result($yyourgold,"yourgold");

			$yyouriron = mysql($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
			$youriron = mysql_result($yyouriron,"youriron");

			$empgold = $gp - $donateg;
			$empiron = $iron - $donatei;
			
			mysql_query("UPDATE user SET gp =\"$empgold\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE user SET iron =\"$empiron\" WHERE  email='$email' AND pw='$pw'"); 
			
			$fundgold = $fgold + $donateg;
			$fundiron = $firon + $donatei;

			mysql_query("UPDATE settlement SET fgold =\"$fundgold\" WHERE setid='$setid'");
			mysql_query("UPDATE settlement SET firon =\"$fundiron\" WHERE  setid='$setid'"); 

	}
}
?>
<!-- body ends here -->	
  </table>
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>