<?php include("include/igtop.php");?>

<center><b class=reg>| <a href="dbuildings.php"> -Demolish- </a> | </b></center><br>
	
	
<?php
	if(!IsSet($update))
{
  ?> 

				<? include("include/S_BUILD.php"); ?>

<?php
}
else
{
	include("include/nexplode.php");

	if($ulmill > 0 AND $res[r13pts] < 125000)
		{echo"<div align=center><font class=yellow>You have to research Archery before this building becomes available for construction.</font></div>";include("include/S_BUILD.php");die();
		}
	elseif($amts < $ugm + $uim) 
		{echo"<div align=center><font class=yellow>You do not have enough available mountains to build on.</font></div>";include("include/S_BUILD.php");die();
		}
	elseif($uhome < 0 OR $ubarrack < 0 OR $ufarm < 0 OR $uwp < 0 OR $ugm < 0 OR $uim < 0 )
		{echo"<div align=center><font class=yellow>You cannot build negative or 0 buildings.</font></div>"; include("include/S_BUILD.php");die();
		}
	elseif($aland < $uhome + $ubarrack + $ufarm + $uwp)
		{echo"<div align=center><font class=yellow>You do not have enough available land to build on.</font></div>";include("include/S_BUILD.php");die();
		}
	elseif($gp < ($bm_cost * ($ugm + $uim)) + ($b_cost * ($ufarm + $ubarrack + $uhome + $uwp + $ulmill)))
		{echo"<div align=center><font class=yellow>You do not have enough gold to carry out your orders.</font></div>";include("include/S_BUILD.php");die();
		} 
	elseif($uwp > 0 AND $race == Orc)
		{echo"<div align=center><font class=yellow>Being that you are an orc, you cannot construct the wooden platform.</font></div>";include("include/S_BUILD.php");die();
		}
		
			include("include/connect.php");
	
			$gp = $gp -  (($bm_cost * ($ugm + $uim)) + ($b_cost * ($ufarm + $ubarrack + $uhome + $uwp + $ulmill)));
	 		$gp =round($gp);
	 
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

	 		mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE user SET exp2 =\"$forexp2\" WHERE email='$email' AND pw='$pw'");  
	  	
	  		mysql_query("UPDATE buildings SET amts =\"$amts\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET dhome =\"$dhome\" WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE buildings SET dbarrack =\"$dbarrack\" WHERE email='$email' AND pw='$pw'");  
	  		mysql_query("UPDATE buildings SET dfarm = \"$dfarm\"WHERE email='$email' AND pw='$pw'"); 
	  		mysql_query("UPDATE buildings SET dwp =\"$dwp\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE buildings SET dlmill =\"$dlmill\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET aland =\"$aland\" WHERE email='$email' AND pw='$pw'");
	 		mysql_query("UPDATE buildings SET dgm =\"$dgm\" WHERE email='$email' AND pw='$pw'");
	  		mysql_query("UPDATE buildings SET dim =\"$dim\" WHERE email='$email' AND pw='$pw'");
			
		//DETERMINES HRS UNTIL BUILDINGS ARE BUILT
				if($uhome >= 20)
					{$Hhrs = 20;
					}
					elseif($uhome < 20)
						{$Hhrs = $Hhrs + $uhome;
						}
						elseif($Hhrs > 20)
							{$Hhrs = 20;
							}
				if($ubarrack >= 20)
					{$Bhrs = 20;
					}
					elseif($ubarrack < 20)
						{$Bhrs = $Bhrs + $ubarrack;
						}
						elseif($Bhrs > 20)
							{$Bhrs = 20;
							}
				if($ufarm >= 20)
					{$Fhrs = 20;
					}
					elseif($ufarm < 20)
						{$Fhrs = $Fhrs + $ufarm;
						}
						elseif($Fhrs > 20)
							{$Fhrs = 20;
							}
				if($uwp >= 20)
					{$Whrs = 20;
					}
					elseif($uwp < 20)
						{$Whrs = $Whrs + $uwp;
						}
						elseif($Whrs > 20)
							{$Whrs = 20;
							}
				if($ulmill >= 20)
					{$Lhrs = 20;
					}
					elseif($ulmill < 20)
						{$Lhrs = $Lhrs + $ulmill;
						}
						elseif($Lhrs > 20)
							{$Lhrs = 20;
							}
				if($ugm >= 20)
					{$Ghrs = 20;
					}
					elseif($ugm < 20)
						{$Ghrs = $Ghrs + $ugm;
						}
						elseif($Ghrs > 20)
							{$Ghrs = 20;
							}
				if($uim >= 20)
					{$Ihrs = 20;
					}
					elseif($uim < 20)
						{$Ihrs = $Ihrs + $uim;
						}
						elseif($Ihrs > 20)
							{$Ihrs = 20;
							}

							If($Hhrs > 20)
								{$Hhrs = 20;}
							If($Bhrs > 20)
								{$Bhrs = 20;}
							If($Fhrs > 20)
								{$Fhrs = 20;}
							If($Whrs > 20)
								{$Whrs = 20;}
							If($Lhrs > 20)
								{$Lhrs = 20;}
							If($Ghrs > 20)
								{$Ghrs = 20;}
							If($Ihrs > 20)
								{$Ihrs = 20;}

							mysql_query("UPDATE buildings SET Hhrs =\"$Hhrs\" WHERE email='$email' AND pw='$pw'");
							mysql_query("UPDATE buildings SET Bhrs =\"$Bhrs\" WHERE email='$email' AND pw='$pw'");
							mysql_query("UPDATE buildings SET Fhrs =\"$Fhrs\" WHERE email='$email' AND pw='$pw'");
							mysql_query("UPDATE buildings SET Whrs =\"$Whrs\" WHERE email='$email' AND pw='$pw'");
							mysql_query("UPDATE buildings SET Lhrs =\"$Lhrs\" WHERE email='$email' AND pw='$pw'");	
							mysql_query("UPDATE buildings SET Ghrs =\"$Ghrs\" WHERE email='$email' AND pw='$pw'");	
							mysql_query("UPDATE buildings SET Ihrs =\"$Ihrs\" WHERE email='$email' AND pw='$pw'");
					
			echo"<div align=center><font class=yellow>Your orders have been carried out.</font></div>";
			include("include/S_BUILD.php");
			die();
	
			
}
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>