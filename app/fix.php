<?

include("include/connect.php");
/*
While($set_tally < 41)
	{
			
			$count_mem = mysql($dbnam, "SELECT count(userid) FROM user WHERE setid='$set_tally'");
			$c_mem = mysql_result($count_mem, "c_mem");

			mysql_query("UPDATE settlement SET members = \"$c_mem\" WHERE setid='$set_tally'");

			$set_tally = $set_tally + 1;
	}
	*/

		
			
/*
	While($INC_ID  < 200)
	{
		

			$racer = mysql($dbnam, "SELECT race FROM user WHERE userid='$INC_ID'");
			$race = mysql_result($racer, "race");
			
			if($race == Orc)
				{
				
					
					mysql_query("UPDATE military SET civ = \"1000\" WHERE userid='$INC_ID'");
				}

		$INC_ID = $INC_ID + 1;
		

	}
	*/

//########################################################
//##
//##
//##  fourth starts
//##
//##
//########################################################	


		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
		$INC_ID = 1;
		
While($INC_ID < $ID_PLUS_1)
  	{
					
			$fourth_time = mysql($dbnam, "SELECT time4 FROM return WHERE userid=\"$INC_ID\"");
			$fourth_4 = mysql_result($fourth_time,"fourth_4");

			$warriors_4 = mysql($dbnam, "SELECT war4 FROM return WHERE userid=\"$INC_ID\"");
			$war_four = mysql_result($warriors_4,"war_four");

			$wizards_4 = mysql($dbnam, "SELECT wiz4 FROM return WHERE userid=\"$INC_ID\"");
			$wiz_four = mysql_result($wizards_4,"wiz_four");

			$priests_4 = mysql($dbnam, "SELECT pri4 FROM return WHERE userid=\"$INC_ID\"");
			$pri_four = mysql_result($priests_4,"pri_four");

			$archers_4 = mysql($dbnam, "SELECT arch4 FROM return WHERE userid=\"$INC_ID\"");
			$arch_four = mysql_result($archers_4,"arch_four");
						
			
			IF($fourth_4 == 1)
				{
				mysql_query("UPDATE military SET warriors = warriors + $war_four WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET wizards = wizards + $wiz_four WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET priests = priests + $pri_four WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET archers = archers + $arch_four WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET war4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET wiz4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET pri4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET arch4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET fleets = fleets + 1 WHERE userid='$INC_ID'");
				}
			
			
			IF($fourth_4 > 0)
			{mysql_query("UPDATE return SET time4 = time4 - 1 WHERE userid='$INC_ID'");
			}
	
			$INC_ID = $INC_ID + 1;
			
			if($INC_ID == $max_UID)
				{mysql_query("UPDATE Game_Info SET tick = \"no\"");
				}
			
		}	

			?>
	