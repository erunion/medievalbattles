<?


session_register('login');
session_register('email');
session_register('pw');	

include("functions.php");


function gethostname() {
	$hostaddress = getenv('REMOTE_ADDR');
	if(!$hostaddress)	{	$hostaddress = getenv('REMOTE_HOST');	 }
	$hostaddress = @GetHostByAddr($hostaddress);
	return $hostaddress; 
}

$hostaddress = gethostname(); 		
$datestamp = date("d F H:i");

$message = nl2br(strip_tags($message,"<i>,<b>"));

$color1 = "#303030";
$color2 = "#460101";
$color3 = "#303030";

$tablewidth= "80%";

include("include/connect.php");
$guild_id_query = mysql_db_query($dbnam, "SELECT gid FROM guild WHERE gname='$empireguild'");	
	$gid = mysql_result($guild_id_query, "gid");

$empireguild = ereg_replace(" ", "", "$empireguild");
$topicdb = "$empireguild" . "main" . "$gid";
$msgsdb = "$empireguild" . "msgs" . "$gid";

$hostname = "localhost";
$dbname = "medieval";
$username = "medieval";
$passwrd = "laserquest";

?>

