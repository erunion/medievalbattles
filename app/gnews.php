<?php include("include/igtop.php");?>
 <?
	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
	$setguild = mysql_result($thesetguild,"setguild");


			if($setguild == None)
				{echo"<div align=center><font class=yellow>Your settlement is currently not in a Guild.</font></div>";
					die();
				}

?>
  

<div align=center>		
	<font class=red>Settlement Joining/Leaving</font><br>
	<font class=yellow>Attacking (successful/unsuccessful)</font><br>
	<font class=orange>Successfully defended empire</font><br>
	<font class=lg>Unsuccessfully defended empire</font><br>
</div>


<?php

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

// Display All News in Guild
echo "  
<br><br>
	<table border=0 bordercolor=\"#404040\" width=\"95%\" align=center cellspacing=1 cellpadding = 0>
	  <tr>
	    <td colspan=4 class=main><b class=reg>News for $setguildname</b></td>
	  <tr align=left>
		<td class=main2 width=\"20%\" align=left><b class=reg>Date/Time</b></td>
		<td class=main2 align=left><b class=reg width=\"80%\">News</b></td>
";

$query_string = "SELECT date, news FROM guildnews WHERE setid='$set1' OR setid='$set2' OR setid='$set3' OR setid='$set4' OR setid='$set5' ORDER BY date DESC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {

	$num = $num + 1;
		
    print("<TR ALIGN=center VALIGN=TOP colspan=6>
	   <td bgcolor=404040 align=left>$row[0]</td>
	   <td bgcolor=404040 align=left>$row[1]</td>\n");
    }
?>

<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>