<?
include("include/connect.php");
		
// Select everything from user for the empire being attacked
$query = ("SELECT land, safemode, ename, setid, mts, exp, exp2, gp, iron, class, race, email FROM user WHERE userid='$empvalue'");
$result = mysql_query($query);
$evu = mysql_fetch_array($result);

// Select everything from buildings for the empire being attacked
$query1 = ("SELECT gm, im, dgm, dim, amts, aland, home, farm, barrack, lmill, wp, dhome, dfarm, dbarrack, dlmill, dwp FROM buildings WHERE userid='$empvalue'");
$result1 = mysql_query($query1);
$evb = mysql_fetch_array($result1);
	
// Select everything from military for the empire being attacked
$query2 = ("SELECT civ,  warriors, wizards, priests, archers, warpower,  wizpower, pripower, archpower, wardef, wizdef, pridef, archdef FROM military WHERE userid='$empvalue'");
$result2 = mysql_query($query2);
$evm = mysql_fetch_array($result2);

if($ev[safemode] > 0)	{
	echo"<div align=center><font class=yellow>You cannot attack an empire that is in safe mode.</font></div><br><br>";
	include("include/attack/mdrop.php");
	include("include/attack/table.php");
	die();
}
	
// Your guild id
$Guild_id = ("SELECT gid FROM guild WHERE setno1=$setid OR setno2=$setid OR setno3=$setid OR setno4=$setid OR setno5=$setid");
$G_id = mysql_query($Guild_id);
$gid = mysql_fetch_array($G_id);

// Empire being attacked guild id
$tGuild_id = ("SELECT gid FROM guild WHERE setno1=$evu[setid] OR setno2=$evu[setid] OR setno3=$evu[setid] OR setno4=$evu[setid] OR setno5=$evu[setid]");
$tG_id = mysql_query($tGuild_id);
$tgid = mysql_fetch_array($tG_id);
				
$modifier = 1;

	if($evu['class'] == Fighter)	{
		$modifier = 1.05;
	}
	if($evu['class'] == Mage)	{
		$modifier = .95;
	}
	if($evu[race] == Giant)	{
		$modifier = $modifier + .25;
	}
	if($evu[race] == Orc)	{
		$modifier = $modifer - .15;
	}
				
$cdefense = round( (($uwarrior * $warpower) + ($uwizard * $wizpower) + ($upriest * $pripower) + ($uarcher * $archpower)) * $empmodifier);	
				
$evpower = round((($evm[warriors] * $evm[warpower]) + ($evm[wizards] * $evm[wizpower]) + ($evm[priests] * $evm[pripower]) + ($evm[archers] * $evm[archpower]) + ($evb[wp] * 15)) * $modifier);
?>