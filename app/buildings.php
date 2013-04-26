<?	 

include("include/igtop.php");
echo "<center><b class=reg>| <a href=dbuildings.php> -Demolish- </a> | </b></center><br>";
	

if(!IsSet($update))	{
	include("include/S_BUILD.php");
}
else	{

	include("include/nexplode.php");

	if($ulmill > 0 AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You can't construct Lumber Mills, because you haven't researched Archery yet!</font></div>";
		include("include/S_BUILD.php");
		die();
	}
	elseif($amts < $ugm + $uim)	{
		echo"<div align=center><font class=yellow>Not enough mountains!.</font></div>";
		include("include/S_BUILD.php");
		die();
	}
	elseif($uhome < 0 OR $ubarrack < 0 OR $ufarm < 0 OR $ulmill < 0 OR $uwp < 0 OR $ugm < 0 OR $uim < 0)	{
		echo"<div align=center><font class=yellow>You can't build negative or 0 buildings.</font></div>"; 
		include("include/S_BUILD.php");
		die();
	}
	elseif($aland < $uhome + $ubarrack + $ufarm + $uwp + $ulmill)	{
		echo"<div align=center><font class=yellow>Not enough land!</font></div>";
		include("include/S_BUILD.php");
		die();
	}
	elseif($gp < ($bm_cost * ($ugm + $uim)) + ($b_cost * ($ufarm + $ubarrack + $uhome + $uwp + $ulmill)))	{
		echo"<div align=center><font class=yellow>Not enough gold!</font></div>";
		include("include/S_BUILD.php");
		die();
	} 

	$gp = $gp -  (($bm_cost * ($ugm + $uim)) + ($b_cost * ($ufarm + $ubarrack + $uhome + $uwp + $ulmill)));
	$gp = round($gp);
	 
	$amts = $amts - ($ugm + $uim);
	$aland = $aland - ($uhome + $ubarrack + $ufarm + $uwp + $ulmill);

	$forexp2 = $exp2 + (($uhome + $ubarrack + $ufarm + $uwp + $ulmill) * $landexp) + (($ugm + $uim) * $mtexp); 

	$dhome = $dhome + $uhome;
	$dbarrack = $dbarrack + $ubarrack;
	$dfarm = $dfarm + $ufarm;
	$dwp = $dwp + $uwp;
	$dlmill = $dlmill + $ulmill;
	$dgm = $dgm + $ugm;
	$dim = $dim + $uim;
	$max_land = $max_land - ($uhome + $ubarrack + $ufarm + $ulmill + $uwp);
	$max_mt = $max_mt - ($ugm + $uim);

	mysql_query("UPDATE user SET gp ='$gp' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE user SET exp2 ='$forexp2' WHERE email='$email' AND pw='$pw'");  
	  	
	mysql_query("UPDATE buildings SET amts='$amts' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET dgm='$dgm' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET dim='$dim' WHERE email='$email' AND pw='$pw'");

	mysql_query("UPDATE buildings SET aland='$aland' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET dhome='$dhome' WHERE email='$email' AND pw='$pw'");  
	mysql_query("UPDATE buildings SET dbarrack='$dbarrack' WHERE email='$email' AND pw='$pw'");  
	mysql_query("UPDATE buildings SET dfarm= '$dfarm' WHERE email='$email' AND pw='$pw'"); 
	mysql_query("UPDATE buildings SET dwp='$dwp' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET dlmill='$dlmill' WHERE email='$email' AND pw='$pw'");

//	determines how long building are under development

##	homes
	if($uhome >= 20)	{	$Hhrs = 20;	 }
	elseif($uhome < 20)	{	$Hhrs = $Hhrs + $uhome;	}
	elseif($Hhrs > 20)	 {	$Hhrs = 20;	 }
##	barracks
	if($ubarrack >= 20)	{	$Bhrs = 20;	 }
	elseif($ubarrack < 20)	{	$Bhrs = $Bhrs + $ubarrack;	}
	elseif($Bhrs > 20)	 {	$Bhrs = 20;	 }
##	farms
	if($ufarm >= 20)	{	$Fhrs = 20;	 }
	elseif($ufarm < 20)	{	$Fhrs = $Fhrs + $ufarm;	}
	elseif($Fhrs > 20)	 {	$Fhrs = 20;	 }
##	wooden platforms	
	if($uwp >= 20)	 {	$Whrs = 20;	}
	elseif($uwp < 20)	 {	$Whrs = $Whrs + $uwp;	}
	elseif($Whrs > 20)	{	$Whrs = 20;	}
##	lumber mills
	if($ulmill >= 20)	{	$Lhrs = 20;	 }
	elseif($ulmill < 20)	{	$Lhrs = $Lhrs + $ulmill;	}
	elseif($Lhrs > 20)	 {	$Lhrs = 20;	 }
##	gold mines	
	if($ugm >= 20)	 {	$Ghrs = 20;	 }
	elseif($ugm < 20)	 {	$Ghrs = $Ghrs + $ugm;	}
	elseif($Ghrs > 20)	 {	$Ghrs = 20;	 }
##	iron mines
	if($uim >= 20)	{	$Ihrs = 20;	}
	elseif($uim < 20)	{	$Ihrs = $Ihrs + $uim;	}
	elseif($Ihrs > 20)	{	$Ihrs = 20;	}

If($Hhrs > 20)	{	$Hhrs = 20;	 }
If($Bhrs > 20)	{	$Bhrs = 20;	 }
If($Fhrs > 20)	{	$Fhrs = 20;	 }
If($Whrs > 20)	 {	$Whrs = 20;	}
If($Lhrs > 20)	{	$Lhrs = 20;	 }
If($Ghrs > 20)	{	$Ghrs = 20;	 }
If($Ihrs > 20)	{	$Ihrs = 20;	}

	mysql_query("UPDATE buildings SET Hhrs ='$Hhrs' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET Bhrs ='$Bhrs' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET Fhrs ='$Fhrs' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET Whrs ='$Whrs' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE buildings SET Lhrs ='$Lhrs' WHERE email='$email' AND pw='$pw'");	
	mysql_query("UPDATE buildings SET Ghrs ='$Ghrs' WHERE email='$email' AND pw='$pw'");	
	mysql_query("UPDATE buildings SET Ihrs ='$Ihrs' WHERE email='$email' AND pw='$pw'");
					
	echo"<div align=center><font class=yellow>Your orders have been carried out.</font></div>";
	include("include/S_BUILD.php");
	die();
}
?>
</td>
</tr>
</table>
</body>
</html>