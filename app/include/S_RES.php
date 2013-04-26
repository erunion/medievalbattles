<?
include("include/research_queries.php");

echo "
<form method='post' action='research.php'>
<table border='0' bordercolor='#808080' align='center' width='80%'>
	<tr><td colspan='7' class='main'><b class='top'>Research</b></td>
	<tr><td colspan='7' class='main2'>You currently have $asages Sages to send out to research.</td>
	<tr>
		<td class='main2'><b class='reg'>Item</b></td>
		<td class='main2'><b class='reg'>Type</b></td>
		<td class='main2'><b class='reg'>Sages</b></td>
		<td class='main2'><b class='reg'>Progress</b></td>
		<td class='main2'><b class='reg'>Send Sages</b></td>";

if($race != Giant AND $class != Ranger AND $class != Insurrectionist)	{
echo"
	<tr>
		<td class='inner2'>Fireball</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r1]</td>
		<td class='inner2'>$fireball</td>
		<td class='inner2'><input type='number' name='ur1' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Ice Storm</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r2]</td>
		<td class='inner2'>$ice_storm</td>
		<td class='inner2'><input type='number' name='ur2' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Wall of Fire</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r3]</td>
		<td class='inner2'>$wall_of_fire</td>
		<td class='inner2'><input type='number' name='ur3' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Wall of Ice</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r4]</td>
		<td class='inner2'>$wall_of_ice</td>
		<td class='inner2'><input type='number' name='ur4' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Chain Lightning</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r5]</td>
		<td class='inner2'>$chain_lightning</td>
		<td class='inner2'><input type='number' name='ur5' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Gust of Wind</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r6]</td>
		<td class='inner2'>$gust_of_wind</td>
		<td class='inner2'><input type='number' name='ur6' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Flaming Sphere</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r7]</td>
		<td class='inner2'>$flaming_sphere</td>
		<td class='inner2'><input type='number' name='ur7' size='8' maxlength='10'></td>";
if($class == Mage)	{ 
echo"
	<tr>
		<td class='inner2'>Cloud Kill</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r8]</td>
		<td class='inner2'>$cloud_kill</td>
		<td class='inner2'><input type='number' name='ur8' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Lightning Bolt</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r9]</td>
		<td class='inner2'>$lightning_bolt</td>
		<td class='inner2'><input type='number' name='ur9' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Meteor Swarm</td>
		<td class='inner2'>Magic</td>
		<td class='inner2'>$res[r10]</td>
		<td class='inner2'>$meteor_swarm</td>
		<td class='inner2'><input type='number' name='ur10' size='8' maxlength='10'></td>";
	}
} 
echo "
	<tr>
		<td class='inner2'>Advanced Gold Mining</td>
		<td class='inner2'>Empire</td>
		<td class='inner2'>$res[r11]</td>
		<td class='inner2'>$adv_gold</td>
		<td class='inner2'><input type='number' name='ur11' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Advanced Iron Mining</td>
		<td class='inner2'>Empire</td>
		<td class='inner2'>$res[r12]</td>
		<td class='inner2'>$adv_iron</td>
		<td class='inner2'><input type='number' name='ur12' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Advanced Farming</td>
		<td class='inner2'>Empire</td>
		<td class='inner2'>$res[r15]</td>
		<td class='inner2'>$adv_farm</td>
		<td class='inner2'><input type='number' name='ur15' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Advanced Construction</td>
		<td class='inner2'>Empire</td>
		<td class='inner2'>$res[r16]</td>
		<td class='inner2'>$adv_build</td>
		<td class='inner2'><input type='number' name='ur16' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Archery</td>
		<td class='inner2'>Unit</td>
		<td class='inner2'>$res[r13]</td>
		<td class='inner2'>$archery</td>
		<td class='inner2'><input type='number' name='ur13' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Demolitions</td>
		<td class='inner2'>Unit</td>
		<td class='inner2'>$res[r14]</td>
		<td class='inner2'>$demolitions</td>
		<td class='inner2'><input type='number' name='ur14' size='8' maxlength='10'></td>";
if($race != Giant AND $class != Ranger AND $class != Insurrectionist)	{
	echo "
	<tr>
		<td class='inner2'>Animation</td>
		<td class='inner2'>Unit</td>
		<td class='inner2'>$res[r17]</td>
		<td class='inner2'>$animation</td>
		<td class='inner2'><input type='number' name='ur17' size='8' maxlength='10'></td>
	<tr>
		<td class='inner2'>Advanced Animation</td>
		<td class='inner2'>Unit</td>
		<td class='inner2'>$res[r18]</td>
		<td class='inner2'>$adv_animation</td>
		<td class='inner2'><input type='number' name='ur18' size='8' maxlength='10'></td>";
}
echo "
</table>
<br><br>
<center>
<input class='button' type='submit' name='first' value='Research'>
<input type='hidden' name='first' value='1'>
</center>
</form>";