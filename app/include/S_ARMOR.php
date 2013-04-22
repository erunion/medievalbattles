
			<table border=0 width="80%" align=center>
  			  <tr>
    			<td class=main colspan=5><b class=reg>Armor Construction</b></td>
  			  <tr>
    			<td class=main2 colspan=5>You have <? echo"$iron"; ?> Iron</td>
  		      <tr>
				<td class=main2><b class=reg></b></td>
    			<td class=main2><b class=reg>Type</b></td>
				<td class=main2><b class=reg>GP cost</b></td>
				<td class=main2><b class=reg>Iron cost</b></td>
				<td class=main2><b class=reg>Construct</b></td>
			  <tr>
				<td class=main2 colspan=5><b>Warrior/Archer Armor</b></td>
 			  <tr>
			    <td><center><img src="images/armors/cs.gif"></center></td>
    		    <td class=inner2>Chain Shirt</td>
		        <td class=inner2>125,000</td>
			    <td class=inner2>10,000</td>
			    <td class=inner2><?  if($cs < 1){echo"$acsbutton";}elseif($cs > 1){$css = $cs-1;echo"<font class=yellow>Constructing ($css ticks)</font>";}else{	echo"<i>Completed</i>"; }?></td>	
			  <tr>
				<td><center><img src="images/armors/cm.gif"></center></td>
    			<td class=inner2>Chain Mail</td>
				<td class=inner2>200,000</td>
				<td class=inner2>20,000</td>
				<td class=inner2><?  if($cm < 1){echo"$acmbutton";}elseif($cm > 1){$cmm = $cm-1;echo"<font class=yellow>Constructing ($cmm ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
			  <tr>
				<td><center><img src="images/armors/bp.gif"></center></td>
    			<td class=inner2>Breast Plate</td>
				<td class=inner2>450,000</td>
				<td class=inner2>35,000</td>
				<td class=inner2><?  if($bp < 1){echo"$abpbutton";}elseif($bp > 1){$bpp = $bp - 1;echo"<font class=yellow>Constructing ($bpp ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
		<? if($class == Fighter){echo"
			 <tr>
				<td><center><img src=images/armors/enchanted.gif></center></td>
    			<td class=inner2>Medieval Armor</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>60,000</td>
				<td class=inner2>"; if($fp < 1){echo"$afpbutton";}elseif($fp > 1){$fpp = $fp - 1;echo"<font class=yellow>Constructing ($fpp ticks)</font>";}else{echo"<i>Completed</i>";}echo"</td>
			";
 }
 ?>
			

<?	 if($race != Giant){	 echo" <tr>
				<td class=main2 colspan=5><b>Priest Armor</b></td>
			  <tr>
				<td><center><img src=images/armors/golden.gif></center></td>
    			<td class=inner2>Golden Armor</td>
				<td class=inner2>300,000</td>
				<td class=inner2>25,000</td>
				<td class=inner2>";  if($ga < 1){echo"$agabutton";}elseif($ga > 1){$gaa = $ga-1;echo"<font class=yellow>Constructing ($gaa ticks)</font>";}else{echo"<i>Completed</i>";}echo"</td>";
				}
			if($class == Cleric)
			{echo"
			  <tr>
				<td><center><img src=images/armors/blessed.gif></center></td>
    			<td class=inner2>Blessed Armor</td>
				<td class=inner2>1,500,000</td>
				<td class=inner2>55,000</td>
				<td class=inner2> ";if($ba < 1){echo"$ababutton";}elseif($ba > 1){$baa = $ba-1;echo"<font class=yellow>Constructing ($baa ticks)</font>";}else{echo"<i>Completed</i>";} echo"</td>
				";}
if($race != Giant){if($class != Ranger){echo"
			  <tr>
			    <td class=main2 colspan=5><b>Wizard Armor</b></td>
			  <tr>
				<td><center><img src=images/armors/tr.gif></center></td>
    			<td class=inner2>Travellers Robe</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>---</td>
				<td class=inner2>";  if($tr < 1){echo"$atrbutton";}elseif($tr > 1){$trr = $tr-1;echo"<font class=yellow>Constructing ($trr ticks)</font>";}else{echo"<i>Completed</i>";}echo"</td>
			  <tr>
				<td><center><img src=images/armors/mr.gif></center></td>
    			<td class=inner2>Magicians Robe</td>
				<td class=inner2>3,000,000</td>
				<td class=inner2>---</td>
				<td class=inner2>";  if($mr < 1){echo"$amrbutton";}elseif($mr > 1){$mrr = $mr-1;echo"<font class=yellow>Constructing ($mrr ticks)</font>";}else{echo"<i>Completed</i>";}echo"</td>";
			}
			}
			if($class == Mage)
			{echo"
			  <tr>
				<td><center><img src=images/armors/mythril.gif></center></td>
    			<td class=inner2>Mythril Armor</td>
				<td class=inner2>5,000,000</td>
				<td class=inner2>40,000</td>
				<td class=inner2>";  if($ma < 1){echo"$amabutton";}elseif($ma > 1){$maa=$ma-1;echo"<font class=yellow>Constructing ($maa ticks)</font>";}else{echo"<i>Completed</i>";}echo"</td>
				";}  ?>
			</table>
		