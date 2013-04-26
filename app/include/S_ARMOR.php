<?
echo "
<table border='0' width='80%' align='center'>
	<tr>
		<td class='main' colspan='4'><b class='reg'>Armor Construction</b></td>
  	<tr>
    	<td class='main2' colspan='4'>You have $iron Iron.</td>
  	<tr>
    	<td class='main2'><b class='reg'>Type</b></td>
		<td class='main2'><b class='reg'>GP cost</b></td>
		<td class='main2'><b class='reg'>Iron cost</b></td>
		<td class='main2'><b class='reg'>Construct</b></td>
	<tr>
		<td class='main2' colspan='5'><b>Warrior/Archer Armor</b></td>
 	<tr>
    	<td class='inner2'>Chain Shirt</td>
		<td class='inner2'>125,000</td>
		<td class='inner2'>10,000</td>
		<td class='inner2'>";
		if($armor[cs] < 1)	 {	echo "$acsbutton";	}	
		elseif($armor[cs] > 1)	{	$css = $armor[cs] - 1;	echo "<font class=yellow>Constructing ($css ticks)</font>";	}	
		else	{	echo "<i>Completed</i>";	}
echo "</td>	
	<tr>
    	<td class='inner2'>Chain Mail</td>
		<td class='inner2'>200,000</td>
		<td class='inner2'>20,000</td>
		<td class='inner2'>";
		if($armor[cm] < 1)	{	echo "$acmbutton";	 }	
		elseif($armor[cm] > 1)	{	$cmm = $armor[cm] - 1;	 echo "<font class=yellow>Constructing ($cmm ticks)</font>";	}	
		else	{	echo "<i>Completed</i>";	}
echo "</td>
	<tr>
    	<td class='inner2'>Breast Plate</td>
		<td class='inner2'>450,000</td>
		<td class='inner2'>35,000</td>
		<td class='inner2'>";
		if($armor[bp] < 1)	{	echo "$abpbutton";	 }	
		elseif($armor[bp] > 1)	{	$bpp = $armor[bp] - 1;	echo "<font class=yellow>Constructing ($bpp ticks)</font>";	}	
		else	{	echo"<i>Completed</i>";	}
echo "</td>";

if($class == Fighter)	{
	echo "
	<tr>
		<td class=inner2>Medieval Armor</td>
		<td class=inner2>1,000,000</td>
		<td class=inner2>60,000</td>
		<td class=inner2>";
		if($armor[fp] < 1)	 {	echo "$afpbutton";	}	
		elseif($armor[fp] > 1)	{	$fpp = $armor[fp] - 1;	echo "<font class=yellow>Constructing ($fpp ticks)</font>";	}	
		else	{	echo "<i>Completed</i>";	}
echo"</td>";
}

if($race != Demon)	{
if($race != Giant)	{	 
	echo " 
	<tr>
		<td class=main2 colspan=4><b>Priest Armor</b></td>
	<tr>
		<td class=inner2>Golden Armor</td>
		<td class=inner2>300,000</td>
		<td class=inner2>25,000</td>
		<td class=inner2>";  
		if($armor[ga] < 1)	{	echo "$agabutton";	 }	
		elseif($armor[ga] > 1)	{	$gaa = $armor[ga] - 1;	echo "<font class=yellow>Constructing ($gaa ticks)</font>";	}	
		else	{	echo "<i>Completed</i>";	}
echo"</td>";
}

if($class == Cleric)	{
	echo "
	<tr>
		<td class=inner2>Blessed Armor</td>
		<td class=inner2>1,500,000</td>
		<td class=inner2>55,000</td>
		<td class=inner2>";
		if($armor[ba] < 1)	{	echo "$ababutton";	 }	
		elseif($armor[ba] > 1)	{	$baa = $armor[ba] - 1;	echo "<font class=yellow>Constructing ($baa ticks)</font>";	}	
		else	{	echo "<i>Completed</i>";	} 
echo "</td>";
}
}

if($race != Giant)	{
if(($class != Ranger) AND ($class != Insurrectionist))	 {
echo "
	<tr>
		<td class=main2 colspan=4><b>Wizard Armor</b></td>
	<tr>
		<td class=inner2>Travellers Robe</td>
		<td class=inner2>1,000,000</td>
		<td class=inner2>---</td>
		<td class=inner2>";  
	if($armor[tr] < 1)	{	echo "$atrbutton";	}	
	elseif($armor[tr] > 1)	{	$trr = $armor[tr] - 1;	echo "<font class=yellow>Constructing ($trr ticks)</font>";	}	
	else	{	echo "<i>Completed</i>";	}
echo"</td>
	<tr>
		<td class=inner2>Magicians Robe</td>
		<td class=inner2>3,000,000</td>
		<td class=inner2>---</td>
		<td class=inner2>";  
	if($armor[mr] < 1)	{	echo "$amrbutton";	 }	
	elseif($armor[mr] > 1)	{	$mrr = $armor[mr] - 1;	 echo "<font class=yellow>Constructing ($mrr ticks)</font>";	}	
	else	{	echo "<i>Completed</i>";	}
echo"</td>";

if($class == Mage)	{
echo"
	<tr>
		<td class=inner2>Mythril Armor</td>
		<td class=inner2>5,000,000</td>
		<td class=inner2>40,000</td>
		<td class=inner2>";  
	if($armor[ma] < 1)	{	echo "$amabutton";	}	
	elseif($armor[ma] > 1)	 {	$maa=$armor[ma] - 1;	echo "<font class=yellow>Constructing ($maa ticks)</font>";	}	
	else	{	echo "<i>Completed</i>";	}
echo"</td>";
}
}
}

echo "</table>";
?>		