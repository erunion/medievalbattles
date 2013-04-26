<?php
include("include/igtop.php");
echo "<br><br>";

if($empireguild == None)	{
	echo"<div align=center>You have to be in a guild to view this page!</div>";
	die();
}

//	are they a gl?
$gresult = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
$gnamecheck = mysql_fetch_array($gresult);
			
if($gnamecheck[0] != $userid)	{
	echo"<div align=center><font class=yellow>You are not a Guild Leader.</font></div>";
	die();
}

include("commong.php");

$query = "SELECT topicid, name, topic, replies, lastpost, lastposter FROM guildthreads WHERE guildname='$empireguild' ORDER by lastpost DESC";
$result= mysql_query($query) or die("Error in query! " . mysql_error());

if ($result) { 
echo "
	<table border=0 width=95% align=center cellspacing=0 cellpadding=0>
		<tr>
			<td bgcolor=$color1>
				<table border=0 width=100% cellspacing=1 cellpadding=0>
					<tr bgcolor=$color1>
						<td align=center><b class=forum>Topic</b></td>
						<td align=center><b class=forum>Posts</strong></td>
						<td align=center><b class=forum>Orgin</b></td>
						<td align=center><b class=forum>Last Post by</b></td>
						<td align=center><b class=forum>Last Post</strong></td>
						<td align=center><b class=forum>Delete</strong></td>
					</tr>";									
	while ($r = mysql_fetch_array($result)) {
	extract ($r);
	
	$topic_replies_query = mysql_db_query($dbnam, "SELECT count(topicid) FROM guildmsgs WHERE topicid=$topicid") or die(mysql_error());
		$topic_replies = mysql_result($topic_replies_query, "topic_replies");
	
echo "
					<tr bgcolor=$color2>
						<td valign=top><strong class=black-small><a href=topicg.php?topicid=$topicid>$topic</a></strong></td>	
						<td valign=top align=center>$topic_replies</td>		
						<td valign=top align=center><strong class=black-small>$name</strong></td>
						<td valign=top align=center><strong class=black-small>$lastposter</strong></td>
						<td valign=top align=center>$lastpost</td>
						<td valign=top align=center><strong class=black-small><a href=gl-delposts.php?delete=true&tid=$topicid><font size=-2>Delete</a></strong></td>
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


<form action="gl-inputposts.php" method="post" name="post">
	
<table class=f border=0 width="60%" cellpadding=0 cellspacing=0 bgcolor="<? echo $color2; ?>" align="center">
	<tr>
		<td valign=top bgcolor="<? echo $color1; ?>" align=center colspan=4><strong class=white>Post a New Thread</strong></td>
	</tr>
	<tr>
		<td><strong class=black>Topic:</strong></td>  
		<td><input type="text" name="topic" maxlength=40 class=black-normal></td>
	</tr>
	<tr>
		<td valign=top><strong class=black>Message: </strong></td> 
		<td><textarea name="message" cols=40 rows=10 wrap="physical"></textarea></td>
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