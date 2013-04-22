<?

		@mysql_connect (localhost, ziccarelli, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
			
		
		
			

				
 
	While($INC_ID < $ID_PLUS_1)
  	{				

						$MAX_CIVILIANS = mysql($dbnam, "SELECT maxciv FROM military WHERE userid='$INC_ID'");
						$MAX_CIV = mysql_result($MAX_CIVILIANS, "MAX_CIV");

       					$updategm_G = mysql($dbnam, "SELECT gm FROM buildings WHERE userid='$INC_ID'");
						$upgm_G = mysql_result($updategm_G, "upgm_G");
				
						$UP_GP = mysql($dbnam, "SELECT gp FROM user WHERE userid='$INC_ID'");
						$upgp = mysql_result($UP_GP, "upgp");
						
						$updateiron = mysql($dbnam, "SELECT iron FROM user WHERE userid='$INC_ID'");
						$upiron = mysql_result($updateiron, "upiron");

						$updatefood = mysql($dbnam, "SELECT food FROM user WHERE userid='$INC_ID'"); 
						$upfood = mysql_result($updatefood, "upfood");

						$updateciv = mysql($dbnam, "SELECT civ FROM military WHERE userid='$INC_ID'");
						$upciv = mysql_result($updateciv,"upciv");

						$updatehome = mysql($dbnam, "SELECT home FROM buildings WHERE userid='$INC_ID'");
						$uphome = mysql_result($updatehome,"uphome");

						$updatebarrack = mysql($dbnam, "SELECT barrack FROM buildings WHERE userid='$INC_ID'");
						$upbarrack = mysql_result($updatebarrack, "upbarrack");

						$updatefarm = mysql($dbnam, "SELECT farm FROM buildings WHERE userid='$INC_ID'");
						$upfarm = mysql_result($updatefarm, "upfarm");

						$updatelab = mysql($dbnam, "SELECT lab FROM buildings WHERE userid='$INC_ID'");
						$uplab = mysql_result($updatelab,"uplab");

						$updateim = mysql($dbnam, "SELECT im FROM buildings WHERE userid='$INC_ID'");
						$upim = mysql_result($updateim,"upim");

						$update_exp = mysql($dbnam, "SELECT exp FROM user WHERE userid='$INC_ID'");
						$up_exp = mysql_result($update_exp,"up_exp");

						$update_exp2 = mysql($dbnam, "SELECT exp2 FROM user WHERE userid='$INC_ID'");
						$up_exp2 = mysql_result($update_exp2,"up_exp2");

						$EMP_CLASS = mysql($dbnam, "SELECT class FROM user WHERE userid='$INC_ID'");
						$E_CLASS = mysql_result($EMP_CLASS,"E_CLASS");
						
						$R_Rr4pts = mysql($dbnam, "SELECT r4pts FROM research WHERE userid='$INC_ID'");
						$R_r4pts = mysql_result($R_Rr4pts,"R_r4pts");

						$UPDATE_WAR = mysql($dbnam, "SELECT warriors FROM military WHERE userid='$INC_ID'");
						$UP_WAR = mysql_result($UPDATE_WAR,"UP_WAR");
						
						$UPDATE_WIZ = mysql($dbnam, "SELECT wizards FROM military WHERE userid='$INC_ID'");
						$UP_WIZ = mysql_result($UPDATE_WIZ,"UP_WIZ");
						
						$UPDATE_PRI = mysql($dbnam, "SELECT wizards FROM military WHERE userid='$INC_ID'");
						$UP_PRI = mysql_result($UPDATE_PRI,"UP_PRI");

						$UPDATE_dbwar = mysql($dbnam, "SELECT dbwar FROM military WHERE userid='$INC_ID'");
						$UP_dbwar = mysql_result($UPDATE_dbwar,"UP_dbwar");
						
						$UPDATE_dbwiz = mysql($dbnam, "SELECT dbwiz FROM military WHERE userid='$INC_ID'");
						$UP_dbwiz = mysql_result($UPDATE_dbwiz,"UP_dbwiz");
						
						$UPDATE_dbpri = mysql($dbnam, "SELECT dbpri FROM military WHERE userid='$INC_ID'");
						$UP_dbpri = mysql_result($UPDATE_dbpri,"UP_dbpri");

						$UPDATE_dbwar2 = mysql($dbnam, "SELECT dbwar2 FROM military WHERE userid='$INC_ID'");
						$UP_dbwar2 = mysql_result($UPDATE_dbwar2,"UP_dbwar2");
					
						$UPDATE_dbwiz2 = mysql($dbnam, "SELECT dbwiz2 FROM military WHERE userid='$INC_ID'");
						$UP_dbwiz2 = mysql_result($UPDATE_dbwiz2,"UP_dbwiz2");
						
						$UPDATE_dbpri2 = mysql($dbnam, "SELECT dbpri2 FROM military WHERE userid='$INC_ID'");
						$UP_dbpri2 = mysql_result($UPDATE_dbpri2,"UP_dbpri2");

						$DB_HOME = mysql($dbnam, "SELECT dhome FROM buildings WHERE userid='$INC_ID'");
						$db_h = mysql_result($DB_HOME,"db_h");

						$DB_BARRACK = mysql($dbnam, "SELECT dbarrack FROM buildings WHERE userid='$INC_ID'");
						$db_b = mysql_result($DB_BARRACK, "db_b");

						$DB_FARM = mysql($dbnam, "SELECT dfarm FROM buildings WHERE userid='$INC_ID'");
						$db_f = mysql_result($DB_FARM, "db_f");

						$DB_LAB = mysql($dbnam, "SELECT dlab FROM buildings WHERE userid='$INC_ID'");
						$db_l = mysql_result($DB_LAB,"db_l");

						$DB_IM = mysql($dbnam, "SELECT dim FROM buildings WHERE userid='$INC_ID'");
						$db_i = mysql_result($DB_IM,"db_i");
						
						$DB_GM = mysql($dbnam, "SELECT dgm FROM buildings WHERE userid='$INC_ID'");
						$db_g = mysql_result($DB_GM, "db_g");
						
						$_HOME = mysql($dbnam, "SELECT home FROM buildings WHERE userid='$INC_ID'");
						$_h = mysql_result($_HOME,"_h");

						$_BARRACK = mysql($dbnam, "SELECT barrack FROM buildings WHERE userid='$INC_ID'");
						$_b = mysql_result($_BARRACK, "_b");

						$_FARM = mysql($dbnam, "SELECT farm FROM buildings WHERE userid='$INC_ID'");
						$_f = mysql_result($_FARM, "_f");

						$_LAB = mysql($dbnam, "SELECT lab FROM buildings WHERE userid='$INC_ID'");
						$_l = mysql_result($_LAB,"_l");

						$_IM = mysql($dbnam, "SELECT im FROM buildings WHERE userid='$INC_ID'");
						$_i = mysql_result($_IM,"_i");
						
						$_GM = mysql($dbnam, "SELECT gm FROM buildings WHERE userid='$INC_ID'");
						$_g = mysql_result($_GM, "_g");
					
						$H_HOURS = mysql($dbnam, "SELECT Hhrs FROM buildings WHERE userid='$INC_ID'");
						$H_HRS = mysql_result($H_HOURS,"H_HRS");

						$B_HOURS = mysql($dbnam, "SELECT Bhrs FROM buildings WHERE userid='$INC_ID'");
						$B_HRS = mysql_result($B_HOURS, "B_HRS");

						$F_HOURS = mysql($dbnam, "SELECT Fhrs FROM buildings WHERE userid='$INC_ID'");
						$F_HRS = mysql_result($F_HOURS, "F_HRS");

						$L_HOURS = mysql($dbnam, "SELECT Lhrs FROM buildings WHERE userid='$INC_ID'");
						$L_HRS = mysql_result($L_HOURS,"L_HRS");

						$G_HOURS = mysql($dbnam, "SELECT Ghrs FROM buildings WHERE userid='$INC_ID'");
						$G_HRS = mysql_result($G_HOURS,"G_HRS");
						
						$I_HOURS = mysql($dbnam, "SELECT Ihrs FROM buildings WHERE userid='$INC_ID'");
						$I_HRS = mysql_result($I_HOURS, "I_HRS");
						
						$UPDATE_THIEVES = mysql($dbnam, "SELECT thieves FROM military WHERE userid='$INC_ID'");
						$UP_thief = mysql_result($UPDATE_THIEVES,"UP_thief");
						
						$UPDATE_EXPLORERS = mysql($dbnam, "SELECT explorers FROM military WHERE userid='$INC_ID'");
						$UP_explorer = mysql_result($UPDATE_EXPLORERS,"UP_explorer");
						
						$UPDATE_SCIENTISTS = mysql($dbnam, "SELECT scientists FROM military WHERE userid='$INC_ID'");
						$UP_scientist = mysql_result($UPDATE_SCIENTISTS,"UP_scientist");
						
						$DBUPDATE_THIEVES = mysql($dbnam, "SELECT dbthief FROM military WHERE userid='$INC_ID'");
						$DBUP_thief = mysql_result($DBUPDATE_THIEVES,"DBUP_thief");
						
						$DBUPDATE_EXPLORERS = mysql($dbnam, "SELECT dbexplorer FROM military WHERE userid='$INC_ID'");
						$DBUP_explorer = mysql_result($DBUPDATE_EXPLORERS,"DBUP_explorer");
						
						$DBUPDATE_SCIENTISTS = mysql($dbnam, "SELECT dbscientist FROM military WHERE userid='$INC_ID'");
						$DBUP_scientist = mysql_result($DBUPDATE_SCIENTISTS,"DBUP_scientist");
						
						$TIME_ONE = mysql($dbnam, "SELECT time1 FROM return WHERE userid='$INC_ID'");
						$TIME_1 = mysql_result($TIME_ONE,"TIME_1");
						
						$TIME_TWO = mysql($dbnam, "SELECT time2 FROM return WHERE userid='$INC_ID'");
						$TIME_2 = mysql_result($TIME_TWO,"TIME_2");
						
						$TIME_THREE = mysql($dbnam, "SELECT time3 FROM return WHERE userid='$INC_ID'");
						$TIME_3 = mysql_result($TIME_THREE,"TIME_3");
						
						$TIME_FOUR = mysql($dbnam, "SELECT time4 FROM return WHERE userid='$INC_ID'");
						$TIME_4 = mysql_result($TIME_FOUR,"TIME_4");

						
						$WAR_ONE = mysql($dbnam, "SELECT war1 FROM return WHERE userid='$INC_ID'");
						$WAR_1 = mysql_result($WAR_ONE,"WAR_1");
						
						$WAR_TWO = mysql($dbnam, "SELECT war2 FROM return WHERE userid='$INC_ID'");
						$WAR_2 = mysql_result($WAR_TWO,"WAR_2");
						
						$WAR_THREE = mysql($dbnam, "SELECT war3 FROM return WHERE userid='$INC_ID'");
						$WAR_3 = mysql_result($WAR_THREE,"WAR_3");

						$WAR_FOUR = mysql($dbnam, "SELECT war4 FROM return WHERE userid='$INC_ID'");
						$WAR_4 = mysql_result($WAR_FOUR,"WAR_4");

						$WIZ_ONE = mysql($dbnam, "SELECT wiz1 FROM return WHERE userid='$INC_ID'");
						$WIZ_1 = mysql_result($WIZ_ONE,"WIZ_1");
						
						$WIZ_TWO = mysql($dbnam, "SELECT wiz2 FROM return WHERE userid='$INC_ID'");
						$WIZ_2 = mysql_result($WIZ_TWO,"WIZ_2");
						
						$WIZ_THREE = mysql($dbnam, "SELECT wiz3 FROM return WHERE userid='$INC_ID'");
						$WIZ_3 = mysql_result($WIZ_THREE,"WIZ_3");

						$WIZ_FOUR = mysql($dbnam, "SELECT wiz4 FROM return WHERE userid='$INC_ID'");
						$WIZ_4 = mysql_result($WIZ_FOUR,"WIZ_4");

						$PRI_ONE = mysql($dbnam, "SELECT pri1 FROM return WHERE userid='$INC_ID'");
						$PRI_1 = mysql_result($PRI_ONE,"PRI_1");
						
						$PRI_TWO = mysql($dbnam, "SELECT pri2 FROM return WHERE userid='$INC_ID'");
						$PRI_2 = mysql_result($PRI_TWO,"PRI_2");
						
						$PRI_THREE = mysql($dbnam, "SELECT pri3 FROM return WHERE userid='$INC_ID'");
						$PRI_3 = mysql_result($PRI_THREE,"PRI_3");

						$PRI_FOUR = mysql($dbnam, "SELECT pri4 FROM return WHERE userid='$INC_ID'");
						$PRI_4 = mysql_result($PRI_FOUR,"PRI_4");
						
						$FLEETS_ = mysql($dbnam, "SELECT fleets FROM user WHERE userid='$INC_ID'");
						$_FLEETS = mysql_result($FLEETS_,"_FLEETS");

				//#########################################
				//##
				//##    updating fleets
				//##
				//#########################################
				
			
					if($TIME_1 == 1)
						{
							$tWAR_1 = $WAR_1; 
							$tWIZ_1 = $WIZ_1; 
							$tPRI_1 = $PRI_1;
							$fleettally = $fleettally + 1;
						}
					if($TIME_2 == 1)
						{
							$tWAR_2 = $WAR_2; 
							$tWIZ_2 = $WIZ_2; 
							$tPRI_2 = $PRI_2;
							$fleettally = $fleettally + 1;
						}
					if($TIME_3 == 1)
						{
							$tWAR_3 = $WAR_3; 
							$tWIZ_3 = $WIZ_3; 
							$tPRI_3 = $PRI_3;
							$fleettally = $fleettally + 1;
						}
					if($TIME_4 == 1)
						{
							$tWAR_4 = $WAR_4;
							$tWIZ_4 = $WIZ_4; 
							$tPRI_4 = $PRI_4;
							$fleettally = $fleettally + 1;
						}

						$newwarr = $UP_WAR + $tWAR_1 + $tWAR_2 + $tWAR_3 + $tWAR_4;
						$newwizz = $UP_WIZ + $tWIZ_1 + $tWIZ_2 + $tWIZ_3 + $tWIZ_4;
						$newprii = $UP_PRI + $tPRI_1 + $tPRI_2 + $tPRI_3 + $tPRI_4;
		
						mysql_query("UPDATE military SET warriors = \"$newwarr\" WHERE userid='$INC_ID'");
						mysql_query("UPDATE military SET wizards = \"$newwizz\" WHERE userid='$INC_ID'");
						mysql_query("UPDATE military SET priests = \"$newprii\" WHERE userid='$INC_ID'");
						$newfleets = $_FLEETS + $fleettally;
					    mysql_query("UPDATE user SET fleets = \"$newfleets\" WHERE userid='$INC_ID'");
				
					if($TIME_1 == 1)
						{ 	
								mysql_query("UPDATE return SET war1 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET wiz1 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET pri1 = \"0\" WHERE userid='$INC_ID'");
						}
					if($TIME_2 == 1)
						{ 
								mysql_query("UPDATE return SET war2 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET wiz2 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET pri2 = \"0\" WHERE userid='$INC_ID'");
						}
					if($TIME_3 == 1)
						{
								mysql_query("UPDATE return SET war3 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET wiz3 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET pri3 = \"0\" WHERE userid='$INC_ID'");
						}
					if($TIME_4 == 1)
						{ 
								mysql_query("UPDATE return SET war4 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET wiz4 = \"0\" WHERE userid='$INC_ID'");
								mysql_query("UPDATE return SET pri4 = \"0\" WHERE userid='$INC_ID'");
						}


						
						
				if($TIME_1 > 0)
					{	$newtime = $TIME_1 - 1;
						mysql_query("UPDATE return SET time1 = \"$newtime\" WHERE userid='$INC_ID'");
					}
				if($TIME_2 > 0)
					{	$newtime = $TIME_2 - 1;
						mysql_query("UPDATE return SET time2 = \"$newtime\" WHERE userid='$INC_ID'");
					}
				if($TIME_3 > 0)
					{	$newtime = $TIME_3 - 1;
						mysql_query("UPDATE return SET time3 = \"$newtime\" WHERE userid='$INC_ID'");
					}
				if($TIME_4 > 0)
					{	$newtime = $TIME_4 - 1;
						mysql_query("UPDATE return SET time4 = \"$newtime\" WHERE userid='$INC_ID'");
					}
			
				


				$INC_ID = $INC_ID + 1;		
		
	}
			
?>		





