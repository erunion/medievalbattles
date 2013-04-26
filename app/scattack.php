<?	 
include("include/igtop.php");	

echo "
<center>
<form type=post action=scattack.php>
	<b class=reg>Settlement:</b><input type=number name=snum size=3 maxlength=3>
	<input type=hidden name=setchg value=1>
	<input type=submit value=Change>
</form>
<br><br>";

if(!IsSet($suicideatk))	{
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
	elseif($send > $suicide)	{
		echo"<div align=center><font class=yellow>You don't have that many units!</font></div>";
		include("include/attack/scattack.php");
		die();
	}
	elseif($toatk == ns)	{
		echo"<div align=center><font class=yellow>You must choose a type of unit to suicide on!</font></div>";
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

		if($toatk == civ)	{
			//	their civilians
				$their_civilians = $evm[civ];
			// determine how many units survived
				$surviving_civilians = ($their_civilians - ($send * 2));
				$surviving_civilians = round($surviving_civilians);
					if($surviving_civilians <= 0)	{	$surviving_civilians = 0;	 }
				mysql_query("UPDATE military SET civ='$surviving_civilians' WHERE userid='$empvalue'");
			//	determine how many units died
				$dead_civs = $their_civilians - $surviving_civilians;
				$dead_thieves = 0;
		}
		if($toatk == thieve)	 {
			//	their thieves
				$their_thieves = $evm[thieves];
			// determine how many units survived
				$surviving_thieves = ($their_thieves - ($send * 2));
				$surviving_thieves = round($surviving_thieves);
					if($surviving_thieves <= 0)	{	$surviving_thieves = 0;	 }
				mysql_query("UPDATE military SET thieves='$surviving_thieves' WHERE userid='$empvalue'");
			//	determine how many units died
				$dead_thieves = $their_thieves - $surviving_thieves;
				$dead_civs = 0;
		}

		// calculate and update your new suicide civs
			$new_suicide_civilians = $suicide - $send;
			mysql_query("UPDATE military SET suicide='$new_suicide_civilians' WHERE email='$email' AND pw='$pw'");
		//  attack news - their empire news		
			mysql_query("UPDATE user SET nno=nno+1 WHERE userid='$empvalue'");
			mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=yellow>$ename ($setid) has sucessfully suicided on your empire. You lost $dead_civs Civilian(s) and $dead_thieves Thieve(s).</font>', '$empvalue') ");
				
		echo "<div align=center><font class=yellow>You have successfully suicided on the empire of $evu[ename] ($evu[setid]). You killed $dead_civs Civilian(s) and $dead_thieves Thieve(s).</font></div>";
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