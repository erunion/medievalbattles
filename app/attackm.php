<?php

$var =   @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";

	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>
<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">
</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>
</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> 
 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>
<center><b class=reg>| <a href="attack.php"> -Land- </a> | <a href="attackr.php"> -Resource- </a> | <a href="attackm.php"> -Mountain- </a> | </b></center>
		</center><br>
<center><b class=reg>Settlement:</b><input type="number" name="update" size=2>
<br><br>



<form type=post action="attackm.php">
<?php
	if(!IsSet($attack))
{
  ?> 

<?php

	$var =  @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Mountain Attack-</option>
		";

/* Download list of Presidents */
$query_string = "SELECT userid, ename FROM user WHERE setid = '$setid'";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
    print("<option value=$row[0]>$row[1]\n</option>");
    }


echo "
		
		</select>
<br><br>";

?>
<center><? echo"Available Generals: $fleets"; ?></center>
	<br>
<table border="0" width="80%" align=center>
	 
	<tr>
	  <td class=main2><b class=reg>Type</b></td>
	  <td class=main2><b class=reg>Available</b></td>
	  <td class=main2><b class=reg>Amount</b></td>
	<tr>
	  <td class=inner2>Warrior</td>
	  <td class=inner2><? echo"$warriors"; ?></td>
	  <td class=inner2><input type="number" name="uwarrior" size=4></td>
	<tr>
	  <td class=inner2>Wizard</td>
	  <td class=inner2><? echo"$wizards"; ?></td>
	  <td class=inner2><input type="number" name="uwizard" size=4></td>
	<tr>
	  <td class=inner2>Priest</td>
	  <td class=inner2><? echo"$priests"; ?></td>
	  <td class=inner2><input type="number" name="upriest" size=4></td>
</table>
	<br>
	<center><input class=button type="submit" name="attack" value="Attack"></center>
			<input type="hidden" name="attack" value="1">

<?php
}
else
{

			if($fleets == 0)
	{echo"You do not have any generals available.";die();
	}
			elseif($empvalue === ns)
	{echo"You did not specify anyone to attack!";die();
	}
	else
	{
//your power and their power
	$dbnam = medievalbattles_com;
	
	$theirwarpower = mysql($dbnam, "SELECT warpower FROM military WHERE userid = '$empvalue'");	
	$twarpower = mysql_result($theirwarpower,"twarpower");
	$theirwizpower = mysql($dbnam, "SELECT wizpower FROM military WHERE userid = '$empvalue'");	
	$twizpower = mysql_result($theirwizpower,"twizpower");
	$theirpripower = mysql($dbnam, "SELECT pripower FROM military WHERE userid = '$empvalue'");	
	$tpripower = mysql_result($theirpripower,"tpripower");
	
	$theirwarriors = mysql($dbnam, "SELECT warriors FROM military WHERE userid = '$empvalue'");	
	$twarriors = mysql_result($theirwarriors,"twarriors");
	$theirwizards = mysql($dbnam, "SELECT wizards FROM military WHERE userid = '$empvalue'");	
	$twizards = mysql_result($theirwizards,"twizards");
	$theirpriests = mysql($dbnam, "SELECT priests FROM military WHERE userid = '$empvalue'");	
	$tpriests = mysql_result($theirpriests,"tpriests");

	$theirtotalpower = ($twarpower * $twarriors) + ($twizpower * $twizards) + ($tpripower * $tpriests);
	$yourtotalpower = ($uwarrior * $warpower) + ($uwizard * $wizpower) + ($upriest * $pripower);



	//attackee mountains	
		$attackedempire = mysql($dbnam, "SELECT mts FROM user WHERE userid = '$empvalue'");	
		$atkempire = mysql_result($attackedempire,"atkempire");
	
	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");

	//attackee available mountains
		$attackeeamt = mysql($dbnam, "SELECT amts FROM buildings WHERE userid = '$empvalue' ");	
		$attamt = mysql_result($attackeeamt,"attamt");
//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");
    
	
		//for attacker
			$mtgain = $atkempire * .1;
	}
	
	
	
	if($uwarrior === "" AND $uwizard === "" AND $upriest === "")
	{echo"You did not send any troops into combat!";die();
	}
	elseif($empireattacked === $ename)
	{echo"You cannot attack your ownself!";





die();


	}
	elseif(($warriors < $uwarrior) or ($wizards < $uwizard) or ($priests < $upriest)) 
	{print "You cannot send that many units into combat.";die();
	}
	elseif($yourtotalpower <= $theirtotalpower )
	{echo"You have failed to attack $empireattacked!";
	
//RETURN TIME
			$returning = "time" . "$fleets";
		mysql_query("UPDATE return SET $returning =\"4\" WHERE email='$email' AND pw='$pw'");
	
		
	$settable = "setnews" . "$setid";

	mysql_query("INSERT INTO $settable (date, news) 
			VALUES	('$clock', '<font class=yellow>$ename failed to attack $empireattacked for mountains</font>') ");

//attackee setid
	$theirsetid = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
	$tsetid = mysql_result($theirsetid,"tsetid");

		$theirsettable = "setnews" . "$tsetid";

	mysql_query("INSERT INTO $theirsettable (date, news) 
			VALUES	('$clock', '<font class=blue>$empireattacked successfully defended their mountains against $ename</font>') ");
	
	//subtraction warriors, wizards, priests to warout, wizout, priout for you
			$subtractedwar = $uwarrior * .9;
			$subtractedwiz = $uwizard * .8;
			$subtractedpri = $upriest * .85;
 
			$newwarriors = $warriors - $uwarrior;
			$newwizards = $wizards - $uwizard;
			$newpriests = $priests - $upriest;

			$newwarout = $warout + $subtractedwar;
			$newwizout = $wizout + $subtractedwiz;
			$newpriout = $priout + $subtractedpri;
	
			 mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
	
	 
			$warcol = "war" . "$fleets";
			$wizcol = "wiz" . "$fleets";
			$pricol = "pri" . "$fleets";
	  
			mysql_query("UPDATE return SET $warcol =\"$newwarout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $wizcol =\"$newwizout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $pricol =\"$newpriout\" WHERE email='$email' AND pw='$pw'");

$newfleets = $fleets - 1;
 mysql_query("UPDATE user SET fleets =\"$newfleets\" WHERE email='$email' AND pw='$pw'");

			$subwarexp = ($uwarrior - $subtractedwar) * $warexp;
			$subwizexp = ($uwizard  - $subtractedwiz) * $wizexp;
			$subpriexp = ($upriest - $subtractedpri) * $priexp;
			$totalsubexp = $exp2 + $subwarexp + $subwizexp + $subpriexp;
			mysql_query("UPDATE user SET exp2 =\"$totalsubexp\" WHERE email='$email' AND pw='$pw'");
	die();
	}
	elseif($attamt >= $mtgain)
	{
	//RETURN TIME
			$returning = "time" . "$fleets";
		

 			 mysql_query("UPDATE return SET $returning =\"4\" WHERE email='$email' AND pw='$pw'");
	//attackee mountains	
		$attackedempire = mysql($dbnam, "SELECT mts FROM user WHERE userid = '$empvalue'");	
		$atkempire = mysql_result($attackedempire,"atkempire");
	
	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");

	//attackee available mountains
		$attackeealand = mysql($dbnam, "SELECT amts FROM buildings WHERE userid = '$empvalue' ");	
		$attamts = mysql_result($attackeealand,"attamts");
    
	
		//for attacker
		$mtgain = $atkempire * .1;
		$tmtgain = ($atkempire * .1) + $mts;
		$newamts = $amts + $mtgain;
		$mtgain = ceil($mtgain);
		$tmgain = ceil($tmtgain);
		$newamts = ceil($newamts);

		//for attackee
		$tmtloss = $atkempire - $mtgain;
		$tamts = $attamts - $mtgain;
		
		

	  @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	  mysql_query("UPDATE user SET mts =\"$tmtgain\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE buildings SET amts =\"$newamts\" WHERE email='$email' AND pw='$pw'");
      
	
	 echo"<b class=yellow>You have conquered $mtgain mountains from $empireattacked!</b>";
	
	
	 mysql_query("UPDATE user SET mts =\"$tmtloss\" WHERE userid = '$empvalue'");
	 mysql_query("UPDATE buildings SET amts =\"$tamts\" WHERE userid = '$empvalue'");

$settable = "setnews" . "$setid";

	mysql_query("INSERT INTO $settable (date, news) 
			VALUES	('$clock', '<font class=green>$ename successfully attacked $empireattacked and gained $mtgain mountains</font>') ");

//attackee setid
	$theirsetid = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
	$tsetid = mysql_result($theirsetid,"tsetid");

		$theirsettable = "setnews" . "$tsetid";

	mysql_query("INSERT INTO $theirsettable (date, news) 
			VALUES	('$clock', '<font class=red>$empireattacked lost $mtgain mountains to $ename</font>') ");

//subtraction warriors, wizards, priests to warout, wizout, priout for you
 $subtractedwar = $uwarrior * .9;
 $subtractedwiz = $uwizard * .8;
 $subtractedpri = $upriest * .85;
 
 $newwarriors = $warriors - $uwarrior;
 $newwizards = $wizards - $uwizard;
 $newpriests = $priests - $upriest;

 $newwarout = $warout + $subtractedwar;
 $newwizout = $wizout + $subtractedwiz;
 $newpriout = $priout + $subtractedpri;
	
	 mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
	
	  mysql_query("UPDATE military SET warout =\"$newwarout\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET wizout =\"$newwizout\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE military SET priout =\"$newpriout\" WHERE email='$email' AND pw='$pw'");
//subtraction warriors, wizards, priests to warout, wizout, priout for you
			$subtractedwar = $uwarrior * .9;
			$subtractedwiz = $uwizard * .8;
			$subtractedpri = $upriest * .85;
 
			$newwarriors = $warriors - $uwarrior;
			$newwizards = $wizards - $uwizard;
			$newpriests = $priests - $upriest;

			$newwarout = $warout + $subtractedwar;
			$newwizout = $wizout + $subtractedwiz;
			$newpriout = $priout + $subtractedpri;
	
			 mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
	
	 
			$warcol = "war" . "$fleets";
			$wizcol = "wiz" . "$fleets";
			$pricol = "pri" . "$fleets";
	  
			mysql_query("UPDATE return SET $warcol =\"$newwarout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $wizcol =\"$newwizout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $pricol =\"$newpriout\" WHERE email='$email' AND pw='$pw'");

$newfleets = $fleets - 1;
 mysql_query("UPDATE user SET fleets =\"$newfleets\" WHERE email='$email' AND pw='$pw'");

			$subwarexp = ($uwarrior - $subtractedwar) * $warexp;
			$subwizexp = ($uwizard  - $subtractedwiz) * $wizexp;
			$subpriexp = ($upriest - $subtractedpri) * $priexp;
			$totalsubexp = $exp2 + $subwarexp + $subwizexp + $subpriexp;
			mysql_query("UPDATE user SET exp2 =\"$totalsubexp\" WHERE email='$email' AND pw='$pw'");
			die();
	}
	 else
		{ 

	   @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);


//RETURN TIME
			$returning = "time" . "$fleets";
		

 			 mysql_query("UPDATE return SET $returning =\"4\" WHERE email='$email' AND pw='$pw'");
	//attackee mountains	
		$attackedempire = mysql($dbnam, "SELECT mts FROM user WHERE userid = '$empvalue'");	
		$atkempire = mysql_result($attackedempire,"atkempire");
	
	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");



	 //getting values of gold mines, iron mines
	$aagm = mysql($dbnam, "SELECT gm FROM buildings WHERE userid = '$empvalue'");	
	$agm = mysql_result($aagm,"agm");
	$aaimine = mysql($dbnam, "SELECT im FROM buildings WHERE userid = '$empvalue'");	
	$aimine = mysql_result($aaimine,"aimine");
	
		
		//for attacker
		$tagm = $agm * .075;
		$taimine = $aimine * .075;
		$tagm = ceil($tagm);
		$taimine = ceil($taimine);
		

		//for attackee
		$newgm = $agm - $tagm;
		$newim = $aimine - $taimine;
		$tmtloss = $atkempire - $mtgain;

	 
		$mtgain = $tagm + $taimine;
		$tmtgain = $mt + $mtgain;
		$newamts = $amts + $mtgain;
		$mtgain = ceil($mtgain);
		$tmtgain = ceil($tmtgain);
		$newamts = ceil($newamts);
		
	  mysql_query("UPDATE user SET mts =\"$tmtgain\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE buildings SET amts =\"$newamts\" WHERE email='$email' AND pw='$pw'");
      
	
	 echo"<b class=yellow>You have conquered $mtgain mountains from $empireattacked!</b>";
	
	
	 mysql_query("UPDATE user SET mts =\"$tmtloss\" WHERE userid = '$empvalue'");
	 mysql_query("UPDATE buildings SET gm =\"$newgm\" WHERE userid = '$empvalue'");
	 mysql_query("UPDATE buildings SET im =\"$newim\" WHERE userid = '$empvalue'");
	
	
	 $settable = "setnews" . "$setid";

	mysql_query("INSERT INTO $settable (date, news) 
			VALUES	('$clock', '<font class=green>$ename successfully attacked $empireattacked and gained $mtgain mountains</font>') ");

//attackee setid
	$theirsetid = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
	$tsetid = mysql_result($theirsetid,"tsetid");

		$theirsettable = "setnews" . "$tsetid";

	mysql_query("INSERT INTO $theirsettable (date, news) 
			VALUES	('$clock', '<font class=red>$empireattacked lost $mtgain mountains to $ename</font>') ");
	//subtraction warriors, wizards, priests to warout, wizout, priout for you
 $subtractedwar = $uwarrior * .9;
 $subtractedwiz = $uwizard * .8;
 $subtractedpri = $upriest * .85;
 
 $newwarriors = $warriors - $uwarrior;
 $newwizards = $wizards - $uwizard;
 $newpriests = $priests - $upriest;

 $newwarout = $warout + $subtractedwar;
 $newwizout = $wizout + $subtractedwiz;
 $newpriout = $priout + $subtractedpri;
	
	 mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
	
	  mysql_query("UPDATE military SET warout =\"$newwarout\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET wizout =\"$newwizout\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE military SET priout =\"$newpriout\" WHERE email='$email' AND pw='$pw'");
//subtraction warriors, wizards, priests to warout, wizout, priout for you
			$subtractedwar = $uwarrior * .9;
			$subtractedwiz = $uwizard * .8;
			$subtractedpri = $upriest * .85;
 
			$newwarriors = $warriors - $uwarrior;
			$newwizards = $wizards - $uwizard;
			$newpriests = $priests - $upriest;

			$newwarout = $warout + $subtractedwar;
			$newwizout = $wizout + $subtractedwiz;
			$newpriout = $priout + $subtractedpri;
	
			 mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
	
	 
			$warcol = "war" . "$fleets";
			$wizcol = "wiz" . "$fleets";
			$pricol = "pri" . "$fleets";
	  
			mysql_query("UPDATE return SET $warcol =\"$newwarout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $wizcol =\"$newwizout\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $pricol =\"$newpriout\" WHERE email='$email' AND pw='$pw'");

$newfleets = $fleets - 1;
 mysql_query("UPDATE user SET fleets =\"$newfleets\" WHERE email='$email' AND pw='$pw'");

			$subwarexp = ($uwarrior - $subtractedwar) * $warexp;
			$subwizexp = ($uwizard  - $subtractedwiz) * $wizexp;
			$subpriexp = ($upriest - $subtractedpri) * $priexp;
			$totalsubexp = $exp2 + $subwarexp + $subwizexp + $subpriexp;
			mysql_query("UPDATE user SET exp2 =\"$totalsubexp\" WHERE email='$email' AND pw='$pw'");
			die();
	  
			}
}


?>	
<!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
