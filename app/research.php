<?php include("include/igtop.php");?>
		
<center> <b class=reg> | <a href="cresearch.php"> -Cancel Scientists- </a> | </b></center><br>
		
<?php
	if(!IsSet($first))
{
 ?> 		
		
			<? include("include/S_RES.php"); ?>

<?php
}
else
{
		include("include/nexplode.php");

		if($ascientists < $ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7 + $ur8 + $ur9 + $ur10 + $ur11 + $ur12 + $ur13)
			{echo"<div align=center><font class=yellow>You do not have that many scientists.</font></div>"; include("include/S_RES.php");die();
			}
		elseif($ur1 < 0 OR $ur2 < 0 OR $ur3 < 0 OR $ur4 < 0 OR $ur5 < 0 OR $ur6 < 0 OR $ur7 < 0 OR $ur8 < 0 OR $ur9 < 0 OR $ur10 < 0 OR $ur11 < 0 OR $ur12 < 0 OR $ur13 < 0)
			{echo"<div align=center><font class=yellow>You cannot send negative or 0 scientists.</font></div>"; include("include/S_RES.php");die();
			}
		elseif($ur1 > 0  AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur2 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur3 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur4 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur5 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur6 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur7 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur8 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur9 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur10 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();}
			else{
	 
	 
			$ascientists = $ascientists - ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7 + $ur8 + $ur9 + $ur10 + $ur11 + $ur12 + $ur13);
	 		$scientists = $scientists - ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7 + $ur8 + $ur9 + $ur10 + $ur11 + $ur12 + $ur13);
	 		$r1 = $res[r1] + $ur1;
	 		$r2 = $res[r2] + $ur2;
     		$r3 = $res[r3] + $ur3;
	 		$r4 = $res[r4] + $ur4;
     		$r5 = $res[r5] + $ur5;
			$r6 = $res[r6] + $ur6;
			$r7 = $res[r7] + $ur7;
			$r8 = $res[r8] + $ur8;
			$r9 = $res[r9] + $ur9;
			$r10 = $res[r10] + $ur10;
			$r11 = $res[r11] + $ur11;
			$r12 = $res[r12] + $ur12;
			$r13 = $res[r13] + $ur13;

	 		include("include/connect.php");
		
	   
	  		mysql_query("UPDATE military SET scientists = $scientists WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE research SET r1 =\"$r1\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE research SET r2 =\"$r2\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r3 =\"$r3\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r4 =\"$r4\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r5 =\"$r5\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r6 =\"$r6\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r7 =\"$r7\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r8 =\"$r8\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r9 =\"$r9\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r10 =\"$r10\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r11 =\"$r11\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r12 =\"$r12\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r13 =\"$r13\" WHERE email='$email' AND pw='$pw'");

			echo"<div align=center><font class=yellow>You have successfully sent your scientist(s) to research.</font></div>";
			include("include/S_RES.php");
			
			die();
	 
			}
 }
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>