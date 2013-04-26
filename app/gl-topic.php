<?php

include("include/igtop.php");
include("commong.php");

$result= mysql_query("SELECT topicid, guildname FROM guildthreads WHERE guildname='$empireguild' AND topicid='$topicid'") or die("Error! " . mysql_error());
$guild_check = mysql_fetch_array($result);

if($empireguild != $guild_check[guildname])	{
	echo"<div align=center><font class=yellow>You cannot view forum posts in other guilds!</font></div>";
	die();
}

if($empireguild == None)	{
	echo"<div align=center>You have to be in a guild to view this page!</div>";
	die();
}

$result1 = mysql_query("SELECT name, topic, message, lastpost FROM $topicdb WHERE topicid='$topicid'") or die("Error! " . mysql_error());

if ($result1) { 
	echo"
	<table border=0 class=f align=center cellspacing=1 cellpadding=1 width=95%>
		<tr>
			<td valign=top> </td>
			<td valign=top align=center><a href=gforums.php name=top class=black-small>Return to Guild Forums</a></td>
			<td valign=top align=right> <br><br></td>
		</tr>";
										
	while ($r1 = mysql_fetch_array($result1)) {
	extract ($r1);
	echo "
		<tr>
			<td bgcolor=$color3 width=15% align=left><b class=forum>$name</b></td>
			<td bgcolor=$color3 width=85% align=left><b class=forum>$topic</b></td>
		</tr>
		<tr>
			<td bgcolor=$color2 valign=top colspan=3><pre>$lastpost</pre>$message<br><br></td>
		</tr>	";
	} 
echo "
	</table>";
mysql_free_result($result1);	
}

$query2 = "SELECT messageid, name, topic, message, datestamp FROM $msgsdb WHERE topicid='$topicid' ORDER BY datestamp";
$result2 = mysql_query($query2) or die("Could not execute the query!");

if ($result2) { 
echo "
	<table border=0 class=f width=95% align=center cellspacing=1 cellpadding=1>";
	
	while ($r2 = mysql_fetch_array($result2)) {
	extract ($r2);
		
echo "
		<tr>
			<td bgcolor=$color3 width=15% align=left><b class=forum>$name</b></td>
			<td bgcolor=$color3 width=85% align=left><b class=forum>$topic</b></td>
		</tr>
		<tr>
			<td bgcolor=$color2 valign=top colspan=3><pre>$datestamp</pre>$message<br><br></td>
		</tr>
		<tr>
			<td></td>
		</tr>";
	} 
echo "
	</table><br><br>";	
mysql_free_result($result2);
	}
MYSQL_CLOSE();
?>

<form action="gl-inputposts.php" method="post" name="reply">
<input type="hidden" name="topicid" value="<? echo $topicid; ?>">	
<table border=0 class=f width=<? echo $tablewidth; ?> cellpadding=0 cellspacing=0 align="center" bgcolor=<? echo $color2; ?>>
	<tr>
		<td valign=top bgcolor=<? echo $color1; ?> align=center colspan=4><strong class=white>Post a Reply</strong></td>
	</tr>
	<tr>
		<td align=left colspan=2><strong class=black>Post As Real Name?:</strong> <input type=radio name=realname value=1></td>
		<td width=50% colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td align=right><strong class=black>Topic:&nbsp;</strong></td>  
		<td><input type="text" name="topic" maxlength=40 class="black-normal" value="<? echo $topic; ?>"></td>	
		<td align=right>&nbsp;</td>
	</tr>	
	<tr>
		<td valign=top align=right><strong class=black>Message:&nbsp;</strong></td> 
		<td colspan=3><textarea name="message" cols=60 rows=6 wrap="physical"></textarea></td>
	</tr>
	<tr>
		<td colspan=4 align=center><input type="submit" name="addreply" value="Reply with this message"></td>
	</tr>
</table>
</form>

</td>
</tr>
</table>
</body>
</html>
