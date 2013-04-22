<?php
		include("include/igtop.php");
	?>

<br><br>
<?

include("common.php");
include("include/connect.php");

if (empty($offset))  {  $offset=0;  }

$numresults=mysql_query("SELECT topicid FROM setforums WHERE setid=$setid");
$numrows=mysql_num_rows($numresults);
$pages=intval($numrows/$limit);

$query = "SELECT topicid, name, topic, replies, lastpost, lastposter FROM setforums WHERE setid = '$setid' ORDER by lastpost DESC limit $offset,$limit";
$result= mysql_query($query) or die("Could not run the database query!");

echo "
	<form type=post action=\"slsforum.php\">
";

if ($result) { 
	echo "
		<table border=0 class=f width=$tablewidth align=center cellspacing=0 cellpadding=0>
		<tr><td bgcolor=$color1><table border=0 width=100% cellspacing=1 cellpadding=0>
				<tr bgcolor=$color1>
					<td align=center>&nbsp;</td>
					<td align=center><b class=forum>TOPIC</b></td>
					<td align=center><b class=forum>STARTED BY</b></td>
					<td align=center><b class=forum>POSTED LAST</b></td>
					<td align=center><b class=forum>REPLIES</b></td>
					<td align=center><b class=forum>LAST POST</b></td>
				</tr>
	";										
	while ($r = mysql_fetch_array($result)) {
	
	extract ($r);
	//$lastpost = gmdate("d F H:i", $lastpost);	
	
	echo "
		<tr bgcolor=$color2>
			<td valign=top align=center>&nbsp;<input type=checkbox name=postid value=$topicid></td>
			<td valign=top><strong class=black-small>&nbsp;&nbsp; <a href=topic.php?topicid=$topicid>$topic</a></strong></td>		
			<td valign=top><strong class=black-small>&nbsp; $name$S_L</strong></td>
			<td valign=top><strong class=black-small>&nbsp; $lastposter</strong></td>
			<td valign=top width=\"61\" align=center><strong class=black-small>&nbsp; $replies</strong></td>
			<td valign=top width=\"125\">&nbsp;<nobr><small class=black-small>$lastpost</small></nobr></td>
		</tr>
		";		
	} 
}
echo "
<tr bgcolor=#000000>
	<td align=left colspan=\"6\"><input type=\"submit\" name=\"delpost\" value=\"Delete\"></td>
</tr>
";
print "</table></td></tr><tr>";

echo "<td align=center><br>&nbsp";
if (($pages!=0 and $pages!=1) or ($pages==1 and ($numrows%$limit)))// If data <= 1 page skip all
  {   if ($offset!=0) // bypass PREV link if offset is 0
    {  $prevoffset=$offset-$limit;
    print " <a href=\"$PHP_SELF?offset=$prevoffset\"><strong class=black-small>More recent topics</strong></a>";
    }
echo " &nbsp; &nbsp;\n";


  if ($numrows%$limit)// has remainder so add one page
     {
     $pages++;
     }
		
echo " &nbsp; &nbsp; ";

  if ($pages!=1 or (($pages==1 and ($numrows%$limit))))
    {
    if (($offset+$limit)<$numrows) // if last page skip NEXT link
      {$newoffset=$offset+$limit;
      print  "<a href=\"$PHP_SELF?offset=$newoffset\" ><strong class=black-small>Topics before these</strong></a><p>\n";
      }
    }
  }
echo " &nbsp; </td></table>";  
  
  
mysql_free_result($result);
MYSQL_CLOSE();

?>


<form action="input.posts.php" method="post" name="post">
	
<table border=0 class=f width=<? echo $tablewidth; ?> cellpadding=0 cellspacing=0 bgcolor="<? echo $color2; ?>" align="center">
	<tr>
		<td valign=top bgcolor="<? echo $color1; ?>" align=center colspan=4><strong class=white>Post a Thread</strong></td>
	</tr>
	<tr>
		<td align=right><strong class=black>Topic:</strong></td>  <td><input type="text" name="topic" maxlength=40 class=black-normal></td>
		<td colspan=2 width="50%">&nbsp;</td>
	</tr>
	<tr>
		<td valign=top align=right><strong class=black>Message: </strong></td> <td colspan=3><textarea name="message" cols=60 rows=6 wrap="physical"></textarea></td>
	</tr>
	<tr>
		<td colspan=4 align=center><input type="submit" name="addtopic" value="Post this message"></td>
	</tr>
</table>
</form>
   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
