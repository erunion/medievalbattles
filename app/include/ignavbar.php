<? 
if($mno == 0)	{	
	$messtitle = "<li><a href=vmessages.php>View Messages</a>";
}
else	{
	$messtitle = "	<li><b><i><a href=vmessages.php  flashtype=0 flashcolor=red id=flashlink>$mno NEW</a></i></b>";
}
if($nno == 0)	{
	$maintitle = "<li><a href=main.php>Main Menu</a>";
}
else	{
	$maintitle = "	<li><b><i><a href=main.php?pageid=news flashtype=0 flashcolor=red id=flashlink>$nno NEWS</a></i></b>";
}
?>

<table border=1 width=100% align=center bordercolor=#212121 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#2a2929 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#323131 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#3a3838 cellspacing=0 cellpadding=0><tr><td>

 <table class=navbar border="1" cellpadding="2" cellspacing="0" width="100%" valign="top" bordercolor="#000000">
	
		<tr><td class=main2><?	echo "<font class=orange>";	include ("include/clock.php");	echo "$clock<br></font>";	 ?>
<? 
			if($sl == yes)	{
				echo "<center><a href=\"sl.php\"><br>Settlement Man.<br></a></center>";
			}						
				// are they a guild leader?
				$G_query = ("SELECT owner FROM guild WHERE owner='$ename'");
				$G_result = mysql_db_query($dbnam, $G_query);
				$G_namecheck = mysql_fetch_array($G_result);

			if($G_namecheck[0] == "$ename")	{
				echo "<center><a href=\"guildconfig.php\">Guild Man.<br></a></center>";
			}
			echo "<a href=\"main.php?pageid=news\">Empire News</a>";
	?>		
		</td></tr>	
		<ul>
		<td class=main><b><font class=orange>Empire</b></td>
			<tr><td class=inner><? echo"$maintitle"; ?></td></tr>
		    <tr><td class=inner><li><a href="explore.php">Explore</a></td></tr>
			<tr><td class=inner><li><a href="military.php">Military</a><a href="equip.php">(E)</a><a href="wconstruct.php">(W)</a><a href="aconstruct.php">(A)</a></td></tr>
			<tr><td class=inner><li><a href="research.php">Research</a></td></tr>
			<tr><td class=inner><li><a href="buildings.php">Buildings</a></td></tr>
			<tr><td class=inner><li><a href="status.php?pageid=production">Status</a></td></tr>

		<td class=main><b class=other><font class=orange>Settlement</b></td>
			<tr><td class=inner><li><a href="settlement.php?change=1&snum=<? echo"$csnum"; ?>">View Settlements</a></td></tr>
<?
if($sl == yes)	{	echo "<tr><td class=inner><li><a href=\"sl-forum.php\">Forums</a></td></tr>";	}
else	{	echo "<tr><td class=inner><li><a href=\"sforum.php\">Forums</a></td></tr>";	}
?>
			<tr><td class=inner><li><a href="snews.php">News</a></td></tr>
			<tr><td class=inner><li><a href="govt.php">Government</a><a href="donate.php">(D)</a></td></tr>
		<td class=main><b class=other><font class=orange>Guild</a></td>
			<tr><td class=inner><li><a href="gc.php">Guild Center</a></td></tr>
<?
// are they a guild leader?
$G_query = ("SELECT owner FROM guild WHERE owner=\"$ename\"");
$G_result = mysql_db_query($dbnam, $G_query);
$G_namecheck = mysql_fetch_array($G_result);

if($G_namecheck[0] == $ename)	 {	echo "<tr><td class=inner><li><a href=\"gl-forum.php\">Forums</a></td></tr>";	}
else	{	echo "<tr><td class=inner><li><a href=\"gforums.php\">Forums</a></td></tr>";	 }
?>
			<tr><td class=inner><li><a href="gnews.php">News</a></td></tr>
			<tr><td class=inner><li><a href="gmembers.php">Members</a></td></tr>		
		<td class=main><b class=other><font class=orange>War</b></td>
			<tr><td class=inner><li><a href="attack.php">Attack</a><a href="attackr.php">(R)</a><a href="attackm.php">(M)</a></td></tr>
			<tr><td class=inner><li><a href="intel.php">Intelligence</a></td></tr>
		<td class=main><b class=other><font class=orange>Communications</b></td>
			<tr><td class=inner><? echo"$messtitle"; ?></td></tr>
			<tr><td class=inner><li><a href="messaging.php">Message</a></td></tr>
			<!-- <tr><td class=inner><li><a href="barter.php">Barter</a></td></tr> -->
		<td class=main><b class=other><font class=orange>Other</b></td>
			<tr><td class=inner><li><a href="http://www.sourceforge.net/projects/med-bat" target=newwindow>Sourceforge</a></td></tr>
			<tr><td class=inner><li><a href="https://sourceforge.net/tracker/?group_id=63460&atid=504052" target=newwindow>Report A Bug</a></td></tr>
		<td class=main><b class=other><font class=orange>Options</b></td>
			<tr><td class=inner><li><a href="http://forums.medievalbattles.com" target=newwindow>Public Forums</a></td></tr>
<? 
if($mno > 0)	{	include("include/JSCRIPT.php");	}
if($nno > 0)		{	include("include/JSCRIPT.php");	}
?>
			<tr><td class=inner><li><a href="scores.php">Score Board</a></td></tr>
			<tr><td class=inner><li><a href="preferences.php">Preferences</a></td></tr>
			<tr><td class=inner><li><a href="chat/chat1.html" target=newwindow>IRC</a></td></tr>
			<tr><td class=inner><li><a href="manual.php" target=newwindow>Manual</a></td></tr>

			<tr><td class=inner><li><a href="logout.php">Logout</a></td></tr>
		</ul>
   	</table>
</td></table>
</td></table>
</td></table>
</td></table>




