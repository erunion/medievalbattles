<?php

session_register('login');
session_register('email');
session_register('pw');

function callback($buffer) {
	return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");

include("connect.php");
include("functions.php");

echo "
<html>
<head> 
<title>MB Administration</title>
	<link rel=stylesheet type=\"text/css\" href=\"css/ingame.css\">
	<script language=\"JavaScript\" src=\"fade.js\"></script>
</head>

<body>
<table class=outer border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"100%\">
	<TR>
		<TD valign=\"top\" colspan=\"2\">
			<table border=\"0\" width=\"100%\" cellpadding=0 cellspacing=0>
		</TD>
		</TD>
	</TR>  
	<TR valign=\"top\">
		<TD width=\"15%\">";
			include("ignavbar.php");
echo " 
		</TD>
		<TD width=\"85%\">
			<br><br>";

ob_end_flush();

?>	