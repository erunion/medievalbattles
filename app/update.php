<?
echo "Starting tick";
	@mysql_connect (localhost, ursenbach, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = medievalbattles_com;
$var = @mysql_connect(localhost, ursenbach, pa724);

		mysql_query("UPDATE Game_Info SET tick = \"yes\"");

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;

$INC_ID == 1;
		

	



While($INC_ID < $ID_PLUS_1)
  	{
	
				// CHECK TO SEE IF USERID IS THERE
				$U_Query = ("SELECT userid FROM user WHERE userid=\"$INC_ID\"");
				$U_Result = mysql_query($U_Query);
				$U_Check = mysql_fetch_array($U_Result);


	if($INC_ID == $U_Check[0])
		{

			$MAX_CIVILIANS = mysql($dbnam, "SELECT maxciv FROM military WHERE userid='$INC_ID'");
			$MAX_CIV = mysql_result($MAX_CIVILIANS, "MAX_CIV");

			$up_race = mysql($dbnam, "SELECT race FROM user WHERE userid='$INC_ID'");
			$U_RACE = mysql_result($up_race, "U_RACE");

			$UP_GP = mysql($dbnam, "SELECT gp FROM user WHERE userid='$INC_ID'");
			$upgp = mysql_result($UP_GP, "upgp");
						
			$updateiron = mysql($dbnam, "SELECT iron FROM user WHERE userid='$INC_ID'");
			$upiron = mysql_result($updateiron, "upiron");

			$updatefood = mysql($dbnam, "SELECT food FROM user WHERE userid='$INC_ID'"); 
			$upfood = mysql_result($updatefood, "upfood");

			$updatelumber = mysql($dbnam, "SELECT lumber FROM user WHERE userid='$INC_ID'"); 
			$uplumber = mysql_result($updatelumber, "uplumber");
	
			$S_mode = mysql($dbnam, "SELECT safemode FROM user WHERE userid='$INC_ID'"); 
			$Safe_Mode = mysql_result($S_mode, "Safe_Mode");

			$updateciv = mysql($dbnam, "SELECT civ FROM military WHERE userid='$INC_ID'");
			$upciv = mysql_result($updateciv,"upciv");

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
						
			$UPDATE_PRI = mysql($dbnam, "SELECT priests FROM military WHERE userid='$INC_ID'");
			$UP_PRI = mysql_result($UPDATE_PRI,"UP_PRI");

				
			$UPDATE_ARCH = mysql($dbnam, "SELECT archers FROM military WHERE userid='$INC_ID'");
			$UP_ARCH = mysql_result($UPDATE_ARCH,"UP_ARCH");

			$UPDATE_dbwar = mysql($dbnam, "SELECT dbwar FROM military WHERE userid='$INC_ID'");
			$UP_dbwar = mysql_result($UPDATE_dbwar,"UP_dbwar");
					
			$UPDATE_dbwiz = mysql($dbnam, "SELECT dbwiz FROM military WHERE userid='$INC_ID'");
			$UP_dbwiz = mysql_result($UPDATE_dbwiz,"UP_dbwiz");
						
			$UPDATE_dbpri = mysql($dbnam, "SELECT dbpri FROM military WHERE userid='$INC_ID'");
			$UP_dbpri = mysql_result($UPDATE_dbpri,"UP_dbpri");

			$UPDATE_dbarch = mysql($dbnam, "SELECT dbarch FROM military WHERE userid='$INC_ID'");
			$UP_dbarch = mysql_result($UPDATE_dbarch,"UP_dbarch");

			$UPDATE_dbwar2 = mysql($dbnam, "SELECT dbwar2 FROM military WHERE userid='$INC_ID'");
			$UP_dbwar2 = mysql_result($UPDATE_dbwar2,"UP_dbwar2");
					
			$UPDATE_dbwiz2 = mysql($dbnam, "SELECT dbwiz2 FROM military WHERE userid='$INC_ID'");
			$UP_dbwiz2 = mysql_result($UPDATE_dbwiz2,"UP_dbwiz2");
						
			$UPDATE_dbpri2 = mysql($dbnam, "SELECT dbpri2 FROM military WHERE userid='$INC_ID'");
			$UP_dbpri2 = mysql_result($UPDATE_dbpri2,"UP_dbpri2");

			$UPDATE_dbarch2 = mysql($dbnam, "SELECT dbarch2 FROM military WHERE userid='$INC_ID'");
			$UP_dbarch2 = mysql_result($UPDATE_dbarch2,"UP_dbarch2");

			$DB_HOME = mysql($dbnam, "SELECT dhome FROM buildings WHERE userid='$INC_ID'");
			$db_h = mysql_result($DB_HOME,"db_h");

			$DB_BARRACK = mysql($dbnam, "SELECT dbarrack FROM buildings WHERE userid='$INC_ID'");
			$db_b = mysql_result($DB_BARRACK, "db_b");

			$DB_FARM = mysql($dbnam, "SELECT dfarm FROM buildings WHERE userid='$INC_ID'");
			$db_f = mysql_result($DB_FARM, "db_f");

			$DB_WP = mysql($dbnam, "SELECT dwp FROM buildings WHERE userid='$INC_ID'");
			$db_wp = mysql_result($DB_WP,"db_wp");

			$DB_LMILL = mysql($dbnam, "SELECT dlmill FROM buildings WHERE userid='$INC_ID'");
			$db_lm = mysql_result($DB_LMILL,"db_lm");

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

			$_WoP = mysql($dbnam, "SELECT wp FROM buildings WHERE userid='$INC_ID'");
			$_wp = mysql_result($_WoP,"_wp");

			$_lmill = mysql($dbnam, "SELECT lmill FROM buildings WHERE userid='$INC_ID'");
			$_lm = mysql_result($_lmill,"_lm");

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

			$W_HOURS = mysql($dbnam, "SELECT Whrs FROM buildings WHERE userid='$INC_ID'");
			$W_HRS = mysql_result($W_HOURS,"W_HRS");

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
						
			$r5pts_r = mysql($dbnam, "SELECT r5pts FROM research WHERE userid='$INC_ID'");
			$r5points = mysql_result($r5pts_r,"r5points");

			$updateeexpland = mysql($dbnam, "SELECT expland FROM explore WHERE userid='$INC_ID'");
			$updateeexpmt = mysql($dbnam, "SELECT expmt FROM explore WHERE userid='$INC_ID'");
			$updateumts = mysql($dbnam, "SELECT mts FROM user WHERE userid='$INC_ID'");
			$updateuland = mysql($dbnam, "SELECT land FROM user WHERE userid='$INC_ID'");
			$AVL_LAND = mysql($dbnam, "SELECT aland FROM buildings WHERE userid='$INC_ID'");
			$AVL_MTS = mysql($dbnam, "SELECT amts FROM buildings WHERE userid='$INC_ID'");
						
			$upexpland = mysql_result($updateeexpland,"upexpland");
			$upexpmt = mysql_result($updateeexpmt,"upexpmt");
			$upmts = mysql_result($updateumts,"upmts");
			$upland = mysql_result($updateuland,"upland");
			$A_LAND = mysql_result($AVL_LAND,"A_LAND");
			$A_MTS = mysql_result($AVL_MTS,"A_MTS");

//#########################################
//##
//##    selecting gold production by class
//##
//#########################################

			if($E_CLASS == Fighter)
				{$goldpro = (($_g * 300) * .95) + $upgp;
				}
			elseif($R_r4pts >= 40000)
				{$goldpro = (($_g * 300) * 1.05) + $upgp;
				}
			if($E_CLASS == Mage)
				{$goldpro = (($_g * 300) * 1.1) + $upgp; 
				}
			elseif($R_r4pts >= 40000)
				{$goldpro = (($_g * 300)  * 1.2) + $upgp; 
				}
			if($E_CLASS == Cleric)
				{$goldpro = $_g * 300 + $upgp;
				}
			elseif($R_r4pts >= 40000)
				{$goldpro = (($_g * 300) * 1.1) + $upgp; 
				}
						
					

//#########################################
//##
//## maxciv, foodpro, ironpro,new exp calculations
//##
//#########################################
			if($Safe_Mode > 0)
				{$Safe_Mode = $Safe_Mode - 1; mysql_query("UPDATE user SET safemode = \"$Safe_Mode\" WHERE userid='$INC_ID'");
				}
			

			$NEW_MAX_CIV = $MAX_CIV + (.01 * $upciv);
			$lumberpro = ($_lm * 2) + $uplumber;
			if($E_class == Ranger)
				{$lumberpro = ($_lm * 2.1) + $uplumber;}

			$foodpro = ($_f * .5) + $upfood;
			$ironpro = ($_i * 1.945) + $upiron;
			  if($r5points >= 40000)
				{$ironpro = ($_i * 2.045) + $upiron;}
			  
			  if($U_RACE == Dwarf)
				{
					$ironpro = ($_i * 2.095) + $upiron;
					if($r5points >= 40000)
						{$ironpro = ($_i * 2.195);}
				}



			$civpro = ($_h * .265) + $upciv;
			$civexp = ($_h * .265) * 5;
		
				if($U_RACE == Giant)
					{$foodpro = ($_f * .6) + $upfood;
					}
				if($U_RACE == Elf)
					{
					 $civexp = ($_h * .165) * 5;
					 $civpro = ($_h * .165) + $civpro;
					}
				if($U_RACE == Orc)
					{$civpro = ($_h * .425);$civexp = ($_h * .425);}
				if($upfood > $_f * 50)
					{$foodpro = $upfood * .97;
					}
			
				if($upciv > $_h * 20)
					{$civpro = $upciv * .97;
					}
				if($upciv > $upfood)
					{$civpro = $upciv * .97;
					}

				if($E_class == "Cleric")
					{$civexp = $civexp * 1.05;}

				

			$NEW_MAX_CIV = round($NEW_MAX_CIV);
			$lumberpro = round($lumberpro);
			$foodpro = round($foodpro);
			$ironpro = round($ironpro);
			$civpro = round($civpro);
			$civexp = round($civexp);

			mysql_query("UPDATE military SET maxciv = \"$NEW_MAX_CIV\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET gp = \"$goldpro\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET iron = \"$ironpro\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET food = \"$foodpro\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE military SET civ = \"$civpro\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET lumber = \"$lumberpro\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET online = \"0\" WHERE userid='$INC_ID'");


				$newexp = $up_exp + $up_exp2 + $civexp;
				mysql_query("UPDATE user SET exp = \"$newexp\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET exp2 = \"0\" WHERE userid='$INC_ID'");


				
		
//#########################################
//##
//## updating buildings
//##
//#########################################
					//CHECK FOR HHRS
				$Hhrs_Query = ("SELECT Hhrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Hhrs_Result = mysql_query($Hhrs_Query);
				$Hhrs_Check = mysql_fetch_array($Hhrs_Result);	
					//CHECK FOR BHRS
				$Bhrs_Query = ("SELECT Bhrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Bhrs_Result = mysql_query($Bhrs_Query);
				$Bhrs_Check = mysql_fetch_array($Bhrs_Result);	
						//CHECK FOR FHRS
				$Fhrs_Query = ("SELECT Fhrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Fhrs_Result = mysql_query($Fhrs_Query);
				$Fhrs_Check = mysql_fetch_array($Fhrs_Result);	
						//CHECK FOR WHRS
				$Whrs_Query = ("SELECT Whrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Whrs_Result = mysql_query($Whrs_Query);
				$Whrs_Check = mysql_fetch_array($Whrs_Result);
					//CHECK FOR LHRS
				$Lhrs_Query = ("SELECT Lhrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Lhrs_Result = mysql_query($Lhrs_Query);
				$Lhrs_Check = mysql_fetch_array($Lhrs_Result);
						//CHECK FOR GHRS
				$Ghrs_Query = ("SELECT Ghrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Ghrs_Result = mysql_query($Ghrs_Query);
				$Ghrs_Check = mysql_fetch_array($Ghrs_Result);
						//CHECK FOR HHRS
				$Ihrs_Query = ("SELECT Ihrs FROM buildings WHERE userid=\"$INC_ID\"");
				$Ihrs_Result = mysql_query($Ihrs_Query);
				$Ihrs_Check = mysql_fetch_array($Ihrs_Result);	
		
	if($Hhrs_Check[0] != 0)		
			{$H_BUILT = $db_h / $H_HRS;}
		else{$H_BUILT = $db_h;}
	
	if($Bhrs_Check[0] != 0)
			{$B_BUILT = $db_b / $B_HRS;}
		else{$B_BUILT = $db_b;}
	
	if($Fhrs_Check[0] != 0)
			{$F_BUILT = $db_f / $F_HRS;}
		else{$F_BUILT = $db_f;}
	
	if($Whrs_Check[0] != 0)
			{$W_BUILT = $db_wp / $W_HRS;}
		else{$W_BUILT = $db_wp;}
	
	if($Lhrs_Check[0] != 0)
			{$L_BUILT = $db_lm / $L_HRS;}
		else{$L_BUILT = $db_lm;}

	if($Ghrs_Check[0] != 0)
			{$G_BUILT = $db_g / $G_HRS;}
		else{$G_BUILT = $db_g;}

	if($Ihrs_Check[0] != 0)
			{$I_BUILT = $db_i / $I_HRS;}
		else{$I_BUILT = $db_i;}

			    $H_BUILT = round($H_BUILT);
				$B_BUILT = round($B_BUILT);
				$F_BUILT = round($F_BUILT);
				$W_BUILT = round($W_BUILT);
				$L_BUILT = round($L_BUILT);
				$G_BUILT = round($G_BUILT);
				$I_BUILT = round($I_BUILT);

			//ADDED TO BUILDINGS
				$newhome = $_h + $H_BUILT;
				$newbarrack = $_b + $B_BUILT;
				$newfarm = $_f + $F_BUILT;
				$newwp = $_wp + $W_BUILT;
				$newlm = $_lm + $L_BUILT;
				$newgm = $_g + $G_BUILT;
				$newim = $_i + $I_BUILT;

			//SUBTRACTED FROM DBVALUES
				$newdbhome = $db_h - $H_BUILT;
				$newdbbarrack = $db_b - $B_BUILT;
				$newdbfarm = $db_f - $F_BUILT;
				$newdbwp = $db_wp - $W_BUILT;
				$newdblm = $db_lm - $L_BUILT;
				$newdbgm = $db_g - $G_BUILT;
				$newdbim = $db_i - $I_BUILT;
	
			mysql_query("UPDATE buildings SET home = \"$newhome\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET barrack = \"$newbarrack\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET farm = \"$newfarm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET wp = \"$newwp\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET lmill = \"$newlm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET gm = \"$newgm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET im = \"$newim\" WHERE userid='$INC_ID'");

			mysql_query("UPDATE buildings SET dhome = \"$newdbhome\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dbarrack = \"$newdbbarrack\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dfarm = \"$newdbfarm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dwp = \"$newdbwp\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dlmill = \"$newdblm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dgm = \"$newdbgm\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET dim = \"$newdbim\" WHERE userid='$INC_ID'");

			if($H_HRS > 0)
				{$H_HRS = $H_HRS - 1; mysql_query("UPDATE buildings SET Hhrs = \"$H_HRS\" WHERE userid='$INC_ID'");
				}
			if($B_HRS > 0)
				{$B_HRS = $B_HRS - 1;mysql_query("UPDATE buildings SET Bhrs = \"$B_HRS\" WHERE userid='$INC_ID'");
				}
			if($F_HRS > 0)
				{$F_HRS = $F_HRS - 1;mysql_query("UPDATE buildings SET Fhrs = \"$F_HRS\" WHERE userid='$INC_ID'");
				}
			if($W_HRS > 0)
				{$W_HRS = $W_HRS - 1;mysql_query("UPDATE buildings SET Whrs = \"$W_HRS\" WHERE userid='$INC_ID'");
				}
			if($L_HRS > 0)
				{$L_HRS = $L_HRS - 1;mysql_query("UPDATE buildings SET Lhrs = \"$L_HRS\" WHERE userid='$INC_ID'");
				}
			if($G_HRS > 0)
				{$G_HRS = $G_HRS - 1;mysql_query("UPDATE buildings SET Ghrs = \"$G_HRS\" WHERE userid='$INC_ID'");
				}
			if($I_HRS > 0)
				{$I_HRS = $I_HRS - 1;mysql_query("UPDATE buildings SET Ihrs = \"$I_HRS\" WHERE userid='$INC_ID'");
				}

//#########################################
//##
//## 		researching
//##
//#########################################

			$updaterr1 = mysql($dbnam, "SELECT r1 FROM research WHERE userid='$INC_ID'");
			$updaterr2 = mysql($dbnam, "SELECT r2 FROM research WHERE userid='$INC_ID'");
			$updaterr3 = mysql($dbnam, "SELECT r3 FROM research WHERE userid='$INC_ID'");
			$updaterr4 = mysql($dbnam, "SELECT r4 FROM research WHERE userid='$INC_ID'");
			$updaterr5 = mysql($dbnam, "SELECT r5 FROM research WHERE userid='$INC_ID'");
			$updaterr6 = mysql($dbnam, "SELECT r6 FROM research WHERE userid='$INC_ID'");
			$updaterr7 = mysql($dbnam, "SELECT r7 FROM research WHERE userid='$INC_ID'");
				$upr1 = mysql_result($updaterr1,"upr1");
				$upr2 = mysql_result($updaterr2,"upr2");
				$upr3 = mysql_result($updaterr3,"upr3");
				$upr4 = mysql_result($updaterr4,"upr4");
				$upr5 = mysql_result($updaterr5,"upr5");
				$upr6 = mysql_result($updaterr6,"upr6");
				$upr7 = mysql_result($updaterr7,"upr7");
			$updaterr1points = mysql($dbnam, "SELECT r1pts FROM research WHERE userid='$INC_ID'");
			$updaterr2points = mysql($dbnam, "SELECT r2pts FROM research WHERE userid='$INC_ID'");
			$updaterr3points = mysql($dbnam, "SELECT r3pts FROM research WHERE userid='$INC_ID'");
			$updaterr4points = mysql($dbnam, "SELECT r4pts FROM research WHERE userid='$INC_ID'");
			$updaterr5points = mysql($dbnam, "SELECT r5pts FROM research WHERE userid='$INC_ID'");
			$updaterr6points = mysql($dbnam, "SELECT r6pts FROM research WHERE userid='$INC_ID'");
			$updaterr7points = mysql($dbnam, "SELECT r7pts FROM research WHERE userid='$INC_ID'");
				$upr1pts = mysql_result($updaterr1points,"upr1pts");
				$upr2pts = mysql_result($updaterr2points,"upr2pts");
				$upr3pts = mysql_result($updaterr3points,"upr3pts");
				$upr4pts = mysql_result($updaterr4points,"upr4pts");
   				$upr5pts = mysql_result($updaterr5points,"upr5pts");
				$upr6pts = mysql_result($updaterr6points,"upr6pts");
				$upr7pts = mysql_result($updaterr7points,"upr7pts");

			$firstpoints = $upr1pts + ($upr1 * 1);
			$secondpoints = $upr2pts + ($upr2 * 1);
			$thirdpoints = $upr3pts + ($upr3 * 1);
			$fourthpoints = $upr4pts + ($upr4 * 1);
			$fifthpoints = $upr5pts + ($upr5 * 1);
			$sixthpoints = $upr6pts + ($upr6 * 1);
			$seventhpoints = $upr7pts + ($upr7 * 1);

			if($firstpoints > 10000)
				{$firstpoints = 10000;}
			if($secondpoints > 50000)
				{$secondpoints = 50000;}
			if($thirdpoints > 100000)
				{$thirdpoints = 100000;}
			if($fourthpoints > 40000)
				{$fourthpoints = 40000;}
			if($fifthpoints > 40000)
				{$fifthpoints = 40000;}
			if($sixthpoints > 125000)
				{$sixthpoints = 125000;}
			if($seventhpoints > 150000)
				{$seventhpoints = 150000;}

				mysql_query("UPDATE research SET r1pts = \"$firstpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r2pts = \"$secondpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r3pts = \"$thirdpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r4pts = \"$fourthpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r5pts = \"$fifthpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r6pts = \"$sixthpoints\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE research SET r7pts = \"$seventhpoints\" WHERE userid='$INC_ID'");

//#########################################
//##
//##		exploring
//##
//#########################################

			$form1 = $upexpland * .02;
			$form2 = $upexpmt * .02;
			
			if($U_RACE == Human)
				{$form1 = $upexpland * .025	; $form2 = $upexpmt * .025;}
			if($E_class == Ranger)
				{$form1 = $upexpland/45; $form2 = $uexpmt/45;}
			if($E_class == Ranger AND $U_RACE == Human)
				{$form1 = $upexpland/35; $form2 = $upexpmt/35;}
			$form1 = floor($form1);
			$form2 = floor($form2);

			$newland = $upland + $form1;
			$newmt = $upmts + $form2;
			$new_aland = $A_LAND + $form1;
			$new_amts = $A_MTS + $form2;
						
			mysql_query("UPDATE buildings SET aland = \"$new_aland\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE buildings SET amts = \"$new_amts\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET land = \"$newland\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET mts = \"$newmt\" WHERE userid='$INC_ID'");

//#########################################
//##
//##	new troops (thieves, scien, explor, wars, wiz, pris, 