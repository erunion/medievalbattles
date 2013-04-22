<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
	<br><br>
        
		<center>
		 <b class=reg></a> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a></b>
		</center>
		<br><br>
 
<?php
	if(!IsSet($update))
{
 ?>
		 
			<? include("include/S_WSS.php"); ?>

<?php
}
else
{    
		if($ssword >= 1)
			{echo"<div align=center><font class yellow>You have allready constructed this weapon.</font></div>";include("include/S_WSS.php");include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 50000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WSS.php");include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($iron < 5000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WSS.php");include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
			else 
				{ 

					$iron = $iron - 5000;
					$gp = $gp - 50000;
				    $exp2 = $exp2 + 3000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (3000 * 1.05);}
					$ssword = $ssword + 1;
	 
		 			include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	 				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE military SET ssword = \"$ssword\" WHERE email='$email' AND pw='$pw'");
					
					echo"<div align=center><font class=yellow>You have successfully constructed Short Swords for your army.</font></div>";
					include("include/S_WSS.php");include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	 			}
}
?>

<?php
	if(!IsSet($update2))
{
 ?>
			
			<? include("include/S_WLS.php"); ?>

<?php
}
else
{
		if($lsword >=1)
			{echo"<div align=center><font class=yellow>You allready constructed this weapon.</font></div>";include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 75000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($iron < 10000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 10000;
					$gp = $gp - 75000;
				    $exp2 = $exp2 + 7000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (5000 * 1.05);}
					$lsword = $lsword + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2=\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET lsword =\"$lsword\" WHERE email='$email' AND pw='$pw'");
			
					echo"<div align=center><font class=yellow>You have successfully constructed Long Swords for your army.</font></div>";
					include("include/S_WLS.php");include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>


<?php
	if(!IsSet($update3))
{
 ?>
				
				<? include("include/S_WAXE.php"); ?>

<?php
}
else
{
		if($axe >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.</font></div>";include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 275000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($iron < 30000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 30000;
					$gp = $gp - 275000;
				    $exp2 = $exp2 + 25000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (10000 * 1.05);}
				
					$axe = $axe + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET axe =\"$axe\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Axe's for your army.</font></div>";
					include("include/S_WAXE.php");include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
	  				die();
				}
}
?>



 <?php
	if(!IsSet($update5))
{
 ?>
					
				<? include("include/S_WGAXE.php"); ?>

<?php
}
else
{
		if($gaxe >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.</font></div>";include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
			}
		elseif($gp < 750000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif ($iron < 50000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 50000;
					$gp = $gp - 750000;
				    $exp2 = $exp2 + 45000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (25000 * 1.05);}
					$gaxe = $gaxe + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	 				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET gaxe =\"$gaxe\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Great Axe's for your army.</font></div>";
					include("include/S_WGAXE.php");include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>

 <?php
	if(!IsSet($update6))
{
 ?>
					
					<? include("include/S_WIS.php"); ?>

<?php
}
else
{
		if($icesword >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.</font></div>";include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 2000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif ($iron < 100000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 100000;
					$gp = $gp - 2000000;
				    $exp2 = $exp2 + 100000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (35000 * 1.05);}
					$icesword = $icesword + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET icesword =\"$icesword\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Ice Sword's for your army.</font></div>";
					include("include/S_WIS.php");include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>
 

<?php
	if(!IsSet($update4))
{
 ?>
				
				<? include("include/S_WCLUB.php"); ?>

<?php
}
else
{
		if($club >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.</font></div>";include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 150000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif ($iron < 8000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 8000;
					$gp = $gp - 150000;
				    $exp2 = $exp2 + 15000;
					if($class == "Cleric")
					{$exp2 == $exp2 + (15000 * 1.05);}
					$club = $club + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET club =\"$club\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Club's for your army.</font></div>";
					include("include/S_WCLUB.php");include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>
<?php
	if(!IsSet($update7))
{
 ?>
					
					<? include("include/S_WMACE.php"); ?>

<?php
}
else
{
		if($mace >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed this weapon.</font></div>";include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 200000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif ($iron < 15000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			} 
			else 
				{ 

					$iron = $iron - 15000;
					$gp = $gp - 200000;
				    $exp2 = $exp2 + 15000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (15000 * 1.05);}
					$mace = $mace + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET mace =\"$mace\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Mace's for your army.</font></div>";
					include("include/S_WMACE.php");include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>
 <?php
	if(!IsSet($update8))
{
 ?>
					
					<? include("include/S_WGS.php"); ?>

<?php
}
else
{
		if($gs >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.</font></div>";include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 350000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif ($iron < 30000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.</font></div>";include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die(); 
			} 
			else 
				{ 

					$iron = $iron - 30000;
					$gp = $gp - 350000;
				    $exp2 = $exp2 + 25000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (25000 * 1.05);}
					$gs = $gs + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET gs =\"$gs\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Grand Scepters for your army.</font></div>";
					include("include/S_WGS.php");if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}
					die();
	  			}
}
?>
<?php
	if(!IsSet($update9))
{
 ?>
					
					<? if($r6pts >= 125000){include("include/S_WB1.php");} ?>

<?php
}
else
{
		if($bow1 >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.</font></div>";if($r6pts >= 125000){include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 100000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");die();
			}
		elseif ($lumber < 10000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.</font></div>";include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");die(); 
			} 
			else 
				{ 

					$lumber = $lumber - 10000;
					$gp = $gp - 100000;
				    $exp2 = $exp2 + 15000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (15000 * 1.05);}
					$bow1 = $bow1 + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow1 =\"$bow1\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Short Bows for your army.</font></div>";
					include("include/S_WB1.php");include("include/S_WB2.php");include("include/S_WB3.php");
					die();
	  			}
}
?>
<?php
	if(!IsSet($update10))
{
 ?>
					
					<? if($r6pts >= 125000){include("include/S_WB2.php");} ?>

<?php
}
else
{
		if($bow2 >=1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.</font></div>";if($r6pts >= 125000){include("include/S_WB2.php");include("include/S_WB3.php");}die();
			}
		elseif($gp < 25000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WB2.php");include("include/S_WB3.php");die();
			}
		elseif ($lumber < 25000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.</font></div>";include("include/S_WB2.php");include("include/S_WB3.php");die(); 
			} 
			else 
				{ 

					$lumber = $lumber - 25000;
					$gp = $gp - 250000;
				    $exp2 = $exp2 + 25000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (25000 * 1.05);}
					$bow2 = $bow2 + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow2 =\"$bow2\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Long Bows for your army.</font></div>";
					include("include/S_WB2.php");include("include/S_WB3.php");
					die();
	  			}
}
?>
<?php
	if(!IsSet($update11))
{
 ?>
					
					<? if($r6pts >= 125000){include("include/S_WB3.php");} ?>

<?php
}
else
{
		if($bow3 >= 1)
			{echo"<div align=center><font class=yellow>You have allready constructed that weapon.</font></div>";if($r6pts >= 125000){include("include/S_WB3.php");}die();
			}
		elseif($gp < 750000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.</font></div>";include("include/S_WB3.php");die();
			}
		elseif ($lumber < 65000) 
			{echo"<div align=center><font class=yellow>You do not have enough lumber.</font></div>";include("include/S_WB3.php");die(); 
			} 
			else 
				{ 

					$lumber = $lumber - 65000;
					$gp = $gp - 750000;
				    $exp2 = $exp2 + 45000;
					if($class == "Cleric")
					{$exp2 = $exp2 + (45000 * 1.05);}
					$bow3 = $bow2 + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET lumber =\"$lumber\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bow3 =\"$bow3\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Medieval War Bows for your army.</font></div>";
					include("include/S_WB3.php");
					die();
	  			}
}
?>
<!-- body ends here -->
</form>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>