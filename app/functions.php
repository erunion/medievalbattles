<?php
			// CHECK TO SEE IF EMAIL EXISTS
				$EMAIL_QUERY = ("SELECT email FROM user WHERE email=\"$email\" AND pw=\"$pw\"");
				$EMAIL_RESULT = mysql_query($EMAIL_QUERY);
				$E_Check = mysql_fetch_array($EMAIL_RESULT);

if($login == 1 AND $pw != "" AND $email !="")
{
 
include("include/connect.php");


	
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
	$umno = mysql($dbnam, "SELECT mno FROM user WHERE email = '$email' AND pw = '$pw'");
	$unno = mysql($dbnam, "SELECT nno FROM user WHERE email = '$email' AND pw = '$pw'");
	$ulumber = mysql($dbnam, "SELECT lumber FROM user WHERE email = '$email' AND pw = '$pw'");
	$ucsnum = mysql($dbnam, "SELECT csnum FROM user WHERE email = '$email' AND pw = '$pw'");
	$usafemode = mysql($dbnam, "SELECT safemode FROM user WHERE email='$email' AND pw = '$pw'");
	$urace = mysql($dbnam, "SELECT race FROM user WHERE email='$email' AND pw='$pw'");

//BUILDINGS
	$bhome = mysql($dbnam, "SELECT home FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bbarrack = mysql($dbnam, "SELECT barrack FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bfarm = mysql($dbnam, "SELECT farm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bwp = mysql($dbnam, "SELECT wp FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$blmill = mysql($dbnam, "SELECT lmill FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bgm = mysql($dbnam, "SELECT gm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bim = mysql($dbnam, "SELECT im FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$baland = mysql($dbnam, "SELECT aland FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bamts = mysql($dbnam, "SELECT amts FROM buildings WHERE email = '$email' AND pw = '$pw'");

	$bdhome = mysql($dbnam, "SELECT dhome FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdbarrack = mysql($dbnam, "SELECT dbarrack FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdfarm = mysql($dbnam, "SELECT dfarm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdwp = mysql($dbnam, "SELECT dwp FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdlmill = mysql($dbnam, "SELECT dlmill FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdgm = mysql($dbnam, "SELECT dgm FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$bdim = mysql($dbnam, "SELECT dim FROM buildings WHERE email = '$email' AND pw = '$pw'");
	
	$H_HOURS = mysql($dbnam, "SELECT Hhrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$B_HOURS = mysql($dbnam, "SELECT Bhrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$F_HOURS = mysql($dbnam, "SELECT Fhrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$W_HOURS = mysql($dbnam, "SELECT Whrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$L_HOURS = mysql($dbnam, "SELECT Lhrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$G_HOURS = mysql($dbnam, "SELECT Ghrs FROM buildings WHERE email = '$email' AND pw = '$pw'");
	$I_HOURS = mysql($dbnam, "SELECT Ihrs FROM buildings WHERE email = '$email' AND pw = '$pw'");

//MILITARY	
	$mclass1 = mysql($dbnam, "SELECT class1 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mclass2 = mysql($dbnam, "SELECT class2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mclass3 = mysql($dbnam, "SELECT class3 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mciv = mysql($dbnam, "SELECT civ FROM military WHERE email = '$email' AND pw = '$pw'");
	$mrecruits = mysql($dbnam, "SELECT recruits FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizards = mysql($dbnam, "SELECT wizards FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarriors = mysql($dbnam, "SELECT warriors FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpriests = mysql($dbnam, "SELECT priests FROM military WHERE email = '$email' AND pw = '$pw'");
	$marchers = mysql($dbnam, "SELECT archers FROM military WHERE email = '$email' AND pw = '$pw'");

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
	$mcbow = mysql($dbnam, "SELECT cbow FROM military WHERE email = '$email' AND pw = '$pw'");
	$micesword = mysql($dbnam, "SELECT icesword FROM military WHERE email = '$email' AND pw = '$pw'");
	$mmace = mysql($dbnam, "SELECT mace FROM military WHERE email = '$email' AND pw = '$pw'");
	$mscepter = mysql($dbnam, "SELECT scepter FROM military WHERE email = '$email' AND pw = '$pw'");
	$mgs = mysql($dbnam, "SELECT gs FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbow1 = mysql($dbnam, "SELECT bow1 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbow2 = mysql($dbnam, "SELECT bow2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbow3 = mysql($dbnam, "SELECT bow3 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbow4 = mysql($dbnam, "SELECT bow4 FROM military WHERE email = '$email' AND pw = '$pw'");
	
	$mwararmor = mysql($dbnam, "SELECT wararmor FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizarmor = mysql($dbnam, "SELECT wizarmor FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpriarmor = mysql($dbnam, "SELECT priarmor FROM military WHERE email = '$email' AND pw = '$pw'");
	$marcharmor = mysql($dbnam, "SELECT archarmor FROM military WHERE email = '$email' AND pw = '$pw'");
	
	$mcs = mysql($dbnam, "SELECT cs FROM military WHERE email = '$email' AND pw = '$pw'");
	$mcm = mysql($dbnam, "SELECT cm FROM military WHERE email = '$email' AND pw = '$pw'");
	$mbp = mysql($dbnam, "SELECT bp FROM military WHERE email = '$email' AND pw = '$pw'");
	$mfp = mysql($dbnam, "SELECT fp FROM military WHERE email = '$email' AND pw = '$pw'");
	$mma = mysql($dbnam, "SELECT ma FROM military WHERE email = '$email' AND pw = '$pw'");
	$mga = mysql($dbnam, "SELECT ga FROM military WHERE email = '$email' AND pw = '$pw'");
	$mba = mysql($dbnam, "SELECT ba FROM military WHERE email = '$email' AND pw = '$pw'");
	$mtr = mysql($dbnam, "SELECT tr FROM military WHERE email = '$email' AND pw = '$pw'");
	$mmr = mysql($dbnam, "SELECT mr FROM military WHERE email = '$email' AND pw = '$pw'");

	$mwarspeedw = mysql($dbnam, "SELECT warspeedw FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizspeeds = mysql($dbnam, "SELECT wizspeeds FROM military WHERE email = '$email' AND pw = '$pw'");
	$mprispeedw = mysql($dbnam, "SELECT prispeedw FROM military WHERE email = '$email' AND pw = '$pw'");
	$marchspeedw = mysql($dbnam, "SELECT archspeedw FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarspeeda = mysql($dbnam, "SELECT warspeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizspeeda = mysql($dbnam, "SELECT wizspeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mprispeeda = mysql($dbnam, "SELECT prispeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$marchspeeda = mysql($dbnam, "SELECT archspeeda FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwarpower = mysql($dbnam, "SELECT warpower FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizpower = mysql($dbnam, "SELECT wizpower FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpripower = mysql($dbnam, "SELECT pripower FROM military WHERE email = '$email' AND pw = '$pw'");
	$marchpower = mysql($dbnam, "SELECT archpower FROM military WHERE email = '$email' AND pw = '$pw'");

	$mwardef = mysql($dbnam, "SELECT wardef FROM military WHERE email = '$email' AND pw = '$pw'");
	$mwizdef = mysql($dbnam, "SELECT wizdef FROM military WHERE email = '$email' AND pw = '$pw'");
	$mpridef = mysql($dbnam, "SELECT pridef FROM military WHERE email = '$email' AND pw = '$pw'");
	$marchdef = mysql($dbnam, "SELECT archdef FROM military WHERE email = '$email' AND pw = '$pw'");
	

	$mdbwar = mysql($dbnam, "SELECT dbwar FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwiz = mysql($dbnam, "SELECT dbwiz FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbpri = mysql($dbnam, "SELECT dbpri FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwar2 = mysql($dbnam, "SELECT dbwar2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbwiz2 = mysql($dbnam, "SELECT dbwiz2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbpri2 = mysql($dbnam, "SELECT dbpri2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbarch2 = mysql($dbnam, "SELECT dbarch2 FROM military WHERE email = '$email' AND pw = '$pw'");
	$mdbarch = mysql($dbnam, "SELECT dbarch FROM military WHERE email = '$email' AND pw = '$pw'");

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
	$rr6 = mysql($dbnam, "SELECT r6 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr7 = mysql($dbnam, "SELECT r7 FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr1pts = mysql($dbnam, "SELECT r1pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr2pts = mysql($dbnam, "SELECT r2pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr3pts = mysql($dbnam, "SELECT r3pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr4pts = mysql($dbnam, "SELECT r4pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr5pts = mysql($dbnam, "SELECT r5pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr6pts = mysql($dbnam, "SELECT r6pts FROM research WHERE email = '$email' AND pw = '$pw'");
	$rr7pts = mysql($dbnam, "SELECT r7pts FROM research WHERE email = '$email' AND pw = '$pw'");

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
	$rarch1 = mysql($dbnam, "SELECT arch1 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rarch2 = mysql($dbnam, "SELECT arch2 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rarch3 = mysql($dbnam, "SELECT arch3 FROM return WHERE email = '$email' AND pw = '$pw'");
	$rarch4 = mysql($dbnam, "SELECT arch4 FROM return WHERE email = '$email' AND pw = '$pw'");

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

	$arch1 = mysql_result($rarch1,"arch1"); 
	$arch2 = mysql_result($rarch2,"arch2"); 
	$arch3 = mysql_result($rarch3,"arch3"); 
    $arch4 = mysql_result($rarch4,"arch4"); 

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
	$mno = mysql_result($umno, "mno");
	$nno = mysql_result($unno, "nno");
	$lumber = mysql_result($ulumber, "lumber");
	$csnum = mysql_result($ucsnum, "csnum");
	$safemode = mysql_result($usafemode, "safemode");
	$race = mysql_result($urace, "race");

//BUILDINGS
	$home = mysql_result($bhome,"home");
    $barrack = mysql_result($bbarrack,"barrack");
	$farm = mysql_result($bfarm,"farm");
    $wp = mysql_result($bwp,"wp");
	$lmill = mysql_result($blmill,"lmill");
	$gm = mysql_result($bgm,"gm");
    $im = mysql_result($bim,"im");
	$aland = mysql_result($baland,"aland");
	$amts = mysql_result($bamts,"amts");
	
	$dhome = mysql_result($bdhome,"dhome");
    $dbarrack = mysql_result($bdbarrack,"dbarrack");
	$dfarm = mysql_result($bdfarm,"dfarm");
    $dwp = mysql_result($bdwp,"dwp");
	$dlmill = mysql_result($bdlmill,"dlmill");
	$dgm = mysql_result($bdgm,"dgm");
    $dim = mysql_result($bdim,"dim");

	$Hhrs = mysql_result($H_HOURS,"Hhrs");
    $Bhrs = mysql_result($B_HOURS,"Bhrs");
	$Fhrs = mysql_result($F_HOURS,"Fhrs");
    $Whrs = mysql_result($W_HOURS,"Whrs");
	$Lhrs = mysql_result($L_HOURS,"Lhrs");
	$Ghrs = mysql_result($G_HOURS,"Ghrs");
    $Ihrs = mysql_result($I_HOURS,"Ihrs");

//MILITARY
    $civ = mysql_result($mciv,"civ");
	$recruits = mysql_result($mrecruits,"recruits");
    $wizards = mysql_result($mwizards,"wizards");
	$warriors = mysql_result($mwarriors,"warriors");
	$priests = mysql_result($mpriests,"priests");
	$archers = mysql_result($marchers,"archers");
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
	$mace = mysql_result($mmace,"mace");
	$scepter = mysql_result($mscepter,"scepter");
	$gs = mysql_result($mgs,"gs");
	$bow1 = mysql_result($mbow1,"bow1");
	$bow2 = mysql_result($mbow2,"bow2");
	$bow3 = mysql_result($mbow3,"bow3");
	$bow4 = mysql_result($mbow4,"bow4");

	$cweapon = mysql_result($mcweapon,"cweapon");
	$cspell = mysql_result($mcspell,"cspell");
	$cstaff = mysql_result($mcstaff,"cstaff");
	$cbow = mysql_result($mcbow,"cbow");
	$wararmor = mysql_result($mwararmor,"wararmor");
	$wizarmor = mysql_result($mwizarmor,"wizarmor");
	$priarmor = mysql_result($mpriarmor,"priarmor");
	$archarmor = mysql_result($marcharmor,"archarmor");

	
	$cs = mysql_result($mcs,"cs");
	$cm = mysql_result($mcm,"cm");
	$bp = mysql_result($mbp,"bp");
	$fp = mysql_result($mfp,"fp");
	$ma = mysql_result($mma,"ma");
	$ga = mysql_result($mga,"ga");
	$ba = mysql_result($mba,"ba");
	$tr = mysql_result($mtr,"tr");
	$mr = mysql_result($mmr,"mr");
	
	$warspeedw = mysql_result($mwarspeedw,"warspeedw");
	$wizspeeds = mysql_result($mwizspeeds,"wizspeeds");
	$prispeedw = mysql_result($mprispeedw,"prispeedw");
	$archspeedw = mysql_result($marchspeedw,"archspeedw");
	$warspeeda = mysql_result($mwarspeeda,"warspeeda");
	$wizspeeda = mysql_result($mwizspeeda,"wizspeeda");
	$prispeeda = mysql_result($mprispeeda,"prispeeda");
	$archspeeda = mysql_result($marchspeeda,"archspeeda");
	$warpower = mysql_result($mwarpower,"warpower");
	$wizpower = mysql_result($mwizpower,"wizpower");
	$pripower = mysql_result($mpripower,"pripower");
	$archpower = mysql_result($marchpower,"archpower");
	
	$wardef = mysql_result($mwardef,"wardef");
	$wizdef = mysql_result($mwizdef,"wizdef");
	$pridef = mysql_result($mpridef,"pridef");
	$archdef = mysql_result($marchdef,"archdef");

	$dbwar = mysql_result($mdbwar,"dbwar");
	$dbwiz = mysql_result($mdbwiz,"dbwiz");
	$dbpri = mysql_result($mdbpri,"dbpri");
	$dbwar2 = mysql_result($mdbwar2,"dbwar2");
	$dbwiz2 = mysql_result($mdbwiz2,"dbwiz2");
	$dbpri2 = mysql_result($mdbpri2,"dbpri2");
	$dbarch2 = mysql_result($mdbarch2,"dbarch2");
	$dbarch = mysql_result($mdbarch,"dbarch");

	$dbexplorer = mysql_result($mdbexplorer,"dbexplorer");
	$dbscientist = mysql_result($mdbscientist,"dbscientist");
	$dbthief = mysql_result($mdbthief,"dbthief");

//RESEARCH
	$r1 = mysql_result($rr1,"r1");
	$r2 = mysql_result($rr2,"r2");
	$r3 = mysql_result($rr3,"r3");
	$r4 = mysql_result($rr4,"r4");
	$r5 = mysql_result($rr5,"r5");
	$r6 = mysql_result($rr6,"r6");
	$r7 = mysql_result($rr7,"r7");
	$r1pts = mysql_result($rr1pts,"r1pts");
	$r2pts = mysql_result($rr2pts,"r2pts");
	$r3pts = mysql_result($rr3pts,"r3pts");
	$r4pts = mysql_result($rr4pts,"r4pts");
    $r5pts = mysql_result($rr5pts,"r5pts");
	$r6pts = mysql_result($rr6pts,"r6pts");
	$r7pts = mysql_result($rr7pts,"r7pts");
		
//EXPLORE
	$expland = mysql_result($eexpland,"expland");
	$expmt = mysql_result($eexpmt,"expmt");
	$landhrs = mysql_result($elandhrs,"landhrs");
	$mthrs = mysql_result($emthrs,"mthrs");	

	$INC_ID = $userid;
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

						$ARCH_ONE = mysql($dbnam, "SELECT arch1 FROM return WHERE userid='$INC_ID'");
						$ARCH_1 = mysql_result($ARCH_ONE,"ARCH_1");
						
						$ARCH_TWO = mysql($dbnam, "SELECT arch2 FROM return WHERE userid='$INC_ID'");
						$ARCH_2 = mysql_result($ARCH_TWO,"ARCH_2");
						
						$ARCH_THREE = mysql($dbnam, "SELECT arch3 FROM return WHERE userid='$INC_ID'");
						$ARCH_3 = mysql_result($ARCH_THREE,"ARCH_3");

						$ARCH_FOUR = mysql($dbnam, "SELECT arch4 FROM return WHERE userid='$INC_ID'");
						$ARCH_4 = mysql_result($ARCH_FOUR,"ARCH_4");
						
						
						$FLEETS_ = mysql($dbnam, "SELECT fleets FROM user WHERE userid='$INC_ID'");
						$_FLEETS = mysql_result($FLEETS_,"_FLEETS");

						$tickstatusss = mysql($dbnam, "SELECT tick FROM Game_Info");
						$tickstatus = mysql_result($tickstatusss,"tickstatus");

//total units all together that are owned

	$warquery = ("SELECT sum(amount) FROM barter WHERE seller=\"$ename\" AND type='Warrior'");
	$warresult = mysql_query($warquery);
	$warcheck = mysql_fetch_array($warresult);

	$wizquery = ("SELECT sum(amount) FROM barter WHERE seller=\"$ename\" AND type='Wizard'");
	$wizresult = mysql_query($wizquery);
	$wizcheck = mysql_fetch_array($wizresult);

	$priquery = ("SELECT sum(amount) FROM barter WHERE seller=\"$ename\" AND type='Priest'");
	$priresult = mysql_query($priquery);
	$pricheck = mysql_fetch_array($priresult);

	$ascientists = $scientists;
	$aexplorers = $explorers;
	$tscientists = $scientists + $r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7;
	$texplorers = $explorers + $expland + $expmt;
    $warriorc = (($warriors + $dbwar + $dbwar2 + $WAR_1 + $WAR_2 + $WAR_3 + $WAR_4 + $warcheck[0]) * .8) + 500;
	$wizardc = (($wizards + $dbwiz + $dbwiz2 + $WIZ_1 + $WIZ_2 + $WIZ_3 + $WIZ_4 + $wizcheck[0]) * .7) + 400;
	$priestc = (($priests + $dbpri + $dbpri2 + $PRI_1 + $PRI_2 + $PRI_3 + $PRI_4 + $pricheck[0]) *  .65) + 100;
	$archerc = (($archers + $dbarch + $dbarch2 + $ARCH_1 + $ARCH_2 + $ARCH_3 + $ARCH_4) * .75) + 450;
	$explorec = (($texplorers + $aexplorers + $dbexplorer) * .875) + 1000;
	
	if($race == Goblin)
	{
	 $warriorc = $warriorc * .5;
	 $wizardc = $wizardc * .5;
	 $priestc = $priestc * .5;
	 $archerc = $archerc * .5;
	}

	$wizardc = round($wizardc);
	$warriorc = round($warriorc);
	$priestc = round($priestc);
	$archerc = round($archerc);
	$explorec = round($explorec);
	
//bcost is for land, bmcost is for mountains

		$bm_cost =  300 + (20 * (($gm + $im + $dim + $dgm) * .2));
 	 	$b_cost =  300 + (20  * (($home + $barrack + $farm + $lmill + $wp + $dhome + $dbarrack + $dfarm + $dwp + $dlmill) * .2));


//buttons for on wconstruct.php page
$ssbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update value=Construct><input type=hidden name=update value=1></form>";
$lsbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update2 value=Construct><input type=hidden name=update2 value=2></form>";
$abutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update3 value=Construct><input type=hidden name=update3 value=3></form>";
$qsbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update4 value=Construct><input type=hidden name=update4 value=4></form>";
$gabutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update5 value=Construct><input type=hidden name=update5 value=5></form>";
$isbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update6 value=Construct><input type=hidden name=update6 value=6></form>";
$mbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update7 value=Construct><input type=hidden name=update7 value=7></form>";
$gsbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update8 value=Construct><input type=hidden name=update8 value=8></form>";
$b1button = "<form type=get action=wconstruct.php><input class=button type=submit name=update9 value=Construct><input type=hidden name=update9 value=9></form>";
$b2button = "<form type=get action=wconstruct.php><input class=button type=submit name=update10 value=Construct><input type=hidden name=update10 value=10></form>";
$b3button = "<form type=get action=wconstruct.php><input class=button type=submit name=update11 value=Construct><input type=hidden name=update11 value=11></form>";
$b4button = "<form type=get action=wconstruct.php><input class=button type=submit name=update12 value=Construct><input type=hidden name=update12 value=12></form>";
$scepterbutton = "<form type=get action=wconstruct.php><input class=button type=submit name=update13 value=Construct><input type=hidden name=update13 value=13></form>";

//buttons for armor on aconstruct.php page
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

if($class== Fighter)
	{$empmodifier = 1.05;
	}
if($class == Cleric)
	{$empmodifier = 1.00;
	}
if($class == Ranger)
	{$empmodifier = 1.00;
	}
if($class == Mage)
	{$empmodifier = .95;
	}
if($race == Giant)
	{$empmodifier = $empmodifier + .25;
	}
if($race == Orc)
	{$empmodifier = $empmodifier - .15;
	}

if($race == Giant){$empmodifier = $empmodifier + .25;}

//attack calculations
$tdefense = (($warriors * $warpower) + ($wizards * $wizpower) + ($priests * $pripower) + ($archers * $archpower) + ($wp * 15)) * $empmodifier;
$tdefense = round ($tdefense);
			if($class == "Fighter")
						{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * .95;
						}
						elseif($r4pts >= 40000)
							{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.05;
							}
						elseif($class == Dwarf)
							{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.2;
							 if($r5pts >= 40000){$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.3;}
							}
					if($class == "Mage")
						{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.1;
						}
						elseif($r4pts >= 40000)
							{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.2;
							}
					if($class == "Cleric")
						{$goldpro = $gm * 300;
						}
						elseif($r4pts >= 40000)
							{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.1;
							} 
					if($class == "Ranger")
						{$goldpro = $gm * 300;
						}
						elseif($r4pts >= 40000)
							{$goldpro1 = $gm * 300; $goldpro = $goldpro1 * 1.1;
							} 

//hourly production
$imhourly = $im * 1.945;
if($r5pts >= 40000)
	{$imhourly = $im * 2.045;}
if($race == Dwarf)
	{
		$imhourly = $im * 2.095;
			if($r5pts >= 40000)
				{$imhourly = $im * 2.195;}
	}


$imhourly = round($imhourly);
$gmhourly = $goldpro;
$woodhourly = $lmill * 2;
if($class == Ranger)
	{$woodhourly = $lmill * 2.1;}
				
$civhourly = $home * .265;
	if($race == Elf){$civhourly == $home * .165;}
	if($race == Orc){$civhourly == $home * .465;}
$foodhourly = $farm * .5;
	if($race == Giant){$foodhourly = $farm * .6;}

$rechourly = $civ * .007;
$rechourly = round($rechourly);

//max gid
$maxgid = mysql($dbnam, "SELECT max(gid) FROM guild");
$mgid = mysql_result($maxgid,"mgid");

//military
$twarriors = $warriors + $war1 + $war2 + $war3 + $war4;
$twizards = $wizards + $wiz1 + $wiz2 + $wiz3 + $wiz4;
$tpriests = $priests + $pri1 + $pri2 + $pri3 + $pri4;
$tarchers = $archers + $arch1 + $arch2 + $arch3 + $arch4;

//exp for attack
$archexpa = 26;
$warexpa = 23;
$wizexpa = 20;
$priexpa = 22;
$landexpa = 8;
$mtexpa = 5;

//exp values  
$archexp = 26;
$warexp = 23;
$wizexp = 20;
$priexp = 22;
$landexp = 8;
$mtexp = 5;

if($class == "Cleric")
	{
		$archexp = 1.05;
		$warexp =  1.05;
		$wizexp =  1.05;
		$priexp =  1.05;
		$landexp = 1.05;
		$mtexp =  1.05;
	}

//ROUNDED-DOWN VALUES
	
	$foodhourly = floor($foodhourly);
	$civhourly = floor($civhourly);
	$priestc = floor($priestc);
	$wizardc = floor($wizardc);
	$warriorc = floor($warriorc);
	$archerc = floor($archerc);

	While($max_land < $aland AND $lcost < $gp)
		{
			$max_land = $max_land + 1;
			$lcost = $max_land * $b_cost;
		}
		
	While($max_mt < $amts AND $gp > $tmcost)
		{
			
			$max_mt = $max_mt + 1;
			$tmcost = $max_mt * $bm_cost;
		}
		
	
			
		
		if($lcost > $gp)
			{$max_land = $max_land -1;}
		
		if($tmcost > $gp)
			{$max_mt = $max_mt - 1;}

		if($aland == 0 OR $gp == 0 OR $bcost > $gp)
				{$max_land = 0 ;}

		if($amts == 0 OR $gp == 0 OR $bmcost > $gp)
			{$max_mt = 0;}




	

//FORMATED NUMBERS
	$foodhourly = number_format($foodhourly);
	$civhourly = number_format($civhourly);
	$rechourly = number_format($rechourly);
	$imhourly = number_format($imhourly);
	$gmhourly = number_format($gmhourly);
	$woodhourly = number_format($woodhourly);

	$dbwar = number_format($dbwar);
	$dbwar2 = number_format($dbwar2);
	$dbwiz = number_format($dbwiz);
	$dbwiz2 = number_format($dbwiz2);
	$dbpri = number_format($dbpri);
	$dbpri2 = number_format($dbpri2);
	$dbarch = number_format($dbarch);
	$dbarch2 = number_format($dbarch2);
	$dbscientist = number_format($dbscientist);
	$dbexplorer = number_format($dbexplorer);
	$dbthief = number_format($dbthief);
	$ascientists = number_format($ascientists);
	$aexplorers = number_format($aexplorers);
	$expland = number_format($expland);
	$expmt = number_format($expmt);
	$explorers = number_format($explorers);
	$scientists = number_format($scientists);
	$thieves = number_format($thieves);

	$twarriors = number_format($twarriors);
	$twizards = number_format($twizards);
	$tpriests = number_format($tpriests);
	$tarchers = number_format($tarchers);

	$tdefense = number_format($tdefense);

	$iron = number_format($iron);
	$gp = number_format($gp);
	$maxciv = number_format($maxciv);
	$maxtrain = number_format($maxtrain);
	$priestc = number_format($priestc);
	$wizardc = number_format($wizardc);
	$warriorc = number_format($warriorc);
	$archerc = number_format($archerc);
	$explorec = number_format($explorec);
	$civ = number_format($civ);
	$land = number_format($land);
	$mts = number_format($mts);
	$food = number_format($food);
	
	$home = number_format($home);
	$barrack = number_format($barrack);
	$farm = number_format($farm);
	$wp = number_format($wp);
	$lmill =  number_format($lmill);
	$gm = number_format($gm);
	$im = number_format($im);
	$dhome = number_format($dhome);
	$dbarrack = number_format($dbarrack);
	$dfarm = number_format($dfarm);
	$dwp = number_format($dwp);
	$dlmill =  number_format($dlmill);
	$dgm = number_format($dgm);
	$dim = number_format($dim);

	$exp = number_format($exp);
	$r1 = number_format($r1);
	$r2 = number_format($r2);
	$r3 = number_format($r3);
	$r4 = number_format($r4);
	$r5 = number_format($r5);
	$r6 = number_format($r6);
	$r7 = number_format($r7);
	//$r1pts = number_format($r1pts);
	//$r2pts = number_format($r2pts);
	//$r3pts = number_format($r3pts);
	//$r4pts = number_format($r4pts);
	//$r5pts = number_format($r5pts); 
	//$r6pts = number_format($r6pts);
	//$r7pts = number_format($r7pts);
	

	


					mysql_query("UPDATE user SET online = \"1\" WHERE email='$email'");
}
else{
      header("Location: logout.php?pageid=timeout");
}


 
