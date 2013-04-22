<?php include("include/igtop.php");?>

<center>
 <b class=reg></a> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a> |</b>
  </center>
  <br>
  <br>
 


<?php
	if(!IsSet($update))
{
 ?>
		 
<?php
}
else
{    
		include("include/nexplode.php");

		if($ssword >= 1)
			{echo"<div align=center><font class yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 50000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 5000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 5000;
					$gp = $gp - 50000;
				    $exp2 = $exp2 + 5000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (10000 * 1.05);}
					$ssword = 9;
	 
		 			mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	 				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE military SET ssword = \"$ssword\" WHERE email='$email' AND pw='$pw'");
					
					echo"<div align=center><font class=yellow>Short Swords are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update2))
{
 ?>
			
<?php
}
else
{
		include("include/nexplode.php");

		if($lsword >=1)
			{echo"<div align=center><font class=yellow>You allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 350000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 10000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($ssword < 1)
			{echo"<div align=center><font class=yellow>You must first construct short swords before you can construct long swords.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 10000;
					$gp = $gp - 350000;
				    $exp2 = $exp2 + 15000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (15000 * 1.05);}
					$lsword = 11;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2=\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET lsword =\"$lsword\" WHERE email='$email' AND pw='$pw'");
			
					echo"<div align=center><font class=yellow>Long Swords are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>

<?php
	if(!IsSet($update3))
{
 ?>
				
<?php
}
else
{
		include("include/nexplode.php");

		if($axe >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 50000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
	elseif($ssword < 1)
			{echo"<div align=center><font class=yellow>You must first construct short swords before you can construct axes.<br><br></font></div>";include("include/S_WEP.php");die();
			}
	elseif($lsword < 1)
			{echo"<div align=center><font class=yellow>You must first construct long swords before you can construct axes.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 50000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 30000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (30000 * 1.05);}
					$axe = 34;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET axe =\"$axe\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Axes are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
	  				die();
}
?>
<?php
	if(!IsSet($update5))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($gaxe >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 75000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($ssword < 1)
			{echo"<div align=center><font class=yellow>You must first construct short swords before you can construct great axes.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($lsword < 1)
			{echo"<div align=center><font class=yellow>You must first construct long swords before you can construct great axes.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($axe < 1)
			{echo"<div align=center><font class=yellow>You must first construct axes before you can construct great axes.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 75000;
					$gp = $gp - 1500000;
				    $exp2 = $exp2 + 50000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (50000 * 1.05);}
					$gaxe = 34;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	 				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET gaxe =\"$gaxe\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Great Axes are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update6))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($icesword >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 5000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 100000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Fighter)
			{echo"<div align=center><font class=yellow>Only fighters can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($ssword < 1)
			{echo"<div align=center><font class=yellow>You must first construct short swords before you can construct ice swords.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($lsword < 1)
			{echo"<div align=center><font class=yellow>You must first construct long swords before you can construct ice swords.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($axe < 1)
			{echo"<div align=center><font class=yellow>You must first construct axes before you can construct ice swords.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gaxe < 1)
			{echo"<div align=center><font class=yellow>You must first construct great axes before you can construct ice swords.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					$iron = $iron - 100000;
					$gp = $gp - 5000000;
				    $exp2 = $exp2 + 80000;
					$icesword = 48;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET icesword =\"$icesword\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Ice Swords are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update4))
{
 ?>
				
<?php
}
else
{
		include("include/nexplode.php");

		if($club >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 150000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 8000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
					include("include/connect.php");		
					$iron = $iron - 8000;
					$gp = $gp - 150000;
				    $exp2 = $exp2 + 15000;
					if($class == "Cleric")
						{$exp2 == $exp2 + (15000 * 1.05);}
					$club = 6;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET club =\"$club\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Clubs are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
	  			
}
?>
<?php
	if(!IsSet($update7))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($mace >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 400000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 25000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($club < 1) 
			{echo"<div align=center><font class=yellow>You must first construct clubs before you can construct maces.<br><br></font></div>";include("include/S_WEP.php");die();
			}	
					include("include/connect.php");
					$iron = $iron - 25000;
					$gp = $gp - 400000;
				    $exp2 = $exp2 + 25000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (25000 * 1.05);}
					$mace = 8;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET mace =\"$mace\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Maces are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update13))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($scepter >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($iron < 45000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($club < 1) 
			{echo"<div align=center><font class=yellow>You must first construct clubs before you can construct scepters.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($mace < 1) 
			{echo"<div align=center><font class=yellow>You must first construct maces before you can construct scepters.<br><br></font></div>";include("include/S_WEP.php");die();
			}	
					include("include/connect.php");
					$iron = $iron - 45000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 45000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (45000 * 1.05);}
					$scepter = 18;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET scepter =\"$scepter\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Scepters are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
 <?php
	if(!IsSet($update8))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($gs >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 3000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($iron < 85000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif($class != Cleric)
			{echo"<div align=center><font class=yellow>Only clerics can construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($race == Giant) 
			{echo"<div align=center><font class=yellow>You are a Giant, you cannot construct this weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($club < 1) 
			{echo"<div align=center><font class=yellow>You must first construct clubs before you can construct maces.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($mace < 1) 
			{echo"<div align=center><font class=yellow>You must first construct maces before you can construct scepters.<br><br></font></div>";include("include/S_WEP.php");die();
			}	
		elseif ($scepter < 1) 
			{echo"<div align=center><font class=yellow>You must first construct scepters before you can construct grand scepters.<br><br></font></div>";include("include/S_WEP.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 85000;
					$gp = $gp - 3000000;
				    $exp2 = $exp2 + 70000;
					$gs = 30;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET gs =\"$gs\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Grand Scepters are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update9))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($bow1 >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 100000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 10000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die(); 
			} 
		elseif ($r6pts < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 10000;
					$gp = $gp - 100000;
				    $exp2 = $exp2 + 20000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (20000 * 1.05);}
					$bow1 = 8;
	 
					mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow1 =\"$bow1\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Short Bows are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update10))
{
 ?>
					
					

<?php
}
else
{
		include("include/nexplode.php");

		if($bow2 >=1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 35000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php"); die();
			} 
		elseif ($r6pts < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow1 < 1) 
			{echo"<div align=center><font class=yellow>You must construct short bows before constructing long bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 30000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 35000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (35000 * 1.05);}
					$bow2 = 15;
	 
					
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow2 =\"$bow2\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Long Bows are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update12))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($bow4 >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 55000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($r6pts < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow1 < 1) 
			{echo"<div align=center><font class=yellow>You must construct short bows before constructing acid bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow2 < 1) 
			{echo"<div align=center><font class=yellow>You must construct long bows before constructing acid bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 55000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 50000;
					if($class == "Cleric")
						{$exp2 = $exp2 + (50000 * 1.05);}
					$bow4 = 20;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow4 =\"$bow4\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Acid Bows are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<?php
	if(!IsSet($update11))
{
 ?>
					
<?php
}
else
{
		include("include/nexplode.php");

		if($bow3 >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif($gp < 3000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_WEP.php");die();
			}
		elseif ($lumber < 75000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.<br><br></font></div>";include("include/S_WEP.php");die();
			} 
		elseif ($r6pts < 125000) 
			{echo"<div align=center><font class=yellow>You must research archery before you can construct any weapons.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow1 < 1) 
			{echo"<div align=center><font class=yellow>You must construct short bows before constructing medieval war bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow2 < 1) 
			{echo"<div align=center><font class=yellow>You must construct long bows before constructing medieval war bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
		elseif ($bow4 < 1) 
			{echo"<div align=center><font class=yellow>You must construct acid bows before constructing medieval war bows.<br><br></font></div>";include("include/S_WEP.php");die(); 
			}
					include("include/connect.php");
					$lumber = $lumber - 75000;
					$gp = $gp - 3000000;
				    $exp2 = $exp2 + 75000;
					$bow3 = 28;
	 
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow3 =\"$bow3\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Medieval War Bows are now under construction.<br><br></font></div>";
					include("include/S_WEP.php");
					die();
}
?>
<? include("include/S_WEP.php"); ?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>