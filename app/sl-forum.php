<?php

include("include/igtop.php");

echo "<br><br>";

if($sl == no) {
	echo"<center><b class=yellow>You are not Settlement Leader.</b>";
	die();
}

include("common.php");
include("include/connect.php");

if (empty($offset))  {  $offset=0;  }

$numresults=mysql_query("SELECT topicid FROM setforums WHERE setid=$setid");
$numrows=mysql_num_rows($numresults);

$query = "SELECT topicid, name, topic, replies, lastpost, lastposter FROM setforums WHERE setid = '$setid' ORDER by lastpost DESC";
$result= mysql_query($query) or die("Could not run the database query!");

if ($result) { 
echo "
	<table border=0 width=$tablewidth align=center cellspacing=0 cellpadding=0>
		<tr>
			<td bgcolor=$color1>
				<table border=0 width=100% cellspacing=1 cellpadding=0>
					<tr bgcolor=$color1>
						<td align=center><b class=forum>Topic</b></td>
						<td align=center><b class=forum>Posts</b></td>
						<td align=center><b class=forum>Orgin</b></td>
						<td align=center><b class=forum>Last Post by</b></td>
						<td align=center><b class=forum>Last Post</b></td>
						<td align=center><b class=forum>Delete</b></td>
					</tr>";										
	while ($r = mysql_fetch_array($result)) {
	extract ($r);

		$topicreplies = mysql_db_query($dbnam, "SELECT count(topicid) FROM setforumsmsgs WHERE topicid=$topicid");
		$treplies = mysql_result($topicreplies, "treplies");

echo "
					<tr bgcolor=$color2>
						<td valign=top><strong class=black-small><a href=sl-topic.php?topicid=$topicid>$topic</a></strong></td>	
						<td valign=top align=center>$treplies</td>		
						<td valign=top align=center><strong class=black-small>$name$S_L</strong></td>
						<td valign=top align=center><strong class=black-small>$lastposter</strong></td>
						<td valign=top align=center>$lastpost</td>
						<td valign=top align=center><strong class=black-small><a href=sl-delposts.php?delete=true&tid=$topicid><font size=-2>Delete</a></strong></td>
					</tr>";	
	} 
}
echo"
				</table>
			</td>
		</tr>
		<tr>
	</table>";  
  
mysql_free_result($result);
MYSQL_CLOSE();
?>

<br><br>
<form action="sl-input.posts.php" method="post" name="post">
<table border=0 class=f width=60% cellpadding=0 cellspacing=0 bgcolor="<? echo $color2; ?>" align="center">
	<tr>
		<td valign=top bgcolor="<? echo $color1; ?>" align=center colspan=4><strong class=white>Post a Thread</b></td>
	</tr>
	<tr>
		<td align=right><strong class=black>Topic:</strong></td>  
		<td><input type="text" name="topic" maxlength=40 class=black-normal></td>
	</tr>
	<tr>
		<td valign=top align=right><strong class=black>Message: </strong></td> 
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
