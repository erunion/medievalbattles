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
$datestamp = date("d F H:i");
/* make changes to the "0" if the time on your machine is any different to your own area??? add values by seconds, so add 3600 if its 1 hour behind.*/



$message = nl2br(strip_tags($message,"<i>,<b>"));
// strips out all html tags apart from some ones. remove or add more if you want.



$color1 = "#303030";
$color2 = "#460101";
$color3 = "#303030";
// the colours relate to various design elements. change at will


$tablewidth= "80%";
// of the main table on the front page.

$topicdb = "setmain" . "$setid";
$msgsdb = "setmsgs" . "$setid";
// the tables which relate to where the information is stored. these should be the same as 


$hostname = "localhost";
$dbname = "medievalbattles_com";
$username = "ziccarelli";
$passwrd = "pa724";
// your database variables. these need to be changed for your system to make it work!


$iconsfolder = "icons";
// the folder which contain icons that came with zip file.


$limit=30;  
// number of topics displayed on the front page. change this as you will.

?>

