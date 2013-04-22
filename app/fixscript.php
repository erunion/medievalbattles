<?

//#########################################
//##
//##   UPDATING BUILDINGS
//##
//#########################################

	include("include/connect.php");

	
	$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
	$max_UID = mysql_result($max_userid, "max_UID");
	$ID_PLUS_1 = $max_UID + 1;
	
While($INC_ID < $ID_PLUS_1)
  	{
	
		// CHECK TO SEE IF USERID IS THERE
		$U_Query = ("SELECT userid FROM user WHERE userid=\"$INC_ID\"");
		$U_Result = mysql_query($U_Query);
		$U_Check = mysql_fetch_array($U_Result);

	If($INC_ID == $U_Check[0] AND $INC_ID != "")
		{

			//Select all necessary values from DB	
			
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
					
			$AVL_LAND = mysql($dbnam, "SELECT aland FROM buildings WHERE userid='$INC_ID'");
			$AVL_MTS = mysql($dbnam, "SELECT amts FROM buildings WHERE userid='$INC_ID'");
						
		
			$aland = mysql_result($AVL_LAND,"aland");
			$amts = mysql_result($AVL_MTS,"amts");
			//Selected values ends
		
			$land = $_h + $_wp + $_b + $_lm + $_f + $aland + $db_h + $db_f + $db_b + $db_lm + $db_wp;
			$mts = $_g + $_i + $amts + $db_g + $db_i;
	
			mysql_query("UPDATE user SET land = \"$land\" WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET mts = \"$mts\" WHERE userid='$INC_ID'");
		

		}

	  $INC_ID = $INC_ID + 1;
		
		
	}

?>		