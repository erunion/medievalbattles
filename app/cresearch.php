<?php include("include/igtop.php");?>
 		
<center> <b class=reg> | <a href="research.php"> -Send Scientists- </a> | </b></center><br>
		
<?php
	if(!IsSet($first))
{
 ?> 		
		
			<? include("include/S_CRES.php"); ?>

<?php
}
else
{
		include("include/nexplode.php");

		if($r1 < $ur1 OR $r2 < $ur2 OR $r3 < $ur3 OR $r4 < $ur4 OR $r5 < $ur5 OR $r6 < $ur6 OR $r7 < $ur7)
			{echo"<div align=center><font class=yellow>You cannot cancel that many scientists.</font></div>"; include("include/S_CRES.php"); die();
			}
		elseif($ur1 < 0 OR $ur2 < 0 OR $ur3 < 0 OR $ur4 < 0 OR $ur5 < 0 OR $ur6 < 0 OR $ur7 < 0)
			{echo"<div align=center><font class=yellow>You cannot cancel negative or 0 scientists.</font></div>";  include("include/S_CRES.php");die();
			}
		elseif($ur3 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur1 > 0  AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
		elseif($ur2 > 0 AND $race == Giant)
			{echo"<div align=center><font class=yellow>You cannot research these items being that you are a Giant.</font></div>";include("include/S_RES.php");die();
			}
			else{
			 
			 include("include/connect.php");

			 $ascientists = $ascientists + ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7);
	 		 $scientists = $scientists + ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6 + $ur7);
	 		 $r1 = $r1 - $ur1;
	 		 $r2 = $r2 - $ur2;
     		 $r3 = $r3 - $ur3;
	 		 $r4 = $r4 - $ur4;
     		 $r5 = $r5 - $ur5;
			 $r6 = $r6 - $ur6;
			 $r7 = $r7 - $ur7;

	 	     mysql_query("UPDATE military SET scientists =\"$scientists\" WHERE email='$email' AND pw='$pw'");
	  		 mysql_query("UPDATE research SET r1 =\"$r1\" WHERE email='$email' AND pw='$pw'");
	  		 mysql_query("UPDATE research SET r2 =\"$r2\" WHERE email='$email' AND pw='$pw'");
      		 mysql_query("UPDATE research SET r3 =\"$r3\" WHERE email='$email' AND pw='$pw'");
      		 mysql_query("UPDATE research SET r4 =\"$r4\" WHERE email='$email' AND pw='$pw'");
      		 mysql_query("UPDATE research SET r5 =\"$r5\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE research SET r6 =\"$r6\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE research SET r7 =\"$r7\" WHERE email='$email' AND pw='$pw'");

			 echo"<div align=center><font class=yellow>You have successfully cancelled your scientist(s).</font></div>";
			 include("include/S_CRES.php");
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