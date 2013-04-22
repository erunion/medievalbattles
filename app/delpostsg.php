<?php

// Open buffer
function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");

$thesetguild = mysql_db_query($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
$setguild = mysql_result($thesetguild,"setguild");
$setgid = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname = '$setguild'");	
$thesgid = mysql_result($setgid,"thesgid");

$setguild = ereg_replace(" ", "", "$setguild");
$topicdb = "$setguild" . "main" . "$thesgid";
$msgsdb = "$setguild" . "msgs" . "$thesgid";

if ($delete)
{
	include("commong.php");
	include("include/connect.php");

	//mysql_connect($hostname,$username,$passwrd) or die("No db connection");
	@mysql_select_db(medieval) or die( "Unable to select database");

	mysql_query("DELETE FROM $topicdb WHERE topicid='$postid'"); 
	mysql_query("DELETE FROM $msgsdb WHERE topicid='$postid'"); 
	echo "The post was successfully deleted<br>";
	echo "Click <a href=index.php>here</a> to go back";

	header ("Location: gl-forum.php"); 
}
else
{
	echo "What the heck are you doing on this page?";
}

// Close buffer
ob_end_flush();

?>