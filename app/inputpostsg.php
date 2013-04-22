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

	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
	$setguild = mysql_result($thesetguild,"setguild");
?>

<?php



	include("commong.php");	
 include("include/connect.php");
 include("include/clock.php");

	
// Is the poster a GL?
$gquery = ("SELECT owner FROM guild WHERE owner=\"$ename\"");
$gresult = mysql_query($gquery);
$gnamecheck = mysql_fetch_array($gresult);
			
 if($gnamecheck[0] == $ename) {
	if(($gnamecheck[0] == $ename) AND ($realname)) {
		$name = $ename;
	}
	else {
		$name = "Guild Leader";
	}
}
else {
	$name = $ename;
}


if ($addtopic) {
	
	$replies = "0";
	$result = mysql_query("INSERT INTO $topicdb (name, topic, replies, message, datestamp) 
			VALUES ('$name', '$topic', '$replies', '$message', \"$datestamp\")");

	$query4 = "UPDATE $topicdb SET lastpost=\"$clock\" WHERE topic='$topic'";
	$result4 = mysql_query($query4);

	$query6 = "UPDATE $topicdb SET lastposter=\"$name\" WHERE topic='$topic'";
	$result6 = mysql_query($query6);

	header ("Location: gforums.php"); 
}

elseif ($addreply) {
	$query1 = mysql_query("INSERT INTO $msgsdb (name, topic, topicid, message, datestamp) 
			VALUES ('$name', '$topic', '$topicid', '$message', \"$datestamp\")");
	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	

	$query5 = "UPDATE $topicdb SET lastpost='$clock' WHERE topicid='$topicid'";
	$result5 = mysql_query($query5);
	
	$query2 = "UPDATE $topicdb SET lastposter=\"$name\" WHERE topicid='$topicid'";
	$result2 = mysql_query($query2);

	$query3 = "UPDATE $topicdb SET replies=replies+1 WHERE topicid='$topicid'";
	$result3 = mysql_query($query3);
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