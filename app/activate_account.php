<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Medieval Battles</title>
<link rel=stylesheet type="text/css" href="css/main-site.css">
</head>

<body>

<form type=get action="checklogin.php">
<table width="100%" border="0">
	<tr>
		<td><img src="images/logo.gif" height="130" width="577"></td>
		<td valign="center">
			<table>
				<tr>
					<td colspan=2 align=center>
						<?	 
							include("include/clock.php");
							echo $clock;
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
									<a href="http://forums.medievalbattles.com">Public Forums</a><br>
									<a href="manual.html">Manual</a><br>
									<a href="index.php?page=game_scores">Scores</a><br>
									<a href="index.php?page=about_us">About Us</a><br>
									<a href="index.php?page=agn">Announcements</a><br>
									<a href="index.php?page=agn">Game News</a><br>
									<a href="http://sabin.medievalbattles.com">Sabin</a>
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
								<td>
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="mako@medievalbattles.com">
									<input type="hidden" name="item_name" value="Medieval Battles">
									<input type="hidden" name="no_note" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="tax" value="0">
									<input type="image" src="https://www.paypal.com/images/x-click-but21.gif" border="0" name="submit" alt="Help us out by donating!">
								</center>
								</td>
							</tr>
						</table>
					</td>
				</tr>
</form>
			</table>
		<td>
		<td valign="top">
			<table width=100% border=1 bordercolor=#990000 cellspacing=3 cellpadding=8>
				<tr>
					<td width=15% bgcolor=#000000 valign=top>
						<table align=center>
							<tr>
								<td align=center>
									<table width=100%>
<?
if(!IsSet($activate))	{

}
else	{	
	include("include/connect.php");

	$validate_result = mysql_db_query($dbnam, "SELECT userid, code, check FROM emailvalidate WHERE userid='$act_userid'");
		$validate = mysql_fetch_array($validate_result);

	if($act_code != $validate[1])	{
		echo "<center><b>Validation code is incorrect.</b></center><br>";
	}
	else	{
		mysql_query("UPDATE emailvalidate SET check='2' WHERE userid='$act_userid' AND code='$act_code'");
		echo "<center><b>Your account has been activated!</b></center>";
	}
}
?>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<center><font face=tahoma size=2>Copyright © 2003 Medieval Battles</font></center>
</body>
</html>