<?php
function callback($buffer) {

  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

/*
session_register('pw');
session_register('login');

if($pw == melvin)	 {

}
else	{
	header("Location: index.php");
	exit;
}
*/
?>

<?php
if($deletem)	{
	session_register('pw');
	session_register('login');

	include("include/connect.php");

	mysql_query("DELETE FROM messages"); 
	echo "<center>All of the messages have been deleted.<br><a href=gameconfig.php>Return</a></center>";
}
else	{	
?>

<form type="post" action="gameconfig.php">
<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0> 
	<tr>
		<td bgcolor=#404040 colspan=3><font color=#ffffff><b>You can delete all of the messages on the message table</b></font></td>
	<tr>
		<td><font color="#ffffff">DELETE all messages</font></td>
		<td><center><input type="submit" name="deletem" value="DELETE"></center></td>
</table>
</form>

<?php
}
if(!IsSet($deleten))
	{
?>
	
<br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can delete all of the news on the setnews tables</b></font></td>
		<tr>
			<td><font color="#ffffff">DELETE all news</font></td>
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

	include("include/connect.php");


			mysql_query("DELETE FROM setnews1"); 
			mysql_query("DELETE FROM setnews2");
			mysql_query("DELETE FROM setnews3"); 
			mysql_query("DELETE FROM setnews4");
			mysql_query("DELETE FROM setnews5"); 
			mysql_query("DELETE FROM setnews6");
			mysql_query("DELETE FROM setnews7"); 
			mysql_query("DELETE FROM setnews8");
			mysql_query("DELETE FROM setnews9"); 
			mysql_query("DELETE FROM setnews10");
			echo"<center>All settlement news have been deleted.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>
<br>



<?php
if(!IsSet($deletea))
	{
?>
	
<br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can delete all accounts</b></font></td>
		<tr>
			<td><font color="#ffffff">DELETE all accounts</font></td>
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
	include("include/connect.php");


			mysql_query("DELETE FROM buildings"); 
			mysql_query("DELETE FROM military");
			mysql_query("DELETE FROM return"); 
			mysql_query("DELETE FROM research");
			mysql_query("DELETE FROM explore"); 
			mysql_query("DELETE FROM user");
		
			echo"<center>All accounts have been deleted.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>


<br><br>



<?php
if(!IsSet($deleteg))
	{
?>
	
<br><br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can delete all of the guilds from the guild table</b></font></td>
		<tr>
			<td><font color="#ffffff">DELETE all guilds</font></td>
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
		include("include/connect.php");

			mysql_query("DELETE FROM guild"); 
			echo"<center>All guilds have been deleted.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>

<br>


<?php
if(!IsSet($deletef))
	{
?>
	
<br><br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can delete all fields from the forums</b></font></td>
		<tr>
			<td><font color="#ffffff">DELETE all forums</font></td>
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

include("include/connect.php");


			mysql_query("DELETE FROM setmain1"); 
			mysql_query("DELETE FROM setmsgs1");
			mysql_query("DELETE FROM setmain2"); 
			mysql_query("DELETE FROM setmsgs2");
			mysql_query("DELETE FROM setmain3"); 
			mysql_query("DELETE FROM setmsgs3");
			mysql_query("DELETE FROM setmain4"); 
			mysql_query("DELETE FROM setmsgs4");
			mysql_query("DELETE FROM setmain5"); 
			mysql_query("DELETE FROM setmsgs5");
			mysql_query("DELETE FROM setmain6"); 
			mysql_query("DELETE FROM setmsgs6");
			mysql_query("DELETE FROM setmain7"); 
			mysql_query("DELETE FROM setmsgs7");
			mysql_query("DELETE FROM setmain8"); 
			mysql_query("DELETE FROM setmsgs8");
			mysql_query("DELETE FROM setmain9"); 
			mysql_query("DELETE FROM setmsgs9");
			mysql_query("DELETE FROM setmain10"); 
			mysql_query("DELETE FROM setmsgs10");
			echo"<center>All forums have been deleted.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>

<br><br>


<?php
if(!IsSet($deletes))
	{
?>
	
<br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can change settlement table back to normal</b></font></td>
		<tr>
			<td><font color="#ffffff">RETURN all fields to normal</font></td>
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

		include("include/connect.php");


			mysql_query("UPDATE settlement SET setname = \"None\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET setpic = \"http://www.medievalbattles.com/setpic.gif\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET setguild = \"None\"") or die(mysql_error('Error'));

			mysql_query("UPDATE settlement SET setstrength = \"0\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET userid = \"0\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET fgold = \"0\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET firon = \"0\"") or die(mysql_error('Error'));
			mysql_query("UPDATE settlement SET nap = \"None\"") or die(mysql_error('Error'));
echo"<center>Settlement table has been restored to normal.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>




<?php
if(!IsSet($daccount))
	{
?>
	
<br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>Delete Account</b></font></td>
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
include("include/connect.php");

		//SELECTING SETID
			$empreset = mysql($dbnam, "SELECT setid FROM user WHERE ename='$empre'");
			$esetid = mysql_result($empreset,"esetid");
		//SELECTING EMAIL
			$theiremail = mysql($dbnam, "SELECT email FROM user WHERE ename='$empre'");
			$tmail = mysql_result($theiremail,"tmail");
		//UPDATE NEWS
			$settable = "setnews" . "$esetid";
		mysql_query("INSERT INTO $settable (date, news) 
			VALUES	('$clock', '<font class=red><b>$empre</b> has been deleted by an administrator</font>') ");			


			mysql_query("DELETE FROM buildings WHERE email='$tmail'"); 
			mysql_query("DELETE FROM military WHERE email='$tmail'");
			mysql_query("DELETE FROM return WHERE email='$tmail'"); 
			mysql_query("DELETE FROM research WHERE email='$tmail'");
			mysql_query("DELETE FROM explore WHERE email='$tmail'"); 
			mysql_query("DELETE FROM user WHERE email='$tmail'");

echo"<center>$empre has been deleted.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";die();
		}
?>


<?php
if(!IsSet($reseta))
	{
?>
	
<br>

<form type="post" action="gameconfig.php">
	<table border=1 bordercolor=#ffffff align=center bgcolor=#630000 cellpadding=0 cellspacing=0>
		<tr>
		  <td bgcolor=#404040 colspan=2><font color=#ffffff><b>You can reset all accounts</b></font></td>
		<tr>
			<td><font color="#ffffff">RESET all accounts</font></td>
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
include("include/connect.php");

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


			echo"<center>All accounts have been reset.<br>
				<a href=http://www.medievalbattles.com/gameconfig.php>Return</a></center>";
		}
?>

<br>
<br>
<br>
<?php

include("include/connect.php");
	$tablename = "user";

echo "
	<table border=1 align=center width=\"100%\">
	 <tr>
	  <td>Empire Name</td>
	  <td>Password</td>
	  <td>Email</td>
	  <td>AIM</td>
	  <td>MSN</td>
	  <td>Host Name</td>
";




		$query_string = "SELECT ename, pw, email, aim, msn, ip FROM user ORDER BY ip";
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
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>\n");
		    }

		echo "</table>"; 

?>

<?php

ob_end_flush();

?>	