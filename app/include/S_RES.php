	<form method=post action="research.php">
			<table border="0" bordercolor="#808080" align=center width="80%">
				<tr><td colspan=7 class=main><b class=top>Research</b></td>
				<tr><td colspan=7 class=main2>You currently have <?php  echo"$ascientists"; ?> scientists to send out to research</td>
				<tr>
					<td class=main2><b class=reg></b></td>
					<td class=main2><b class=reg>Topic</b></td>
					<td class=main2><b class=reg>Type</b></td>
					<td class=main2><b class=reg>Scientists Researching</b></td>
					<td class=main2><b class=reg>Progress</b></td>

					<td class=main2><b class=reg>Scientists to send</b></td>
<?
include("include/connect.php");
// select research items	
$research_query = "SELECT * FROM research WHERE email='$email' AND pw= '$pw'";
$res_query = mysql_db_query($dbnam, $research_query) or die("Error: " . mysql_error());
$res = mysql_fetch_array($res_query);

// fireball
	$fireball  = "$res[r1pts]" . "/50,000";
		if($res[r1pts] >= 50000)	{	$fireball = "<i>Done</i>";	}
	$res[r1pts] = number_format($res[r1pts]);
// ice storm
	$ice_storm = "$res[r2pts]" . "/100,000";
		if($res[r2pts] >= 100000)	 { $ice_storm = "<i>Done</i>"; }
	$res[r2pts] = number_format($res[r2pts]);
// wall of fire
	$wall_of_fire = "$res[r3pts]" . "/200,000";
		if($res[r3pts] >= 200000)	 { $wall_of_fire = "<i>Done</i>"; }
	$res[r3pts] = number_format($res[r3pts]);
// wall of ice
	$wall_of_ice = "$res[r4pts]" . "/300,000";
		if($res[r4pts] >= 300000)	 { $wall_of_ice = "<i>Done</i>"; }
	$res[r4pts] = number_format($res[r4pts]);
// chain lightning
	$chain_lightning = "$res[r5pts]" . "/400,000";
		if($res[r5pts] >= 400000)	 { $chain_lightning = "<i>Done</i>"; }
	$res[r5pts] = number_format($res[r5pts]);
// gust of wind
	$gust_of_wind = "$res[r6pts]" . "/500,000";
		if($res[r6pts] >= 500000)	 { $gust_of_wind = "<i>Done</i>"; }
	$res[r6pts] = number_format($res[r6pts]);
// flaming sphere
	$flaming_sphere = "$res[r7pts]" . "/600,000";
		if($res[r7pts] >= 600000)	 { $flaming_sphere = "<i>Done</i>"; }
	$res[r7pts] = number_format($res[r7pts]);
// cloud kill
	$cloud_kill = "$res[r8pts]" . "/700,000";
		if($res[r8pts] >= 700000)	 { $cloud_kill =" <i>Done</i>"; }
	$res[r8pts] = number_format($res[r8pts]);
// lightning bolt
	$lightning_bolt = "$res[r9pts]" . "/800,000";
		if($res[r9pts] >= 800000)	 { $lightning_bolt = "<i>Done</i>"; }
	$res[r9pts] = number_format($res[r9pts]);
// meteor swarm
	$meteor_swarm = "$res[r10pts]" . "/900,000";
		if($res[r10pts] >= 900000)	 { $meteor_swarm = "<i>Done</i>"; }
	$res[r10pts] = number_format($res[r10pts]);
// advanced gold mining
	$adv_gold = "$res[r11pts]". "/100,000";
		if($res[r11pts] >= 100000)	 { $adv_gold = "<i>Done</i>"; }
	$res[r11pts] = number_format($res[r11pts]);
// advanced iron mining
	$adv_iron = "$res[r12pts]" . "/100,000";
		if($res[r12pts] >= 100000)	 { $adv_iron = "<i>Done</i>"; }
	$res[r12pts] = number_format($res[r12pts]);
// archery
	$archery = "$res[r13pts]" . "/125,000";
		if($res[r13pts] >= 125000)	 { $archery = "<i>Done</i>"; }
	$res[r13pts] = number_format($res[r13pts]);
?>

<?
if($race != Giant AND $class != Ranger)	{
echo"
	<tr>
		<td>1</td>
		<td class=inner2>Fireball</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r1]</td>
		<td class=inner2>$fireball</td>
		<td class=inner2><input type=number name=ur1 size=5 maxlength=10></td>
	<tr>
		<td>2</td>
		<td class=inner2>Ice Storm</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r2]</td>
		<td class=inner2>$ice_storm</td>
		<td class=inner2><input type=number name=ur2 size=5 maxlength=10></td>
	<tr>
		<td>3</td>
		<td class=inner2>Wall of Fire</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r3]</td>
		<td class=inner2>$wall_of_fire</td>
		<td class=inner2><input type=number name=ur3 size=5 maxlength=10></td>
	<tr>
		<td>4</td>
		<td class=inner2>Wall of Ice</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r4]</td>
		<td class=inner2>$wall_of_ice</td>
		<td class=inner2><input type=number name=ur4 size=5 maxlength=10></td>
	<tr>
		<td>5</td>
		<td class=inner2>Chain Lightning</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r5]</td>
		<td class=inner2>$chain_lightning</td>
		<td class=inner2><input type=number name=ur5 size=5 maxlength=10></td>
	<tr>
		<td>6</td>
		<td class=inner2>Gust of Wind</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r6]</td>
		<td class=inner2>$gust_of_wind</td>
		<td class=inner2><input type=number name=ur6 size=5 maxlength=10></td>
	<tr>
		<td>7</td>
		<td class=inner2>Flaming Sphere</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r7]</td>
		<td class=inner2>$flaming_sphere</td>
		<td class=inner2><input type=number name=ur7 size=5 maxlength=10></td>";
if($class == Mage)	{ 
echo"
	<tr>
		<td>8</td>
		<td class=inner2>Cloud Kill</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r8]</td>
		<td class=inner2>$cloud_kill</td>
		<td class=inner2><input type=number name=ur8 size=5 maxlength=10></td>
	<tr>
		<td>9</td>
		<td class=inner2>Lightning Bolt</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r9]</td>
		<td class=inner2>$lightning_bolt</td>
		<td class=inner2><input type=number name=ur9 size=5 maxlength=10></td>
	<tr>
		<td>10</td>
		<td class=inner2>Meteor Swarm</td>
		<td class=inner2>Magic</td>
		<td class=inner2>$res[r10]</td>
		<td class=inner2>$meteor_swarm</td>
		<td class=inner2><input type=number name=ur10 size=5 maxlength=10></td>";
	}
} 
?>
	<tr>
		<td><?	if($class == Mage)	{	echo "11";	}	elseif($race == Giant)	{	echo "1";	}	else	{	echo "8";	}	?></td>
		<td class=inner2>Advanced Gold Mining</td>
		<td class=inner2>Empire</td>
		<td class=inner2><?php echo "$res[r11]"; ?></td>
		<td class=inner2><?php echo "$adv_gold";?></td>
		<td class=inner2><input type="number" name="ur11" size=5 maxlength=10></td>
	<tr>
		<td><?	if($class == Mage)	{	echo "12";	}	elseif($race == Giant)	{	echo "2";	}	else	{	echo "9";	}	?></td>
		<td class=inner2>Advanced Iron Mining</td>
		<td class=inner2>Empire</td>
		<td class=inner2><?php echo "$res[r12]"; ?></td>
		<td class=inner2><?php echo "$adv_iron"; ?></td>
		<td class=inner2><input type="number" name="ur12" size=5 maxlength=10></td>
	<tr>
		<td><?	if($class == Mage)	{	echo "13";	}	elseif($race == Giant)	{	echo "3";	}	else	{	echo "10";	}	?></td>
		<td class=inner2>Archery</td>
		<td class=inner2>Unit</td>
		<td class=inner2><?php echo "$res[r13]"; ?></td>
		<td class=inner2><?php echo "$archery"; ?></td>
		<td class=inner2><input type="number" name="ur13" size=5 maxlength=10></td>
</table>
	<br><br>
						

	<center><input class=button type="submit" name="first" value="Research">
				<input type="hidden" name="first" value=1></center>
					</form>