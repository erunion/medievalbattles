<?
include("include/igtop.php");

if($sl == no)	{
	echo"<center><b class=yellow>You are not a SL!</b>";
	die();
}
else	{
}

if(!IsSet($update))	{
	include("include/S_SINFO.php");
}
else	{
	
	include("include/S_SINFOS.php");

	mysql_query("UPDATE settlement SET setpic ='$theseturl' WHERE setid='$setid'");
	mysql_query("UPDATE settlement SET setname ='$thesetname' WHERE  setid='$setid'");
	mysql_query("UPDATE settlement SET nap ='$thenap' WHERE  setid='$setid'");
	mysql_query("UPDATE settlement SET setnotice ='$thesetnotice' WHERE  setid='$setid'");

	echo "<div align=center>Your settlement information has been updated.</div>";
	include("include/S_SINFO.php");
	include("include/S_SFUND.php");
	include("include/S_SJG.php");
	die();

}
/*
if(!IsSet($donate))	{
	include("include/S_SFUND.php");
}
else	{
	
	include("include/connect.php");
	include("include/nexplode.php");

	$goldd = strip_tags($goldd);
	$irond = strip_tags($irond);
		
	$yyourgold = mysql_db_query($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
	$yourgold = mysql_result($yyourgold,"yourgold");

	$yyouriron = mysql_db_query($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
	$youriron = mysql_result($yyouriron,"youriron");

	if($empvalue == ns)	{
		echo "<div align=center>You did not choose someone to donate to.</div>";
		include("include/S_SFUND.php");
		include("include/S_SJG.php");
		die();
	}
	elseif($goldd == "" AND $irond == "")	{
		echo "<div align=center>You did not choose to donate anything from the funds.</div>";
		include("include/S_SFUND.php");
		include("include/S_SJG.php");
		die();
	}
	elseif($goldd > $yourgold)	{
		echo "<div align=center>You cannot donate that much gold.</div>";
		include("include/S_SFUND.php"); 
		include("include/S_SJG.php");
		die();
	}
	elseif($irond > $youriron)	{
		echo "<div align=center>You cannot donate that much iron.</div>";
		include("include/S_SFUND.php"); 
		include("include/S_SJG.php");
		die();
	}
	elseif($goldd < 0 OR $irond < 0)	{
		echo "<div align=center>You cannot donate negative of something.</div>";
		include("include/S_SFUND.php"); 
		include("include/S_SJG.php");
		die();
	}
	else	{
		
		//EMPIRE NAME DONATED TO
			$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
			$empireattacked = mysql_result($empattacked,"empireattacked");
		//EMPS setid
			$EMPIRE_ID = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue' AND ename=\"$empireattacked\"");	
			$EMP_ID = mysql_result($EMPIRE_ID,"EMP_ID");
				
		if($EMP_ID != $setid)	{
			echo"<div align=center>This empire is not in your settlement.</div>";
			include("include/S_SFUND.php"); 
			include("include/S_SJG.php");
			die();
		}
		elseif($irond == "" OR $irond <= 0)	{
			$thenews = "<font class=green><b>$empireattacked</b> has received $goldd gp from the fund</font>";
		}	
		elseif($goldd == "" OR $goldd <= 0)	{
			$thenews = "<font class=green><b>$empireattacked</b> has received $irond iron from the fund</font>";
		}
		elseif($goldd > 0 AND $irond > 0)	{
			$thenews = "<font class=green><b>$empireattacked</b> has received $goldd gp and $irond iron from the funds</font>";
		}
					
		mysql_query("INSERT INTO setnews (date, news, setid) VALUES	('$clock', '$thenews', '$setid') ");
	
		$empiregold = mysql_db_query($dbnam, "SELECT gp FROM user WHERE userid = '$empvalue'");	
		$empgold = mysql_result($empiregold,"empgold");	
		
		$empireiron = mysql_db_query($dbnam, "SELECT iron FROM user WHERE userid = '$empvalue'");
		$empiron = mysql_result($empireiron,"empiron");
		
		$empiredonated = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");
		$empd = mysql_result($empiredonated,"empd");

		//settlement  gold and iron being donated
			$newgold = $yourgold - $goldd;
			$newiron = $youriron - $irond;
			
			mysql_query("UPDATE settlement SET fgold ='$newgold' WHERE setid='$setid'");
			mysql_query("UPDATE settlement SET firon ='$newiron' WHERE  setid='$setid'");
		//selected empire new gold and iron
			$yournewgold = $empgold + $goldd;
			$yournewiron = $empiron + $irond;

			mysql_query("UPDATE user SET gp ='$yournewgold' WHERE userid='$empvalue'");
			mysql_query("UPDATE user SET iron ='$yournewiron' WHERE  userid='$empvalue'"); 
			
	echo"<div align=center>The empire has recieved what you have donated.</div>";
	include("include/S_SFUND.php"); 
	include("include/S_SJG.php");
	die();

	}	
}
*/
/*
if(!IsSet($enter))	{
	include("include/S_SJG.php");
}
else	{
	$zguild = strip_tags($zguild);
	$zpw = strip_tags($zpw);

	//SELECT GUILD CURRENTLY IN
		$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
		$setguild = mysql_result($thesetguild,"setguild");

	//CHECK GUILD
		$gquery = ("SELECT epw FROM guild WHERE gname='$zguild'");
		$gresult = mysql_query($gquery);
		$guildcheck = mysql_fetch_array($gresult);

  	if($setguild != None)
  	  	{echo"<div align=center><font class=yellow>You must leave your current guild before joining another guild.</font></div>";include("include/S_SJG.php");die();
		}
	elseif($zguild == "" OR $zpw == "")
		{echo"<div align=center><font class=yellow>You did not specify all fields.</font></div>";include("include/S_SJG.php");die();
		}
 	elseif($guildcheck[0] != $zpw) 
		{echo"<div align=center><font class=yellow>Incorrect password/guild name combination.</font></div>";include("include/S_SJG.php");die();
		}


					//SELECT NEW GUILD NAME
						$tgname = mysql($dbnam, "SELECT gname FROM guild WHERE gname='$zguild'");	
						$z_gname = mysql_result($tgname,"z_gname");
			
					//SELECT MEMBERS IN NEW GUILD
						$numberofmem = mysql($dbnam, "SELECT mem FROM guild WHERE gname='$z_gname'");	
						$nomem = mysql_result($numberofmem,"nomem");
						
				if($nomem == 5)
					{
					
						echo"<div align=center><font class=yellow>There are currently 5 settlements in this guild, you cannot join.</div></font>";
						include("include/S_SJG.php");die();
					}
				elseif($setguild == None)
					{

						//SELECT SETNO1 SETNO2 AND SETNO3
						$settno1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE gname='$zguild'");	
						$setno1 = mysql_result($settno1,"setno1");
				
						$settno2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE gname='$zguild'");	
						$setno2 = mysql_result($settno2,"setno2");
				
						$settno3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE gname='$zguild'");	
						$setno3 = mysql_result($settno3,"setno3");

						$settno4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE gname='$zguild'");	
						$setno4 = mysql_result($settno4,"setno4");
				
						$settno5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE gname='$zguild'");	
						$setno5 = mysql_result($settno5,"setno5");

						//SELECT NEW GUILD NAME
						$tgname = mysql($dbnam, "SELECT gname FROM guild WHERE gname='$zguild'");	
						$z_gname = mysql_result($tgname,"z_gname");
					
						//SELECT MEMBERS IN NEW GUILD
						$numberofmem = mysql($dbnam, "SELECT mem FROM guild WHERE gname='$zguild'");	
						$nomem = mysql_result($numberofmem,"nomem");
				
						//SELECT GUILD CURRENTLY IN
						$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
						$setguild = mysql_result($thesetguild,"setguild");

							$newmem = $nomem + 1;
						mysql_query("UPDATE guild SET mem =\"$newmem\" WHERE gname='$z_gname'");
						
		   				mysql_query("UPDATE settlement SET setguild =\"$z_gname\" WHERE setid='$setid'");
						echo"<center>You have joined $z_gname!</center>";

						
						mysql_query("INSERT INTO setnews (date, news, setid) 
							VALUES	('$clock', '<font class=blue>Your settlement has joined <b>$z_gname</b>!</font>', '$setid') ");
						mysql_query("INSERT INTO guildnews (date, news, setid) 
							VALUES	('$clock', '<font class=blue>Settlement $setid has joined <b>$z_gname</b>!</font>', '$setid') ");

							if($setno1 < 1)
								{$setin = setno1;}
							if($setno2 < 1)
								{$setin = setno2;}
							if($setno3 < 1)
								{$setin = setno3;}
							if($setno4 < 1)
								{$setin = setno4;}
							if($setno5 < 1)
								{$setin = setno5;}

				
								mysql_query("UPDATE guild SET $setin =\"$setid\" WHERE gname='$z_gname'");
								mysql_query("UPDATE settlement SET gsetno =\"$setin\" WHERE setid='$setid'");
								include("include/S_SJG.php");die();	
					
						}
						else
							{
								echo"<div align=center>You have entered a wrong name or password.</div>";
								include("include/S_SJG.php");
								die();
							}
			}
	*/
?>

</TD>
</TR>
</TABLE>
</BODY>
</HTML>	