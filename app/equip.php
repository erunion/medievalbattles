<?
include("include/igtop.php");

echo "
<center>
<b class=reg> | <a href=disband.php>Disband</a> | <a href=equip.php>Equip</a> | <a href=wconstruct.php>Construct Weapon</a> | <a href=aconstruct.php>Construct Armor</a> |</b>
</center>
<br>";
	
if(!IsSet($update))	{
	include("include/S_EQUIPO.php");
}
else	{

########################
## equip new weapons
########################
	include("include/nexplode.php");

	if($uwarrior == ns AND $uwizard == ns AND $upriest == ns AND $uarcher == ns)	{
		echo"<div align=center><font class=yellow>You did not specify anything to equip.</font></div>";
		include("include/S_EQUIPO.php"); 
		include("include/S_EQUIPA.php");
		die();
		}
	else	{
	// are spells researched?
		if($uwizard == "Fireball" AND $res[r1pts] < 50000)	{
			echo"<div align=center><font class=yellow>You have to research Fireball first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Ice Storm" AND $res[r2pts] < 100000)		{
			echo"<div align=center><font class=yellow>You have to research Ice Storm first to equip it.</dv>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Wall of Fire" AND $res[r3pts] < 200000)	{
			echo"<div align=center><font class=yellow>You have to research Wall of Fire first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Wall of Ice" AND $res[r4pts] < 300000)	{
			echo"<div align=center><font class=yellow>You have to research Wall of Ice first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Chain Lightning" AND $res[r5pts] < 400000)	{
			echo"<div align=center><font class=yellow>You have to research Chain Lightning first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Gust of Wind" AND $res[r6pts] < 500000)		{
			echo"<div align=center><font class=yellow>You have to research Gust of Wind first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Flaming Sphere" AND $res[r7pts] < 600000)	{
			echo"<div align=center><font class=yellow>You have to research Flaming Sphere first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Cloud Kill" AND $res[r8pts] < 700000)	{
			echo"<div align=center><font class=yellow>You have to research Cloud Kill first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Lightning Bolt" AND $res[r9pts] < 800000)	{
			echo"<div align=center><font class=yellow>You have to research Lightning Bolt first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uwizard == "Meteor Swarm" AND $res[r10pts] < 900000)	{
			echo"<div align=center><font class=yellow>You have to research Meteor Swarm first to equip it.</div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
	// is archery researched?
		if($uarcher == "Bow"  AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research Archery before you can do this.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uarcher == "Short Bow" AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research Archery before you can do this.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uarcher == "Long Bow" AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research Archery before you can do this.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uarcher == "Medieval War Bow" AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research Archery before you can do this.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($uarcher == "Acid Bow" AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research Archery before you can do this.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
	// are they a giant?
		if($uwizard != ""  AND $race == Giant)	{
			echo"<div align=center><font class=yellow>You cannot equip Wizards being that you are a Giant.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($upriest != "" AND $race == Giant)	{
			echo"<div align=center><font class=yellow>You cannot equip Priests being that you are a Giant.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($race == Giant AND $uwizard != "")	{
			echo"<div align=center><font class=yellow>You cannot equip Wizards with spells.</div></font";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
		if($class == Ranger AND $uwizard != "")	{
			echo"<div align=center><font class=yellow>You cannot equip Wizards with spells.</div></font";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}

	// warrior weapon stats
		if($uwarrior != ns AND $uwarrior != "")	{	
			if($uwarrior == "Dagger")	{	$wspeed = 6;	$wpower = 2;	$warwep_name = 1;}
			if($uwarrior == "Short Sword")	{	$wspeed = 8;	$wpower = 4;	$warwep_name = $warweapon[shortsword];}
			if($uwarrior == "Long Sword")	 {	$wspeed = 9;	$wpower = 6;	$warwep_name = $warweapon[longsowrd];}
			if($uwarrior == "Bastard Sword")	{	$wspeed = 11;	 $wpower = 8;		$warwep_name = $warweapon[bastardsowrd];}
			if($uwarrior == "Scourge")	{	$wspeed = 13;	 $wpower = 10;	$warwep_name = $warweapon[scourge];}
			if($uwarrior == "Scimitar")	{	$wspeed = 14;	 $wpower = 12;	$warwep_name = $warweapon[scimitar];}
			if($uwarrior == "Rom\'s Fury")	{	$wspeed = 16;	 $wpower = 14;	$warwep_name = $warweapon[romsfury];}
			if($uwarrior == "Toledo\'s Broad Sword")	{	$wspeed = 17;	 $wpower = 16;	$warwep_name = $warweapon[broadsword];}
			if($uwarrior == "Sword of Gandalara")	{	$wspeed = 20;	 $wpower = 18;	$warwep_name = $warweapon[gandalara];}

			if($warwep_name != 1)	{
				echo"<div align=center><font class=yellow>$uwarrior has not been created yet.</font></div>"; 
				include("include/S_EQUIPO.php");
				include("include/S_EQUIPA.php");
				die();
			}		
		
			$warspeedw = $wspeed;
			$warpower = $wpower;
			$cweapon = $uwarrior;
			mysql_query("UPDATE military SET cweapon='$cweapon' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET warspeedw='$warspeedw' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET warpower='$warpower' WHERE email='$email' AND pw='$pw'");
		}

	// wizard spell stats
		if($uwizard != ns AND $uwizard != "")	{
			if($uwizard == "Magic Missile")	{	$wspeed = 4;	$wpower = 3;	}
			if($uwizard == "Fireball")	{	$wspeed = 6;	$wpower = 5;	}
			if($uwizard == "Ice Storm")	{	$wspeed = 7;	$wpower = 7;	}
			if($uwizard == "Wall of Fire")	{	$wspeed = 8;	$wpower = 9;	}
			if($uwizard == "Wall of Ice")	{	$wspeed = 9;	$wpower = 11;	}
			if($uwizard == "Chain Lightning")		{	$wspeed = 10;	 $wpower = 13;	}
			if($uwizard == "Gust of Wind")		{	$wspeed = 11;	 $wpower = 15;	}
			if($uwizard == "Flaming Sphere")		{	$wspeed = 12;	 $wpower = 17;	}
			if($uwizard == "Cloud Kill")		{	$wspeed = 13;	 $wpower = 19;	}
			if($uwizard == "Lightning Bolt")	{	$wspeed = 14;	 $wpower = 21;	}
			if($uwizard == "Meteor Swarm")	{	$wspeed = 15;	 $wpower = 23;	}

			$wizpower = $wpower;
			$wizspeeds = $wspeed;
			$cspell = $uwizard;
			mysql_query("UPDATE military SET cspell='$cspell' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET wizspeeds='$wizspeeds' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET wizpower='$wizpower' WHERE email='$email' AND pw='$pw'");
		}

	// priest weapon stats
		if($upriest != ns AND $upriest != "")	 {
			if($upriest == "Quarterstaff")	{	$wspeed = 4;	$wpower = 2;	$priwep_name = 1;}
			if($upriest == "Mace")	{	$wspeed = 5;	$wpower = 4;	$priwep_name = $priweapon[mace];}
			if($upriest == "Flail")	{	$wspeed = 7;	$wpower = 5;	$priwep_name = $priweapon[flail];}
			if($upriest == "Scepter of Zakarum")	{	$wspeed = 8;	$priwep_name = $priweapon[zakarum];}
			if($upriest == "Footman\'s Flail")	{	$wspeed = 9;	$wpower = 8;	$priwep_name = $priweapon[footmanflail];}
			if($upriest == "Morning Star")	{	$wspeed = 12;	 $wpower = 10;	$priwep_name = $priweapon[morningstar];}
			if($upriest == "Thyora\'s Tear")	{	$wspeed = 14;	 $wpower = 13;	$priwep_name = $priweapon[thyorastear];}
			if($upriest == "Flail of Isidole")	{	$wspeed = 15;	 $wpower = 14;	$priwep_name = $priweapon[isidole];}
			if($upriest == "Eldamar\'s Star")	{	$wspeed = 18;	 $wpower = 15;	$priwep_name = $priweapon[eldamarstar];}

			if($priwep_name != 1)	{
				echo"<div align=center><font class=yellow>$upriest has not been created yet</font></div>"; 
				include("include/S_EQUIPO.php");
				include("include/S_EQUIPA.php");
				die();
			}				

			$pripower = $wpower;
			$prispeedw = $wspeed;
			$cstaff = $upriest;
			mysql_query("UPDATE military SET cstaff='$cstaff' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET prispeedw='$prispeedw' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET pripower='$pripower' WHERE email='$email' AND pw='$pw'");
		}

	// archer weapon stats
		if($uarcher != ns AND $uarcher != "")	{		
			if($uarcher == "Bow")	{	$wspeeda = 4;	 $wpowera = 2;	$archwep_name = 1;}
			if($uarcher == "Short Bow")	{	$wspeeda = 6;	 $wpowera = 5;	$archwep_name = $archweapon[shortbow];}
			if($uarcher == "Ferric Bow")	 {	$wspeeda = 8;	 $wpowera = 7;	$archwep_name = $archweapon[longbow];}
			if($uarcher == "Keldar\'s Arms")	 {	$wspeeda = 9;	 $wpowera = 8;	$archwep_name = $archweapon[keldarsarms];}
			if($uarcher == "Splen\'s Sight")	 {	$wspeeda = 11;	$wpowera = 10;	$archwep_name = $archweapon[splensight];}
			if($uarcher == "Bow of Tion")	 {	$wspeeda = 13;	$wpowera = 12;	$archwep_name = $archweapon[bowoftion];}
			if($uarcher == "The Dynefian")	 {	$wspeeda = 14;	$wpowera = 14;	$archwep_name = $archweapon[dynefian];}
			if($uarcher == "HeartSong")	 {	$wspeeda = 15;	$wpowera = 15;	$archwep_name = $archweapon[heartsong];}
			if($uarcher == "Shyrscream\'s Bow")	 {	$wspeeda = 16;	$wpowera = 16;	$archwep_name = $archweapon[shyrscreamsbow];}

			if($archwep_name != 1)	{
				echo"<div align=center><font class=yellow>$uarcher has not been created yet</font></div>"; 
				include("include/S_EQUIPO.php");
				include("include/S_EQUIPA.php");
				die();
			}		

			$archpower = $wpowera;
			$archspeedw = $wspeeda;
			$cbow = $uarcher;
			mysql_query("UPDATE military SET cbow='$cbow' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET archspeedw='$archspeedw' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET archpower='$archpower' WHERE email='$email' AND pw='$pw'");
		}
				
		echo"<div align=center><font class=yellow>Your troops have been equipped with what you specified.</font></div>";
		include("include/S_EQUIPO.php");
		include("include/S_EQUIPA.php");		
		die();

	}
}

if(!IsSet($update2))	{
	include("include/S_EQUIPA.php");
}
else	{

#######################
## equip new armors
#######################
	include("include/nexplode.php");

	if($uwararmor == ns AND $uwizarmor == ns AND $upriarmor == ns AND $uarcharmor == ns)	{
		echo"<div align=center><font class=yellow>You did not specify any armor to equip.</font></div>"; 
		include("include/S_EQUIPA.php");
		die();
	}
// is archery researched?
	elseif($uarcharmor != "" AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You must research archery first before you can equip your archers.</font></div>";
		include("include/S_EQUIPA.php");
		die();
	}
// are they a giant?
	elseif($uwizarmor != ""  AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You cannot equip wizards being that you are a Giant.</font></div>";
		include("include/S_EQUIPA.php");
		die();
	}
	elseif($upriarmor !=  "" AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You cannot equip priests being that you are a Giant.</font></div>";
		include("include/S_EQUIPA.php");
		die();
	}
	elseif($class == Ranger AND $uwizarmor != "")	{
		echo"<div align=center><font class=yellow>You cannot equip wizards.</div></font>";
		include("include/S_EQUIPA.php");
		die();
	}
	else	{
			
	// warrior armor stats
		if($uwararmor != ns AND $uwararmor != "")	{
			if($uwararmor == "Studded Leather")	{	$aspeed = 0;	$mod = 1;	$A_NAME = 1;	}
			if($uwararmor == "Chain Shirt")	{	$aspeed = 1;	$mod = 3;	$A_NAME = $armor[cs];	}
			if($uwararmor == "Chain Mail")	{	$aspeed = 2;	$mod = 5;	$A_NAME = $armor[cm];	}
			if($uwararmor == "Breast Plate")	{	$aspeed = 3;	$mod = 6;	$A_NAME = $armor[bp];	}
			if($uwararmor == "Medieval Armor")	{	$aspeed = 5;	$mod = 9;	$A_NAME = $armor[fp];	}
		
				if($A_NAME != 1)	{
					echo"<div align=center><font class=yellow>$uwararmor has not been created yet</font></div>"; 
					include("include/S_EQUIPA.php");
					die();
				}

			$wardef = $mod;
			$warspeeda = $aspeed;
			$wararmor = $uwararmor;
			mysql_query("UPDATE military SET wararmor='$wararmor' WHERE email='$email' AND pw='$pw'");
	 		mysql_query("UPDATE military SET wardef='$wardef' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET warspeeda='$warspeeda' WHERE email='$email' AND pw='$pw'");
		}

	// wizard armor stats
		if($uwizarmor != ns AND $uwizarmor != "")	 {
			if($uwizarmor == "Robe")	{	$aspeed = 0;	$mod = 1;	$W_NAME = 1;	 }
			if($uwizarmor == "Travellers Robe")	{	$aspeed = 1;	$mod = 3;	$W_NAME = $armor[tr];	}
			if($uwizarmor == "Magicians Robe")	{	$aspeed = 2;	$mod = 5;	$W_NAME = $armor[mr];	}
			if($uwizarmor == "Mythril Armor")	 {	$aspeed = 3;	$mod = 8;	$W_NAME = $armor[ma];	 }
			
				if($W_NAME != 1)	 {
					echo"<div align=center><font class=yellow>$uwizarmor has not been created yet</font></div>"; 
					include("include/S_EQUIPA.php");
					die();
				}

			$wizdef = $mod;
			$wizspeeda = $aspeed;
			$wizarmor = $uwizarmor;
 			mysql_query("UPDATE military SET wizarmor='$wizarmor' WHERE email='$email' AND pw='$pw'");
 			mysql_query("UPDATE military SET wizdef='$wizdef' WHERE email='$email' AND pw='$pw'");
 			mysql_query("UPDATE military SET wizspeeda='$wizspeeda' WHERE email='$email' AND pw='$pw'");
		}

	// priest armor stats
		if($upriarmor != ns AND $upriarmor != "")	{
			if($upriarmor == "Leather")	 {	$aspeed = 1;	$mod = 2;	$P_name = 1;	}
			if($upriarmor == "Golden Armor")	{	$aspeed = 3;	$mod = 4;	$P_name = $armor[ga];	}
			if($upriarmor == "Blessed Armor")	 {	$aspeed = 5;	$mod = 6;	$P_name = $armor[ba];	}
		
				if($P_name != 1)	{
					echo"<div align=center><font class=yellow>$upriarmor has not been created yet</font></div>"; 
					include("include/S_EQUIPA.php");
					die();
				}

			$pridef = $mod;
			$prispeeda = $aspeed;
			$priarmor = $upriarmor;
			mysql_query("UPDATE military SET priarmor='$priarmor' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET pridef='$pridef' WHERE email='$email' AND pw='$pw'");
		   mysql_query("UPDATE military SET prispeeda='$prispeeda' WHERE email='$email' AND pw='$pw'");
		}

	// archer armor stats
		if($uarcharmor != ns AND $uarcharmor != "")	{
			if($uarcharmor == "Studded Leather")	{	$aspeed = 0;	$mod = 1;	$A_NAME = 1;	}
			if($uarcharmor == "Chain Shirt")	{	$aspeed = 1;	$mod = 3;	$A_NAME = $armor[cs];	}
			if($uarcharmor == "Chain Mail")	{	$aspeed = 2;	$mod = 5;	$A_NAME = $armor[cm];	}
			if($uarcharmor == "Breast Plate")	{	$aspeed = 3;	$mod = 6;	$A_NAME = $armor[bp];	}
			if($uarcharmor == "Medieval Armor")	{	$aspeed = 5;	$mod = 9;	$A_NAME = $armor[fp];	}
		
				if($A_NAME != 1)	{
					echo"<div align=center><font class=yellow>$uarcharmor has not been created yet</font></div>"; 
					include("include/S_EQUIPA.php");
					die();
				}

			$archdef = $mod;
			$archspeeda = $aspeed;
			$archarmor = $uarcharmor;
			mysql_query("UPDATE military SET archarmor='$archarmor' WHERE email='$email' AND pw='$pw'");
 			mysql_query("UPDATE military SET archdef='$archdef' WHERE email='$email' AND pw='$pw'");
 			mysql_query("UPDATE military SET archspeeda='$aspeed' WHERE email='$email' AND pw='$pw'");
		}

		echo"<div align=center><font class=yellow>Your troops have been equipped with what you specified.</font></div>";
		include("include/S_EQUIPA.php");		
		die();
	}
}
?>

</td>
</tr>
</table>
</body>
</html>