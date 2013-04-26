<? 
include("include/igtop.php");

echo "
<div align=center>
<b>&nbsp;[&nbsp;<a href=disband.php>Disband</a>&nbsp;]&nbsp;&nbsp;[&nbsp;<a href=equip.php>Equip</a>&nbsp;]&nbsp;&nbsp;[&nbsp;<a href=wconstruct.php>Construct Weapon</a>&nbsp;]&nbsp;&nbsp;[&nbsp;<a href=aconstruct.php>Construct Armor</a>&nbsp;]</b>
</div>
<br><br>";

if(!IsSet($trains))	 {
	include("include/disband_table.php");
}
else	{

	include("include/nexplode.php");

	if($uarcher > 0 AND $res[r13pts] < 125000)	{
		echo"<div align=center><font class=yellow>You do not have Archers!</font></div>"; 
		include("include/disband_table.php");
		die();
	}
	elseif($uwizard > 0 AND $class == Ranger)	{
		echo"<div align=center><font class=yellow>You do not have Wizards!</div></font>";
		include("include/disband_table.php");
		die();
	}
	elseif($uwizard > 0 AND $class == Insurrectionist)	{
		echo"<div align=center><font class=yellow>You do not have Wizards!</div></font>";
		include("include/disband_table.php");
		die();
	}
	elseif($upriest > 0 AND $class == Demon)	{
		echo"<div align=center><font class=yellow>You do not have Priests!</div></font>";
		include("include/disband_table.php");
		die();
	}
	elseif($uthief < 0 OR $usage < 0 OR $uexplorer < 0 OR $uwarrior < 0 OR $uwizard < 0 OR $upriest < 0 OR $uarcher < 0)	 {
		echo"<div align=center><font class=yellow>You can't disband negative or 0 units!</font></div>"; 
		include("include/disband_table.php");
		die();
	}
	elseif($gp < (($uthief + $uexplorer + $usage + $upriest + $uwizard + $uwarrior + $uarcher) * 200))	 {
		echo"<div align=center><font class=yellow>You don't have that many gold pieces!</font></div>";
		include("include/disband_table.php");
		die(); 
	} 
	elseif(($thieves < $uthief) OR ($sages < $usage) OR ($explorers < $uexplorer) OR ($priests < $upriest) OR ($wizards < $uwizard) OR ($warriors < $uwarrior) OR ($archers < $uarcher))	 {
		echo"<div align=center><font class=yellow>You don't have that many units!</font></div>";
		include("include/disband_table.php");
		die(); 
	} 
	elseif($upriest > 0 AND $uwizard > 0 AND $race == Giant)	{
		echo"<div align=center><font class=yellow>You do not have Wizards or Priests!</font></div>";
		include("include/disband_table.php");
		die(); 
	}
	
	$gp = $gp - (($uthief + $usage + $uexplorer + $upriest + $uwizard + $uwarrior + $uarcher) * 200);	
	$gp = round($gp);
	mysql_query("UPDATE user SET gp='$gp' WHERE email='$email' AND pw='$pw'"); 

	$new_recruits = $recruits + ($uthief + $usage + $uexplorer + $upriest + $uwizard + $uwarrior + $uarcher);
	mysql_query("UPDATE military SET recruits='$new_recruits' WHERE email='$email' AND pw='$pw'");

	$new_thieves = $thieves - $uthief;
	$new_sages = $sages - $usage;
	$new_explorers = $aexplorers - $uexplorer;
	$new_priests = $priests - $upriest;
	$new_wizards = $wizards - $uwizard;
	$new_warriors = $warriors - $uwarrior;
	$new_archers = $archers - $uarcher;

	mysql_query("UPDATE military SET thieves='$new_thieves' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET sages='$new_sages' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET explorers='$new_explorers' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET priests='$new_priests' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET wizards='$new_wizards' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET warriors='$new_warriors' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE military SET archers='$new_archers' WHERE email='$email' AND pw='$pw'");

	echo"<div align=center><font class=yellow>The specified units have been disbanded.</font></div>";
	include("include/disband_table.php");
	die();
}
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>