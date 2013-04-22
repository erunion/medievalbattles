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

$R_1  = "$r1pts" . "/50,000";
	if($r1pts >= 50000)
	{$R_1 = "<i>Done</i>";}

$R_2 = "$r2pts" . "/200,000";
	if($r2pts >= 200000)
	{$R_2 = "<i>Done</i>";}

$R_3 = "$r3pts" . "/500,000";
	if($r3pts >= 500000)
	{$R_3 =" <i>Done</i>";}

$R_4 = "$r4pts". "/100,000";
	if($r4pts >= 100000)
	{$R_4 = "<i>Done</i>";}

$R_5 = "$r5pts" . "/100,000";
	if($r5pts >= 100000)
	{$R_5 = "<i>Done</i>";}

$R_6 = "$r6pts" . "/125,000";
	if($r6pts >= 125000)
	{$R_6 = "<i>Done</i>";}
$R_7 = "$r7pts" . "/800,000";
	if($r7pts >= 800000)
	{$R_7 = "<i>Done</i>";}

?>
			
		<?

$R_1  = "$r1pts" . "/50,000";
	if($r1pts >= 50000)
	{$R_1 = "<i>Done</i>";}

$R_2 = "$r2pts" . "/200,000";
	if($r2pts >= 200000)
	{$R_2 = "<i>Done</i>";}

$R_3 = "$r3pts" . "/500,000";
	if($r3pts >= 500000)
	{$R_3 =" <i>Done</i>";}

$R_4 = "$r4pts". "/100,000";
	if($r4pts >= 100000)
	{$R_4 = "<i>Done</i>";}

$R_5 = "$r5pts" . "/100,000";
	if($r5pts >= 100000)
	{$R_5 = "<i>Done</i>";}

$R_6 = "$r6pts" . "/125,000";
	if($r6pts >= 125000)
	{$R_6 = "<i>Done</i>";}
$R_7 = "$r7pts" . "/800,000";
	if($r7pts >= 800000)
	{$R_7 = "<i>Done</i>";}

$r1pts = number_format($r1pts);
$r2pts = number_format($r2pts);
$r3pts = number_format($r3pts);
$r4pts = number_format($r4pts);
$r5pts = number_format($r5pts);
$r6pts = number_format($r6pts);
$r7pts = number_format($r7pts);

?>
<?
		if($race != Giant AND $class != Ranger){echo"
				<tr>
					<td>1</td>
					<td class=inner2>Fireball</td>
					<td class=inner2>Magic</td>
					<td class=inner2>$r1</td>
					<td class=inner2>$R_1</td>
					<td class=inner2><input type=number name=ur1 size=5 maxlength=10></td>
				<tr>
					<td>2</td>
					<td class=inner2>Ice Storm</td>
					<td class=inner2>Magic</td>
					<td class=inner2>$r2</td>
					<td class=inner2>$R_2</td>
					<td class=inner2><input type=number name=ur2 size=5 maxlength=10></td>
				<tr>
					<td>3</td>
					<td class=inner2>Cloud Kill</td>
					<td class=inner2>Magic</td>
					<td class=inner2>$r3</td>
					<td class=inner2>$R_3</td>
					<td class=inner2><input type=number name=ur3 size=5 maxlength=10></td>
					";
	if($class == Mage){echo"
				<tr>
					<td>4</td>
					<td class=inner2>Lightning Bolt</td>
					<td class=inner2>Magic</td>
					<td class=inner2>$r7</td>
					<td class=inner2>$R_7</td>
					<td class=inner2><input type=number name=ur7 size=5 maxlength=10></td>
						";
						}
					} 
?>
				<tr>
					<td><?if($class == Mage){echo"5";}elseif($race==Giant){echo"1";}else{echo"4";} ?></td>
					<td class=inner2>Advanced Gold Mining</td>
					<td class=inner2>Empire</td>
					<td class=inner2><?php echo"$r4"; ?></td>
					<td class=inner2><? echo"$R_4";?></td>
					<td class=inner2><input type="number" name="ur4" size=5 maxlength=10></td>
				<tr>
					<td><? if($class == Mage){echo"6";}elseif($race==Giant){echo"2";}else{echo"5";} ?></td>
					<td class=inner2>Advanced Iron Mining</td>
					<td class=inner2>Empire</td>
					<td class=inner2><?php echo"$r5"; ?></td>
					<td class=inner2><? echo"$R_5"; ?></td>
					<td class=inner2><input type="number" name="ur5" size=5 maxlength=10></td>
				<tr>
					<td><? if($class == Mage){echo"7";}elseif($race==Giant){echo"3";}else{echo"6";} ?></td>
					<td class=inner2>Archery</td>
					<td class=inner2>Unit</td>
					<td class=inner2><?php echo"$r6"; ?></td>
					<td class=inner2><?php echo"$R_6"; ?></td>
					<td class=inner2><input type="number" name="ur6" size=5 maxlength=10></td>
			</table>
				<br><br>
						

				<center><input class=button type="submit" name="first" value="Research">
							<input type="hidden" name="first" value=1></center>
								</form>