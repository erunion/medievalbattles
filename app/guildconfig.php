<?

include("include/igtop.php");

// are they a guild leader?
	$guild_owner_result = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
	$guild_owner = mysql_fetch_array($guild_owner_result);
			
if($guild_owner[owner] != $userid)	{
	echo"<div align=center><font class=yellow>You have to be a Guild Leader to view this page!</font></div>";
	die();
}
else	{
	$guild_info = mysql_db_query($dbnam, "SELECT info FROM guild WHERE owner='$userid'");
		$ginfo = mysql_result($guild_info,"ginfo");
	$guild_notice = mysql_db_query($dbnam, "SELECT notice FROM guild WHERE owner='$userid'");
		$gnotice = mysql_result($guild_notice,"gnotice");
	$C_PW = mysql_db_query($dbnam, "SELECT cpw FROM guild WHERE owner='$userid'");
		$C_pass = mysql_result($C_PW,"C_pass");
}

################
##	accept/reject
################
include("include/guild_request.php");

if(!IsSet($accept))	{
}
else	{	

	include("include/connect.php");
	
	// retrieve necessary guild info
	$guild_info_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$userid'");
		$guild_info = mysql_fetch_array($guild_info_query);
	// get number of members
	$guild_members_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user WHERE guild='$guild_info[gname]'");
		$guild_members = mysql_fetch_array($guild_members_query);
	// get their empire name
	$applicant_ename_query = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid='$auserid'");
		$applicant_ename = mysql_fetch_array($applicant_ename_query);

	if($guild_members == 20)	{
		echo "<div align=center><font class=yellow>Your guild is full! You cannot allow any more members in!</font></div>";
		die();
	}

	mysql_query("UPDATE user SET guild='$guild_info[gname]' WHERE userid='$auserid'");
	mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=blue>You were accepted into $guild_info[gname].</font>', '$auserid') ");
	mysql_query("INSERT INTO guildnews (date, news, guildid) VALUES	('$clock', '<font class=blue>$empire_info[0] has joined the guild.</font>', '$guild_info[gid]') ");
	mysql_query("DELETE FROM guildrequests WHERE applicant='$auserid' AND gl_userid='$userid'");

	echo "<div align=center><font class=yellow><b>$applicant_ename[ename] has been accepted into the guild!</b></font></div>";
	die();
}

if(!IsSet($reject))	{
}
else	{	

	include("include/connect.php");
	// retrieve necessary guild info
	$guild_info_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$userid'");
		$guild_info = mysql_fetch_array($guild_info_query);
	// get their empire name
	$applicant_ename_query = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid='$auserid'");
		$applicant_ename = mysql_fetch_array($applicant_ename_query);
	
	mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=blue>You were rejected from $guild_info[gname].</font>', '$auserid') ");
	mysql_query("DELETE FROM guildrequests WHERE applicant='$auserid' AND gl_userid='$userid'");

	echo "<div align=center><font class=yellow><b>$applicant_ename[ename] has been rejected from the guild!</b></font></div>";
	die();
}

################
##	change info
################
if(!IsSet($change))	{
	include("include/S_GCONFIG.php");
}
else	{
	include("include/S_SINFOS.php");
	mysql_query("UPDATE guild SET info='$info' WHERE owner='$userid'");
	mysql_query("UPDATE guild SET notice='$notice' WHERE owner='$userid'");
	echo "<div align=center><font class=yellow>Guild Settings Updated!</font></div>";
	include("include/S_GCONFIG.php");
	include("include/S_GKICK.php");
	include("include/S_GDEL.php");
	die();
}

################
##	kick member
################
if(!IsSet($kick))	{
	include("include/S_GKICK.php");
}
else	{	

	// retrieve necessary guild info
	$guild_info_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$userid'");
		$guild_info = mysql_fetch_array($guild_info_query);
	// get their empire name
	$empire_info_query = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid='$remp'");
		$empire_info = mysql_fetch_array($empire_info_query);

	if($remp == ns)		{
		echo"<div align=center><font class=yellow>You didn't select anybody to remove!</font></div>";
		include("include/S_GKICK.php");
		include("include/S_GDEL.php");
		die();
	}
	elseif($remp == $userid)	{
		echo "<div align=center><font class=yellow>You can't remove yourself!</font></div>";
		include("include/S_GKICK.php");
		include("include/S_GDEL.php");
		die();
	}

	$new_mem = $guild_info[mem] - 1;
	
	mysql_query("UPDATE user SET guild='None' WHERE userid='$remp'");		// update their guild membership
	mysql_query("UPDATE guild SET mem='$new_mem' WHERE owner='$userid'");	// update number of members
	
	mysql_query("INSERT INTO empnews (date, news, yourid) VALUES	('$clock', '<font class=blue>You were removed from $guild_info[gname].</font>', '$remp') ");
	
	mysql_query("INSERT INTO guildnews (date, news, guildid) VALUES	('$clock', '<font class=blue>$empire_info[0] has been removed from the guild.</font>', '$guild_info[gid]') ");

	echo"<div align=center><font class=yellow>$empire_info[0] has been removed from your guild.</font></div>";
	include("include/S_GKICK.php");
	include("include/S_GDEL.php");
	die();
}

################
##	delete guild
################
if(!IsSet($deleteg))	{
	include("include/S_GDEL.php");
}
else	{
		
	if($C_pass == $cpw)	 {

		//	determine guild name
		$GuildName = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE owner='$userid'");
		$GN = mysql_result($GuildName,"GN");

		//	determine guild id
		$GuildID = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE owner='$userid'");
		$GIDD = mysql_result($GuildID,"GIDD");

		$tblname = "$GN" . "main" ."$GIDD";
		$tblname2 = "$GN" . "msgs" . "$GIDD";	

		mysql_query("UPDATE user SET guild='None' WHERE guild='$GN'");
		mysql_query("DELETE FROM guild WHERE owner='$userid'");
		mysql_query("DROP TABLE $tblname");
		mysql_query("DROP TABLE $tblname2");

			
		echo "<div align=center><font class=yellow>Your guild has been deleted.</font></div>";
		include("include/S_GDEL.php");
		die();
	}
	else	{
		echo "<div align=center><font class=yellow>You have entered an incorrect password.</font></div>"; 
		include("include/S_GDEL.php");
		die();
	}
}
?>
</td>
</tr>
</table>
</body>
</html>