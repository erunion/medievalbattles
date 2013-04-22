<table border="0" width="60%" align=center>
	<tr>
	  <td class=main colspan=3><b>Attack</b>
	<tr>
	  <td class=main2 colspan=3><? echo"<b>Available Generals:</b> $fleets"; ?></td>
	<tr>
	  <td class=main2><b class=reg>Type</b></td>
	  <td class=main2><b class=reg>Available</b></td>
	  <td class=main2><b class=reg>Amount</b></td>
	<tr>
	  <td class=inner2><b>Warrior</b></td>
	  <td class=inner2><? echo"$warriors"; ?></td>
	  <td class=inner2><input type="number" name="uwarrior" size=4></td>
	<tr>
	  <td class=inner2><b>Wizard</b></td>
	  <td class=inner2><? echo"$wizards"; ?></td>
	  <td class=inner2><input type="number" name="uwizard" size=4></td>
	<tr>
	  <td class=inner2><b>Priest</b></td>
	  <td class=inner2><? echo"$priests"; ?></td>
	  <td class=inner2><input type="number" name="upriest" size=4></td>
<? if($r6pts >= 125000)
		{echo"
				<tr>
					<td class=inner2><b>Archer</b></td>
					<td class=inner2>$archers</b></td>
					<td class=inner2><input type=number name=uarcher size=4></td>
					";
		}
		?>
</table>
	<br>
	<center><input class=button type="submit" name="attack" value="Attack"></center>
			<input type="hidden" name="attack" value="1">