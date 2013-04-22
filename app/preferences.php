<? 
include("include/igtop-pref-del.php"); 

if(!IsSet($empnews))	{
	echo "<div align=center><a href=preferences.php?empnews=true>Delete Empire News</a>";
}
else	{	
	
	echo "<div align=center><font class=yellow>Your Empire News has been deleted</a><br>";
	mysql_query("DELETE FROM empnews WHERE yourid='$userid'");
	include("include/S_PREF.php");
	include("include/S_PD.php");
	die();
}

if(!IsSet($update))	{
}
else	{

	include("include/connect.php");
	include("include/S_SINFOS.php");
			
	$cnewemail = strtolower($newemail);
		
	$E_Result = mysql_query("SELECT email FROM user WHERE email='$cnewemail'");
	$New_Email = mysql_fetch_array($E_Result);

	$New_Email[0] = strtolower($New_Email[0]);

	if($New_Email[0] == $cnewemail AND $newemail != $email)	{
		echo"<div align=center><font class=yellow>This email is already in use.</font></div>";
		include("include/S_PREF.php");
		include("include/S_PD.php");
		die();
	}
	
	// update email
	$newemail = htmlspecialchars($newemail);
	mysql_query("UPDATE user SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	mysql_query("UPDATE buildings SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE military SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE research SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE return SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE explore SET email='$newemail' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	session_unregister('email');
	$email = $newemail;
	session_register('email');

	// update password
	$upw = htmlspecialchars($upw);
	$upw = md5($upw);
	mysql_query("UPDATE user SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	mysql_query("UPDATE buildings SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE military SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE research SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE return SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
 	mysql_query("UPDATE explore SET pw='$upw' WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	session_unregister('pw');
	$pw = $upw;
	session_register('pw');
			
	// update aim and msn
	mysql_query("UPDATE user SET aim='$newaim' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE user SET msn='$newmsn' WHERE email='$email' AND pw='$pw'");
		
	$pw = $upw;
	$email = $newemail;
	$msn = $newmsn;
	$aim = $newaim;

	echo"<div align=center><font class=yellow>Your settings have been updated.</font></div>";
	include("include/S_PREF.php");
	include("include/S_PD.php");
	die();
}

if(!IsSet($delete))	{
}
else	{

	$dpw = md5($dpw);
	if($dpw == "")	{
		echo"<div align=center><font class=yellow>In order to delete, you must specify a password.</font></div>";
		include("include/S_PREF.php");
		include("include/S_PD.php");
		die();
	}
	elseif($pw != $dpw)	{
		echo"<div align=center><font class=yellow>Incorrect password.</font><div>";
		include("include/S_PREF.php");
		include("include/S_PD.php");
		die();
	}
	else	{
	 	
		include("include/connect.php");
		
		mysql_query("INSERT INTO setnews (date, news, setid)	 VALUES	('$clock', '<font class=red>$ename has deleted their account</font>', '$setid') ");
	  
		// check who they are voting for
		$V_result = mysql_query("SELECT votefor FROM user WHERE userid='$empvalue'");
		$V_check = mysql_fetch_array($V_result);
		
		if($V_check[0] != None AND $V_check[0] != $empireattacked)	 {
			$Votedfor_emp = mysql_db_query($dbnam, "SELECT vote FROM user WHERE ename='$VF_emp'");
			$VF_emp = mysql_result($Votedfor_emp,"VF_emp");
				
			$newvote = $VF_emp - 1;
			mysql_query("UPDATE user SET vote='$newvote' WHERE ename='$empireattacked'");
			}

	  	echo "<div align=center><font class=yellow>Your account has been deleted.</font></div>";

		$subject = "Account deleted";
		$body = "Your account at Medieval Battles has been succesfully deleted.";

		$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$email","$subject","$body","$from");
		print("$mailsend");


		// check user
		$gresult = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner=$userid");
		$guildcheck = mysql_fetch_array($gresult);
		
		if($guildcheck[0] == $userid)	{
			//	select guild name
				$guild_info_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$ename'");
				$guild_info = mysql_fetch_array($guild_info_query);
		
			mysql_query("UPDATE user SET guild='None' WHERE guild='$guild_info[gname]'");
			mysql_query("DELETE FROM guildrequest WHERE gl_userid='$userid'");
				
			$tblname = "$GN" . "main" ."$GIDD";
			$tblname2 = "$GN" . "msgs" . "$GIDD";	

			mysql_query("DELETE FROM guild WHERE owner='$userid'");
			mysql_query("DROP TABLE $tblname");
			mysql_query("DROP TABLE $tblname2");
		}
	
		mysql_query("DELETE FROM user WHERE email='$email' AND pw='$pw'"); 
		mysql_query("DELETE FROM military WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM buildings WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM research WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM return WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM explore WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET votefor='None' WHERE votefor='$ename'");
		
		session_unregister('login');
		session_unregister('email');
		session_unregister('pw');

		header("Location: index.php");
		exit;
	}	 
}

include("include/S_PREF.php");

echo "<br><br>";
include("include/S_PD.php"); 
?>

</td>
</tr>
</table>
</body>
</html>

<?
ob_end_flush();
?>