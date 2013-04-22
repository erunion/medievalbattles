<?php include("include/igtop.php");?>

<center><b class=reg>| <a href="attack.php"> -Land- </a> | <a href="attackr.php"> -Resource- </a> | <a href="attackm.php"> -Mountain- </a> | </b></center>
	
<center>

<form type=post action="attackr.php">
 <b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
  <input type="hidden" name="setchg" value="1">
  <input type="submit" value="Change">
 </form>
</center>
<br>
<br>


<?php
	if(!IsSet($attack))
{
  ?> 

			<? include("include/attack/rdrop.php"); ?>
			<? include("include/attack/table.php"); ?>
			
<?php
}
else
{

		include("include/nexplode.php");
		
		$uwarrior = implode("", explode(",", $uwarrior));
		$uwizard = implode("", explode(",", $uwizard));
		$upriest = implode("", explode(",", $upriest));
		$uarcher = implode("", explode(",", $uarcher));
		
		if($safemode > 0)
			{echo"<div align=center><font class=yellow>You cannot attack while in safe mode.</font></div><br><br>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
			}
		elseif($fleets == 0)
			{echo"<div align=center><font class=yellow>You do not have any generals available.</font><br><br></div>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
			}
		elseif($empvalue == ns)
			{echo"<div align=center><font class=yellow>You did not specify anyone to attack!</font><br><br></div>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
			}
		elseif($uarcher > 0 AND $res[r13pts] < 125000)
			{echo"<div align=center><font class=yellow>You have to research archery.<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
		elseif($race == Giant AND $uwizard > 0)
			{echo"<div align=center><font class=yellow>Being that you are a Giant, you cannot attack with wizards.</div></font>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
		elseif($race == Giant AND $upriest > 0)
			{echo"<div align=center><font class=yellow>Being that you are a Giant, you cannot attack with  priests.</div></font>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
		elseif($class == Ranger AND $uwizard > 0)
			{echo"<div align=center><font class=yellow>Being that you are a Ranger, you cannot attack with wizards.</div></font>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
					//INCLUDE OFF, DEF VALUES AND ENAME, LAND, ALAND
						
						include("include/attack/defANDoff.php");
					
					
			

				$EMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$evu[setid]'");
					$E_Setguild = mysql_result($EMPs_setguild,"E_Setguild");
							$YEMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");
							$YE_Setguild = mysql_result($YEMPs_setguild,"YE_Setguild");

	if($uwarrior == "" AND $uwizard == "" AND $upriest == "" AND $uarcher == "")
		{echo"<div align=center><font class=yellow>You did not send any troops into combat!</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($E_Setguild == $YE_Setguild AND $setid != $evu[setid] AND $E_Setguild != None)
		{echo"<div align=center><font class=yellow>You cannot attack someone that is in your guild.</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($evu[ename] === $ename)
		{echo"<div align=center><font class=yellow>You cannot attack your ownself!</font></div><br><br>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($warriors < $uwarrior OR $wizards < $uwizard OR $priests < $upriest OR $archers < $uarcher) 
		{print"<div align=center><font class=yellow>You cannot send that many units into combat.</font></div><br><br>";	include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)
		{echo"<div align=center><font class=yellow>You cannot send negative or 0 units.</font></div><br><br>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($cdefense <= $evpower )
		{
	
	
			include("include/attack/calculations.php");
			
			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $evu[ename] ($evu[setid]) for resources</font>\", '$setid') ");
			
			if($gid[0] !="")
			{
			mysql_query("INSERT INTO guildnews (date, news, gid) 
				VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $evu[ename] ($evu[setid]) for resources</font>\", '$gid[0]') ");
			}

			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=orange>$evu[ename] ($evu[setid]) successfully defended their resources against $ename ($setid)</font>\", '$tsetid') ");
			
			if($tgid[0] != "")
			{
			mysql_query("INSERT INTO guildnews (date, news, gid) 
				VALUES	('$clock', \"<font class=orange>$evu[ename] ($evu[setid]) successfully defended their resources against $ename ($setid)</font>\", '$tgid[0]') ");
			}			
								

					mysql_query("UPDATE user SET nno = nno+1 WHERE userid='$empvalue'");

						mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have successfully defended our empire against $ename ($setid)</font>\" , '$empvalue') ");
			echo"<div align=center><font class=yellow>You have failed to attack $evu[ename]!</font><br><br><font class=orange>$your_losses<br><br></font></div>";include("include/attack/rdrop.php");include("include/attack/table.php");
			die();
	}
	else
		{
		
		include("include/connect.php");
		include("include/attack/calculations.php");

		if($evu[gp] < 0)
			{$gpgain = 0;}
		if($evu[gp] >= 0)
			{$gpgain = $evu[gp] * .08;}
    
	
		$irongain = $evu[iron] * .08;
		$civgain = $evm[civ] * .08;
	
		$gpgain = round($gpgain);
		$irongain = round($irongain);
		$civgain = round($civgain);
	
		mysql_query("UPDATE user SET gp = gp + $gpgain WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET iron = iron + $irongain WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET civ = civ + $civgain WHERE email='$email' AND pw='$pw'");
		
		mysql_query("UPDATE user SET gp = gp - $gpgain WHERE userid = '$empvalue'");
		mysql_query("UPDATE user SET iron = iron - $irongain WHERE userid = '$empvalue'");
		mysql_query("UPDATE military SET civ  = civ - $civgain WHERE userid = '$empvalue'");

				mysql_query("INSERT INTO setnews (date, news, setid) 
					VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $evu[ename] ($evu[setid]) for resources</font>\", '$setid') ");
				
				if($gid[0] != "")
				{
				mysql_query("INSERT INTO guildnews (date, news, gid) 
					VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $evu[ename] ($evu[setid]) for resources</font>\", '$gid[0]') ");
				}
				
				mysql_query("INSERT INTO setnews (date, news, setid) 
					VALUES	('$clock', \"<font class=lg>$evu[ename] ($evu[setid]) lost resources to $ename ($setid)</font>\", '$tsetid') ");
				
				if($tgid[0] != "")
				{
				mysql_query("INSERT INTO guildnews (date, news, gid) 
					VALUES	('$clock', \"<font class=lg>$evu[ename] ($evu[setid]) lost resources to $ename ($setid)</font>\", '$tgid[0]') ");
				}
 
			
				echo"<div align=center><font class=yellow>Success! You have managed to gain $gpgain gold pieces, $irongain iron and $civgain civilians from $evu[ename]($evu[setid])!</font><br><br><font class=orange>$your_losses<br><br></font></div>";include("include/attack/rdrop.php");include("include/attack/table.php");

									

					mysql_query("UPDATE user SET nno = nno + 1 WHERE userid='$empvalue'");

						mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have unsuccessfully defended our empire against $ename ($setid) and lost resources</font>\" , '$empvalue') ");
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