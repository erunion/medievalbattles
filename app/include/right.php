
		<?php

	


					
 	
			include("connect.php");

			$numberplayers = mysql($dbnam, "SELECT count(ename) FROM user");
			$noplayers = mysql_result($numberplayers,"noplayers");

			$O_line_mem = mysql($dbnam, "SELECT count(online) FROM user WHERE online='1'");
			$onlineusers = mysql_result($O_line_mem,"onlineusers");
			
			$MOST_INFO = mysql($dbnam, "SELECT mostonline FROM Game_Info");
			$mostonline = mysql_result($MOST_INFO,"mostonline");

			$totfight = mysql($dbnam, "SELECT count(class) FROM user WHERE class='Fighter'");
			$tfighters = mysql_result($totfight,"tfighters");
			$totcleric = mysql($dbnam, "SELECT count(class) FROM user WHERE class='Cleric'");
			$tclerics = mysql_result($totcleric,"tclerics");
			$totmage = mysql($dbnam, "SELECT count(class) FROM user WHERE class='Mage'");
			$tmages = mysql_result($totmage,"tmages");
			

					$leftspots = 200 - $noplayers;
		?>

	<table border=0 width="100%" bgcolor="#000000" cellspacing=0>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Game Status</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>Running</td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Game</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>Alpha II</b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Player Limit</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>200</b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Signed-Up</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$noplayers"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Spots Left</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$leftspots"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Users Online</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$onlineusers"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Most Online</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$mostonline"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Fighters</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$tfighters"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Clerics</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$tclerics"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Mages</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$tmages"; ?></b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Server Time</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? include("include/clock.php"); ?></b></td>
	</table>
	<br><br><center><a href="donations.php"><img src="images/donate.gif" border=0></a></center>
      