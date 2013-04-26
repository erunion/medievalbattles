<?
include("include/connect.php");
		
// select user table for the empire being attacked
$result = mysql_db_query($dbnam, "SELECT * FROM user WHERE userid='$empvalue'");
$evu = mysql_fetch_array($result);

// select buildings table for the empire being attacked
$result1 = mysql_db_query($dbnam, "SELECT * FROM buildings WHERE userid='$empvalue'");
$evb = mysql_fetch_array($result1);
	
// select military table for the empire being attacked
$result2 = mysql_db_query($dbnam, "SELECT * FROM military WHERE userid='$empvalue'");
$evm = mysql_fetch_array($result2);

if($evu[safemode] > 0)	{
	echo"<div align=center><font class=yellow>You cannot attack an empire that is in safe mode.</font></div><br><br>";
	include("include/attack/mdrop.php");
	include("include/attack/table.php");
	die();
}
	
// Your guild id
$G_id = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname='$empireguild'");
$gid = mysql_fetch_array($G_id);

// Empire being attacked guild id
$tG_id = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname='$evu[guild]'");
$tgid = mysql_fetch_array($tG_id);
				
$modifier = 1;

if($evu['class'] == 'Fighter')	 {	$modifier = 1.05;	};
if($evu['class'] == 'Mage')	{	$modifier = .95;	};
if($evu['race'] == 'Giant')	{	$modifier = $modifier + .25;	};
				
$cdefense = round((($uwarrior * $warpower) + ($uwizard * $wizpower) + ($upriest * $pripower) + ($uarcher * $archpower)) * $empmodifier);	
				
$evpower = round((($evm[warriors] * $evm[warpower]) + ($evm[wizards] * $evm[wizpower]) + ($evm[priests] * $evm[pripower]) + ($evm[archers] * $evm[archpower]) + ($evb[wp] * 15) + ($evm[catapult] * 30)) * $modifier);
?>