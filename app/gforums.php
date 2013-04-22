<?php

include("include/igtop.php");
echo "<br><br>";

//	determine guild name
$empire_guild_query = mysql_db_query($dbnam, "SELECT guild FROM user WHERE email='$email' AND pw='$pw'");	
	$empireguild = mysql_result($empire_guild_query,"empireguild");

if($empireguild == None)	{
	echo"<div align=center><font class=yellow>You must be the member of a guild to view this page.</font></div>";
	die();
}

//	determine owner
$guild_owner_query = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE gname='$empireguild'");	
	$owner_query = mysql_result($guild_owner_query,"owner_query");

if($owner_query == $userid)	{
	echo "<script type=javascript>location.href=gl-forum.php;</script>";
}


include("commong.php");

$query = "SELECT topicid, name, topic, replies, lastpost, lastposter FROM guildthreads WHERE guildname='$empireguild' ORDER by lastpost DESC";
$result= mysql_query($query) or die("Error in query! " . mysql_error());

if ($result) { 
echo "
	<table border=0 width=$tablewidth align=center cellspacing=0 cellpadding=0>
		<tr>
			<td bgcolor=$color1>
				<table border=0 width=100% cellspacing=1 cellpadding=0>
					<tr bgcolor=$color1>
						<td align=center><b class=forum>TOPIC</b></td>
						<td align=center><b class=forum>STARTED BY</b></td>
						<td align=center><b class=forum>POSTED LAST</b></td>
						<td align=center><b class=forum>REPLIES</strong></td>
						<td align=center><b class=forum>LAST POST</strong></td>
					</tr>";									
	while ($r = mysql_fetch_array($result)) {
	extract ($r);
	
	$topic_replies_query = mysql_db_query($dbnam, "SELECT count(topicid) FROM guildmsgs WHERE topicid=$topicid");
		$topic_replies = mysql_result($topic_replies_query, "topic_replies");
	
echo "
					<tr bgcolor=$color2>
						<td valign=top><strong class=black-small>&nbsp;&nbsp; <a href=topicg.php?topicid=$topicid>$topic</a></strong></td>			
						<td valign=top><strong class=black-small>&nbsp; $name</strong></td>
						<td valign=top><strong class=black-small>&nbsp; $lastposter</strong></td>
						<td valign=top width=61 align=center><strong class=black-small>&nbsp; $topic_replies</strong></td>
						<td valign=top width=125>&nbsp;<nobr><small class=black-small>$lastpost</small></nobr></td>
					</tr>";			
	} 
}
echo "
				</table>
			</td>
		</tr>
	</table>";  
    
mysql_free_result($result);
MYSQL_CLOSE();	
?>


<form action="inputpostsg.php" method="post" name="post">
	
<table class=f border=0 width=<? echo $tablewidth; ?> cellpadding=0 cellspacing=0 bgcolor="<? echo $color2; ?>" align="center">
	<tr>
		<td valign=top bgcolor="<? echo $color1; ?>" align=center colspan=4><strong class=white>Post a Thread</strong></td>
	</tr>
	<tr>
		<td align=right><strong class=black>Topic:</strong></td>  
		<td><input type="text" name="topic" maxlength=40 class=black-normal></td>
		<td colspan=2 width="50%">&nbsp;</td>
	</tr>
	<tr>
		<td valign=top align=right><strong class=black>Message: </strong></td> 
		<td colspan=3><textarea name="message" cols=60 rows=6 wrap="physical"></textarea></td>
	</tr>
	<tr>
		<td colspan=4 align=center><input type="submit" name="addtopic" value="Post this message"></td>
	</tr>
</table>
</form>

</td>
</tr>
</table>
</body>
</html>
<?
// close buffer
ob_end_flush();
?>