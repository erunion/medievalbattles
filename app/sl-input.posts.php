<?php
function callback($buffer) {
  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");

include("include/connect.php");
		
session_register('login');
session_register('email');
session_register('pw');	

$uename = mysql_db_query($dbnam, "SELECT ename FROM user WHERE email='$email' AND pw='$pw'");
	$ename = mysql_result($uename,"ename");
$usetid = mysql_db_query($dbnam, "SELECT setid FROM user WHERE email='$email' AND pw='$pw'");
	$setid = mysql_result($usetid,"setid");

include("common.php");	
include("include/clock.php");

if($sl == yes)	{
	$ename = "$ename". "<font class=red>(SL)</font>";
}


if ($addtopic) {
	$result = mysql_query("INSERT INTO setforums (setid, name, topic, replies, message, datestamp)	VALUES ('$setid', '$ename', '$topic', '$replies', '$message', '$clock')");

	$topic_lastpost = mysql_query("UPDATE setforums SET lastpost='$clock' WHERE topic='$topic' AND setid='$setid'");
	$topic_lastposter = mysql_query("UPDATE setforums SET lastposter='$ename' WHERE topic='$topic' AND setid='$setid'");

	header ("Location: sl-forum.php"); 
}
elseif ($addreply) {
	$query1 = mysql_query("INSERT INTO setforumsmsgs (setid, name, topic, topicid, message, datestamp)	 VALUES ('$setid', '$ename', '$topic', '$topicid', '$message', '$clock')");

	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	

	$reply_lastpost = mysql_query("UPDATE setforums SET lastpost='$clock' WHERE topicid='$topicid' AND setid='$setid'");
	$reply_lastposter = mysql_query("UPDATE setforums SET lastposter='$ename' WHERE topicid='$topicid' AND setid='$setid'");

	header ("Location: sl-topic.php?topicid=$topicid");
}
else {
		echo "Wah! This page has no text! Get off! Hurry!"; 
}

exit;
mysql_close ;
ob_end_flush();
?>	