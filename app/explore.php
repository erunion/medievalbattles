<?php 

include("include/igtop.php");
echo "<center> <b class=reg> | <a href=cexplore.php> -Cancel Explorers- </a> | </b></center><br>";


if(!IsSet($explore))	{
	include("include/S_EXPLORE.php");
}
else	{
	include("include/nexplode.php");

	if($exploreland < 0 OR $exploremt < 0)	 {
		echo"<div align=center><font class=yellow>You can not send negative or 0 explorers.</font></div>"; 
		include("include/S_EXPLORE.php");
		die();
	}
	elseif($aexplorers < $exploreland + $exploremt)	{
		echo"<div align=center><font class=yellow>You do not have enough explorers to send.</font></div>";
		include("include/S_EXPLORE.php");
		die();
	}
	
	$explorers = $explorers - ($exploreland + $exploremt);
	$expland = $expland + $exploreland;
	$expmt = $expmt + $exploremt;

	$aexplorers = $aexplorers - ($exploreland + $exploremt);
		
	mysql_query("UPDATE military SET explorers='$explorers' WHERE email='$email' AND pw='$pw'"); 
	mysql_query("UPDATE explore SET expland='$expland' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE explore SET expmt='$expmt' WHERE email='$email' AND pw='$pw'");
				
	echo"<div align=center>You have successfully sent your explorer(s).</font></div>";
	include("include/S_EXPLORE.php");
      		
}
?>	

</td>
</tr>
</table>
</body>
</html>