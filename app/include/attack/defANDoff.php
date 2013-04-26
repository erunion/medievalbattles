<?		
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

if($class == 'Fighter')	{	$modifier = 1.05;	}
if($class == 'Cleric')	{	$modifier = 1.00;	}
if($class == 'Ranger')	{	$modifier = 1.00;	}
if($class == 'Mage')	{	$modifier = .95;		}
if($class == 'Warlock')	{	$modifier = .95;		}
if($class == 'Savant')	{	$modifier = .80;		}
if($class == 'Insurrectionist')	{	$modifier = 1.05;		}
if($race == 'Giant')		{	$modifier = $modifier + .25;	 }
if($race == 'Demon')		{	$modifier = $modifier + .10;	 }
if($race == 'Night Elf')		{	$modifier = $modifier - .10;	 }
				
$cdefense = round((($uwarrior * $warpower) + ($uwizard * $wizpower) + ($upriest * $pripower) + ($uarcher * $archpower) + ($ugolem * 38) + ($uirongolem * 50)) * $modifier);	
				
$evpower = round((($evm[warriors] * $evm[warpower]) + ($evm[wizards] * $evm[wizpower]) + ($evm[priests] * $evm[pripower]) + ($evm[archers] * $evm[archpower]) + ($evm[golem] * 38) + ($evm[irongolem] * 50) + ($evb[wp] * 15) + ($evm[catapult] * 30)) * $modifier);
?>