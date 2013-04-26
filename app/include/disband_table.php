<?

$gp = implode("", explode(",", $gp));
$explorec = implode("", explode(",", $explorec));
$warriorc = implode("", explode(",", $warriorc));
$wizardc = implode("", explode(",", $wizardc));
$priestc = implode("", explode(",", $priestc));
$archerc = implode("", explode(",", $archerc));
$recruits = implode("", explode(",", $recruits));

echo "
<form type='get' action='disband.php'>
<table border='0' bordercolor='#808080' align='center' width='80%'>
	<tr>
  		<td colspan='10' class='main'><b class='top'>Disband Units</b></td>
 	<tr>
  		<td class='main2' colspan='10'>It costs 200 gp to disband 1 unit.</td>
 	<tr>				 
 		<td class='main2'><b class='reg'>Unit</b></td>
  		<td class='main2'><b class='reg'>Owned</b></td>
  		<td class='main2'><b class='reg'>Amount</b></td>
	<tr>				  
  		<td class='inner2'><b class='reg'>Sages</b></td>
  		<td class='inner2'>$sages</td>
  		<td class='inner2'><input type='number' name='usage' size='8'></td>
	<tr>				  
  		<td class='inner2'><b class='reg'>Explorer</b></td>
  		<td class='inner2'>$aexplorers</td>
  		<td class='inner2'><input type='number' name='uexplorer' size='8'></td>
 	<tr>				
  		<td class='inner2'><b class='reg'>Thief</b></td>
  		<td class='inner2'>$thieves</td>
  		<td class='inner2'><input type='number' name='uthief' size='8'></td>
 	<tr>				 
		<td class='inner2'><b class='reg'>Warrior</b></td>
		<td class='inner2'>$warriors</td>
  		<td class='inner2'><input type='number' name='uwarrior' size='8'></td>";

if($race != Giant)	{
	if(($class != Ranger) AND ($class != Insurrectionist))	{
	echo"
	<tr>				
  		<td class='inner2' ><b class='reg'>Wizard</b></td>
		<td class='inner2'>$wizards</td>
  		<td class='inner2'><input type='number' name='uwizard' size='8'></td>";
	}
	if($race != Demon)	{
	echo"
	<tr>				 
  		<td class='inner2'><b class='reg'>Priest</b></td>
		<td class='inner2'>$priests</td>
		<td class='inner2'><input type='number' name='upriest' size='8'></td>";
	}
}

if($res[r13pts] >= 125000)	 {
	echo"
	<tr>				
  		<td class='inner2'><b class='reg'>Archer</b></td>
		<td class='inner2'>$archers</td>
  		<td class='inner2'><input type='number' name='uarcher' size='8'></td>";
}
echo "
</table>
<br>
<center>
	<input class='button' type='submit' name='trains' value='Disband Units'>
	<input type='hidden' name='trains' value='2'>
</center>
</form>";
?>