<?	 
include("include/igtop.php");	
echo "<div align=center><font class=yellow>Explorer Attacks are currently down while we fix some bugs with them</font></div>";
die();

echo "
<center>
<form type=post action=exp-atk.php>
	<b class=reg>Settlement:</b><input type=number name=snum size=3 maxlength=3>
	<input type=hidden name=setchg value=1>
	<input type=submit value=Change>
</form>
<br><br>";

if(!IsSet($exploreratk))	{
	include("include/S_EXPATK.php");
}
else	{

	include("include/nexplode.php");

	if($safemode > 0)	 {
		echo "<div align=center><font class=yellow>You can't attack explorers when you are in safe mode!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($empvalue == ns)	 {
		echo "<div align=center><font class=yellow>You can't attack an invisible person!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($send == "")	{
		echo "<div align=center><font class=yellow>You didn't send any Rottweilers!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($send <= 0)	{
		echo "<div align=center><font class=yellow>You can't attack someone with 0 Rottweilers!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($send == 1)	{
		echo "<div align=center><font class=yellow>You can't attack someone with 1 Rottweiler!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($send > $dogs)	{
		echo"<div align=center><font class=yellow>You don't have that many Rottweilers!</font></div>";
		include("include/S_EXPATK.php");
		die();
	}
	elseif($dog_time > 0 )	{
		echo"<div align=center><font class=yellow>You have to wait till your Rottweilers return home!</font></div>";
		include("include/S_EXPATK.php");
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

		if($evu[safemode] > 0)	{
			echo"<div align=center><font class=yellow>You can't attack someone who's in safe mode!</font></div>";
			include("include/S_EXPATK.php");
			die();
		}
		elseif($evu[guild] === $empireguild AND $evu[guild] != "None" AND $empireguild != "None")	{
			echo"<div align=center><font class=yellow>You can't attack someone who is in your guild!</font></div>";
			include("include/S_EXPATK.php");
			die();
		}
		// dogs split up for attacking
			$atk_dogs = round($send / 2);	 

		// dogs attack land explorers
			$dog_land_atk = max(0, $atk_dogs - ($eve[expland] * 3));	
			$dog_land_atk = round($dog_land_atk);
		// dogs attack mountain explorers
			$dog_mt_atk = max(0, $atk_dogs - ($eve[expmt] * 3));
			$dog_mt_atk = round($dog_mt_atk);

		// land explorers fight back
			$land_explorers = max(0, $eve[expland] - ($atk_dogs / 5));	
			$land_explorers = round($land_explorers);
		// mountain explorers fight back
			$mt_explorers = max(0, $eve[expmt] - ($atk_dogs / 5));	
			$mt_explorers = round($mt_explorers);

		// calculate dogs new dogs
			$killed_dogs = (($atk_dogs - $dog_land_atk) + ($atk_dogs - $dog_mt_atk));
			$surviving_dogs = ($dogs - ($atk_dogs - $killed_dogs));
 
		//	calculate killed explorers
			$killed_explorers = (($eve[expland] - $land_explorers) + ($eve[expmt] - $mt_explorers));
		
		echo "<div align=center><font class=yellow>You have attacked $evu[ename], lost $killed_dogs dogs and killed $killed_explorers explorers.</font></div>";
						
			mysql_query("UPDATE return SET dogs='$surviving_dogs' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET dogtime='3' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE explore SET expland='$land_explorers' WHERE userid='$empvalue'");
			mysql_query("UPDATE explore SET expmt='$mt_explorers' WHERE userid='$empvalue'");
			mysql_query("UPDATE user SET nno=nno+1 WHERE userid='$empvalue'");

		//  attack news - their empire news		
		mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=yellow>$ename ($setid) has attacked your explorers and killed $killed_explorers.</font>', '$empvalue') ");
			
		include("include/S_EXPATK.php");
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