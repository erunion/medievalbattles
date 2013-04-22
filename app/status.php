<?php include("include/igtop.php");?>

<center> <b class=reg> | <a href="status.php?pageid=production"> -Production- </a> |  <a href="status.php?pageid=parties"> -Parties- </a> | <a href="status.php?pageid=building"> -Building- </a> | <a href="status.php?pageid=training"> -Training- </a> | </b></center><br>				
<center><font class=yellow>At the status page, you can see how your empire is doing and what is in development</font></center><br>

<? 
if ($pageid == 'production')	{
	$civ = implode("", explode(",", $civ));
	$food = implode("", explode(",", $food));
	$home = implode("", explode(",", $home));

	if($civ  > $food)	{
		$civstatus = "dieing, you need more food, so build more farms.";
	}
	elseif($civ > $home * 20)	{
		$civstatus = "dieing, you need more homes.";
	}
	elseif($civ > $home * 20 AND $civ > $food)	{
		$civstatus = "dieing, you need more homes and farms.";
	}
	else	{
		$civstatus = "doing well.";
	}
		
	$bnum = 50;
	if($race == Human)	{
		$bnum = 35;
	}

	$barrack = implode("", explode(",", $barrack));
	$dbwar = implode("", explode(",", $dbwar));
	$dbwar2 = implode("", explode(",", $dbwar2));
	$dbpri = implode("", explode(",", $dbpri));
	$dbpri2 = implode("", explode(",", $dbpri2));
	$dbarch = implode("", explode(",", $dbarch));
	$dbarch2 = implode("", explode(",", $dbarch2));
	$dbwiz = implode("", explode(",", $dbwiz));
	$dbwiz2 = implode("", explode(",", $dbwiz2));
	$twarriors = implode("", explode(",", $twarriors));
	$twizards = implode("", explode(",", $twizards));
	$tpriests = implode("", explode(",", $tpriests));
	$tarchers = implode("", explode(",", $tarchers));

	if($barrack * $bnum >= $totalunits = ($twarriors + $twizards + $tpriests + $tarchers + $dbwar2 + $dbwar + $dbwiz2 + $dbwiz + $dbpri2 + $dbpri + $dbarch2 + $dbarch))	{
		$spaceleft = ($barrack * $bnum) - $totalunits; $barrackstatus = "You have enough space in your barracks to hold $spaceleft more units.";
	}
	else	{
		$spaceleft = $totalunits - ($barrack * $bnum); $barrackstatus = "Your barracks are crowded with $spaceleft extra units.  You must construct more barracks.";
	}
	echo "<br><font class=orange><div align=center>Your civilians are $civstatus<br></font></div>";
	echo "<font class=orange><div align=center>$barrackstatus<br><br></div></font>";
?>
			<table border="0" bordercolor="#808080" align=center width="40%">
				<tr>
				  <td class=main colspan=2><b class=reg>Empire Status</b></td>
				<tr>
				  <td class=main2><b class=top>Type</b><td class=main2><b class=top>Per Tick</b>
				<tr>
					<td class=inner><b class=reg>Iron Production</b></td>
					<td class=inner2><? echo"$imhourly"; ?></td>
				<tr>
					<td class=inner><b class=reg>Gold Production</b></td>
					<td class=inner2><? echo"$gmhourly"; ?></td>
				<tr>
					<td class=inner><b class=reg>New Civilians </b></td>
					<td class=inner2><? echo"$civhourly"; ?></td>
				<tr>
					<td class=inner><b class=reg>New Recruits </b></td>
					<td class=inner2><? echo"$rechourly"; ?></td>
				<tr>
					<td class=inner><b class=reg>Food Production</b></td>
					<td class=inner2><? echo"$foodhourly"; ?></td>
		<? 
			if($res[r13pts] >= 125000)	 {
				echo "
				<tr>
					<td class=inner><b class=reg>Lumber Production</b></td>
					<td class=inner2>$woodhourly</td>
				";
			}
		?>
			</table>
<? 
}
if ($pageid == 'building')	 {
?>

		<table border="0" bordercolor="#808080" width="60%" align=center>
			
				<tr>
				  <td class=main colspan=9><b class=reg>Building Creation Status</b></td>
				
				<tr>
				  <td class=main2 colspan=9>The first number is how many are being built and the number in "()" is how many hours is left until it is built.</td>
				
				<tr align=center>
					<td class=main2><b class=reg>Home</b></td>
					<td class=main2><b class=reg>Barrack</b></td>
					<td class=main2><b class=reg>Farm</b></td>
					<? if($race!= Orc)	{	echo "<td class=main2><b class=reg>Wooden Platform</b></td>";	}	?>
					<td class=main2><b class=reg>Gold Mine</b></td>
					<td class=main2><b class=reg>Iron Mine</b></td>
					<? if($res[r13pts] >= 125000)	 {	echo "<td class=main2><b class=reg>Lumber Mill</td>";	}	?>

				<tr align=center>	
					<td class=inner2><? echo"$dhome ($Hhrs)"; ?></td>	
					<td class=inner2><? echo"$dbarrack ($Bhrs)"; ?></td>
					<td class=inner2><? echo"$dfarm ($Fhrs)"; ?></td>
					<? if($race != Orc)	{	echo "<td class=inner2>$dwp ($Whrs)</td>";	}	?>
					<td class=inner2><? echo"$dgm($Ghrs)"; ?></td>
					<td class=inner2><? echo"$dim($Ihrs)"; ?></td>
					<? if($res[r13pts] >= 125000)	 {	echo"<td class=inner2>$dlmill($Lhrs)</td>";	}	?>
		</table>

<? 
}
if ($pageid == 'training')	 {
?>
	
<table border=0 bordercolor="#808080" align=center width="60%">
	  <tr>
	    <td class=main colspan=5><b class=reg>Training Status</b></td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>Training (1 tick)</b></td>
		<td class=main2><b class=reg>Training (2 ticks)</b></td>
	  <tr> 
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? echo"$dbwar"; ?></td>
		<td class=inner2><? echo"$dbwar2"; ?></td>
<? if($race != Giant)	 {
	echo "
	  <tr>
		<td class=inner2><b class=reg>Wizard</td>
		<td class=inner2>$dbwiz</td>
		<td class=inner2>$dbwiz2</td>
	  <tr>
		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>$dbpri</td>
		<td class=inner2>$dbpri2</td>
		";
	  } 
	  if($res[r13pts] >= 125000)	{
	echo "
	  <tr>
		<td class=inner2><b class=reg>Archer</td>
		<td class=inner2>$dbarch</td>
		<td class=inner2>$dbarch2</td>
		";
	  }  
?>

	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2 colspan=2><b class=reg>Training (1 tick)</b></td>
	  <tr> 
		<td class=inner2><b class=reg>Scientist</b></td>
		<td class=inner2 colspan=2><? echo"$dbscientist"; ?></td>
	  <tr>
		<td class=inner2><b class=reg>Thief</b></td>
		<td class=inner2 colspan=2><? echo"$dbthief"; ?></td>
	  <tr>
		<td class=inner2><b class=reg>Explorer</b></td>
		<td class=inner2 colspan=2><? echo"$dbexplorer"; ?></td>
	</table>
<? 
	}
if ($pageid == 'parties')	{
?>
	
	<table border=0 bordercolor="#808080" align=center width="60%">
	  <tr>
	    <td class=main colspan=5><b class=reg>Party Status</b></td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>Status</b></td>
		<td class=main2><b class=reg>Amount</b></td>
	  <tr> 
	    <td class=main2 colspan=3><b class=reg>Party 1</b></td>
	  <tr>
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? if($WAR_4 > 0 OR  $WIZ_4 > 0 OR $PRI_4 > 0 OR $ARCH_4 > 0 OR $TIME_4 > 0){echo"Returning ($TIME_4 ticks)";}else{echo"Defending";} ?></td>
		<td class=inner2><? if($TIME_4 == 0){echo"---";}else{echo"$WAR_4";} ?></td>

<? if($race != Giant)	 {	
	echo"
	  <tr>	
		<td class=inner2><b class=reg>Wizard</b></td>
		<td class=inner2>"; if($WAR_4 > 0 OR  $WIZ_4 > 0 OR $PRI_4 > 0 OR $ARCH_4 > 0 OR $TIME_4 > 0){echo"Returning ($TIME_4 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_4 == 0){echo"---";}else{echo"$WIZ_4";}echo"</td>
	  <tr>	
		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>"; if($WAR_4 > 0 OR  $WIZ_4 > 0 OR $PRI_4 > 0 OR $ARCH_4 > 0 OR $TIME_4 > 0){echo"Returning ($TIME_4 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_4 == 0){echo"---";}else{echo"$PRI_4";} echo"</td>
	";
}
if($res[r13pts] >= 125000)	 {
	echo"
	<tr>	
		<td class=inner2><b class=reg>Archer</b></td>
		<td class=inner2> "; if($WAR_4 > 0 OR  $WIZ_4 > 0 OR $PRI_4 > 0 OR $ARCH_4 > 0 OR $TIME_4 > 0){echo"Returning ($TIME_4 ticks)";}else{echo"Defending";} echo"</td>";
	echo"<td class=inner2>"; if($TIME_4 == 0){echo"---";}else{echo"$ARCH_4";} echo"</td>";
}
?>

	 <tr> 
	    <td class=main2 colspan=3><b class=reg>Party 2</b></td>
	 <tr>
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? if($WAR_3 > 0 OR  $WIZ_3 > 0 OR $PRI_3 > 0 OR $ARCH_3 > 0 OR $TIME_3 > 0){echo"Returning ($TIME_3 ticks)";}else{echo"Defending";} ?></td>
		<td class=inner2><? if($TIME_3 == 0){echo"---";}else{echo"$WAR_3";} ?></td>
<? if($race != Giant)	 {	
		echo"
	 <tr>	
		<td class=inner2><b class=reg>Wizard</b></td>
		<td class=inner2>"; if($WAR_3 > 0 OR  $WIZ_3 > 0 OR $PRI_3 > 0 OR $ARCH_3 > 0 OR $TIME_3 > 0){echo"Returning ($TIME_3 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_3 == 0){echo"---";}else{echo"$WIZ_3";}echo"</td>
	 <tr>	
		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>"; if($WAR_3 > 0 OR  $WIZ_3 > 0 OR $PRI_3 > 0 OR $ARCH_3 > 0 OR $TIME_3 > 0){echo"Returning ($TIME_3 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_3 == 0){echo"---";}else{echo"$PRI_3";}echo"</td>";
	}
?>

	<? if($res[r13pts] >= 125000){
	echo"
	<tr>	
		<td class=inner2><b class=reg>Archer</b></td>
		<td class=inner2> "; if($WAR_3 > 0 OR  $WIZ_3 > 0 OR $PRI_3 > 0 OR $ARCH_3 > 0 OR $TIME_3 > 0){echo"Returning ($TIME_3 ticks)";}else{echo"Defending";} echo"</td>";
   echo"<td class=inner2>"; if($TIME_3 == 0){echo"---";}else{echo"$ARCH_3";} echo"</td>";
}
?>


	 <tr> 
	    <td class=main2 colspan=3><b class=reg>Party 3</b></td>
	 <tr>
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? if($WAR_2 > 0 OR  $WIZ_2 > 0 OR $PRI_2 > 0 OR $ARCH_2 > 0 OR $TIME_2 > 0){echo"Returning ($TIME_2 ticks)";}else{echo"Defending";} ?></td>
		<td class=inner2><? if($TIME_2 == 0){echo"---";}else{echo"$WAR_2";} ?></td>
<? if($race != Giant){echo"
	 <tr>	
		<td class=inner2><b class=reg>Wizard</b></td>
		<td class=inner2>"; if($WAR_2 > 0 OR  $WIZ_2 > 0 OR $PRI_2 > 0 OR $ARCH_2 > 0 OR $TIME_2 > 0){echo"Returning ($TIME_2 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_2 == 0){echo"---";}else{echo"$WIZ_2";}echo"</td>
	 <tr>	
		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>"; if($WAR_2 > 0 OR  $WIZ_2 > 0 OR $PRI_2 > 0 OR $ARCH_2 > 0 OR $TIME_2 > 0){echo"Returning ($TIME_2 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_2 == 0){echo"---";}else{echo"$PRI_2";} echo"</td>";
	 }
?>

<? if($res[r13pts] >= 125000){
	echo"
	<tr>	
		<td class=inner2><b class=reg>Archer</b></td>
		<td class=inner2> "; if($WAR_2 > 0 OR  $WIZ_2 > 0 OR $PRI_2 > 0 OR $ARCH_2 > 0 OR $TIME_2 > 0){echo"Returning ($TIME_2 ticks)";}else{echo"Defending";} echo"</td>";
   echo"<td class=inner2>"; if($TIME_2 == 0){echo"---";}else{echo"$ARCH_2";} echo"</td>";
}
?>

	 <tr> 
	    <td class=main2 colspan=3><b class=reg>Party 4</b></td>
	 <tr>
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? if($WAR_1 > 0 OR  $WIZ_1 > 0 OR $PRI_1 > 0 OR $ARCH_1 > 0 OR $TIME_1 > 0){echo"Returning ($TIME_1 ticks)";}else{echo"Defending";} ?></td>
		<td class=inner2><? if($TIME_1 == 0){echo"---";}else{echo"$WAR_1";} ?></td>
<? if($race != Giant){echo"	 
	 <tr>	
		<td class=inner2><b class=reg>Wizard</b></td>
		<td class=inner2>"; if($WAR_1 > 0 OR  $WIZ_1 > 0 OR $PRI_1 > 0 OR $ARCH_1 > 0 OR $TIME_1 > 0){echo"Returning ($TIME_1 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_1 == 0){echo"---";}else{echo"$WIZ_1";}echo"</td>
	 <tr>	
		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>"; if($WAR_1 > 0 OR  $WIZ_1 > 0 OR $PRI_1 > 0 OR $ARCH_1 > 0 OR $TIME_1 > 0){echo"Returning ($TIME_1 ticks)";}else{echo"Defending";}echo"</td>
		<td class=inner2>"; if($TIME_1 == 0){echo"---";}else{echo"$PRI_1";} echo"</td>";
	 }
?>

<? if($res[r13pts] >= 125000){
echo"
	<tr>	
		<td class=inner2><b class=reg>Archer</b></td>
		<td class=inner2> "; if($WAR_1 > 0 OR  $WIZ_1 > 0 OR $PRI_1 > 0 OR $ARCH_1 > 0 OR $TIME_1 > 0){echo"Returning ($TIME_1 ticks)";}else{echo"Defending";} echo"</td>";
   echo"<td class=inner2>"; if($TIME_1 == 0){echo"---";}else{echo"$ARCH_1";} echo"</td>";
}
?>

</table>

<? } ?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>
