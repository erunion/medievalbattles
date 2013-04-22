<?php include("include/igtop.php"); ?>

 


<?
	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
	$setguild = mysql_result($thesetguild,"setguild");


			if($setguild == None)
				{echo"<div align=center><font class=yellow>Your settlement is currently not in a Guild.</font></div>";
					die();
				}

?>

<?php

include("include/connect.php");
$tablename = "user";

// Determine Guild Name
$setgname = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");	
$setguildname = mysql_result($setgname,"setguildname");

// Extract Setno1
$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE gname='$setguildname'");
$set1 = mysql_result($settlement1,"set1");

// Extract Setno2
$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE gname='$setguildname'");
$set2 = mysql_result($settlement2,"set2");

// Extract Setno3
$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE gname='$setguildname'");
$set3 = mysql_result($settlement3,"set3");

// Extract Setno4
$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE gname='$setguildname'");
$set4 = mysql_result($settlement4,"set4");

// Extract Setno5
$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE gname='$setguildname'");
$set5 = mysql_result($settlement5,"set5");

// Display All Settlements in Guild
echo "  
<br><br>
<table border=1 bordercolor=#000000 align=center width=\"80%\" cellpadding=0 cellspacing=0>
 <tr>
  <td class=\"main\" colspan=\"5\"><b class=\"reg\">$setguildname Members</b></td>
 <tr>
  <td class=main2 width=><b class=reg></b></td>
  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
  <td class=\"main2\" width=><b class=\"reg\">AIM</b></td>
  <td class=\"main2\" width=><b class=\"reg\">MSN</b></td>
  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
";

$query_string = "SELECT ename, aim, msn, exp, userid FROM user WHERE setid='$set1' OR setid='$set2' OR setid='$set3' OR setid='$set4' OR setid='$set5' ORDER BY exp DESC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
		
		$SETID_SELECT = mysql($dbnam, "SELECT setid FROM user WHERE ename = \"$row[0]\"");	
	    $t_setid = mysql_result($SETID_SELECT,"t_setid");

	$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE userid='$row[4]'");	
	$OLINE = mysql_result($ONLINE_NO,"OLINE");
	
					if($OLINE == 1)
						{$O_line = "<font class=red>*</font>";}
					else{$O_line = "";}

		$row[3] = number_format($row[3]);	
	
	$num = $num + 1;
		
    print("<TR ALIGN=center VALIGN=TOP colspan=6>
	   <td bgcolor=404040>$num</td>
	   <td bgcolor=404040><a href=\"messaging.php?value=$row[0]&snum=$t_setid&setchg=1\">$row[0]($t_setid)</a>$O_line</td>
	   <td bgcolor=404040>$row[1]</td>
	   <td bgcolor=404040>$row[2]</td>
	   <td bgcolor=404040>$row[3]</td>\n");
    }
?>

<?
	//DISPLAY SETTLEMENTS IN GUILD

		
	echo"
<table border=1 bordercolor=\"#000000\" align=center width=\"80%\" cellpadding=0 cellspacing=0>
 <tr>
  <td class=\"main\" colspan=\"6\"><b class=\"reg\">$setguildname Settlements</b></td>
 <tr>
  <td class=main2 width=><b class=reg></b></td>
  <td class=\"main2\" width=><b class=\"reg\">Settlement Name</b></td>
  <td class=\"main2\" width=><b class=\"reg\">Settlement</b></td>
  <td class=\"main2\" width=><b class=\"reg\">Members</b></td>
  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
  <td class=\"main2\" width=><b class=reg>Settlement Leader</b></td>
";

$query_string = "SELECT setname, setid, members, setstrength FROM settlement WHERE setid='$set1' OR setid='$set2' OR setid='$set3' OR setid='$set4' OR setid='$set5' ORDER BY setstrength DESC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
	$row[3] = number_format($row[3]);
	$nnum = $nnum + 1;
		
	// check to see if guild name is being used
			$slquery = ("SELECT ename FROM user WHERE setid=\"$row[1]\" AND sl='yes'");
			$slresult = mysql_query($slquery);
			$sl_check = mysql_fetch_array($slresult);
	if($sl_check[0] != "")
		{$set_l = $sl_check[0];}
	else{$set_l = "--";}

    print("<TR ALIGN=center VALIGN=TOP colspan=6>
	   <td bgcolor=404040>$nnum</td>
	   <td bgcolor=404040>$row[0]</td>
	   <td bgcolor=404040>$row[1]</td>
	   <td bgcolor=404040>$row[2]</td>
	   <td bgcolor=404040>$row[3]</td>
	   <td bgcolor=404040>$set_l</td>
	   \n");
    }
?>





<?php
if (!IsSet($donate)) {
	include("include/G_DONATE.php");
}
else
{

include("include/nexplode.php");
		
if($donateg == "" AND $donatei == "") {
	echo "<div align=center><font class=yellow>You did not donate anything.</font></div>";
	include("include/G_DONATE.php");die();
}
elseif($donateg < 0 OR $donatei < 0) {
	echo "<div align=center><font class=yellow>You cannot donate negative gold or iron.</font></div>";
	include("include/G_DONATE.php");die();
}
elseif($gp < $donateg OR $iron < $donatei) {
	echo"<div align=center><font class=yellow>You do not have enough resources to donate that much.</font></div>";
	include("include/G_DONATE.php"); die();
}
	else {

		include("include/connect.php");
		$tablename = "user";

		// Determine Guild Name
		$setgname = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid='$setid'");	
		$setguildname = mysql_result($setgname,"setguildname");

		// Extract Setno1
		$settlement1 = mysql($dbnam, "SELECT setno1 FROM guild WHERE gname='$setguildname'");
		$set1 = mysql_result($settlement1,"set1");

		// Extract Setno2
		$settlement2 = mysql($dbnam, "SELECT setno2 FROM guild WHERE gname='$setguildname'");
		$set2 = mysql_result($settlement2,"set2");

		// Extract Setno3
		$settlement3 = mysql($dbnam, "SELECT setno3 FROM guild WHERE gname='$setguildname'");
		$set3 = mysql_result($settlement3,"set3");

		// Extract Setno4
		$settlement4 = mysql($dbnam, "SELECT setno4 FROM guild WHERE gname='$setguildname'");
		$set4 = mysql_result($settlement4,"set4");

		// Extract Setno5
		$settlement5 = mysql($dbnam, "SELECT setno5 FROM guild WHERE gname='$setguildname'");
		$set5 = mysql_result($settlement5,"set5");

		// Extract Guilds Identification Number
		$guildid = mysql($dbnam, "SELECT gid FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");	
		$gid = mysql_result($guildid,"gid");

		// Extract Guilds Gold
		$yourguildgold = mysql($dbnam, "SELECT fgold FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
		$guildgold = mysql_result($yourguildgold,"guildgold");

		// Extract Guilds Gold
		$yourguildiron = mysql($dbnam, "SELECT firon FROM guild WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");	
		$guildiron = mysql_result($yourguildiron,"guildiron");

		$gp = $gp - $donateg;
		$iron = $iron - $donatei;
			
		mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET iron =\"$iron\" WHERE  email='$email' AND pw='$pw'"); 
			
		$fgold = $guildgold + $donateg;
		$firon = $guildiron + $donatei;

		mysql_query("UPDATE guild SET fgold =\"$fgold\" WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'");
		mysql_query("UPDATE guild SET firon =\"$firon\" WHERE setno1='$set1' OR setno2='$set2' OR setno3='$set3' OR setno4='$set4' OR setno5='$set5'"); 

		if($donateg != "" AND $donatei == 0 AND $donatei == "") {
			$donatei = number_format($donatei);
			$donateg = number_format($donateg);
			$thenews = "<font class=green>$ename has donated $donateg gp to the fund</font>";
		}	
		if($donateg == "" AND $donatei > 0) {
			$donatei = number_format($donatei);
			$donateg = number_format($donateg);
			$thenews = "<font class=green>$ename has donated $donatei iron to the fund</font>";
		}
		if($donateg > 0 AND $donatei > 0) {
			$donatei = number_format($donatei);
			$donateg = number_format($donateg);
			$thenews = "<font class=green>$ename has donated $donateg gp and $donatei iron to the funds</font>";
		}
		
		mysql_query("INSERT INTO guildnews (date, news, setid, gid) VALUES ('$clock', \"$thenews\", '$setid', '$gid') ");
			
		echo "<br><div align=center><font class=yellow>You have successfully donated guild's fund.</font></div>";
		include("include/G_DONATE.php");die();
	}
}
?>
<!-- body ends here -->	
</table>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>