<?php

session_register('login');
session_register('email');
session_register('pw');

// connect to db
mysql_connect(localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com);

	
// check user
$query = ("SELECT pw FROM user WHERE email='$email'");
$result = mysql_query($query);
$pwcheck = mysql_fetch_array($result);
 if($pwcheck[0] == $pw) 
	{
	
     header("Location: main.php");
	 exit;
	}
 else
	{
	print("<center>Whoops! Either your email or password is wrong!</center>");
	session_unregister('login');
	session_unregister('email');
	session_unregister('pw');
	die();}


?>