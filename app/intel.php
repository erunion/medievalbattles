<?php

@mysql_connect (localhost, root, password);
mysql_select_db(medieval) or die(darnit);
$dbnam = "medieval";
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
<form type=post action="intel.php">
<center>

<?php
	if(!IsSet($gather))
{
  ?> 

<?php

	$var =   @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Select Empire-</option>
		";

/* Download list of Presidents */
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




<?php
}
else
{
		if($empvalue == ns)
	{echo"You did not specify anyone to gather information on.";die();
	}
	elseif($send == "")
	{echo"You did not send any thieves.";die();
	}
	elseif($send > $thieves)
{echo"You do not have that many thieves to send.";
}
else
	{
		$dbnam = "medievalbattles_com";
	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");
	
	//attackee empire name
		$theirthieves = mysql($dbnam, "SELECT thieves FROM military WHERE userid = '$empvalue'");	
		$tthieves = mysql_result($theirthieves,"tthieves");
	
	if($thieves < $tthieves)
		{echo"You have failed to gather information on $empireattacked and lost 10% of your thieves.";
		
		
$newthieves = $thieves - ($send * .1);
mysql_query("UPDATE military SET thieves =\"$newthieves\" WHERE email='$email' AND pw='$pw'");

		}
		else
		{
				//select iron, gold, warriors, wizards, priests
		$theiriron = mysql($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");	
		$tiron = mysql_result($theiriron,"tiron");
		
		$theirgp = mysql($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
		$tgp = mysql_result($theirgp,"tgp");

		$theirwars = mysql($dbnam, "SELECT warriors FROM military WHERE userid = '$empvalue'");	
		$twars = mysql_result($theirwars,"twars");

		$theirwiz = mysql($dbnam, "SELECT wizards FROM military WHERE userid = '$empvalue'");	
		$twiz = mysql_result($theirwiz,"twiz");

		$theirpri = mysql($dbnam, "SELECT priests FROM military WHERE userid = '$empvalue'");	
		$tpri = mysql_result($theirpri,"tpri");

		$theirciv = mysql($dbnam, "SELECT civ FROM military WHERE userid = '$empvalue'");	
		$tciv = mysql_result($theirciv,"tciv");

$newthieves = $thieves - ($send * .03);
mysql_query("UPDATE military SET thieves =\"$newthieves\" WHERE email='$email' AND pw='$pw'");

		echo"
		    You have successfully gathered information on $empireattacked and you only lost 3% of your thieves!<br><br>
				<table border=1 width=\"40%\" align=center bordercolor=#000000>
		<tr>
			<td class=main colspan=2>Stats of <b class=reg>$empireattacked</b></td>
<tr>
	<td class=inner2>Gold Pieces: $tgp</td>
<tr>
			<td class=inner2>	Iron: $tiron</td>
<tr>
			<td class=inner2>	Civilians: $tciv</td>
<tr>
			<td class=inner2>	Warriors defending $twars<br>
<tr>
			<td class=inner2>	Wizards defending: $twiz</td>
<tr>
			<td class=inner2>	Priests defending: $tpri</td>
			</table>

				";
		
		
		}
	
	}




}
?>
</form>

</table>

   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
