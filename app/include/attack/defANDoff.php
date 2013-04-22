<?			  include("include/connect.php");
	
			

				//attackee land	
					$attackedempire = mysql($dbnam, "SELECT land FROM user WHERE userid = '$empvalue'");	
					$atkempire = mysql_result($attackedempire,"atkempire");
			
				//attackee safemode
					$safe_mo = mysql($dbnam, "SELECT safemode FROM user WHERE userid = '$empvalue'");	
					$safe_m = mysql_result($safe_mo,"safe_m");

					if($safe_m > 0)
						{echo"<div align=center><font class=yellow>You cannot attack an empire that is in safe mode.</font></div><br><br>";include("include/attack/mdrop.php");include("include/attack/table.php");die();}
	
	
				//attackee empire name
					$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
					$empireattacked = mysql_result($empattacked,"empireattacked");

				//attackee available land
					$attackeealand = mysql($dbnam, "SELECT aland FROM buildings WHERE userid = '$empvalue' ");	
					$attaland = mysql_result($attackeealand,"attaland");

				//attackee setid
					$theirsetid = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
					$tsetid = mysql_result($theirsetid,"tsetid");

				//attackee mountains	
					$ATK_MoTS = mysql($dbnam, "SELECT mts FROM user WHERE userid = '$empvalue'");	
					$ATK_mts = mysql_result($ATK_MoTS,"ATK_mts");
	
					$ATK_experience2 = mysql($dbnam, "SELECT exp2 FROM user WHERE userid = '$empvalue'");	
					$A_EXP2 = mysql_result($ATK_experience2,"A_EXP2");
				
					$t_xp = mysql($dbnam, "SELECT exp FROM user WHERE userid = '$empvalue'");	
					$their_xp = mysql_result($t_xp,"their_xp");
			
					$aagm = mysql($dbnam, "SELECT gm FROM buildings WHERE userid = '$empvalue'");	
					$agm = mysql_result($aagm,"agm");
					
					$aaimine = mysql($dbnam, "SELECT im FROM buildings WHERE userid = '$empvalue'");	
					$aimine = mysql_result($aaimine,"aimine");
 					
					$daagm = mysql($dbnam, "SELECT dgm FROM buildings WHERE userid = '$empvalue'");	
					$dagm = mysql_result($daagm,"dagm");
					
					$daaimine = mysql($dbnam, "SELECT dim FROM buildings WHERE userid = '$empvalue'");	
					$daimine = mysql_result($daaimine,"daimine");

					$A_MTS = mysql($dbnam, "SELECT amts FROM buildings WHERE userid = '$empvalue'");	
					$attamts = mysql_result($A_MTS,"attamts");
					

						 //getting values of home,barrack,farm, wp for attackee
							$aahome = mysql($dbnam, "SELECT home FROM buildings WHERE userid = '$empvalue'");	
							$ahome = mysql_result($aahome,"ahome");
										
							$aabarrack = mysql($dbnam, "SELECT barrack FROM buildings WHERE userid = '$empvalue'");	
							$abarrack = mysql_result($aabarrack,"abarrack");
										
							$aafarm = mysql($dbnam, "SELECT farm FROM buildings WHERE userid = '$empvalue'");	
							$afarm = mysql_result($aafarm,"afarm");
										
							$aawp = mysql($dbnam, "SELECT wp FROM buildings WHERE userid = '$empvalue'");	
							$awp = mysql_result($aawp,"awp");

							$aalmill = mysql($dbnam, "SELECT lmill FROM buildings WHERE userid = '$empvalue'");	
							$almill = mysql_result($aalmill,"almill");
	
							$daahome = mysql($dbnam, "SELECT dhome FROM buildings WHERE userid = '$empvalue'");	
							$dahome = mysql_result($daahome,"dahome");
										
							$daabarrack = mysql($dbnam, "SELECT dbarrack FROM buildings WHERE userid = '$empvalue'");	
							$dabarrack = mysql_result($daabarrack,"dabarrack");
										
							$daafarm = mysql($dbnam, "SELECT dfarm FROM buildings WHERE userid = '$empvalue'");	
							$dafarm = mysql_result($daafarm,"dafarm");
										
							$daawp = mysql($dbnam, "SELECT dwp FROM buildings WHERE userid = '$empvalue'");	
							$dawp = mysql_result($daawp,"dawp");

							$daalmill = mysql($dbnam, "SELECT dlmill FROM buildings WHERE userid = '$empvalue'");	
							$dalmill = mysql_result($daalmill,"dalmill");

						//attackee gold
							$ATKD_gp = mysql($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
							$A_gp = mysql_result($ATKD_gp,"A_gp");
	
						//attackee iron
							$empireiron = mysql($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");	
							$empiron = mysql_result($empireiron,"empiron");
   
						//attackee civilians
							$attackeeciv = mysql($dbnam, "SELECT civ FROM military WHERE userid = '$empvalue'");	
							$atkciv = mysql_result($attackeeciv,"atkciv");

							//attackee new no
								$e_newno = mysql($dbnam, "SELECT nno FROM user WHERE userid = '$empvalue'");	
								$e_nno = mysql_result($e_newno,"e_nno");

								//attackee class
								$THE_CLASS = mysql($dbnam, "SELECT class FROM user WHERE userid = '$empvalue'");	
								$THE_A_C = mysql_result($THE_CLASS,"THE_A_C");

				$theirwarpower = mysql($dbnam, "SELECT warpower FROM military WHERE userid = '$empvalue'");	
				$twarpower = mysql_result($theirwarpower,"twarpower");
				$theirwizpower = mysql($dbnam, "SELECT wizpower FROM military WHERE userid = '$empvalue'");	
				$twizpower = mysql_result($theirwizpower,"twizpower");
				$theirpripower = mysql($dbnam, "SELECT pripower FROM military WHERE userid = '$empvalue'");	
				$tpripower = mysql_result($theirpripower,"tpripower");
				$theirarchpower = mysql($dbnam, "SELECT archpower FROM military WHERE userid = '$empvalue'");	
				$tarchpower = mysql_result($theirarchpower,"tarchpower");

				$theirwarriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid = '$empvalue'");	
				$ttwarriors = mysql_result($theirwarriors,"ttwarriors");
				$theirwizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid = '$empvalue'");	
				$ttwizards = mysql_result($theirwizards,"ttwizards");
				$theirpriests = mysql($dbnam, "SELECT priests FROM military WHERE userid = '$empvalue'");	
				$ttpriests = mysql_result($theirpriests,"ttpriests");
				$theirarchers = mysql($dbnam, "SELECT archers FROM military WHERE userid = '$empvalue'");	
				$ttarchers = mysql_result($theirarchers,"ttarchers");

				$WARRIOR_DEF = mysql($dbnam, "SELECT wardef FROM military WHERE userid = '$empvalue'");	
				$WAR_DEF = mysql_result($WARRIOR_DEF,"WAR_DEF");
				$WIZARD_DEF = mysql($dbnam, "SELECT wizdef FROM military WHERE userid = '$empvalue'");	
				$WIZ_DEF = mysql_result($WIZARD_DEF,"WIZ_DEF");
				$PRIEST_DEF = mysql($dbnam, "SELECT pridef FROM military WHERE userid = '$empvalue'");	
				$PRI_DEF = mysql_result($PRIEST_DEF,"PRI_DEF");
				$ARCHER_DEF = mysql($dbnam, "SELECT pridef FROM military WHERE userid = '$empvalue'");	
				$ARCH_DEF = mysql_result($ARCHER_DEF,"ARCH_DEF");

				
				$modifier = 1;

				if($THE_A_C == Fighter)
					{$modifier = 1.05;
					}
				if($THE_A_C == Mage)
					{$modifier = .95;
					}
				if($t_race == Giant)
					{$modifier = $modifier + .25;}
				if($t_race == Orc)	
					{$modifier = $modifer - .15;}
					
				$theirtotalpower = (($twarpower * $ttwarriors) + ($twizpower * $ttwizards) + ($tpripower * $ttpriests) + ($tarchpower * $ttarchers) + ($awp * 15)) * $modifier;
				$theirtotalpower = round($theirtotalpower);

				

				$yourtotalpower = $tdefense;

				
	
?>