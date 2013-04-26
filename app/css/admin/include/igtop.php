<?php

session_register('login');
session_register('email');
session_register('pw');

function callback($buffer) {
	return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");

include("connect.php");

echo "
<html>
<head> 
<title>MB Administration</title>
</head>

<body bgcolor=white text=black alink=black link=black vlink=black>";
	include("ignavbar.php");

ob_end_flush();

?>	