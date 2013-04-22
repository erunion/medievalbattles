<?php
session_register('pw');
session_register('login');

if($pw == CHANGEME)
{
?>

<?php
// Display number of users currently online
include("../include/connect.php");
	$ONLINE_NO1 = mysql($dbnam, "SELECT count(online) FROM user WHERE online='1'");	
	$OLINE1 = mysql_result($ONLINE_NO1,"OLINE1");
	if($OLINE1 == "")
		{$OLINE1 = 0;}

echo"There are currently <b>$OLINE1</b> users online.";
?>


<?php
#######################
##  Delete Messages  ##
#######################
if(!IsSet($deletem))
	{
?>
<br>		
<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0> 
 <tr>
  <td colspan=2><b>You can delete all of the messages on the message table</b></td>
 <tr>
  <td>DELETE all messages</font></td>
  <td><center><input type="submit" name="deletem" value="DELETE"></center></td>
		<input type="hidden" name="deletem" value="1"></td>
</table>
</form>

<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("DELETE FROM messages"); 
echo"<center>All of the messages have been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>

<?php
##############################
##  Delete Settlement News  ##
##############################
if(!IsSet($deleten))
	{
?>
	
<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>You can delete all of the news on the setnews tables</b></td>
 <tr>
  <td>DELETE all news</td>
  <td><center><input type="submit" name="deleten" value="DELETE"></center></td>
		<input type="hidden" name="deleten" value="2"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("DELETE FROM setnews");

echo "<center>All settlement news have been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>

<?php
###########################
##  Delete All Accounts  ##
###########################
if(!IsSet($deletea))
	{
?>

<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>You can delete all accounts</b></td>
 <tr>
  <td>DELETE all accounts</td>
  <td><center><input type="submit" name="deletea" value="DELETE"></center></td>
		<input type="hidden" name="deletea" value="3"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("DELETE FROM buildings"); 
mysql_query("DELETE FROM military");
mysql_query("DELETE FROM return"); 
mysql_query("DELETE FROM research");
mysql_query("DELETE FROM explore"); 
mysql_query("DELETE FROM user");

echo "<center>All accounts have been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>


<?php
#####################
##  Delete Guilds  ##
#####################
if(!IsSet($deleteg))
	{
?>

<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>You can delete all of the guilds from the guild table</b></td>
 <tr>
  <td>DELETE all guilds</td>
  <td><center><input type="submit" name="deleteg" value="DELETE"></center></td>
		<input type="hidden" name="deleteg" value="4"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("DELETE FROM guild"); 

echo "<center>All guilds have been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>


<?php
################################
##  Delete Settlement Forums  ##
################################
if(!IsSet($deletef))
	{
?>
	
<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>You can delete all fields from the forums</b></td>
 <tr>
  <td>DELETE all forums</td>
  <td><center><input type="submit" name="deletef" value="DELETE"></center></td>
		<input type="hidden" name="deletef" value="5"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("DELETE FROM setforums"); 
mysql_query("DELETE FROM setforumsmsgs");

echo "<center>All forums have been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>


<?php
#############################
##  Reset Settlement Info  ##
#############################
if(!IsSet($deletes))
	{
?>
	
<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>You can change settlement table back to normal</b></td>
 <tr>
  <td>RETURN all fields to normal</td>
  <td><center><input type="submit" name="deletes" value="RETURN"></center></td>
		<input type="hidden" name="deletes" value="5"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

mysql_query("UPDATE settlement SET setname = \"None\"");
mysql_query("UPDATE settlement SET setpic = \"http://www.medievalbattles.com/setpic.gif\"");
mysql_query("UPDATE settlement SET setguild = \"None\"");
mysql_query("UPDATE settlement SET setstrength = \"0\"");
mysql_query("UPDATE settlement SET userid = \"0\"");
mysql_query("UPDATE settlement SET fgold = \"0\"");
mysql_query("UPDATE settlement SET firon = \"0\"");
mysql_query("UPDATE settlement SET nap = \"None\"");

echo "<center>Settlement table has been restored to normal.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>


<?php
#########################
##  Delete An Account  ##
#########################
if(!IsSet($daccount))
	{
?>
	
<form type="post" action="gameconfig.php">
<table border=1 align=center cellpadding=0 cellspacing=0>
 <tr>
  <td colspan=2><b>Delete Account</b></td>
 <tr>
  <td><input type="text" name="empre" maxlength="50"></td>
  <td><center><input type="submit" name="daccount" value="DELETE ACCOUNT"></center></td>
		<input type="hidden" name="daccount" value="6"></td>
</table>
</form>
<?php
	}
else
	{	
$hourdiff = "0"; 
$timeadjust = ($hourdiff * 60 * 60);
$clock = date(" d F h:i:s a",time() + $timeadjust);
$dbnam= "medievalbattles_com";

session_register('pw');
session_register('login');

include("../include/connect.php");

// Select SetID
	$empreset = mysql($dbnam, "SELECT setid FROM user WHERE ename='$empre'");
	$esetid = mysql_result($empreset,"esetid");
// Select Email
	$theiremail = mysql($dbnam, "SELECT email FROM user WHERE ename='$empre'");
	$tmail = mysql_result($theiremail,"tmail");
// Select Member Number
	$setmembers = mysql($dbnam, "SELECT members FROM settlement WHERE setid='$esetid'");
	$setmem = mysql_result($setmembers,"setmem");
// Subtract 1 Member
	$newmembers = $setmem - 1;


mysql_query("INSERT INTO setnews (date, news, setid) 
			VALUES	('$clock', '<font class=red><b>$empre</b> has been deleted by an administrator</font>', '$esetid') ");			
mysql_query("DELETE FROM buildings WHERE email='$tmail'"); 
mysql_query("DELETE FROM military WHERE email='$tmail'");
mysql_query("DELETE FROM return WHERE email='$tmail'"); 
mysql_query("DELETE FROM research WHERE email='$tmail'");
mysql_query("DELETE FROM explore WHERE email='$tmail'"); 
mysql_query("DELETE FROM user WHERE email='$tmail'");

echo "<center>$empre has been deleted.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";die();
	}
?>


<?php
######################
##  Reset Accounts  ##
######################
if(!IsSet($reseta))
	{
?>
	
<form type="post" action="gameconfig.php">
 <table border=1 align=center cellpadding=0 cellspacing=0>
  <tr>
   <td colspan=2><b>You can reset all accounts</b></td>
  <tr>
   <td>RESET all accounts</td>
   <td><center><input type="submit" name="reseta" value="RESET"></center></td>
		<input type="hidden" name="reseta" value="7"></td>
</table>
</form>
<?php
	}
else
	{	
session_register('pw');
session_register('login');

include("../include/connect.php");

// Reset User Table
mysql_query("UPDATE user SET gp = \"500000\"");
mysql_query("UPDATE user SET iron = \"10000\"");
mysql_query("UPDATE user SET exp = \"10000\"");
mysql_query("UPDATE user SET food = \"500\"");
mysql_query("UPDATE user SET land = \"300\"");
mysql_query("UPDATE user SET mts = \"200\"");
mysql_query("UPDATE user SET vote = \"0\"");
mysql_query("UPDATE user SET votefor = \"None\"");
mysql_query("UPDATE user SET sl = \"no\"");
mysql_query("UPDATE user SET exp2 = \"0\"");
mysql_query("UPDATE user SET fleets = \"4\"");
mysql_query("UPDATE user SET rectime = \"0\"");
mysql_query("UPDATE user SET mno = \"0\"");

// Reset Buildings Table
mysql_query("UPDATE buildings SET home = \"50\"");
mysql_query("UPDATE buildings SET barrack = \"75\"");
mysql_query("UPDATE buildings SET farm = \"50\"");
mysql_query("UPDATE buildings SET lab = \"75\"");
mysql_query("UPDATE buildings SET gm = \"50\"");
mysql_query("UPDATE buildings SET im = \"50\"");
mysql_query("UPDATE buildings SET aland = \"50\"");
mysql_query("UPDATE buildings SET amts = \"100\"");
mysql_query("UPDATE buildings SET dhome = \"0\"");
mysql_query("UPDATE buildings SET dbarrack = \"0\"");
mysql_query("UPDATE buildings SET dfarm = \"0\"");
mysql_query("UPDATE buildings SET dlab = \"0\"");
mysql_query("UPDATE buildings SET dgm = \"0\"");
mysql_query("UPDATE buildings SET dim = \"0\"");
mysql_query("UPDATE buildings SET Hhrs = \"0\"");
mysql_query("UPDATE buildings SET Bhrs = \"0\"");
mysql_query("UPDATE buildings SET Lhrs = \"0\"");
mysql_query("UPDATE buildings SET Fhrs = \"0\"");
mysql_query("UPDATE buildings SET Ghrs = \"0\"");
mysql_query("UPDATE buildings SET Ihrs = \"0\"");

// Reset Military Table
mysql_query("UPDATE military SET civ = \"5000\"");
mysql_query("UPDATE military SET recruits = \"250\"");
mysql_query("UPDATE military SET wizards = \"10\"");
mysql_query("UPDATE military SET warriors = \"10\"");
mysql_query("UPDATE military SET priests = \"10\"");
mysql_query("UPDATE military SET scientists = \"0\"");
mysql_query("UPDATE military SET thieves = \"0\"");
mysql_query("UPDATE military SET explorers = \"0\"");
mysql_query("UPDATE military SET maxciv = \"350\"");
mysql_query("UPDATE military SET ssword = \"0\"");
mysql_query("UPDATE military SET lsword = \"0\"");
mysql_query("UPDATE military SET axe = \"0\"");
mysql_query("UPDATE military SET gaxe = \"0\"");
mysql_query("UPDATE military SET club = \"0\"");
mysql_query("UPDATE military SET cweapon = \"Dagger\"");
mysql_query("UPDATE military SET cspell = \"Magic Missile\"");
mysql_query("UPDATE military SET cstaff = \"Quarter Staff\"");
mysql_query("UPDATE military SET icesword = \"0\"");
mysql_query("UPDATE military SET wararmor = \"Studded Leather\"");
mysql_query("UPDATE military SET wizarmor = \"Robe\"");
mysql_query("UPDATE military SET priarmor = \"Leather\"");
mysql_query("UPDATE military SET cs = \"0\"");
mysql_query("UPDATE military SET cm = \"0\"");
mysql_query("UPDATE military SET bp = \"0\"");
mysql_query("UPDATE military SET fp = \"0\"");
mysql_query("UPDATE military SET fullp = \"0\"");
mysql_query("UPDATE military SET sm = \"0\"");
mysql_query("UPDATE military SET warspeedw = \"0\"");
mysql_query("UPDATE military SET wizspeeds = \"0\"");
mysql_query("UPDATE military SET prispeedw = \"0\"");
mysql_query("UPDATE military SET warpower = \"3\"");
mysql_query("UPDATE military SET wizpower = \"2\"");
mysql_query("UPDATE military SET pripower = \"2\"");
mysql_query("UPDATE military SET priout = \"0\"");
mysql_query("UPDATE military SET warspeeda = \"0\"");
mysql_query("UPDATE military SET wizspeeda = \"0\"");
mysql_query("UPDATE military SET prispeeda = \"0\"");
mysql_query("UPDATE military SET wardef = \"6\"");
mysql_query("UPDATE military SET wizdef = \"10\"");
mysql_query("UPDATE military SET prideef = \"8\"");
mysql_query("UPDATE military SET dbwar = \"0\"");
mysql_query("UPDATE military SET dbwiz = \"0\"");
mysql_query("UPDATE military SET dbpri = \"0\"");
mysql_query("UPDATE military SET dbwar2 = \"0\"");
mysql_query("UPDATE military SET dbwiz2 = \"0\"");
mysql_query("UPDATE military SET dbpri2 = \"0\"");
mysql_query("UPDATE military SET dbscientist = \"0\"");
mysql_query("UPDATE military SET dbexplorer = \"0\"");
mysql_query("UPDATE military SET dbthief = \"0\"");

// Reset Return Table
mysql_query("UPDATE return SET war1 = \"0\"");
mysql_query("UPDATE return SET war2 = \"0\"");
mysql_query("UPDATE return SET war3 = \"0\"");
mysql_query("UPDATE return SET war4 = \"0\"");
mysql_query("UPDATE return SET wiz1 = \"0\"");
mysql_query("UPDATE return SET wiz2 = \"0\"");
mysql_query("UPDATE return SET wiz3 = \"0\"");
mysql_query("UPDATE return SET wiz4 = \"0\"");
mysql_query("UPDATE return SET pri1 = \"0\"");
mysql_query("UPDATE return SET pri2 = \"0\"");
mysql_query("UPDATE return SET pri3 = \"0\"");
mysql_query("UPDATE return SET pri4 = \"0\"");
mysql_query("UPDATE return SET time1 = \"0\"");
mysql_query("UPDATE return SET time2 = \"0\"");
mysql_query("UPDATE return SET time3 = \"0\"");
mysql_query("UPDATE return SET time4 = \"0\"");

// Reset Research Table
mysql_query("UPDATE research SET r1 = \"0\"");
mysql_query("UPDATE research SET r2 = \"0\"");
mysql_query("UPDATE research SET r3 = \"0\"");
mysql_query("UPDATE research SET r4 = \"0\"");
mysql_query("UPDATE research SET r5 = \"0\"");
mysql_query("UPDATE research SET r1pts = \"0\"");
mysql_query("UPDATE research SET r2pts = \"0\"");
mysql_query("UPDATE research SET r3pts = \"0\"");
mysql_query("UPDATE research SET r4pts = \"0\"");
mysql_query("UPDATE research SET r5pts = \"0\"");

// Reset Explore Table
mysql_query("UPDATE explore SET expland = \"0\"");
mysql_query("UPDATE explore SET expmt = \"0\"");
mysql_query("UPDATE explore SET landhrs = \"0\"");
mysql_query("UPDATE explore SET mthrs= \"0\"");

echo "<center>All accounts have been reset.<br>
<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
	}
?>


<?php
###########################################
##  Multi Tracking System: Email and Pw  ##
###########################################

include("../include/connect.php");
$tablename = "user";

echo "
	<table border=1 align=center>
	 <tr>
	  <td><b>Email</b></td>
	  <td><b>Password</b></td>
";
$query_string = "SELECT email, pw FROM user";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
	print("<TR ALIGN=center VALIGN=TOP colspan=7>
		<td>$row[0]</td>
		<td>$row[1]</td>\n");
    }
echo "</table>"; 
?>


<?php
#################################################
##  Multi Tracking System: Ename and Hostname  ##
#################################################

include("../include/connect.php");
$tablename = "user";

echo "
	<table border=1 align=center>
	 <tr>
	  <td><b>Empire Name</b></td>
	  <td><b>Host Name</b></td>
";
$query_string = "SELECT ename, ip FROM user";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
		$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE ename='$row[0]'");	
		$OLINE = mysql_result($ONLINE_NO,"OLINE");

		if($OLINE == 1)
			{$O_line = "<font color=red>*</font>";}
		else{$O_line = "";}

    print("<TR ALIGN=center VALIGN=TOP colspan=7>
		<td>$row[0] $O_line</td>
		<td>$row[1]</td>\n");
    }
echo "</table>"; 
?>


<?php
#################################################
##  Multi Tracking System: Ename, Aim and Msn  ##
#################################################

include("../include/connect.php");
$tablename = "user";

echo "
	<table border=1 align=center>
	 <tr>
	  <td><b>Empire Name</b></td>
	  <td><b>Aim</b></td>
	  <td><b>Msn</b></td>
";
$query_string = "SELECT ename, aim, msn FROM user";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
		$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE ename='$row[0]'");	
		$OLINE = mysql_result($ONLINE_NO,"OLINE");

		if($OLINE == 1)
			{$O_line = "<font color=red>*</font>";}
		else{$O_line = "";}

    print("<TR ALIGN=center VALIGN=TOP colspan=7>
		<td>$row[0] $O_line</td>
		<td>$row[1]</td>
		<td>$row[2]</td>\n");
    }
echo "</table>"; 
?>


<?php
	}
else
	{
header("Location: index.php");
exit;
	}
?>