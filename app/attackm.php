<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>
<? if($attacksys == no){echo"<font class=yellow><div align=center>Sorry, attack system is under repair.</font></div>";die();} ?>
<center><b class=reg>| <a href="attack.php"> -Land- </a> | <a href="attackr.php"> -Resource- </a> | <a href="attackm.php"> -Mountain- </a> | </b></center>
		</center><br>
<center>
<form type=post action="attackm.php">
<b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
<input type="hidden" name="setchg" value="1">
<input type="submit" value="Change">
</form>
<br><br>




<?php
	if(!IsSet($attack))
{
  ?> 

				<form type=post action="attackm.php">

			<? include("include/attack/mdrop.php"); ?>
			<? include("include/attack/table.php"); ?>




<?php
}
else
{
	

		if($fleets == 0)
			{echo"<div align=center><font class=yellow>You do not have any generals available.</font><br></div>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
			}
		elseif($empvalue == ns)
			{echo"<div align=center><font class=yellow>You did not specify anyone to attack!</font><br></div>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
			}
		elseif($uarcher > 0 AND $r6pts < 125000)
			{echo"<div align=center><font class=yellow>You have to research archery.<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
				
						include("include/attack/defANDoff.php");
			
					//for attacker
						
						$mtgain = $ATK_mts * .1;
						$mtgain = round($mtgain);

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
		{echo"<div align=center><font class=yellow>You cannot attack your ownself!</font></div><br>";	include("include/attack/mdrop.php");include("include/attack/table.php");die();
		}
	elseif($warriors < $uwarrior OR $wizards < $uwizard OR $priests < $upriest OR $archers < $uarcher) 
		{print"<div align=center><font class=yellow>You cannot send that many units into combat.</font></div><br>";	include("include/attack/mdrop.php");include("include/attack/table.php");die();
		}
	elseif($uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)
		{echo"<div align=center><font class=yellow>You cannot send negative or 0 units.</font></div><br>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
		}
	elseif($yourtotalpower <= $theirtotalpower )
		{echo"<div align=center><font class=yellow>You have failed to attack $empireattacked!</font></div><br>";include("include/attack/mdrop.php");include("include/attack/table.php");
	
	
			include("include/attack/calculations.php");
			
			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $empireattacked ($tsetid) for mountains</font>\", '$setid') ");
			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"<font class=orange>$empireattacked ($tsetid) successfully defended their mountains against $ename ($setid)</font>\", '$tsetid') ");
	
							$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");

						mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have successfully defended our empire against $ename ($setid)</font>\" , '$empvalue') ");

			die();
	}
	else
		{
	
					include("include/attack/calculations.php");
			
    
	While($mtgain > $temptally)
  	{
		If ($agm > 0 AND $mtgain > $temptally)
          { 
			$agm = $agm - 1;
            $temptally = $temptally + 1;
		  }
          
      if ($aimine > 0 AND $mtgain > $temptally)
          {	
			$aimine = $aimine - 1;
            $temptally = $temptally + 1;
		  }
          
      if ($attamts > 0 AND $mtgain > $temptally)
		  {
           $attamts = $attamts - 1;
           $temptally = $temptally + 1;
		  }
      If($mtgain > $temptally AND $agm == 0 AND $aimine == 0)
		{

			If ($dagm > 0 AND $mtgain > $temptally)
        		{ 
					$dagm = $dagm - 1;
           		 	$temptally = $temptally + 1;
		  		}
          
     		 if ($daimine > 0 AND $mtgain > $temptally)
          		{	
					$daimine = $daimine - 1;
            		$temptally = $temptally + 1;
		  		}

		   }
	}	
			




											mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $empireattacked ($tsetid) and gained $mtgain mountains</font>\", '$setid') ");
												mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) lost $mtgain mountains to $ename ($setid)</font>\", '$tsetid') ");
						


						//FOR ATTACKEE
							$tmtloss = $ATK_mts - $mtgain;
							
						//ATTACKERS
							$A_A_Mts = $mts + $mtgain;
							$A_AMTS = $amts + $mtgain;
		

	  					include("include/connect.php");
		
	  					mysql_query("UPDATE user SET mts =\"$A_A_Mts\" WHERE email='$email' AND pw='$pw'");
	  					mysql_query("UPDATE buildings SET amts =\"$A_AMTS\" WHERE email='$email' AND pw='$pw'");
      
	
	 					echo"<div align=center><font class=yellow>You have conquered $mtgain mountains from $empireattacked!</font></div><br>";include("include/attack/mdrop.php");include("include/attack/table.php");
	
	
						$new_exp_2 = $A_EXP2 + ($mtgain * $mtexpa);
						mysql_query("UPDATE user SET exp2 =\"$new_exp_2\" WHERE email='$email' AND pw='$pw'");
      
	 					mysql_query("UPDATE user SET mts =\"$tmtloss\" WHERE userid = '$empvalue'");
	 					mysql_query("UPDATE buildings SET amts =\"$attamts\" WHERE userid = '$empvalue'");
						mysql_query("UPDATE buildings SET gm =\"$agm\" WHERE userid = '$empvalue'");
	 					mysql_query("UPDATE buildings SET im =\"$aimine\" WHERE userid = '$empvalue'");
						mysql_query("UPDATE buildings SET dgm =\"$dagm\" WHERE userid = '$empvalue'");
	 					mysql_query("UPDATE buildings SET dim =\"$daimine\" WHERE userid = '$empvalue'");

						


	
											$newno = $e_nno + 1;

						mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");

						mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have unsuccessfully defended our empire against $ename ($setid) and lost $mtgain mountains</font>\" , '$empvalue') ");
						
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
