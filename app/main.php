<?php

  @mysql_connect (localhost);
mysql_select_db(mb) or die(darnit);
$dbnam = "mb";
// save time() in a session var, and on the session start, if that var is older than however long, delete the //session
	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>

<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">

</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>

</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->
  <table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
   <tr>
	<td><br><br><br>
	 <table border="0" bordercolor="#808080" align=center width="80%">
	  <tr><td colspan=7 class=main><b class=top>Main Menu</b></td>
	  <tr><td colspan=7 class=main2>The empire of <b class=top><? echo"$ename"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Class:</b><? echo "$class"; ?></td>
	   <td class=inner2><b class=reg>Civilians:</b><? echo"$civ"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Experience:</b><? echo"$exp"; ?></td>
	   <td class=inner2><b class=reg>Iron:</b><? echo"$iron"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Land:</b><? echo"$land"; ?></td>
	   <td class=inner2><b class=reg>Mountains:</b><? echo"$mts"; ?></td>	
	  <tr>
	   <td class=inner2><b class=reg>Gold Pieces:</b><? echo"$gp"; ?></td>
	   <td class=inner2><b class=reg>Food:</b><? echo"$food"; ?></td>
	<tr>
	   <td class=inner2 colspan=2><b class=reg>Empire Defense:</b><? echo"$tdefense"; ?></td>
	   
     </td>
	</tr>
   </table>
   
	
     <br><br>
			 <? if($sl === yes)
				{echo"<center><a href=\"sl.php\">Settlement Management</a></center>";
				}
				else
				{
				}
				?>
   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
