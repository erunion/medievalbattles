<?php include("include/igtop.php");?>

<? 	 if($attacksys == no){echo"<font class=yellow><div align=center>Sorry, attack system is under repair.</font></div>";die();} ?>

<center><b class=reg>| <a href="attack.php"> -Land- </a> | <a href="attackr.php"> -Resource- </a> | <a href="attackm.php"> -Mountain- </a> | </b></center>
	
<center>

<form type=post action="attack.php">
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

			<? include("include/attack/ldrop.php"); ?>
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
			{echo"<div align=center><font class=yellow>You cannot attack while in safe mode.<br><br></font></div>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
			}
		elseif($fleets == 0)
			{echo"<div align=center><font class=yellow>You do not have any generals available.<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
		elseif($empvalue == ns)
			{echo"<div align=center><font class=yellow>You did not specify anyone to attack!<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
			}
		elseif($uarcher > 0 AND $r6pts < 125000)
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
						include("include/connect.php");
						include("include/attack/defANDoff.php");
 						 
		
					//for attacker
						if($atkempire >= 200)
							{$landgain = $atkempire * .1;$landgain = round($landgain);}
						elseif($atkempire < 200 AND $atkempire >=10)
							{$landgain = 10;}
						else
							{$landgain = $atkempire;$landgain = round($landgain);}
					
							$EMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$tsetid'");
							$E_Setguild = mysql_result($EMPs_setguild,"E_Setguild");

							$YEMPs_setguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");
							$YE_Setguild = mysql_result($YEMPs_setguild,"YE_Setguild");

	if($uwarrior == "" AND $uwizard == "" AND $upriest == "" AND $uarcher == "")
		{echo"<div align=center><font class=yellow>You did not send any troops into combat!</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($E_Setguild == $YE_Setguild AND $setid != $tsetid AND $E_Setguild != None)
		{echo"<div align=center><font class=yellow>You cannot attack someone that is in your guild.</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($empireattacked === $ename)
		{echo"<div align=center><font class=yellow>You cannot attack your ownself!</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($warriors < $uwarrior OR $wizards < $uwizard OR $priests < $upriest OR $archers < $uarcher) 
		{print"<div align=center><font class=yellow>You cannot send that many units into combat.</font></div><br><br>";	include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)
		{echo"<div align=center><font class=yellow>You cannot send negative or 0 units.</font></div><br><br>";include("include/attack/ldrop.php");include("include/attack/table.php");die();
		}
	elseif($yourtotalpower <= $theirtotalpower )
		{
	
					include("include/attack/calculations.php");

					mysql_query("INSERT INTO setnews (date, news, setid) 
						VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $empireattacked ($tsetid) for land</font>\", '$setid') ");
					mysql_query("INSERT INTO guildnews (date, news, setid) 
						VALUES	('$clock', \"<font class=yellow>$ename ($setid) failed to attack $empireattacked ($tsetid) for land</font>\", '$setid') ");

					mysql_query("INSERT INTO setnews (date, news, setid) 
						VALUES	('$clock', \"<font class=orange>$empireattacked ($tsetid) successfully defended their land against $ename ($setid)</font>\", '$tsetid') ");
					mysql_query("INSERT INTO guild news (date, news, setid) 
						VALUES	('$clock', \"<font class=orange>$empireattacked ($tsetid) successfully defended their land against $ename ($setid)</font>\", '$tsetid') ");

						
					$newno = $e_nno + 1;

					mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");

					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>We have successfully defended our empire against $ename ($setid)</font>\" , '$empvalue') ");
					
					echo"<div align=center><font class=yellow>You have failed to attack $empireattacked($tsetid)!</font><br><br><font class=orange>$your_losses<br><br></font></div>";include("include/attack/ldrop.php");include("include/attack/table.php");
					die();
		}
		else
			{
			

	include("include/connect.php");
	include("include/attack/calculations.php");

								

	While($landgain > $temptally)
  	{
		If ($ahome > 0 AND $landgain > $temptally)
          { 
			$ahome = $ahome - 1;
            $temptally = $temptally + 1;
		  }
          
      if ($abarrack > 0 AND $landgain > $temptally)
          {	
			$abarrack = $abarrack - 1;
            $temptally = $temptally + 1;
		  }
          
      if ($afarm > 0 AND $landgain > $temptally)
		  {
           $afarm = $afarm - 1;
           $temptally = $temptally + 1;
		  }
           
      if ($awp > 0 AND $landgain > $temptally)
		  {
           $awp = $awp - 1;
           $temptally = $temptally + 1;
 		  }
       if($almill > 0 AND $landgain > $temptally)
		  {
		   $almill = $almill - 1;
		   $temptally = $temptallly + 1;
		  }
	  if ($attaland > 0 AND $landgain > $temptally)
		  {
           $attaland = $attaland - 1;
           $temptally = $temptally + 1;
		  }
	  	if($landgain > $temptally AND $ahome == 0 AND $abarrack == 0 AND $afarm == 0 AND $alab == 0 AND $attaland == 0)
		  	{
					If ($dahome > 0 AND $landgain > $temptally)
          				{ 
							$dahome = $dahome - 1;
            				$temptally = $temptally + 1;
		  				}
          
     				 if ($dabarrack > 0 AND $landgain > $temptally)
          				{	
							$dabarrack = $dabarrack - 1;
            				$temptally = $temptally + 1;
		  				}
          
      				if ($dafarm > 0 AND $landgain > $temptally)
		  				{
           					$dafarm = $dafarm - 1;
           					$temptally = $temptally + 1;
		  				}
           
      				if ($dawp > 0 AND $landgain > $temptally)
		  				{
           					$dawp = $dawp - 1;
           					$temptally = $temptally + 1;
 		  				}
					if($dalmill > 0 AND $landgain > $temptally)
						{
							$dalmill = $dalmill - 1;
							$temptally = $temptally + 1;
						}

           			

		  	}
       	
	}

								//for attackee
									$ATD_land = $atkempire - $landgain;  
									$NEW_land = $land + $landgain;
									$NEW_aland = $aland + $landgain;

	  					
	  						
      
	 								if($landgain >= 10 AND $ATD_land != 0)
										{

												mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $empireattacked ($tsetid) and gained $landgain land</font>\", '$setid') ");

												mysql_query("INSERT INTO guildnews (date, news, setid) 
													VALUES	('$clock', \"<font class=yellow>$ename ($setid) successfully attacked $empireattacked ($tsetid) and gained $landgain land</font>\", '$setid') ");
												mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) lost $landgain land to $ename ($setid)</font>\", '$tsetid') ");
												mysql_query("INSERT INTO guildnews (date, news, setid) 
													VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) lost $landgain land to $ename ($setid)</font>\", '$tsetid') ");
										}
									if($ATD_land == 0)
											{
												
												mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=yellow>$ename ($setid) gained $landgain land and destroyed $empireattacked ($tsetid) <i>Medieval style</i></font>\", '$setid') ");
												mysql_query("INSERT INTO guildnews (date, news, setid) 
													VALUES	('$clock', \"<font class=yellow>$ename ($setid) gained $landgain land and destroyed $empireattacked ($tsetid) <i>Medieval style</i></font>\", '$setid') ");

												mysql_query("INSERT INTO setnews (date, news, setid) 
													VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) was destroyed by $ename ($setid) <i>Medieval style</i></font>\", '$tsetid') ");
												mysql_query("INSERT INTO guildnews (date, news, setid) 
													VALUES	('$clock', \"<font class=lg>$empireattacked ($tsetid) was destroyed by $ename ($setid) <i>Medieval style</i></font>\", '$tsetid') ");
											}

										$new_exp_2 = $A_EXP2 + ($landgain * $landexpa);
										mysql_query("UPDATE user SET exp2 =\"$new_exp_2\" WHERE email='$email' AND pw='$pw'");

										mysql_query("UPDATE user SET land =\"$NEW_land\" WHERE email='$email' AND pw='$pw'");
	  									mysql_query("UPDATE buildings SET aland =\"$NEW_aland\" WHERE email='$email' AND pw='$pw'");
										
	  									mysql_query("UPDATE user SET land =\"$ATD_land\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET home =\"$ahome\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET barrack =\"$abarrack\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET wp =\"$awp\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET farm =\"$afarm\" WHERE userid = '$empvalue'");
										mysql_query("UPDATE buildings SET lmill =\"$almill\" WHERE userid='$empvalue'");
										mysql_query("UPDATE buildings SET aland =\"$attaland\" WHERE userid = '$empvalue'");

										mysql_query("UPDATE buildings SET dhome =\"$dahome\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET dbarrack =\"$dabarrack\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET dwp =\"$dawp\" WHERE userid = '$empvalue'");
	 									mysql_query("UPDATE buildings SET dfarm =\"$dafarm\" WHERE userid = '$empvalue'");
										mysql_query("UPDATE buildings SET dlmill = \"$dalmill\" WHERE userid ='$empvalue'");
									
									
									if($landgain >= 10 AND $ATD_land != 0)
										{echo"<div align=center><font class=yellow>You have conquered $landgain land from $empireattacked($tsetid)!</font><br><br><font class=orange>$your_losses<br><br></font>";
					
											$newno = $e_nno + 1;

											mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");				
											mysql_query("INSERT INTO empnews (date, news, yourid) 
												VALUES	('$clock', \"<font class=yellow>We have unsuccessfully defended our empire against $ename ($setid) and lost $landgain land</font>\" , '$empvalue') ");
													include("include/attack/ldrop.php");include("include/attack/table.php");
										}
									if($ATD_land == 0)
										{echo"<div align=center><font class=yellow>You have gained $landgain land and destroyed $empireattacked($tsetid) Medieval Style!</font><br><br><font class=orange>$your_losses<br><br></font>";
											$newno = $e_nno + 1;

											mysql_query("UPDATE user SET nno =\"$newno\" WHERE userid='$empvalue'");					
											mysql_query("INSERT INTO empnews (date, news, yourid) 
												VALUES	('$clock', \"<font class=yellow>We have unsuccessfully defended our land agaisnt $ename ($setid) and we have been destroyed</font>\" , '$empvalue') ");
					
										include("include/attack/ldrop.php");include("include/attack/table.php");
										}
									
									if($ATD_land == 0)
									{



			include("include/connect.php");
			
			$no_members = mysql($dbnam, "SELECT members FROM settlement WHERE setid ='$tsetid'");
			$mem_no = mysql_result($no_members,"mem_no");

			$newmem = $mem_no - 1;
			mysql_query("UPDATE settlement SET members = \"$newmem\" WHERE setid='$tsetid'");




			$Their_Email = mysql($dbnam, "SELECT email FROM user WHERE userid=\"$empvalue\"");
			$T_Email = mysql_result($Their_Email,"T_Email");


			$subject = "Account destroyed";
			$body = "You have been destroyed by $ename.  If there is any spots open, you are welcome to signup again.";

			$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
			$mailsend = mail("$T_Email","$subject","$body","$from");
			print("$mailsend");

			// check votefor
			$V_query = ("SELECT votefor FROM user WHERE userid=\"$empvalue\"");
			$V_result = mysql_query($V_query);
			$V_check = mysql_fetch_array($V_result);
		if($V_check[0] != None AND $V_check[0] != $empireattacked)
			{
				$Votedfor_emp = mysql($dbnam, "SELECT vote FROM user WHERE ename=\"$VF_emp\"");
				$VF_emp = mysql_result($Votedfor_emp,"VF_emp");
				
				$newvote = $VF_emp - 1;
				mysql_query("UPDATE user SET vote = \"$newvote\" WHERE ename=\"$empireattacked\"");
			}





			// check user
				$gquery = ("SELECT owner FROM guild WHERE owner=\"$empireattacked\"");
				$gresult = mysql_query($gquery);
				$guildcheck = mysql_fetch_array($gresult);
 if($guildcheck[0] == $empireattacked) 
	{
		//SELECT GUILD NAME	
			$GuildName = mysql($dbnam, "SELECT gname FROM guild WHERE owner=\"$empireattacked\"");
			$GN = mysql_result($GuildName,"GN");

		//SELECT GUILD ID	
			$GuildID = mysql($dbnam, "SELECT gid FROM guild WHERE owner=\"$empireattacked\"");
			$GIDD = mysql_result($GuildID,"GIDD");
	// check setno1
				$gquery1 = ("SELECT setno1 FROM guild WHERE owner=\"$ename\"");
				$gresult1 = mysql_query($gquery1);
				$guildcheck1 = mysql_fetch_array($gresult1);
		// check setno2
				$gquery2 = ("SELECT setno2 FROM guild WHERE owner=\"$ename\"");
				$gresult2 = mysql_query($gquery2);
				$guildcheck2 = mysql_fetch_array($gresult2);
		// check setno3
				$gquery3 = ("SELECT setno3 FROM guild WHERE owner=\"$ename\"");
				$gresult3 = mysql_query($gquery3);
				$guildcheck3 = mysql_fetch_array($gresult3);
		// check setno4
				$gquery4 = ("SELECT setno4 FROM guild WHERE owner=\"$ename\"");
				$gresult4 = mysql_query($gquery4);
				$guildcheck4 = mysql_fetch_array($gresult4);
		// check setno5
				$gquery5 = ("SELECT setno5 FROM guild WHERE owner=\"$ename\"");
				$gresult5 = mysql_query($gquery5);
				$guildcheck5 = mysql_fetch_array($gresult5);
		
					if($guildcheck1[0] > 0)
						{
							//SELECT SETGUILD	
								$their_ID = mysql($dbnam, "SELECT setno1 FROM guild WHERE owner=\"$ename\"");
								$theirID = mysql_result($their_ID,"theirID");
							//SELECT SETGUILD	
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno1='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}
					if($guildcheck2[0] > 0)
						{
							//SELECT SETGUILD	
								$their_ID = mysql($dbnam, "SELECT setno2 FROM guild WHERE owner=\"$ename\"");
								$theirID = mysql_result($their_ID,"theirID");
							//SELECT SETGUILD	
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno2='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}
					if($guildcheck3[0] > 0)
						{

							//SELECT SETGUILD	
								$their_ID = mysql($dbnam, "SELECT setno3 FROM guild WHERE owner=\"$ename\"");
								$theirID = mysql_result($their_ID,"theirID");
							//SELECT SETGUILD	
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno3='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}
					if($guildcheck4[0] > 0)
						{

							//SELECT SETGUILD	
								$their_ID = mysql($dbnam, "SELECT setno4 FROM guild WHERE owner=\"$ename\"");
								$theirID = mysql_result($their_ID,"theirID");
							//SELECT SETGUILD	
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno4='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}
					if($guildcheck5[0] > 0)
						{

							//SELECT SETGUILD	
								$their_ID = mysql($dbnam, "SELECT setno5 FROM guild WHERE owner=\"$ename\"");
								$theirID = mysql_result($their_ID,"theirID");
							//SELECT SETGUILD	
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno5='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}

						$tblname = "$GN" . "main" ."$GIDD";
						$tblname2 = "$GN" . "msgs" . "$GIDD";	

						mysql_query("DELETE FROM guild WHERE owner=\"$empireattacked\"");
						mysql_query("DROP TABLE $tblname");
						mysql_query("DROP TABLE $tblname2");
			
	
						}
								//SELECT email, pw	
								$T_EMAIL = mysql($dbnam, "SELECT email FROM user WHERE ename=\"$empireattacked\"");
								$temail = mysql_result($T_EMAIL,"temail");

								mysql_query("DELETE FROM user WHERE email='$temail'"); 
								mysql_query("DELETE FROM military WHERE email='$temail'");
								mysql_query("DELETE FROM buildings WHERE email='$temail'");
								mysql_query("DELETE FROM research WHERE email='$temail'");
								mysql_query("DELETE FROM return WHERE email='$temail'");
								mysql_query("DELETE FROM explore WHERE email='$temail'");
								mysql_query("UPDATE user SET votefor = \"None\" WHERE votefor=\"$empireattacked\"");

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