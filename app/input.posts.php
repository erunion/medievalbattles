<?php
function callback($buffer) {
  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");
?>

<?
 
	 include("include/connect.php");
		

	session_register('login');
	session_register('email');
	session_register('pw');	
	$uename = mysql($dbnam, "SELECT ename FROM user WHERE email = \"$email\" AND pw = \"$pw\"");
	$ename = mysql_result($uename,"ename");
	$usetid = mysql($dbnam, "SELECT setid FROM user WHERE email = '$email' AND pw = '$pw'");
	$setid = mysql_result($usetid,"setid");
?>

<?php



include("common.php");	
include("include/connect.php");
include("include/clock.php");

if($sl == yes)
	{ $ename = "$ename". "<font class=red>(SL)</font>";}


if ($addtopic) {
	$replies = "0";
	$result = mysql_query("INSERT INTO setforums (setid, name, topic, replies, message, datestamp) 
			VALUES ('$setid', '$ename', '$topic', '$replies', '$message', \"$datestamp\")");

	//echo mysql_errno().": ".mysql_error()."<BR>";
	header ("Location: sforum.php"); 
}



elseif ($addreply) {
	$query1 = mysql_query("INSERT INTO setforumsmsgs (setid, name, topic, topicid, message, datestamp) 
			VALUES ('$setid', '$ename', '$topic', '$topicid', '$message', \"$datestamp\")");

	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	

	$query2 = "UPDATE setforums SET lastpost='$clock' WHERE topicid='$topicid' AND setid='$setid'" ;
	$result2 = mysql_query($query2);

	$query3 = "UPDATE setforums SET replies=replies+1 WHERE topicid='$topicid' AND setid='$setid'";
	$result3 = mysql_query($query3);

	//echo mysql_errno().": ".mysql_error()."<BR>";
	header ("Location: topic.php?topicid=$topicid");
}
else {
		echo "Get off this page before we find out."; }

exit;
mysql_close ;
?>

<?php
ob_end_flush();
?>	