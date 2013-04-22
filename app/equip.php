<?php include("include/igtop.php");?>

<center> <b class=reg> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a> | </b></center><br>

	
<?php
	if(!IsSet($update))
{
   ?> 
			
		<? include("include/S_EQUIPO.php"); ?>

<?php
}
else
{
########################
## Start equipping new weapons
########################
		include("include/nexplode.php");

		if($uwarrior == ns AND $uwizard == ns AND $upriest == ns AND $uarcher == ns)	{
			echo"<div align=center><font class=yellow>You did not specify anything to equip.</font></div>";
			include("include/S_EQUIPO.php"); 
			include("include/S_EQUIPA.php");
			die();
		}
/*
// Warrior Weapons
		elseif($uwarrior != "Dagger" AND $uwarrior != "Short Sword" AND $uwarrior != "Long Sword" AND $uwarrior != "Bastard Sword" AND $uwarrior != "Scourge" AND $uwarrior != "Scimitar" AND $uwarrior != "Rom's Fury" AND $uwarrior != "Toledo's Broad Sword" AND $uwarrior != ns AND $uwarrior != "")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
// Wizard Spells
		elseif($uwizard != "Magic Missile" AND $uwizard != "Fireball" AND $uwizard != "Ice Storm" AND $uwizard != "Wall of Fire" AND $uwizard !=  "Wall of Ice" AND $uwizard !=  "Chain Lightning" AND $uwizard !=  "Gust of Wind" AND $uwizard !=  "Flaming Sphere" AND $uwizard !=  "Cloud Kill" AND $uwizard !=  "Lightning Bolt" AND $uwizard !=  "Meteor Storm" AND $uwizard != ns AND $uwizard != "")	 {
			echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
// Priest Weapons
		elseif($upriest != "Quarterstaff" AND $upriest != "Mace" AND $upriest != "Flail" AND $upriest != "Scepter of Zakarum" AND $upriest != "Footman's Flail" AND $upriest != "Morning Star" AND $upriest != "Thyora's Tear" AND $upriest != "Flail of Isidole" AND $upriest != "Eldamar's Star" AND $upriest != ns AND $upriest != "")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
// Archer Weapons
		elseif($uarcher != "Bow" AND $uarcher != "Short Bow" AND $uarcher != "Ferric Bow" AND $uarcher != "Keldar's Arms" AND $uarcher != "Splen's Sight" AND $uarcher != "Bow of Tion" AND $uarcher != "The Dynefian" AND $uarcher != "HeartSong" AND $uarcher != "Shyrscream's Bow" AND $uarcher != ns AND $uarcher != "")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");
			die();
		}
*/
		else	{
// Make sure spell is researched before equipping wizard spells
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
// Make sure Archery is researched before equipping archer weapons
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
// Make sure they arent a giant before equipping a wizard/priest
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
					include("include/S_EQUIPA.php");
					die();
				}
				if($class == Ranger AND $uwizard != "")	{
					echo"<div align=center><font class=yellow>You cannot equip Wizards with spells.</div></font";
					include("include/S_EQUIPA.php");
					die();
				}
				
				include("include/connect.php");

// Warrior Weapon Stats
			if($uwarrior != ns AND $uwarrior != "")	{	
				if($uwarrior == "Dagger")	{	
						$wspeed = 6;	
						$wpower = 2;
				}
				if($uwarrior == "Short Sword")	{
						$wspeed = 8;
						$wpower = 4;
				}
				if($uwarrior == "Long Sword")	 {
						$wspeed = 9;
						$wpower = 6;
				}
				if($uwarrior == "Bastard Sword")	{
						$wspeed = 11;
						$wpower = 8;
				}
				if($uwarrior == "Scourge")	{
						$wspeed = 13;
						$wpower = 10;
				}
				if($uwarrior == "Scimitar")	{
						$wspeed = 14;
						$wpower = 12;
				}
				if($uwarrior == "Rom\'s Fury")	{
						$wspeed = 16;
						$wpower = 14;
				}
				if($uwarrior == "Toledo\'s Broad Sword")	{
						$wspeed = 17;
						$wpower = 16;
				}
				if($uwarrior == "Sword of Gandalara")	{
						$wspeed = 20;
						$wpower = 18;
				}
			

// Equip new warrior weapon				
				$warspeedw = $wspeed;
				$warpower = $wpower;
				$cweapon = $uwarrior;
				mysql_query("UPDATE military SET cweapon =\"$cweapon\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET warspeedw =\"$warspeedw\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET warpower =\"$warpower\" WHERE email='$email' AND pw='$pw'");
			}

// Wizard Spell Stats
			if($uwizard != ns AND $uwizard != "")	{
				if($uwizard == "Magic Missile")	{
						$wspeed = 4;
						$wpower = 3;
				}
				if($uwizard == "Fireball")	{
						$wspeed = 6;
						$wpower = 5;
				}
				if($uwizard == "Ice Storm")	{
						$wspeed = 7;
						$wpower = 7;
				}
				if($uwizard == "Wall of Fire")	{
						$wspeed = 8;
						$wpower = 9;
				}
				if($uwizard == "Wall of Ice")	{
						$wspeed = 9;
						$wpower = 11;
				}
				if($uwizard == "Chain Lightning")		{
						$wspeed = 10;
						$wpower = 13;
				}
				if($uwizard == "Gust of Wind")		{
						$wspeed = 11;
						$wpower = 15;
				}
				if($uwizard == "Flaming Sphere")		{
						$wspeed = 12;
						$wpower = 17;
				}
				if($uwizard == "Cloud Kill")		{
						$wspeed = 13;
						$wpower = 19;
				}
				if($uwizard == "Lightning Bolt")	{
						$wspeed = 14;
						$wpower = 21;
				}
				if($uwizard == "Meteor Swarm")	{
						$wspeed = 15;
						$wpower = 23;
				}
// Equip new wizard spell
				$wizpower = $wpower;
				$wizspeeds = $wspeed;
				$cspell = $uwizard;
				mysql_query("UPDATE military SET cspell =\"$cspell\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET wizspeeds =\"$wizspeeds\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET wizpower =\"$wizpower\" WHERE email='$email' AND pw='$pw'");
			}

// Priest Weapon Stats
			if($upriest != ns AND $upriest != "")	 {
				if($upriest == "Quarterstaff")	{
						$wspeed = 4;
						$wpower = 2;
				}
				if($upriest == "Mace")	{
						$wspeed = 5;
						$wpower = 4;
				}
				if($upriest == "Flail")	{
						$wspeed = 7;
						$wpower = 5;
				}
				if($upriest == "Scepter of Zakarum")	{
						$wspeed = 8;
						$wpower = 6;
				}
				if($upriest == "Footman\'s Flail")	{
						$wspeed = 9;
						$wpower = 8;
				}
				if($upriest == "Morning Star")	{
						$wspeed = 12;
						$wpower = 10;
				}
				if($upriest == "Thyora\'s Tear")	{
						$wspeed = 14;
						$wpower = 13;
				}
				if($upriest == "Flail of Isidole")	{
						$wspeed = 15;
						$wpower = 14;
				}
				if($upriest == "Eldamar\'s Star")	{
						$wspeed = 18;
						$wpower = 15;
				}
// Equip new priest weapon		
				$pripower = $wpower;
				$prispeedw = $wspeed;
				$cstaff = $upriest;
				mysql_query("UPDATE military SET cstaff =\"$cstaff\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET prispeedw =\"$prispeedw\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET pripower =\"$pripower\" WHERE email='$email' AND pw='$pw'");
			}

// Archer Weapon Stats
			if($uarcher != ns AND $uarcher != "")	{		
				if($uarcher == "Bow")	{
						$wspeeda = 4;
						$wpowera = 2;
				}
				if($uarcher == "Short Bow")	{
						$wspeeda = 6;
						$wpowera = 5;
				}
				if($uarcher == "Ferric Bow")	 {
						$wspeeda = 8;
						$wpowera = 7;
				}
				if($uarcher == "Keldar\'s Arms")	 {
						$wspeeda = 9;
						$wpowera = 8;
				}
				if($uarcher == "Splen\'s Sight")	 {
						$wspeeda = 11;
						$wpowera = 10;
				}
				if($uarcher == "Bow of Tion")	 {
						$wspeeda = 13;
						$wpowera = 12;
				}
				if($uarcher == "The Dynefian")	 {
						$wspeeda = 14;
						$wpowera = 14;
				}
				if($uarcher == "HeartSong")	 {
						$wspeeda = 15;
						$wpowera = 15;
				}
				if($uarcher == "Shyrscream\'s Bow")	 {
						$wspeeda = 16;
						$wpowera = 16;
				}
// 	Equip new archer weapon	
				$archpower = $wpowera;
				$archspeedw = $wspeeda;
				$cbow = $uarcher;
				mysql_query("UPDATE military SET cbow =\"$cbow\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET archspeedw =\"$archspeedw\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET archpower =\"$archpower\" WHERE email='$email' AND pw='$pw'");
			}
				
			echo"<div align=center><font class=yellow>Your troops have been equipped with what you specified.</font></div>";
			include("include/S_EQUIPO.php");
			include("include/S_EQUIPA.php");		
			die();

	 }
   }
?>
<?php
	if(!IsSet($update2))
{
   ?> 

			<? include("include/S_EQUIPA.php"); ?>

<?php
}
else
{
#######################
## Start equipping new armors
#######################
		include("include/nexplode.php");

		if($uwararmor == ns AND $uwizarmor == ns AND $upriarmor == ns AND $uarcharmor == ns)	{
			echo"<div align=center><font class=yellow>You did not specify any armor to equip.</font></div>"; 
			include("include/S_EQUIPA.php");
			die();
		}
// Wizard Armor
		elseif($uwararmor != "Studded Leather" AND $uwararmor != "Chain Shirt" AND $uwararmor != "Chain Mail" AND $uwararmor != "Breast Plate" AND $uwararmor != "Medieval Armor" AND $uwararmor != ns AND $uwararmor != "")	 {
			echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
			include("include/S_EQUIPA.php");
			die();
		}
// Archer Armor
		elseif($uarcharmor != "Studded Leather" AND $uarcharmor != "Chain Shirt" AND $uarcharmor != "Chain Mail" AND $uarcharmor != "Breast Plate" AND $uarcharmor != "Medieval Armor" AND $uarcharmor != ns AND $uarcharmor != "")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>";
			include("include/S_EQUIPA.php");
			die();
			}
// Wizard Armor
		elseif($uwizarmor != "Robe" AND $uwizarmor != "Mythril Armor" AND $uwizarmor != ns AND $uwizarmor != "" AND $uwizarmor != "Travellers Robe" AND $uwizarmor != "Magicians Robe")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
			include("include/S_EQUIPA.php");
			die();
			}
// Priest Armor
		elseif($upriarmor != "Leather" AND $upriarmor != ns and $upriarmor != "Golden Armor" AND $upriarmor != "Blessed Armor" AND $upriarmor != "")	{
			echo"<div align=center><font class=yellow>Invalid item.</font></div>";
			include("include/S_EQUIPA.php");
			die();
		}
// Make sure archery is researched
		elseif($uarcharmor != "" AND $res[r13pts] < 125000)	{
			echo"<div align=center><font class=yellow>You must research archery first before you can equip your archers.</font></div>";
			include("include/S_EQUIPA.php");
			die();
		}
// Make sure they arent a giant before equipping wizards/priests
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
			
				  include("include/connect.php");

// Warrior Weapon Stats
			if($uwararmor != ns AND $uwararmor != "")	{
				if($uwararmor == "Studded Leather")	{
						$aspeed = 0;
						$mod = 1;
						$A_NAME = 1;
				}
				if($uwararmor == "Chain Shirt")	{
						$aspeed = 1;
						$mod = 3;
						$A_NAME = $cs;
				}
				if($uwararmor == "Chain Mail")	{
						$aspeed = 2;
						$mod = 5;
						$A_NAME = $cm;
				}
				if($uwararmor == "Breast Plate")	{
						$aspeed = 3;
						$mod = 6;
						$A_NAME = $bp;
				}
				if($uwararmor == "Medieval Armor")	{
						$aspeed = 5;
						$mod = 9;
						$A_NAME = $fp;
				}
						if($A_NAME != 1)	{
							echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
							include("include/S_EQUIPA.php");
							die();
						}
// Equip new warrior weapon
				$wardef = $mod;
				$warspeeda = $aspeed;
				$wararmor = $uwararmor;
				mysql_query("UPDATE military SET wararmor =\"$wararmor\" WHERE email='$email' AND pw='$pw'");
	 			mysql_query("UPDATE military SET wardef =\"$wardef\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET warspeeda =\"$warspeeda\" WHERE email='$email' AND pw='$pw'");
			}

// Wizard Armor Stats
			if($uwizarmor != ns AND $uwizarmor != "")	 {
				if($uwizarmor == "Robe")	{
						$aspeed = 0;
						$mod = 1;
						$W_NAME = 1;
				}
				if($uwizarmor == "Travellers Robe")	{
						$aspeed = 1;
						$mod = 3;
						$W_NAME = $tr;
				}
				if($uwizarmor == "Magicians Robe")	{
						$aspeed = 2;
						$mod = 5;
						$W_NAME = $mr;
				}
				if($uwizarmor == "Mythril Armor")	 {
						$aspeed = 3;
						$mod = 8;
						$W_NAME = $ma;
				}
						if($W_NAME != 1)	 {
							echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
							include("include/S_EQUIPA.php");
							die();
						}
// Equip new wizard armor
				$wizdef = $mod;
				$wizspeeda = $aspeed;
				$wizarmor = $uwizarmor;
 				mysql_query("UPDATE military SET wizarmor =\"$wizarmor\" WHERE email='$email' AND pw='$pw'");
 				mysql_query("UPDATE military SET wizdef =\"$wizdef\" WHERE email='$email' AND pw='$pw'");
 				mysql_query("UPDATE military SET wizspeeda =\"$wizspeeda\" WHERE email='$email' AND pw='$pw'");
			}

// Priest Armor Stats
			if($upriarmor != ns AND $upriarmor != "")	{
				if($upriarmor == "Leather")	 {
						$aspeed = 1;
						$mod = 2;
						$P_name = 1;
				}
				if($upriarmor == "Golden Armor")	{
						$aspeed = 3;
						$mod = 4;
						$P_name = $ga;
				}
				if($upriarmor == "Blessed Armor")	 {
						$aspeed = 5;
						$mod = 6;
						$P_name = 1;
				}
						if($P_name != 1)	{
							echo"<div align=center><font class=yellow>Invalid item.</font></div>";
							include("include/S_EQUIPA.php");
							die();
						}
// Equip new priest armor
				$pridef = $mod;
				$prispeeda = $aspeed;
				$priarmor = $upriarmor;
				mysql_query("UPDATE military SET priarmor =\"$priarmor\" WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET pridef =\"$pridef\" WHERE email='$email' AND pw='$pw'");
			    mysql_query("UPDATE military SET prispeeda =\"$prispeeda\" WHERE email='$email' AND pw='$pw'");
			}

// Archer Armor Stats
			if($uarcharmor != ns AND $uarcharmor != "")	{
				if($uarcharmor == "Studded Leather")	{
						$aspeed = 0;
						$mod = 1;
						$A_NAME = 1;
				}
				if($uarcharmor == "Chain Shirt")	{
						$aspeed = 1;
						$mod = 3;
						$A_NAME = $cs;
				}
				if($uarcharmor == "Chain Mail")	{
						$aspeed = 2;
						$mod = 5;
						$A_NAME = $cm;
				}
				if($uarcharmor == "Breast Plate")	{
						$aspeed = 3;
						$mod = 6;
						$A_NAME = $bp;
				}
				if($uarcharmor == "Medieval Armor")	{
						$aspeed = 5;
						$mod = 9;
						$A_NAME = $fp;
				}
						if($A_NAME != 1)	{
							echo"<div align=center><font class=yellow>Invalid item.</font></div>"; 
							include("include/S_EQUIPA.php");
							die();
						}
// Equip new priest armor
				$archdef = $mod;
				$archspeeda = $aspeed;
				$archarmor = $uarcharmor;
				mysql_query("UPDATE military SET archarmor =\"$archarmor\" WHERE email='$email' AND pw='$pw'");
 				mysql_query("UPDATE military SET archdef =\"$archdef\" WHERE email='$email' AND pw='$pw'");
 				mysql_query("UPDATE military SET archspeeda =\"$aspeed\" WHERE email='$email' AND pw='$pw'");
			}

			echo"<div align=center><font class=yellow>Your troops have been equipped with what you specified.</font></div>";
			include("include/S_EQUIPA.php");		
			die();
		}
   }
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>