<? include("include/igtop.php");?>
<center>
	<b class=reg> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a>|</b>
	 </center>
	  <br>



<?

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
		 
	 			include("include/connect.php");

	 			$gp = $gp - ($urecruit * 150);
	 			$gp = floor($gp);
	 
	 			$maxciv = $maxciv - $urecruit;
	 
	 			$recruits = $recruits + $urecruit;
	 			$newexp = $exp2 + ($urecruit * 5);
		
				 mysql_query("UPDATE user SET exp2='$newexp' WHERE email='$email' AND pw='$pw'"); 
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

			$totalunits =  "$twarriors + $twizards + $tpriests + $tarchers + $dbwar2 + $dbwar + $dbwiz2 + $dbwiz + $dbpri2 + $dbpri + $dbarch2 + $dbarch";
			$barrack_cap = $barrack * 50;

			if($race == Human)	{	
				$barrack_cap = $barrack * 35;
			}


	if($uarcher > 0 AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>Gotta research archery before you get archers!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	elseif($uwizard > 0 AND $class == Ranger)	{
		echo"<div align=center><font class=yellow>You can't train Wizards because you're a Ranger!</div></font>";
		include("include/S_RSET.php");
		die();
	}
	elseif($uthief < 0 OR $udog < 0 OR $uscientist < 0 OR $uexplorer < 0 OR $uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)	 {
		echo"<div align=center><font class=yellow>You can't train negative or no units!</font></div>"; 
		include("include/S_RSET.php");
		die();
	}
	elseif($recruits < $uthief + $uscientist + $uexplorer + $upriest + $uwarrior + $uwizard + $uarcher)	{
		echo"<div align=center><font class=yellow>You don't have that many recruits!</font></div>";
		include("include/S_RSET.php");
		die();
	}
	elseif($puppies < $udog)	{
		echo"<div align=center><font class=yellow>You don't have that many puppies!</font></div>";
		include("include/S_RSET.php");
		die();
	}
	elseif($gp < ($uthief * 200) + ($udog * 1000) + ($uexplorer * $explorec) + ($uscientist * 500) + ($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior) + ($archerc * $uarcher))	 {
		echo"<div align=center><font class=yellow>You don't have that much gold pieces!</font></div>";
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
			echo"<div align=center><font class=yellow>You got to build more barracks before you can do that!</font></div>";
			include("include/S_RSET.php"); 
			die();
		}
	}
			include("include/connect.php");

	 		$gp = $gp - ((($uthief * 200) + ($udog * 1000) + ($uscientist * 500) + ($uexplorer * $explorec)) + (($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior) + ($archerc * $uarcher)));	
	 		$gp = round($gp);

     		$recruits = $recruits - ($uexplorer + $uthief + $uscientist + $upriest + $uwizard + $uwarrior + $uarcher);
			$puppies = $puppies - $udog;
	 		$dbexplorer = $dbexplorer + $uexplorer;
	 		$dbscientist = $dbscientist + $uscientist;
	 		$dbthief = $dbthief + $uthief;
			$dbdog = $dbdog + $udog;
	 		$newexp2 = $exp2 + (($uscientist + $uthief + $uexplorer + $udog) * 10) + (($uwizard * $wizexp) + ($uwarrior * $warexp) + ($upriest * $priexp) + ($uarcher * $archexp));
			
			$dbpri2 = $dbpri2 + $upriest;
	 		$dbwiz2 = $dbwiz2 + $uwizard;
	 		$dbwar2 = $dbwar2 + $uwarrior; 
			$dbarch2 = $dbarch2 + $uarcher;
	  		
	
	  		mysql_query("UPDATE user SET exp2='$newexp2' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE military SET recruits='$recruits' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET puppies='$puppies' WHERE email='$email' AND pw='$pw'");
	 
	  		mysql_query("UPDATE military SET dbscientist='$dbscientist' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbthief='$dbthief' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbexplorer='$dbexplorer' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbdog='$dbdog' WHERE email='$email' AND pw='$pw'");
	 		mysql_query("UPDATE military SET dbpri2='$dbpri2' WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE military SET dbwiz2='$dbwiz2' WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE military SET dbwar2='$dbwar2' WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE military SET dbarch2='$dbarch2' WHERE email='$email' AND pw='$pw'");


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