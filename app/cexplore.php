<?php include("include/igtop.php");?>

<center> <b class=reg> | <a href="explore.php"> -Send Explorers- </a> | </b></center><br>

<?php
	if(!IsSet($cancel))
{
  ?>

			<? include("include/S_CEXPLORE.php"); ?>

<?php
}
else
{
	include("include/nexplode.php");

	if($cexploreland < 0 OR $cexploremt < 0)
		{echo"<div align=center><font class=yellow>You can not cancel negative or 0 explorers.</font></div>";include("include/S_CEXPLORE.php");die();
		}
	elseif($expland + $expmt < $cexploreland + $cexploremt)
		{echo"<div align=center><font class=yellow>You cannot cancel that many explorers.</font></div>";include("include/S_CEXPLORE.php"); die();
		}
		else
			{ 
				
     			$explorers = $explorers + ($cexploreland + $cexploremt);
	 			$expland = $expland - $cexploreland;
	 			$expmt = $expmt - $cexploremt;

	 			 include("include/connect.php");
		
	  			 mysql_query("UPDATE military SET explorers =\"$explorers\" WHERE email='$email' AND pw='$pw'"); 
	  			 mysql_query("UPDATE explore SET expland =\"$expland\" WHERE email='$email' AND pw='$pw'");
	  			 mysql_query("UPDATE explore SET expmt =\"$expmt\" WHERE email='$email' AND pw='$pw'");
      
	  			 echo"<div align=center><font class=yellow>You have successfully cancelled your explorers(s).</font></div>";
      			 include("include/S_CEXPLORE.php");
	  
			}
}

?>	
<!-- BODY ENDS -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>