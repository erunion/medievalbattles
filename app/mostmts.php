<? include ("include/top.php"); ?>
		
		    <center><b>Game News</b></center>
			<hr class=main>
			<!-- BODY STARTS -->
	<br><br>
	<table border=1 bordercolor="#000000" align=center width="25%">
	<tr>
	  <td class=inner2><a href="strongemp.php">Strongest Empires</a></td>
	 <tr>
	  <td class=inner2><a href="mostland.php">Most Land</a></td>
	 <tr>
	  <td class=inner2><a href="mostmts.php">Most Mountains</a></td>
	 <tr>
	  <td class=inner2><a href="strongset.php">Strongest Settlements</a></td>
	 <tr>
	  <td class=inner2><a href="strongguild.php">Strongest Guilds</a></td>
	 </table>
<?php

	$var =   @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";

echo "
			<br><br>
	
		

	
	<table border=0 bordercolor=#404040 width=80% align=center cellspacing=1>
	  <tr>
	    <td colspan=5 class=main><b class=reg>Empires with the most Mountains</b></td>
	  <tr>
		<td class=main2></td>
		<td class=main2 width=50%><b class=reg>Empire</b></td>
		<td class=main2><b class=reg width=15%>Land</b></td>
		<td class=main2><b class=reg width=15%>Mountains</b></td>
		<td class=main2><b class=reg width=20%>Experience</b></td>
";


			$query_string = "SELECT ename, land, mts, exp FROM user ORDER BY mts DESC LIMIT 0,20";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

		

					$SETID_SELECT = mysql($dbnam, "SELECT setid FROM user WHERE ename = \"$row[0]\"");	
	    			$SID_S = mysql_result($SETID_SELECT,"SID_S");
					$EMPS_SET_GUILD = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = \"$SID_S\"");	
	    			$E_S_G = mysql_result($EMPS_SET_GUILD,"E_S_G");
						$E_S_G = "[$E_S_G]";

						if($E_S_G == "[None]")
							{$E_S_G = "";}	

					 $placeno = $placeno + 1;

		    	print("<TR ALIGN=center VALIGN=TOP colspan=7>
				<td bgcolor=#404040>$placeno</td>
				<td bgcolor=#404040 align=left><font class=red><b>$row[0] ($SID_S)</b> </font><i>$E_S_G</i></td>
				<td bgcolor=#404040>$row[1]</td>
				<td bgcolor=#404040>$row[2]</td>
				<td bgcolor=#404040>$row[3]</td>
												");
				
		    }

		echo "</table>"; 

?>

			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>		
	