<? 
include ("include/clock.php");

//	display messages
	if($mno == 0)	{	$messtitle = "<a href=vmessages.php>Inbox</a>";	}	
	else	{	$messtitle = "<b><a href=vmessages.php flashtype=0 flashcolor=red id=flashlink>Inbox ($mno New)</a></b>";	 }
//	display news/main menu
	if($nno == 0)	{	$maintitle = "<a href=main.php>Main Menu</a>";	}
	else	{	$maintitle = "<b><i><a href=main.php?pageid=news flashtype=0 flashcolor=red id=flashlink>$nno NEWS</a></i></b>";	}
//	are they a gl?
		$gresult = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
			$gnamecheck = mysql_fetch_array($gresult);
	if($gnamecheck[0] === $userid)	{	$gforum_name = "<a href=gl-forum.php>Forums</a>";	}
	else	{	$gforum_name = "<a href=gforums.php>Forums</a>";	}
//	are they sl?
	if($sl == yes)	{	$sforum_name = "<a href=sl-forum.php>Forums</a>";	}
	else	{	$sforum_name =  "<a href=sforum.php>Forums</a>";	}

echo "
<table border=1 width=100% align=center bordercolor=#212121 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#2a2929 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#323131 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#3a3838 cellspacing=0 cellpadding=0><tr><td>

<table border=1 cellpadding=1 cellspacing=0 width=100% valign=top bordercolor=#000000>
	<tr><td class=main2 align=center><font class=orange>$clock<br></font></td></tr>	
<!-- display empire pages -->
	<tr><td class=main><b><font class=orange>Empire Options</b></td></tr>
	<tr><td class=navbartxt>$maintitle</td></tr>
	<tr><td class=navbartxt><a href=status.php?pageid=production>Empire Status</a></td></tr>
	<tr><td class=navbartxt><a href=settlement.php?change=1&snum=$csnum>View Settlements</a></td></tr>
	<!--<tr><td class=navbartxt><a href=barter.php>Barter</a></td></tr>-->
	<tr><td class=navbartxt><a href=trade.php>Trade</a></td></tr>
<!-- display settlement pages -->
	<tr><td class=main><b class=other><font class=orange>Development</b></td></tr>
	<tr><td class=navbartxt><a href=buildings.php>Buildings</a> &nbsp;|&nbsp; <a href=explore.php>Explore</a></td></tr>
	<tr><td class=navbartxt><a href=military.php>Military</a> &nbsp;|&nbsp; <a href=equip.php>Equip</a></td></tr>
	<tr><td class=navbartxt><a href=animate.php>Animate</a></td></tr>
	<tr><td class=navbartxt><a href=wconstruct.php>Weapons</a> &nbsp;|&nbsp; <a href=aconstruct.php>Armors</a></td></tr>
	<tr><td class=navbartxt><a href=disband.php>Disband</a> &nbsp;|&nbsp; <a href=research.php>Research</a></td></tr>
<!-- display settlement pages -->
	<tr><td class=main><b class=other><font class=orange>Settlement</b></td></tr>
	<tr><td class=navbartxt>$sforum_name &nbsp;|&nbsp; <a href=snews.php>News</a></td></tr>
	<tr><td class=navbartxt><a href=govt.php>Government</a></td></tr>
<!-- display guild pages -->
	<tr><td class=main><b class=other><font class=orange>Guild</a></td></tr>
	<tr><td class=navbartxt><a href=gc.php>Guild Center</a></td></tr>
	<tr><td class=navbartxt>$gforum_name &nbsp;|&nbsp; <a href=gnews.php>News</a></td></tr>
	<tr><td class=navbartxt><a href=gmembers.php>Members</a></td></tr>		
<!-- display attack pages -->
	<tr><td class=main><b class=other><font class=orange>War Options</b></td></tr>
	<tr><td class=navbartxt><a href=attack.php>Attack</a> <a href=attackr.php>(R)</a> <a href=attackm.php>(M)</a></td></tr>
	<tr><td class=navbartxt><a href=scattack.php>Suicide Attack</a></td></tr>
	<tr><td class=navbartxt><a href=intel.php>Intelligence</a></td></tr>
<!-- display communication pages -->
	<tr><td class=main><b class=other><font class=orange>Communication</b></td></tr>
	<tr><td class=navbartxt>$messtitle</td></tr>
	<tr><td class=navbartxt><a href=messaging.php>Message</a></td></tr>
<!-- display other pages -->	
	<tr><td class=main><b class=other><font class=orange>Other</b></td></tr>
	<tr><td class=navbartxt><a href=preferences.php>Preferences</a></td></tr>
	<tr><td class=navbartxt><a href=scores.php>Scores</a> &nbsp;|&nbsp; <a href=http://forum.decoymedia.com target=newwindow>Forums</a></td></tr>
	<tr><td class=navbartxt><a href=manual.html target=newwindow>Manual</a></td></tr>
	<tr><td class=navbartxt><a href=logout.php>Logout</a></td></tr>
</table>
</td></table>
</td></table>
</td></table>
</td></table>";

?>