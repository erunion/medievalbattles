<?php include("include/igtop.php");?>

<center>
 <b class=reg></a> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a> |</b>
  </center>
  <br>
  <br>
 

<?php
###############
## warrior weapons
###############
?>
<?php
	if(!IsSet($shortsword))	{
}
else
{    
		include("include/nexplode.php");

		if($warweapon[shortsword] >= 1)	{
			echo"<div align=center><font class yellow>You have already constructed this weapon.<br><br></font></div>";
			include("include/S_WEP.php");
			die();
		}
		elseif($gp < 300000)	{
			echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";
			include("include/S_WEP.php");
			die();
		}
		elseif($iron < 5000)	{
			echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";
			include("include/S_WEP.php");
			die();
		}
			include("include/connect.php");
			$iron = $iron - 5000;
			$gp = $gp - 300000;
		    $exp2 = $exp2 + 5000;	// new exp
			$shortsword = 8;	 // ticks to make
	 
		 	mysql_query("UPDATE user SET iron='$iron' WHERE email='$email' AND pw='$pw'"); 
	  		mysql_query("UPDATE user SET exp2='$exp2' WHERE email='$email' AND pw='$pw'"); 
	 		mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'"); 
	  		mysql_query("UPDATE military SET shortsword= '$shortsword' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET warriorwep= '1' WHERE email='$email' AND pw='$pw'");
					
			echo"<div align=center><font class=yellow>Short Sword is now under construction.<br><br></font></div>";
			include("include/S_WEP.php");
			die();
}
?>

<?php
	if(!IsSet($longsword))
{
 ?>
			
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[longsword] >= 1)
			{echo"<div align=center><font class=yellow>You already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 8000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Long Swords. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 8000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 8000;	// new exp
					$longsword = 14;	// ticks to make
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2=\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET longsword =\"$longsword\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '2' WHERE email='$email' AND pw='$pw'");
			
					echo"<div align=center><font class=yellow>Long Sword is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>

<?php
	if(!IsSet($bastardsword))
{
 ?>
				
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[bastardsword] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 600000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 12000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
	elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Bastard Swords. <br><br></font></div>";include("include/S_WEP.php");die();
			}
	elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Long Swords before you can construct Bastard Swords. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 12000;
					$gp = $gp - 600000;
				    $exp2 = $exp2 + 16000;	// new exp
					$bastardsword = 20;		// ticks to make
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bastardsword =\"$bastardsword\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '3' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Bastard Sword is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
	  				die();
}
?>
<?php
	if(!IsSet($scourge))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[scourge] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 750000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 17000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Scourges. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Long Swords before you can construct Scourges. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[bastardsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Bastard Swords before you can construct Scourges. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 17000;
					$gp = $gp - 750000;
				    $exp2 = $exp2 + 24000;	// new exp
					$scourge = 25;	// ticks to make
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	 				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET scourge =\"$scourge\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '4' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Scourge is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($scimitar))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[scimitar] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 900000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 26000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Scimitars. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Long Swords before you can construct Scimitars. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[bastardsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Bastard Swords before you can construct Scimitars. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scourge] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Scourges before you can construct Scimitars. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					$iron = $iron - 26000;
					$gp = $gp - 900000;
				    $exp2 = $exp2 + 47000;	// new exp
					$scimitar = 30;	// ticks to make
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET scimitar =\"$scimitar\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '5' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Scimitar is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($romsfury))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[romsfury] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 32000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Rom's Fury. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Long Swords before you can construct Rom's Fury. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[bastardsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Bastard Swords before you can construct Rom's Fury. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scourge] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Scourges before you can construct Rom's Fury. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scimitar] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Scimitars before you can construct Rom's Fury. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					$iron = $iron - 32000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 68000;	// new exp
					$romsfury = 36;	// ticks to make
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET romsfury =\"$romsfury\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '6' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Rom's Fury is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($broadsword))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[broadsword] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 2000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 60000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Fighter)
			{echo"<div align=center><font class=yellow>Only fighters can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct long swords before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[bastardsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct axes before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scourge] < 1)
			{echo"<div align=center><font class=yellow>You must first construct great axes before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scimitar] < 1)
			{echo"<div align=center><font class=yellow>You must first construct great axes before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[romsfury] < 1)
			{echo"<div align=center><font class=yellow>You must first construct great axes before you can construct Toledo's Broad Sword. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					$iron = $iron - 60000;
					$gp = $gp - 2000000;
				    $exp2 = $exp2 + 89000;	// new exp
					$broadsword = 42;	// ticks to make
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET broadsword =\"$broadsword\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '7' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Toledo's Broad Sword is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($gandalara))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($warweapon[gandalara] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 3000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 75000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Fighter)
			{echo"<div align=center><font class=yellow>Only fighters can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[shortsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Short Swords before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[longsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Long Swords before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[bastardsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Bastard Swords before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scourge] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Scourges before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[scimitar] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Scimitars before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[romsfury] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Rom's Fury before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($warweapon[broadsword] < 1)
			{echo"<div align=center><font class=yellow>You must first construct Toledo's Broad Sword before you can construct Sword of Gandalara. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					$iron = $iron - 75000;
					$gp = $gp - 3000000;
				    $exp2 = $exp2 + 105000;	// new exp
					$gandalara = 48;	// ticks to make
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET gandalara =\"$gandalara\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriorwep= '8' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Sword of Gandalara is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?
################
##	priest weapons
################
?>
<?php
	if(!IsSet($_mace))
{
 ?>
				
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[mace] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 200000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 4000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
					include("include/connect.php");		
					$iron = $iron - 4000;
					$gp = $gp - 200000;
				    $exp2 = $exp2 + 5000;
					$wep_mace = 8;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET mace =\"$wep_mace\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '1' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Mace is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
	  			
}
?>
<?php
	if(!IsSet($flail))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[flail] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 350000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 8000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 0) 
			{echo"<div align=center><font class=yellow>You must first construct Maces before you can construct Flails.<br><br></font></div>";include("include/S_WEP.php");die();
			}	
					include("include/connect.php");
					$iron = $iron - 8000;
					$gp = $gp - 350000;
				    $exp2 = $exp2 + 10000;
					$flail = 12;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET flail =\"$flail\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '2' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Flail is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($zakarum))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[zakarum] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 12000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Maces before you can construct the Sword of Zakarum. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Sword of Zakarum. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
					include("include/connect.php");
					$iron = $iron - 12000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 20000;
					$zakarum = 18;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET zakarum =\"$zakarum\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '3' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Sword of Zakarum is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($footmanflail))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[footmanflail] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 600000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 17000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Mace before you can construct the Footman's Flail. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Footman's Flail. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[zakarum] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Sword of Zakarum before you can construct the Footman's Flail. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 17000;
					$gp = $gp - 600000;
				    $exp2 = $exp2 + 35000;
					$footmanflail = 22;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET footmanflail =\"$footmanflail\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '4' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Footman's Flail is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($morningstar))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[morningstar] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 750000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 29000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Mace before you can construct the Morning Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Morning Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[zakarum] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Sword of Zakarum before you can construct the Morning Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[footmanflail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Footman's Flail before you can construct the Morning Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 29000;
					$gp = $gp - 750000;
				    $exp2 = $exp2 + 50000;
					$morningstar = 28;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET morningstar =\"$morningstar\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '5' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Morning Star is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($thyorastear))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[thyorastear] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 900000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 30000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Mace before you can construct the Thyora's Tear. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Thyora's Tear. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[zakarum] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Sword of Zakarum before you can construct the Thyora's Tear. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[footmanflail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Footman's Flail before you can construct the Thyora's Tear. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[morningstar] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Morning Star before you can construct the Thyora's Tear. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 30000;
					$gp = $gp - 900000;
				    $exp2 = $exp2 + 70000;
					$thyorastear = 30;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET thyorastear =\"$thyorastear\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '6' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Thyora's Tear is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($isidole))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[isidole] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 40000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Cleric)
			{echo"<div align=center><font class=yellow>Only clerics can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Mace before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[zakarum] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Sword of Zakarum before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[footmanflail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Footman's Flail before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[morningstar] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Morning Star before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[thyorastear] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Thyora's Tear before you can construct the Flail of Isidole. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 40000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 85000;
					$isidole = 34;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET isidole =\"$isidole\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '7' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Flail of Isidole is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($eldamarstar))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($priweapon[eldamarstar] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 2000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 50000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Cleric)
			{echo"<div align=center><font class=yellow>Only clerics can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[mace] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Mace before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[flail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Flails before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[zakarum] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Sword of Zakarum before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[footmanflail] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Footman's Flail before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[morningstar] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Morning Star before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($priweapon[thyorastear] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct Thyora's Tear before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($priweapon[isidole] < 1) 
			{echo"<div align=center><font class=yellow>You must first construct the Flail of Isidole before you can construct the Eldamar's Star. <br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 50000;
					$gp = $gp - 2000000;
				    $exp2 = $exp2 + 100000;
					$eldamarstar = 36;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET eldamarstar =\"$eldamarstar\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priestwep= '8' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Eldamar's Star is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?
###############
## archer weapons
###############
?>
<?php
	if(!IsSet($shortbow))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[shortbow] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 400000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 6000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die(); 
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 6000;
					$gp = $gp - 400000;
				    $exp2 = $exp2 + 5000;
					$shortbow = 8;
	 
					mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET shortbow =\"$shortbow\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '1' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Short Bow is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($ferricbow))
{
 ?>
					
					

<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[ferricbow] >=1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 550000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 10000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php"); die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing Ferric Bows. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 10000;
					$gp = $gp - 550000;
				    $exp2 = $exp2 + 15000;
					$ferricbow = 12;
	 
					
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET ferricbow =\"$ferricbow\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '2' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Ferric Bow is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($keldarsarms))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[keldarsarms] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 600000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 14000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing Keldar's Arms. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing Keldar's Arms. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 14000;
					$gp = $gp - 600000;
				    $exp2 = $exp2 + 30000;
					$keldarsarms = 15;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET keldarsarms =\"$keldarsarms\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '3' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Keldar's Arms are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($splensight))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[splensight] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 800000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 20000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing Splen's Sight. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing Splen's Sight. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[keldarsarms] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Keldar's Arms before constructing Splen's Sight. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 20000;
					$gp = $gp - 800000;
				    $exp2 = $exp2 + 40000;
					$splensight = 18;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET splensight =\"$splensight\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '4' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Splen's Sight is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($bowoftion))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[bowoftion] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 950000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 26000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing the Bow of Tion. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing the Bow of Tion. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[keldarsarms] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Keldar's Arms before constructing the Bow of Tion. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[splensight] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Splen's Sight before constructing the Bow of Tion. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 26000;
					$gp = $gp - 950000;
				    $exp2 = $exp2 + 60000;
					$bowoftion = 26;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bowoftion =\"$bowoftion\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '5' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Bow of Tion is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($dynefian))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[dynefian] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 32000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing The Dynefian. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing The Dynefian. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[keldarsarms] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Keldar's Arms before constructing The Dynefian. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[splensight] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Splen's Sight before constructing The Dynefian. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[bowoftion] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Bow of Tion before constructing The Dynefian. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 32000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 75000;
					$dynefian = 30;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET dynefian =\"$dynefian\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '6' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>The Dynefian is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($heartsong))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[heartsong] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 45000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif($class != Ranger)
			{echo"<div align=center><font class=yellow>Only rangers can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[keldarsarms] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Keldar's Arms before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[splensight] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Splen's Sight before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[bowoftion] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Bow of Tion before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[dynefian] < 1) 
			{echo"<div align=center><font class=yellow>You must construct The Dynefian before constructing the HeartSong. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 45000;
					$gp = $gp - 1500000;
				    $exp2 = $exp2 + 90000;
					$heartsong = 38;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET heartsong =\"$heartsong\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '7' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>HeartSong is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($shyrscream))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($archweapon[shyrscreamsbow] >= 1)
			{echo"<div align=center><font class=yellow>You have already constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 2000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 60000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($res[r13pts] < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif($class != Ranger)
			{echo"<div align=center><font class=yellow>Only rangers can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($archweapon[shortbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Short Bows before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[ferricbow] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Ferric Bows before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[keldarsarms] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Keldar's Arms before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[splensight] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Splen's Sight before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[bowoftion] < 1) 
			{echo"<div align=center><font class=yellow>You must construct Bow of Tion before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[dynefian] < 1) 
			{echo"<div align=center><font class=yellow>You must construct The Dynefian before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($archweapon[heartsong] < 1) 
			{echo"<div align=center><font class=yellow>You must construct the HeartSong before constructing Shyrscream's Bow. <br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 60000;
					$gp = $gp - 2000000;
				    $exp2 = $exp2 + 100000;
					$shyrscreamsbow = 42;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET shyrscreamsbow =\"$shyrscreamsbow\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET archerwep= '8' WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Shyrscream's Bow is now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<? include("include/S_WEP.php"); ?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>