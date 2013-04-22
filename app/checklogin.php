<?php

function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");

$pw = md5($pw);
session_register('login');
session_register('email');
session_register('pw');

include("include/connect.php");
include("include/clock.php");

$uename = mysql_db_query($dbnam, "SELECT ename FROM user WHERE email='$email' AND pw='$pw'");
$ename = mysql_result($uename,"ename");
	
// check user
$query = "SELECT pw FROM user WHERE email='$email'";
$result = mysql_db_query($dbnam, $query);
$pwcheck = mysql_fetch_array($result);
if($pwcheck[0] == $pw)	{

	// insert ip address into db
	function gethostname()		{
		$ipaddress = getenv('REMOTE_ADDR');
		if (!$ipaddress) { $ipaddress = getenv('REMOTE_HOST'); }
		$ipaddress = @GetHostByAddr($ipaddress);
		return $ipaddress;
	}
	$ipaddress = gethostname(); 
	mysql_query("UPDATE user SET ip='$ipaddress' WHERE ename='$ename'");
	mysql_query("UPDATE user SET countdown='336' WHERE email='$email' AND pw='$pw'");
	mysql_query("UPDATE user SET lastlogin='$clock' WHERE ename='$ename'");
	mysql_query("UPDATE user SET online='1' WHERE ename='$ename'");

			$O_line_mem = mysql_db_query($dbnam, "SELECT count(online) FROM user WHERE online='1'");
			$onlineusers = mysql_result($O_line_mem,"onlineusers");
			
			$MOST_INFO = mysql_db_query($dbnam, "SELECT mostonline FROM Game_Info");
			$mostonline = mysql_result($MOST_INFO,"mostonline");

			if($onlineusers > $mostonline)	 {
				mysql_query("UPDATE Game_Info SET mostonline='$onlineusers'");
			}
		$L_SETID = mysql_db_query($dbnam, "SELECT setid FROM user WHERE email='$email' AND pw='$pw'");
		$set = mysql_result($L_SETID,"set");

	mysql_query("UPDATE user SET csnum='$set' WHERE email='$email'");
	session_unregister('bad');
	$login = 1;
	session_register('login');
    header("Location: main.php?pageid=news");
	exit;
}
else	{
	session_unregister('login');
	session_unregister('email');
	session_unregister('pw');
	echo "Invalid email or password.";
	echo "<a href=index.php>Login again.</a>";
	die();
}

// close buffer
ob_end_flush();

?>	