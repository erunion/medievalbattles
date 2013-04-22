<?php
		include("include/igtop.php");
	?>


 <!-- BODY OF PAGE BEGINS HERE -->
 <br><br>
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
						$dbnam = "medievalbattles_com";
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
	  		echo"<div align=center><font class=yellow>Your guild info has been updated.</font></div>";include("include/S_GCONFIG.php");include("include/S_GDEL.php");
			die();
		}
	elseif($oepw == "" OR $nepw =="")
		{
			echo"<div align=center><font class=yellow>You must specify all password fields to change your password.</font></div>";include("include/S_GCONFIG.php");include("include/S_GDEL.php");
			die();
		}
	elseif($ooepw == $oepw) 
		{
			include("include/S_SINFOS.php");
			mysql_query("UPDATE guild SET info =\"$info\" WHERE owner=\"$ename\"");
			mysql_query("UPDATE guild SET epw =\"$nepw\" WHERE owner=\"$ename\"");
			echo"<div align=center><font class=yellow>Your entry password has been changed and your info has been updated for your guild.</font></div>";include("include/S_GCONFIG.php");include("include/S_GDEL.php");
			die();
		}
	elseif($ooepw != $oepw)
		{echo"<div align=center><font class=yellow>You have entered in a wrong password for your old entry password.</font></div>";include("include/S_GCONFIG.php");include("include/S_GDEL.php");
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