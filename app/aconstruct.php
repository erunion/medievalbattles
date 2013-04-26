<?	 

include("include/igtop.php");

echo "
<center>
<b class=reg> | <a href=disband.php>Disband</a> | <a href=equip.php>Equip</a> | <a href=wconstruct.php>Construct Weapon</a> | <a href=aconstruct.php>Construct Armor</a> |</b>
</center>
<br>";

$PREFIX = "<div align=center><font class=yellow>";
$SUFFIX = "<br><br></font></div>";

//	chain shirt
if(!IsSet($update2))	{

}
else	{
	include("include/nexplode.php");

	if($gp < 125000)	{
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 10000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[cs] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
		
	include("include/connect.php");
	$iron = $iron - 10000;
	$gp = $gp - 125000;
	$exp2 = $exp2 + 10000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (10000 * 1.05);
	}
	$cs = 4;
	 				
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
		mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
		mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
		mysql_query("UPDATE military SET cs ='$cs' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET warriorarm= '1' WHERE email='$email' AND pw='$pw'");
					
	echo "$PREFIX Chain Shirts are under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	chain mail
if(!IsSet($update3))	{
}
else	{
	include("include/nexplode.php");

	if($gp < 200000)	{
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif ($iron < 20000)	{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif ($armor[cm] >= 1)	 {
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	elseif ($armor[cs] < 1)	{
		echo "$PREFIX You must construct chain shirts before constructing chain mail. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	
	include("include/connect.php");
	$iron = $iron - 20000;
	$gp = $gp - 200000;
	$exp2 = $exp2 + 20000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (20000 * 1.05);
	}
	$cm = 12;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
		mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
		mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
		mysql_query("UPDATE military SET cm ='$cm' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET warriorarm= '2' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Chain Mail is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	breast plate
if(!IsSet($update4))	{
}
else	{
		
	include("include/nexplode.php");

	if($gp < 450000)	{
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 35000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	} 
	elseif($armor[bp] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif ($armor[cs] < 1)	{
		echo "$PREFIX You must construct chain shirts before constructing Breast Plates. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	elseif ($armor[cm] < 1)	{
		echo "$PREFIX You must construct chain mails before constructing Breast Plates. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	
	include("include/connect.php");
	$iron = $iron - 35000;
	$gp = $gp - 450000;
	$exp2 = $exp2 + 40000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (40000 * 1.05);
	}
	$bp = 20;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET bp ='$bp' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET warriorarm= '3' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Breast Plates are under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	medieval armor
if(!IsSet($update6))	{
}
else	{

	include("include/nexplode.php");

	if($gp < 1000000)	 {
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 60000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[fp] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($class != Fighter)	 {
		echo "$PREFIX You must be a Fighter to construct this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif ($armor[cs] < 1)	{
		echo "$PREFIX You must construct chain shirts before constructing Medieval Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	elseif ($armor[cm] < 1)	{
		echo "$PREFIX You must construct chain mails before constructing Medieval Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	elseif ($armor[bp] < 1)	{
		echo "$PREFIX You must construct breast plates before constructing Medieval Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	
	include("include/connect.php");
	$iron = $iron - 60000;
	$gp = $gp - 1000000;
	$exp2 = $exp2 + 60000;
	$fp = 28;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET fp ='$fp' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET warriorarm= '4' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Medieval Armor is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	golden armor
if(!IsSet($update8))	{
}
else	{
		
	include("include/nexplode.php");

	if($gp < 300000)	{
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 25000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[ga] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	
	include("include/connect.php");
	$iron = $iron - 25000;
	$gp = $gp - 300000;
	$exp2 = $exp2 + 30000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (30000 * 1.05);
	}
	$ga = 14;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET ga ='$ga' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET priestarm= '1' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Golden Armor is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	blessed armor
if(!IsSet($update9))	{
}
else	{
	
	include("include/nexplode.php");

	if($gp < 1500000)	 {
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 55000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[ba] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($class != Cleric)	{
		echo "$PREFIX You must be a Cleric to construct blessed armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($armor[ga] < 1)	 {
		echo "$PREFIX You must construct golden armors before constructing Blessed Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	
	include("include/connect.php");
	$iron = $iron - 55000;
	$gp = $gp - 1500000;
	$exp2 = $exp2 + 60000;
	$ba = 34;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET ba ='$ba' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET priestarm= '2' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Blessed Armor is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	travellers robs
if(!IsSet($update10))	{
}
else	{
	
	include("include/nexplode.php");

	if($gp < 1000000)	 {
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($armor[tr] >= 1)	{
		echo "$PREFIX You have allready constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	
	include("include/connect.php");		
	$gp = $gp - 1000000;
	$exp2 = $exp2 + 20000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (20000 * 1.05);
	}
	$tr = 10;
	 
		mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET tr ='$tr' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET wizardarm= '1' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Travellers Robe is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

//	magicians robe
if(!IsSet($update11))	{
}
else	{
	
	include("include/nexplode.php");

	if($gp < 3000000)	 {
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($armor[mr] >= 1)	{
		echo "$PREFIX You have already constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[tr] < 1)	 {
		echo "$PREFIX You must construct Travellers Robe before construction Magicians Robe. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	
	include("include/connect.php");
	$gp = $gp - 3000000;
	$exp2 = $exp2 + 35000;
	if($class == Cleric)	{
		$exp2 = $exp2 + (35000 * 1.05);
	}
	$mr = 20;
	 
		mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET mr ='$mr' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET wizardarm= '2' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX Magicians Robe is under construction. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
				
}

//	mythril armor
if(!IsSet($update7))	{
}
else	{
	
	include("include/nexplode.php");

	if($gp < 5000000)	 {
		echo "$PREFIX You do not have enough gold. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($iron < 40000)		{
		echo "$PREFIX You do not have enough iron. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($armor[ma] == 1)	{
		echo "$PREFIX You have already constructed this armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	} 
	elseif($class != Mage)	{
		echo "$PREFIX You must be a mage to construct Mythril Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die();
	}
	elseif($armor[tr] < 1)	 {
		echo "$PREFIX You must construct travellers robe before construction Mythril Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	elseif($armor[mr] < 1)		{
		echo"$PREFIX You must construct magicians robe before construction Mythril Armor. $SUFFIX";
		include("include/S_ARMOR.php");
		die(); 
	}
	
	include("include/connect.php");
	$iron = $iron - 40000;
	$gp = $gp - 5000000;
	$exp2 = $exp2 + 50000;
	$ma = 30;
	 
		mysql_query("UPDATE user SET iron ='$iron' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET exp2 ='$exp2' WHERE email='$email' AND pw='$pw'"); 
	  	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET ma ='$ma' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET wizardarm= '3' WHERE email='$email' AND pw='$pw'");

	echo "$PREFIX You have successfully constructed Mythril Armor for your army. $SUFFIX";
	include("include/S_ARMOR.php");
	die();
}

include("include/S_ARMOR.php");
?>
</td>
</tr>
</table>
</body>
</html>