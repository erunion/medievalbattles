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
?>

<?php



	include("commong.php");	
 include("include/connect.php");

		
			// CHECK TO SEE IF A GL
				$G_queryG = ("SELECT gname FROM guild WHERE owner=\"$ename\"");
				$G_resultG = mysql_query($G_queryG);
				$G_namecheckG = mysql_fetch_array($G_resultG);
			if($G_namecheckG[0] != "")	
				{
					
				$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
				$setguild = mysql_result($thesetguild,"setguild");


				}
			if($G_namecheckG[0] == $setguild)
				{$ename = "Guild Leader";
				}	


if ($addtopic) {
	
	$replies = "0";
	$result = mysql_query("INSERT into $topicdb values (NULL,\"$ename\",'$hostaddress','$topic','$datestamp','$replies','$message','$datestamp')");
	//echo mysql_errno().": ".mysql_error()."<BR>";
	header ("Location: gforums.php"); 
}

elseif ($addreply) {
	$query1 = "INSERT into $msgsdb values (NULL, \"$ename\",'$hostaddress','$topic','$topicid','$message','$datestamp')";
	$result1 = mysql_query($query1);
	$lastid = mysql_insert_id();	
	$query2 = "UPDATE $topicdb SET lastpost='$datestamp' WHERE topicid='$topicid'" ;
	$result2 = mysql_query($query2);
	$query3 = "UPDATE $topicdb SET replies=replies+1 WHERE topicid='$topicid'";
	$result3 = mysql_query($query3);
	//echo mysql_errno().": ".mysql_error()."<BR>";
	header ("Location: topicg.php?topicid=$topicid");
}

else {
		echo "MOOOOOOOOOOOOOOOOOOOOVVVVEEEEEEEEE!!!!!!!!"; }
exit;
mysql_close ;
?>



<?php

ob_end_flush();

?>	