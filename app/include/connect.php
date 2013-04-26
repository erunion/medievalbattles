<?

@mysql_connect ("localhost", "username", "password") or die(mysql_error());
@mysql_select_db("database") or die(mysql_error());
$dbnam = "database";
$var = @mysql_connect("localhost", "username", "password") or die(mysql_erorr());

//mysql_connect (localhost, root) or die(mysql_error());
//mysql_select_db(mbv6) or die(mysql_error());
//$dbnam = "mbv6";
//$var = @mysql_connect(localhost, root) or die();

?>
