<?php include("include/igtop.php");?>

<center>
 <form type=post action="intel.php">
  <b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
   <input type="hidden" name="setchg" value="1">
   <input type="submit" value="Change">
  </form>
 <br>
<br>

<?php
	if(!IsSet($gather))
{
  ?> 

<? include("include/S_INTEL.php"); ?>

<?php
}
else
{
		

	include("include/nexplode.php");

	if($safemode > 0)
		{echo"<div align=center><font class=yellow>You cannot thieve while in safe mode.</font></div>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
		}
	elseif($empvalue == ns)
		{echo"<div align=center><font class=yellow>You did not specify anyone to gather information on.</font></div>"; include("include/S_INTEL.php");die();
		}
	elseif($send == "")
		{echo"<div align=center><font class=yellow>You did not send any thieves.</font></div>";include("include/S_INTEL.php");die();
		}
	elseif($send <= 0)
		{echo"<div align=center><font class=yellow>You cant send 0 or negative thieves.</font></div>";include("include/S_INTEL.php");die();
		}
	elseif($send > $thieves)
		{echo"<div align=center><font class=yellow>You do not have that many thieves to send.</font></div>";include("include/S_INTEL.php");die();
		}
		else
		{

		include("include/connect.php");
	//attackee safemode
		$safe_mo = mysql($dbnam, "SELECT safemode FROM user WHERE userid = '$empvalue'");	
		$safe_m = mysql_result($safe_mo,"safe_m");

	if($safe_m > 0){echo"<div align=center><font class=yellow>You cannot thieve someone that is in safe mode.</font></div>";include("include/S_INTEL.php");die();}

	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");
	
	//attackee empire name
		$theirthieves = mysql($dbnam, "SELECT thieves FROM military WHERE userid = '$empvalue'");	
		$tthieves = mysql_result($theirthieves,"tthieves");

	//attackee new no
		$e_newno = mysql($dbnam, "SELECT nno FROM user WHERE userid = '$empvalue'");	
		$e_nno = mysql_result($e_newno,"e_nno");
	
	if($send < $tthieves)
		{echo"<div align=center><font class=yellow>You have failed to gather information on $empireattacked and lost 10% of your thieves.</div></align>";
		
		
				$newthieves = $thieves - ($send * .1);
				mysql_query("UPDATE military SET thieves =\"$newthieves\" WHERE email='$email' AND pw='$pw'");
				

					$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");
					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>$ename ($setid) has failed to gather information on you</font>\" , '$empvalue') ");
			
				include("include/S_INTEL.php");
				die();
		}
		else
		{
				//select iron, gold, warriors, wizards, priests
		$theiriron = mysql($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");	
		$tiron = mysql_result($theiriron,"tiron");
		
		$theirgp = mysql($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
		$tgp = mysql_result($theirgp,"tgp");

		$theirwars = mysql($dbnam, "SELECT warriors FROM military WHERE userid = '$empvalue'");	
		$twars = mysql_result($theirwars,"twars");

		$theirwiz = mysql($dbnam, "SELECT wizards FROM military WHERE userid = '$empvalue'");	
		$twiz = mysql_result($theirwiz,"twiz");

		$theirpri = mysql($dbnam, "SELECT priests FROM military WHERE userid = '$empvalue'");	
		$tpri = mysql_result($theirpri,"tpri");

		$theirciv = mysql($dbnam, "SELECT civ FROM military WHERE userid = '$empvalue'");	
		$tciv = mysql_result($theirciv,"tciv");

		$theirarch = mysql($dbnam, "SELECT archers FROM military WHERE userid = '$empvalue'");	
		$tarch = mysql_result($theirarch,"tarch");

		$their_race = mysql($dbnam, "SELECT race FROM user WHERE userid = '$empvalue'");	
		$t_race = mysql_result($their_race,"t_race");

		$newthieves = $thieves - ($send * .03);
			
		mysql_query("UPDATE military SET thieves =\"$newthieves\" WHERE email='$email' AND pw='$pw'");
			

					$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");
		
					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>An unknown empire has gathered information on you</font>\" , '$empvalue') ");

// Determine defense of empire probed
	$theirwarpower = mysql($dbnam, "SELECT warpower FROM military WHERE userid = '$empvalue'");
	$twarpower = mysql_result($theirwarpower,"twarpower");

	$theirwizpower = mysql($dbnam, "SELECT wizpower FROM military WHERE userid = '$empvalue'");
	$twizpower = mysql_result($theirwizpower,"twizpower");

	$theirpripower = mysql($dbnam, "SELECT pripower FROM military WHERE userid = '$empvalue'");
	$tpripower = mysql_result($theirpripower,"tpripower");

	$theirarchpower = mysql($dbnam, "SELECT archpower FROM military WHERE userid = '$empvalue'");
	$tarchpower = mysql_result($theirarchpower,"tarchpower");

	$their_set = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");
	$tsetid = mysql_result($their_set,"tsetid");
	
	$emps_thieves = mysql($dbnam, "SELECT thieves FROM military WHERE userid = '$empvalue'"); 
	$theirthief = mysql_result($emps_thieves,"theirthief");

	$theirclass = mysql($dbnam, "SELECT class FROM user WHERE userid = '$empvalue'");
	$tclass = mysql_result($theirclass,"tclass");

	$theirwp = mysql($dbnam, "SELECT wp FROM buildings WHERE userid = '$empvalue'"); 
	$twp = mysql_result($theirwp,"twp");


	$wwar_power = mysql($dbnam, "SELECT warpower FROM military WHERE userid = '$empvalue'"); 
	$war_power = mysql_result($wwar_power,"war_power");

	$wwiz_power = mysql($dbnam, "SELECT wizpower FROM military WHERE userid = '$empvalue'"); 
	$wiz_power = mysql_result($wwiz_power,"wiz_power");

	$ppri_power = mysql($dbnam, "SELECT pripower FROM military WHERE userid = '$empvalue'"); 
	$pri_power = mysql_result($ppri_power,"pri_power");


	$aarch_power = mysql($dbnam, "SELECT archpower FROM military WHERE userid = '$empvalue'"); 
	$arch_power = mysql_result($aarch_power,"arch_power");

	$tempmodifier = 1.00;

	if($tclass== Fighter)
		{ $tempmodifier = 1.05; }
	if($tclass == Mage)
		{ $tempmodifier = .95; }

	if($t_race == Giant)
		{ $tempmodifier = $tempmodifier + .25;}

	if($t_race == Orc)
		{ $tempmodifier = $tempmodifier - .15;
		}

	

	

	$itdefense = (($twars * $twarpower) + ($twiz * $twizpower) + ($tpri * $tpripower) +  ($tarch * $tarchpower) + ($twp * 5)) * $tempmodifier;
	$itdefense = round ($itdefense);

		echo"
		    <div align=center><font class=yellow>You have successfully gathered information on $empireattacked and you only lost 3% of your thieves!<font></div><br><br>
				<table border=1 width=\"40%\" align=center bordercolor=#000000>
		<tr><td class=main colspan=2>Stats of <b class=reg>$empireattacked ($tsetid)</b></td>
		<tr><td class=inner2>Gold Pieces: $tgp</td>
		<tr><td class=inner2>Iron: $tiron</td>
		<tr><td class=inner2>Civilians: $tciv</td>
		<tr><td class=inner2>Thieves: $theirthief</td>
		<tr><td class=inner2>Warriors defending: $twars<br>
		<tr><td class=inner2>Wizards defending: $twiz</td>
		<tr><td class=inner2>Priests defending: $tpri</td>
		<tr><td class=inner2>Archers defending: $tarch</td>
		<tr><td class=inner2>Warrior power: $war_power</td>
		<tr><td class=inner2>Wizard power: $wiz_power</td>
		<tr><td class=inner2>Priest power: $pri_power</td>
		<tr><td class=inner2>Archer power: $arch_power</td>
		<tr><td class=inner2>Empire Defense: $itdefense</td>
			</table>

				";
		
		include("include/S_INTEL.php");die();
		}
	
	}
}
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>
<?php
ob_end_flush();
?>