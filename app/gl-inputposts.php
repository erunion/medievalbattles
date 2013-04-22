<?php

function callback($buffer) {
	return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");
 
include("include/connect.php");

session_register('login');
session_register('email');
session_register('pw');	

$uename = mysql_db_query($dbnam, "SELECT ename FROM user WHERE email='$email' AND pw='$pw'");
	$ename = mysql_result($uename,"ename");

include("commong.php");	
include("include/clock.php");

// are they a gl?
$gresult = mysql_db_query($dbnam, "SELECT owner FROM guild WHERE owner='$userid'");
$gnamecheck = mysql_fetch_array($gresult);
			
if ($addtopic) {
	
	$replies = "0";
	$result = mysql_query("INSERT INTO guildthreads (name, topic, replies, message, datestamp, guildname) VALUES ('$ename', '$topic', '$replies', '$message', '$clock', '$empireguild')");

	$query4 = "UPDATE guildthreads SET lastpost='$clock' WHERE topic='$topic' AND guildname = '$empireguild'";
	$result4 = mysql_query($query4);

	$query6 = "UPDATE guildthreads SET lastposter='$ename' WHERE topic='$topic' AND guildname = '$empireguild'";
	$result6 = mysql_query($query6);
echo $query4 . "<BR>" . $query6;
	header ("Location: gl-forum.php"); 
}

elseif ($addreply) {
	$query1 = mysql_query("INSERT INTO guildmsgs (name, topic, topicid, message, datestamp) VALUES ('$ename', '$topic', '$topicid', '$message', $clock')");
	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	

	$query5 = "UPDATE guildthreads SET lastpost='$clock' WHERE topicid='$topicid'";
	$result5 = mysql_query($query5);
	
	$query2 = "UPDATE guildthreads SET lastposter= '$ename' WHERE topicid= '$topicid'";
	$result2 = mysql_query($query2);

	$query3 = "UPDATE guildthreads SET replies=replies+1 WHERE topicid='$topicid'";
	$result3 = mysql_query($query3);
	header ("Location: gl-topic.php?topicid=$topicid");
}

else {
		echo "Your IP address has been logged. Get off this page now."; 
}
exit;
mysql_close ;
ob_end_flush();
?>	