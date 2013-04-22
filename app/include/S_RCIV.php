<form type=get action="military.php">
<?

	While($civtally < $maxciv AND $gp > $civcost)
			{
				
				$civcost = $civtally * 150;
				$civtally = $civtally + 1;
				$max_civ = $civtally;
			}
	if($civcost > $gp)
		{$max_civ = $max_civ - 1;}
	if($max_civ == "")
		{$max_civ = 0;}
	$max_civ = floor($max_civ);
?>

			<table border="0" bordercolor="#808080" align=center width="50%">
 			  <tr>
  				<td colspan=7 class=main><b class=top>Recruit Civilians</b></td>
 			  <tr>
  				<td class=main2><? echo"It costs 150 gp per civilian recruited"; ?><br>You currently have <?php echo"$maxciv"; ?> civilians available to recruit<br>You can recruit a maximum of <? echo"$max_civ"; ?> civilians
			  <tr>
 			    <td class=inner2>Amount of civilians to recruit:<input type="number" name="urecruit" size=5></td>
			</table>

				<br>
				<center>
					<input class=button type="submit" name="recruit" value="Recruit Civilians"></center>
					<input type="hidden" name="recruited" value="1">
						</form>