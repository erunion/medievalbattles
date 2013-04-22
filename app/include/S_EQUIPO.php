
<br>
<form type=get action="equip.php">		
	 <table border=0 bordercolor="#808080" align=center width="80%">
	  <tr>
	    <td class=main colspan=5><b class=reg>Equip Weapon/Magic</b></td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>Current Weapon</b></td>
		<td class=main2><b class=reg>Power</b></td>
		<td class=main2><b class=reg>Speed</b></td>
		<td class=main2><b class=reg>Item</b></td>
	  <tr>
		<td class=inner2><b>Warrior</b></td>
		<td class=inner2><? echo"$cweapon"; ?></td>
		<td class=inner2><? echo"$warpower"; ?></td>
		<td class=inner2><? echo"$warspeedw"; ?></td>
		<td class=inner2>
		  <center>
           <select name="uwarrior">
	    	<option selected value=ns>-Choose a Weapon-</option>
			<option value="Dagger">Dagger</option>
			<? if($ssword == 1)	echo"<option value=\"Short Sword\">Short Sword</option>";?>
			<?  if($lsword == 1)echo"<option value=\"Long Sword\">Long Sword</option>";?>
			<? if($axe == 1)echo"<option value=\"Axe\">Axe</option>";?>
			<? if($gaxe == 1)echo"<option value=\"Great Axe\">Great Axe</option>";?>
			<? if($icesword == 1)echo"<option value=\"Ice Sword\">Ice Sword</option>";?>
			</center>
		   </select>
<? if($race != Giant){if($class != Ranger){echo"
	  <tr>
		<td class=inner2><b>Wizard</b></td>
		<td class=inner2>$cspell</td>
		<td class=inner2>$wizpower</td>
		<td class=inner2>$wizspeeds</td>
		<td class=inner2>
		   <center>
			<select name=\"uwizard\">
	    		<option selected value=ns>-Choose a Spell-</option>
				<option value=\"Magic Missile\">Magic Missile</option>";
				 if($r1pts >= 10000)echo"<option value=\"Fireball\">Fireball</option>"; 
				 if($r2pts >= 50000)echo"<option value=\"Ice Storm\">Ice Storm</option>"; 
				 if($r3pts >= 100000)echo"<option value=\"Cloud Kill\">Cloud Kill</option>"; 
				 if($r7pts >= 150000)echo"<option value=\"Lightning Bolt\">Lightning Bolt</option"; }
		  echo"</center>
              </select>
	 <tr>
		<td class=inner2><b>Priest</b></td>
		<td class=inner2>$cstaff</td>
		<td class=inner2>$pripower</td>
		<td class=inner2>$prispeedw</td>
		<td class=inner2>
		   <center>
		    <select name=\"upriest\">
	         <option selected value=ns>-Choose a Weapon-</option>
			<option value=Quarterstaff>Quarterstaff</option>";
		      if($club == 1)echo"<option value=\"Spiked Club\">Spiked Club</option>";
			  if($mace == 1)echo"<option value=\"Mace\">Mace</option>";	
			  if($scepter == 1)echo"<option value=\"Scepter\">Scepter</option>";
			  if($gs == 1)echo"<option value=\"Grand Scepter\">Grand Scepter</option>";
		echo"
			  </center>
			  </select>
		  </td>";
}
?>
		 
	<? if($r6pts >= 125000){echo"
	<tr>
		<td class=inner2><b>Archer</b></td>
		<td class=inner2>$cbow</td>
		<td class=inner2>$archpower</td>
		<td class=inner2>$archspeedw</td>
		<td class=inner2>
		   <center>
		    <select name=uarcher>
	         <option selected value=ns>-Choose a Weapon-</option>
			<option value=Bow>Bow</option>
		";
		      if($bow1 == 1)echo"<option value=\"Short Bow\">Short Bow</option>";
			  if($bow2 == 1)echo"<option value=\"Long Bow\">Long Bow</option>";	
			  if($bow4 == 1)echo"<option value=\"Acid Bow\">Acid Bow</option>";
			  if($bow3 == 1)echo"<option value=\"Medieval War Bow\">Medieval War Bow</option>";
		echo"
			  </center>
			  </select>
		  </td>
				  ";
			}
		?>
		</table>
			<br>
		  <center>
		   <input class=button type="submit" name="update" value="Equip">
		    <input type="hidden" name="update" value="1">
			</center>
			</form>
			<br>