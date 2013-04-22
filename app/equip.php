<?php

$var =  @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";

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
	  
	    
		<center> <b class=reg> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a> | </b></center>

		<br><br>
	<table border=0 bordercolor="#808080" align=center width="80%">
	  <tr>
	    <td class=main colspan=4><b class=reg>Equip Weapon/Magic</b></td>
	
	  <tr>
	    <td class=main2><b class=reg>Units</b></td>
		<td class=main2><b class=reg>Current Weapon</b></td>
		
		
		<td class=main2><b class=reg>Item</b></td>
		<td class=main2><b class=reg>Equip</b></td>
		
	  
<?php
	if(!IsSet($update))
{
   ?> 

	 <form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Warrior</td>
		<td class=inner2><? echo"$cweapon"; ?></td>
		
		
		<td class=inner2><center><select name="uwarrior">
	    <option selected value=ns>-Choose a Weapon-</option>
		<? if($ssword > 0)
				echo"<option value=\"Short Sword\">Short Sword</option>";
			else
				echo"";
			?>
		<?  if($lsword > 0)
					echo"<option value=\"Long Sword\">Long Sword</option>";
				else
					echo"";
			?>
		<? if($axe > 0)
				echo"<option value=\"Axe\">Axe</option>";
			else
				echo"";
			?>
		<? if($gaxe > 0)
				echo"<option value=\"Great Axe\">Great Axe</option>";
			else
				echo"";
			?>
		<? if($club > 0)
				echo"<option value=\"Club\">Club</option>";
			else
				echo"";
			?>
			</select>
			<td class=inner2><center><input class=button type="submit" name="update" value="Equip"></center>
				<input type="hidden" name="update" value="1">
				</form>
			</td>
<?php
}
else
{
		if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($uwarrior === ns)
		{print "You did not specify any weapon to equip."; die();
		}
		else
			{
					
				if($uwarrior == "Short Sword")
						{
							$wspeed = 4;
							$wpower = 7;
			
						}
				if($uwarrior == "Long Sword")
						{
							$wspeed = 5;
							$wpower = 9;
			
						}
				if($uwarrior == "Axe")
						{
							$wspeed = 9;
							$wpower = 12;
			
						}
				if($uwarrior == "Great Axe")
						{
							$wspeed = 12;
							$wpower = 18;
			
						}
				if($uwarrior == "Ice Sword")
						{
							$wspeed = 9;
							$wpower = 20;
			
						}
				if($uwarrior == "Club")
						{
							$wspeed = 5;
							$wpower = 6;
						}
				$newwarpower = $wspeed;
				$newwarspeed = $wpower;


				@mysql_connect (localhost, ziccarelli, pa724);
				mysql_select_db (medievalbattles_com);
				mysql_query("UPDATE military SET cweapon =\"$uwarrior\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET warspeedw =\"$newwarspeed\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET warpower =\"$newwarpower\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>
	
<?php
	if(!IsSet($update2))
{
   ?> 
	 <form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Wizard</td>
		<td class=inner2><? echo"$cspell"; ?></td>
		
		
		<td class=inner2><center>
		<select name="uwizard">
	    <option selected value="ns">-Choose a Spell-</option>
		<option value="Ice Storm">Ice Storm</option>
		<option value="Fireball">Fireball</option>";
		<option value="Magic Missile">Magic Missile</option>
		<option value="Cloud Kill">Cloud Kill</option>
		
		
			</select>
			<td class=inner2><center><input class=button type="submit" name="update2" value="Equip"></center>
				<input type="hidden" name="update2" value="2">
				</form>
			</td>
<?php
}
else
{
		if (!IsSet($update) && $update =="1" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($uwizard === ns)
		{print "You did not specify any spell to equip."; die();
		}
		else
			{
			if($uwizard == "Magic Missile")
						{
							$wspeed = 4;
							$wpower = 5;
			
						}
			if($uwizard == "Ice Storm")
						{
							$wspeed = 5;
							$wpower = 10;
			
						}
				if($uwizard == "Fireball")
						{
							$wspeed = 5;
							$wpower = 15;
			
						}
				if($uwizard == "Cloud Kill")
						{
							$wspeed = 9;
							$wpower = 20;
			
						}
				
				$newwizpower = $wpower;
				$newwizspeed = $wspeed;

				@mysql_connect (localhost, ziccarelli, pa724);
				mysql_select_db (medievalbattles_com);
				mysql_query("UPDATE military SET cspell =\"$uwizard\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET wizspeeds =\"$newwizspeed\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET wizpower =\"$newwizpower\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>
<?php
	if(!IsSet($update3))
{
   ?> 
	<form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Priest</td>
		<td class=inner2><? echo"$cstaff"; ?></td>
		
		
		<td class=inner2><center>
		<select name="upriest">
	    <option selected value="ns">-Choose a Weapon-</option>
		<? if($club > 0)
				echo"<option value=\"Club\">Club</option>";
			else
				echo"";
			?>
		
		</select></td>
		<td class=inner2><center><input class=button type="submit" name="update3" value="Equip"></center>
				<input type="hidden" name="update3" value="3">
				</form>
			</td>
		</table> 
		</form>
<?php
}
else
{
		if (!IsSet($update2) && $update2 =="2" or !IsSet($update) && $update =="1" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($upriest === ns)
		{print "You did not specify any weapon to equip."; die();
		}
		else
			{

				if($upriest == "Club")
						{
							$wspeed = 5;
							$wpower = 6;
						}

				$newpripower = $wpower;
				$newprispeed = $wspeed;
				
				@mysql_connect (localhost, ziccarelli, pa724);
				mysql_select_db (medievalbattles_com);
				mysql_query("UPDATE military SET cstaff =\"$upriest\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET prispeedw =\"$newpripower\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET pripower =\"$newprispeed\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>

<br><br><br>















	<table border=0 bordercolor="#808080" align=center width="80%">
	  <tr>
	    <td class=main colspan=4><b class=reg>Equip Armor</b></td>
	 
	  <tr>
	    <td class=main2><b class=reg>Units</b></td>
		<td class=main2><b class=reg>Current Armor</b></td>
		
		
		<td class=main2><b class=reg>Item</b></td>
		<td class=main2><b class=reg>Equip</b></td>



<?php
	if(!IsSet($update4))
{
   ?> 

	 <form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Warrior</td>
		<td class=inner2><? echo"$wararmor"; ?></td>
		
		
		<td class=inner2><center><select name="uwararmor">
	    <option selected value=ns>-Choose Armor-</option>
		<option value="Studded Leather">Studded Leather</option>";
			
		
			</select>
			<td class=inner2><center><input class=button type="submit" name="update4" value="Equip"></center>
				<input type="hidden" name="update4" value="4">
				</form>
			</td>
<?php
}
else
{
		if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update) && $update =="1" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($uwararmor === ns)
		{print "You did not specify any armor to equip."; die();
		}
		else
			{
			if($wararmor == "Studded Leather")
						{
							$aspeed = 0;
							$mod = -1;
							
			
						}
			if($wararmor == "Chain Shirt")
						{
							$aspeed = 2;
							$mod = -2;
							
			
						}
				if($wararmor == "Chain Mail")
						{
							$aspeed = 5;
							$mod = -4;
							
			
						}
				if($wararmor == "Breast Plate")
						{
							$aspeed = 2;
							$mod = -5;
							
			
						}
				if($wararmor == "Medieval Armor")
						{
							$aspeed = 4;
							$mod = -8;
							
			
						}
				
				$armordef = $mod;
				$armorspeed = $aspeed;
				@mysql_connect (localhost, ziccarelli, pa724);
				 mysql_select_db (medievalbattles_com);
				 mysql_query("UPDATE military SET wararmor =\"$uwararmor\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET wardef =\"$armordef\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET warspeeda =\"$armorspeed\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>
	
<?php
	if(!IsSet($update5))
{
   ?> 
	 <form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Wizard</td>
		<td class=inner2><? echo"$wizarmor"; ?></td>
		
		
		<td class=inner2><center>
		<select name="uwizarmor">
	    <option selected value="ns">-Choose Armor-</option>
		<option value="Robe">Robe</option>
		
		
		
			</select>
			<td class=inner2><center><input class=button type="submit" name="update5" value="Equip"></center>
				<input type="hidden" name="update5" value="5">
				</form>
			</td>
<?php
}
else
{
		if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update) && $update =="1" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($wizarmor === ns)
		{print "You did not specify any armor to equip."; die();
		}
		else
			{
				if($wizarmor == "Robe")
						{
							$aspeed = 0;
							$mod = -1;
							
			
						}
				$armordef = $mod;
				$armorspeed = $aspeed;
				@mysql_connect (localhost, ziccarelli, pa724);
				 mysql_select_db (medievalbattles_com);
				 mysql_query("UPDATE military SET wizarmor =\"$uwizarmor\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET wizdef =\"$armordef\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET wizspeeda =\"$armorspeed\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>
<?php
	if(!IsSet($update6))
{
   ?> 
	<form type=get action="equip.php">	 
	  <tr>
		<td class=inner2>Priest</td>
		<td class=inner2><? echo"$priarmor"; ?></td>
		
		<td class=inner2><center>
		<select name="upriarmor">
	    <option selected value="ns">-Choose Armor-</option>
		<option value="Leather Armor">Leather Armor</option>
			
		</select></td>
		<td class=inner2><center><input class=button type="submit" name="update6" value="Equip"></center>
				<input type="hidden" name="update6" value="6">
				</form>
			</td>
		</table> 
		
<?php
}
else
{
		if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update) && $update =="1")
		{echo""; die();
		}
	elseif($upriarmor === ns)
		{print "You did not specify any armor to equip."; die();
		}
		else
			{
						if($priarmor == "Leather")
						{
							$aspeed = 0;
							$mod = -2;
							
			
						}
				$armordef = $mod;
				$armorspeed = $aspeed;
				@mysql_connect (localhost, ziccarelli, pa724);
				 mysql_select_db (medievalbattles_com);
				 mysql_query("UPDATE military SET priarmor =\"$upriarmor\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET pridef =\"$armordef\" WHERE email='$email' AND pw='$pw'");
				 mysql_query("UPDATE military SET prispeeda =\"$armorspeed\" WHERE email='$email' AND pw='$pw'");
	 }
   }
?>
</table>
<!-- body ends here -->	
  </table>
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>