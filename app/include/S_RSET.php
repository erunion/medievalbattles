<br><br>
			<form type=get action="military.php">
<? 
$gp = implode("", explode(",", $gp));
$explorec = implode("", explode(",", $explorec));
$warriorc = implode("", explode(",", $warriorc));
$wizardc = implode("", explode(",", $wizardc));
$priestc = implode("", explode(",", $priestc));
$archerc = implode("", explode(",", $archerc));
$recruits = implode("", explode(",", $recruits));

if($gp != 0)
	{
	$max_scientist = ($gp / 500);  if($max_scientist > $recruits){$max_scientist = $recruits;}
	$max_scientist = floor($max_scientist);
	$max_thief = ($gp / 200);  if($max_thief > $recruits){$max_thief = $recruits;}
	$max_thief = floor($max_thief);
	$max_explorer = ($gp / $explorec);  if($max_explorer > $recruits){$max_explorer = $recruits;}
	$max_explorer = floor($max_explorer);

	$max_war = ($gp / $warriorc);  if($max_war > $recruits){$max_war = $recruits;}
	$max_war = floor($max_war);
	$max_wiz = ($gp / $wizardc);  if($max_wiz > $recruits){$max_wiz = $recruits;}
	$max_wiz = floor($max_wiz);
	$max_pri = ($gp / $priestc);  if($max_pri > $recruits){$max_pri = $recruits;}
	$max_pri = floor($max_pri);
	$max_arch = ($gp / $archerc);  if($max_arch > $recruits){$max_arch = $recruits;}
	$max_arch = floor($max_arch);
	}
	if($recruits == 0 OR $gp == 0)
		{
			$max_scientist = 0;
			$max_thief = 0;
			$max_explorer = 0;
			$max_war = 0;
			$max_pri = 0;
			$max_wiz = 0;
			$max_arch = 0;
		}

$gp = number_format($gp);
$explorec = number_format($explorec);
$warriorc = number_format($warriorc);
$wizardc = number_format($wizardc);
$priestc = number_format($priestc);
$archerc = number_format($archerc);
$recruits = number_format($recruits);

?>

			<table border="0" bordercolor="#808080" align=center width="80%">
 				<tr>
  				  <td colspan=8 class=main><b class=top>Train Recruits</b></td>
 				<tr>
  				  <td class=main2 colspan=8> You currently have <?php echo"$recruits"; ?> recruits available to train  </td>
 				<tr>
				 
 				  <td class=main2><b class=reg>Unit</b></td>
  				  <td class=main2><b class=reg>You own</b></td>
  				  <td class=main2><b class=reg>GP Cost</b></td>
				  <td class=main2 colspan=2><b class=reg>Training (1 tick)</b></td>
				  <td class=main2><b class=reg>Max</b></td>
  				  <td class=main2><b class=reg>Amount</b></td>
				<tr>
				  
  				  <td class=inner align=center><b class=reg>Scientist</b></td>
  				  <td class=inner align=center><?php ; echo"$tscientists"; ?></td>
  				  <td class=inner align=center>500</td>
				  <td class=inner align=center colspan=2><? echo"$dbscientist"; ?></td>
				  <td class=inner align=center><? echo"$max_scientist"; ?></td>
  				  <td class=inner align=center><input type="number" name="uscientist" size=5></td>
 				<tr>
				
  				  <td class=inner align=center><b class=reg>Thief</b></td>
  				  <td class=inner align=center><?php echo"$thieves"; ?></td>
  				  <td class=inner align=center>200</td>
				  <td class=inner align=center colspan=2><? echo"$dbthief"; ?></td>
				  <td class=inner align=center><? echo"$max_thief"; ?></td>
  				  <td class=inner align=center><input type="number" name="uthief" size=5></td>
 				<tr>
				  
  				  <td class=inner align=center><b class=reg>Explorer</b></td>
  				  <td class=inner align=center><?php echo"$texplorers"; ?></td>
  				  <td class=inner align=center><? echo"$explorec"; ?></td>
				  <td class=inner align=center colspan=2><? echo"$dbexplorer"; ?></td>
				  <td class=inner align=center><? echo"$max_explorer"; ?></td>
  				  <td class=inner align=center><input type="number" name="uexplorer" size=5></td>
				<tr>
				
  				  <td class=main2><b class=reg>Unit</b></td>
  				  <td class=main2><b class=reg>You own</b></td>
  				  <td class=main2><b class=reg>GP cost</b></td>
				  <td class=main2><b class=reg>Training (1 tick)</b></td>
				  <td class=main2><b class=reg>Training (2 ticks)</b></td>
				  <td class=main2><b class=reg>Max</b></td>
  				  <td class=main2><b class=reg>Amount</b></td>
 			 	<tr>
				 
				  <td class=inner2><b class=reg>Warrior</b></td>
				  <td class=inner2><? echo"$twarriors"; ?></td>
  				  <td class=inner2><? echo"$warriorc"; ?></td>
  				  <td class=inner2><? echo"$dbwar"; ?></td>
				  <td class=inner2><? echo"$dbwar2"; ?></td>
				  <td class=inner align=center><? echo"$max_war"; ?></td>
  				  <td class=inner2><center><input type="number" name="uwarrior" size=5></center></td>
 		<? if($race != Giant){
			if($class != Ranger){echo"
				<tr>
				
  				  <td class=inner2><b class=reg>Wizard</b></td>
				  <td class=inner2> $twizards</td>
  				  <td class=inner2>$wizardc</td>
  				  <td class=inner2>$dbwiz</td>
				  <td class=inner2>$dbwiz2</td>
  				  <td class=inner align=center>$max_wiz</td>
  				  <td class=inner2><center><input type=number name=uwizard size=5></center></td>
					";}
			echo"
				<tr>
				 
  				  <td class=inner2><b class=reg>Priest</b></td>
				  <td class=inner2>$tpriests</td>
  				  <td class=inner2>$priestc</td>
  				  <td class=inner2>$dbpri</td>
				  <td class=inner2>$dbpri2</td>
				  <td class=inner align=center>$max_pri</td>
  				  <td class=inner2><center><input type=number name=upriest size=5></center></td>
				";
				
	}
		?>


		<? if($res[r13pts] >= 125000)
		{echo"
				<tr>
				
  				  <td class=inner2><b class=reg>Archer</b></td>
				  <td class=inner2>$tarchers</td>
  				  <td class=inner2>$archerc</td>
  				  <td class=inner2>$dbarch</td>
				  <td class=inner2>$dbarch2</td>
				  <td class=inner align=center>$max_arch</td>
  				  <td class=inner2><center><input type=number name=uarcher size=5></center></td>
					";}
				?>
				
			</table>
				
				<br>
				<center>
					<input  class=button type="submit" name="trains" value="Train Recruits">
					<input type="hidden" name="trains" value=2>
						</center>
			    		</form>
