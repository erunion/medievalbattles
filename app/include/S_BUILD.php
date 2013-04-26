<?
if($res[r11pts] >= 100000)	 { $adv_gold_mines = "Adv. Gold Mine"; }
	else	{	$adv_gold_mines = "Gold Mine"; }
if($res[r12pts] >= 100000)	 { $adv_iron_mines = "Adv. Iron Mine"; }
	else	{	$adv_iron_mines = "Iron Mine"; }
if($res[r15pts] >= 100000)	 { $adv_farm_buildings = "Plantation"; }
	else	{	$adv_farm_buildings = "Farm"; }

echo "
<form type='get' action='buildings.php'>
<table border='0' cellpadding='2' cellspacing='0' width='100%' valign='top'>
	<tr>
		<td>
			<table border='1' bordercolor='#000000' align='center' width='80%' cellpadding='0' cellspacing='0'>
				<tr>
					<td colspan='7' class='main'><b class='top'>Land</b></td>
				<tr>
					<td colspan='7' class='main2'>It cost $b_cost gp to construct a building. <br> You have $aland free land to build on.</td>
				<tr>
					<td class='main2'><b class='reg'>Name</b></td>
					<td class='main2'><b class='reg'>Owned</b></td>
					<td class='main2'><b class='reg'>Building</b></td>
					<td class='main2'><b class='reg'>Ticks Left</b></td>
					<td class='main2'><b class='reg'>Maximum</b></td>
					<td class='main2'><b class='reg'>Develop</b></td>
				<tr>
					<td class='inner2'>Home</td>
					<td class='inner2'>$home</td>
					<td class='inner2'>$dhome</td>
					<td class='inner2'>$Hhrs</td>
					<td class='inner2'>$max_land</td>
					<td class='inner2'><input type='number' name='uhome' size='5'></td>
				<tr>
					<td class='inner2'>Barrack</td>
					<td class='inner2'>$barrack</td>
					<td class='inner2'>$dbarrack</td>
					<td class='inner2'>$Bhrs</td>
					<td class='inner2'>$max_land</td>
					<td class='inner2'><input type='number' name='ubarrack' size='5'></td>
				<tr>
					<td class='inner2'>$adv_farm_buildings</td>
					<td class='inner2'>$farm</td>
					<td class='inner2'>$dfarm</td>
					<td class='inner2'>$Fhrs</td>
					<td class='inner2'>$max_land</td>
					<td class='inner2'><input type='number' name='ufarm' size='5'></td>
				<tr>
					<td class='inner2'>Wooden Platform</td>
					<td class='inner2'>$wp</td>
					<td class='inner2'>$dwp</td>
					<td class='inner2'>$Whrs</td>
					<td class='inner2'>$max_land</td>
					<td class='inner2'><input type='number' name='uwp' size='5'></td>";
if($res[r13pts] >= 125000)	 {
	echo"
				<tr>
					<td class='inner2'>Lumber Mill</td>
					<td class='inner2'>$lmill</td>
					<td class='inner2'>$dlmill</td>
					<td class='inner2'>$Lhrs</td>
					<td class='inner2'>$max_land</td>
					<td class='inner2'><input type='number' name='ulmill' size='5'></td> ";
}
echo "
			</table>
<br>
			<table border='1' bordercolor='#000000' align='center' width='80%' cellpadding='0' cellspacing='0'>
				<tr>
					<td colspan='7' class='main'><b class='top'>Mountains</b></td>
				<tr>
					<td colspan='7' class='main2'>It costs $bm_cost gp to construct a mine.<br>You have $amts free mines to build on.</td>
				<tr>
					<td class='main2'><b class='reg'>Name</b></td>
					<td class='main2'><b class='reg'>Owned</b></td>
					<td class='main2'><b class='reg'>Building</b></td>
					<td class='main2'><b class='reg'>Ticks Left</b></td>
					<td class='main2'><b class='reg'>Maximum</b></td>
					<td class='main2'><b class='reg'>Develop</b></td>
				<tr>
					<td class='inner2'>$adv_gold_mines</td>
					<td class='inner2'>$gm</td>
					<td class='inner2'>$dgm</td>
					<td class='inner2'>$Ghrs</td>
					<td class='inner2'>$max_mt</td>
					<td class='inner2'><input type='number' name='ugm' size='5'>
				<tr>
					<td class='inner2'>$adv_iron_mines</td>
					<td class='inner2'>$im</td>
					<td class='inner2'>$dim</td>
					<td class='inner2'>$Ghrs</td>
					<td class='inner2'>$max_mt</td>
					<td class='inner2'><input type='number' name='uim' size='5'></td>
				</tr>
			</table>
<br>  
<center>
<input class='button' type='submit' name='develop' value='Develop Buildings'>
<input type='hidden' name='update' value='1'> 
</center>"; 

?>
	