<?	 
include("include/igtop.php");	
// 1suicide civilian kills 1 civilian-thieve
echo "<div align=center><font class=yellow>Suicide Attacks are being redone so the game is fair.</font></div>";
die();

echo "
<center>
<form type=post action=scattack.php>
	<b class=reg>Settlement:</b><input type=number name=snum size=3 maxlength=3>
	<input type=hidden name=setchg value=1>
	<input type=submit value=Change>
</form>
<br><br>";

if(!IsSet($exploreratk))	{
	include("include/attack/scattack.php");
}
else	{

	include("include/nexplode.php");

	if($safemode > 0)	 {
		echo "<div align=center><font class=yellow>You can't attack when you are in safe mode!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	elseif($empvalue == ns)	 {
		echo "<div align=center><font class=yellow>You can't attack an invisible person!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	elseif($send == "")	{
		echo "<div align=center><font class=yellow>You didn't send any units!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	elseif($send <= 0)	{
		echo "<div align=center><font class=yellow>You didn't send any units!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	elseif($send > $suicide)	{
		echo"<div align=center><font class=yellow>You don't have that many units!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	else	{

		include("include/connect.php");

		// select user values
			$result = mysql_db_query($dbnam, "SELECT * FROM user WHERE userid='$empvalue'");
			$evu = mysql_fetch_array($result);
		// select military values
			$result1 = mysql_db_query($dbnam, "SELECT * FROM military WHERE userid='$empvalue'");
			$evm = mysql_fetch_array($result1);
		// select explore values
			$result2 = mysql_db_query($dbnam, "SELECT * FROM explore WHERE userid='$empvalue'");
			$eve = mysql_fetch_array($result2);
		// select building values
			$result3 = mysql_db_query($dbnam, "SELECT * FROM buildings WHERE userid='$empvalue'");
			$evb = mysql_fetch_array($result3);

		if($evu[safemode] > 0)	{
			echo"<div align=center><font class=yellow>You can't attack someone who's in safe mode!</font></div>";
			include("include/attack/scattack.php");
			die();
		}
		elseif($evu[guild] === $empireguild AND $evu[guild] != "None" AND $empireguild != "None")	{
			echo"<div align=center><font class=yellow>You can't attack someone who is in your guild!</font></div>";
			include("include/attack/scattack.php");
			die();
		} 
		//	their stuff
			$their_military = ($evm[warriors] + $evm[priests] + $evm[wizards] + $evm[archers] + $evm[catapult]);
			$their_off_military = ($evm[archers] + $evm[catapult]);
			$their_buildings = ($evb[home] + $evb[barrack] + $evb[farm] + $evb[wp] + $evb[lmill] + $evb[gm] + $evb[im]);
		
		//	military retaliating--determine how many units you lost
			$their_military_retal = max(0, $their_off_military - ($send / 5));	
			$their_military_retal = round($their_military_retal);
			if($their_military_retal < 0)	 {	$their_military_retal = 0;	}

		//	new total of attacking suicide civilians
			$new_total_suicide_civs = $send - $their_military_retal;

		//	attacking their military--determine how many units you killed
			$suicide_their_military = max(0, $new_total_suicide_civs - ($their_military * 3));	
			$suicide_their_military = round($suicide_their_military);
			if($suicide_their_military < 0)	{	$suicide_their_military = 0;	 }

		//	start removing killed units in their military
			if($suicide_their_military > 0)	{
				if($evm[warriors] > 1)	{	$divider = 1;	}
				if($evm[priests] > 1)	{	$divider = $divider + 1;	}
				if($evm[wizards] > 1)	{	$divider = $divider + 1;	}
				if($evm[archers] > 1)	{	$divider = $divider + 1;	}
				if($evm[catapults] > 1)	{	$divider = $divider + 1;	}

				$military_fatalities = $suicide_their_military / $divider;
				$military_fatalities = round($military_fatalities);

				$new_warriors = $evm[warriors] - $military_fatalities;
				$new_priests = $evm[priests] - $military_fatalities;
				$new_wizards = $evm[wizards] - $military_fatalities;
				$new_archers = $evm[archers] - $military_fatalities;
				$new_catapults = $evm[catapults] - $military_fatalities;

				if($new_warriors < 0)	{	$new_warriors = 0;	}
				if($new_priests < 0)	{	$new_warriors = 0;	}
				if($new_wizards < 0)	{	$new_wizards = 0;	}
				if($new_archers < 0)	{	$new_archers = 0;	}
				if($new_catapults < 0)	{	$new_catapults = 0;	}

				mysql_query("UPDATE military SET warriors='$new_warriors' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE military SET priests='$new_priests' WHERE userid='$empvalue'");
				mysql_query("UPDATE military SET wizards='$new_wizards' WHERE userid='$empvalue'");
				mysql_query("UPDATE military SET archers='$new_archers' WHERE userid='$empvalue'");
				mysql_query("UPDATE military SET catapult='$new_catapults' WHERE userid='$empvalue'");
				
				// calculate and update your new suicide civs
				$new_suicide_civilians = $suicide - $send;
				mysql_query("UPDATE military SET suicide='$new_suicide_civilians' WHERE email='$email' AND pw='$pw'");

				//  attack news - their empire news		
				mysql_query("UPDATE user SET nno=nno+1 WHERE userid='$empvalue'");
				mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=yellow>$ename ($setid) has sucessfully suicided on your emipre</font>', '$empvalue') ");
				
			}
			else	{
				echo "<div align=center><font class=yellow>You failed to suicide on $evu[ename].</font></div>";

				//  attack report - their empire news		
				mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=yellow>$ename ($setid) has failed to suicide on your empire.</font>', '$empvalue') ");
			}

		echo "<div align=center><font class=yellow>You have successfulyl suicided on the empire of $evu[ename].</font></div>";
		include("include/attack/scattack.php");
		die();		
	}
}
?>
</td>
</tr>
</table>
</body>
</html>
<?
ob_end_flush();
?>