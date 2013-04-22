		  <form type=get action="equip.php">	
			<table border=0 bordercolor="#808080" align=center width="80%">
	  		  <tr>
	    		<td class=main colspan=6><b class=reg>Equip Armor</b></td>
	 		  <tr>
	    		<td class=main2><b class=reg>Unit</b></td>
				<td class=main2><b class=reg>Current Armor</b></td>
				<td class=main2><b class=reg>Defense</b></td>
				<td class=main2><b class=reg>Speed</b></td>
				<td class=main2><b class=reg>Armor</b></td>
			  <tr>
				<td class=inner2><b>Warrior</b></td>
				<td class=inner2><? echo"$wararmor"; ?></td>
				<td class=inner2><? echo"$wardef"; ?></td>
				<td class=inner2><? echo"$warspeeda"; ?></td>
				<td class=inner2><center>
				  <select name="uwararmor">
	    			<option selected value=ns>-Choose Armor-</option>
					<option value="Studded Leather">Studded Leather</option>
					<? if($cs == 1)	echo"<option value=\"Chain Shirt\">Chain Shirt</option>";?>
					<? if($cm == 1)echo"<option value=\"Chain Mail\">Chain Mail</option>";?>
					<? if($bp == 1)echo"<option value=\"Breast Plate\">Breast Plate</option>";?>
	    			<? if($fp == 1)echo"<option value=\"Medieval Armor\">Medieval Armor</option>";?>
				  </select>
				 </center>
				</td>
			  <tr>
				<td class=inner2><b>Wizard</b></td>
				<td class=inner2><? echo"$wizarmor"; ?></td>
				<td class=inner2><? echo"$wizdef"; ?></td>
				<td class=inner2><? echo"$wizspeeda"; ?></td>
				<td class=inner2><center>
				  <select name="uwizarmor">
	    		 	<option selected value="ns">-Choose Armor-</option>
					<option value="Robe">Robe</option>
				   </select>
				  </td>
 			  <tr>
				<td class=inner2><b>Priest</b></td>
				<td class=inner2><? echo"$priarmor"; ?></td>
				<td class=inner2><? echo"$pridef"; ?></td>
				<td class=inner2><? echo"$prispeeda"; ?></td>
				<td class=inner2><center>
				  <select name="upriarmor">
	    			<option selected value="ns">-Choose Armor-</option>
					<option value="Leather">Leather</option>
					</select>
				   </td>
		<? if($r6pts >= 125000){echo"
			  <tr>
				<td class=inner2><b>Archer</b></td>
				<td class=inner2>$archarmor</td>
				<td class=inner2>$archdef</td>
				<td class=inner2>$archspeeda</td>
				<td class=inner2><center>
				  <select name=\"uarcharmor\">
	    			<option selected value=ns>-Choose Armor-</option>
					<option value=\"Studded Leather\">Studded Leather</option>";
					 if($cs == 1)	echo"<option value=\"Chain Shirt\">Chain Shirt</option>";
					 if($cm == 1)echo"<option value=\"Chain Mail\">Chain Mail</option>";
				     if($bp == 1)echo"<option value=\"Breast Plate\">Breast Plate</option>";
	    			 if($fp == 1)echo"<option value=\"Medieval Armor\">Medieval Armor</option>";
				echo"
				  </select>
				 </center>
				</td>
				";
		  }
		  ?>

				</table> 

			<br>
			<center><input class=button type="submit" name="update2" value="Equip"><input type="hidden" name="update2" value="1"></center>
			</center>
			</form>