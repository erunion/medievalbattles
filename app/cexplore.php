<?php include("include/igtop.php");

echo "<center> <b class=reg> | <a href=explore.php> -Send Explorers- </a> | </b></center><br>";

if(!IsSet($cancel))	{
	include("include/S_CEXPLORE.php");
}
else	{
	include("include/nexplode.php");

	if($cexploreland < 0 OR $cexploremt < 0)	{
		echo"<div align=center><font class=yellow>You can not cancel negative or 0 explorers.</font></div>";
		include("include/S_CEXPLORE.php");
		die();
	}
	elseif($expland < $cexploreland OR $expmt < $cexploremt)	 {
		echo"<div align=center><font class=yellow>You cannot cancel that many explorers.</font></div>";
		include("include/S_CEXPLORE.php"); 
	}
	elseif($expland + $expmt < $cexploreland + $cexploremt)	 {
		echo"<div align=center><font class=yellow>You cannot cancel that many explorers.</font></div>";
		include("include/S_CEXPLORE.php"); 
		die();
	}
	else	{ 
		$explorers = $explorers + ($cexploreland + $cexploremt);
	 	$expland = $expland - $cexploreland;
	 	$expmt = $expmt - $cexploremt;

		 mysql_query("UPDATE military SET explorers='$explorers' WHERE email='$email' AND pw='$pw'"); 
		 mysql_query("UPDATE explore SET expland='$expland' WHERE email='$email' AND pw='$pw'");
		 mysql_query("UPDATE explore SET expmt='$expmt' WHERE email='$email' AND pw='$pw'");
      
		 echo"<div align=center><font class=yellow>You have successfully cancelled your explorers(s).</font></div>";
		 include("include/S_CEXPLORE.php");
	}
}
?>	

</td>
</tr>
</table>
</body>
</html>