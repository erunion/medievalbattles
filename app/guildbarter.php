<? 
include("include/igtop.php");

if($barter_clock > 1)	 {
	echo "<font class=yellow><div align=center><b>You can barter items when your empires age is over 1 week!<br>You have $barter_clock tick(s) left!</b></div></font>";
	die();
}

echo "<center> <b class=reg> | <a href=barter.php> -Game- </a> | <a href=guildbarter.php> -Guild- </a> | </b></center><br>";	

if($empireguild == None)	{
	echo "<div align=center><font class=yellow><b>You must be the member of a guild to use this barter!</b></font></div>";
	die();
}

if(!IsSet($barter))	{
	 include("include/guild_barter.php");
}
else	{
	include("include/nexplode.php");

	$query = "SELECT barterid FROM barter WHERE barterid='$bid'";
	$result = mysql_query($query); 
	$barterid_check = mysql_fetch_array($result);

	if($barterid_check[0] != $bid)	 {
		echo"<font class=yellow><div align=center>There is no such barter.</font></div>";
		include("include/guild_barter.php");
		die();
	}

	$barter_query = mysql_query("SELECT * FROM barter WHERE barterid='$bid'");
	$barter = mysql_fetch_array($barter_query);
		$b_cost = $barter[cost];
		$b_type = $barter[type];
		$b_meth = $barter[method];
		$b_amount = $barter[amount];
		$b_seller = $barter[seller];
		$b_userid = $barter[userid];
		$b_guild = $barter[guild];

	$barter_user_query = mysql_query("SELECT * FROM user WHERE userid='$b_userid'");
	$barter_user = mysql_fetch_array($barter_user_query);
		$tsetid = $barter_user[setid];
		$barts_gp = $barter_user[gp];
		$barts_iron = $barter_user[iron];
		$b_nno = $barter_user[nno];
		$b_ip = $barter_user[ip];

					
	if($b_userid == $userid)	 {	echo"<font class=yellow><div align=center>You can't buy your own barter items!</font></div><br><br>";	die();	 }
	elseif($b_guild != $empireguild)	 {	echo"<font class=yellow><div align=center>They are not in your guild!</font></div><br><br>";	 die();	}
	elseif($gp < $b_cost AND $b_meth == gp)	{	echo"<font class=yellow><div align=center>Not enough gold!</font></div><br><br>";	die();	 }
	elseif($iron < $b_cost AND $b_meth == iron)	 {	echo"<font class=yellow><div align=center>Not enough iron!</font></div><br><br>";	die();	 }
	elseif($race == Giant AND $b_type == Wizard)	{	echo"<font class=yellow><div align=center>Giants can't possess Wizards!</font></div><br><br>";	 die();	}
	elseif($race == Giant  AND $b_type == Priest)	{	echo"<font class=yellow><div align=center>Giants can't possess Priests</font></div><br><br>";	die();	 }
	elseif($class == Ranger AND $b_type == Wizard)	{	echo"<font class=yellow><div align=center>Rangers can't possess Wizards!</font></div>";	die();	 }
			
	if($b_type == "Explorer")	 {
		$newexplorers = $explorers + $b_amount;
		mysql_query("UPDATE military SET explorers='$newexplorers' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Recruit")	 {
		$newrec = $recruits + $b_amount;
		mysql_query("UPDATE military SET recruits='$newrec' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Thief")	{
		$newthieves = $thieves + $b_amount;
		mysql_query("UPDATE military SET thieves='$newthieves' WHERE email='$email' AND pw='$pw'");
			
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Scientist")	{
		$newscientists = $scientists + $b_amount;
		mysql_query("UPDATE military SET scientists='$newscientists' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Warrior")	 {
		$newwarriors = $warriors + $b_amount;
		mysql_query("UPDATE military SET warriors='$newwarriors' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Wizard")	 {
		$newwizards = $wizards + $b_amount;
		mysql_query("UPDATE military SET wizards='$newwizards' WHERE email='$email' AND pw='$pw'");
					
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Priest")	{
		$newpriests = $priests + $b_amount;
		mysql_query("UPDATE military SET priests='$newpriests' WHERE email='$email' AND pw='$pw'");
		
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Archer")	{
		$newarchers = $archers + $b_amount;
		mysql_query("UPDATE military SET archers='$newarchers' WHERE email='$email' AND pw='$pw'");
		
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Land")	{
		$newland = $land + $b_amount;
		$newaland = $aland + $b_amount;
		mysql_query("UPDATE user SET land='$newland' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET aland='$newaland' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
	if($b_type == "Mountain")	{
		$newmt = $mts + $b_amount;
		$amts = $amts + $b_amount;
		mysql_query("UPDATE user SET mts='$newmt' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET amts='$amts' WHERE email='$email' AND pw='$pw'");
						
			if($b_meth == gp)	{
				$B_NEW_gp = $barts_gp + $b_cost;
				$newgp = $gp - $b_cost;
				mysql_query("UPDATE user SET gp='$newgp' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET gp='$B_NEW_gp' WHERE userid='$b_userid'");
			}
			if($b_meth == iron)	{	
				$B_NEW_iron = $barts_iron + $b_cost;
				$newiron = $iron - $b_cost;
				mysql_query("UPDATE user SET iron='$newiron' WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET iron='$B_NEW_iron' WHERE userid='$b_userid'");
			}
	}
					
	$b_amount = number_format($b_amount);
	$c_cost = number_format($b_cost);

	mysql_query("INSERT INTO empnews (date, news, yourid)	VALUES	('$clock', '<font class=yellow>$ename ($setid) has bought $b_amount $b_type(s) for $b_cost $b_meth $b_method</font>' , '$b_userid') ");
				
	mysql_query("INSERT INTO empnews (date, news, yourid)	VALUES	('$clock', '<font class=yellow>You have bought $b_amount $b_type(s) for $b_cost $b_meth from $b_seller ($tsetid)</font>' , '$userid') ");

	$your_new_nno = $nno + 1;
	$their_new = $b_nno + 1;
	mysql_query("DELETE FROM barter WHERE barterid='$bid'"); 
	mysql_query("UPDATE user SET nno='$their_new' WHERE userid='$b_userid'");
	mysql_query("UPDATE user SET nno='$your_new_nno' WHERE userid='$userid'");
	echo"<font class=yellow><div align=center>You have bartered with $b_seller.<br><br></font></div>";
	include("include/guild_barter.php");
}

if(!IsSet($add))	{
?> 

<form type=get action="guildbarter.php">
	<table border=0 width="60%" align=center>
	 <tr>
	   <td class=main colspan=4><b class=reg>Add</b></td>
	<tr>
	   <td class=main2><b class=reg>Amount:</b></td><td class=inner><center><input type="number" name="amount" size=15></td>
		<td class=inner2>
		<select name="type">
	    <option selected value="ns">-Choose type-</option>
		<option value="Archer">Archer</option>
		<option value="Explorer">Explorer</option>
		<option value="Land">Land</option>
		<option value="Mountain">Mountain</option>
		<option value="Priest">Priest</option>	
		<option value="Recruit">Recruit</option>
		<option value="Scientist">Scientist</option>
		<option value="Thief">Thief</option>
		<option value="Warrior">Warrior</option>
		<option value="Wizard">Wizard</option>
		</select></td>
	<tr>
	   <td class=main2><b class=reg>Payment Cost:</b></td><td class=inner><center><input type="number" name="cost" size=15></td>
		<td class=inner2>
	    <select name=method>
		<option selected value=ns>-Choose method-</option>
		<option value=gp>Gold Pieces</option>
		<option value=iron>Iron</option>
		</select></td>

	 </table>
	  <br>
		<center><input class=button type=submit name=add value=Add></center>
		<input type="hidden" name="add" value="1">
	</form>


<?php
}
else	{

	include("include/nexplode.php");
		
	$bresult = mysql_db_query($dbnam, "SELECT count(userid) FROM barter WHERE userid='$userid'");
	$bcheck = mysql_fetch_array($bresult);

	$cost = implode("", explode(",", $cost));
	$amount = implode("", explode(",", $amount));

	if($type == ns OR $gp == "" OR $amount == "")	{	echo"<font class=yellow><div align=center>You must have something for each field</font></div><br><br>.";	die();	 }
	elseif($bcheck[0] >= 4)	 {	echo"<font class=yellow><div align=center>You alreay have 4 items up for sale!</div></font>";	 die();	}
//	various race/class checks
	elseif($type == Wizard AND $class == Ranger)	{	echo"<font class=yellow><div align=center>Rangers can't possess Wizards!</font></div>";	die();	 }
	elseif($type == Wizard AND $race == Giant)	{	echo"<div align=center><font class=yellow>Giants can't possess Wizards!</font></div><br><br>";	 die();	}
	elseif($type == Priest AND $race == Giant)	{	echo"<div align=center><font class=yellow>Giants can't possess Priests!</font></div><br><br>";	die();	 }
	elseif($res[r13pts] < 125000 AND $b_type == Archer)	{	echo"<font class=yellow><div align=center>You must research Archery for Archers.<br><br></div></font>";	die();	 }
//	various invalid checks
	elseif($type != "Explorer" AND $type != "Scientist" AND $type != "Wizard" AND $type != "Priest" AND $type != "Warrior" AND $type != "Thief" AND $type != "Recruit" AND $type != "Land" AND $type != "Mountain" AND $type != "Archer")	 {	echo"<div align=center><font class=yellow>Invalid type!</font></div><br><br>";	die();	 }
	elseif($method != "gp" AND $method != "iron")	{	echo"<div align=center><font class=yellow>Invalid method!</font></div><br><br>";	die();	 }
	elseif($method == ns)	{	echo"<font class=yellow><div align=center>How they are going to pay you!/</font></div><br><br>";	 die();	}
	elseif($cost  <= 0)	{	echo"<font class=yellow><div align=center>Invalid cost!</font></div><br><br>.";	die();	 }
	elseif($amount <= 0)	 {	echo"<font class=yellow><div align=center>Invalid cost!</font></div><br><br>.";	die();	 }
//	number of unit checks
	elseif($type == "Explorer" AND $explorers < $amount)	{	echo"<font class=yellow><div align=center>You don't have that much many explorers!</font></div><br><br>";	die();	 }
	elseif($type == "Land" AND $aland < $amount)	{	echo"<font class=yellow><div align=center>You don't have that much available land!</font></div><br><br>";	die();	 }
	elseif($type == "Mountain" AND $amts < $amount)	{	echo"<font class=yellow><div align=center>You don't have that much available mountains!</font></div><br><br>"; die();	}
	elseif($type == "Priest" AND $priests < $amount)	{	echo"<font class=yellow><div align=center>You don't have that many Priests!</font></div><br><br>";	 die();	}
	elseif($type == "Recruit" AND $recruits < $amount)	 {	echo"<font class=yellow><div align=center>You don't have that many Recruits!</font></div><br><br>";	 die();	}
	elseif($type == "Scientist" AND $scientists < $amount)	{	echo"<font class=yellow><div align=center>You don't have that many Scientists!</font></div><br><br>";	die();	 }
	elseif($type == "Thief" AND $thieves < $amount)	{	echo"<font class=yellow><div align=center>You don't have that many Thieves!</font></div><br><br>";	die();	 }
	elseif($type == "Warrior" AND $warriors < $amount)	{	echo"<font class=yellow><div align=center>You don't have that many Warriors.</font></div><br><br>";	 die();	}
	elseif($type == "Wizard" AND $wizards < $amount)	 {	echo"<font class=yellow><div align=center>You don't have that many Wizards!</font></div><br><br>";	die();	 }
	elseif($type == "Archer" AND $archer < $amount)	 {	echo"<font class=yellow><div align=center>You don't have that many Archers!</font></div><br><br>";	die();	 }
//	invalid number checks
	elseif($type == "Explorer" AND $explorers <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }
	elseif($type == "Land" AND $aland <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }
	elseif($type == "Mountain" AND $amts <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }
	elseif($type == "Priest" AND $priests <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }					
	elseif($type == "Recruit" AND $recruits <= 0)	 {	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }
	elseif($type == "Scientist" AND  $scientists <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }
	elseif($type == "Thief" AND $thieves <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>";	die();	 }	
	elseif($type == "Warrior" AND $warriors <= 0)	{	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>"; die();	}
	elseif($type == "Wizard" AND $wizards <= 0)	 {	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>"; die();	}
	elseif($type == "Archer" AND $archers <= 0)	 {	echo"<font class=yellow><div align=center>Invaild number.</font></div><br><br>"; die();	}
					
	$themaxbarterid = mysql_db_query($dbnam, "SELECT max(barterid) FROM barter");
	$maxbid = mysql_result($themaxbarterid,"maxbid");
	$maxbid = $maxbid + 1;
	$page = "guild";

	mysql_query("INSERT INTO barter (seller, cost, type, amount, barterid, userid, method, page, guild)	VALUES	('$ename', '$cost', '$type', '$amount', '$maxbid', '$userid', '$method', '$page', '$empireguild') ");
					
	if($type == "Explorer")	{	$newexplorers= $explorer - $amount;	mysql_query("UPDATE military SET explorers='$newexplorers' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Priest")	{	$newpri= $priests - $amount;	 mysql_query("UPDATE military SET priests='$newpri' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Recruit")	{	$newrec= $recruits - $amount;	mysql_query("UPDATE military SET recruits='$newrec' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Scientist")	{	$newsicen= $scientists - $amount;	mysql_query("UPDATE military SET scientists='$newsicen' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Thief")	{	$newthief= $thieves - $amount;	mysql_query("UPDATE military SET thieves='$newthief' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Warrior")	{	$newwar= $warriors - $amount;	mysql_query("UPDATE military SET warriors='$newwar' WHERE email='$email' AND pw='$pw'");	 }
	if($type == "Wizard")	{	$newwiz= $wizards - $amount;	mysql_query("UPDATE military SET wizards='$newwiz' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Archer")	{	$newarch= $archers - $amount;	mysql_query("UPDATE military SET archers='$newarch' WHERE email='$email' AND pw='$pw'");	}
	if($type == "Land")	{	
		$newland= $land - $amount;
		$newaland = $aland - $amount;
		mysql_query("UPDATE user SET land='$newland' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET aland='$newaland' WHERE email='$email' AND pw='$pw'");
	}
	if($type == "Mountain")	 {
		$newmt= $mts - $amount;
		$newamt = $amts - $amount;
		mysql_query("UPDATE user SET mts='$newmt' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET amts='$newamt' WHERE email='$email' AND pw='$pw'");
	}
					
	echo "<font class=yellow><div align=center>Your barter has been placed.</font></div><br><br>";
	die();
}

if(!IsSet($end))	{
}
else	{			
	include("include/nexplode.php");

	$result = mysql_db_query($dbnam, "SELECT barterid FROM barter WHERE barterid='$bid'"); 
	$barterid_check = mysql_fetch_array($result);

	if($barterid_check[0] != $bid)	 {
		echo"<font class=yellow><div align=center>There is no such barter.</font></div>";
		die();
	}

	$barter_query = mysql_query("SELECT * FROM barter WHERE barterid='$bid'");
	$barter = mysql_fetch_array($barter_query);
		$b_cost = $barter[cost];
		$b_type = $barter[type];
		$b_meth = $barter[method];
		$b_amount = $barter[amount];
		$b_seller = $barter[seller];
		$b_userid = $barter[userid];

	if($b_userid != $userid)	{	echo"<font class=yellow><div align=center>You cannot cancel other empire barters.</font></div><br><br>";	die();	 }
	if($b_type == "Explorer")	{	$newexplorers = $explorers + $b_amount;	 mysql_query("UPDATE military SET explorers='$newexplorers' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Priest")	{	$newpriests = $priests + $b_amount;	mysql_query("UPDATE military SET priests='$newpriests' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Recruit")	 {	$newrec = $recruits + $b_amount;	mysql_query("UPDATE military SET recruits='$newrec' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Scientist")	{	$newscien = $scientists + $b_amount;	 mysql_query("UPDATE military SET scientists='$newscien' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Thief")	{	$newthief = $thieves + $b_amount;	 mysql_query("UPDATE military SET thieves='$newthief' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Warrior")	 {	$newwarriors = $warriors + $b_amount;	mysql_query("UPDATE military SET warriors='$newwarriors' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Wizard")	 {	$newwizards = $wizards + $b_amount;	 mysql_query("UPDATE military SET wizards='$newwizards' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Archer")	 {	$newarchers = $archers + $b_amount;	 mysql_query("UPDATE military SET archers='$newarchers' WHERE email='$email' AND pw='$pw'");	}
	if($b_type == "Land")	{
		$newland= $land + $b_amount;
		$newaland = $aland + $b_amount;
		mysql_query("UPDATE user SET land='$newland' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET aland='$newaland' WHERE email='$email' AND pw='$pw'");
	}
	if($b_type == "Mountain")	{
		$newmt= $mts + $b_amount;
		$newamt = $amts + $b_amount;
		mysql_query("UPDATE user SET mts='$newmt' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE buildings SET amts='$newamt' WHERE email='$email' AND pw='$pw'");
	}

	mysql_query("DELETE FROM barter WHERE barterid='$bid'"); 
				
	echo"<font class=yellow><div align=center>Your barter has been cancelled.</font></div>";

}
?>

</td>
</tr>
</table>
</body>
</html>