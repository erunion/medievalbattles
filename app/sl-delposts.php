<?php

// Open buffer
function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");

//	delete topic
if(!IsSet($delete))	{

}
else	{	
	include("common.php");
	include("include/connect.php");

	mysql_query("DELETE FROM setforums WHERE topicid='$tid' AND setid='$setid'"); 
	mysql_query("DELETE FROM setforumsmsgs WHERE topicid='$tid' AND setid='$setid'"); 
	echo "The post was successfully deleted<br>";
	echo "Click <a href=index.php>here</a> to go back";

	header ("Location: sl-forum.php"); 
}

//	delete post
if(!IsSet($delpost))	{

}
else	{	
	include("common.php");
	include("include/connect.php");

	mysql_query("DELETE FROM setforumsmsgs WHERE messageid='$mid'"); 

	$mreplies = "SELECT replies FROM setforums WHERE topicid=$tid";
	$replies = mysql_query($mreplies);
	
	$ureplies = "UPDATE setforums SET replies=$replies-1 WHERE topicid='$tid'";
	mysql_query($ureplies);

	header ("Location: sl-topic.php?topicid=$tid"); 
}

// Close buffer
ob_end_flush();

?>