<form type=get action="aconstruct.php">
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
			    <td><center><img src="images/armors/cs.gif"></center></td>
    		    <td class=inner2>Chain Shirt</td>
		        <td class=inner2>75,000</td>
			    <td class=inner2>10,000</td>
			    <td class=inner2><?  if($cs < 1){echo"$csbutton";}else{	echo"<i>Completed</i>"; }?></td>
			   </form>
