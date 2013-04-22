<?php include("include/igtop.php");?>

<center>
 <form type=post action="intel.php">
  <b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
   <input type="hidden" name="setchg" value="1">
   <input type="submit" value="Change">
  </form>
 <br>
<br>

<?php
	if(!IsSet($gather))
{
  ?> 

<? include("include/S_INTEL.php"); ?>

<?php
}
else
{
		

	include("include/nexplode.php");

	if($safemode > 0)
		{echo"<div align=center><font class=yellow>You cannot thieve while in safe mode.</font></div>";include("include/attack/mdrop.php");include("include/attack/table.php");die();
		}
	elseif($empvalue == ns)
		{echo"<div align=center><font class=yellow>You did not specify anyone to gather information on.</font></div>"; include("include/S_INTEL.php");die();
		}
	elseif($send == "")
		{echo"<div align=center><font class=yellow>You did not send any thieves.</font></div>";include("include/S_INTEL.php");die();
		}
	elseif($send <= 0)
		{echo"<div align=center><font class=yellow>You cant send 0 or negative thieves.</font></div>";include("include/S_INTEL.php");die();
		}
	elseif($send > $thieves)
		{echo"<div align=center><font class=yellow>You do not have that many thieves to send.</font></div>";include("include/S_INTEL.php");die();
		}
		else
		{

			include("include/connect.php");
			
			$query = ("SELECT safemode,ename,iron,gp,class,race,lumber,setid FROM user WHERE userid=\"$empvalue\"");
			$result = mysql_query($query);
			$evu = mysql_fetch_array($result);

			$query1 = ("SELECT civ,thieves,warriors,wizards,priests,archers,warpower,wizpower,pripower,archpower FROM military WHERE userid=\"$empvalue\"");
			$result1 = mysql_query($query1);
			$evm = mysql_fetch_array($result1);


			$query2 = ("SELECT wp FROM buildings WHERE userid=\"$empvalue\"");
			$result2 = mysql_query($query2);
			$evb = mysql_fetch_array($result2);

	if($evu[safemode] > 0){echo"<div align=center><font class=yellow>You cannot thieve someone that is in safe mode.</font></div>";include("include/S_INTEL.php");die();}

	if($send < $evm[thieves])
		{echo"<div align=center><font class=yellow>You have failed to gather information on $empireattacked and lost 10% of your thieves.</div></align>";
		
		
				
				mysql_query("UPDATE military SET thieves = round($thieves - ($send * .1)) WHERE email='$email' AND pw='$pw'");
				mysql_query("UPDATE user SET nno = nno + 1 WHERE userid='$empvalue'");
					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>$ename ($setid) has failed to gather information on you</font>\" , '$empvalue') ");
			
			include("include/S_INTEL.php");
			die();
		}
		else
		{
	
		mysql_query("UPDATE military SET thieves = round($thieves - ($send * .03)) WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET nno = nno + 1 WHERE userid='$empvalue'");
		mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>Thieves have gathered intelligence on your empire</font>\" , '$empvalue') ");



	$tempmodifier = 1.00;

	if($evu['class']== Fighter)
		{ $tempmodifier = 1.05; }
	if($evu['class'] == Mage)
		{ $tempmodifier = .95; }

	if($evu[race] == Giant)
		{ $tempmodifier = $tempmodifier + .25;}

	if($evu[race] == Orc)
		{ $tempmodifier = $tempmodifier - .15;
		}

	$evdef = round( ($evm[warriors] * $evm[warpower]) + ($evm[wizards] * $evm[wizpower]) + ($evm[priests] * $evm[pripower]) + ($evm[archers] * $evm[archpower]) + ($evb[wp] * 15) * $tempmodifier);

echo"
		<div align=center><font class=yellow>You have successfully gathered information on $empireattacked and you only lost 3% of your thieves!<font></div><br><br>";
		?>
		The number in () is the power for the unit.<br>
		<table border=1 width=\"40%\ align=center bordercolor=#000000>
		<?
		$evu[gp] = number_format($evu[gp]);
		$evu[iron]=number_format($evu[iron]);
		$evu[lumber]=number_format($evu[lumber]);
		$evm[civ]=number_format($evm[civ]);
		$evm[thieves]=number_format($evm[thieves]);
		$evb[wp]=number_format($evb[wp]);
		$evm[warriors]=number_format($evm[warriors]);
		$evm[wizards]=number_format($evm[wizards]);
		$evm[priests]=number_format($evm[priests]);
		$evm[archers]=number_format($evm[archers]);
		$evdef=number_format($evdef);
		echo"
		<tr>
			<td class=main>Empire stats of $evu[ename] ($evu[setid])</td>
		<tr>
			<td class=inner2>
								Race: $evu[race]<br>
								Class: $evu[class]<br>
								Gold Pieces: $evu[gp]<br>
								Iron: $evu[iron]<br>
								Lumber: $evu[lumber]<br>
								Civilians: $evm[civ]<br>
								Thieves: $evm[thieves]<br>
								Wooden Platforms: $evb[wp]<br>
								Warriors: $evm[warriors] ($evm[warpower])<br>
								Wizards: $evm[wizards] ($evm[wizpower])<br>
								Priests: $evm[priests] ($evm[pripower])<br>
								Archers: $evm[archers] ($evm[archpower])<br>
								Defense: $evdef<br>
			</td>
		</table>
";
		    
				include("include/S_INTEL.php");die();
		}
	
	}
}
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>
<?php
ob_end_flush();
?>