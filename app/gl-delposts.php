<?php

// Open buffer
function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");

$guild_id = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname='$empireguild'");	
	$gid = mysql_result($setgid,"thesgid");

$empireguild = ereg_replace(" ", "", "$empireguild");
$topicdb = "$empireguild" . "main" . "$gid";
$msgsdb = "$empireguild" . "msgs" . "$gid";

//	delete topic
if(!IsSet($delete))	{

}
else	{	
	include("commong.php");
	include("include/connect.php");

	mysql_query("DELETE FROM $topicdb WHERE topicid='$tid'"); 
	mysql_query("DELETE FROM $msgsdb WHERE topicid='$tid'"); 

	header ("Location: gl-forum.php"); 
}

//	delete post
if(!IsSet($delpost))	{

}
else	{	
	include("commong.php");
	include("include/connect.php");

	mysql_query("DELETE FROM $topicdb WHERE topicid='$postid'"); 
	mysql_query("DELETE FROM $msgsdb WHERE topicid='$postid'"); 

	header ("Location: gl-topic.php"); 
}

// Close buffer
ob_end_flush();

?>