<?
include("include/buttons.php");
include("include/connect.php");

// select warrior weapons	
$war_weapon_query = ("SELECT * FROM military WHERE email='$email' AND pw='$pw'");
$war_weapon_result = mysql_db_query($dbnam, $war_weapon_query);
$warweapon = mysql_fetch_array($war_weapon_result);

// select priest weapons	
$pri_weapon_query = ("SELECT * FROM military WHERE email='$email' AND pw='$pw'");
$pri_weapon_result = mysql_db_query($dbnam, $pri_weapon_query);
$priweapon = mysql_fetch_array($pri_weapon_result);

// select archer weapons	
$arch_weapon_query = ("SELECT * FROM military WHERE email='$email' AND pw='$pw'");
$arch_weapon_result = mysql_db_query($dbnam, $arch_weapon_query);
$archweapon = mysql_fetch_array($arch_weapon_result);
?>
			<table border=0 width="80%" align=center cellpadding=1 cellspacing=1>
  			  <tr>
    			<td class=main colspan=5><b class=reg>Weapon Construction</b></td>
  			  <tr>
    			<td class=main2 colspan=5>You have <? echo "$iron"; ?> Iron and <? echo "$lumber"; ?> Lumber</td>
  			  <tr>
    			<td class=main2><b class=reg>Type</b></td>
				<td class=main2><b class=reg>GP cost</b></td>
				<td class=main2><b class=reg>Iron cost</b></td>
				<td class=main2><b class=reg>Construct</b></td>
			  <tr>
				<td class=main2 colspan=4><b>Warrior Weapons</b></td>
 			  <tr>
    			<td class=inner2>Short Sword</td>
				<td class=inner2>300,000</td>
				<td class=inner2>5,000</td>
				<td class=inner2>
				<? 
				if($warweapon[shortsword] < 1)	{	echo "$shortsword_button";	}
				elseif($warweapon[shortsword] > 1)	{	$shortswordtime = $warweapon[shortsword];	echo "<font class=yellow>Constructing ($shortswordtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
			  <tr>
    			<td class=inner2>Long Sword</td>
				<td class=inner2>500,000</td>
				<td class=inner2>8,000</td>
				<td class=inner2>
				<? 
				if($warweapon[longsword] < 1)	 {	echo "$longsword_button";	}
				elseif($warweapon[longsword] > 1)	{	$longswordtime = $warweapon[longsword];	echo "<font class=yellow>Constructing ($longswordtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
			 <tr>
    			<td class=inner2>Bastard Sword</td>
				<td class=inner2>600,000</td>
				<td class=inner2>12,000</td>
				<td class=inner2>
				<? 
				if($warweapon[bastardsword] < 1)	 {	echo "$bastardsword_button";	}
				elseif($warweapon[bastardsword] > 1)	{	$bastardtime = $warweapon[bastardsword];	echo "<font class=yellow>Constructing ($bastardtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
			 <tr>
    			<td class=inner2>Scourge</td>
				<td class=inner2>750,000</td>
				<td class=inner2>17,000</td>
				<td class=inner2>
				<? 
				if($warweapon[scourge] < 1)	{	echo "$scourge_button";	}
				elseif($warweapon[scourge] > 1)	{	$scourgetime = $warweapon[scourge];	 echo "<font class=yellow>Constructing ($scourgetime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
			 <tr>
    			<td class=inner2>Scimitar</td>
				<td class=inner2>900,000</td>
				<td class=inner2>26,000</td>
				<td class=inner2>
				<? 
				if($warweapon[scimitar] < 1)	{	echo "$scimitar_button";	}
				elseif($warweapon[scimitar] > 1)	{	$scimitartime = $warweapon[scimitar];	 echo "<font class=yellow>Constructing ($scimitartime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
			 <tr>
    			<td class=inner2>Rom's Fury</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>32,000</td>
				<td class=inner2>
				<? 
				if($warweapon[romsfury] < 1)	{	echo "$romsfury_button";	}
				elseif($warweapon[romsfury] > 1)	{	$romsfurytime = $warweapon[romsfury];	 echo "<font class=yellow>Constructing ($romsfurytime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				?></td>
<?
if($class == Fighter)	{
	echo "
			 <tr>
    			<td class=inner2>Toledo's Broad Sword</td>
				<td class=inner2>2,000,000</td>
				<td class=inner2>60,000</td>
				<td class=inner2>";
				if($warweapon[broadsword] < 1)	{	echo "$toledos_button";	}
				elseif($warweapon[broadsword] > 1)	 {$broadswordtime = $warweapon[broadsword];	 echo "<font class=yellow>Constructing ($broadswordtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Sword of Gandalara</td>
				<td class=inner2>3,000,000</td>
				<td class=inner2>75,000</td>
				<td class=inner2>";
				if($warweapon[gandalara] < 1)	{	echo "$gandalara_button ";	}
				elseif($warweapon[gandalara] > 1)	 {$gandalaratime = $warweapon[gandalara];	 echo "<font class=yellow>Constructing ($gandalaratime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
				echo "</td>";
}

if($race != Giant)	{
	if($race != Demon)	{
	echo "
			 <tr>
				<td class=main2 colspan=5><b>Priest Weapons</b></td>
			 <tr>
    			<td class=inner2>Mace</td>
				<td class=inner2>200,000</td>
				<td class=inner2>4,000</td>
				<td class=inner2>";
				if($priweapon[mace] < 1)	{	echo "$mace_button";	}
				elseif($priweapon[mace] > 1)	{	$macetime = $priweapon[mace];	 echo "<font class=yellow>Constructing ($macetime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Flail</td>
				<td class=inner2>550,000</td>
				<td class=inner2>8,000</td>
				<td class=inner2>";
				if($priweapon[flail] < 1)	{	echo "$flail_button";	 }
				elseif($priweapon[flail] > 1)	 {	$flailtime = $priweapon[flail];	 echo "<font class=yellow>Constructing ($flailtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Scepter of Zakarum</td>
				<td class=inner2>500,000</td>
				<td class=inner2>12,000</td>
				<td class=inner2>";
				if($priweapon[zakarum] < 1)	{	echo "$zakarum_button";	}
				elseif($priweapon[zakarum] > 1)	{	$zakarumtime=$priweapon[zakarum];	echo "<font class=yellow>Constructing ($zakarumtime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Footman's Flail</td>
				<td class=inner2>600,000</td>
				<td class=inner2>17,000</td>
				<td class=inner2>";
				if($priweapon[footmanflail] < 1)	{	echo "$footmanflail_button";	}
				elseif($priweapon[footmanflail] > 1)	{	$footmantime=$priweapon[footmanflail];	echo "<font class=yellow>Constructing ($footmantime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Morning Star</td>
				<td class=inner2>750,000</td>
				<td class=inner2>29,000</td>
				<td class=inner2>";
				if($priweapon[morningstar] < 1)	{	echo "$morningstar_button";	}
				elseif($priweapon[morningstar] > 1)	{	$morningstartime=$priweapon[morningstar];	echo "<font class=yellow>Constructing ($morningstartime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Thyora's Tear</td>
				<td class=inner2>900,000</td>
				<td class=inner2>30,000</td>
				<td class=inner2>";
				if($priweapon[thyorastear] < 1)	{	echo "$thyorastear_button";	}
				elseif($priweapon[thyorastear] > 1)	{	$thyoratime=$priweapon[thyorastear];	echo "<font class=yellow>Constructing ($thyoratime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>";
	}
}

if($class == Cleric)	{
	echo "
			 <tr>
    			<td class=inner2>Flail of Isidole</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>40,000</td>
				<td class=inner2>"; 
				if($priweapon[isidole] < 1)	{	echo "$isidole_button";	}
				elseif($priweapon[isidole] > 1)	 {	$isidoletime=$priweapon[isidole];	echo "<font class=yellow>Constructing ($isidoletime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>
			 <tr>
    			<td class=inner2>Eldamar's Star</td>
				<td class=inner2>2,000,000</td>
				<td class=inner2>50,000</td>
				<td class=inner2>";
				if($priweapon[eldamarstar] < 1)	{	echo "$eldamarstar_button";	}
				elseif($priweapon[eldamarstar] > 1)	{	$eldamarstartime=$priweapon[eldamarstar];	echo "<font class=yellow>Constructing ($eldamarstartime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo "
				</td>";
}

if($res[r13pts] >= 125000)	 {
	echo"
			  <tr>
    			<td class=main2><b class=reg>Type</b></td>
				<td class=main2><b class=reg>GP cost</b></td>
				<td class=main2><b class=reg>Lumber cost</b></td>
				<td class=main2><b class=reg>Construct</b></td>
			  <tr>
				<td class=main2 colspan=4><b>Archer Weapons</b></td>
 			  <tr>
    			<td class=inner2>Short Bow</td>
				<td class=inner2>400,000</td>
				<td class=inner2>6,000</td>
				<td class=inner2>"; 
				if($archweapon[shortbow] < 1)	{	echo "$shortbow_button";	}
				elseif($archweapon[shortbow] > 1)	 {	$shortbowtime=$archweapon[shortbow];	echo "<font class=yellow>Constructing ($shortbowtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>
			  <tr>
    			<td class=inner2>Ferric Bow</td>
				<td class=inner2>550,000</td>
				<td class=inner2>10,000</td>
				<td class=inner2>"; 
				if($archweapon[ferricbow] < 1)	{	echo "$ferricbow_button";	}
				elseif($archweapon[ferricbow] > 1)	 {	$ferricbowtime=$archweapon[ferricbow];	echo "<font class=yellow>Constructing ($ferricbowtime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>
			  <tr>
    			<td class=inner2>Keldar's Arms</td>
				<td class=inner2>600,000</td>
				<td class=inner2>14,000</td>
				<td class=inner2>"; 
				if($archweapon[keldarsarms] < 1)	{	echo "$keldararms_button";	}
				elseif($archweapon[keldarsarms] > 1)	 {	$keldartime=$archweapon[keldarsarms];	echo "<font class=yellow>Constructing ($keldartime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>
			 <tr>
    			<td class=inner2>Splen's Sight</td>
				<td class=inner2>800,000</td>
				<td class=inner2>20,000</td>
				<td class=inner2>";
				if($archweapon[splensight] < 1)	{	echo "$splensight_button";	}
				elseif($archweapon[splensight] > 1)	{	$splentime=$archweapon[splensight];	echo "<font class=yellow>Constructing ($splentime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>
			 <tr>
    			<td class=inner2>Bow of Tion</td>
				<td class=inner2>950,000</td>
				<td class=inner2>26,000</td>
				<td class=inner2>";
				if($archweapon[bowoftion] < 1)	{	echo "$bowoftion_button";	}
				elseif($archweapon[bowoftion] > 1)	{	$bowoftiontime=$archweapon[bowoftion];	echo "<font class=yellow>Constructing ($bowoftiontime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>";
		echo"
			  <tr>
    			<td class=inner2>The Dynefian</td>
				<td class=inner2>1,000,000</td>
				<td class=inner2>32,000</td>
				<td class=inner2>"; 
				if($archweapon[dynefian] < 1)	{	echo "$dynefian_button";	}
				elseif($archweapon[dynefian] > 1)	 {	$dynefiantime=$archweapon[dynefian];	echo "<font class=yellow>Constructing ($dynefiantime ticks)</font>";	}
				else	{	echo "<i>Completed</i>";	}
	if($class == Ranger)	{
		echo"
				</td>
			 <tr>
    			<td class=inner2>HeartSong</td>
				<td class=inner2>1,500,000</td>
				<td class=inner2>45,000</td>
				<td class=inner2>";
				if($archweapon[heartsong] < 1)	{	echo "$heartsong_button";	}
				elseif($archweapon[heartsong] > 1)	{	$heartsongtime=$archweapon[heartsong];	echo "<font class=yellow>Constructing ($heartsongtime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>
			 <tr>
    			<td class=inner2>Shyrscream's Bow</td>
				<td class=inner2>2,000,000</td>
				<td class=inner2>60,000</td>
				<td class=inner2>";
				if($archweapon[shyrscreamsbow] < 1)	{	echo "$shyrscream_button";	}
				elseif($archweapon[shyrscreamsbow] > 1)	{	$shyrscreamstime=$archweapon[shyrscreamsbow];	echo "<font class=yellow>Constructing ($shyrscreamstime ticks)</font>";	 }
				else	{	echo "<i>Completed</i>";	}
	echo"
				</td>";
	}
}
?>
			</table>
		
			  