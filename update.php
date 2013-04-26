<?
//include("www/include/connect.php");
//include("www/include/clock.php");
include("include/connect.php");
include("include/clock.php");

	mysql_query("UPDATE game_info SET tick='yes'");
	$max_userid = mysql_db_query($dbnam, "SELECT max(userid) FROM user");
	$max_UID = mysql_result($max_userid, "max_UID");

While($INC_ID < $max_UID + 1)	{
			$query = "SELECT * FROM emailvalidate WHERE userid='$INC_ID'";
			$result = mysql_db_query($dbnam, $query) or die("Error in query! " . mysql_error());
			$validate = mysql_fetch_array($result);

			$query1 = "SELECT * FROM user WHERE userid='$INC_ID'";
			$result1 = mysql_db_query($dbnam, $query1) or die("Error in query! " . mysql_error());
			$user = mysql_fetch_array($result1);

			$query2 = "SELECT * FROM military WHERE userid='$INC_ID'";
			$result2 = mysql_db_query($dbnam, $query2) or die("Error in query! " . mysql_error());
			$mil = mysql_fetch_array($result2);

			$query3 = "SELECT * FROM buildings WHERE userid='$INC_ID'";
			$result3 = mysql_db_query($dbnam, $query3) or die("Error in query! " . mysql_error());
			$build = mysql_fetch_array($result3);

			$query4 = "SELECT * FROM research WHERE userid='$INC_ID'";
			$result4 = mysql_db_query($dbnam, $query4) or die("Error in query! " . mysql_error());
			$res = mysql_fetch_array($result4);

			$query5 = "SELECT * FROM explore WHERE userid='$INC_ID'";
			$result5 = mysql_db_query($dbnam, $query5) or die("Error in query! " . mysql_error());
			$explore = mysql_fetch_array($result5);

			$query6 = "SELECT * FROM returntbl WHERE userid='$INC_ID'";
			$result6 = mysql_db_query($dbnam, $query6) or die("Error in query! " . mysql_error());
			$ret = mysql_fetch_array($result6);

				$land_gain = 0;
				$mt_gain = 0;
				$exp_num = .9;
				$foodmod = .5;
				$gpmod = 1;
				$ironmod = 1.945;
				$lumbmod = 2;
				$civmod  = .26;
				$base = $build[home];
				$civ = $mil[civ];
				$food = $user[food];
				$fbase = $build[farm];
				$civexp = 0;
##################
### Update Recruits & Resources
##################
			switch($user['class'])	{
				case "Fighter";
				$gpmod = .95;
				break;

				case"Mage";
				$gpmod = 1.1;
				break;

				case"Ranger";
				$lumbmod = $lumbmod + .1;
				break;

				case"Savant";
				$gpmod = 1.5;
				break;

				case"Insurrectionist";
				$gpmod = .90;
				break;
			}
			switch($user[race])	{
				case"Angel";
				$civmod = $civmod + .10;
				break;

				case"Human";
				$exp_num = .8;
				break;

				case"Dwarf";
				$gpmod = $gpmod + .15;
				$ironmod = $ironmod + .15;
				break;

				case"Demon";
				$gpmod = $gpmod + .5;
				$ironmod = $ironmod + .5;
				$civmod = $civmod - .10;
				break;

				case"Elf";
				$civmod = $civmod - .15;
				break;

				case"Giant";
				$foodmod = $foodmod + .1;
				break;

				case"Night Elf";
				$foodmod = $foodmod + .25;
				$lumbmod = $lumbmod + .1;
				$civmod = $civmod - .25;
				break;
			}
			switch($res[r11pts])	 {
				case"100000";
				$gpmod = $gpmod + .1;
				break;
			}
			switch($res[r12pts])	 {
				case"100000";
				$ironmod = $ironmod + .1;
				break;
			}
			switch($res[r15pts])	 {
				case"100000";
				$foodmod = $foodmod + 2;
				break;
			}

			if($mil[civ] > $build[home] * 20)	{
				$base = $mil[civ];
				$civmod = .97;
			}

			if($mil[civ] > $user[food])	{
				$base = $mil[civ];
				$civmod = .97;
			}

			if($user[food] > $build[farm] * 50)	{
				$fbase = $user[food];
				$foodmod = .97;
				$food = 0;
			}

			mysql_query("UPDATE military SET maxciv = round($mil[maxciv] + (.007 * $mil[civ])), civ=round($base * $civmod) WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET gp = round(($build[gm] * 300) * $gpmod + $user[gp]), iron = round($build[im] * $ironmod + $user[iron]), food = round($foodmod * $fbase + $food), lumber = round($build[lmill] * $lumbmod + $user[lumber]) WHERE userid='$INC_ID'");
##################
### Update Land & Mountains
##################
			$max_land = round($user[land] * $exp_num);
			$max_mts  = round($user[mts] *  $exp_num);
			$per_land = floor($max_land / 20);
			$per_mt	  = floor($max_land / 20);

			if($explore[expland] != 0)	{	$land_gain = $explore[expland] / $per_land;	}
			if($explore[expmt] != 0)	 {	$mt_gain = $explore[expmt] / $per_mt;	}

			$mt_gain = floor($mt_gain);
			$land_gain = floor($land_gain);

			if($land_gain > 20)	{	$land_gain = 20;	}
			if($mt_gain > 20)	{	$mt_gain = 20;	}

			mysql_query("UPDATE buildings SET aland = aland + $land_gain, amts = amts + $mt_gain WHERE userid='$INC_ID'");
			mysql_query("UPDATE user SET land = land + $land_gain, mts = mts + $mt_gain WHERE userid='$INC_ID'");
##################
### Return Parties
##################
			if($ret[time1] == 1)	{
				mysql_query("UPDATE military SET warriors = warriors + $ret[war1], wizards = wizards + $ret[wiz1], priests = priests + $ret[pri1], archers = archers + $ret[arch1], golem = golem + $ret[golem1], irongolem = irongolem + $ret[irongolem1]  WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET fleets = fleets + 1 WHERE userid='$INC_ID'");
			}
			if($ret[time2] == 1)	 {
				mysql_query("UPDATE military SET warriors = warriors + $ret[war2], wizards = wizards + $ret[wiz2], priests = priests + $ret[pri2], archers = archers + $ret[arch2], golem = golem + $ret[golem2], irongolem = irongolem + $ret[irongolem2] WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET fleets = fleets + 1 WHERE userid='$INC_ID'");
			}
			if($ret[time3] == 1)	{
				mysql_query("UPDATE military SET warriors = warriors + $ret[war3], wizards = wizards + $ret[wiz3], priests = priests + $ret[pri3], archers = archers + $ret[arch3], golem = golem + $ret[golem3], irongolem = irongolem + $ret[irongolem3] WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET fleets = fleets + 1 WHERE userid='$INC_ID'");
			}
			if($ret[time4] == 1)	{
				mysql_query("UPDATE military SET warriors = warriors + $ret[war4], wizards = wizards + $ret[wiz4], priests = priests + $ret[pri4], archers = archers + $ret[arch4], golem = golem + $ret[golem4], irongolem = irongolem + $ret[irongolem4] WHERE userid='$INC_ID'");
				mysql_query("UPDATE user SET fleets = fleets + 1 WHERE userid='$INC_ID'");
			}
##################
### Research Updater
##################
	if($user['class'] == 'Savant')	{	$research_mod = 1.10;	}
	elseif($user['class'] == 'Warlock')	{	$research_mod = .75;	}
	else	{	$research_mod = 1;	}

	mysql_query("UPDATE research SET r1pts = r1pts + (r1 * $research_mod), r2pts = r2pts + (r2 * $research_mod), r3pts = r3pts + (r3 * $research_mod), r4pts = r4pts + (r4 * $research_mod), r5pts = r5pts + (r5 * $research_mod), r6pts = r6pts + (r6 * $research_mod), r7pts = r7pts + (r7 * $research_mod), r8pts = r8pts + (r8 * $research_mod), r9pts = r9pts + (r9 * $research_mod), r10pts = r10pts + (r10 * $research_mod), r11pts = r11pts + (r11 * $research_mod), r12pts = r12pts + (r12 * $research_mod), r13pts = r13pts + (r13 * $research_mod), r14pts = r14pts + (r14 * $research_mod), r15pts= r15pts + (r15 * $research_mod), r16pts= r16pts + (r16 * $research_mod), r17pts= r17pts + (r17 * $research_mod), r18pts= r18pts + (r18 * $research_mod) WHERE userid='$INC_ID'");
##################
### Activation System (ASS)
##################
	mysql_query("UPDATE emailvalidate SET clock= clock - 1 WHERE clock > 0 AND userid ='$INC_ID'");

	if($validate[clock] == 1 AND $validate[check] == 1)	 {
		mysql_query("INSERT INTO setnews (date, news, setid) 	VALUES	('$clock', '<font class=red>$user[ename] has been deleted for inactivity.</font>', '$user[setid]') ");

		$email = $user[email];
		$subject = "Your Medieval Battles Account Deleted";
		$body = "
Since you did not activate your account within one day upon signing up, your account was deleted. You are welcome to create another account though. Just go to:
www.medievalbattles.com/index?signup=yes. If you have any questions reguarding this, just email us at: support@medievalbattles.com

This email is automated. Your reply will not be recieved.";
		$from = "From: account_deleted@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$email", "$subject", "$body", "$from");

		mysql_query("DELETE FROM user WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM military WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM buildings WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM research WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM returntbl WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM explore WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM emailvalidate WHERE userid='$INC_ID'");
		mysql_query("UPDATE user SET votefor='None' WHERE votefor='$user[ename]'");
	}
##################
### Automatic Inactive Deletion System (AIDS)
##################
	mysql_query("UPDATE user SET countdown= countdown - 1 WHERE userid ='$INC_ID'");

	if($user[countdown] == 1)	 {
		mysql_query("INSERT INTO setnews (date, news, setid) 	VALUES	('$clock', '<font class=red>$user[ename] has been deleted for inactivity.</font>', '$user[setid]') ");

		$email = $user[email];
		$subject = "Your Medieval Battles Account Deleted";
		$body = "
Since you have not logged into your account after one week upon signing up, your account was deleted. You are welcome to create another account though. Just go to:
www.medievalbattles.com/index?signup=yes. If you have any questions reguarding this, just email us at: support@medievalbattles.com

This email is automated. Your reply will not be recieved.";
		$from = "From: account_deleted@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$email", "$subject", "$body", "$from");

		mysql_query("DELETE FROM user WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM military WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM buildings WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM research WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM returntbl WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM explore WHERE email='$user[email]' AND pw='$user[pw]'");
		mysql_query("DELETE FROM emailvalidate WHERE userid='$INC_ID'");
		mysql_query("UPDATE user SET votefor='None' WHERE votefor='$user[ename]'");
	}
##################
### Land & Mountain Recalculator (LMRC)
##################
	$built_land_rc = $build['home'] + $build['barrack'] + $build['farm'] + $build['wp'] + $build['lmill'];
	$built_mtn_rc = $build['gm'] + $build['im'];

	$constructing_land_rc = $build['dhome'] + $build['dbarrack'] + $build['dfarm'] + $build['dwp'] + $build['dlmill'];
	$constructing_mtn_rc = $build['dgm'] + $build['dim'];

	$land_rc = $built_land_rc + $constructing_land_rc + $build['aland'];
	$mtn_rc = $built_mtn_rc + $constructing_mtn_rc + $build['amts'];

	mysql_query("UPDATE user SET land='$land_rc' WHERE userid='$INC_ID'");
	mysql_query("UPDATE user SET mts='$mtn_rc' WHERE userid='$INC_ID'");
##################
### Experience Recalculator (XPRC)
##################
	//	calculate all units
	$warrior_exp = (($mil[warriors] + $ret[war1] + $ret[war2] + $ret[war3] + $ret[war4]) * 23);
	$wizard_exp = (($mil[wizards] + $ret[wiz1] + $ret[wiz2] + $ret[wiz3] + $ret[wiz4]) * 20);
	$priest_exp = (($mil[priests] + $ret[pri1] + $ret[pri2] + $ret[pri3] + $ret[pri4]) * 22);
	$archer_exp = (($mil[archers] + $ret[arch1] + $ret[arch2] + $ret[arch3] + $ret[arch4]) * 26);
	$scientist_exp = (($mil[scientists] + $res[r1] + $res[r2] + $res[r3] + $res[r4] + $res[r5] + $res[r6] + $res[r7] + $res[r8] + $res[r9] + $res[r10] + $res[r11] + $res[r12] + $res[r13] + $res[r14]) * 10);
	$explorer_exp = (($mil[explorers] + $explore[expland] + $explore[expmt]) * 10);
	$thief_exp = $mil[thieves] * 10;
	$land_exp = $user[land] * 8;
	$mountain_exp = $user[mts] * 5;
	$suicide_exp = $mil[suicide] * 28;
	$catapult_exp = $mil[catapult] * 33;
	$recruits_exp = $mil[recruits] * 5;
	$golem_exp = $mil[golem] * 30;
	$irongolem_exp = $mil[irongolem] * 35;

	$xprc_units = $warrior_exp + $wizard_exp + $priest_exp + $archer_exp + $thief_exp + $explorer_exp + $dog_exp + $scientist_exp + $land_exp + $mountain_exp + $suicide_exp + $catapult_exp + $recruits_exp + $golem_exp + $irongolem_exp;

	//	calculate all weapons
	if($mil[warriorwep] == 0)	{	$warrior_weapon = 0;	}	// dagger
	if($mil[warriorwep] == 1)	{	$warrior_weapon = 5000;	}	// short sword
	if($mil[warriorwep] == 2)	{	$warrior_weapon = 13000;	}	//	long sword
	if($mil[warriorwep] == 3)	{	$warrior_weapon = 29000;	}	//	bastard sword
	if($mil[warriorwep] == 4)	{	$warrior_weapon = 53000;	}	//	scourge
	if($mil[warriorwep] == 5)	{	$warrior_weapon = 100000;	}	//	scimitar
	if($mil[warriorwep] == 6)	{	$warrior_weapon = 168000;	}	//	roms fury
	if($mil[warriorwep] == 7)	{	$warrior_weapon = 257000;	}	//	toledos broad sword
	if($mil[warriorwep] == 8)	{	$warrior_weapon = 362000;	}	//	sword of gandalara

	if($mil[priestwep] == 0)	{	$priest_weapon = 0;	}	// quarterstaff
	if($mil[priestwep] == 1)	{	$priest_weapon = 5000;	}	// mace
	if($mil[priestwep] == 2)	{	$priest_weapon = 15000;	}	//	flail
	if($mil[priestwep] == 3)	{	$priest_weapon = 35000;	}	//	sword of zakarum
	if($mil[priestwep] == 4)	{	$priest_weapon = 70000;	}	//	footman flail
	if($mil[priestwep] == 5)	{	$priest_weapon = 120000;	}	//	morning star
	if($mil[priestwep] == 6)	{	$priest_weapon = 190000;	}	//	thyoras tear
	if($mil[priestwep] == 7)	{	$priest_weapon = 275000;	}	//	flail of isidole
	if($mil[priestwep] == 8)	{	$priest_weapon = 375000;	}	//	eldamars star

	if($mil[archerwep] == 0)	{	$archer_weapon = 0;	}	// bow
	if($mil[archerwep] == 1)	{	$archer_weapon = 5000;	}	// short bow
	if($mil[archerwep] == 2)	{	$archer_weapon = 20000;	}	//	ferric bow
	if($mil[archerwep] == 3)	{	$archer_weapon = 50000;	}	//	keldars arms
	if($mil[archerwep] == 4)	{	$archer_weapon = 90000;	}	//	splens sight
	if($mil[archerwep] == 5)	{	$archer_weapon = 150000;	}	//	bow of tion
	if($mil[archerwep] == 6)	{	$archer_weapon = 225000;	}	//	the dynefian
	if($mil[archerwep] == 7)	{	$archer_weapon = 315000;	}	//	heartsong
	if($mil[archerwep] == 8)	{	$archer_weapon = 415000;	}	//	shyrscreams bow

	//	calculate all armors
	if($mil[warriorarm] == 0)	{	$warrior_armor = 0;	}	// studded leather
	if($mil[warriorarm] == 1)	{	$warrior_armor = 10000;	}	// chain shirt
	if($mil[warriorarm] == 2)	{	$warrior_armor = 30000;	}	//	chain mail
	if($mil[warriorarm] == 3)	{	$warrior_armor = 70000;	}	//	breast plate
	if($mil[warriorarm] == 4)	{	$warrior_armor = 130000;	}	//	medieval armor

	if($mil[wizardarm] == 0)	{	$wizard_armor = 0;	}	//	robe
	if($mil[wizardarm] == 1)	{	$wizard_armor = 20000;	}	//	travellers robe
	if($mil[wizardarm] == 2)	{	$wizard_armor = 55000;	}	//	magicians robe
	if($mil[wizardarm] == 3)	{	$wizard_armor = 105000;	}	//	mythril armor

	if($mil[priestarm] == 0)	{	$priest_armor = 0;	}	//	leather
	if($mil[priestarm] == 1)	{	$priest_armor = 30000;	}	//	golden armor
	if($mil[priestarm] == 2)	{	$priest_armor = 90000;	}	//	blessed armor

	$xprc_equipment = $priest_armor + $wizard_armor + $warrior_armor + $archer_weapon + $priest_weapon + $warrior_weapon;
	$xprc = $xprc_units + $xprc_equipment;

	mysql_query("UPDATE user SET exp='$xprc' WHERE userid='$INC_ID'");


	$INC_ID = $INC_ID + 1;
}
##################
### Misc.
##################
	mysql_query("UPDATE user SET barterclock= barterclock - 1 WHERE barterclock > 0");
	mysql_query("UPDATE user SET online = 0");
	mysql_query("UPDATE user SET safemode = safemode - 1 WHERE safemode > 0");
##################
### Update Return Times
##################
	mysql_query("UPDATE returntbl SET war1 =0, wiz1=0, pri1=0, arch1=0, golem1=0, irongolem1=0 WHERE time1 = 1");
	mysql_query("UPDATE returntbl SET war2 =0, wiz2=0, pri2=0, arch2=0, golem2=0, irongolem2=0 WHERE time2 = 1");
	mysql_query("UPDATE returntbl SET war3 =0, wiz3=0, pri3=0, arch3=0, golem3=0, irongolem3=0 WHERE time3 = 1");
	mysql_query("UPDATE returntbl SET war4 =0, wiz4=0, pri4=0, arch4=0, golem4=0, irongolem4=0 WHERE time4 = 1");
	mysql_query("UPDATE returntbl SET time1 = time1 - 1 WHERE time1 > 0");
	mysql_query("UPDATE returntbl SET time2 = time2 - 1 WHERE time2 > 0");
	mysql_query("UPDATE returntbl SET time3 = time3 - 1 WHERE time3 > 0");
	mysql_query("UPDATE returntbl SET time4 = time4 - 1 WHERE time4 > 0");
##################
### Update Building Construction
##################
	mysql_query("UPDATE buildings SET home    = home      + round(dhome / Hhrs)    WHERE Hhrs > 0");
	mysql_query("UPDATE buildings SET barrack = barrack   + round(dbarrack / Bhrs) WHERE Bhrs > 0");
	mysql_query("UPDATE buildings SET farm    = farm      + round(dfarm / Fhrs)    WHERE Fhrs > 0");
	mysql_query("UPDATE buildings SET wp      = wp        + round(dwp / Whrs)      WHERE Whrs > 0");
	mysql_query("UPDATE buildings SET lmill   = lmill     + round(dlmill / Lhrs)   WHERE Lhrs > 0");
	mysql_query("UPDATE buildings SET gm      = gm        + round(dgm / Ghrs)      WHERE Ghrs > 0");
	mysql_query("UPDATE buildings SET im      = im        + round(dim / Ihrs)      WHERE Ihrs > 0");
	mysql_query("UPDATE buildings SET dhome    = dhome    - round(dhome / Hhrs)    WHERE Hhrs > 0");
	mysql_query("UPDATE buildings SET dbarrack = dbarrack - round(dbarrack / Bhrs) WHERE Bhrs > 0");
	mysql_query("UPDATE buildings SET dfarm    = dfarm    - round(dfarm / Fhrs)    WHERE Fhrs > 0");
	mysql_query("UPDATE buildings SET dwp      = dwp      - round(dwp / Whrs)      WHERE Whrs > 0");
	mysql_query("UPDATE buildings SET dlmill   = dlmill   - round(dlmill / Lhrs)   WHERE Lhrs > 0");
	mysql_query("UPDATE buildings SET dgm      = dgm      - round(dgm / Ghrs)      WHERE Ghrs > 0");
	mysql_query("UPDATE buildings SET dim      = dim      - round(dim / Ihrs)      WHERE Ihrs > 0");
	mysql_query("UPDATE buildings SET Hhrs = Hhrs - 1 WHERE Hhrs > 0");
	mysql_query("UPDATE buildings SET Bhrs = Bhrs - 1 WHERE Bhrs > 0");
	mysql_query("UPDATE buildings SET Fhrs = Fhrs - 1 WHERE Fhrs > 0");
	mysql_query("UPDATE buildings SET Whrs = Whrs - 1 WHERE Whrs > 0");
	mysql_query("UPDATE buildings SET Lhrs = Lhrs - 1 WHERE Lhrs > 0");
	mysql_query("UPDATE buildings SET Ghrs = Ghrs - 1 WHERE Ghrs > 0");
	mysql_query("UPDATE buildings SET Ihrs = Ihrs - 1 WHERE Ihrs > 0");
##################
### Update Weapon Construction
##################
// warrior weapons
	mysql_query("UPDATE military SET shortsword = shortsword - 1 WHERE 	shortsword > 1");
	mysql_query("UPDATE military SET longsword = longsword - 1 WHERE  longsword > 1");
	mysql_query("UPDATE military SET bastardsword = bastardsword - 1 WHERE bastardsword > 1");
	mysql_query("UPDATE military SET scourge = scourge - 1 WHERE  scourge > 1");
	mysql_query("UPDATE military SET scimitar = scimitar - 1 WHERE  scimitar > 1");
	mysql_query("UPDATE military SET romsfury = romsfury - 1 WHERE romsfury > 1");
	mysql_query("UPDATE military SET broadsword = broadsword - 1 WHERE broadsword > 1");
	mysql_query("UPDATE military SET gandalara = gandalara - 1 WHERE gandalara > 1");
// priest weapons
	mysql_query("UPDATE military SET mace = mace - 1 WHERE mace > 1");
	mysql_query("UPDATE military SET flail = flail - 1 WHERE flail > 1");
	mysql_query("UPDATE military SET zakarum = zakarum - 1 WHERE zakarum > 1");
	mysql_query("UPDATE military SET footmanflail = footmanflail - 1 WHERE footmanflail > 1");
	mysql_query("UPDATE military SET morningstar = morningstar - 1 WHERE morningstar > 1");
	mysql_query("UPDATE military SET thyorastear = thyorastear - 1 WHERE thyorastear > 1");
	mysql_query("UPDATE military SET isidole = isidole - 1 WHERE isidole> 1");
	mysql_query("UPDATE military SET eldamarstar = eldamarstar - 1 WHERE eldamarstar > 1");
// archer weapons
	mysql_query("UPDATE military SET shortbow = shortbow - 1 WHERE shortbow > 1");
	mysql_query("UPDATE military SET ferricbow = ferricbow - 1 WHERE ferricbow > 1");
	mysql_query("UPDATE military SET keldarsarms = keldarsarms - 1 WHERE keldarsarms > 1");
	mysql_query("UPDATE military SET splensight = splensight - 1 WHERE splensight > 1");
	mysql_query("UPDATE military SET bowoftion = bowoftion - 1 WHERE bowoftion > 1");
	mysql_query("UPDATE military SET dynefian = dynefian - 1 WHERE dynefian > 1");
	mysql_query("UPDATE military SET heartsong = heartsong - 1 WHERE heartsong > 1");
	mysql_query("UPDATE military SET shyrscreamsbow = shyrscreamsbow - 1 WHERE shyrscreamsbow > 1");
##################
### Update Armor Construction
##################
	mysql_query("UPDATE military SET cs = cs - 1 WHERE cs > 1");
	mysql_query("UPDATE military SET cm = cm - 1 WHERE cm > 1");
	mysql_query("UPDATE military SET bp = bp - 1 WHERE bp > 1");
	mysql_query("UPDATE military SET fp = fp - 1 WHERE fp > 1");
	mysql_query("UPDATE military SET ma = ma - 1 WHERE ma > 1");
	mysql_query("UPDATE military SET ga = ga - 1 WHERE ga > 1");
	mysql_query("UPDATE military SET ba = ba - 1 WHERE ba > 1");
	mysql_query("UPDATE military SET tr = tr - 1 WHERE tr > 1");
	mysql_query("UPDATE military SET mr = mr - 1 WHERE mr > 1");
##################
### Create Units
##################
	mysql_query("UPDATE military SET thieves = thieves + dbthief, explorers = explorers + dbexplorer, sages = sages + dbsage, dbthief = 0, dbexplorer = 0, dbsage = 0, warriors = warriors + dbwar, wizards = wizards + dbwiz, priests = priests + dbpri, archers = archers + dbarch, dbwar = 0, dbwiz = 0, dbarch = 0, dbwar = dbwar2, dbwiz = dbwiz2, dbpri = dbpri2, dbarch = dbarch2, dbwar2 = 0, dbwiz2 = 0, dbpri2 = 0, dbarch2 = 0, catapult = catapult + dbcatapult, dbcatapult = dbcatapult2, dbcatapult2 = dbcatapult3, dbcatapult3 = 0, suicide = suicide + dbsuicide, dbsuicide = dbsuicide2, dbsuicide2 = dbsuicide3, dbsuicide3 = 0");
	mysql_query("UPDATE military SET golem = golem + dbgolem, irongolem = irongolem + dbirongolem, dbgolem = 0, dbirongolem = 0");
##################
### Update Research
##################
	mysql_query("UPDATE research SET r1pts = 50000 WHERE r1pts > 50000");	// fireball
	mysql_query("UPDATE research SET r2pts = 100000 WHERE r2pts > 100000");	// ice storm
	mysql_query("UPDATE research SET r3pts = 200000 WHERE r3pts > 200000");	// wall of fire
	mysql_query("UPDATE research SET r4pts = 300000 WHERE r4pts > 300000");	// wall of ice
	mysql_query("UPDATE research SET r5pts = 400000 WHERE r5pts > 400000");	// chain lightning
	mysql_query("UPDATE research SET r6pts = 500000 WHERE r6pts > 500000");	// gust of wind
	mysql_query("UPDATE research SET r7pts = 600000 WHERE r7pts > 600000");	// flaming sphere
	mysql_query("UPDATE research SET r8pts = 700000 WHERE r8pts > 700000");	// cloud kill
	mysql_query("UPDATE research SET r9pts = 800000 WHERE r9pts > 800000");	// lighting bolt
	mysql_query("UPDATE research SET r10pts = 900000 WHERE r10pts > 900000");	// meteor swarm
	mysql_query("UPDATE research SET r11pts = 100000 WHERE r11pts > 100000");	// adv gold mining
	mysql_query("UPDATE research SET r12pts = 100000 WHERE r12pts > 100000");	// adv iron mining
	mysql_query("UPDATE research SET r13pts = 125000 WHERE r13pts > 125000");	// archery
	mysql_query("UPDATE research SET r14pts = 125000 WHERE r14pts > 125000");	// pyrotechnics
	mysql_query("UPDATE research SET r15pts = 100000 WHERE r15pts > 100000");	// adv farming
	mysql_query("UPDATE research SET r16pts = 100000 WHERE r16pts > 100000");	// adv construction
##################
### Update Messages
##################
	mysql_query("UPDATE messages SET age = age + 1");
	mysql_query("UPDATE setnews SET age = age + 1");
	mysql_query("UPDATE guildnews SET age = age + 1");
	mysql_query("DELETE FROM messages WHERE age='192'");
	mysql_query("DELETE FROM setnews WHERE age='192'");
	mysql_query("DELETE FROM guildnews WHERE age='192'");

	mysql_query("UPDATE user SET exp = 1000 WHERE exp < 1000");
	mysql_query("UPDATE game_info SET tick = 'no'");

	While($SET_INC < 31)	{
		$SET_STRENGTH = mysql_db_query($dbnam, "SELECT sum(exp) FROM user WHERE setid = '$SET_INC'");
			$S_STRENGTH = mysql_result($SET_STRENGTH,"S_STRENGTH");
		mysql_query("UPDATE settlement SET setstrength = '$S_STRENGTH' WHERE setid='$SET_INC'");
		$SET_INC = $SET_INC + 1;
	}

	$MAX_GUILDID = mysql_db_query($dbnam, "SELECT max(gid) FROM guild");
		$MAX_GID = mysql_result($MAX_GUILDID,"MAX_GID");

	While($GUILD_INC < $MAX_GID + 1)	{
		$guild_name_query = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE gid='$GUILD_INC'");
			$guild_name = mysql_fetch_array($guild_name_query);
		$guild_user_exp = mysql_db_query($dbnam, "SELECT sum(exp) FROM user WHERE guild='$guild_name[gname]'");
			$user_exp = mysql_result($guild_user_exp, "user_exp");
		mysql_query("UPDATE guild SET strength='$user_exp' WHERE gid='$GUILD_INC'");

		$GUILD_INC = $GUILD_INC + 1;
	}

echo "Sending email to Mako informing him of the tick.<BR>";

$message = "Tick successfully completed [" . date('r') . "]";
$subject = "Tick completed";
$email = "mako@medievalbattles.com";

mail("$email", "$subject", $message,
"From: MB_Tick\r\n"
."Reply-To: no_reply@medievalbattles.com\r\n"
."X-Mailer: PHP/" . phpversion());

echo "Email sent.<BR>";
?>
