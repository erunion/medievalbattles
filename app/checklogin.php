<?php

function callback($buffer) {

  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

?>

<?php

session_register('login');
session_register('email');
session_register('pw');



// connect to db
 include("include/connect.php");
// clock for last login date
include("include/clock.php");

$uename = mysql($dbnam, "SELECT ename FROM user WHERE email = '$email' AND pw = '$pw'");
$ename = mysql_result($uename,"ename");
	
// check user
$query = ("SELECT pw FROM user WHERE email='$email'");
$result = mysql_query($query);
$pwcheck = mysql_fetch_array($result);
 if($pwcheck[0] == $pw) 
	{

// Insert IP Address into DB
function gethostname() 
{
	$ipaddress = getenv('REMOTE_ADDR');
	if (!$ipaddress) { $ipaddress = getenv('REMOTE_HOST'); }
	$ipaddress = @GetHostByAddr($ipaddress);
	return $ipaddress;
}
include("include/connect.php");
$ipaddress = gethostname(); 
mysql_query("UPDATE user SET ip = \"$ipaddress\" WHERE ename = \"$ename\"");
mysql_query("UPDATE user SET lastlogin = \"$clock\" WHERE ename = \"$ename\"");
mysql_query("UPDATE user SET online = \"1\" WHERE ename = \"$ename\"");
			$O_line_mem = mysql($dbnam, "SELECT count(online) FROM user WHERE online='1'");
			$onlineusers = mysql_result($O_line_mem,"onlineusers");
			
			$MOST_INFO = mysql($dbnam, "SELECT mostonline FROM Game_Info");
			$mostonline = mysql_result($MOST_INFO,"mostonline");

			if($onlineusers > $mostonline)
				{
						mysql_query("UPDATE Game_Info SET mostonline =\"$onlineusers\"");

				}
		$L_SETID = mysql($dbnam, "SELECT setid FROM user WHERE email='$email' AND pw='$pw'");
		$set = mysql_result($L_SETID,"set");
mysql_query("UPDATE user SET csnum = \"$set\" WHERE email = \"$email\"");
	session_unregister('bad');
		$login = 1;
	session_register('login');
     header("Location: main.php");
	 exit;
	}
 else
	{
	mysql_query("UPDATE user SET lastpw = \"$pw\" WHERE email = \"$email\"");
	session_unregister('login');
	session_unregister('email');
	session_unregister('pw');
$error == 1;
session_register('error');

header("Location: login.php?error=1");
	die();}


?>

<?php

ob_end_flush();

?>	