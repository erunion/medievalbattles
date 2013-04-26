<font class='orange'><div align='center'><b>All messages get deleted after 4 days</b></div></font><br>

<?php
echo "  <br><br>
	<table border='1' bordercolor='#000000' align='center' width='90%' cellpadding='3' cellspacing='0'>
		<tr>
			<td class='main' colspan='5'><b class='reg'>View Messages</b></td>
		<tr>
			<td class='main2'><b class=reg>Origin</b></td>
			<td class='main2' width='80%'><b class=reg>Message</b></td>";

$query_string = "SELECT origin, datesent, message, mid FROM messages WHERE yourid='$userid' ORDER BY datesent DESC";
$result_id = mysql_db_query($dbnam, $query_string);
while ($row = mysql_fetch_array($result_id))	{
	extract ($row);
	$link = $origin;
	
	// check to see if he/shes allready a GL
	$sresult = mysql_db_query($dbnam, "SELECT setid FROM user WHERE ename='$origin'");
	$setcheck = mysql_fetch_array($sresult);
	
	if($setcheck[0] != "")	{
		$their_set = mysql_db_query($dbnam, "SELECT setid FROM user WHERE ename='$origin'");	
			$snum = mysql_result($their_set,"snum");
		$sender = urlencode($origin);
		$link = "<a href=messaging.php?value=$sender&snum=$snum&setchg=1>$origin($snum)</a>";
	}
	echo "
		<tr align='center' valign='top' colspan='6'>
			<td bgcolor='#404040'>$link</td>
			<td bgcolor='#404040' align='left' width='75%'>$message<br><br><font size='1px' class='orange'><i>Recieved $datesent</i></font></td>\n";
}
echo "
	</table><br>";
?>