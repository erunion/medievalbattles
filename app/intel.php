<?php
		include("include/igtop.php");
	?>

 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>

<center>
<form type=post action="intel.php">
<b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
<input type="hidden" name="setchg" value="1">
<input type="submit" value="Change">
</form>
<br><br>




<?php
	if(!IsSet($gather))
{
  ?> 


<? include("include/S_INTEL.php"); ?>



<?php
}
else
{
		



if($empvalue == ns)
	{echo"<div align=center><font class=yellow>You did not specify anyone to gather information on.</font></div>"; include("include/S_INTEL.php");die();
	}
	elseif($send == "")
	{echo"<div align=center><font class=yellow>You did not send any thieves.</font></div>";include("include/S_INTEL.php");die();
	}
	elseif($send <= 0)
	{echo"<div align=center><font class=yellow>You cant send 0 or negative thieves.</font></div>";include("include/S_INTEL.php");die();}
	elseif($send > $thieves)
{echo"<div align=center><font class=yellow>You do not have that many thieves to send.</font></div>";include("include/S_INTEL.php");die();
}
else
	{
		$dbnam = "medievalbattles_com";
	//attackee empire name
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");
	
	//attackee empire name
		$theirthieves = mysql($dbnam, "SELECT thieves FROM military WHERE userid = '$empvalue'");	
		$tthieves = mysql_result($theirthieves,"tthieves");
	//attackee new no
		$e_newno = mysql($dbnam, "SELECT nno FROM user WHERE userid = '$empvalue'");	
		$e_nno = mysql_result($e_newno,"e_nno");
	
	if($thieves < $tthieves)
		{echo"<div align=center><font class=yellow>You have failed to gather information on $empireattacked and lost 10% of your thieves.</div></align>";
		
		
				$newthieves = $thieves - ($send * .1);
				mysql_query("UPDATE military SET thieves =\"$newthieves\" WHERE email='$email' AND pw='$pw'");
				

					$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");
					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>$ename has failed to gather information on you</font>\" , '$empvalue') ");
			
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

$theirclass = mysql($dbnam, "SELECT class FROM user WHERE userid = '$empvalue'");
$tclass = mysql_result($theirclass,"tclass");

$theirwp = mysql($dbnam, "SELECT wp FROM buildings WHERE userid = '$empvalue'"); 
$twp = mysql_result($theirwp,"twp");

if($tclass== Fighter)
	{ $tempmodifier = 1.05; }
if($tclass == Cleric)
	{ $tempmodifier = 1; }
if($tclass == Mage)
	{ $tempmodifier = .95; }

$itdefense = (($twars * $twarpower) + ($twiz * $twizpower) + ($tpri * $tpripower) +  ($tarch * $tarchpower) + ($twp * 5)) * $tempmodifier;
$itdefense = round ($itdefense);

		echo"
		    <div align=center><font class=yellow>You have successfully gathered information on $empireattacked and you only lost 3% of your thieves!<font></div><br><br>
				<table border=1 width=\"40%\" align=center bordercolor=#000000>
		<tr><td class=main colspan=2>Stats of <b class=reg>$empireattacked</b></td>
		<tr><td class=inner2>Gold Pieces: $tgp</td>
		<tr><td class=inner2>Iron: $tiron</td>
		<tr><td class=inner2>Civilians: $tciv</td>
		<tr><td class=inner2>Warriors defending $twars<br>
		<tr><td class=inner2>Wizards defending: $twiz</td>
		<tr><td class=inner2>Priests defending: $tpri</td>
		<tr><td class=inner2>Archers defending: $tarch</td>
		<tr><td class=inner2>Empire Defense: $itdefense</td>
			</table>

				";
		
		include("include/S_INTEL.php");die();
		}
	
	}




}
?>
</form>

</table>

   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>

<?php
ob_end_flush();
?>