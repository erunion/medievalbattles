<? 

if($mno > 0)	{	include("include/JSCRIPT.php");	}
if($nno > 0)		{	include("include/JSCRIPT.php");	}

include ("include/clock.php");

//	display messages
	if($mno == 0)	{	$messtitle = "<li><a href=vmessages.php>View Messages</a>";	}	
	else	{	$messtitle = "<li><b><i><a href=vmessages.php flashtype=0 flashcolor=red id=flashlink>$mno NEW</a></i></b>";	 }
//	display news/main menu
	if($nno == 0)	{	$maintitle = "<li><a href=main.php>Main Menu</a>";	}
	else	{	$maintitle = "<li><b><i><a href=main.php?pageid=news flashtype=0 flashcolor=red id=flashlink>$nno NEWS</a></i></b>";	}
//	are they a gl?
	$gresult = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
		$gnamecheck = mysql_fetch_array($gresult);

	if($gnamecheck[0] === $userid)	{	$gforum_name = "<li><a href=gl-forum.php>Forums</a>";	}
	else	{	$gforum_name = "<li><a href=gforums.php>Forums</a>";	}
//	are they sl?
	if($sl == yes)	{	$sforum_name = "<li><a href=sl-forum.php>Forums</a>";	}
	else	{	$sforum_name =  "<li><a href=sforum.php>Forums</a>";	}

echo "
<table border=1 width=100% align=center bordercolor=#212121 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#2a2929 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#323131 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#3a3838 cellspacing=0 cellpadding=0><tr><td>

<table class=navbar border=1 cellpadding=2 cellspacing=0 width=100% valign=top bordercolor=#000000>
	<tr><td class=main2><font class=orange>$clock<br></font></td></tr>	
<ul>
<!-- display empire pages -->
	<tr><td class=main><b><font class=orange>Empire</b></td></tr>
	<tr><td class=inner>$maintitle</td></tr>
	<tr><td class=inner><li><a href=explore.php>Explore</a></td></tr>
	<tr><td class=inner><li><a href=military.php>Military</a> <a href=equip.php>(E)</a> <a href=wconstruct.php>(W)</a> <a href=aconstruct.php>(A)</a></td></tr>
	<tr><td class=inner><li><a href=disband.php>Disband</a></td></tr>
	<tr><td class=inner><li><a href=research.php>Research</a></td></tr>
	<tr><td class=inner><li><a href=buildings.php>Buildings</a></td></tr>
	<tr><td class=inner><li><a href=status.php?pageid=production>Status</a></td></tr>
<!-- display settlement pages -->
	<tr><td class=main><b class=other><font class=orange>Settlement</b></td></tr>
	<tr><td class=inner><li><a href=settlement.php?change=1&snum=$csnum>View Settlements</a></td></tr>
	<tr><td class=inner>$sforum_name</td></tr>
	<tr><td class=inner><li><a href=snews.php>News</a></td></tr>
	<tr><td class=inner><li><a href=govt.php>Government</a></td></tr>
<!-- display guild pages -->
	<tr><td class=main><b class=other><font class=orange>Guild</a></td></tr>
	<tr><td class=inner><li><a href=gc.php>Guild Center</a></td></tr>
	<tr><td class=inner>$gforum_name</td></tr>
	<tr><td class=inner><li><a href=gnews.php>News</a></td></tr>
	<tr><td class=inner><li><a href=gmembers.php>Members</a></td></tr>		
<!-- display attack pages -->
	<tr><td class=main><b class=other><font class=orange>War</b></td></tr>
	<tr><td class=inner><li><a href=attack.php>Attack</a> <a href=attackr.php>(R)</a> <a href=attackm.php>(M)</a></td></tr>
	<tr><td class=inner><li><a href=scattack.php>Suicide Attack</a></td></tr>
	<tr><td class=inner><li><a href=intel.php>Intelligence</a></td></tr>
<!-- display communication pages -->
	<tr><td class=main><b class=other><font class=orange>Communications</b></td></tr>
	<tr><td class=inner>$messtitle</td></tr>
	<tr><td class=inner><li><a href=messaging.php>Message</a></td></tr>
	<tr><td class=inner><li><a href=barter.php>Barter</a> <a href=guildbarter.php>(G)</a></td></tr>
<!-- display other pages -->	
	<td class=main><b class=other><font class=orange>Other</b></td>
	<tr><td class=inner><li><a href=http://forums.medievalbattles.com target=newwindow>Public Forums</a></td></tr>
	<tr><td class=inner><li><a href=scores.php>Score Board</a></td></tr>
	<tr><td class=inner><li><a href=preferences.php>Preferences</a></td></tr>
	<tr><td class=inner><li><a href=manual.html target=newwindow>Manual</a></td></tr>
	<tr><td class=inner><li><a href=logout.php>Logout</a></td></tr>
	</ul>
</table>
</td></table>
</td></table>
</td></table>
</td></table>";

?>