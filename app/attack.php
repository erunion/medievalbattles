<?	 include("include/header_game.php");	?>

<center>
<form type="post" action="attack.php">
<b class="reg">Settlement:</b><input type="number" name="snum" size="3" maxlength="3">
<input type="hidden" name="setchg" value="1">
<input type="submit" value="Change">
</form>

<?
if(!IsSet($attack))	{
	include("attack_include.php");
} else {
	// First thing is first, does the user have an available general?
	$maxgenerals = 4;
	if ($maxgenerals - countgenerals($cuid) < 1) {
		echo "<center>You do not have any available generals to attack with.</center>";
		include("include/footer_game.php");
		exit();
	};

	// Did they choose an empire to attack?
	if (!$attackee || $attackee == '' || $attackee == 'nodata') {
		echo "<center>You did not choose an empire to attack.</center>";
		include("include/footer_game.php");
		exit();
	};

	$attackpower = 0;
	$defensepower = 0;
	$arr = get_defined_vars();

	// Get list of returning military
	$query = "SELECT t.data1, sum(t.data2) AS data2 FROM tick t WHERE t.type = 'troop' AND t.user_id = '$cuid' GROUP BY t.data1";
	$result = mysql_db_query($cdbname, $query, $connection) or die("Error getting returning military: [" . mysql_error() . "]");
	while ($myrow = mysql_fetch_array($result)) {
		$data1 = $myrow["data1"];
		$data2 = $myrow["data2"];
		$returningmilitary["attack"][$data1] = $data2;
	};

	// Get list of attackee's returning military
	$query = "SELECT t.data1, sum(t.data2) AS data2 FROM tick t WHERE t.type = 'troop' AND t.user_id = '$attackee' GROUP BY t.data1";
	$result = mysql_db_query($cdbname, $query, $connection) or die("Error getting attackees defending military: [" . mysql_error() . "]");
	while ($myrow = mysql_fetch_array($result)) {
		$data1 = $myrow["data1"];
		$data2 = $myrow["data2"];
		$returningmilitary["defend"][$data1] = $data2;
	};

	// Get Race Information
	$ri_query = "SELECT id, atk, spd, def FROM races";
	$ri_result = mysql_db_query($cdbname, $ri_query, $connection) or die("Error retrieving race information: [" . mysql_error() . "]");
	while ($ri_row = mysql_fetch_array($ri_result)) 
	{
		$race_id   = $ri_row["id"];
		$race_atk_value = $ri_row["atk"];
		$race_spd_value = $ri_row["spd"];
		$race_def_value = $ri_row["def"];
		$race_atk[$race_id] = $race_atk_value;
		$race_spd[$race_id] = $race_spd_value;
		$race_def[$race_id] = $race_def_value;
	};

	// Get Class Information
	$ci_query = "SELECT id, atk, spd, def FROM classes";
	$ci_result = mysql_db_query($cdbname, $ci_query, $connection) or die("Error retrieving class information: [" . mysql_error() . "]");
	while ($ci_row = mysql_fetch_array($ci_result)) 
	{
		$class_id   = $ci_row["id"];
		$class_atk_value = $ci_row["atk"];
		$class_spd_value = $ci_row["spd"];
		$class_def_value = $ci_row["def"];
		$class_atk[$class_id] = $class_atk_value;
		$class_spd[$class_id] = $class_spd_value;
		$class_def[$class_id] = $class_def_value;
	};

	// Get all of user's troops

	$query = "SELECT rt.name, rt.race_id AS raceid, rt.id AS rtid, rt.atk, rt.wep_class, ut.id AS utid, ut.amount FROM race_troop rt LEFT JOIN user_troop ut ON rt.id = ut.troop_id WHERE ut.user_id = '$cuid' AND rt.race_id = '$race'";
	$result = mysql_db_query($cdbname, $query, $connection) or die("Error!: [" . mysql_error() . "]");
	while ($myrow = mysql_fetch_array($result)) 
	{
		$troop_id = $myrow["rtid"];
		$ut_id = $myrow["utid"];
		$troop_race_req = $myrow["raceid"];			
		$troop_name = $myrow["name"];
		$troop_atk_power = $myrow["atk"];
		$troop_weapon_class = $myrow["wep_class"];
		$troop_owned = $myrow["amount"];
	
		$attacker_troops[$troop_id] = $troop_owned - $returning_military["attack"][$troop_id];
		echo "<br>You have $attacker_troops[$troop_id] of $troop_name ($troop_id) available. ($troop_owned total)";

		// Get troop's equipped weapon
		$tew_query = "SELECT uw.weapon_id, uw.equipped, w.id AS wid, w.class AS wclass, w.atk AS watk FROM user_weapon uw LEFT JOIN weapon w ON uw.weapon_id = w.id WHERE uw.user_id = '$cuid' AND w.class = '$troop_weapon_class' AND uw.equipped = 'y'";
		$tew_result = mysql_db_query($cdbname, $tew_query, $connection) or die("Error!: [" . mysql_error() . "]");
		$tew_myrow = mysql_fetch_array($tew_result);
		$attacker_weapon_power[$troop_id] = $tew_myrow["watk"];
		echo "Their weapon power seems to be $attacker_weapon_power[$troop_id]<br>";
	};

	// Start attacking
	for ($x = 1; $x < 100; $x++) {
		if (!empty($arr[$x])) {
			if ($arr[$x] < 1) {
				echo "<div align=center><font class=yellow>You can not send less than 1 unit.</font></div>";
				include("include/footer_game.php");
				die();
			} else if ($attacktype == "") {
				echo "<div align=center><font class=yellow>You must select an attack type.</font></div>";
				include("include/footer_game.php");
				die();
			} else if ($attacker_troops[$x] < 1) {
				echo "<div align=center><font class=yellow>You do not have that many troops to send.</font></div>";
				include("include/footer_game.php");
				die();
			};

			$attackpower = $attackpower + ($arr[$x] * ($troop_atk_power + $weapon_atk));
		};
	};

	// Calculate Attack Power
	$attackpower = $attackpower + ($race_atk[$race] * $class_atk[$class]);

	echo "<br>race atk: $race_atk[$race]";
	echo "<br>class atk: $class_atk[$class]";
	echo "<br>Total Attack Power is $attackpower<br><br>";
	echo "attack info over<hr>";

	// Get information on attackee
	$gai_query = "SELECT * FROM users WHERE id = '$attackee'";
	$gai_result = mysql_db_query($cdbname, $gai_query, $connection) or die("Error!: [" . mysql_error() . "]");
	$gai_myrow = mysql_fetch_array($gai_result);
		$attackee_race = $gai_myrow["race"];
		$attackee_class = $gai_myrow["class"];
		$attackee_land = $gai_myrow["land"];
		$attackee_land_buildings = $gai_myrow["land_buildings"];
		$attackee_mtn = $gai_myrow["land"];
		$attackee_mtn_buildings = $gai_myrow["land_buildings"];
		$attackee_gold = $gai_myrow["gold"];
		$attackee_iron = $gai_myrow["iron"];
		$attackee_lumber = $gai_myrow["lumber"];
		$attackee_civilians = $gai_myrow["civilians"];
		$attackee_food = $gai_myrow["food"];
		$attackee_experience = $gai_myrow["exp"];

	// Get list of their defending military
	$theirdefmil_query = "SELECT rt.name, rt.race_id AS raceid, rt.id AS rtid, rt.def, rt.wep_class, ut.id AS utid, ut.amount FROM race_troop rt LEFT JOIN user_troop ut ON rt.id = ut.troop_id WHERE ut.user_id = '$attackee' AND rt.race_id = '$attackee_race'";
	$theirdefmil_result = mysql_db_query($cdbname, $theirdefmil_query, $connection) or die("Error!: [" . mysql_error() . "]");
	while ($theirdefmil_myrow = mysql_fetch_array($theirdefmil_result)) 
	{
		$attackee_troop_id = $theirdefmil_myrow["rtid"];
		$attackee_ut_id = $theirdefmil_myrow["utid"];
		$attackee_troop_race_req = $theirdefmil_myrow["raceid"];			
		$attackee_troop_name = $theirdefmil_myrow["name"];
		$attackee_troop_def_power = $theirdefmil_myrow["def"];
		$attackee_troop_armor_class = $theirdefmil_myrow["wep_armor"];
		$attackee_troop_owned = $theirdefmil_myrow["amount"] - $returningmilitary["defend"][$attackee_troop_id];

		// Get their troop's equipped weapon
		$atew_query = "SELECT uw.armor_id, uw.equipped, w.id AS wid, w.class AS wclass, w.def AS wdef FROM user_armor uw LEFT JOIN armor w ON uw.armor_id = w.id WHERE uw.user_id = '$attackee' AND w.class = '$attackee_troop_armor_class' AND uw.equipped = 'y'";
		$atew_result = mysql_db_query($cdbname, $atew_query, $connection) or die("Error!: [" . mysql_error() . "]");
		$atew_myrow = mysql_fetch_array($atew_result);
			$attackee_armor_def = $atew_myrow["wdef"];
			if ($attackee_armor_def == 0)	{	
				$attackee_armor_def = 1;
			};
		
		$deftroop[$attackee_troop_id] = $attackee_troop_owned - $returning_military[$attackee_troop_id];
		echo "<br>The defender seems to have $deftroop[$attackee_troop_id] $attackee_troop_name ($attacke_troop_id) available. ($attackee_troop_owned total)<br>Their armor defence seems to be $attackee_armor_def<br>";
		$defensepower = $defensepower + ($deftroop[$attackee_troop_id] * ($attackee_troop_def_power + $attackee_armor_def));
	};

	// Calculate Defense Power
	$defensepower = $defensepower + ($race_def[$attackee_race] * $class_def[$attackee_class]);
	echo "<br><br>Total Defense Power is $defensepower<br>";

	$difference = abs($attackpower - $defensepower);

	if ($attackpower > $defensepower)	{
		// Attack Success
		$success = 1;
		$youdiv = 200;
		$themdiv = 100;
		 echo "<b>win</b>";
	} else {
		// Attack Failure
		$youdiv = 100;
		$themdiv = 200;
		echo "<b>lose</b>";
	};

	// Remove Troops
	// Remove Your Troops
	$maxreturntime = 0;
	for ($x = 1; $x < 100; $x++) {
		if ($arr[$x]) {
			$toreturn = floor($arr[$x] - ($difference / $youdiv)); // How many return
			$totaltosubtract = $arr[$x] - $toreturn;
			// You lost $totaltosubtract X (give name) // need to notify user of lost troops
			$rt_query = "UPDATE user_troop SET amount = amount - '$totaltosubtract' WHERE user_id = '$cuid' AND troop_id = '$x'";
			$rt_result = mysql_db_query($cdbname, $rt_query, $connection) or die("Error!: [" . mysql_error() . "]");

			// Calculate this troop's return time
			$urt_query = "SELECT rt FROM race_troop WHERE id = '$x'";
			$urt_result = mysql_db_query($cdbname, $urt_query, $connection) or die("Error!: [" . mysql_error() . "]");
			$urt_myrow = mysql_fetch_array($urt_result);
				$troop_return_time = $urt_myrow["rt"];

			$returntime = $troop_return_time + $race_spd[$race] + $class_spd[$class];
			echo "	<hr>		$returntime = $troop_return_time + $race_spd[$race] + $class_spd[$class];<hr>";
			echo "return time: [$returntime]<br>race spd: [$race_spd[$race]]<br>class spd: [$class_spd[$class]]<br>troop return time: [$troop_return_time]";

			if ($returntime > $maxreturntime) {$maxreturntime = $returntime;}; // For return time of general

			// Add these troops to return
			$r_query = "INSERT INTO tick (id, user_id, data1, data2, type, time) values ('', '$cuid', '$x', '$toreturn', 'troop', '$returntime')";
			$r_result = mysql_db_query($cdbname, $r_query, $connection) or die("Error adding troops to return: [" . mysql_error() . "]");
		};
	};

	// Add general to return
	$gr_query = "INSERT INTO tick (id, user_id, data1, data2, type, time) values ('', '$cuid', '', '', 'general', '$maxreturntime')";
	$gr_result = mysql_db_query($cdbname, $gr_query, $connection) or die("Error adding general to return: [" . mysql_error() . "]");

	// Remove Their Troops
	for ($x = 1; $x < 100; $x++) {
		if ($deftroop[$x]) {
			$newamount = floor($deftroop[$x] - ($difference / $themdiv));
			// Are we notifying enemy troop loss? enemy just lost ($difference / $themdiv) troops
			$rt_query = "UPDATE user_troop SET amount = '$newamount' WHERE user_id = '$attackee' AND troop_id = '$x'";
			$rt_result = mysql_db_query($cdbname, $rt_query, $connection) or die("Error updating enemy troops: [" . mysql_error() . "]");
		};
	};

	// If success, give land or mtn or resources
	if ($success) {
		$winning_percentage = 0;
		
		// No-Bash Incentive
//		if ($exp <= "20000")	{
//			$winning_percentage = .05;
//		} else if (0($exp) < $attackee_exp <= .05($exp)) {
//			$winning_percentage = 
//		}
		
		// Give winnings
		if ($attacktype == "land")	{
			$get_land = floor($attackee_land * .1);

			// Get list of attackee's land buildings already built
			$alb_query = "SELECT b.name, b.cost, b.id AS bid, b.type, ub.id AS ubid, ub.amount FROM buildings b LEFT JOIN user_buildings ub ON b.id = ub.building_id WHERE ub.user_id = '$attackee' AND b.type = 'land' AND ub.amount > 0";
			$alb_result = mysql_db_query($cdbname, $alb_query, $connection) or die("Error!: [" . mysql_error() . "]");
			$d_buildings_total = 1;
			while ($alb_myrow = mysql_fetch_array($alb_result)) 
			{
				$kill_buildings[$kill_buildings_total]["bid"] = $alb_myrow["bid"];
				$kill_buildings[$kill_buildings_total]["amount"] = $alb_myrow["amount"];
				$kill_buildings[$kill_buildings_total]["type"] = "land";
				$kill_buildings_total = $kill_buildings_total + 1;
			};
			$free_land = getfreeland($attackee);

			if ($free_land > 0) {
				$kill_buildings[$kill_buildings_total]["amount"] = $free_land;
				$kill_buildings[$kill_buildings_total]["type"] = "freeland";
			};

			$total_buildings_to_kill = $get_land;
			$total_buildings_left_to_kill = $get_land;

			while($total_buildings_left_to_kill > 0) {
				for ($j = 1; $j <= $kill_buildings_total; $j++) {
					if ($kill_buildings[$j]["amount"] > 0 && $total_buildings_left_to_kill > 0) {
						$kill_buildings[$j]["amount"] = $kill_buildings[$j]["amount"] - 1;
						$total_buildings_left_to_kill = $total_buildings_left_to_kill - 1;
					};
				};
			};

			// KILL! KILL! KILL!
			for ($i = 1; $i <= $d_buildings_total; $i++) {
				$b_amount = $kill_buildings[$i]["amount"];
				$b_id = $kill_buildings[$i]["bid"];
				if ($kill_buildings[$i]["type"] == "land") {
					$kill_buildings_query = "UPDATE user_buildings SET amount = '$b_amount' WHERE user_id = '$attackee' AND building_id = '$b_id'";
					mysql_db_query($cdbname, $kill_buildings_query, $connection) or die("Error!: [" . mysql_error() . "]");
				} else {
					$lose_freeland = ($free_land - $b_amount);
				};
			};

			$lose_buildings = $get_land - $lose_freeland;			
			$kill_land_query = "UPDATE users SET land_buildings = land_buildings - '$lose_buildings' WHERE id = '$attackee'";
			mysql_db_query($cdbname, $kill_land_query, $connection) or die("Error!: [" . mysql_error() . "]");

			// Update attackers land
			$update_land_query = "UPDATE users SET land = land + '$get_land' WHERE id = '$cuid'";
			mysql_db_query($cdbname, $update_land_query, $connection) or die("Error!: [" . mysql_error() . "]");

			// Update attackees land
			$update_land_query = "UPDATE users SET land = land - '$get_land' WHERE id = '$attackee'";
			mysql_db_query($cdbname, $update_land_query, $connection) or die("Error!: [" . mysql_error() . "]");

		} else if ($attacktype == "mountain")	{
		} else if ($attacktype == "resource")	{
		};

	};


};

include("include/footer_game.php");	
?>	