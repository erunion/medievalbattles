<?

include("include/igtop.php");
 		
echo "<center> <b class=reg> | <a href=research.php> -Send Scientists- </a> | </b></center><br>";
		
if(!IsSet($first))	{
	include("include/S_CRES.php");
}
else	{
	include("include/nexplode.php");

	// select research items	
	$res_query = mysql_db_query($dbnam, "SELECT * FROM research WHERE email='$email' AND pw='$pw'");
	$res = mysql_fetch_array($res_query);

	if($res[r1] < $ur1 OR $res[r2] < $ur2 OR $res[r3] < $ur3 OR $res[r4] < $ur4 OR $res[r5] < $ur5 OR $res[r6] < $ur6 OR $res[r7] < $ur7 OR $res[r8] < $ur8 OR $res[r9] < $ur9 OR $res[r10] < $ur10 OR $res[r11] < $ur11 OR $res[r12] < $ur12 OR $res[r13] < $ur13 OR $res[r14] < $ur14)	 {
		echo"<div align=center><font class=yellow>You cannot cancel that many scientists.</font></div>"; 
		include("include/S_CRES.php"); 
		die();
	}
	elseif($ur1 < 0 OR $ur2 < 0 OR $ur3 < 0 OR $ur4 < 0 OR $ur5 < 0 OR $ur6 < 0 OR $ur7 < 0 OR $ur8 < 0 OR $ur9 < 0 OR $ur10 < 0 OR $ur11 < 0 OR $ur12 < 0 OR $ur13 < 0 OR $ur14 < 0)	{
		echo"<div align=center><font class=yellow>You cannot cancel negative or 0 scientists.</font></div>";  
		include("include/S_CRES.php");
		die();
	}
	elseif($ur1 > 0  AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur2 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur3 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur4 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur5 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur6 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur7 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur8 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur9 > 0 AND $race == Giant)	 {
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	elseif($ur10 > 0 AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";
		include("include/S_CRES.php");
		die();
	}
	else	{
			 
		$ascientists = $ascientists + ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7 + $ur8 + $ur9 + $ur10 + $ur11 + $ur12 + $ur13 + $ur14);
		$scientists = $scientists + ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7 + $ur8 + $ur9 + $ur10 + $ur11 + $ur12 + $ur13 + $ur14);
		$r1 = $res[r1] - $ur1;
		$r2 = $res[r2] - $ur2;
    	$r3 = $res[r3] - $ur3;
		$r4 = $res[r4] - $ur4;
    	$r5 = $res[r5] - $ur5;
		$r6 = $res[r6] - $ur6;
		$r7 = $res[r7] - $ur7;
	 	$r8 = $res[r8] - $ur8;
	 	$r9 = $res[r9] - $ur9;
     	$r10 = $res[r10] - $ur10;
	 	$r11 = $res[r11] - $ur11;
	 	$r12 = $res[r12] - $ur12;	
		$r13 = $res[r13] - $ur13;
		$r14 = $res[r14] - $ur14;

	 	mysql_query("UPDATE military SET scientists='$scientists' WHERE email='$email' AND pw='$pw'");
	  	mysql_query("UPDATE research SET r1='$r1' WHERE email='$email' AND pw='$pw'");
	  	mysql_query("UPDATE research SET r2='$r2' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r3='$r3' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r4='$r4' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r5='$r5' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE research SET r6='$r6' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE research SET r7='$r7' WHERE email='$email' AND pw='$pw'");
	  	mysql_query("UPDATE research SET r8='$r8' WHERE email='$email' AND pw='$pw'");
	  	mysql_query("UPDATE research SET r9='$r9' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r10='$r10' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r11='$r11' WHERE email='$email' AND pw='$pw'");
      	mysql_query("UPDATE research SET r12='$r12' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE research SET r13='$r13' WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE research SET r14='$r14' WHERE email='$email' AND pw='$pw'");

		echo "<div align=center><font class=yellow>You have successfully cancelled your scientist(s).</font></div>";
		include("include/S_CRES.php");
		die();
	}
}
?>

</td>
</tr>
</table>
</body>
</html>