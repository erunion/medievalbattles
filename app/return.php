<?

	echo "Starting tick";



				
//########################################################
//##
//##
//##  first starts
//##
//##
//########################################################		
				
				
		@mysql_connect (localhost, ursenbach, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
		$INC_ID = 1;
		
While($INC_ID < $ID_PLUS_1)
  	{
					

			$the_warriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid=\"$INC_ID\"");
			$the_war = mysql_result($the_warriors,"the_war");
						
			$the_wizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid=\"$INC_ID\"");
			$the_wiz = mysql_result($the_wizards,"the_wiz");
						
			$the_priests = mysql($dbnam, "SELECT priests FROM military WHERE userid=\"$INC_ID\"");
			$the_pri = mysql_result($the_priests,"the_pri");

			$the_archers = mysql($dbnam, "SELECT archers FROM military WHERE userid=\"$INC_ID\"");
			$the_arch = mysql_result($the_archers,"the_arch");
		
			$first_time = mysql($dbnam, "SELECT time1 FROM return WHERE userid=\"$INC_ID\"");
			$first_1 = mysql_result($first_time,"first_1");
						
			$warriors_1 = mysql($dbnam, "SELECT war1 FROM return WHERE userid=\"$INC_ID\"");
			$war_one = mysql_result($warriors_1,"war_one");
						
			$wizards_1 = mysql($dbnam, "SELECT wiz1 FROM return WHERE userid=\"$INC_ID\"");
			$wiz_one = mysql_result($wizards_1,"wiz_one");
						
			$priests_1 = mysql($dbnam, "SELECT pri1 FROM return WHERE userid=\"$INC_ID\"");
			$pri_one = mysql_result($priests_1,"pri_one");

			$archers_1 = mysql($dbnam, "SELECT arch1 FROM return WHERE userid=\"$INC_ID\"");
			$arch_one = mysql_result($archers_1,"arch_one");
						
			$the_fleets = mysql($dbnam, "SELECT fleets FROM user WHERE userid=\"$INC_ID\"");
			$Fleets_F = mysql_result($the_fleets,"Fleets_F");


			IF($first_1 == 1)
			{
				$the_war1 = $the_war + $war_one;
				$the_wiz1 = $the_wiz + $wiz_one;
				$the_pri1 = $the_pri + $pri_one;
				$the_arch1 = $the_arch + $arch_one;

				mysql_query("UPDATE military SET warriors = \"$the_war1\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET wizards = \"$the_wiz1\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET priests = \"$the_pri1\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET archers = \"$the_arch1\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET war1 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET wiz1 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET pri1 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET arch1 = \"0\" WHERE userid='$INC_ID'");

				$Fleets_F1 = $Fleets_F + 1;
				mysql_query("UPDATE user SET fleets = \"$Fleets_F1\" WHERE userid='$INC_ID'");
			}

			
			
			
			IF($first_1 > 0)
			{
				$new_first = $first_1 - 1;
				mysql_query("UPDATE return SET time1 = \"$new_first\" WHERE userid='$INC_ID'");
				
			}
			
			
	
			$INC_ID = $INC_ID + 1;

	
		}

//########################################################
//##
//##
//##  second starts
//##
//##
//########################################################

		@mysql_connect (localhost, ursenbach, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
		$INC_ID = 1;

While($INC_ID < $ID_PLUS_1)
  	{
					

			$the_warriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid=\"$INC_ID\"");
			$the_war = mysql_result($the_warriors,"the_war");
						
			$the_wizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid=\"$INC_ID\"");
			$the_wiz = mysql_result($the_wizards,"the_wiz");
						
			$the_priests = mysql($dbnam, "SELECT priests FROM military WHERE userid=\"$INC_ID\"");
			$the_pri = mysql_result($the_priests,"the_pri");

			$the_archers = mysql($dbnam, "SELECT archers FROM military WHERE userid=\"$INC_ID\"");
			$the_arch = mysql_result($the_archers,"the_arch");

			$second_time = mysql($dbnam, "SELECT time2 FROM return WHERE userid=\"$INC_ID\"");
			$second_2 = mysql_result($second_time,"second_2");
						
			$warriors_2 = mysql($dbnam, "SELECT war2 FROM return WHERE userid=\"$INC_ID\"");
			$war_two = mysql_result($warriors_2,"war_two");
						
			$wizards_2 = mysql($dbnam, "SELECT wiz2 FROM return WHERE userid=\"$INC_ID\"");
			$wiz_two = mysql_result($wizards_2,"wiz_two");
						
			$priests_2 = mysql($dbnam, "SELECT pri2 FROM return WHERE userid=\"$INC_ID\"");
			$pri_two = mysql_result($priests_2,"pri_two");

			$archers_2 = mysql($dbnam, "SELECT arch2 FROM return WHERE userid=\"$INC_ID\"");
			$arch_two = mysql_result($archers_2,"arch_two");
						
			$the_fleets = mysql($dbnam, "SELECT fleets FROM user WHERE userid=\"$INC_ID\"");
			$Fleets_F = mysql_result($the_fleets,"Fleets_F");


			

			IF($second_2 == 1)
			{
				$the_war2 = $the_war + $war_two;
				$the_wiz2 = $the_wiz + $wiz_two;
				$the_pri2 = $the_pri + $pri_two;
				$the_arch2 = $the_arch + $arch_two;
				mysql_query("UPDATE military SET warriors = \"$the_war2\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET wizards = \"$the_wiz2\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET priests = \"$the_pri2\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET archers = \"$the_arch2\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET war2 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET wiz2 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET pri2 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET arch2 = \"0\" WHERE userid='$INC_ID'");

				$Fleets_F2 = $Fleets_F + 1;
				mysql_query("UPDATE user SET fleets = \"$Fleets_F2\" WHERE userid='$INC_ID'");	
			}
			
			IF($second_2 > 0)
			{
				$new_first2 = $second_2 - 1;
				mysql_query("UPDATE return SET time2 = \"$new_first2\" WHERE userid='$INC_ID'");
			
			}
			
			$INC_ID = $INC_ID + 1;

	
		}

//########################################################
//##
//##
//##  third starts
//##
//##
//########################################################

		@mysql_connect (localhost, ursenbach, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
		$INC_ID = 1;
		
While($INC_ID < $ID_PLUS_1)
  	{
					

			$the_warriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid=\"$INC_ID\"");
			$the_war = mysql_result($the_warriors,"the_war");
						
			$the_wizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid=\"$INC_ID\"");
			$the_wiz = mysql_result($the_wizards,"the_wiz");
						
			$the_priests = mysql($dbnam, "SELECT priests FROM military WHERE userid=\"$INC_ID\"");
			$the_pri = mysql_result($the_priests,"the_pri");

			$the_archers = mysql($dbnam, "SELECT archers FROM military WHERE userid=\"$INC_ID\"");
			$the_arch = mysql_result($the_archers,"the_arch");

			$third_time = mysql($dbnam, "SELECT time3 FROM return WHERE userid=\"$INC_ID\"");
			$third_3 = mysql_result($third_time,"third_3");
						
			$warriors_3 = mysql($dbnam, "SELECT war3 FROM return WHERE userid=\"$INC_ID\"");
			$war_three = mysql_result($warriors_3,"war_three");

			$wizards_3 = mysql($dbnam, "SELECT wiz3 FROM return WHERE userid=\"$INC_ID\"");
			$wiz_three = mysql_result($wizards_3,"wiz_three");

			$priests_3 = mysql($dbnam, "SELECT pri3 FROM return WHERE userid=\"$INC_ID\"");
			$pri_three = mysql_result($priests_3,"pri_three");

			$archers_3 = mysql($dbnam, "SELECT arch3 FROM return WHERE userid=\"$INC_ID\"");
			$arch_three = mysql_result($archers_3,"arch_three");

			$the_fleets = mysql($dbnam, "SELECT fleets FROM user WHERE userid=\"$INC_ID\"");
			$Fleets_F = mysql_result($the_fleets,"Fleets_F");


	

		IF($third_3 == 1)
			{
				$the_war3 = $the_war + $war_three;
				$the_wiz3 = $the_wiz + $wiz_three;
				$the_pri3 = $the_pri + $pri_three;
				$the_arch3 = $the_arch + $arch_three;
				mysql_query("UPDATE military SET warriors = \"$the_war3\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET wizards = \"$the_wiz3\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET priests = \"$the_pri3\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET archers = \"$the_arch3\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET war3 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET wiz3 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET pri3 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET arch3 = \"0\" WHERE userid='$INC_ID'");
				$Fleets_F3 = $Fleets_F + 1;
				mysql_query("UPDATE user SET fleets = \"$Fleets_F3\" WHERE userid='$INC_ID'");
			}

			IF($third_3 > 0)
			{
				$new_first3 = $third_3 - 1;
				mysql_query("UPDATE return SET time3 = \"$new_first3\" WHERE userid='$INC_ID'");
			
			}
			
			$INC_ID = $INC_ID + 1;

	
		}


//########################################################
//##
//##
//##  fourth starts
//##
//##
//########################################################	
		@mysql_connect (localhost, ursenbach, pa724);
		mysql_select_db (medievalbattles_com);
		$dbnam = medievalbattles_com;

		$max_userid = mysql($dbnam, "SELECT max(userid) FROM user"); 
		$max_UID = mysql_result($max_userid, "max_UID");
		
		$ID_PLUS_1 = $max_UID + 1;
		$INC_ID = 1;
		
While($INC_ID < $ID_PLUS_1)
  	{
					

			$the_warriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid=\"$INC_ID\"");
			$the_war = mysql_result($the_warriors,"the_war");
						
			$the_wizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid=\"$INC_ID\"");
			$the_wiz = mysql_result($the_wizards,"the_wiz");
						
			$the_priests = mysql($dbnam, "SELECT priests FROM military WHERE userid=\"$INC_ID\"");
			$the_pri = mysql_result($the_priests,"the_pri");

			$the_archers = mysql($dbnam, "SELECT archers FROM military WHERE userid=\"$INC_ID\"");
			$the_arch = mysql_result($the_archers,"the_arch");

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
						
			$the_fleets = mysql($dbnam, "SELECT fleets FROM user WHERE userid=\"$INC_ID\"");
			$Fleets_F = mysql_result($the_fleets,"Fleets_F");


		
			
			IF($fourth_4 == 1)
			{
				$the_war4 = $the_war + $war_four;
				$the_wiz4 = $the_wiz + $wiz_four;
				$the_pri4 = $the_pri + $pri_four;
				$the_arch4 = $the_arch + $arch_four;
				mysql_query("UPDATE military SET warriors = \"$the_war4\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET wizards = \"$the_wiz4\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET priests = \"$the_pri4\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE military SET archers = \"$the_arch4\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET war4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET wiz4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET pri4 = \"0\" WHERE userid='$INC_ID'");
				mysql_query("UPDATE return SET arch4 = \"0\" WHERE userid='$INC_ID'");
				$Fleets_F4 = $Fleets_F + 1;
				mysql_query("UPDATE user SET fleets = \"$Fleets_F4\" WHERE userid='$INC_ID'");
			}
			
			
			IF($fourth_4 > 0)
			{
				$new_first4 = $fourth_4 - 1;
				mysql_query("UPDATE return SET time4 = \"$new_first4\" WHERE userid='$INC_ID'");
				
			}
	
				
	

			$INC_ID = $INC_ID + 1;

			
		}


?>