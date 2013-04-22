<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
   <br>
<center><b class=reg>| <a href="buildings.php"> -Construct- </a> | </b></center><br>

	
<?php
	if(!IsSet($update))
{
  ?> 
  

		<? include("include/S_DBUILD.php"); ?>


<?php
}
else
{
	if($ulmill > 0 AND $r6pts < 125000)
		{echo"<div align=center><font class=yellow>You have to research Archery before this building becomes available to demolish.</font></div>";include("include/S_BUILD.php");die();
		}
	elseif($gm < $ugm OR $im < $uim) 
		{echo"<div align=center><font class=yellow>You cannot demolish that many mines.</font></div>";include("include/S_DBUILD.php");die();
		}
	elseif($uhome < 0 OR $ubarrack < 0 OR $ufarm < 0 OR $uwp < 0 OR $ugm < 0 OR $uim < 0 )
		{echo"<div align=center><font class=yellow>You cannot demolish negative or 0 buildings.</font></div>";include("include/S_DBUILD.php");die();
		}
	elseif ($uhome > $home OR $ufarm > $farm OR $ulab > $wp OR $ubarrack > $barrack OR $ulmill > $lmill) 
		{echo"<div align=center><font class=yellow>You cannot demolish that many buildings.</font></div>";include("include/S_DBUILD.php");die(); 
		} 
	elseif($gp < ($ugm + $uim + $uhome + $ubarrack + $ufarm + $uwp) * 75)
		{echo"<div align=center><font class=yellow>You do not have enough gold pieces to carry out your orders.</div></font>";include("include/S_DBUILD.php");die();
		}
		else 
			{ 
	
			include("include/connect.php");

	 		$gp = $gp - (($ugm + $uim + $uhome + $ubarrack + $ufarm + $uwp + $ulmill) * 75);
	 		$gp=floor($gp);
	 
	 		$amts = $amts + ($ugm + $uim);
	 		$aland = $aland + ($uhome + $ubarrack + $ufarm + $uwp + $ulmill);

	 		$forexp2 = $exp2 - (($uhome + $ubarrack + $ufarm + $uwp + $ulmill) * $landexp) + (($ugm + $uim) * $mtexp); 
	
				
			$home = $home - $uhome;
			$barrack = $barrack - $ubarrack;
			$farm = $farm - $ufarm;
			$wp = $wp - $uwp;
			$lmill = $lmill - $ulmill;
			$gm = $gm - $ugm;
			$im = $im - $uim;
	 		 
		
	  		mysql_query("UPDATE buildings SET amts =\"$amts\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET home =\"$home\" WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE buildings SET barrack =\"$barrack\" WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE buildings SET farm = \"$farm\"WHERE email='$email' AND pw='$pw'"); 
	  		mysql_query("UPDATE buildings SET wp =\"$wp\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE buildings SET lmill =\"$lmill\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET aland =\"$aland\" WHERE email='$email' AND pw='$pw'");
	 		mysql_query("UPDATE buildings SET gm =\"$gm\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET im =\"$im\" WHERE email='$email' AND pw='$pw'");
	 		
			echo"<div align=center><font class=yellow>Your orders have been carried out.</font></div>";
			include("include/S_DBUILD.php");
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