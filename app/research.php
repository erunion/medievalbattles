<?php
		include("include/igtop.php");
	?>
 		<!-- BODY OF PAGE BEGINS HERE -->
		<br><br><center> <b class=reg> | <a href="cresearch.php"> -Cancel Scientists- </a> | </b></center><br>
		
<?php
	if(!IsSet($first))
{
 ?> 		
		
			<? include("include/S_RES.php"); ?>

<?php
}
else
{
		if($ascientists < $ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6)
			{echo"<div align=center><font class=yellow>You do not have that many scientists.</font></div>"; include("include/S_RES.php");die();
			}
		elseif($ur1 < 0 OR $ur2 < 0 OR $ur3 < 0 OR $ur4 < 0 OR $ur5 < 0 OR $ur6 < 0)
			{echo"<div align=center><font class=yellow>You cannot send negative or 0 scientists.</font></div>"; include("include/S_RES.php");die();
			}
		else{
	 
	 
			$ascientists = $ascientists - ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6);
	 		$scientists = $scientists - ($ur1 + $ur2 + $ur3 + $ur4 + $ur5 + $ur6);
	 		$r1 = $r1 + $ur1;
	 		$r2 = $r2 + $ur2;
     		$r3 = $r3 + $ur3;
	 		$r4 = $r4 + $ur4;
     		$r5 = $r5 + $ur5;
			$r6 = $r6 + $ur6;

	 		include("include/connect.php");
		
	   
	  		mysql_query("UPDATE military SET scientists = $scientists WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE research SET r1 =\"$r1\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE research SET r2 =\"$r2\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r3 =\"$r3\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r4 =\"$r4\" WHERE email='$email' AND pw='$pw'");
      		mysql_query("UPDATE research SET r5 =\"$r5\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE research SET r6 =\"$r6\" WHERE email='$email' AND pw='$pw'");

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