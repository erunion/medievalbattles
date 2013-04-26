<?
echo"
<table border=0 width=50% align=center>
	<tr>
		<td class=main colspan=4><b>Attack</b>
	<tr>
		<td class=main2 colspan=4><b>Available Generals:</b> $fleets</td>
	<tr>
		<td class=main2><b class=reg>Type</b></td>
		<td class=main2><b class=reg>Unit Power</b></td>
		<td class=main2><b class=reg>Available</b></td>
		<td class=main2><b class=reg>Amount</b></td>
	<tr>
		<td class=inner2><b>Warrior</b></td>
		<td class=inner2>$warpower</td>
		<td class=inner2>$warriors</td>
		<td class=inner2><input type=number name=uwarrior size=8></td>";

if($race != Giant)	{
	if($class != Ranger AND $class != Insurrectionist)	{
		echo"
	<tr>
		<td class=inner2><b>Wizard</b></td>
		<td class=inner2>$wizpower</td>
		<td class=inner2>$wizards</td>
		<td class=inner2><input type=number name=uwizard size=8></td>";
	}
	if($race != Demon)	{
	echo"
	<tr>
		<td class=inner2><b>Priest</b></td>
		<td class=inner2>$pripower</td>
		<td class=inner2>$priests</td>
		<td class=inner2><input type=number name=upriest size=8></td>";
	}
}
if($res[r13pts] >= 125000)	 {
	echo"
	<tr>
		<td class=inner2><b>Archer</b></td>
		<td class=inner2>$archpower</td>
		<td class=inner2>$archers</b></td>
		<td class=inner2><input type=number name=uarcher size=8></td>";
}
if($race != Giant)	{
	if($res[r17pts] >= 125000)	 {
		echo"
	<tr>
		<td class=inner2><b>Golem</b></td>
		<td class=inner2>38</td>
		<td class=inner2>$golem</b></td>
		<td class=inner2><input type=number name=ugolem size=8></td>";
	}
	if($res[r18pts] >= 125000)	 {
		echo"
	<tr>
		<td class=inner2><b>Iron Golem</b></td>
		<td class=inner2>50</td>
		<td class=inner2>$irongolem</b></td>
		<td class=inner2><input type=number name=uirongolem size=8></td>";
	}
}
?>
</table>
	<br>
	<center><input class=button type="submit" name="attack" value="Attack"></center>
			<input type="hidden" name="attack" value="1">