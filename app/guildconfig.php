<?php include("include/igtop.php");?>

<?
				// CHECK TO SEE IF A GL
					$gquery = ("SELECT owner FROM guild WHERE owner=\"$ename\"");
					$gresult = mysql_query($gquery);
					$gnamecheck = mysql_fetch_array($gresult);
			
			if($gnamecheck[0] != $ename)
				{echo"<div align=center><font class=yellow>You cannot access the features of this page since you are not a Guild Leader.</font></div>";die();
				}
				else
					{
						
						$ttheginfo = mysql($dbnam, "SELECT info FROM guild WHERE owner = \"$ename\"");
						$ginfo = mysql_result($ttheginfo,"ginfo");

						$O_oemp = mysql($dbnam, "SELECT epw FROM guild WHERE owner = \"$ename\"");
						$ooepw = mysql_result($O_oemp,"ooepw");

						$C_PW = mysql($dbnam, "SELECT cpw FROM guild WHERE owner = \"$ename\"");
						$C_pass = mysql_result($C_PW,"C_pass");
					}
?>

<?php
	if(!IsSet($change))
{
   ?> 

			<? include("include/S_GCONFIG.php"); ?>

<?php
}
else
{
		
	if($oepw == "" AND $nepw == "")
		{
	  		include("include/S_SINFOS.php");
			mysql_query("UPDATE guild SET info =\"$info\" WHERE owner=\"$ename\"");
	  		echo"<div align=center><font class=yellow>Your guild info has been updated.</font></div>";include("include/S_GCONFIG.php");include("include/S_GKICK.php");include("include/S_GDEL.php");
			die();
		}
	elseif($oepw == "" OR $nepw =="")
		{
			echo"<div align=center><font class=yellow>You must specify all password fields to change your password.</font></div>";include("include/S_GCONFIG.php");include("include/S_GKICK.php");include("include/S_GDEL.php");
			die();
		}
	elseif($ooepw == $oepw) 
		{
			include("include/S_SINFOS.php");
			mysql_query("UPDATE guild SET info =\"$info\" WHERE owner=\"$ename\"");
			mysql_query("UPDATE guild SET epw =\"$nepw\" WHERE owner=\"$ename\"");
			echo"<div align=center><font class=yellow>Your entry password has been changed and your info has been updated for your guild.</font></div>";include("include/S_GCONFIG.php");include("include/S_GKICK.php");include("include/S_GDEL.php");
			die();
		}
	elseif($ooepw != $oepw)
		{echo"<div align=center><font class=yellow>You have entered in a wrong password for your old entry password.</font></div>";include("include/S_GCONFIG.php");include("include/S_GKICK.php");include("include/S_GDEL.php");
		die();
		}

  	
}


?>

<?php
	if(!IsSet($kick))
{
   ?> 

			<? include("include/S_GKICK.php"); ?>

<?php
}
else
{
	

// Extract Setno1
$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE owner=\"$ename\"");
$set1 = mysql_result($settlement1,"set1");

// Extract Setno2
$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE owner=\"$ename\"");
$set2 = mysql_result($settlement2,"set2");

// Extract Setno3
$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE owner=\"$ename\"");
$set3 = mysql_result($settlement3,"set3");

// Extract Setno4
$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE owner=\"$ename\"");
$set4 = mysql_result($settlement4,"set4");

// Extract Setno5
$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE owner=\"$ename\"");
$set5 = mysql_result($settlement5,"set5");


	if($kset == ns)
		{echo"<div align=center><font class=yellow>You did not select a settlement to kick from your guild.</font></div>";include("include/S_GKICK.php");include("include/S_GDEL.php");die();
		}
	
	if($kset == $set1)
		{$sett = setno1;
		}
	if($kset == $set2)
		{$sett = setno2;
		}
	if($kset == $set3)
		{$sett = setno3;
		}
	if($kset == $set4)
		{$sett = setno4;
		}
	if($kset == $set5)
		{$sett = setno5;
		}

	if($kset != $set1 AND $kset != $set2 AND $kset != $set3 AND $kset != $set4 AND $kset != $set5)
		{echo"<div align=center><font class=yellow>Invalid settlement.</font></div>";include("include/S_GKICK.php");include("include/S_GDEL.php");die();
		}

		$Sel_set_gname = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid=\"$kset\"");
		$Sel_gname = mysql_result($Sel_set_gname,"Sel_gname");

		$Sel_set_gsetno = mysql($dbnam, "SELECT gsetno FROM settlement WHERE setid=\"$kset\"");
		$Sel_gsetno = mysql_result($Sel_set_gsetno,"Sel_gsetno");
		
		$Sel_members = mysql($dbnam, "SELECT mem FROM guild WHERE owner=\"$ename\"");
		$gmem = mysql_result($Sel_members,"gmem");

		$new_mem = $gmem - 1;
		
		mysql_query("UPDATE settlement SET setguild =\"None\" WHERE setid='$kset'");
		mysql_query("UPDATE settlement SET gsetno =\"0\" WHERE setid='$kset'");
		mysql_query("UPDATE guild SET $sett =\"0\" WHERE owner=\"$ename\"");
		mysql_query("UPDATE guild SET mem =\"$new_mem\" WHERE owner=\"$ename\"");
	
		mysql_query("INSERT INTO setnews (date, news, setid) 
			VALUES	('$clock', \"<font class=blue>Our settlement has been kicked from $Sel_gname</font>\", '$kset') ");
	
		mysql_query("INSERT INTO guildnews (date, news, setid) 
						VALUES	('$clock', \"<font class=blue>Settlement $kset has been removed from the guild</font>\", '$kset') ");

		echo"<div align=center><font class=yellow>Settlement $kset has been removed from your guild.</font></div>";include("include/S_GKICK.php");include("include/G_GLFUND.php");include("include/S_GDEL.php");die();
		

}
?>

<?php
	if(!IsSet($donate))
{
   ?> 

			<? include("include/G_GLFUND.php"); ?>

<?php
}
else
{
		
		include("include/connect.php");
		include("include/nexplode.php");

		$goldd = strip_tags($goldd);
		$irond = strip_tags($irond);

// Determine Guild Name
		$setgname = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");	
		$setguildname = mysql_result($setgname,"setguildname");
// Extract Setno1
		$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE gname='$setguildname'");
		$set1 = mysql_result($settlement1,"set1");
// Extract Setno2
		$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE gname='$setguildname'");
		$set2 = mysql_result($settlement2,"set2");
// Extract Setno3
		$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE gname='$setguildname'");
		$set3 = mysql_result($settlement3,"set3");
// Extract Setno4
		$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE gname='$setguildname'");
		$set4 = mysql_result($settlement4,"set4");
// Extract Setno5
		$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE gname='$setguildname'");
		$set5 = mysql_result($settlement5,"set5");
// Extract Guilds Gold
		$yguildgold = mysql($dbnam, "SELECT fgold FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
		$guildgold = mysql_result($yguildgold,"guildgold");
// Extract Guilds Gold
		$yguildiron = mysql($dbnam, "SELECT firon FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");	
		$guildiron = mysql_result($yguildiron,"guildiron");


		if($empvalue == ns) {
			echo"<div align=center>You did not choose someone to donate to.</div>";
			include("include/G_GLFUND.php");
			include("include/S_GDEL.php");die();
			}
		elseif($goldd == "" AND $irond == "") {
			echo"<div align=center>You did not choose to donate anything from the funds.</div>";
			include("include/G_GLFUND.php");
			include("include/S_GDEL.php");die();
			}
		elseif($goldd > $guildgold) {
			echo"<div align=center>You cannot donate that much gold.</div>";
			include("include/G_GLFUND.php");
			include("include/S_GDEL.php");die();
			}
		elseif($irond > $guildiron) {
			echo"<div align=center>You cannot donate that much iron.</div>";
			include("include/G_GLFUND.php");
			include("include/S_GDEL.php");die();
			}
		elseif($irond < 0 OR $goldd < 0) {
			echo"<div align=center>You cannot donate negative of something.</div>";
			include("include/G_GLFUND.php");
			include("include/S_GDEL.php");die();
			}
			else
				{
		
				//EMPIRE NAME DONATED TO
					$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
					$empireattacked = mysql_result($empattacked,"empireattacked");
				//EMPS setid
					$EMPIRE_ID = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue' AND ename=\"$empireattacked\"");	
					$EMP_ID = mysql_result($EMPIRE_ID,"EMP_ID");
				// Guild of Empire
					$EMPIRE_guild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$EMP_ID'");	
					$EMP_guild = mysql_result($EMPIRE_guild,"EMP_guild");
				
//				if($EMP_ID != $EMP_guild) {
//					echo"<div align=center>This empire is not in your guild.</div>";
//					include("include/S_SFUND.php");
//					include("include/S_SJG.php");die();}
				if($irond == "" OR $irond <= 0) {
					$thenews = "<font class=green><b>$empireattacked</b> has received $goldd gp from the fund</font>";
					}	
				elseif($goldd == "" OR $goldd <= 0) {
					$thenews = "<font class=green><b>$empireattacked</b> has received $irond iron from the fund</font>";
					}
				elseif($goldd > 0 AND $irond > 0) {
					$thenews = "<font class=green><b>$empireattacked</b> has received $goldd gp and $irond iron from the funds</font>";
					}
					
					mysql_query("INSERT INTO guildnews (date, news, setid) VALUES ('$clock', \"$thenews\", '$setid') ");
	
					$empiregold = mysql($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
					$empgold = mysql_result($empiregold,"empgold");	
		
					$empireiron = mysql($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");
					$empiron = mysql_result($empireiron,"empiron");
		
					$empiredonated = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");
					$empd = mysql_result($empiredonated,"empd");

					//settlement  gold and iron being donated
					$newgold = $guildgold - $goldd;
					$newiron = $guildiron - $irond;
			
					mysql_query("UPDATE guild SET fgold =\"$newgold\" WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
					mysql_query("UPDATE guild SET firon =\"$newiron\" WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");

					//selected empire new gold and iron
					$yournewgold = $empgold + $goldd;
					$yournewiron = $empiron + $irond;

					mysql_query("UPDATE user SET gp =\"$yournewgold\" WHERE userid='$empvalue'");
					mysql_query("UPDATE user SET iron =\"$yournewiron\" WHERE  userid='$empvalue'"); 
			
					echo"<div align=center>The empire has recieved what you have donated.</div>";
					include("include/G_GLFUND.php");
					include("include/S_GDEL.php");
					die();

					}	

  	
}


?>

<?php
	if(!IsSet($deleteg))
{
   ?> 
		
			<? include("include/S_GDEL.php"); ?>

<?php
}
else
{
		
		if($C_pass == $cpw)
			{

				//SELECT GUILD NAME	
	$GuildName = mysql($dbnam, "SELECT gname FROM guild WHERE owner=\"$ename\"");
	$GN = mysql_result($GuildName,"GN");

	//SELECT GUILD ID	
	$GuildID = mysql($dbnam, "SELECT gid FROM guild WHERE owner=\"$ename\"");
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
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE owner=\"$ename\"");
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
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE owner=\"$ename\"");
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
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno1='$theirID'");
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
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno1='$theirID'");
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
								$SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setno1='$theirID'");
								$S_GUILD = mysql_result($SET_GUILD,"S_GUILD");
						
							mysql_query("UPDATE settlement SET setguild = \"None\" WHERE setid='$theirID'");
							mysql_query("UPDATE settlement SET gsetno = \"0\" WHERE setid='$theirID'");
						}

						$tblname = "$GN" . "main" ."$GIDD";
						$tblname2 = "$GN" . "msgs" . "$GIDD";	

						mysql_query("DELETE FROM guild WHERE owner=\"$ename\"");
						mysql_query("DROP TABLE $tblname");
						mysql_query("DROP TABLE $tblname2");
			
				echo"<div align=center><font class=yellow>Your guild has been deleted.</font></div>";
				include("include/S_GDEL.php");
				die();

			}
		else
			{
				echo"<div align=center><font class=yellow>You have entered an incorrect password.</font></div>"; 
				include("include/S_GDEL.php");
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