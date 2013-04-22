<?php
		include("include/igtop.php");


	?>

		<!-- BODY OF PAGE BEGINS HERE -->
	
	
        
		<center>
		 <b class=reg>| <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a>|</b>
		  </center>
		   <br>
		    <br>

<?php
	if(!IsSet($update2))
{
 ?>
<?php
}
else
{
	include("include/nexplode.php");

	if($gp < 125000)
		{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
		}
	elseif($iron < 10000) 
		{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
		} 
	elseif($cs >= 1) 
		{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
		} 
		
					include("include/connect.php");
					$iron = $iron - 10000;
					$gp = $gp - 125000;
					$exp2 = $exp2 + 10000;
					if($class == Cleric)
						{$exp2 = $exp2 + (10000 * 1.05);}
					$cs = 4;
	 				
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET cs =\"$cs\" WHERE email='$email' AND pw='$pw'");
					
					echo"<div align=center><font class=yellow>Chain Shirts are under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 200000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif ($iron < 20000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif ($cm >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br><font></div>";include("include/S_ARMOR.php");die(); 
			}
		elseif ($cs < 1) 
			{echo"<div align=center><font class=yellow>You must construct chain shirts before constructing chain mail.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			}
					include("include/connect.php");
					$iron = $iron - 20000;
					$gp = $gp - 200000;
				    $exp2 = $exp2 + 20000;
					if($class == Cleric)
						{$exp2 = $exp2 + (20000 * 1.05);}
					$cm = 12;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET cm =\"$cm\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Chain Mail is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 450000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($iron < 35000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die();
			} 
		elseif($bp >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif ($cs < 1) 
			{echo"<div align=center><font class=yellow>You must construct chain shirts before constructing Breast Plates.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			}
		elseif ($cm < 1) 
			{echo"<div align=center><font class=yellow>You must construct chain mails before constructing Breast Plates.<br><br></div>";include("include/S_ARMOR.php");die(); 
			}
					include("include/connect.php");
					$iron = $iron - 35000;
					$gp = $gp - 450000;
				    $exp2 = $exp2 + 40000;
					if($class == Cleric)
						{$exp2 = $exp2 + (40000 * 1.05);}
					$bp = 20;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bp =\"$bp\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Breast Plates are under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($iron < 60000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($fp >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($class != Fighter)
			{echo"<div align=center><font class=yellow>You must be a Fighter to construct this armor.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif ($cs < 1) 
			{echo"<div align=center><font class=yellow>You must construct chain shirts before constructing Medieval Armor.<br><br></div>";include("include/S_ARMOR.php");die(); 
			}
		elseif ($cm < 1) 
			{echo"<div align=center><font class=yellow>You must construct chain mails before constructing Medieval Armor.<br><br></div>";include("include/S_ARMOR.php");die(); 
			}
		elseif ($bp < 1) 
			{echo"<div align=center><font class=yellow>You must construct breast plates before constructing Medieval Armor.<br><br></div>";include("include/S_ARMOR.php");die(); 
			}
					include("include/connect.php");
					$iron = $iron - 60000;
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 60000;
					$fp = 28;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET fp =\"$fp\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Medieval Armor is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 300000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($iron < 25000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($ga >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
					include("include/connect.php");
					$iron = $iron - 25000;
					$gp = $gp - 300000;
				    $exp2 = $exp2 + 30000;
					if($class == Cleric)
						{$exp2 = $exp2 + (30000 * 1.05);}
					$ga = 14;
	 
					mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET ga =\"$ga\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Golden Armor is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 1500000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($iron < 55000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($ba >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($class != Cleric)
			{echo"<div align=center><font class=yellow>You must be a Cleric to construct blessed armor.<br><br></font></div";include("include/S_ARMOR.php");die();
			}
		elseif($ga < 1)
			{echo"<div align=center><font class=yellow>You must construct golden armors before constructing Blessed Armor.<br><br></font></div";include("include/S_ARMOR.php");die();
			}
					include("include/connect.php");
					$iron = $iron - 55000;
					$gp = $gp - 1500000;
				    $exp2 = $exp2 + 60000;
					$ba = 34;
	 
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET ba =\"$ba\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Blessed Armor is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 1000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($tr >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
	
					include("include/connect.php");		
					$gp = $gp - 1000000;
				    $exp2 = $exp2 + 20000;
					if($class == Cleric)
						{$exp2 = $exp2 + (20000 * 1.05);}
					$tr = 10;
	 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET tr =\"$tr\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Travellers Robe is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 3000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($mr >= 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($tr < 1) 
			{echo"<div align=center><font class=yellow>You must construct travellers robe before construction Magicians Robe.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			}
					include("include/connect.php");
					$gp = $gp - 3000000;
				    $exp2 = $exp2 + 35000;
					if($class == Cleric)
						{$exp2 = $exp2 + (35000 * 1.05);}
					$mr = 20;
	 
					
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET mr =\"$mr\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>Magicians Robe is under construction.<br><br></font></div>";
					include("include/S_ARMOR.php");
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

		if($gp < 5000000)
			{echo"<div align=center><font class=yellow>You do not have enough gold.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($iron < 40000) 
			{echo"<div align=center><font class=yellow>You do not have enough iron.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($ma == 1) 
			{echo"<div align=center><font class=yellow>You have allready constructed this armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			} 
		elseif($class != Mage)
			{echo"<div align=center><font class=yellow>You must be a mage to construct mythril armor.<br><br></font></div>";include("include/S_ARMOR.php");die();
			}
		elseif($tr < 1) 
			{echo"<div align=center><font class=yellow>You must construct travellers robe before construction Mithril Armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			}
		elseif($mr < 1) 
			{echo"<div align=center><font class=yellow>You must construct magicians robe before construction Mithril Armor.<br><br></font></div>";include("include/S_ARMOR.php");die(); 
			}
					include("include/connect.php");
					$iron = $iron - 40000;
					$gp = $gp - 5000000;
				    $exp2 = $exp2 + 50000;
					$ma = 30;
	 
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET ma =\"$ma\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center><font class=yellow>You have successfully constructed Mythral Armor for your army.<br><br></font></div>";
					include("include/S_ARMOR.php");
					die();
}
?>
<? include("include/S_ARMOR.php");?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>