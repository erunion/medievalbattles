<?php

function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");

 include("include/connect.php");

session_register('login');
session_register('email');
session_register('pw');	

include("commong.php");	
include("include/clock.php");

if ($addtopic) {

	$result = mysql_query("INSERT INTO guildthreads (name, topic, message, datestamp, guildname)		VALUES ('$ename', '$topic', '$message', '$clock', '$empireguild')");

	$result4 = mysql_query("UPDATE guildthreads SET lastpost='$clock' WHERE topic='$topic' AND guildname = '$empireguild'");
	$result6 = mysql_query("UPDATE guildthreads SET lastposter='$ename' WHERE topic='$topic' AND guildname = '$empireguild'");

	header ("Location: gforums.php"); 
}

elseif ($addreply) {

	$query1 = mysql_query("INSERT INTO guildmsgs (name, topic, topicid, message, datestamp)	VALUES ('$ename', '$topic', '$topicid', '$message', '$clock')");

	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	

	$result5 = mysql_query("UPDATE guildthreads SET lastpost='$clock' WHERE topicid='$topicid'");
	$result2 = mysql_query("UPDATE guildthreads SET lastposter='$ename' WHERE topicid='$topicid'");


	header ("Location: topicg.php?topicid=$topicid");
}

else {
		echo "Your IP address has been logged. Get off this page now."; }
exit;
mysql_close ;
?>



<?php

ob_end_flush();

?>	