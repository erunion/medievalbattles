
<form type=get action="disband.php">

<? 
$gp = implode("", explode(",", $gp));
$explorec = implode("", explode(",", $explorec));
$warriorc = implode("", explode(",", $warriorc));
$wizardc = implode("", explode(",", $wizardc));
$priestc = implode("", explode(",", $priestc));
$archerc = implode("", explode(",", $archerc));
$recruits = implode("", explode(",", $recruits));
?>

<table border="0" bordercolor="#808080" align=center width="80%">
	<tr>
  		<td colspan=10 class=main><b class=top>Disband Units</b></td>
 	<tr>
  		<td class=main2 colspan=10>It costs 200 gp to disband 1 unit.</td>
 	<tr>				 
 		<td class=main2><b class=reg>Unit</b></td>
  		<td class=main2><b class=reg>Owned</b></td>
  		<td class=main2><b class=reg>Amount</b></td>
	<tr>				  
  		<td class=inner align=center><b class=reg>Scientist</b></td>
  		<td class=inner align=center><? ; echo"$scientists"; ?></td>
  		<td class=inner align=center><input type="number" name="uscientist" size=8></td>
	<tr>				  
  		<td class=inner align=center><b class=reg>Explorer</b></td>
  		<td class=inner align=center><? ; echo"$explorers"; ?></td>
  		<td class=inner align=center><input type="number" name="uscientist" size=8></td>
 	<tr>				
  		<td class=inner align=center><b class=reg>Thief</b></td>
  		<td class=inner align=center><? echo"$thieves"; ?></td>
  		<td class=inner align=center><input type="number" name="uthief" size=8></td>
 	<tr>				 
		<td class=inner2><b class=reg>Warrior</b></td>
		<td class=inner2><? echo"$twarriors"; ?></td>
  		<td class=inner2><center><input type="number" name="uwarrior" size=8></center></td>
<? 
if($race != Giant)	{
	if($class != Ranger)	{
		echo"
	<tr>				
  		<td class=inner2><b class=reg>Wizard</b></td>
		<td class=inner2>$twizards</td>
  		<td class=inner2><center><input type=number name=uwizard size=8></center></td>";
	}
	echo"
	<tr>				 
  		<td class=inner2><b class=reg>Priest</b></td>
		<td class=inner2>$tpriests</td>
		<td class=inner2><center><input type=number name=upriest size=8></center></td>";
}

if($res[r13pts] >= 125000)	 {
	echo"
	<tr>				
  		<td class=inner2><b class=reg>Archer</b></td>
		<td class=inner2>$tarchers</td>
  		<td class=inner2><center><input type=number name=uarcher size=8></center></td>";
}
echo "</table>";
?>
				
<br>
<center>
	<input class=button type="submit" name="trains" value="Disband Units">
	<input type="hidden" name="trains" value=2>
</center>
</form>
