<?

		@mysql_connect (localhost, ziccarelli, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID;
			
		
		
				//$userid_Q = ("SELECT userid FROM user WHERE userid='$INC_ID'");
				//$userid_R = mysql_query($userid_Q);
				//$Userid_Check = mysql_fetch_array($userid_R);

$INC_ID = 2;

	While($INC_ID < $ID_PLUS_1)
  	{
	

						//$MAX_CIVILIANS = mysql($dbnam, "SELECT maxciv FROM military WHERE userid='$INC_ID'");
						//$MAX_CIV = mysql_result($MAX_CIVILIANS, "MAX_CIV");

       					$updategm_G = mysql($dbnam, "SELECT gm FROM buildings WHERE userid='$INC_ID'");
						$upgm_G = mysql_result($updategm_G, "upgm_G");
				
						$UP_GP = mysql($dbnam, "SELECT gp FROM user WHERE userid='$INC_ID'");
						$upgp = mysql_result($UP_GP, "upgp");
						
						//$updateiron = mysql($dbnam, "SELECT iron FROM user WHERE userid='$INC_ID'");
						//$upiron = mysql_result($updateiron, "upiron");

						//updatefood = mysql($dbnam, "SELECT food FROM user WHERE userid='$INC_ID'"); 
						//$upfood = mysql_result($updatefood, "upfood");

						//$updateciv = mysql($dbnam, "SELECT civ FROM military WHERE userid='$INC_ID'");
						//$upciv = mysql_result($updateciv,"upciv");

						/*$updatehome = mysql($dbnam, "SELECT home FROM buildings WHERE userid='$INC_ID'");
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
							*/

						

					/*if($E_CLASS == Fighter)
						{$goldpro1 = (($upgm_G * 300)* .95) + $upgp;
						}
						elseif($R_r4pts >= 40000)
							{$goldpro1 = (($upgm_G * 300) * 1.05) + $upgp;
							}
					if($E_CLASS == Mage)
						{$goldpro1 = (($upgm_G * 300) * 1.05) + $upgp; 
						}
						elseif($R_r4pts >= 40000)
							{$goldpro1 = (($upgm_G * 300)  * 1.15) + $upgp; 
							}
					if($E_CLASS == Cleric)
						{$goldpro = $upgm_G * 300 + $upgp;
						}
						elseif($R_r4pts >= 40000)
							{$goldpro1 = (($upgm_G * 300) * 1.1) + $upgp; 
							}

						if($upfarm * 50 < $upfood)
						{$foodpro = $upfarm * 50;
						}
							
						if($civpro < $foodpro)
						{$civpro = $uphome * 5;
						}

						if($upbarraack < $UP_WAR + $UP_WIZ + $UP_PRI)
						{	$UP_WAR = $UP_WAR * .97;
							$UP_WIZ = $UP_WIZ * .97;
							$UP_PRI = $UP_PRI * .97;
							mysql_query("UPDATE military SET warriors = \"$UP_WAR\" WHERE userid='$INC_ID'");
							mysql_query("UPDATE military SET wizards = \"$UP_WIZ\" WHERE userid='$INC_ID'");
							mysql_query("UPDATE military SET priests = \"$UP_PRI\" WHERE userid='$INC_ID'");
						}*/

						//$NEW_MAX_CIV = $MAX_CIV + (.0065 * $upciv);
						/*$ironpro = $upim * 3 + $upiron;
						$civpro = $uphome * .1 + $upciv;
						$foodpro = $upfarm * .5 + $upfood;
						$newexp = $up_exp + $up_exp2;*/

						$foodpro = 54321;
						//$ironpro = $upim * 3 + $upiron;
						//$civpro = $uphome * .1 + $upciv;
						//$foodpro = $upfarm * .5 + $upfood;
						//$newexp = $up_exp + $up_exp2;

						//mysql_query("UPDATE military SET maxciv = \"$NEW_MAX_CIV\" WHERE userid='$INC_ID'");
						//mysql_query("UPDATE user SET exp = \"$newexp\" WHERE userid='$INC_ID'");
						//mysql_query("UPDATE user SET exp2 = \"0\" WHERE userid='$INC_ID'");
						mysql_query("UPDATE user SET gp = \"5000\" WHERE userid='$INC_ID'");
						//mysql_query("UPDATE user SET iron = \"$ironpro\" WHERE userid='$INC_ID'");
						//mysql_query("UPDATE user SET food = \"$foodpro\" WHERE userid='$INC_ID'");
						//mysql_query("UPDATE military SET civ = \"$civpro\" WHERE userid='$INC_ID'");

					$INC_ID = $INC_ID + 1;	
	}
	
	echo"$INC_ID AND $max_UID"; 	
	
	
	?>					