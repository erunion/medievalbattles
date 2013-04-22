<?php

include("include/igtop.php");
include("commong.php");

$query1 = "SELECT name, topic, message, datestamp FROM guildthreads WHERE topicid='$topicid'";
$result1 = mysql_query($query1) or die(mysql_error());

if ($result1) { 
	echo"
	<table border=0 class=f align=center cellspacing=1 cellpadding=1 width=$tablewidth>";
										
	while ($r1 = mysql_fetch_array($result1)) {
	extract ($r1);
	echo "
		<tr>
			<td bgcolor=$color3 width=30% align=left><b class=forum>$name</b></td>
			<td bgcolor=$color3 width=200 align=right><b class=forum>$datestamp</b></td>
			<td bgcolor=$color3 width=30% align=right><b class=forum>$topic</b></td>
		</tr>
		<tr>
			<td bgcolor=$color2 valign=top colspan=3><strong class=black>$message<br><br><br></strong></td>
		</tr>	";
	} 
echo "
	</table>";
mysql_free_result($result1);	
}

$query2 = "SELECT messageid, name, topic, message, datestamp FROM guildmsgs WHERE topicid='$topicid' ORDER BY messageid ASC";
$result2 = mysql_query($query2) or die(mysql_error());

if ($result2) { 
echo "
	<table border=0 class=f width=$tablewidth align=center cellspacing=1 cellpadding=1>";
	
	while ($r2 = mysql_fetch_array($result2)) {
	extract ($r2);
		
echo "
		<tr>
			<td bgcolor=$color3 width=30% align=left><b class=forum>$name</b></td>
			<td bgcolor=$color3 width=200 align=right><b class=forum>$datestamp</b></td>
			<td bgcolor=$color3 width=30% align=right><b class=forum>$topic</b></td>
		</tr>
		<tr>
			<td bgcolor=$color2 valign=top colspan=3><small class=black>$message<br><br><br></small></td>
		</tr>
		<tr>
			<td></td>
		</tr>";
	} 
echo "
	</table><br><br>";	
}
mysql_free_result($result2);
MYSQL_CLOSE();
?>

<form action="inputpostsg.php" method="post" name="reply">
<input type="hidden" name="topicid" value="<? echo $topicid; ?>">	
<table border=0 class=f width=<? echo $tablewidth; ?> cellpadding=0 cellspacing=0 align="center" bgcolor=<? echo $color2; ?>>
	<tr>
		<td valign=top bgcolor=<? echo $color1; ?> align=center colspan=4><strong class=white>Post a Reply</strong></td>
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
