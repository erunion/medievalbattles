<?php

$var =  @mysql_connect (localhost, ziccarelli, pa724);
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
<br><br><br>









   








	
	<?php
	if(!IsSet($create))
{
   ?> 
		<form type=get action="gc.php?pageid=2">
	<table border=0 width="60%" align=center>
	 <tr>
	   <td class=main colspan=2><b class=reg>Create Guild</b></td>
	 <tr>
	   <td class=main2><b class=reg>Guild Name</b></td><td class=inner><center><input type="text" name="gname" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Entry Password</b></td><td class=inner><center><input type="text" name="epw" size=15></center></td>
     <tr>
	   <td class=main2><b class=reg>Confirm Entry Password</b></td><td class=inner><center><input type="text" name="cepw" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Forum Password</b></td><td class=inner><center><input type="text" name="fpw" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Confirm Forum Password</b></td><td class=inner><center><input type="text" name="cfpw" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Guild Info</b></td><td class=inner><center><textarea name=info rows=6 cols=20 wrap></textarea></center></td>
	 </table>
	 <br>
	<center><input class=button type=submit name=create value=Create></center>
	<input type="hidden" name="create" value="1">
	</form>

<?php
}
else
{

if($epw != $cepw)
		{print "Your passwords do not match."; die();
		}
		elseif($fpw != $cfpw)
			{print"Your forum passwords do not match."; die();
			}
			elseif (($epw == "") or ($fpw == ""))
				{print"You did not specify a password for one or more of the fields"; die();
				}else
					{
					
						$gid = $mgid + 1;

					@mysql_connect (localhost, ziccarelli, pa724);
					 mysql_select_db (medievalbattles_com);
					 mysql_query("INSERT INTO guild (gname, epw, fpw, info, gid) 
						VALUES	('$gname', '$epw', '$fpw', '$info', '$gid') ");
						
	 
	 
			            }
}


?>














   </table><!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
