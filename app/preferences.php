<?php
		include("include/igtop-pref-del.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
 <br><br><br>
 
<?php
if(!IsSet($upemail))
{
  ?> 
	
<? include("include/S_PE.php"); ?>


<?php
}
else
{

	if($newemail == "")
		{echo"<div align=center><font class=yellow>You did not enter in a new email.</font></div>";include("include/S_PE.php");include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");die();
		}
	elseif($newemail == "*")
		{echo"<div align=center><font class=yellow>You cannot have that has your email.</font></div>";include("include/S_PE.php");include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");die();
		}
		else
		{

		$newemail = htmlspecialchars($newemail);
	
		 include("include/connect.php");
   		mysql_query("UPDATE user SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
		mysql_query("UPDATE buildings SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 		mysql_query("UPDATE military SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 		mysql_query("UPDATE research SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 		mysql_query("UPDATE return SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 		mysql_query("UPDATE explore SET email = \"$newemail\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	

			session_unregister('email');
			$email = $newemail;
			  session_register('email');
		
		echo"<div align=center><font class=yellow>Your email has been changed to $newemail.</font></div>";
		include("include/S_PE.php");include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");
		die();
		
	}
}
?>

<?php
if(!IsSet($update))
{
  ?> 	
			
			<? include("include/S_PPW.php"); ?>


<?php
}
else
{


	if($upw == "")
		{echo"<div align=center><font class=yellow>You did not enter in a new password.</font><div>";include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");die();
		}
	elseif($upw == "*")
		{echo"<div align=center><font class=yellow>You cannot choose that as your password.</font></div>";include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");die();
		}
		else
			{
			
			$upw = htmlspecialchars($upw);
	 		include("include/connect.php");
			mysql_query("UPDATE user SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
			mysql_query("UPDATE buildings SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 			mysql_query("UPDATE military SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 			mysql_query("UPDATE research SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 			mysql_query("UPDATE return SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 			mysql_query("UPDATE explore SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	
			session_unregister('pw');
			$pw = $upw;
			   session_register('pw');

			echo"<div align=center><font class=yellow>Your password has been changed to $upw.</font></div>";
			include("include/S_PPW.php");include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");
			die();
	  
	}	 
 }


?>



<?php
if(!IsSet($delete))
{
  ?> 
	
			<? include("include/S_PD.php"); ?>

<?php
}
else
{
	if($pw != $dpw)
	{echo"<div align=center><font class=yellow>That is not your password.</font><div>";include("include/S_PD.php");include("include/S_PAIM.php");include("include/S_PMSN.php");die();
	}
	else
		{
	 		include("include/connect.php");
		
			$no_members = mysql($dbnam, "SELECT members FROM settlement WHERE setid ='$setid'");
			$mem_no = mysql_result($no_members,"mem_no");

			$newmem = $mem_no - 1;
			mysql_query("UPDATE settlement SET members = \"$newmem\" WHERE setid='$setid'");

			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', '<font class=red>$ename has deleted their account</font>', '$setid') ");
	  
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


	  	echo"<div align=center><font class=yellow>Your account has been deleted.</font></div>";

		$subject = "Account deleted";
		$body = "Your account at Medieval Battles has been succesfully deleted.";

		$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$email","$subject","$body","$from");
		print("$mailsend");


			// check user
				$gquery = ("SELECT owner FROM guild WHERE owner=\"$ename\"");
				$gresult = mysql_query($gquery);
				$guildcheck = mysql_fetch_array($gresult);
 if($guildcheck[0] == $ename) 
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

						mysql_query("DELETE FROM guild WHERE owner=\"$ename\"");
						mysql_query("DROP TABLE $tblname");
						mysql_query("DROP TABLE $tblname2");
			
	
	}
	
		mysql_query("DELETE FROM user WHERE email='$email' AND pw='$pw'"); 
		mysql_query("DELETE FROM military WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM buildings WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM research WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM return WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM explore WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET votefor = \"None\" WHERE votefor=\"$ename\"");
		

		session_unregister('login');
		session_unregister('email');
		session_unregister('pw');


		header("Location: index.php");
		exit;


}	 
 }


?>
<?php
if(!IsSet($updateaim))
{
  ?> 
	

			<? include("include/S_PAIM.php"); ?>
				

<?php
}
else
{

if($newaim == "*")
	{echo"<div align=center><font class=yellow>You cannot use that as your aim.</font></div>";include("include/S_PAIM.php");include("include/S_PMSN.php");die();
	}
	else
		{
		include("include/S_SINFOS.php");
		mysql_query("UPDATE user SET aim = \"$newaim\" WHERE email='$email' AND pw='$pw'");
	

		echo"<div align=center><font class=yellow>Your AIM screen name has been changed to $newaim.</font></div>";
		include("include/S_PAIM.php");include("include/S_PMSN.php");
		die();
	
		}
	 }
?>

<?php
if(!IsSet($updatemsn))
{
  ?> 


			<? include("include/S_PMSN.php"); ?>
				

<?php
}
else
{
		if($newmsn == "*")
			{echo"<div align=center><font class=yellow>You cannot use that as your MSN.</font></div>"; include("include/S_PMSN.php");die();
			}
			else
				{

				include("include/S_SINFOS.php");
				mysql_query("UPDATE user SET msn = \"$newmsn\" WHERE email='$email' AND pw='$pw'");
				echo"<div align=center><font class=yellow>Your MSN screename has been changed to $newmsn.</font></div>"; 
				include("include/S_PMSN.php");
				die();

				}
	 
 }
?>

</table><!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
<?php



ob_end_flush();



?>