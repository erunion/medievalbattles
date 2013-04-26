<?
if($computer_id == "")	{
	include("include/connect.php");

	$query_get = mysql_db_query($dbnam, "SELECT last_comp_id FROM game_info");
		$last_id = mysql_fetch_array($query_get);

	$id = $last_id[last_comp_id] + 1;
	
	setcookie('computer_id', "$id", '9999999999999999999');
	
	mysql_query("UPDATE game_info SET last_comp_id='$id'");
}
?>
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Medieval Battles :: a free online game</title>
<link rel=stylesheet type="text/css" href="css/main-site.css">
</head>

<body>

<form type=get action="checklogin.php">
<table width="100%" border="0">
	<tr>
		<td valign="center">
			<table>
				<tr>
					<td colspan=2 align=center>
						<?	 
							include("include/clock.php");
							echo "<b>$clock</b>";
						?>
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" maxlength=50 size=15></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="pw" maxlength=15 size=15></td>
				</tr>
				<tr>
					<td align="right" colspan=2><input class=button type=submit value=Login></td>
				</tr>
			</table>
		</td>
		<td><img src="images/meb.gif" align=right></td>
	</tr>
</table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="15%" valign="top">
			<table width="100%" border="1" bordercolor="#990000" cellspacing=3 cellpadding=5>
				<tr>
					<td bgcolor="#000000" valign="top"> 
						<table>
							<tr>
								<td>
									<a href="index.php">Main</a><br>
									<a href="index.php?page=signup">Sign Up</a><br>
									<a href="http://forum.decoymedia.com">Public Forums</a><br>
									<a href="http://medievalbattles.com/credits.php" target="_blank">Credits</a><br>
									<a href="index.php?page=game_scores">Scores</a><br>
									<a href="manual.html">Manual</a><br>
									<!-- <a href="/mailinglist">Mailing List</a> &nbsp; <b><font color="#D63107">NEW</font></b><br> -->
									<a href="http://www.cafepress.com/medievalbattles">Store</a> &nbsp; <b><font color="#D63107">NEW</font></b>
								</td>
							</tr>
						</table>
					</td>
				</tr>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<tr>
					<td bgcolor="#000000" align="center">
						<table>
							<tr>
								<td align="center">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="mako@medievalbattles.com">
									<input type="hidden" name="item_name" value="Medieval Battles">
									<input type="hidden" name="no_note" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="tax" value="0">
									<input type="image" src="https://www.paypal.com/images/x-click-but21.gif" border="0" name="submit" alt="Help us out by donating!">
								</td>
							</tr>
						</table>
					</td>
				</tr>
</form>
			</table>
		<td>
		<td valign="top">
<?
if (!$page) {$page = "main-site";};
$page = $page . ".php";
include($page);
echo $data;
?>
		</td>
	</tr>
</table>
<br>
<center><font face=tahoma size=2>Copyright  2003 - <?=date("Y")?> Medieval Battles</font></center>
</body>

</html>