<?
include("include/connect.php");

session_register('login');
session_register('email');
session_register('pw');	

include("functions.php");

function gethostname() {
	$hostaddress = getenv('REMOTE_ADDR');
	if (!$hostaddress) { $hostaddress = getenv('REMOTE_HOST'); }
	$hostaddress = @GetHostByAddr($hostaddress);
	return $hostaddress; }

$hostaddress = gethostname(); 		
$message = nl2br(strip_tags($message,"<i>,<b>"));
$color1 = "#303030";
$color2 = "#460101";
$color3 = "#303030";
$tablewidth= "80%";
$topicdb = "setmain" . "$setid";
$msgsdb = "setmsgs" . "$setid";
?>