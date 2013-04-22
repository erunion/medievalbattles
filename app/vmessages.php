<?php

$var =   @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";
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
 <br><br>

<?php
	$var =  @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = user;
	function display_db_table($tablename, $var)
	{	


global $userid;
			$query_string = "SELECT origin, datesent, message FROM messages WHERE yourid = '$userid'";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			 
			while ($row = mysql_fetch_row($result_id))
		
		{
				print("<TR ALIGN=center VALIGN=TOP>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
		
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		
		print("</TABLE>\n");
	}
	?>
<table border=0 bordercolor="#404040" width="95%" align=right cellspacing=1>
	  <tr>
	    <td colspan=3 class=main><b class=reg>Your messages</b></td>
	  <tr>
		<td class=main2 width="15%"><b class=reg>Origin</b></td>
		<td class=main2><b class=reg width="15%">Date/time received</b></td>
		<td class=main2><b class=reg width="70%">Message</b></td>
		
	  <tr>
        <td><?php display_db_table("user", $var);?></td>
	</table>
</td></table>
   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
