<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>
<? if($attacksys == no){echo"<font class=yellow><div align=center>Sorry, attack system is under repair.</font></div>";die();} ?>
<center><b class=reg>| <a href="attack.php"> -Land- </a> | <a href="attackr.php"> -Resource- </a> | <a href="attackm.php"> -Mountain- </a> | </b></center>
		</center><br>
<center>
<form type=post action="attackr.php">
<b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
<input type="hidden" name="setchg" value="1">
<input type="submit" value="Change">
</form>
<br>




<?php
	if(!IsSet($attack))
{
  ?> 

				<form type=post action="attackr.php">

			<? include("include/attack/rdrop.php"); ?>
			<? include("include/attack/table.php"); ?>
			</form>

<?php
}
else
{

	
	
		if($fleets == 0)
			{echo"<div align=center><font class=yellow>You do not have any generals available.</font><br></div>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
			}
		elseif($empvalue == ns)
			{echo"<div align=center><font class=yellow>You did not specify anyone to attack!</font><br></div>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
			}
		elseif($uarcher > 0 AND $r6pts < 125000)
			{echo"<div align=center><font class=yellow>You have to research archery.<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
					//INCLUDE OFF, DEF VALUES AND ENAME, LAND, ALAND
						
						include("include/attack/defANDoff.php");
					
					
			

				$EMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$tsetid'");
					$E_Setguild = mysql_result($EMPs_setguild,"E_Setguild");
							$YEMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");
							$YE_Setguild = mysql_result($YEMPs_setguild,"YE_Setguild");

	if($uwarrior == "" AND $uwizard == "" AND $upriest == "" AND $uarcher == "")
		{echo"<div align=center><font class=yellow>You did not send any troops into combat!</font></div><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($E_Setguild == $YE_Setguild AND $setid != $tsetid AND $E_Setguild != None)
		{echo"<div align=center><font class=yellow>You cannot attack someone that is in your guild.</font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($empireattacked === $ename)
		{echo"<div align=center><font class=yellow>You cannot attack your ownself!</font></div><br>";	include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($warriors < $uwarrior OR $wizards < $uwizard OR $priests < $upriest OR $archers < $uarcher) 
		{print"<div align=center><font class=yellow>You cannot send that many units into combat.</font></div><br>";	include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)
		{echo"<div align=center><font class=yellow>You cannot send negative or 0 units.</font></div><br>";include("include/attack/rdrop.php");include("include/attack/table.php");die();
		}
	elseif($yourtotalpower <= $theirtotalpower )
		{echo"<div align=center><font class=yellow>You have failed to attack $empireattacked!</font></div><br>";include("include/attack/rdrop.php");include("include/attack/table.php");
	
	
			include("include/attack/calculations.php");
			
		

			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $empireattacked ($tsetid) for resources</font>\", '$setid') ");
		
			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=orange>$empireattacked ($tsetid) successfully defended their resources against $ename ($setid)</font>\", '$tsetid') ");
								$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");

						mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have successfully defended our empire against $ename ($setid)</font>\" , '$empvalue') ");
			
			die();
	}
	else
		{
		include("include/connect.php");
		include("include/attack/calculations.php");

		if($A_gp < 0)
			{$gpgain = 0;}
		if($A_gp >= 0)
			{$gpgain = $A_gp * .08;}
    
	
		$irongain = $empiron * .08;
		$civgain = $atkciv * .08;
	
		$gpgain = floor($gpgain);
		$irongain = floor($irongain);
		$civgain = floor($civgain);
	
		//for attacker
		$gpg = $gp + $gpgain;
		$irong = $iron + $irongain;
		$civg = $civ + $civgain;
		
		

		//for attackee
		$tgploss = $A_gp - $gpgain;
		$tironloss = $empiron - $irongain;
		$tcivloss = $atkciv - $civgain;
		
		

		
		
		mysql_query("UPDATE user SET gp =\"$gpg\" WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET iron =\"$irong\" WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE military SET civ =\"$civg\" WHERE email='$email' AND pw='$pw'");
	
	 
	
	
		mysql_query("UPDATE user SET gp =\"$tgploss\" WHERE userid = '$empvalue'");
		mysql_query("UPDATE user SET iron =\"$tironloss\" WHERE userid = '$empvalue'");
		mysql_query("UPDATE military SET civ  =\"$tcivloss\" WHERE userid = '$empvalue'");

	

			

				mysql_query("INSERT INTO setnews (date, news, setid) 
					VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $empireattacked ($tsetid) for resources</font>\", '$setid') ");
				mysql_query("INSERT INTO setnews (date, news, setid) 
					VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) lost resources to $ename ($setid)</font>\", '$tsetid') ");
 
 
			
				echo"<div align=center><font class=yellow>Success! You have managed to get $gpgain gold pieces, $irongain iron and $civgain civilians from $empireattacked!</font></div><br>";include("include/attack/rdrop.php");include("include/attack/table.php");

									$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");

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