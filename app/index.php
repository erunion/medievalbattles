<html>
<head>
<title>Medieval Battles</title>
<style type=text/css>
	BODY {
		scrollbar-face-color:       #FF0000;
		scrollbar-highlight-color:  #000000;
		scrollbar-shadow-color:     #000000;
		scrollbar-3Dlight-color:    #000000;
		scrollbar-arrow-color:      #000000;
		scrollbar-track-color:      #000000;
		scrollbar-darkshadow-color: #000000;
	}
	td.signup {
		FONT-SIZE: 12px; 
		COLOR: #ffffff; 
		FONT-FAMILY: tahoma, Verdana, Arial, Helvetica, sans-serif;
	}
	input {
		FONT-SIZE: 12px; 
		COLOR: #ffffff; 
		FONT-FAMILY: tahoma, Verdana, Arial, Helvetica, sans-serif;
		BACKGROUND-COLOR: #000000;
		BORDER-COLOR: #990000;
	}
	textarea {
		BACKGROUND-COLOR: #000000;
		BORDER-COLOR: #990000;
	}
	select {
		FONT-SIZE: 12px; 
		COLOR: #ffffff; 
		FONT-FAMILY: tahoma, Verdana, Arial, Helvetica, sans-serif;
		BACKGROUND-COLOR: #000000;
		BORDER-COLOR: #990000;
	}
	.button {
		FONT-SIZE: 12px; 
		COLOR: #ffffff; 
		FONT-FAMILY: tahoma, Verdana, Arial, Helvetica, sans-serif; 
		BACKGROUND-COLOR: #000000;
	}
	A:active {
		COLOR: #000000; 
		TEXT-DECORATION: none;
	}
	A:link {
		COLOR: #ffffff; 
		TEXT-DECORATION: none;
	}
	A:visited {
		COLOR: #ffffff; 
		TEXT-DECORATION: none;
	}
	A:hover {
		COLOR: #ffffff; 
		TEXT-DECORATION: none;
	}
</style>
</head>

<body bgcolor=#000000 topmargin=3 text=#ffffff>
<center>
<img src="images/banner.gif" border=0><br>

<table cellspacing=1 cellpadding=5 width=800 bgcolor=#000000 border=0>
	<tbody>
		<tr>
			<td bgcolor=#000000>
				<center>
				<table cellspacing=10 border=0>
					<tbody>
						<tr>
				          <td valign=top>
						    <table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
								<tbody>
									<tr>
										<td bgcolor=#000000>
											<font face=tahoma color=#ffffff size=2>
											<center><b>Navigation</b></center>
											</font>
										</td>
									</tr>
									<tr>
										<td bgcolor=#000000>
											<center>
											<font face=tahoma size=2 color=#ffffff>
											<a href="index.php">Index</a><br>
											<a href="index.php?signup=yes">Signup</a><br>
											<a href=>Scores</a><br>
											<a href="http://forums.medievalbattles.com">Public Forums</a><br>
											<a href=>Manual</a><br>
											<a href="index.php?staff=yes">Staff</a><br>
											<a href="http://www.cafepress.com/medievalbattles" target="newwindow">MB Store</a><br>
											</font> 
											</center>
										</td>
									</tr>
								</tbody>
							</table>
<br>
<form type=get action="checklogin.php">
							<table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
								<tbody>
									<tr>
										<td bgcolor=#000000>
											<font face=tahoma color=#ffffff size=2>
											<center><b>Login</b></center>
											</font>
										</td>
									</tr>
									<tr>
										<td bgcolor=#000000>
											<font face=tahoma color=#ffffff size=2>
											Email: <input type="text" name="email" maxlength=50 size=9><br>
											Password: <input type="password" name="pw" maxlength=15 size=9><br>
											<center><input class=button type=submit value=Login></center>
											</font>
										</td>
									</tr>
								</tbody>
							</table>
</form>
							<table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
								<tbody>
									<tr>
										<td bgcolor=#000000>
											<font face=tahoma color=#ffffff size=2>
											<center><b>Contact</b></center>
											</font>
										</td>
									</tr>
									<tr>
										<td bgcolor=#000000>
											<center>
												<table cellspacing=0 cellpadding=0 width=125 border=0>
													<tr>
														<td bgcolor=#000000>
															<center>
															<a href="index.php?contact=yes"><font face=tahoma size=2>Mako</font></a><br>
															<a href="index.php?contact=yes"><font face=tahoma size=2>Shredder</font></a><br>
															<a href="index.php?contact=yes"><font face=tahoma size=2>Cyrus</font></a><br>
															</center>
														</td>
													</tr>
												</table>
											</center>
										</td>
									</tr>
								</tbody>
							</table>
			<td valign=top>
<? 
if ($signup == "yes")	{
	include("signup.inc");	// Signup Form
}
elseif ($staff == "yes")	{
	include("staff.inc");	// Staff Page
}
elseif ($reportbug == "yes")	{
	include("reportbug.inc");	// Reporting A Bug Info
}
elseif ($contact == "yes")	{
	include("contact.inc");	// Contact Form
}
else	{
?>
				<table cellspacing=1 cellpadding=1 width=450 bgcolor=#990000 border=1 bordercolor=#990000>
					<tbody>
				        <tr>
							<td bgcolor=#000000>
								<font face=tahoma color=#ffffff size=2>
								<center><b>What is Medieval Battles?</b></center>
								</font>
							</td>
						</tr>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma size=2>
								&nbsp; &nbsp; Medieval Battles is a text-based online game that is based off of AD&D. You can choose from 
								5 different races and be 1 of 4 different classes. Each class has it's own set of advantages 
								and disadvantages. Train your civilians into recruits. Train your recruits into your army. You 
								can train wizards, warriors, priests and archers then go out and conquer more land/mountains 
								to expand your empire. You can even explore for land/mountains too.<br>
								<br>
								&nbsp; &nbsp; Join guilds, or make your own guild and go up agaisnt other guilds. Or you can just sit back 
								and watch your guild grow. Build better and stronger weapons to equip your troops with. 
								Research new spells for your wizards to cast in battle. Make friends or enemys and show 
								everyone else what you are really made of!!<br>
								<br>
								&nbsp; &nbsp; What would a medieval-based game be without trading!? If you have too much of something 
								and need more of something else then just barter (trade) with another empire from the game.<br>
								<br>
								&nbsp; &nbsp; Medieval Battles is a fast-pased game, and very fun to play. Unlike most games' ticks, our 
								ticks run every 30 minutes. Making the game a lot more enjoyable. Troops build in 1 hour so 
								you don't have to wait forever to get them done. Then in the following tick, you can send 
								them out to conquer other empires!<br> 
								</font>
							</td>
						</tr>
					</tbody>
				</table>
<?
}
// get values for game info table
include("include/connect.php");
$num_players_query = mysql_db_query($dbnam, "SELECT count(ename) FROM user");
	$num_players = mysql_result($num_players_query, "num_players");
$online_query = mysql_db_query($dbnam, "SELECT count(online) FROM user WHERE online='1'");
	$users_online = mysql_result($online_query, "users_online");
$spots_left = 200 - $num_players;
?>
			<td valign=top>
				<table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
					<tbody>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma color=#ffffff size=2>
								<center><b>Game Info</b></center>
								</font>
							</td>
						</tr>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma size=2>
								<center>
								Status: Running<br>
								Version: Beta 3<br>
								Player Limit: 600<br>
								Signed Up: <?	echo "$num_players";	?><br>
								Spots Left: <?	 echo "$spots_left";	?><br>
								Users Online: <?	echo "$users_online";	?>
								</center>
								</font>
							</td>
						</tr>
					</tbody>
				</table>
<br>
				<table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
					<tbody>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma color=#ffffff size=2>
								<center><b>Server Time</b></center>
								</font>
							</td>
						</tr>
						<tr>
							<td bgcolor=#000000>
								<center>
								<font face=tahoma size=2>
								<?
									include("include/clock.php");
									echo "$clock";
								?>
								</font>
								</center>
							</td>
						</tr>
					</tbody>
				</table>
<br>
			    <table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
					<tbody>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma color=#ffffff size=2>
								<center><b>Donate</b></center>
								</font>
							</td>
						</tr>
						<tr>
							<td bgcolor=#000000>
								<center>
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_xclick">
								<input type="hidden" name="business" value="mako@medievalbattles.com">
								<input type="image" src="https://www.paypal.com/images/x-click-but04.gif" border="0" name="submit" alt="Donate to Medieval Battles!">
								</center>
							</td>
								</form>
						</tr>
					</tbody>
				</table>
<br>
			    <table cellspacing=1 cellpadding=1 width=150 bgcolor=#990000 border=1 bordercolor=#990000>
					<tbody>
						<tr>
							<td bgcolor=#000000>
								<font face=tahoma color=#ffffff size=2>
								<center><b>SourceForge</b></center>
								</font>
							</td>
						</tr>
						<tr>
							<td bgcolor=#000000>
								<center>
								<a href="http://sourceforge.net/projects/med-bat">
								<img src="http://sourceforge.net/sflogo.php?group_id=63460&amp;type=5" width="100" height="45" border="0" alt="SourceForge.net">
								</a> 
								</center>
							</td>
								</form>
						</tr>
					</tbody>
				</table>
			</tr>
		</tbody>
	</table>
</table>

<center>
<font face=tahoma size=1>Copyright © 2002 Medieval Battles</font>
</center>

</body>
</html>
