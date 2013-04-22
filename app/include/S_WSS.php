  <form type=get action="wconstruct.php">
			<table border=0 width="80%" align=center>
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
				<td class=inner2><? if($ssword < 1){echo"$ssbutton";}else{echo"<i>Completed</i>"; }?></td>
			   </form>

