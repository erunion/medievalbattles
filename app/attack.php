<?
include("include/igtop.php");
echo "
<center>
<b class=reg>| <a href=attack.php> -Land- </a> | <a href=attackr.php> -Resource- </a> | <a href=attackm.php> -Mountain- </a> | </b>
	
<form type=post action=attack.php>
 <b class=reg>Settlement:</b><input type=number name=snum size=3 maxlength=3>
  <input type=hidden name=setchg value=1>
  <input type=submit value=Change>
 </form>
</center>
<br><br>";

if(!IsSet($attack))	{
	include("include/attack/ldrop.php");
	include("include/attack/table.php"); 
}
else	{  	
	include("include/nexplode.php");
		
	$uwarrior = implode("", explode(",", $uwarrior));
	$uwizard = implode("", explode(",", $uwizard));
	$upriest = implode("", explode(",", $upriest));
	$uarcher = implode("", explode(",", $uarcher));
		
	if($safemode > 0)	 {
		echo"<div align=center><font class=yellow>You cannot attack while in safe mode.<br><br></font></div>";
		include("include/attack/mdrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($fleets == 0)	{
		echo"<div align=center><font class=yellow>You do not have any generals available.<br><br></font></div>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($empvalue == ns)	 {
		echo"<div align=center><font class=yellow>You did not specify anyone to attack!<br><br></font></div>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($uarcher > 0 && $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You have to research archery.<br><br></font></div>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($race == Giant AND $uwizard > 0)	{
		echo"<div align=center><font class=yellow>Being that you are a Giant, you cannot attack with wizards.</div></font>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($race == Giant AND $upriest > 0)	{
		echo"<div align=center><font class=yellow>Being that you are a Giant, you cannot attack with  priests.</div></font>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($class == Ranger AND $uwizard > 0)	{
		echo"<div align=center><font class=yellow>Being that you are a Ranger, you cannot attack with wizards.</div></font>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	
	//	include off, def values and ename, land, aland
	include("include/connect.php");
	include("include/attack/defANDoff.php");
 						 
	//	for attacker
	if($evu[land] >= 200)	{	$landgain = round($evu[land] * .1);	 }
	elseif($evu[land] < 200 AND $evu[land] >=10)	{	$landgain = 10;	}
	else	{	$landgain = $evu[land];	 }
					
	$EMPs_guild_query = mysql_db_query($dbnam, "SELECT guild FROM user WHERE userid='$evu[userid]'");
		$EMPs_guild = mysql_result($EMPs_guild_query,"EMPs_guild");

	if($uwarrior == "" AND $uwizard == "" AND $upriest == "" AND $uarcher == "")	{
		echo"<div align=center><font class=yellow>You did not send any troops into combat!</font></div><br><br>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($EMPs_guild == $empireguild AND $EMPs_guild != "None" AND $empireguild != "None")	{
		echo"<div align=center><font class=yellow>You cannot attack someone that is in your guild.</font></div><br><br>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($evu[ename] === $ename)	{
		echo"<div align=center><font class=yellow>You cannot attack your ownself!</font></div><br><br>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($warriors < $uwarrior OR $wizards < $uwizard OR $priests < $upriest OR $archers < $uarcher)	{
		print"<div align=center><font class=yellow>You cannot send that many units into combat.</font></div><br><br>";	
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)	{
		echo"<div align=center><font class=yellow>You cannot send negative or 0 units.</font></div><br><br>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	elseif($cdefense <= $evpower)	{
	
		include("include/attack/calculations.php");
					
		$Setid_maxid = mysql_db_query($dbnam, "SELECT max(sid) FROM setnews");
			$msid = mysql_result($Setid_maxid,"msid");
		$Guild_MaxID = mysql_db_query($dbnam, "SELECT max(gnid) FROM guildnews");
			$mgnid = mysql_result($Guild_MaxID,"mgnid");
					
		$sid = $msid + 1;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) failed to attack $evu[ename] ($evu[setid]) for land</font>', '$setid', '$sid') ");
					
		if($gid[0] != "")	{
			$gnid = $mgnid + 1;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) failed to attack $evu[ename] ($evu[setid]) for land</font>', '$gid[0]', '$gnid') ");
		}
		
		$sid = $msid + 1;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=orange>$evu[ename] ($evu[setid]) successfully defended their land against $ename ($setid)</font>', '$evu[setid]', '$sid') ");
					
		if($tgid[0] != "")	{
			$gnid = $mgnid + 2;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=orange>$evu[ename] ($evu[setid]) successfully defended their land against $ename ($setid)</font>', '$tgid[0]', '$gnid') ");
		}
						
		mysql_query("UPDATE user SET nno = nno + 1 WHERE userid='$empvalue'");

		mysql_query("INSERT INTO empnews (date, news, yourid)	VALUES	('$clock', '<font class=yellow>We have successfully defended our empire against $ename ($setid)</font>' , '$empvalue') ");
					
		echo"<div align=center><font class=yellow>We have failed to attack $evu[ename]($evu[setid])!</font><br><br><font class=orange>$your_losses<br><br></font></div>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
		die();
	}
	else	{
		include("include/connect.php");
		include("include/attack/calculations.php");
		
		$lgain = $landgain;						
		while($lgain > $ltally)	{
		
			if($evb[aland] > 0 AND $lgain > $ltally)	 {
				$evb[aland] = $evb[aland] - 1;
				$ltally = $ltally + 1;
			}
		
			if($evb[dhome] > 0 AND $lgain > $ltally AND $evb[aland] == 0)	 {
				$evb[dhome] = $evb[dhome] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[dbarrack] > 0 AND $lgain > $ltally AND $evb[aland] == 0)	{
				$evb[dbarrack] = $evb[dbarrack] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[dfarm] > 0 AND $lgain > $ltally AND $evb[aland] == 0)	{
				$evb[dfarm] = $evb[dfarm] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[dwp] > 0 AND $lgain > $ltally AND $evb[aland] == 0)	{
				$evb[dwp] = $evb[dwp] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[dlmill] > 0 AND $lgain > $ltally AND $evb[aland] == 0)	{
				$evb[dlmill] = $evb[dlmill] - 1;
				$ltally = $ltally + 1;
			}

			if($evb[home] > 0 AND $lgain > $ltally AND $evb[aland] == 0 AND $evb[dhome] == 0 AND $evb[dbarrack] == 0 AND $evb[dfarm] == 0 AND $evb[dwp] == 0 AND $evb[dlmill] == 0)	{
				$evb[home] = $evb[home] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[barrack] > 0 AND $lgain > $ltally AND $evb[aland] == 0 AND $evb[dhome] == 0 AND $evb[dbarrack] == 0 AND $evb[dfarm] == 0 AND $evb[dwp] == 0 AND $evb[dlmill] == 0)	{
				$evb[barrack] = $evb[barrack] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[farm] > 0 AND $lgain > $ltally AND $evb[aland] == 0 AND $evb[dhome] == 0 AND $evb[dbarrack] == 0 AND $evb[dfarm] == 0 AND $evb[dwp] == 0 AND $evb[dlmill] == 0)	{
				$evb[farm] = $evb[farm] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[wp] > 0 AND $lgain > $ltally AND $evb[aland] == 0 AND $evb[dhome] == 0 AND $evb[dbarrack] == 0 AND $evb[dfarm] == 0 AND $evb[dwp] == 0 AND $evb[dlmill] == 0)	{
				$evb[wp] = $evb[wp] - 1;
				$ltally = $ltally + 1;
			}
			if($evb[lmill] > 0 AND $lgain > $ltally AND $evb[aland] == 0 AND $evb[dhome] == 0 AND $evb[dbarrack] == 0 AND $evb[dfarm] == 0 AND $evb[dwp] == 0 AND $evb[dlmill] == 0)	{
				$evb[lmill] = $evb[lmill] - 1;
				$ltally = $ltally + 1;
			}
	}
	
	mysql_query("UPDATE user SET land = land + $landgain WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET aland = aland + $landgain WHERE email='$email' AND pw='$pw'");
										
	mysql_query("UPDATE user SET land = land - $landgain WHERE userid = '$empvalue'");
	mysql_query("UPDATE buildings SET home=$evb[home], barrack=$evb[barrack], farm=$evb[farm], wp=$evb[wp], lmill=$evb[lmill], dhome=$evb[dhome], dbarrack=$evb[dbarrack], dfarm=$evb[dfarm], dwp=$evb[dwp], dlmill=$evb[dlmill], aland=$evb[aland] WHERE userid = '$empvalue'");
	 		
	if($landgain >= 10 AND $evu[land] - $landgain >= 1)	{
		$sid + $msid + 1;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) successfully attacked $evu[ename] ($evu[setid]) and gained $landgain land</font>', '$setid', '$sid') ");
									
		if($gid[0] != "")	{
			$gnid = $mgnid + 1;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) successfully attacked $evu[ename] ($evu[setid]) and gained $landgain land</font>', '$gid[0]', '$gnid') ");
		}
		
		$sid = $msid + 2;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=lg>$evu[ename] ($evu[setid]) lost $landgain land to $ename ($setid)</font>', '$evu[setid]', '$sid') ");
												
		if($tgid[0] != "")	{
			$gnid = $mgnid + 2;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=lg>$evu[ename] ($evu[setid]) lost $landgain land to $ename ($setid)</font>', '$tgid[0]', '$gnid') ");
		}
	}
	if($evu[land] - $landgain <= 0)	{
		$sid = $msid + 1;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) gained $landgain land and destroyed $evu[ename] ($evu[setid]) <i>Medieval style</i></font>', '$setid', '$sid') ");
												
		if($gid[0] != "")	{
			$gnid = $mgnid + 1;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) gained $landgain land and destroyed $evu[ename] ($evu[setid]) <i>Medieval style</i></font>', '$gid[0]', '$gnid') ");
		}
		$sid = $msid + 2;
		mysql_query("INSERT INTO setnews (date, news, setid, sid)	VALUES	('$clock', '<font class=lg>$evu[ename] ($evu[setid]) was destroyed by $ename ($setid) <i>Medieval style</i></font>', '$evu[setid]', '$sid') ");
												
		if($tgid[0] != "")	{
			$gnid = $mgnid + 2;
			mysql_query("INSERT INTO guildnews (date, news, gid, gnid)	VALUES	('$clock', '<font class=lg>$evu[ename] ($evu[setid]) was destroyed by $ename ($setid) <i>Medieval style</i></font>', '$tgid[0]', '$gnid') ");
		}
	}
	if($landgain >= 10 AND $evu[land] - $landgain >= 1)	{
		echo"<div align=center><font class=yellow>You have conquered $landgain land from $evu[ename]($evu[setid])!</font><br><br><font class=orange>$your_losses<br><br></font>";
					
		mysql_query("UPDATE user SET nno = nno + 1 WHERE userid='$empvalue'");				
		mysql_query("INSERT INTO empnews (date, news, yourid)	VALUES	('$clock', '<font class=yellow>We have unsuccessfully defended our empire against $ename ($setid) and lost $landgain land</font>' , '$empvalue') ");
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
	}
	if($evu[land] - $landgain <= 0)	{
		echo"<div align=center><font class=yellow>You have gained $landgain land and destroyed $evu[ename]($evu[setid]) Medieval Style!</font><br><br><font class=orange>$your_losses<br><br></font>";
		include("include/attack/ldrop.php");
		include("include/attack/table.php");
	}
	if($evu[land] - $landgain == 0)	{	
		include("include/connect.php");
		
		$no_members = mysql_db_query($dbnam, "SELECT members FROM settlement WHERE setid ='$evu[setid]'");
			$mem_no = mysql_result($no_members,"mem_no");

		mysql_query("UPDATE settlement SET members = members - 1 WHERE setid='$evu[setid]'");

		$subject = "Account destroyed";
		$body = "You have been destroyed by $ename.  If there is any spots open, you are welcome to signup again.";
		$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$evu[email]","$subject","$body","$from");
		
		// check votefor
		$V_result = mysql_db_query($dbnam, "SELECT votefor FROM user WHERE userid='$empvalue'");
		$V_check = mysql_fetch_array($V_result);
		
		if($V_check[0] != None)	{	mysql_query("UPDATE user SET vote=vote-1 WHERE ename='$V_check'");	}

		$gresult = mysql_query("SELECT * FROM guild WHERE owner='$evu[userid]'");
		$guild = mysql_fetch_array($gresult);

		if($guild[owner] == $evu[userid])	{
				$gresult1 = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$evu[userid]'");
				$setno = mysql_fetch_array($gresult1);

				mysql_query("UPDATE user SET guild='None' WHERE guild='$guild[gname]'");
				mysql_query("DELETE FROM guild WHERE owner='$evu[userid]'");
		}
		
		mysql_query("DELETE FROM user WHERE userid='$empvalue'");
		mysql_query("DELETE FROM militaryWHERE userid='$empvalue'");
		mysql_query("DELETE FROM buildings WHERE userid='$empvalue'");
		mysql_query("DELETE FROM research WHERE userid='$empvalue'");
		mysql_query("DELETE FROM return WHERE userid='$empvalue'");
		mysql_query("DELETE FROM explore WHERE userid='$empvalue'"); 
		mysql_query("UPDATE user SET votefor='None' WHERE votefor='$evu[ename]'");
	}
}
}
?>	
</td>
</tr>
</table>
</body>
</html>