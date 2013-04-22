	<form method=post action="research.php">
			<table border="0" bordercolor="#808080" align=center width="80%">
				<tr><td colspan=7 class=main><b class=top>Research</b></td>
				<tr><td colspan=7 class=main2>You currently have <?php  echo"$ascientists"; ?> scientists to send out to research</td>
				<tr>
					<td class=main2><b class=reg>#</b></td>
					<td class=main2><b class=reg>Topic</b></td>
					<td class=main2><b class=reg>Type</b></td>
					<td class=main2><b class=reg>Scientists Researching</b></td>
					<td class=main2><b class=reg>Progress</b></td>
					<td class=main2><b class=reg>Scientists to send</b></td>
			<?

$R_1  = "$r1pts" . "/10,000";
	if($r1pts >= 10000)
	{$R_1 = "<i>Done</i>";}

$R_2 = "$r2pts" . "/50,000";
	if($r2pts >= 50000)
	{$R_2 = "<i>Done</i>";}

$R_3 = "$r3pts" . "/100,000";
	if($r3pts >= 100000)
	{$R_3 =" <i>Done</i>";}

$R_4 = "$r4pts". "/40,000";
	if($r4pts >= 40000)
	{$R_4 = "<i>Done</i>";}

$R_5 = "$r5pts" . "/40,000";
	if($r5pts >= 40000)
	{$R_5 = "<i>Done</i>";}

$R_6 = "$r6pts" . "/125,000";
	if($r6pts >= 125000)
	{$R_6 = "<i>Done</i>";}

?>
			
				<tr>
					<td>1</td>
					<td class=inner2>Fireball</td>
					<td class=inner2>Magic</td>
					<td class=inner2><?php echo"$r1"; ?></td>
					<td class=inner2><? echo"$R_1"; ?></td>
					<td class=inner2><input type="number" name="ur1" size=5 maxlength=10></td>
				<tr>
					<td>2</td>
					<td class=inner2>Ice Storm</td>
					<td class=inner2>Magic</td>
					<td class=inner2><?php echo"$r2"; ?></td>
					<td class=inner2><? echo"$R_2"; ?></td>
					<td class=inner2><input type="number" name="ur2" size=5 maxlength=10></td>
				<tr>
					<td>3</td>
					<td class=inner2>Cloud Kill</td>
					<td class=inner2>Magic</td>
					<td class=inner2><?php echo"$r3"; ?></td>
					<td class=inner2><? echo"$R_3"; ?></td>
					<td class=inner2><input type="number" name="ur3" size=5 maxlength=10></td>
				<tr>
					<td>4</td>
					<td class=inner2>Advanced Gold Mining</td>
					<td class=inner2>Empire</td>
					<td class=inner2><?php echo"$r4"; ?></td>
					<td class=inner2><? echo"$R_4";?></td>
					<td class=inner2><input type="number" name="ur4" size=5 maxlength=10></td>
				<tr>
					<td>5</td>
					<td class=inner2>Advanced Iron Mining</td>
					<td class=inner2>Empire</td>
					<td class=inner2><?php echo"$r5"; ?></td>
					<td class=inner2><? echo"$R_5"; ?></td>
					<td class=inner2><input type="number" name="ur5" size=5 maxlength=10></td>
				<tr>
					<td>6</td>
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