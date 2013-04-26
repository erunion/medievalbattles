<? 
include("include/igtop.php");

if(($race != Giant) AND ($race != Angel) AND ($class != Ranger) AND ($class != Insurrectionist))	{

	if(!IsSet($trains))	 {
		include("include/animate_table.php");
	}
	else	{
		include("include/nexplode.php");

		if(($uirongolem > 0 AND $res[r18pts] < 125000) OR ($ugolem > 0 AND $res[r17pts] < 125000))	{
			echo"<div align=center><font class=yellow>You have to research Animation/Advanced Animation first!</font></div>"; 
			include("include/animate_table.php");
			die();
		}
		elseif($ugolem < 0 OR $uirongolem < 0)	 {
			echo"<div align=center><font class=yellow>You can't train negative or no units!</font></div>"; 
			include("include/animate_table.php");
			die();
		}
			elseif(($wizards / 2) < $ugolem + $uirongolem)	{
			echo"<div align=center><font class=yellow>You don't have that many wizards!</font></div>";
			include("include/animate_table.php");
			die();
		}
		elseif($gp < ($ugolem * $golemc) + ($uirongolem * $irongolemc))	 {
			echo"<div align=center><font class=yellow>You don't have that many gold pieces!</font></div>";
			include("include/animate_table.php");
			die(); 
		} 
		elseif($iron < ($uirongolem * 200))	 {
			echo"<div align=center><font class=yellow>You don't have that much iron!</font></div>";
			include("include/animate_table.php");
			die(); 
		}
		elseif($ugolem > 0 AND $uirongolem > 0 AND $race == Giant)	{
			echo"<div align=center><font class=yellow>You can't train these because you're a Giant!</font></div>";
			include("include/animate_table.php");
			die();	
		}
		elseif($ugolem > 0 AND $uirongolem > 0 AND $class == Ranger)	{
			echo"<div align=center><font class=yellow>You can't train these because you're a Ranger!</font></div>";
			include("include/animate_table.php");
			die(); 
		}
		elseif($ugolem > 0 AND $uirongolem > 0 AND $class == Insurrectionist)	{
			echo"<div align=center><font class=yellow>You can't train these because you're an Insurrectionist!</font></div>";
			include("include/animate_table.php");
			die(); 
		}
			$gp = $gp - (($ugolem * $golemc) + ($uirongolem * $irongolemc));
				$gp = round($gp);
			$iron = $iron - ($uirongolem * 200);
				$iron = round($iron);
			$wizards = $wizards - (($ugolem * 2) + ($uirongolem * 2));	
			 	$wizards = round($wizards);

		 	$dbgolem = $dbgolem + $ugolem;
		 	$dbirongolem = $dbirongolem + $uirongolem;
		
			mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'");  
			mysql_query("UPDATE user SET iron='$iron' WHERE email='$email' AND pw='$pw'");  
		  	mysql_query("UPDATE military SET wizards='$wizards' WHERE email='$email' AND pw='$pw'");
	 
		  	mysql_query("UPDATE military SET dbgolem='$dbgolem' WHERE email='$email' AND pw='$pw'");
		  	mysql_query("UPDATE military SET dbirongolem='$dbirongolem' WHERE email='$email' AND pw='$pw'");

			echo"<div align=center><font class=yellow>Your orders have been carried out.</font></div>";
			include("include/animate_table.php");
		  	die();
	}
}
else	{
	echo"<div align=center><font class=yellow>Due to your race or class, you cannot make Golems because you cannot make Wizards.</font></div>";
	die(); 
}

echo "
<table border='0' bordercolor='#808080' align='center' width='65%'>
	<tr>
  		<td colspan='10' class='main'><b class='top'>Golem Equipment</b></td>
 	<tr>				 
 		<td class='main2'><b class='reg'>Unit</b></td>
		<td class='main2'><b class='reg'>Weapon</b></td>
  		<td class='main2'><b class='reg'>Attack Power</b></td>
  		<td class='main2'><b class='reg'>Speed</b></td>
		<td class='main2'><b class='reg'>Defense</b></td>
	<tr>				  
  		<td class='inner' align='center'><b class='reg'>Golem</b></td>
		<td class='inner' align='center'>Knuckle of Doom</td>
		<td class='inner' align='center'>38</td>
		<td class='inner' align='center'>20</td>
		<td class='inner' align='center'>20</td>
	<tr>				  
  		<td class='inner' align='center'><b class='reg'>Iron Golem</b></td>
		<td class='inner' align='center'>Iron Fist</td>
		<td class='inner' align='center'>50</td>
		<td class='inner' align='center'>25</td>
		<td class='inner' align='center'>25</td>
</table>	

</TD>
</TR>
</TABLE>
</BODY>
</HTML>";
?>