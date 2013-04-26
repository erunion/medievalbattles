<?

@mysql_connect ("localhost", "username", "password") or die(mysql_error());
@mysql_select_db("database") or die(mysql_error());
$dbnam = "database";
$var = @mysql_connect("localhost", "username", "password") or die(mysql_erorr());

//mysql_connect (localhost);
//mysql_select_db(medieval) or die(deadATconnect);
//$dbnam = "medieval";
//$var = @mysql_connect(localhost) or die();

?>
