<?php

// Open buffer
function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");

if ($delete)
{
	include("common.php");
	//mysql_connect($hostname,$username,$passwrd) or die("No db connection");
	@mysql_select_db(medieval) or die( "Unable to select database");

	mysql_query("DELETE FROM setforums WHERE topicid='$postid' AND setid='$setid'"); 
	mysql_query("DELETE FROM setforumsmsgs WHERE topicid='$postid' AND setid='$setid'"); 
	echo "The post was successfully deleted<br>";
	echo "Click <a href=index.php>here</a> to go back";

	header ("Location: sl-forum.php"); 
}
else
{
	echo "What the heck are you doing on this page?";
}

// Close buffer
ob_end_flush();

?>