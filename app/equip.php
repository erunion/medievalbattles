<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
 <br><br><br>
	  
	    
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
		
		
		if($uwarrior == ns AND $uwizard == ns AND $upriest == ns AND $uarcher == ns)
			{echo"<div align=center><font class=yellow>You did not specify anything to equip.</font></div>";include("include/S_EQUIPO.php"); include("include/S_EQUIPA.php");die();
			}
		elseif($uwarrior != "Short Sword" AND $uwarrior != "Long Sword" AND $uwarrior != "Axe" AND $uwarrior != "Great Axe" AND $uwarrior != "Ice Sword"  AND $uwarrior != ns AND $uwarrior != "Dagger")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($uwizard != "Magic Missile" AND $uwizard != "Ice Storm" AND $uwizard != "Fireball" AND $uwizard != "Cloud Kill" AND $uwizard != ns)
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($upriest != "Spiked Club" AND $upriest != ns AND $upriest != "Quarterstaff" AND $upriest != "Mace" AND $upriest != "Grand Scepter")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
			}
		elseif($uarcher != "Bow" AND $uarcher != "Short Bow" AND $uarcher != "Long Bow" AND $uarcher != "Medieval War Bow" AND $uarcher != ns AND $uarcher != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>";include("include/S_EQUIPO.php"); include("include/S_EQUIPA.php");die();
			}
		else
			{


				if($uwizard == "Fireball" AND r1pts >= 10000)
					{echo"<div align=center><font class=yellow>You have to research Fireball first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard == "Ice Storm" AND r1pts >= 40000)
					{echo"<div align=center><font class=yellow>You have to research Ice Storm first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
					}
				if($uwizard == "Cloud Kill" AND r1pts >= 100000)
					{echo"<div align=center><font class=yellow>You have to research Cloud Kill first to equip it.</div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();
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
				
				
				include("include/connect.php");

			if($uwarrior != ns)
			  {	

				if($uwarrior == "Dagger")
					{
							$wspeed = 6;
							$wpower = 3;
							$w_c_name = 1;
					}
				if($uwarrior == "Short Sword")
						{
							$wspeed = 7;
							$wpower = 6;
							$w_c_name = $ssword;
						}
				if($uwarrior == "Long Sword")
						{
							$wspeed = 8;
							$wpower = 9;
							$w_c_name = $lsword;
						}
				if($uwarrior == "Axe")
						{
							$wspeed = 9;
							$wpower = 12;
							$w_c_name = $axe;
						}
				if($uwarrior == "Great Axe")
						{
							$wspeed = 14;
							$wpower = 20;
							$w_c_name = $gaxe;
						}
				if($uwarrior == "Ice Sword")
						{
							$wspeed = 18;
							$wpower = 25;
							$w_c_name = $icesword;
						}
			
				
					
					

							if($w_c_name < 1)
								{echo"<div align=center><font class=yellow>You need to construct $uwarrior first before you use it.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
					
						$warspeedw = $wspeed;
						$warpower = $wpower;
						$cweapon = $uwarrior;
						
						mysql_query("UPDATE military SET cweapon =\"$cweapon\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET warspeedw =\"$warspeedw\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET warpower =\"$warpower\" WHERE email='$email' AND pw='$pw'");

				}
	
			



			if($uwizard != ns)
			  {
			
				if($uwizard == "Magic Missile")
						{
							$wspeed = 7;
							$wpower = 4;
						
						}
				if($uwizard == "Ice Storm")
						{
							$wspeed = 8;
							$wpower = 10;
						
						}
				if($uwizard == "Fireball")
						{
							$wspeed = 9;
							$wpower = 15;
						
						}
				if($uwizard == "Cloud Kill")
						{
							$wspeed = 15;
							$wpower = 25;
						
						}

						if($uwizard == "Fireball" AND $r1pts < 10000)
							{echo"<div align=center><font class=yellow>You have to research Fireball before you use it.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
							
						if($uwizard == "Ice Storm" AND $r2pts < 40000)
							{echo"<div align=center><font class=yellow>You have to research Ice Storm before you use it.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
						
						if($uwizard == "Cloud Kill" AND $r3pts < 100000)
							{echo"<div align=center><font class=yellow>You have to research Cloud Kill before you use it.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
						$wizpower = $wpower;
						$wizspeeds = $wspeed;
						$cspell = $uwizard;
			
						mysql_query("UPDATE military SET cspell =\"$cspell\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET wizspeeds =\"$wizspeeds\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET wizpower =\"$wizpower\" WHERE email='$email' AND pw='$pw'");

				}


				

				if($upriest != ns)
			 	  {
						
					if($upriest == "Quarterstaff")
						{
							$wspeed = 6;
							$wpower = 2;
							$w_pc_name = 1;
						}
					if($upriest == "Spiked Club")
						{
							$wspeed = 6;
							$wpower = 6;
							$w_pc_name = $club;
						}
					if($upriest == "Mace")
						{
							$wspeed = 8;
							$wpower = 9;
							$w_pc_name = $mace;
						}
					if($upriest == "Grand Scepter")
						{
							$wspeed = 9;
							$wpower = 15;
							$w_pc_name = $gs;
						}

								if($w_pc_name < 1)
									{echo"<div align=center><font class=yellow>You must construct $upriest first.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
		
						$pripower = $wpower;
						$prispeedw = $wspeed;
						$cstaff = $upriest;
			
						mysql_query("UPDATE military SET cstaff =\"$cstaff\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET prispeedw =\"$prispeedw\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET pripower =\"$pripower\" WHERE email='$email' AND pw='$pw'");

				  }

			if($uarcher != ns)
			 	  {		
						
					if($uarcher == "Bow")
						{
							$wspeeda = 5;
							$wpowera = 2;
							$A_name = 1;
						}
					if($uarcher == "Short Bow")
						{
							$wspeeda = 6;
							$wpowera = 7;
							$A_name = $bow1;
						}
					if($uarcher == "Long Bow")
						{
							$wspeeda = 7;
							$wpowera = 14;
							$A_name = $bow3;
						}
					if($uarcher == "Medieval War Bow")
						{
							$wspeeda = 8;
							$wpowera = 22;
							$A_name = $bow3;
						}

								if($A_name < 1)
									{echo"<div align=center><font class=yellow>$A_name You must construct $uarcher first.</font></div>";include("include/S_EQUIPO.php");include("include/S_EQUIPA.php");die();}
		
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
		if($uwararmor == ns AND $uwizarmor == ns AND $upriarmor == ns AND $uarcharmor == ns)
			{echo"<div align=center><font class=yellow>You did not specify any armor to equip.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($uwararmor != "Studded Leather" AND $uwararmor != "Chain Shirt" AND $uwararmor != "Chain Mail" AND $uwararmor != "Breast Plate" AND $uwararmor != "Medieval Armor" AND $uwararmor != ns)
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}
		elseif($uarcharmor != "Studded Leather" AND $uarcharmor != "Chain Shirt" AND $uarcharmor != "Chain Mail" AND $uarcharmor != "Breast Plate" AND $uwararmor != "Medieval Armor" AND $uarcharmor != ns AND $uarcharmor != "")
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}
		elseif($uwizarmor != "Robe" AND $uwizarmor != ns)
			{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();
			}
		elseif($upriarmor != "Leather" AND $upriarmor != ns)
			{echo"<div align=center>Invalid item.</font></div>";include("include/S_EQUIPA.php");die();
			}
		elseif($uarcharmor != "" AND $r6pts < 125000)
			{echo"<div align=center>You must research archery first before you can equip your archers.</font></div>";include("include/S_EQUIPA.php");die();
			}
		else
			{
			
				  include("include/connect.php");

			if($uwararmor != ns)
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

						
						


							if($A_NAME < 1)
								{echo"<div align=center><font class=yellow>Invalid item.</font></div>"; include("include/S_EQUIPA.php");die();}

							$wardef = $mod;
							$warspeeda = $aspeed;
							$wararmor = $uwararmor;

							 mysql_query("UPDATE military SET wararmor =\"$wararmor\" WHERE email='$email' AND pw='$pw'");
				 			 mysql_query("UPDATE military SET wardef =\"$wardef\" WHERE email='$email' AND pw='$pw'");
				 			 mysql_query("UPDATE military SET warspeeda =\"$warspeeda\" WHERE email='$email' AND pw='$pw'");
					}

				
				if($uwizarmor != ns)
					{

						if($uwizarmor == "Robe")
							{
								$aspeed = 0;
								$mod = 1;
							
							}

								$wizdef = $mod;
								$wizspeeda = $aspeed;
								$wizarmor = $uwizarmor;

				 				mysql_query("UPDATE military SET wizarmor =\"$wizarmor\" WHERE email='$email' AND pw='$pw'");
				 				mysql_query("UPDATE military SET wizdef =\"$wizdef\" WHERE email='$email' AND pw='$pw'");
				 				mysql_query("UPDATE military SET wizspeeda =\"$wizspeeda\" WHERE email='$email' AND pw='$pw'");

					}

				if($upriarmor != ns)
					{

						if($upriarmor == "Leather")
							{
								$aspeed = 1;
								$mod = 2;
							
							}
									$pridef = $mod;
									$prispeeda = $aspeed;
									$priarmor = $upriarmor;

				 					mysql_query("UPDATE military SET priarmor =\"$priarmor\" WHERE email='$email' AND pw='$pw'");
				 					mysql_query("UPDATE military SET pridef =\"$pridef\" WHERE email='$email' AND pw='$pw'");
								    mysql_query("UPDATE military SET prispeeda =\"$prispeeda\" WHERE email='$email' AND pw='$pw'");
							}
				
					if($uarcharmor != ns)
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
						if($uwararmor == "Breast Plate")
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

						
						


							if($A_NAME < 1)
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
</table>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>