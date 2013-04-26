<?
echo "<form type='get' action='animate.php'>";

$gp = implode("", explode(",", $gp));
$iron = implode("", explode(",", $iron));
$dbgolem = implode("", explode(",", $dbgolem));
$dbirongolem = implode("", explode(",", $dbirongolem));
$golem = implode("", explode(",", $golem));
$irongolem = implode("", explode(",", $irongolem));
$golemc = implode("", explode(",", $golemc));
$irongolemc = implode("", explode(",", $irongolemc));

if(($gp != 0) AND ($iron != 0) AND ($wizards != 0))	 {
//	golem
	$g_wizard_cost = $wizards / 2; 
	$g_gp_cost = $gp / $golemc; 
	$max_golem = min($g_wizard_cost, $g_gp_cost);
		$max_golem = floor($max_golem);
//	iron golem	
	$wizard_cost = $wizards / 2;
	$gp_cost = $gp / $irongolemc;
	$iron_cost = $iron / 200;
	$max_iron_golem = min($wizard_cost, $gp_cost, $iron_cost); 
		$max_iron_golem = floor($max_iron_golem);
}

if($wizards == 0 OR $gp == 0 OR $iron == 0)	{
	$max_golem = 0;
	$max_iron_golem = 0;
}

$dbgolem = number_format($dbgolem);
$dbirongolem = number_format($dbirongolem);
$golem = number_format($golem);
$irongolem = number_format($irongolem);
$golemc = number_format($golemc);
$irongolemc = number_format($irongolemc);

echo "
<table border='0' bordercolor='#808080' align='center' width='85%'>
	<tr>
  		<td colspan='10' class='main'><b class='top'>Animate</b></td>
 	<tr>
  		<td class='main2' colspan='10'>You currently have $wizards Wizards to animate into a Golem. <br>You currently have $iron Iron.</td>
 	<tr>				 
 		<td class='main2'><b class='reg'>Unit</b></td>
  		<td class='main2'><b class='reg'>Owned</b></td>
  		<td class='main2'><b class='reg'>Wizard Cost</b></td>
		<td class='main2'><b class='reg'>GP Cost</b></td>
  		<td class='main2'><b class='reg'>Iron Cost</b></td>
		<td class='main2'><b class='reg'>Training (1 tick)</b></td>
		<td class='main2'><b class='reg'>Max</b></td>
  		<td class='main2'><b class='reg'>Amount</b></td>
	<tr>				  
  		<td class='inner' align='center'><b class='reg'>Golem</b></td>
  		<td class='inner' align='center'>$golem</td>
  		<td class='inner' align='center'>2</td>
		<td class='inner' align='center'>$golemc</td>
		<td class='inner' align='center'>0</td>
		<td class='inner' align='center'>$dbgolem</td>
		<td class='inner' align='center'>$max_golem</td>
  		<td class='inner' align='center'><input type='number' name='ugolem' size='8'></td>
 	<tr>				
  		<td class='inner' align='center'><b class=reg>Iron Golem</b></td>
  		<td class='inner' align='center'>$irongolem</td>
  		<td class='inner' align='center'>2</td>
		<td class='inner' align='center'>$irongolemc</td>
		<td class='inner' align='center'>200</td>
		<td class='inner' align='center'>$dbirongolem</td>
		<td class='inner' align='center'>$max_iron_golem</td>
  		<td class='inner' align='center'><input type='number' name='uirongolem' size='8'></td>
</table>	
<br>
<center>
	<input class='button' type='submit' name='trains' value='Animate'>
	<input type='hidden' name='trains' value='2'>
</center>
</form>";
?>
