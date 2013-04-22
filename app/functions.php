<?php

if($login == 1)
{
 
@mysql_connect (localhost);
mysql_select_db(mb) or die(darnit);

	if($login)
	
	$result10 = mysql($dbnam, "SELECT userid FROM user WHERE email = '$email' AND pw = '$pw'");
	$uuserid = mysql($dbnam, "SELECT userid FROM user WHERE email = '$email' AND pw = '$pw'");
	$userid = mysql_result($uuserid,"userid");	
	
	

//USER	
	$usetid = mysql($dbnam, "SELECT setid FROM user WHERE email = '$email' AND pw = '$pw'");
	$ugp = mysql($dbnam, "SELECT gp FROM user WHERE email = '$email' AND pw = '$pw'");
	$uename = mysql($dbnam, "SELECT ename FROM user WHERE email = '$email' AND pw = '$pw'");
	$umts = mysql($dbnam, "SELECT mts FROM user WHERE email = '$email' AND pw = '$pw'");
	$uland = mysql($dbnam, "SELECT land FROM user WHERE email = '$email' AND pw = '$pw'"); 
	$uexp = mysql($dbnam, "SELECT exp FROM user WHERE email = '$email' AND pw = '$pw'");
	$uiron = mysql($dbnam, "SELECT iron FROM user WHERE email = '$email' AND pw = '$pw'");
	$ufood = mysql($dbnam, "SELECT food FROM user WHERE email = '$email' AND pw = '$pw'"); 
	$uclass = mysql($dbnam, "SELECT class FROM user WHERE email = '$email' AND pw = '$pw'");
	$uvote = mysql($dbnam, "SELECT vote FROM user WHERE email = '$email' AND pw = '$pw'");
	$uvotefor = mysql($dbnam, "SELECT votefor FROM user WHERE email = '$email' AND pw = '$pw'");
	$thesl = mysql($dbnam, "SELECT sl FROM user WHERE email = '$email' AND pw = '$pw'");
	$uexp2 = mysql($dbnam, "SELECT exp2 FROM user WHERE email = '$email' AND pw = '$pw'");
	$ufleets = mysql($dbnam, "SELECT fleets FROM user WHERE email = '$email' AND pw = '$pw'");
	$uaim = mysql($dbnam, "SELECT aim FROM user WHERE email = '$email' AND pw = '$pw'");

//BUILDINGS
	$bhome = mysql($dbnam, "SELECT home FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bbarrack = mysql($dbnam, "SELECT barrack FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bfarm = mysql($dbnam, "SELECT farm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$blab = mysql($dbnam, "SELECT lab FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bgm = mysql($dbnam, "SELECT gm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bim = mysql($dbnam, "SELECT im FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$baland = mysql($dbnam, "SELECT aland FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bamts = mysql($dbnam, "SELECT amts FROM buildings WHERE email = '$email' AND pw = '$pw'");

	$bdhome = mysql($dbnam, "SELECT dhome FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdbarrack = mysql($dbnam, "SELECT dbarrack FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdfarm = mysql($dbnam, "SELECT dfarm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdlab = mysql($dbnam, "SELECT dlab FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdgm = mysql($dbnam, "SELECT dgm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdim = mysql($dbnam, "SELECT dim FROM buildings WHERE email = '$email' AND pw = '$pw'");
			
//MILITARY	
	$mclass1 = mysql($dbnam, "SELECT class1 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mclass2 = mysql($dbnam, "SELECT class2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mclass3 = mysql($dbnam, "SELECT class3 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mciv = mysql($dbnam, "SELECT civ FROM military WHERE email = '$email' AND pw = '$pw'");
	$mrecruits = mysql($dbnam, "SELECT recruits FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizards = mysql($dbnam, "SELECT wizards FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarriors = mysql($dbnam, "SELECT warriors FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpriests = mysql($dbnam, "SELECT priests FROM military WHERE email = '$email' AND pw = '$pw'");
	$mscientists = mysql($dbnam, "SELECT scientists FROM military WHERE email = '$email' AND pw = '$pw'");
	$mthieves = mysql($dbnam, "SELECT thieves FROM military WHERE email = '$email' AND pw = '$pw'");
	$mexplorers = mysql($dbnam, "SELECT explorers FROM military WHERE email = '$email' AND pw = '$pw'");
	$mmaxciv = mysql($dbnam, "SELECT maxciv FROM military WHERE email = '$email' AND pw = '$pw'");
	$mssword = mysql($dbnam, "SELECT ssword FROM military WHERE email = '$email' AND pw = '$pw'");
	$mlsword = mysql($dbnam, "SELECT lsword FROM military WHERE email = '$email' AND pw = '$pw'");
	$maxe = mysql($dbnam, "SELECT axe FROM military WHERE email = '$email' AND pw = '$pw'");
	$mgaxe = mysql($dbnam, "SELECT gaxe FROM military WHERE email = '$email' AND pw = '$pw'");
	$mclub = mysql($dbnam, "SELECT club FROM military WHERE email = '$email' AND pw = '$pw'");
	$mcweapon = mysql($dbnam, "SELECT cweapon FROM military WHERE email = '$email' AND pw = '$pw'");
	$mcspell = mysql($dbnam, "SELECT cspell FROM military WHERE email = '$email' AND pw = '$pw'");
	$mcstaff = mysql($dbnam, "SELECT cstaff FROM military WHERE email = '$email' AND pw = '$pw'");
	$micesword = mysql($dbnam, "SELECT icesword FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwararmor = mysql($dbnam, "SELECT wararmor FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizarmor = mysql($dbnam, "SELECT wizarmor FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpriarmor = mysql($dbnam, "SELECT priarmor FROM military WHERE email = '$email' AND pw = '$pw'");

	
	$mcs = mysql($dbnam, "SELECT cs FROM military WHERE email = '$email' AND pw = '$pw'");
	$mcm = mysql($dbnam, "SELECT cm FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbp = mysql($dbnam, "SELECT bp FROM military WHERE email = '$email' AND pw = '$pw'");
	
	$mfp = mysql($dbnam, "SELECT fp FROM military WHERE email = '$email' AND pw = '$pw'");

	$mwarspeedw = mysql($dbnam, "SELECT warspeedw FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizspeeds = mysql($dbnam, "SELECT wizspeeds FROM military WHERE email = '$email' AND pw = '$pw'");
	$mprispeedw = mysql($dbnam, "SELECT prispeedw FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarspeeda = mysql($dbnam, "SELECT warspeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizspeeda = mysql($dbnam, "SELECT wizspeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mprispeeda = mysql($dbnam, "SELECT prispeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarpower = mysql($dbnam, "SELECT warpower FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizpower = mysql($dbnam, "SELECT wizpower FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpripower = mysql($dbnam, "SELECT pripower FROM military WHERE email = '$email' AND pw = '$pw'");
	
	$mwardef = mysql($dbnam, "SELECT wardef FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizdef = mysql($dbnam, "SELECT wizdef FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpridef = mysql($dbnam, "SELECT pridef FROM military WHERE email = '$email' AND pw = '$pw'");

	$mdbwar = mysql($dbnam, "SELECT dbwar FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwiz = mysql($dbnam, "SELECT dbwiz FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbpri = mysql($dbnam, "SELECT dbpri FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwar2 = mysql($dbnam, "SELECT dbwar2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwiz2 = mysql($dbnam, "SELECT dbwiz2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbpri2 = mysql($dbnam, "SELECT dbpri2 FROM military WHERE email = '$email' AND pw = '$pw'");

	$mdbexplorer = mysql($dbnam, "SELECT dbexplorer FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbscientist = mysql($dbnam, "SELECT dbscientist FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbthief = mysql($dbnam, "SELECT dbthief FROM military WHERE email = '$email' AND pw = '$pw'");

//EXPLORE
	$eexpland = mysql($dbnam, "SELECT expland FROM explore WHERE email = '$email' AND pw = '$pw'");
	$eexpmt = mysql($dbnam, "SELECT expmt FROM explore WHERE email = '$email' AND pw = '$pw'");
	$elandhrs = mysql($dbnam, "SELECT landhrs FROM explore WHERE email = '$email' AND pw = '$pw'");
	$emthrs = mysql($dbnam, "SELECT mthrs FROM explore WHERE email = '$email' AND pw = '$pw'");
	
	
//RESEARCH
	$rr1 = mysql($dbnam, "SELECT r1 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr2 = mysql($dbnam, "SELECT r2 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr3 = mysql($dbnam, "SELECT r3 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr4 = mysql($dbnam, "SELECT r4 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr5 = mysql($dbnam, "SELECT r5 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr1points = mysql($dbnam, "SELECT r1points FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr2points = mysql($dbnam, "SELECT r2points FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr3points = mysql($dbnam, "SELECT r3points FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr4points = mysql($dbnam, "SELECT r4points FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr5points = mysql($dbnam, "SELECT r5points FROM research WHERE email = '$email' AND pw = '$pw'");

//return
	$rwar1 = mysql($dbnam, "SELECT war1 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwar2 = mysql($dbnam, "SELECT war2 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwar3 = mysql($dbnam, "SELECT war3 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwar4 = mysql($dbnam, "SELECT war4 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwiz1 = mysql($dbnam, "SELECT wiz1 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwiz2 = mysql($dbnam, "SELECT wiz2 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwiz3 = mysql($dbnam, "SELECT wiz3 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rwiz4 = mysql($dbnam, "SELECT wiz4 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rpri1 = mysql($dbnam, "SELECT pri1 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rpri2 = mysql($dbnam, "SELECT pri2 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rpri3 = mysql($dbnam, "SELECT pri3 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rpri4 = mysql($dbnam, "SELECT pri4 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rtime1 = mysql($dbnam, "SELECT time1 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rtime2 = mysql($dbnam, "SELECT time2 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rtime3 = mysql($dbnam, "SELECT time3 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rtime4 = mysql($dbnam, "SELECT time4 FROM return WHERE email = '$email' AND pw = '$pw'");

//return
	$war1 = mysql_result($rwar1,"war1");
	$war2 = mysql_result($rwar2,"war2");
    $war3 = mysql_result($rwar3,"war3");
	$war4 = mysql_result($rwar4,"war4");
	
	$wiz1 = mysql_result($rwiz1,"wiz1");
	$wiz2 = mysql_result($rwiz2,"wiz2");
	$wiz3 = mysql_result($rwiz3,"wiz3");
	$wiz4 = mysql_result($rwiz4,"wiz4");
	$pri1 = mysql_result($rpri1,"pri1"); 
	$pri2 = mysql_result($rpri2,"pri2"); 
	$pri3 = mysql_result($rpri3,"pri3"); 
	$pri4 = mysql_result($rpri4,"pri4"); 
	$time1 = mysql_result($rtime1,"time1");
	$time2 = mysql_result($rtime2,"time2");
	$time3 = mysql_result($rtime3,"time3");
	$time4 = mysql_result($rtime4,"time4"); 
	

//USER	
	$setid = mysql_result($usetid,"setid");
	$gp = mysql_result($ugp,"gp");
    $class = mysql_result($uclass,"class");
	$ename = mysql_result($uename,"ename");
	$mts = mysql_result($umts,"mts");
	$land = mysql_result($uland,"land");
	$exp = mysql_result($uexp, "exp");
	$iron = mysql_result($uiron, "iron");
	$food = mysql_result($ufood, "food"); 
	$vote = mysql_result($uvote, "vote"); 
	$votefor = mysql_result($uvotefor, "votefor"); 
	$sl = mysql_result($thesl, "sl"); 
	$exp2 = mysql_result($uexp2, "exp2");
	$fleets = mysql_result($ufleets, "fleets");
	$aim = mysql_result($uaim, "aim");

//BUILDINGS
	$home = mysql_result($bhome,"home");
    $barrack = mysql_result($bbarrack,"barrack");
	$farm = mysql_result($bfarm,"farm");
    $lab = mysql_result($blab,"lab");
	$gm = mysql_result($bgm,"gm");
    $im = mysql_result($bim,"im");
	$aland = mysql_result($baland,"aland");
	$amts = mysql_result($bamts,"amts");
	
	$dhome = mysql_result($bdhome,"dhome");
    $dbarrack = mysql_result($bdbarrack,"dbarrack");
	$dfarm = mysql_result($bdfarm,"dfarm");
    $dlab = mysql_result($bdlab,"dlab");
	$dgm = mysql_result($bdgm,"dgm");
    $dim = mysql_result($bdim,"dim");


//MILITARY
    $civ = mysql_result($mciv,"civ");
	$recruits = mysql_result($mrecruits,"recruits");
    $wizards = mysql_result($mwizards,"wizards");
	$warriors = mysql_result($mwarriors,"warriors");
	$priests = mysql_result($mpriests,"priests");
	$scientists = mysql_result($mscientists,"scientists");
	$thieves = mysql_result($mthieves,"thieves");
	$explorers = mysql_result($mexplorers,"explorers");
	$maxciv = mysql_result($mmaxciv,"maxciv");
	$ssword = mysql_result($mssword,"ssword");
	$lsword = mysql_result($mlsword,"lsword");
	$axe = mysql_result($maxe,"axe");
	$gaxe = mysql_result($mgaxe,"gaxe");
	$club = mysql_result($mclub,"club");
	$icesword = mysql_result($micesword,"icesword");
	$cweapon = mysql_result($mcweapon,"cweapon");
	$cspell = mysql_result($mcspell,"cspell");
	$cstaff = mysql_result($mcstaff,"cstaff");
	$wararmor = mysql_result($mwararmor,"wararmor");
	$wizarmor = mysql_result($mwizarmor,"wizarmor");
	$priarmor = mysql_result($mpriarmor,"priarmor");

	
	$cs = mysql_result($mcs,"cs");
	$cm = mysql_result($mcm,"cm");
	$bp = mysql_result($mbp,"bp");
	
	$fp = mysql_result($mfp,"fp");
	
	$warspeedw = mysql_result($mwarspeedw,"warspeedw");
	$wizspeeds = mysql_result($mwizspeeds,"wizspeeds");
	$prispeedw = mysql_result($mprispeedw,"prispeedw");
	$warspeeda = mysql_result($mwarspeeda,"warspeeda");
	$wizspeeda = mysql_result($mwizspeeda,"wizspeeda");
	$prispeeda = mysql_result($mprispeeda,"prispeeda");
	$warpower = mysql_result($mwarpower,"warpower");
	$wizpower = mysql_result($mwizpower,"wizpower");
	$pripower = mysql_result($mpripower,"pripower");
	
	$wardef = mysql_result($mwardef,"wardef");
	$wizdef = mysql_result($mwizdef,"wizdef");
	$pridef = mysql_result($mpridef,"pridef");

	$dbwar = mysql_result($mdbwar,"dbwar");
	$dbwiz = mysql_result($mdbwiz,"dbwiz");
	$dbpri = mysql_result($mdbpri,"dbpri");
	$dbwar2 = mysql_result($mdbwar2,"dbwar2");
	$dbwiz2 = mysql_result($mdbwiz2,"dbwiz2");
	$dbpri2 = mysql_result($mdbpri2,"dbpri2");

	$dbexplorer = mysql_result($mdbexplorer,"dbexplorer");
	$dbscientist = mysql_result($mdbscientist,"dbscientist");
	$dbthief = mysql_result($mdbthief,"dbthief");

//RESEARCH
	$r1 = mysql_result($rr1,"r1");
	$r2 = mysql_result($rr2,"r2");
	$r3 = mysql_result($rr3,"r3");
	$r4 = mysql_result($rr4,"r4");
	$r5 = mysql_result($rr5,"r5");
	$r1points = mysql_result($rr1points,"r1points");
	$r2points = mysql_result($rr2points,"r2points");
	$r3points = mysql_result($rr3points,"r3points");
	$r4points = mysql_result($rr4points,"r4points");
    $r5points = mysql_result($rr5points,"r5points");

		
//EXPLORE
	$expland = mysql_result($eexpland,"expland");
	$expmt = mysql_result($eexpmt,"expmt");
	$landhrs = mysql_result($elandhrs,"landhrs");
	$mthrs = mysql_result($emthrs,"mthrs");	



//MESSAGES
	/*$origin = mysql_result($morigin,"origin");
	$datesent = mysql_result($mdatesent,"datesent");
	$yourid = mysql_result($myourid,"yourid");
	$message = mysql_result($mmessage,"message"); */


	

//total units all together that are owned
	$ascientists = $scientists;
	$aexplorers = $explorers;
	$tscientists = $scientists + $r1 + $r2 + $r3 + $r4 + $r5;
	$texplorers = $explorers + $expland + $expmt;
    $warriorc = ($warriors * .9) + 500;
	$wizardc = ($wizards * .8) + 400;
	$priestc = ($priests * .7) + 100;
	//$maxtrain = $maxciv * 150 ;
	
//bcost is for land, bmcost is for mountains
	$bmcost = (20 * ($gm + $im) * .2);
    $bcost = (20 * (($home + $barrack + $farm + $lab) * .2));

//buttons for on wconstruct.php page
$ssbutton = "<input class=button type=submit name=update value=Construct><input type=hidden name=update value=1>";
$lsbutton = "<input class=button type=submit name=update2 value=Construct><input type=hidden name=update2 value=2>";
$abutton = "<input class=button type=submit name=update3 value=Construct><input type=hidden name=update3 value=3>";
$qsbutton = "<input class=button type=submit name=update4 value=Construct><input type=hidden name=update4 value=4>";
$gabutton = "<input class=button type=submit name=update5 value=Construct><input type=hidden name=update5 value=5>";
$isbutton = "<input class=button type=submit name=update6 value=Construct><input type=hidden name=update6 value=6>";

//buttons for armor on aconstruct.php page
$bmbutton = "<input class=button type=submit name=update value=Construct><input type=hidden name=update value=1>";
$csbutton = "<input class=button type=submit name=update2 value=Construct><input type=hidden name=update2 value=2>";
$cmbutton = "<input class=button type=submit name=update3 value=Construct><input type=hidden name=update3 value=3>";
$bpbutton = "<input class=button type=submit name=update4 value=Construct><input type=hidden name=update4 value=4>";
$hpbutton = "<input class=button type=submit name=update5 value=Construct><input type=hidden name=update5 value=5>";
$fpbutton = "<input class=button type=submit name=update6 value=Construct><input type=hidden name=update6 value=6>";

//attack calculations
$tdefense = ($warriors * $warpower) + ($wizards * $wizpower) + ($priests * $pripower);

//hourly production
$imhourly = $im * 5;
$gmhourly = $gm * 300;
$civhourly = $civ * .01;
$foodhourly = $home * 1.3;

//max gid
$maxgid = mysql($dbnam, "SELECT max(gid) FROM guild");
$mgid = mysql_result($maxgid,"mgid");

//military
$twarriors = $warriors + $war1 + $war2 + $war3 + $war4;
$twizards = $wizards + $wiz1 + $wiz2 + $wiz3 + $wiz4;
$tpriests = $priests + $pri1 + $pri2 + $pri3 + $pri4;

//exp values
$warexp = 375;
$wizexp = 250;
$priexp = 150;
$landexp = 50;
$mtexp = 75;

//ROUNDED-DOWN VALUES
	$gp = floor($gp);
	$maxciv = floor($maxciv);
	$maxtrain = floor($maxtrain);
	$priestc = floor($priestc);
	$wizardc = floor($wizardc);
	$warriorc = floor($warriorc);
	$civ = floor($civ);
	$land = floor($land);
	$mts = floor($mts);
	$home = floor($home);
	$barrack = floor($barrack);
	$farm = floor($farm);
	$lab =  floor($lab);
	$gm = floor($gm);
	$im = floor($im);
	$exp = floor($exp);
	$r1 = floor($r1);
	$r2 = floor($r2);
	$r3 = floor($r3);
	$r4 = floor($r4);
	$r5 = floor($r5);
	$r1points = floor($r1points);
	$r2points = floor($r2points);
	$r3points = floor($r3points);
	$r4points = floor($r4points);
	$r5points = floor($r5points);

/*
//FORMATED NUMBERS
	$iron = number_format($iron);
	$gp = number_format($gp);
	$maxciv = number_format($maxciv);
	$maxtrain = number_format($maxtrain);
	$priestc = number_format($priestc);
	$wizardc = number_format($wizardc);
	$warriorc = number_format($warriorc);
	$civ = number_format($civ);
	$land = number_format($land);
	$mts = number_format($mts);
	$home = number_format($home);
	$barrack = number_format($barrack);
	$farm = number_format($farm);
	$lab =  number_format($lab);
	$gm = number_format($gm);
	$im = number_format($im);
	$exp = number_format($exp);
	$r1 = number_format($r1);
	$r2 = number_format($r2);
	$r3 = number_format($r3);
	$r4 = number_format($r4);
	$r5 = number_format($r5);
	$r1points = number_format($r1points);
	$r2points = number_format($r2points);
	$r3points = number_format($r3points);
	$r4points = number_format($r4points);
	$r5points = number_format($r5points); 
	*/

}
else{
  header("Location: index.php");
	 exit;
}


 
