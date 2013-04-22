<form type=get action="military.php">

<?

$gp = implode("", explode(",", $gp));
$maxciv = implode("", explode(",", $maxciv));

	$max_civ = ($gp / 150);  if($max_civ > $maxciv){$max_civ = $maxciv;}
	$max_civ = floor($max_civ);

	if($maxciv == 0 OR $gp == 0)
		{$max_civ = 0;}

$gp = number_format($gp);
$maxciv = number_format($maxciv);

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