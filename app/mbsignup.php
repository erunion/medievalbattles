<? include ("include/top.php"); ?>
		
		    <center><b>Sign Up</b></center>
			<hr class=main>
			<!-- BODY STARTS -->

		<table border=0 width=400 align=center>
	 <tr>
<?php
if(!IsSet($signup))
{
  ?>
	  <form type="post" action="mbsignup.php">
      <td><b class=other>Email Address:</b></td>
	  <td><input type="text" name="email"></td>
	 <tr>
	  <td><b class=other>Confirm Email:</b></td>
	  <td><input type="text" name="cemail"></td>
	 <tr>
	  <td><b class=other>Password:</b></td>
	  <td><input type="password" name="pw" maxlength="15"></td>
	 <tr>
	  <td><b class=other>Confirm Password:</b></td>
	  <td><input type="password" name="cpw" maxlength="15"></td>
	 <tr>	
	  <td><b class=other>Empire Name:</b></td>
	  <td><input type="text" name="ename" maxlength="15"></td>
	 <tr>
	  <td><b class=other>Class:</b></td>
	  <td><select name="class">
	    <option selected value="0">-Choose your Class-</option>
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
		@mysql_connect (localhost, ziccarelli, pa724);
		   mysql_select_db (medievalbattles_com);
			$dbnam = "medievalbattles_com";

		$numberplayers = mysql($dbnam, "SELECT count(userid) FROM user");
		$noplayers = mysql_result($numberplayers,"noplayers");

	// emails
	if($noplayers >= 50)
	{echo"You cannot signup, the game is full at the moment, try again later.";die();
	}
	elseif (($email == "") and ($cemail == ""))
	{print("You didnt enter in an email!");die();}
	
	else
	 print("");

	echo "<br>";

	if (($email === $cemail) and ($email != "") and ($cemail != ""))
	 print("");
	else 
	{print("Emails are incorrect");die();}

	echo "<br>";

	//passwords
	if (($pw == "") and ($cpw == ""))
	{print("You didn't enter in any password!");die();}
	else
	 print("");

	echo "<br>";

	if (($pw === $cpw) and ($pw != "") and ($cpw != ""))
	 print("");
	else 
	{ print("Passwords are incorrect");die();}

	echo "<br>";

	// emails and passwords
	if (($email === $cemail) and ($pw === $cpw) and ($email != "") and ($cemail != "") and ($pw != "") and ($cpw != ""))
	 print ("Thank you for signing up for Medieval Battles.  ");
	else
	{print (" ");die();}

		
		
	
	
	// seed with microseconds
	function make_seed() 
{
    list($usec, $sec) = explode(' ', microtime(1,10));
    return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$snum = rand(1,10);

	       @mysql_connect (localhost, ziccarelli, pa724);
		   mysql_select_db (medievalbattles_com);

		$dbnam = "medievalbattles_com";
		$buildingsuserid = mysql($dbnam, "SELECT max(userid) FROM user");
		$buserid = mysql_result($buildingsuserid,"buserid");
		$newbuserid = $buserid + 1;


	if (($email === $cemail) and ($pw === $cpw) and ($email != "") and ($cemail != "") and ($pw != "") and ($cpw != ""))
     @mysql_connect (localhost, ziccarelli, pa724);
	 mysql_select_db (medievalbattles_com);
	 mysql_query ("INSERT INTO user (email,  pw, ename, msn, aim, gp, iron, exp, food, land, mts, setid, class) 
                VALUES ('$email', '$pw','$ename', '$msn', '$aim', '500000', '10000', '10000', '500','300', '200', '$snum', '$class')
             ");
		mysql_query("INSERT INTO buildings (email, pw, home, barrack, farm, lab, gm, im, aland, amts, userid) 
			VALUES	('$email', '$pw', '50', '75', '50', '75', '50', '50', '50', '100','$newbuserid') ");
		
		mysql_query("INSERT INTO military (email, pw, civ, recruits, warriors, maxciv, ssword, userid) 
			VALUES	('$email', '$pw', '5000', '250', '0', '350', '0', '$newbuserid') ");
		mysql_query("INSERT INTO research (email, pw) 
			VALUES	('$email', '$pw') ");
		mysql_query("INSERT INTO explore (email, pw) 
			VALUES	('$email', '$pw') ");
		
	$selectempire = mysql($dbnam, "SELECT setid FROM user WHERE email = '$email' AND pw = '$pw'");	
	$semp = mysql_result($selectempire,"semp");
		
		$settable = "setnews" . "$semp";
							
							$hourdiff = "0"; 
							$timeadjust = ($hourdiff * 60 * 60);
							$clock = date(" d F h:i:s a",time() + $timeadjust);

		mysql_query("INSERT INTO $settable (date, news) 
			VALUES	('$clock', '$ename has joined the settlement') ");
	mysql_query("INSERT INTO return (email, pw) 
			VALUES	('$email', '$pw') ");


echo"You are in settlement $semp.  Your login information has been emailed to you.";		

}


?>

			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>		
	