<? include ("include/top.php"); ?>
	
<? 	//echo"<center><font class=3>Signups are disabled.</center>"; echo"<hr class=main>"; include ("include/bottom.php"); die(); ?>
		    <center><b>Sign Up</b></center>
			<hr class=main>
			<!-- BODY STARTS -->
 <center><b class=2>* is a required field</b></center><br>
		<table border=0 width=400 align=center>
	 <tr>
<?php
if(!IsSet($signup))
{
  ?>
	  <form type="post" action="signup.php">
      <td><b class=2>*</b><b class=other>Email Address:</b></td>
	  <td><input type="text" name="email"></td>
	 <tr>
	  <td><b class=2>*</b><b class=other>Confirm Email:</b></td>
	  <td><input type="text" name="cemail"></td>
	 <tr>
	  <td><b class=2>*</b><b class=other>Password:</b></td>
	  <td><input type="password" name="pw" maxlength="15"></td>
	 <tr>
	  <td><b class=2>*</b><b class=other>Confirm Password:</b></td>
	  <td><input type="password" name="cpw" maxlength="15"></td>
	 <tr>	
	  <td><b class=2>*</b><b class=other>Empire Name:</b></td>
	  <td><input type="text" name="ename" maxlength="25"></td>
	 <tr>
	  <td><b class=2>*</b><b class=other>Class:</b></td>
	  <td><select name="class">
	    <option selected value="ns">-Choose your Class-</option>
		<option value="Fighter">Fighter</option>
		<option value="Cleric">Cleric</option>
		<option value="Mage">Mage</option>
		</select></td>
	 
	 <tr>
	  <td><b class=other>MSN:</b></td>
	  <td><input type="text" name="msn" maxlength="50"></td>
	 <tr>
	  <td><b class=other>AIM:</b></td>
	  <td><input type="text" name="aim" maxlength="20"></td>
	  <td><input type="hidden" name="signup" value="1"></td> 
	 <tr>
	  <td colspan=2><br><br>
	     <center>
		 <input class=button type=submit value="Sign-Up">
		 <input class=button type="reset" value="Reset">
		 </center></td>
		 </table>
<?php
}
else
{	

	
		
		include("include/connect.php");

		$numberplayers = mysql($dbnam, "SELECT count(userid) FROM user");
		$noplayers = mysql_result($numberplayers,"noplayers");

	

	// check email
		$emquery = ("SELECT email FROM user WHERE email='$email'");
		$emresult = mysql_query($emquery);
		$emnamecheck = mysql_fetch_array($emresult);

	// check ename
		$equery = ("SELECT ename FROM user WHERE ename='$ename'");
		$eresult = mysql_query($equery);
		$enamecheck = mysql_fetch_array($eresult);

		$ename1 = strtolower($ename);
		$enamecheck1 = strtolower($enamecheck[0]);

		$email1 = strtolower($email);
		$emnamecheck1 = strtolower($emnamecheck[0]);

	if($enamecheck1 == $ename1 AND $ename != "") 
		{echo"<td><center>$ename is in use.</center>"; echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();
		}
	elseif($emnamecheck1 == $email1 AND $email != "") 
		{echo"<td><center>$email is being used by another player as an email.</center>"; echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();
		}
			
	



	if($class == ns)
		{echo"<td><center>You must select a class.</center>";echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}
	
	if($noplayers >= 200)
	{echo"<td><center>You cannot signup, the game is full at the moment, try again later.</center>";echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}
	
	elseif (($email == "") and ($cemail == ""))
	{print("<td><center>You didnt enter in an email!</center>");echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}

	elseif ($email != $cemail)
	{print("<td><center>Emails are incorrect!</center>");echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}
	
	elseif (($pw == "") and ($cpw == ""))
	{print("<td><center>You didn't enter in any password!</center>");echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}
	
	elseif ($pw != $cpw)
		{ print("<td><center>Passwords are incorrect</center>");echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}
 

	include("include/connect.php");
	
	$Sett_least = mysql($dbnam, "SELECT min(members) FROM settlement");
	$least_set = mysql_result($Sett_least,"least_set");
		
	$Sel_members = mysql($dbnam, "SELECT setid FROM settlement WHERE members ='$least_set'");
	$sel_mem = mysql_result($Sel_members,"sel_mem");

	$new_mem = $least_set + 1;
	mysql_query("UPDATE settlement SET members =\"$new_mem\" WHERE setid='$sel_mem'");
	
	$snum = $sel_mem;

	
		
		
		$buildingsuserid = mysql($dbnam, "SELECT max(userid) FROM user");
		$buserid = mysql_result($buildingsuserid,"buserid");
		$newbuserid = $buserid + 1;


	if (($email === $cemail) and ($pw === $cpw) and ($email != "") and ($cemail != "") and ($pw != "") and ($cpw != ""))
    include("include/connect.php");
	
	$part1 = rand(250, 350);
	$part2 = rand(000, 999);

	$gp = "$part1" . "$part2";
	$iron = rand(4000, 6000);
	$civ = rand(1000, 1250);
	$recruits = rand(150, 250);
	$war = rand(1,5);
	$wiz = rand(1,5);
	$pri = rand(1,5);
	$maxciv = rand(100,250);

	if($class == "Cleric")
	{
		$part1 = rand(350, 450);
		$part2 = rand(000, 999);

		$gp = "$part1" . "$part2";
		$iron = rand(6000, 7500);
		$civ = rand(1200, 1400);
		$recruits = rand(200, 300);
		$war = rand(4,10);
		$wiz = rand(4,10);
		$pri = rand(4,10);
		$maxciv = rand(250,350);
	}



	    mysql_query ("INSERT INTO user (email,  pw, ename, msn, aim, gp, iron, exp, food, land, mts, setid, class, userid) 
                VALUES ('$email', '$pw','$ename', '$msn', '$aim', '$gp', '$iron', '10000', '500','250', '200', '$snum', '$class', '$newbuserid')
             ");
		mysql_query("INSERT INTO buildings (email, pw, home, barrack, farm, wp, gm, im, aland, amts, userid) 
			VALUES	('$email', '$pw', '50', '50', '50', '0', '50', '50', '100', '100','$newbuserid') ");
		
		mysql_query("INSERT INTO military (email, pw, civ, recruits, warriors, wizards, priests, maxciv, userid, warpower, warspeedw, cweapon, wizpower, wizspeeds, cspell, pripower, prispeedw, cstaff, cbow, archspeedw, archpower, wararmor, wizarmor, priarmor, wardef, wizdef, pridef, warspeeda, wizspeeda, prispeeda) 
			VALUES	('$email', '$pw', '$civ', '$recruits', '$war', '$wiz', '$pri', '$maxciv', '$newbuserid', '3', '6','Dagger', '4', '7', \"Magic Missile\", '2', '6', \"Quarterstaff\", 'None', '0', '0', \"Studded Leather\", 'Robe', 'Leather', '1', '1', '2', '0', '0', '1') ");
		mysql_query("INSERT INTO research (email, pw, userid) 
			VALUES	('$email', '$pw', '$newbuserid') ");
		mysql_query("INSERT INTO explore (email, pw, userid) 
			VALUES	('$email', '$pw', '$newbuserid') ");
	
	$selectempire = mysql($dbnam, "SELECT setid FROM user WHERE email = '$email' AND pw = '$pw'");	
	$semp = mysql_result($selectempire,"semp");
		
		include("include/clock.php");




		mysql_query("INSERT INTO setnews (date, news, setid) 
			VALUES	('$clock', \"<font class=red>$ename has joined the settlement</font>\", '$snum') ");
	mysql_query("INSERT INTO return (email, pw, userid) 
			VALUES	('$email', '$pw', '$newbuserid') ");


echo"<td><center><b class=3>Thank you for signing up for Medieval Battles.  You are in settlement $snum.  <br>Your login information has been emailed to you.<br><br><a href=\"http://www.medievalbattles.com/login.php\">You can login now here</a></center>";	
/*
$subject = "Welcome to Medieval Battles";
$body = "
Thank you for being apart of the new online game, Medieval Battles.
Your empire name is $ename
Your email is $email
You will need your email and password to login to your account.

If you have any questions you can email us at support@medievalbattles.com";

$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
$mailsend = mail("$email","$subject","$body","$from");
print("$mailsend");
*/	



echo"</td></table><hr class=main>"; include ("include/bottom.php"); ;die();}


?>

			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>

	
		
	