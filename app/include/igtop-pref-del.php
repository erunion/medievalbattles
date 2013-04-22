<?php

session_register('login');
session_register('email');
session_register('pw');

function callback($buffer) {

  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

include("include/connect.php");
include("functions.php");

?>
<HTML>
<HEAD> 
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">
	<script language="JavaScript" src="fade.js"></script>

</HEAD>

<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>

  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>

</TD><table border=1 width=100% align=center bordercolor=#212121 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#2a2929 cellspacing=0 cellpadding=0><tr><td>
<table border=1 width=100% align=center bordercolor=#323131 cellspacing=0 cellpadding=0><tr><td>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#3a3838" width="100%">
	<tr>
	 <td class=top width=20%><b class=rtop>Gold Pieces: </b><? echo"$gp"; ?> </td>
	 <td class=top width=20%><b class=rtop>Civilians: </b><? echo"$civ"; ?></td>
	 <td class=top width=20%><b class=rtop>Land:</b> <? echo"$land"; ?></td>
	 <td class=top width=20%><b class=rtop>Mountains: </b><? echo"$mts"; ?></td>
	 <td class=top width=20%><b class=rtop>Experience: </b><? echo"$exp"; ?></td>
	</table></td></table></td></table></td></table>
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%">