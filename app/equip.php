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
		
		include("include/nexplode.php");

		if($uwarrior == ns AND $uwizard == ns AND $upriest == ns AND $uarcher == ns)
			{echo"<div align=center><font class=yellow>You did not specify anything to equip.</font></div>";include("include/S_EQUIPO.php"); include("include/S_EQUIPA.php");die();
			}
		elseif($uwarrior != "Short Sword" AND $uwarrior != "Long Sword" AND $uwarrior != "Axe" AND $uwarrior != "Great Axe" AND $uwarrior != "Ice Sword"  AND $uwarrior != ns AND $uwarrior != "Dagger" AND $uwarrior != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($uwizard != "Magic Missile" AND $uwizard != "Ice Storm" AND $uwizard != "Fireball" AND $uwizard != "Cloud Kill" AND $uwizard !=  "Lightning Bolt"  AND $uwizard != ns AND $uwizard != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($upriest != "Spiked Club" AND $upriest != ns AND $upriest != "Quarterstaff" AND $upriest != "Mace" AND $upriest != "Grand Scepter" AND $upriest != "" AND $upriest != "Scepter")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($uarcher != "Bow" AND $uarcher != "Short Bow" AND $uarcher != "Long Bow" AND $uarcher != "Medieval War Bow" AND $uarcher != ns AND $uarcher != "" AND $uarcher != "Acid Bow")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>";include("include/S_EQUIPO.php"); include("include/S_EQUIPA.php");die();
			}
		else
			{


				if($uwizard == "Fireball" AND $r1pts < 50000)
					{echo"<div align=center><font class=yellow>You have to research Fireball first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard == "Ice Storm" AND $r2pts < 200000)
					{echo"<div align=center><font class=yellow>You have to research Ice Storm first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard == "Cloud Kill" AND $r3pts < 500000)
					{echo"<div align=center><font class=yellow>You have to research Cloud Kill first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard == "Lightning Bolt" AND $r7pts < 800000)
					{echo"<div align=center><font class=yellow>You have to research Lightning Bolt first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uarcher == "Bow"  AND $r6pts < 125000)
					{echo"<div align=center><font class=yellow>You must research archery before you can do this.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uarcher == "Short Bow" AND $r6pts < 125000)
					{echo"<div align=center><font class=yellow>You must research archery before you can do this.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uarcher == "Long Bow" AND $r6pts < 125000)
					{echo"<div align=center><font class=yellow>You must research archery before you can do this.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uarcher == "Medieval War Bow" AND $r6pts < 125000)
					{echo"<div align=center><font class=yellow>You must research archery before you can do this.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uarcher == "Acid Bow" AND $r6pts < 125000)
					{echo"<div align=center><font class=yellow>You must research archery before you can do this.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard != ""  AND $race == Giant)
					{echo"<div align=center><font class=yellow>You cannot equip wizards being that you are a Giant.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($upriest != "" AND $race == Giant)
					{echo"<div align=center><font class=yellow>You cannot equip priests being that you are a Giant.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($race == Giant AND $uwizard != "")
					{echo"<div align=center><font class=yellow>You cannot equip wizards with spells.</div></font";include("include/S_EQUIPA.php");die();
					}
				if($class == Ranger AND $uwizard != "")
					{echo"<div align=center><font class=yellow>You cannot equip wizards with spells.</div></font";include("include/S_EQUIPA.php");die();
					}
				
				include("include/connect.php");

			if($uwarrior != ns AND $uwarrior != "")
			  {	

				if($uwarrior == "Dagger")
					{
							$wspeed = 8;
							$wpower = 2;
							$w_c_name = 1;
					}
				if($uwarrior == "Short Sword")
						{
							$wspeed = 10;
							$wpower = 3;
							$w_c_name = $ssword;
						}
				if($uwarrior == "Long Sword")
						{
							$wspeed = 11;
							$wpower = 4;
							$w_c_name = $lsword;
						}
				if($uwarrior == "Axe")
						{
							$wspeed = 15;
							$wpower = 7;
							$w_c_name = $axe;
						}
				if($uwarrior == "Great Axe")
						{
							$wspeed = 17;
							$wpower = 10;
							$w_c_name = $gaxe;
						}
				if($uwarrior == "Ice Sword")
						{
							$wspeed = 20;
							$wpower = 15;
							$w_c_name = $icesword;
						}
			
				
						if($w_c_name != 1)
								{echo"<div align=center><font class=yellow>You need to construct $uwarrior first before you use it.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
					
						$warspeedw = $wspeed;
						$warpower = $wpower;
						$cweapon = $uwarrior;
						
						mysql_query("UPDATE military SET cweapon =\"$cweapon\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET warspeedw =\"$warspeedw\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET warpower =\"$warpower\" WHERE email='$email' AND pw='$pw'");

				}
	
			



			if($uwizard != ns AND $uwizard != "")
			  {
			
				if($uwizard == "Magic Missile")
						{
							$wspeed = 11;
							$wpower = 3;
						
						}
				if($uwizard == "Fireball")
						{
							$wspeed = 13;
							$wpower = 7;
						
						}
				if($uwizard == "Ice Storm")
						{
							$wspeed = 16;
							$wpower = 10;
						
						}
				if($uwizard == "Cloud Kill")
						{
							$wspeed = 19;
							$wpower = 14;
						
						}
				if($uwizard == "Lightning Bolt")
						{
							$wspeed = 22;
							$wpower = 17;
						
						}

					
						$wizpower = $wpower;
						$wizspeeds = $wspeed;
						$cspell = $uwizard;
			
						mysql_query("UPDATE military SET cspell =\"$cspell\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET wizspeeds =\"$wizspeeds\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET wizpower =\"$wizpower\" WHERE email='$email' AND pw='$pw'");

				}


				

				if($upriest != ns AND $upriest != "")
			 	  {
						
					if($upriest == "Quarterstaff")
						{
							$wspeed = 9;
							$wpower = 2;
							$w_pc_name = 1;
						}
					if($upriest == "Spiked Club")
						{
							$wspeed = 11;
							$wpower = 6;
							$w_pc_name = $club;
						}
					if($upriest == "Mace")
						{
							$wspeed = 13;
							$wpower = 8;
							$w_pc_name = $mace;
						}
					if($upriest == "Scepter")
					    {
							$wspeed = 15;
							$wpower = 11;
							$w_pc_name = $scepter;
						}
					if($upriest == "Grand Scepter")
						{
							$wspeed = 20;
							$wpower = 14;
							$w_pc_name = $gs;
						}

								if($w_pc_name != 1)
									{echo"<div align=center><font class=yellow>You must construct $upriest first.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
		
						$pripower = $wpower;
						$prispeedw = $wspeed;
						$cstaff = $upriest;
			
						mysql_query("UPDATE military SET cstaff =\"$cstaff\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET prispeedw =\"$prispeedw\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET pripower =\"$pripower\" WHERE email='$email' AND pw='$pw'");

				  }

			if($uarcher != ns AND $uarcher != "")
			 	  {		
						
					if($uarcher == "Bow")
						{
							$wspeeda = 8;
							$wpowera = 2;
							$A_name = 1;
						}
					if($uarcher == "Short Bow")
						{
							$wspeeda = 10;
							$wpowera = 4;
							$A_name = $bow1;
						}
					if($uarcher == "Long Bow")
						{
							$wspeeda = 13;
							$wpowera = 6;
							$A_name = $bow2;
						}
					if($uarcher == "Acid Bow")
						{
							$wspeeda = 16;
							$wpowera = 9;
							$A_name = $bow4;
						}
					if($uarcher == "Medieval War Bow")
						{
							$wspeeda = 18;
							$wpowera = 13;
							$A_name = $bow3;
						}

								if($A_name != 1 AND $uarcher != "")
									{echo"<div align=center><font class=yellow>You must construct $uarcher first.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
		
						$archpower = $wpowera;
						$archspeedw = $wspeeda;
						$cbow = $uarcher;
			
						mysql_query("UPDATE military SET cbow =\"$cbow\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET archspeedw =\"$archspeedw\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET archpower =\"$archpower\" WHERE email='$email' AND pw='$pw'");

				  }
				

					echo"<div align=center><font class=yellow>Your troops have been equipped with what you specified.</font></div>";
					include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");		
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
		include("include/nexplode.php");

		if($uwararmor == ns AND $uwizarmor == ns AND $upriarmor == ns AND $uarcharmor == ns)
			{echo"<div align=center><font class=yellow>You did not specify any armor to equip.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($uwararmor != "Studded Leather" AND $uwararmor != "Chain Shirt" AND $uwararmor != "Chain Mail" AND $uwararmor != "Breast Plate" AND $uwararmor != "Medieval Armor" AND $uwararmor != ns AND $uwararmor != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($uarcharmor != "Studded Leather" AND $uarcharmor != "Chain Shirt" AND $uarcharmor != "Chain Mail" AND $uarcharmor != "Breast Plate" AND $uarcharmor != "Medieval Armor" AND $uarcharmor != ns AND $uarcharmor != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($uwizarmor != "Robe" AND $uwizarmor != "Mythril Armor" AND $uwizarmor != ns AND $uwizarmor != "" AND $uwizarmor != "Travellers Robe" AND $uwizarmor != "Magicians Robe")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($upriarmor != "Leather" AND $upriarmor != ns and $upriarmor != "Golden Armor" AND $upriarmor != "Blessed Armor" AND $upriarmor != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>";include("include/S_EQUIPA.php");die();
			}
		elseif($uarcharmor != "" AND $r6pts < 125000)
			{echo"<div align=center><font class=yellow>You must research archery first before you can equip your archers.</font></div>";include("include/S_EQUIPA.php");die();
			}
		elseif($uwizarmor != ""  AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot equip wizards being that you are a Giant.</font></div>";include("include/S_EQUIPA.php");die();
			}
		elseif($upriarmor !=  "" AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot equip priests being that you are a Giant.</font></div>";include("include/S_EQUIPA.php");die();
			}
		elseif($class == Ranger AND $uwizarmor != "")
			{echo"<div align=center><font class=yellow>You cannot equip wizards.</div></font>";include("include/S_EQUIPA.php");die();
			}
		else
			{
			
				  include("include/connect.php");

			if($uwararmor != ns AND $uwararmor != "")
				{
						if($uwararmor == "Studded Leather")
							{
								$aspeed = 0;
								$mod = 1;
								$A_NAME = 1;
			
							}
						if($uwararmor == "Chain Shirt")
							{
								$aspeed = 1;
								$mod = 3;
								$A_NAME = $cs;
			
							}
						if($uwararmor == "Chain Mail")
							{
								$aspeed = 2;
								$mod = 5;
								$A_NAME = $cm;
			
							}
						if($uwararmor == "Breast Plate")
							{
								$aspeed = 3;
								$mod = 6;
								$A_NAME = $bp;
			
							}
						if($uwararmor == "Medieval Armor")
							{
								$aspeed = 5;
								$mod = 9;
								$A_NAME = $fp;
			
							}

						
							if($A_NAME != 1)
								{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}

							$wardef = $mod;
							$warspeeda = $aspeed;
							$wararmor = $uwararmor;

							 mysql_query("UPDATE military SET wararmor =\"$wararmor\" WHERE email='$email' AND pw='$pw'");
				 			 mysql_query("UPDATE military SET wardef =\"$wardef\" WHERE email='$email' AND pw='$pw'");
				 			 mysql_query("UPDATE military SET warspeeda =\"$warspeeda\" WHERE email='$email' AND pw='$pw'");
					}

				
				if($uwizarmor != ns AND $uwizarmor != "")
					{

						if($uwizarmor == "Robe")
							{
								$aspeed = 0;
								$mod = 1;
								$W_NAME = 1;
							
							}
						if($uwizarmor == "Travellers Robe")
							{
								$aspeed = 1;
								$mod = 3;
								$W_NAME = $tr;
							
							}
						if($uwizarmor == "Magicians Robe")
							{
								$aspeed = 2;
								$mod = 5;
								$W_NAME = $mr;
							}
						if($uwizarmor == "Mythril Armor")
							{
								$aspeed = 3;
								$mod = 8;
								$W_NAME = $ma;
							}
					
								if($W_NAME != 1)
									{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}

								$wizdef = $mod;
								$wizspeeda = $aspeed;
								$wizarmor = $uwizarmor;

				 				mysql_query("UPDATE military SET wizarmor =\"$wizarmor\" WHERE email='$email' AND pw='$pw'");
				 				mysql_query("UPDATE military SET wizdef =\"$wizdef\" WHERE email='$email' AND pw='$pw'");
				 				mysql_query("UPDATE military SET wizspeeda =\"$wizspeeda\" WHERE email='$email' AND pw='$pw'");

					}

				if($upriarmor != ns AND $upriarmor != "")
					{

						if($upriarmor == "Leather")
							{
								$aspeed = 1;
								$mod = 2;
								$P_name = 1;
							}
						if($upriarmor == "Golden Armor")
							{
								$aspeed = 3;
								$mod = 4;
								$P_name = $ga;
							}
						if($upriarmor == "Blessed Armor")
							{
								$aspeed = 5;
								$mod = 6;
								$P_name = 1;
							}
						
								if($P_name != 1)
									{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}

									$pridef = $mod;
									$prispeeda = $aspeed;
									$priarmor = $upriarmor;

				 					mysql_query("UPDATE military SET priarmor =\"$priarmor\" WHERE email='$email' AND pw='$pw'");
				 					mysql_query("UPDATE military SET pridef =\"$pridef\" WHERE email='$email' AND pw='$pw'");
								    mysql_query("UPDATE military SET prispeeda =\"$prispeeda\" WHERE email='$email' AND pw='$pw'");
							}
				
				if($uarcharmor != ns AND $uarcharmor != "")
					{
						if($uarcharmor == "Studded Leather")
							{
								$aspeed = 0;
								$mod = 1;
								$A_NAME = 1;
			
							}
						if($uarcharmor == "Chain Shirt")
							{
								$aspeed = 1;
								$mod = 3;
								$A_NAME = $cs;
			
							}
						if($uarcharmor == "Chain Mail")
							{
								$aspeed = 2;
								$mod = 5;
								$A_NAME = $cm;
			
							}
						if($uarcharmor == "Breast Plate")
							{
								$aspeed = 3;
								$mod = 6;
								$A_NAME = $bp;
			
							}
						if($uarcharmor == "Medieval Armor")
							{
								$aspeed = 5;
								$mod = 9;
								$A_NAME = $fp;
			
							}

							if($A_NAME != 1)
								{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}

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
<!-- body ends here -->	
</TD>
</TR>
</TABLE>
</BODY>
</HTML>