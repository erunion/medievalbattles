
		<?php

	


					
 	
			include("include/connect.php");

			$numberplayers = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
			$noplayers = mysql_result($numberplayers,"noplayers");

			$O_line_mem = mysql_db_query($dbnam, "SELECT count(online) FROM user WHERE online='1'");
			$onlineusers = mysql_result($O_line_mem,"onlineusers");
			
			$MOST_INFO = mysql_db_query($dbnam, "SELECT mostonline FROM Game_Info");
			$mostonline = mysql_result($MOST_INFO,"mostonline");

			$totfight = mysql_db_query($dbnam, "SELECT count(class) FROM user WHERE class='Fighter'");
			$tfighters = mysql_result($totfight,"tfighters");
			$totcleric = mysql_db_query($dbnam, "SELECT count(class) FROM user WHERE class='Cleric'");
			$tclerics = mysql_result($totcleric,"tclerics");
			$totmage = mysql_db_query($dbnam, "SELECT count(class) FROM user WHERE class='Mage'");
			$tmages = mysql_result($totmage,"tmages");
			$totrangers = mysql_db_query($dbnam, "SELECT count(class) FROM user WHERE class='Ranger'");
			$trangers = mysql_result($totrangers,"trangers");

					$leftspots = 400 - $noplayers;
		?>

	<table border=0 width="100%" bgcolor="#000000" cellspacing=0>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Game Status</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>Running</td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Game</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>Beta 2</b></td>
		<tr>
		  <td align=center background="images/border.gif"><b class=3>Player Limit</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg>400</b></td>
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
		  <td align=center background="images/border.gif"><b class=3>Ranger</b></td>
		<tr>
		  <td align=center bgcolor="#5D0101"><b class=reg><? echo"$trangers"; ?></b></td>
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
		  <td align=center bgcolor="#5D0101"><b class=reg><? include("include/clock.php");echo"$clock"; ?></b></td>
	</table>
	<br><br>
	<center>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="mako@medievalbattles.com">
	<input type="image" src="https://www.paypal.com/images/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>
	</center>
	<!-- <br><br><center><a href="donations.php"><img src="images/donate.gif" border=0></a></center> -->
      