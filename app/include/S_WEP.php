		
			<table border=0 width="80%" align=center cellpadding=1 cellspacing=1>
  			  <tr>
    			<td class=main colspan=5><b class=reg>Weapon Construction</b></td>
  			  <tr>
    			<td class=main2 colspan=5>You have <? echo"$iron"; ?> Iron and <? echo"$lumber"; ?> Lumber</td>
  			  <tr>
				<td class=main2><b class=reg></b></td>
    			<td class=main2><b class=reg>Type</b></td>
				<td class=main2><b class=reg>GP cost</b></td>
				<td class=main2><b class=reg>Iron cost</b></td>
				<td class=main2><b class=reg>Construct</b></td>
			  <tr>
				<td class=main2 colspan=5><b>Warrior Weapons</b></td>
 			  <tr>
				<td><center><img src="images/weapons/shortsword.gif"><center></td>
    			<td class=inner2>Short Sword</td>
				<td class=inner2>50,000</td>
				<td class=inner2>5,000</td>
				<td class=inner2><? if($ssword < 1){echo"$ssbutton";}elseif($ssword > 1){$sssword = $ssword - 1;echo"<font class=yellow>Constructing ($sssword ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
			  <tr>
				<td><center><img src="images/weapons/longsword.gif"></center></td>
    			<td class=inner2>Long Sword</td>
				<td class=inner2>350,000</td>
				<td class=inner2>10,000</td>
				<td class=inner2><? if($lsword < 1){echo"$lsbutton";}elseif($lsword > 1){$llsword = $lsword - 1;echo"<font class=yellow>Constructing ($llsword ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
			 <tr>
				<td><center><img src="images/weapons/axe.gif"></center></td>
    			<td class=inner2>Axe</td>
				<td class=inner2>800,000</td>
				<td class=inner2>50,000</td>
				<td class=inner2><? if($axe < 1){echo"$abutton";}elseif($axe > 1){$aaxe = $axe-1;echo"<font class=yellow>Constructing ($aaxe ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
			 <tr>
				<td><center><img src="images/weapons/greataxe.gif"></center></td>
    			<td class=inner2>Great Axe</td>
				<td class=inner2>1,500,000</td>
				<td class=inner2>75,000</td>
				<td class=inner2><?  if($gaxe < 1){echo"$gabutton";}elseif($gaxe > 1){$ggaxe = $gaxe - 1;echo"<font class=yellow>Constructing ($ggaxe ticks)</font>";}else{echo"<i>Completed</i>"; }?></td>
		<? if($class == Fighter){echo"
			 <tr>
				<td><center><img src=images/weapons/icesword.gif></center></td>
    			<td class=inner2>Ice Sword</td>
				<td class=inner2>5,000,000</td>
				<td class=inner2>100,000</td>
				<td class=inner2>";  if($icesword < 1){echo"$isbutton";}elseif($icesword > 1){$iicesword = $icesword - 1;echo"<font class=yellow>Constructing ($iicesword ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>";
		}
		?>
<? if($race != Giant){echo"
			 <tr>
				<td class=main2 colspan=5><b>Priest Weapons</b></td>
			 <tr>
				<td><center><img src=images/weapons/club.gif></center></td>
    			<td class=inner2>Club</td>
				<td class=inner2>150,000</td>
				<td class=inner2>8,000</td>
				<td class=inner2>";  if($club < 1){echo"$qsbutton";}elseif($club > 1){$cclub = $club-1;echo"<font class=yellow>Constructing ($cclub ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>
			 <tr>
				<td><center><img src=images/weapons/mace.gif></center></td>
    			<td class=inner2>Mace</td>
				<td class=inner2>400,000</td>
				<td class=inner2>25,000</td>
				<td class=inner2>"; if($mace < 1){echo"$mbutton";}elseif($mace > 1){$mmace = $mace-1;echo"<font class=yellow>Constructing ($mmace ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>
			 <tr>
				<td><center><img src=images/weapons/scepter.gif></center></td>
    			<td class=inner2>Scepter</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>45,000</td>
				<td class=inner2>"; if($scepter < 1){echo"$scepterbutton";}elseif($scepter > 1){$sscepter=$scepter-1;echo"<font class=yellow>Constructing ($sscepter ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>";
}
?>
	<? if($class == Cleric){echo"
			 <tr>
				<td><center><img src=images/weapons/gs.gif></center></td>
    			<td class=inner2>Grand Scepter</td>
				<td class=inner2>3,000,000</td>
				<td class=inner2>85,000</td>
				<td class=inner2>"; if($gs < 1){echo"$gsbutton";}elseif($gs > 1){$ggs=$gs-1;echo"<font class=yellow>Constructing ($ggs ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>";
		}
		?>
			 
	<? if($r6pts >= 125000){echo"
			  <tr>
				<td class=main2><b class=reg></b></td>
    			<td class=main2><b class=reg>Type</b></td>
				<td class=main2><b class=reg>GP cost</b></td>
				<td class=main2><b class=reg>Lumber cost</b></td>
				<td class=main2><b class=reg>Construct</b></td>
			  <tr>
				<td class=main2 colspan=5><b>Archer Weapons</b></td>
 			  <tr>
				<td><center><img src=images/weapons/b1.gif><center></td>
    			<td class=inner2>Short Bow</td>
				<td class=inner2>100,000</td>
				<td class=inner2>10,000</td>
				<td class=inner2>"; if($bow1 < 1){echo"$b1button";}elseif($bow1 > 1){$bbow1=$bow1-1;echo"<font class=yellow>Constructing ($bbow1 ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>
			  <tr>
				<td><center><img src=images/weapons/b2.gif><center></td>
    			<td class=inner2>Long Bow</td>
				<td class=inner2>500,000</td>
				<td class=inner2>30,000</td>
				<td class=inner2>"; if($bow2 < 1){echo"$b2button";}elseif($bow2 > 1){$bbow2=$bow2-1;echo"<font class=yellow>Constructing ($bbow2 ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>
			  <tr>
				<td><center><img src=images/weapons/b4.gif><center></td>
    			<td class=inner2>Acid Bow</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>55,000</td>
				<td class=inner2>"; if($bow4 < 1){echo"$b4button";}elseif($bow4 > 1){$bbow4=$bow4-1;echo"<font class=yellow>Constructing ($bow4 ticks)</font>";}else{echo"<i>Completed</i>"; }echo"</td>";
			if($class == Ranger){echo"
			  <tr>
				<td><center><img src=images/weapons/b3.gif><center></td>
    			<td class=inner2>Medieval War Bow</td>
				<td class=inner2>3,000,000</td>
				<td class=inner2>75,000</td>
				<td class=inner2>"; if($bow3 < 1){echo"$b3button";}elseif($bow3 > 1){$bbow3=$bow3-1;echo"<font class=yellow>Constructing ($bbow3 ticks)</font>";}else{echo"<i>Completed</i>"; } echo"</td>";
			}
		}?>
			</table>
		
			  