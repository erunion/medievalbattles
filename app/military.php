<? 
include("include/igtop.php");

echo "
<center>
<b class=reg> | <a href=disband.php>Disband</a> | <a href=equip.php>Equip</a> | <a href=wconstruct.php>Construct Weapon</a> | <a href=aconstruct.php>Construct Armor</a> |</b>
</center>
<br>";

if(!IsSet($recruited))	 {
	include("include/S_RCIV.php");
}
else	{

	include("include/nexplode.php");

	if($urecruit < 0)	{
		echo"<div align=center><font class=yellow>You cannot recruit negative or 0 civilians.</font></div>";
		include("include/S_RCIV.php");
		include("include/S_RSET.php");
		die();
	}
	elseif($maxciv < $urecruit)	 {
		echo"<div align=center><font class=yellow>You cannot recruit that many civilians.</font></div>";
		include("include/S_RCIV.php");
		include("include/S_RSET.php");
		die();
	}
	elseif ($gp < $urecruit * 150)	 {
		echo"<div align=center><font class=yellow>You do not have enough gold to carry out your orders.</font></div>";
		include("include/S_RCIV.php");
		include("include/S_RSET.php");
		die(); 
	} 
	else { 
		$gp = $gp - ($urecruit * 150);
	 	$gp = floor($gp);
	 
	 	$maxciv = $maxciv - $urecruit;
	 	$recruits = $recruits + $urecruit;
	 	mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'");  
	  	mysql_query("UPDATE military SET recruits='$recruits' WHERE email='$email' AND pw='$pw'");
	  	mysql_query("UPDATE military SET maxciv='$maxciv' WHERE email='$email' AND pw='$pw'");
		
		echo"<div align=center><font class=yellow>Your civilians have been recruited.</font></div>";
		include("include/S_RCIV.php");
		include("include/S_RSET.php");
		die();
	}
}

if(!IsSet($trains))	 {
	include("include/S_RSET.php");
}
else	{

	include("include/nexplode.php");

	$totalunits =  $twarriors + $twizards + $tpriests + $tarchers + $dbwar2 + $dbwar + $dbwiz2 + $dbwiz + $dbpri2 + $dbpri + $dbarch2 + $dbarch;
	$barrack_cap = $barrack * 50;
	if($race == Human)	{	$barrack_cap = $barrack * 35;	}


	if($uarcher > 0 AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You have to research Archery before you get Archers!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	elseif($ucatapult > 0 AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You have to research Archery before you get Catapults!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	if($usuicide > 0 AND $res[r14pts] < 125000)	{
		echo"<div align=center><font class=yellow>You have to research Pyrotechnics before you get Suicide Civilians!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	elseif($uwizard > 0 AND $class == Ranger)	{
		echo"<div align=center><font class=yellow>You can't train Wizards because you're a Ranger!</div></font>";
		include("include/S_RSET.php");
		die();
	}
	elseif($uthief < 0 OR $uscientist < 0 OR $uexplorer < 0 OR $uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0 OR $ucatapult < 0 OR $usuicide < 0)	 {
		echo"<div align=center><font class=yellow>You can't train negative or no units!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	elseif($recruits < $uthief + $uscientist + $uexplorer + $upriest + $uwarrior + $uwizard + $uarcher + $ucatapult + $usuicide)	{
		echo"<div align=center><font class=yellow>You don't have that many recruits!</font></div>";
		include("include/S_RSET.php");
		die();
	}
	elseif($gp < ($uthief * 200) + ($uexplorer * $explorec) + ($uscientist * 500) + ($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior) + ($archerc * $uarcher) + ($ucatapult * 5000) + ($usuicide * 5000))	 {
		echo"<div align=center><font class=yellow>You don't have that many gold pieces!</font></div>";
		include("include/S_RSET.php");
		die(); 
	} 
	elseif($lumber < ($ucatapult * 200))	 {
		echo"<div align=center><font class=yellow>You don't have that much lumber!</font></div>";
		include("include/S_RSET.php");
		die(); 
	} 
	elseif($upriest > 0 AND $uwizard > 0 AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You can't train Wizards or Priests because you're a Giant!</font></div>";
		include("include/S_RSET.php");
		die(); 
	}
	elseif($totalunits >= $barrack_cap)	{
		if($uwarrior > 0 OR $uwizard > 0 OR $upriest > 0 OR $uarcher > 0)	{
			echo"<div align=center><font class=yellow>You have to build more barracks before you can do that!</font></div>";
			include("include/S_RSET.php"); 
			die();
		}
	}
			include("include/connect.php");

	 		$gp = $gp - ( (($uthief * 200) + ($uscientist * 500) + ($uexplorer * $explorec)) + (($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior) + ($archerc * $uarcher)) + (($ucatapult * 5000) + ($usuicide * 5000)));	
	 		$gp = round($gp);

	 		$lumber = $lumber - ($ucatapult * 200);	
	 		$lumber = round($lumber);

     		$recruits = $recruits - ($uexplorer + $uthief + $uscientist + $upriest + $uwizard + $uwarrior + $uarcher + $ucatapult + $usuicide);
	 		$dbexplorer = $dbexplorer + $uexplorer;
	 		$dbscientist = $dbscientist + $uscientist;
	 		$dbthief = $dbthief + $uthief;
			
			$dbpri2 = $dbpri2 + $upriest;
	 		$dbwiz2 = $dbwiz2 + $uwizard;
	 		$dbwar2 = $dbwar2 + $uwarrior; 
			$dbarch2 = $dbarch2 + $uarcher;

	 		$dbcatapult3 = $dbcatapult3 + $ucatapult; 
			$dbsuicide3 = $dbsuicide3 + $usuicide;
	  		
	  		mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'");  
			mysql_query("UPDATE user SET lumber='$lumber' WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE military SET recruits='$recruits' WHERE email='$email' AND pw='$pw'");
	 
	  		mysql_query("UPDATE military SET dbscientist='$dbscientist' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbthief='$dbthief' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbexplorer='$dbexplorer' WHERE email='$email' AND pw='$pw'");
	 		mysql_query("UPDATE military SET dbpri2='$dbpri2' WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE military SET dbwiz2='$dbwiz2' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbwar2='$dbwar2' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET dbarch2='$dbarch2' WHERE email='$email' AND pw='$pw'");

	 		mysql_query("UPDATE military SET dbcatapult3='$dbcatapult3' WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE military SET dbsuicide3='$dbsuicide3' WHERE email='$email' AND pw='$pw'");


	  		echo"<div align=center><font class=yellow>Your orders have been carried out.</font></div>";
			include("include/S_RSET.php");
	  		die();
}
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>