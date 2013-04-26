<?php

include("include/connect.php");
// check and make sure email exists
$EMAIL_RESULT = mysql_db_query($dbnam, "SELECT email FROM user WHERE email='$email' AND pw='$pw'");
$E_Check = mysql_fetch_array($EMAIL_RESULT);

if($login == 1 AND $pw != "" AND $email !="")	 {

	$uuserid = mysql_db_query($dbnam, "SELECT userid FROM user WHERE email = '$email' AND pw = '$pw'");
	$userid = mysql_result($uuserid,"userid");	
	
// select all armors
$armor_query = "SELECT * FROM military WHERE email='$email' AND pw='$pw'";
$armor_result = mysql_db_query($dbnam, $armor_query);
$armor = mysql_fetch_array($armor_result);

// select warrior weapons	
$war_weapon_query = "SELECT * FROM military WHERE email='$email' AND pw='$pw'";
$war_weapon_result = mysql_db_query($dbnam, $war_weapon_query);
$warweapon = mysql_fetch_array($war_weapon_result);

// select priest weapons	
$pri_weapon_query = "SELECT * FROM military WHERE email='$email' AND pw='$pw'";
$pri_weapon_result = mysql_db_query($dbnam, $pri_weapon_query);
$priweapon = mysql_fetch_array($pri_weapon_result);

// select archer weapons	
$arch_weapon_query = "SELECT * FROM military WHERE email='$email' AND pw='$pw'";
$arch_weapon_result = mysql_db_query($dbnam, $arch_weapon_query);
$archweapon = mysql_fetch_array($arch_weapon_result);

// select research items	
$research_query = "SELECT * FROM research WHERE email='$email' AND pw= '$pw'";
$res_query = mysql_db_query($dbnam, $research_query) or die("Error: " . mysql_error());
$res = mysql_fetch_array($res_query);

// select user items
$user_query = "SELECT * FROM user WHERE email='$email' AND pw= '$pw'";
$user_query = mysql_db_query($dbnam, $user_query) or die("Error: " . mysql_error());
$user = mysql_fetch_array($user_query);

	$setid = $user['setid'];
	$gp = $user['gp'];
	$ename = $user['ename'];
	$mts =  $user['mts'];
	$land =  $user['land'];
	$exp = $user['exp'];
	$iron = $user['iron'];
	$food = $user['food'];
	$class = $user['class'];
	$vote = $user['vote'];
	$votefor = $user['votefor'];
	$sl = $user['sl'];
	$exp2 = $user['exp2'];
	$fleets = $user['fleets'];
	$aim = $user['aim'];
	$mno = $user['mno'];
	$nno = $user['nno'];
	$lumber = $user['lumber'];
	$csnum = $user['csnum'];
	$safemode = $user['safemode'];
	$race = $user['race'];
	$empireguild = $user['guild'];

// select buildings items
$buildings_query = "SELECT * FROM buildings WHERE email='$email' AND pw= '$pw'";
$buildings_query = mysql_db_query($dbnam, $buildings_query) or die("Error: " . mysql_error());
$buildings = mysql_fetch_array($buildings_query);

	$home = $buildings['home'];
	$kennel = $buildings['kennel'];
	$barrack = $buildings['barrack'];
	$farm = $buildings['farm'];	 
	$wp = $buildings['wp'];
	$lmill = $buildings['lmill'];
	$gm = $buildings['gm'];
	$im = $buildings['im'];
	$aland = $buildings['aland'];
	$amts = $buildings['amts'];

	$dhome = $buildings['dhome'];
	$dkennel = $buildings['dkennel'];
	$dbarrack = $buildings['dbarrack'];
	$dfarm = $buildings['dfarm'];
	$dwp = $buildings['dwp'];
	$dlmill = $buildings['dlmill'];
	$dgm = $buildings['dgm'];
	$dim = $buildings['dim'];

	$Hhrs = $buildings['Hhrs'];
	$Khrs = $buildings['Khrs'];
	$Bhrs = $buildings['Bhrs'];
	$Fhrs = $buildings['Fhrs'];
	$Whrs = $buildings['Whrs'];
	$Lhrs = $buildings['Lhrs'];
	$Ghrs = $buildings['Ghrs'];
	$Ihrs = $buildings['Ihrs'];

// select military items
$military_query = "SELECT * FROM military WHERE email='$email' AND pw= '$pw'";
$military_query = mysql_db_query($dbnam, $military_query) or die("Error: " . mysql_error());
$military = mysql_fetch_array($military_query);

	## class info?
		$mclass1 = mysql_db_query($dbnam, "SELECT class1 FROM military WHERE email = '$email' AND pw = '$pw'");
		$mclass2 = mysql_db_query($dbnam, "SELECT class2 FROM military WHERE email = '$email' AND pw = '$pw'");
		$mclass3 = mysql_db_query($dbnam, "SELECT class3 FROM military WHERE email = '$email' AND pw = '$pw'");
	## current unit x
		$civ = $military['civ'];
		$recruits = $military['recruits'];
		$puppies = $military['puppies'];
		$wizards = $military['wizards'];
		$warriors = $military['warriors'];
		$priests = $military['priests'];
		$archers = $military['archers'];
		$scientists = $military['scientists'];
		$thieves = $military['thieves'];
		$explorers = $military['explorers'];
		$dogs = $military['dogs'];
		$maxciv = $military['maxciv'];
	## equipped weapon, spell, bow and armor
		$cweapon = $military['cweapon'];
		$cspell = $military['cspell'];
		$cbow = $military['cbow'];
		$cstaff = $military['cstaff'];
	## warrior info
		$warspeedw = $military['warspeedw'];	
		$warspeeda = $military['warspeeda'];	
		$warpower = $military['warpower'];		
		$wararmor = $military['wararmor'];	
		$wardef = $military['wardef'];
		$twarriors = $warriors + $war1 + $war2 + $war3 + $war4;
	## wizard info
		$wizspeeds = $military['wizspeeds'];		
		$wizspeeda = $military['wizspeeda'];		
		$wizpower = $military['wizpower'];		
		$wizarmor = $military['wizarmor'];	
		$wizdef = $military['wizdef'];
		$twizards = $wizards + $wiz1 + $wiz2 + $wiz3 + $wiz4;
	## priest info
		$prispeedw = $military['prispeedw'];		
		$prispeeda = $military['prispeeda'];		
		$pripower = $military['pripower'];			
		$priarmor = $military['priarmor'];	
		$pridef = $military['pridef'];
		$tpriests = $priests + $pri1 + $pri2 + $pri3 + $pri4;
	## archer info
		$archspeedw = $military['archspeedw'];	
		$archspeeda = $military['archspeeda'];	
		$archpower = $military['archpower'];		
		$archarmor = $military['archarmor'];
		$archdef = $military['archdef'];
		$tarchers = $archers + $arch1 + $arch2 + $arch3 + $arch4;
	## units in creation	
		$dbwar = $military['dbwar'];	$dbwar2 = $military['dbwar2'];
		$dbwiz = $military['dbwiz'];		$dbwiz2 = $military['dbwiz2'];
		$dbpri = $military['dbpri'];		$dbpri2 = $military['dbpri2'];
		$dbarch = $military['dbarch'];	$dbarch2 = $military['dbarch2'];
		$dbexplorer = $military['dbexplorer'];
		$dbscientist = $military['dbscientist'];
		$dbthief = $military['dbthief'];
		$dbdog = $military['dbdog'];

//	select explore items
$explore_query = "SELECT * FROM explore WHERE email='$email' AND pw= '$pw'";
$explore_query = mysql_db_query($dbnam, $explore_query) or die("Error: " . mysql_error());
$explore = mysql_fetch_array($explore_query);

	$expland = $explore['expland'];
	$expmt = $explore['expmt'];
	$landhrs = $explore['landhrs'];
	$mthrs = $explore['mthrs'];

//	select data from return table
$return_query = "SELECT * FROM returntbl WHERE email='$email' AND pw= '$pw'";
$return_query = mysql_db_query($dbnam, $return_query) or die("Error: " . mysql_error());
$return = mysql_fetch_array($return_query);
	## party 1	
		$war1 = $return['war1'];		$WAR_1 = $return['war1'];
		$wiz1 = $return['wiz1'];			$WIZ_1 = $return['wiz1'];
		$pri1 = $return['pri1'];			$PRI_1 = $return['pri1'];
		$arch1 = $return['arch1'];		$ARCH_1 = $return['arch1'];
		$dog1 = $return['dog1'];		$DOG_1 = $return['dog1'];
		$time1 = $return['time1'];		$TIME_1 = $return['time1'];
	## party 2	
		$war2 = $return['war2'];		$WAR_2 = $return['war2'];
		$wiz2 = $return['wiz2'];			$WIZ_2 = $return['wiz2'];
		$pri2 = $return['pri2'];			$PRI_2 = $return['pri2'];
		$arch2 = $return['arch2'];		$ARCH_2 = $return['arch2'];
		$dog2 = $return['dog2'];		$DOG_2 = $return['dog2'];
		$time2 = $return['time2'];		$TIME_2 = $return['time2'];
	## party 3
		$war3 = $return['war3'];	 	$WAR_3 = $return['war3'];
		$wiz3 = $return['wiz3'];			$WIZ_3 = $return['wiz3'];
		$pri3 = $return['pri3'];			$PRI_3 = $return['pri3'];
		$arch3 = $return['arch3'];		$ARCH_3 = $return['arch3'];
		$dog3 = $return['dog3'];		$DOG_3 = $return['dog3'];
		$time3 = $return['time3'];		$TIME_3 = $return['time3'];
	## party 4
		$war4 = $return['war4'];		$WAR_4 = $return['war4'];
		$wiz4 = $return['wiz4'];			$WIZ_4 = $return['wiz4'];
		$pri4 = $return['pri4'];			$PRI_4 = $return['pri4'];
		$arch4 = $return['arch4'];		$ARCH_4 = $return['arch4'];
		$dog4 = $return['dog4'];		$DOG_4 = $return['dog4'];
		$time4 = $return['time4'];		$TIME_4 = $return['time4'];
	## dogs
		$return_dogs = $return['dogs'];
		$dog_time = $return['dogtime'];
	## fleets					
		$FLEETS_ = mysql_db_query($dbnam, "SELECT fleets FROM user WHERE userid='$userid'");
		$_FLEETS = mysql_result($FLEETS_,"_FLEETS");	
//	total all units together
	$warquery = "SELECT sum(amount) FROM barter WHERE seller='$ename' AND type='Warrior'";
	$warresult = mysql_db_query($dbnam, $warquery) or die("Error: " . mysql_error());
	$warcheck = mysql_fetch_array($warresult);

	$wizquery = "SELECT sum(amount) FROM barter WHERE seller='$ename' AND type='Wizard'";
	$wizresult = mysql_db_query($dbnam, $wizquery) or die("Error: " . mysql_error());
	$wizcheck = mysql_fetch_array($wizresult);

	$priquery = "SELECT sum(amount) FROM barter WHERE seller='$ename' AND type='Priest'";
	$priresult = mysql_db_query($dbnam, $priquery) or die("Error: " . mysql_error());
	$pricheck = mysql_fetch_array($priresult);

	$archquery = "SELECT sum(amount) FROM barter WHERE seller='$ename' AND type='Archer'";
	$archresult = mysql_db_query($dbnam, $archquery) or die("Error: " . mysql_error());
	$archcheck = mysql_fetch_array($archresult);

	$ascientists = $scientists;
	$aexplorers = $explorers;
	$tscientists = $scientists + $res['r1'] + $res['r2'] + $res['r3'] + $res['r4'] + $res['r5'] + $res['r6'] + $res['r7'] + $res['r8'] + $res['r9'] + $res['r10'] + $res['r11'] + $res['r12'] + $res['r13'];
	$texplorers = $explorers + $expland + $expmt;
    $warriorc = (($warriors + $dbwar + $dbwar2 + $WAR_1 + $WAR_2 + $WAR_3 + $WAR_4 + $warcheck[0]) * .8) + 500;
	$wizardc = (($wizards + $dbwiz + $dbwiz2 + $WIZ_1 + $WIZ_2 + $WIZ_3 + $WIZ_4 + $wizcheck[0]) * .7) + 400;
	$priestc = (($priests + $dbpri + $dbpri2 + $PRI_1 + $PRI_2 + $PRI_3 + $PRI_4 + $pricheck[0]) *  .65) + 100;
	$archerc = (($archers + $dbarch + $dbarch2 + $ARCH_1 + $ARCH_2 + $ARCH_3 + $ARCH_4 + $archcheck[0]) * .75) + 450;
	$explorec = (($texplorers + $aexplorers + $dbexplorer) * .875) + 1000;
	
	$wizardc = round($wizardc);
	$warriorc = round($warriorc);
	$priestc = round($priestc);
	$archerc = round($archerc);
	$explorec = round($explorec);
	
//	cost for buildings ( b_cost=land & bm_cost=mountains )
		$bm_cost =  300 + (20 * (($gm + $im + $dim + $dgm) * .2));	
 	 	$b_cost =  300 + (20  * (($home + $kennel + $barrack + $farm + $lmill + $wp + $dhome + $dkennel + $dbarrack + $dfarm + $dwp + $dlmill) * .2));

//	buttons for construct armor page
$acsbutton = " <form type=get action=aconstruct.php><input class=button type=submit name=update2 value=Construct><input type=hidden name=update2 value=2></form>";
$acmbutton = " <form type=get action=aconstruct.php><input class=button type=submit name=update3 value=Construct><input type=hidden name=update3 value=3></form>";
$abpbutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update4 value=Construct><input type=hidden name=update4 value=4></form>";
$ahpbutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update5 value=Construct><input type=hidden name=update5 value=5></form>";
$afpbutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update6 value=Construct><input type=hidden name=update6 value=6></form>";
$amabutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update7 value=Construct><input type=hidden name=update7 value=7></form>";
$agabutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update8 value=Construct><input type=hidden name=update8 value=8></form>";
$ababutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update9 value=Construct><input type=hidden name=update9 value=9></form>";
$atrbutton = "<form type=get action=aconstruct.php><input class=button type=submit name=update10 value=Construct><input type=hidden name=update10 value=10></form>";
$amrbutton = "<form type=get action=aconstruct.php><input class=button type=submit name=updaet11 value=Construct><input type=hidden name=update11 value=11></form>";

// empire defense modifiers
	if($class== Fighter)	{	$empmodifier = 1.05;	}
	if($class == Cleric)	{	$empmodifier = 1.00;	}
	if($class == Ranger)	{	$empmodifier = 1.00;	}
	if($class == Mage)	{	$empmodifier = .95;		}
	if($race == Giant)		{	$empmodifier = $empmodifier + .25;	 }
	if($race == Orc)	{	$empmodifier = $empmodifier - .15;	}

// defense calculation
	$tdefense = (($warriors * $warpower) + ($wizards * $wizpower) + ($priests * $pripower) + ($archers * $archpower) + ($wp * 15)) * $empmodifier;
	$tdefense = round ($tdefense);

// gold production for fighters
	if($class == "Fighter")	{
		$goldpro1 = $gm * 300; 
		$goldpro = $goldpro1 * .95;
	}
		elseif($res['r11pts'] >= 100000)	{
			$goldpro1 = $gm * 300; 
			$goldpro = $goldpro1 * 1.05;
		}
		elseif($class == Dwarf)	{
			$goldpro1 = $gm * 300; 
			$goldpro = $goldpro1 * 1.2;
				if($res['r11pts'] >= 100000)	 {
					$goldpro1 = $gm * 300; 
					$goldpro = $goldpro1 * 1.3;
				}
		}

// gold production for mages
	if($class == "Mage")	{
		$goldpro1 = $gm * 300; 
		$goldpro = $goldpro1 * 1.1;
	}
		elseif($res['r11pts'] >= 100000)	{
			$goldpro1 = $gm * 300; 
			$goldpro = $goldpro1 * 1.2;
		}

// gold production for clerics		
	if($class == "Cleric")	{
		$goldpro = $gm * 300;
	}
		elseif($res['r11pts'] >= 100000)	{
			$goldpro1 = $gm * 300; 
			$goldpro = $goldpro1 * 1.1;
		} 
// gold production for rangers			
	if($class == "Ranger")	{
		$goldpro = $gm * 300;
	}
		elseif($res['r11pts'] >= 100000)	{
			$goldpro1 = $gm * 300; 
			$goldpro = $goldpro1 * 1.1;
		} 
//hourly production
	$imhourly = $im * 1.945;

	if($res['r12pts'] >= 100000)	 {
		$imhourly = $im * 2.045;
	}
	if($race == Dwarf)	{
		$imhourly = $im * 2.095;
			if($res['r12pts'] >= 100000)	{
				$imhourly = $im * 2.195;
			}
	}

	$imhourly = round($imhourly);
	$gmhourly = $goldpro;
	$woodhourly = $lmill * 2;
	$foodhourly = $farm * .5;
	$civhourly = $home * .265;

	if($class == Ranger)	{	$woodhourly = $lmill * 2.1;	 }	// wood production for rangers
	if($race == Elf)	{	$civhourly == $home * .165;	}	// civilian production for elves
	if($race == Orc)	{	$civhourly == $home * .465;	}	// civilian production for orcs
	if($race == Giant)	 {	$foodhourly = $farm * .6;	}	// food production for giants

	$rechourly = $civ * .007;
	$rechourly = round($rechourly);
//	max guild id
	$maxgid = mysql_db_query($dbnam, "SELECT max(gid) FROM guild");
	$mgid = mysql_result($maxgid,"mgid");
//	some military values
	$twarriors = $warriors + $war1 + $war2 + $war3 + $war4;
	$twizards = $wizards + $wiz1 + $wiz2 + $wiz3 + $wiz4;
	$tpriests = $priests + $pri1 + $pri2 + $pri3 + $pri4;
	$tarchers = $archers + $arch1 + $arch2 + $arch3 + $arch4;
//	exp values for attack equations
	$archexpa = 26;
	$warexpa = 23;
	$wizexpa = 20;
	$priexpa = 22;
	$landexpa = 8;
	$mtexpa = 5;
//	exp values for regular equations
	$archexp = 26;
	$warexp = 23;
	$wizexp = 20;
	$priexp = 22;
	$landexp = 8;
	$mtexp = 5;

	if($class == "Cleric")	{
		$archexp = 1.05;
		$warexp =  1.05;
		$wizexp =  1.05;
		$priexp =  1.05;
		$landexp = 1.05;
		$mtexp =  1.05;
	}
//	rounded down values
	$foodhourly = floor($foodhourly);
	$civhourly = floor($civhourly);
	$priestc = floor($priestc);
	$wizardc = floor($wizardc);
	$warriorc = floor($warriorc);
	$archerc = floor($archerc);

	while($max_land < $aland AND $lcost < $gp)	 {
		$max_land = $max_land + 1;
		$lcost = $max_land * $b_cost;
	}
		
	while($max_mt < $amts AND $gp > $tmcost)	 {
		$max_mt = $max_mt + 1;
		$tmcost = $max_mt * $bm_cost;
	}
		
	if($lcost > $gp)	{	$max_land = $max_land -1;	}
	if($tmcost > $gp)	 {	$max_mt = $max_mt - 1;	}
	if($aland == 0 OR $gp == 0 OR $bcost > $gp)	{	$max_land = 0 ;	}
	if($amts == 0 OR $gp == 0 OR $bmcost > $gp)	{	$max_mt = 0;	}

// format numbers
	## hourly values
		$foodhourly = number_format($foodhourly);	
		$civhourly = number_format($civhourly);
		$rechourly = number_format($rechourly);		
		$imhourly = number_format($imhourly);
		$gmhourly = number_format($gmhourly);		
		$woodhourly = number_format($woodhourly);
	## military values
		// warriors
		$dbwar = number_format($dbwar);			
		$dbwar2 = number_format($dbwar2);
		$twarriors = number_format($twarriors);	
		$warriorc = number_format($warriorc);
		// wizards
		$dbwiz = number_format($dbwiz);			
		$dbwiz2 = number_format($dbwiz2);
		$twizards = number_format($twizards);	
		$wizardc = number_format($wizardc);
		// priests
		$dbpri = number_format($dbpri);			
		$dbpri2 = number_format($dbpri2);
		$tpriests = number_format($tpriests);		
		$priestc = number_format($priestc);
		// archers
		$dbarch = number_format($dbarch);		
		$dbarch2 = number_format($dbarch2);
		$tarchers = number_format($tarchers);	
		$archerc = number_format($archerc);
		// scientists
		$scientists = number_format($scientists);		
		$dbscientist = number_format($dbscientist);	
		$ascientists = number_format($ascientists);	
		// explorers
		$explorers = number_format($explorers);	
		$dbexplorer = number_format($dbexplorer);	
		$aexplorers = number_format($aexplorers);
		$explorec = number_format($explorec);
		// thieves
		$thieves = number_format($thieves);	
		$dbthief = number_format($dbthief);
		// dogs
		$dbdogs = number_format($dbdogs);	## dogs building
		$dogs = number_format($dogs);	## total dogs
		// maximum values
		$maxciv = number_format($maxciv);
		$maxtrain = number_format($maxtrain);
	## explore values
		$expland = number_format($expland);
		$expmt = number_format($expmt);
	## user values
		$civ = number_format($civ);
		$land = number_format($land);
		$mts = number_format($mts);
		$food = number_format($food);
		$exp = number_format($exp);
		$lumber = number_format($lumber);
		$gp = number_format($gp);
		$iron = number_format($iron);
		$tdefense = number_format($tdefense);
	## building values
		// homes
		$home = number_format($home);	
		$dhome = number_format($dhome);
		// kenels
		$kennel = number_format($kennel);	
		$dkennel = number_format($dkennel);
		// barracks
		$barrack = number_format($barrack);	
		$dbarrack = number_format($dbarrack);
		// farms
		$farm = number_format($farm);			
		$dfarm = number_format($dfarm);
		// wooden platforms
		$wp = number_format($wp);				
		$dwp = number_format($dwp);
		// lumber mills
		$lmill =  number_format($lmill);			
		$dlmill =  number_format($dlmill);
		// gold mines
		$gm = number_format($gm);				
		$dgm = number_format($dgm);
		// iron mines
		$im = number_format($im);				
		$dim = number_format($dim);
	
// set user to be online
	mysql_query("UPDATE user SET online='1' WHERE email='$email'");

}
else	{
      header("Location: logout.php?pageid=timeout");
}