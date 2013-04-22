<?php

 @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
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
<br><br>
<?

		if($sl === no)
		{
			echo"<center><b class=yellow>You are not a SL!</b>";
			die();
		}
		else
		{
		
		}
		?>
			

<?php
	if(!IsSet($update))
{
  ?> 
	<?	
		$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$setid'");	
		$settlepic = mysql_result($ssettlementpic,"settlepic");	
		$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$setid'");	
		$settlename = mysql_result($ssettlementname,"settlename"); 
	?>

			<form type=post action=sl.php>
		<table border=0 width=\"60%\" align=center>
			<tr>
				<td colspan=2 class=main><b class=reg>Settlement Options</b></td>
			<tr>
				<td colspan=2 class=main2>Here, you can select a settlement name and picture for your settlement.</td>
			<tr>
				<td class=inner2><b class=other>Settlement Name:</b></td><td class=inner2><input type=text name=thesetname value=<? echo"$settlename"; ?>></td>
				<br>
			<tr>
				<td class=inner2><b class=other>Settlement pic URL:</b></td><td class=inner2><input type=text name=theseturl value=<? echo"$settlepic"; ?>></td>
				<br>
			<tr>
				<td class=inner2 colspan=2>		
					<center><input type="submit" name="update" value="Update" class=button></center>
							<input type="hidden" name="update" value="1">
				</td>
			</table>
			
			
<?php
}
else
{
	
	

		    mysql_query("UPDATE settlement SET setpic =\"$theseturl\" WHERE setid='$setid'");
			mysql_query("UPDATE settlement SET setname =\"$thesetname\" WHERE  setid='$setid'");

}


?>					
</form>
			
			
				<form type=post action=sl.php>
		<table border=0 width=\"60%\" align=center>
			<tr>
				<td colspan=2 class=main><b class=reg>Guild Selection</b></td>
			<tr>
				<td colspan=2 class=main2>Make sure you enter in all of the information correctly, Guild name <br> and Guild password are case sensitive.</td>
			<tr>
				<td class=inner2><b class=other>Guild Name:</b></td><td class=inner2><input type=text name=theguildname></td>
				<br>
			<tr>
				<td class=inner2><b class=other>Guild Password:</b></td><td class=inner2><input type=password name=thepw></td>
			</table>
			</form>
			
<?php
	if(!IsSet($donate))
{
  ?> 			
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
				<td class=inner2><b class=other>Metal:</b></td><td class=inner2><input type=number name=metald></td>	
		<tr>
		<td class=inner2 colspan=2><br>
			
<?php

	$var =   @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Donate-</option>
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
			</td>
		<tr>
			<center><td class=inner2 colspan=2><input class=button type="submit" name="donate" value="Donate"></center>
			<input type="hidden" name="donate" value="3">
	</table>
			</form>
			
<?php
}
else
{

$dbnam = "medievalbattles_com";
			$yyourgold = mysql($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
			$yourgold = mysql_result($yyourgold,"yourgold");

			$yyouriron = mysql($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
			$youriron = mysql_result($yyouriron,"youriron");

		if($empvalue == ns)
	{echo"You did not choose someone to donate to.";die();
	}
	elseif($goldd == "" AND $irond == "")
	{echo"You did not choose to donate anything from the funds.";die();
	}
	elseif($goldd > $yourgold)
	{echo"You cannot donate that much gold.";die();
	}
	elseif($irond > $youriron)
	{echo"You cannot donate that much metal.";die();
	}
	else
		{
			
		$empiregold = mysql($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
		$empgold = mysql_result($empiregold,"empgold");	
		$empireiron = mysql($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");
		$empiron = mysql_result($empireiron,"empiron");


		    $newgold = $fgold - $goldd;
			$newmetal = $fmetal - $metald;
			
			mysql_query("UPDATE settlement SET fgold =\"$newgold\" WHERE setid='$setid'");
			mysql_query("UPDATE settlement SET firon =\"$newiron\" WHERE  setid='$setid'");

			$yournewgold = $gp + $goldd;
			$yournewmetal = $iron + $irond;

			mysql_query("UPDATE user SET gp =\"$yournewgold\" WHERE userid='$empvalue'");
			mysql_query("UPDATE user SET metal =\"$yournewiron\" WHERE  userid='$empvalue'"); 
			
		die();
			
	}	
			
}


?>	
		



   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>