<?php

@mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";
// save time() in a session var, and on the session start, if that var is older than however long, delete the //session
	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>

<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">

</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>

</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->
<br><br>

<?php
require("bbbb-functions.php3");
require("bbbb-ini.php3");
$languagefile = language();
require($languagefile);  


$uforumname = mysql($dbnam, "SELECT ename FROM user WHERE email = '$email' AND pw = '$pw'");
$forumname = mysql_result($uforumname,"ename");


/********** a delete request ? **********/

if ($passquery) {$request = nukemessage($request, $ident, $passquery);}


/**********  insert posted article into DB **********/

if ($insert) {
	list($request, $DisplayFrontText, $NewThreadHeaderText) = insertpost($forumname, $emailnotice, $topic, $body, $replytovalue, $thread);
	
	echo "	<center>
		<br>
		<div style=\"font-family: Arial, Helvetica, sans-serif; font-size: 12pt; font-weight:bold\">
			$SubmitSuccesText
		</div>
		<br><br>
		</center>
		";
}



if ($request) {

/************   begin read display **************/

	$s = readdisplay($request);

	echo "
	  <center>
		 <table border=1 bordercolor=#630000 width=560 cellpadding=2 cellspacing=0>
			<tr>
				<th colspan=2 align=left>
					&nbsp;$s[topic]
				</th>
			</tr>

			<tr>
				<td align=left bgcolor=#000000>
					$s[name]
				</td>

				<td align=right bgcolor=#000000>
					$TableFont$s[date]&nbsp;
				</td>

			</tr>

			<tr>
				<td colspan=2 align=left bgcolor=#000000>
					<br><br>
					$s[body]
					<br><br>
				</td>
			</tr>

		</table>

	<br><br><br>
	";
}




/************   begin table display **************/

if ($request) {
	list($rowstoshow, $rowcontent, $DisplayFrontText, $FormHeading)= showthread($s[thread]);
	$NavBar = navbar($s[pos], $s[thread], "read");
}
elseif ($find) {
	list($rowstoshow, $rowcontent, $DisplayFrontText, $FormHeading) = findresult($find);
	$NavBar = navbar(0, 0, "find");
}
else {
	list($rowstoshow, $rowcontent, $DisplayFrontText, $FormHeading)  = showwholetable($last);
	$s[thread]= 0; $s[id] = 0;
	$NavBar = navbar($last, 0, "index");
}
	

echo "
		<center>
		<div style=\"font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight:bold\">
		$DisplayFrontText
		</div>
		<br><br><br>
		<center>
		<table border=0 width=560 bgcolor=#4C0202>
		
		<tr>
			<th align=left>
				&nbsp;$HdThreadText
			</th>

			<th align=right>
				$HdFromText&nbsp;
			</th>

			<th align=right>
				$HdDateText&nbsp;
			</th>

		</tr>
		";


for ($i = 0; $i < $rowstoshow; $i++) {

	$r = db_fetchrow($rowcontent);
	$NewMarker = isitnew($r[datestamp]);
	$ThreadColor = whichcolor($i);
	$Pic = whichindent($r[depth]);
	$r = showtablerow($r);

	echo "
		<tr bgcolor=$ThreadColor>

			<td align=left>
				<a href=\"$PHP_SELF?request=$r[id]\">&nbsp;$r[topic]</a>
			</td>

			<td align=right valign=top>
				$r[name]&nbsp;
			</td>

			<td align=right valign=top>
				$r[date]&nbsp;
			</td>

		</tr>
	";
}



echo "
	</table>


	<br><br>
	<center>
		$NavBar
	</center>
	";




/************  begin post form display **************/

empty($s[revalue]) && $s[revalue] = "";

echo "
		<div style=\"font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight:bold\">
			$FormHeading
		</div>
		<br><br><br>
		<center>
		<form action=\"$PHP_SELF\" method=\"POST\">

		$FormTopic:<br>
		<input type=\"text\" name=\"topic\" size=40 maxlength=50 value=\"$s[revalue]\"><br><br><br>

		$FormBody:<br>
		<textarea name=\"body\" cols=40 rows=10 wrap=\"virtual\"></textarea>
		
		<br><br><br>

		<input type=\"submit\" name=\"submit\"  value=\"Submit\" border=0 notab>
		<br>

		<input type=\"hidden\" name=\"replytovalue\" value=\"$s[id]\">
		<input type=\"hidden\" name=\"thread\" value=\"$s[thread]\">
		<input type=\"hidden\" name=\"insert\" value=\"true\">
		</form>

	<br><br><br>
	</center>
	";
?>
   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
