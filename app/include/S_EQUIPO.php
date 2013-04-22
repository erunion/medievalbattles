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
			<? if($warweapon[shortsword] == 1)	{	echo"<option value=\"Short Sword\">Short Sword</option>";	}
			if($warweapon[longsword] == 1)	 {	echo"<option value=\"Long Sword\">Long Sword</option>";	 }
			if($warweapon[bastardsword] == 1)	{	echo"<option value=\"Bastard Sword\">Bastard Sword</option>";	}
			if($warweapon[scourge] == 1)	{	echo"<option value=Scourge>Scourge</option>";	}
			if($warweapon[scimitar] == 1)	{	echo"<option value=Scimitar>Scimitar</option>";	}
			if($warweapon[romsfury] == 1)	{	echo"<option value=\"Rom's Fury\">Rom's Fury</option>";	}
			if($warweapon[broadsword] == 1)	{	echo"<option value=\"Toledo's Broad Sword\">Toledo's Broad Sword</option>";	}
			if($warweapon[gandalara] == 1)	 {	echo"<option value=\"Sword of Gandalara\">Sword of Gandalara</option>";	 }?>
			</center>
			</select>
<? 
if($race != Giant)	{
	if($class != Ranger)	{
		echo"
	<tr>
		<td class=inner2><b>Wizard</b></td>
		<td class=inner2>$cspell</td>
		<td class=inner2>$wizpower</td>
		<td class=inner2>$wizspeeds</td>
		<td class=inner2>
			<center>
			<select name=uwizard>
	    	<option selected value=ns>-Choose a Spell-</option>
			<option value=Magic Missile>Magic Missile</option>";
			if($res[r1pts] >= 50000)	{	echo"<option value=Fireball>Fireball</option>";	}
			if($res[r2pts] >= 100000)	{	echo"<option value=\"Ice Storm\">Ice Storm</option>";	} 
			if($res[r3pts] >= 200000)	{	echo"<option value=\"Wall of Fire\">Wall of Fire</option>";	} 
			if($res[r4pts] >= 300000)	{	echo"<option value=\"Wall of Ice\">Wall of Ice</option>";	} 
			if($res[r5pts] >= 400000)	{	echo"<option value=\"Chain Lightning\">Chain Lightning</option>";	} 
			if($res[r6pts] >= 500000)	{	echo"<option value=\"Gust of Wind\">Gust of Wind</option>";	}
			if($res[r7pts] >= 600000)	{	echo"<option value=\"Flaming Sphere\">Flaming Sphere</option>";	} 
			if($res[r8pts] >= 400000)	{	echo"<option value=\"Cloud Kill\">Cloud Kill</option>";	 }
			if($res[r9pts] >= 800000)	{	echo"<option value=\"Lightning Bolt\">Lightning Bolt</option>";	} 
			if($res[r10pts] >= 900000)	 {	echo"<option value=\"Meteor Swarm\">Meteor Storm</option>";	}
		}
		 echo"
			</center>
            </select>
	<tr>
		<td class=inner2><b>Priest</b></td>
		<td class=inner2>$cstaff</td>
		<td class=inner2>$pripower</td>
		<td class=inner2>$prispeedw</td>
		<td class=inner2>
			<center>
		    <select name=upriest>
	        <option selected value=ns>-Choose a Weapon-</option>
			<option value=Quarterstaff>Quarterstaff</option>";
			if($priweapon[mace] == 1)	 {	echo"<option value=Mace>Mace</option>";	}
			if($priweapon[flail] == 1)	{	echo"<option value=Flail>Flail</option>";	}
			if($priweapon[zakarum] == 1)	 {	echo"<option value=\"Scepter of Zakarum\">Scepter of Zakarum</option>";	}
			if($priweapon[footmanflail] == 1)	 {	echo"<option value=\"Footman's Flail\">Footman's Flail</option>";	 }
			if($priweapon[morningstar] == 1)	{	echo"<option value=\"Morning Star\">Morning Star</option>";	}
			if($priweapon[thyorastear] == 1)	{	echo"<option value=\"Thyora's Tear\">Thyora's Tear</option>";	}
			if($priweapon[isidole] == 1)	{	echo"<option value=\"Flail of Isidole\">Flail of Isidole</option>";	}
			if($priweapon[eldamarstar] == 1)	{	echo"<option value=\"Eldamar's Star\">Eldamar's Star</option>";	}
		echo"
			</center>
			</select>
		 </td>";
}

if($res[r13pts] >= 125000)	 {
	echo"
	<tr>
		<td class=inner2><b>Archer</b></td>
		<td class=inner2>$cbow</td>
		<td class=inner2>$archpower</td>
		<td class=inner2>$archspeedw</td>
		<td class=inner2>
			<center>
		    <select name=uarcher>
	        <option selected value=ns>-Choose a Weapon-</option>
			<option value=Bow>Bow</option>";
		    if($archweapon[shortbow] == 1)	 {	echo"<option value=\"Short Bow\">Short Bow</option>";	 }
			if($archweapon[ferricbow] == 1)	 {	echo"<option value=\"Ferric Bow\">Ferric Bow</option>";	}	
			if($archweapon[keldarsarms] == 1)	{	echo"<option value=\"Keldar's Arms\">Keldar's Arms</option>";	 }
			if($archweapon[splensight] == 1)	{	echo"<option value=\"Splen's Sight\">Splen's Sight</option>";	}
			if($archweapon[bowoftion] == 1)	{	echo"<option value=\"Bow of Tion\">Bow of Tion</option>";	 }
			if($archweapon[dynefian] == 1)	{	echo"<option value=\"The Dynefian\">The Dynefian</option>";	 }
			if($archweapon[heartsong] == 1)	{	echo"<option value=HeartSong>HeartSong</option>";	}
			if($archweapon[shyrscreamsbow] == 1)	{	echo"<option value=\"Shyrscream's Bow\">Shyrscream's Bow</option>";	}
	echo"
			</center>
			</select>
		 </td>";
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