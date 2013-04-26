<?
include("include/igtop.php");

if(!IsSet($sendmessage))	{
}
else	{

	if($umessage == "")	{
		echo "<div align=center><font class=yellow>You did not type anything to send.</font></div>";
		include("include/S_MESS.php"); 
		die();
	}
	else	{

		$guild_name = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE gid='$gid'");	
			$g_name = mysql_result($guild_name,"g_name");
		$owner_g = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE gid='$gid'");	
			$owner = mysql_result($owner_g,"owner");
		$THE_MNO = mysql_db_query($dbnam, "SELECT mno FROM user WHERE userid='$owner'");	
			$T_MNO = mysql_result($THE_MNO,"T_MNO");
		$yourmid = mysql_db_query($dbnam, "SELECT max(mid) FROM messages");	
			$ymid = mysql_result($yourmid,"ymid");

		$ymid = $ymid + 1;
		$thenum = $T_MNO + 1;
	  
		mysql_query("UPDATE user SET mno ='$thenum' WHERE userid='$owner'");

		$umessage = "<font class=red><b>Sent by Guild Center:</b></font>&nbsp;&nbsp;" . "$umessage";

		mysql_query("INSERT INTO messages (origin, datesent, yourid, message, mid)		VALUES	('$ename', '$clock', '$owner', '$umessage', '$ymid') ");
	
		echo "<div align=center><font class=yellow><b>Your message has been sent to the Guild Leader of $g_name.</b></font></div></center>";
		session_unregister('gid'); 
	}
}

if ($pageid == 'mgl')	{
	session_register('gid');
		$guild_name = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE gid='$gid'");	
			$g_name = mysql_result($guild_name,"g_name");
	echo "<div align=center><font class=yellow><b>You are messaging the Guild Leader of <u>$g_name</u>.</b></font></div>";
?>
	
<form type=post action=gc.php>
<table border="0" bordercolor="silver" width="80%"  align=center>
	<tr>
		<td align=center><textarea name="umessage" rows=15 cols=50 wrap></textarea>
</table>
<center><input type="submit" name="sendmessage" value="Send Message" class=button></center>
<input type="hidden" name="sendmessage" value="1">
<? 
	die();
}
session_unregister('gid');


if($request == 'yes')	{

	$guild_info_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE gname='$req_guild'");
		$guild_info = mysql_fetch_array($guild_info_query);
	$gl_check_query = mysql_db_query($dbnam, "SELECT * FROM guild WHERE owner='$userid'");
		$gl_check = mysql_fetch_array($gl_check_query);
	
	if($gl_check[owner] === $userid)	 {
		echo "<div align=center><font class=yellow><b>Guild Leaders cannot request to join other guilds!</b></font></div>";
		die();
	}
	else	{
		mysql_query("INSERT INTO guildrequests (applicant, gl_userid)		VALUES	('$userid', '$guild_info[owner]') ");
		echo "<div align=center><font class=yellow><b>Your request to join <u>$guild_info[gname]</u> has been sent.</b></font></div>";	
	}	
}

echo "  <br><br>
<table border=0 width=90% align=center cellpadding=5>
	<tr>
		<td class=main colspan=6><b class=reg>Current Guilds</b></td>
	<tr>
		<td class=main2 colspan=6><font class=yellow size=2px><b>Only 15 Empires Per Guild</b></font></td>
	<tr>
		<td class=main2><b class=reg>Flag</b></td>
		<td class=main2><b class=reg>Name</b></td>
		<td class=main2 width=40%><b class=reg>Info</b></td>
		<td class=main2 width=4%><b class=reg>Members</b></td>
		<td class=main2><b class=reg>Created</b></td>
		<td class=main2></td>";

$query_string = "SELECT g.gname, g.info, g.datemade, g.gid, g.flag, count(u.ename) AS guildmem FROM guild g LEFT JOIN user u ON g.gname = u.guild GROUP BY u.guild ORDER BY guildmem DESC LIMIT 0, 60";
$result_id = mysql_db_query($dbnam, $query_string);
while ($row = mysql_fetch_array($result_id))	{
	$row[0] = htmlspecialchars($row[0]);
	$row[1] = htmlspecialchars($row[1]);
	$urlencode_guild = urlencode($row[0]);

	echo "
	<tr align=center valign=top colspan=6>
		<td bgcolor=#404040><a href=\"$row[flag]\" target=newwindow><img src=\"$row[flag]\" width=50 height=50 border=0></a></td>
		<td bgcolor=#404040><a href=gc.php?pageid=mgl&gid=$row[3]>$row[0]</a></td>
		<td bgcolor=#404040>$row[1]</td>
		<td bgcolor=#404040>$row[5]</td>
		<td bgcolor=#404040>$row[2]</td>
		<td bgcolor=#404040><a href=gc.php?request=yes&req_guild=$urlencode_guild>Request<br>Mbrshp.</a></td>";
}
echo "</table><br><br>";

if($empireguild == "None")	{

if(!IsSet($create))	{
	include("include/S_GM.php");
}
else	{

	// parse whitespace out
		$creating_guild_name = trim($gname);
	// check to see if guild name is being used
		$result = mysql_db_query($dbnam, "SELECT gname FROM guild WHERE gname='$creating_guild_name'");
		$namecheck = mysql_fetch_array($result);
 	// check to see if they are a GL
		$check_owner_result = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$ename'");
		$check_owner = mysql_fetch_array($check_owner_result);
 			
	$GNAME_lower = strtolower($creating_guild_name);
	$SEL_G_lower = strtolower($namecheck[gname]);
	$gname_length = strlen($creating_guild_name);
	
	if($gname_length > 15)	{
		echo "<div align=center><font class=yellow>Your guild name can't be more than 15 characters!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($gname == "")	{
		echo "<div align=center><font class=yellow>A guild must have a name!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($gname == None)	{
		echo "<div align=center><font class=yellow>You cannot pick that name!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($empireguild != None)	{
		echo "<div align=center><font class=yellow>You can't make a guild when you are in a guild!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($check_owner[owner] == $userid)	{
		echo "<div align=center><font class=yellow>You are already a Guild Leader!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($GNAME_lower == $SEL_G_lower)	{
		echo "<div align=center><font class=yellow>That name has been taken!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($cpw != $ccpw)	 {
		echo "<div align=center><font class=yellow>Passwords don't match!</font></div>";
		include("include/S_GM.php");
		die();
	}
	elseif($cpw =="" OR $ccpw == "")	{
		echo "<div align=center><font class=yellow>You must have a deletion password!</font></div>";
		include("include/S_GM.php");
		die();
	}
	else	{
		
		//	select max guild id
		$M_gid = mysql_db_query($dbnam, "SELECT max(gid) FROM guild");	
			$mgid = mysql_result($M_gid, "mgid");	
		
		$info = htmlspecialchars($info);
		$creating_guild_name = htmlspecialchars($creating_guild_name);
		$gid = $mgid + 1;
		
		include("include/connect.php");
		mysql_query("INSERT INTO guild (gname, info, gid, datemade, cpw, owner)	 VALUES	('$creating_guild_name', '$info', '$gid', '$clock', '$cpw', '$userid') ");
		mysql_query("UPDATE user SET guild='$gname' WHERE email='$email' AND pw='$pw'");
		mysql_query("DELETE FROM guildrequests WHERE applicant='$userid'");
						
		echo"<div align=center><font class=yellow><b><u>$creating_guild_name</u> has been successfully created!</b></font></div>";
		include("include/S_GM.php");
		die();
	}
}
}	else	{
}
?>
</td>
</tr>
</table>
</body>
</html>