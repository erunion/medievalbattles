<?php

$var =  @mysql_connect(localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";

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
 <br><br><br><br>
 
<?php
if(!IsSet($update))
{
  ?> 
			<table border="0" bordercolor="#808080"  align=center width="80%">
			<form method=post action="preferences.php">
				<tr>
				  <td class=main height=25>Change Password</td>
				<tr>	
				  <td class=inner2>New Password:<input type="text" name="upw"><br><br>
					<center><input type="submit" name="Change" value="Change Password"></center>
					<input type="hidden" name="update" value="1"> <br>

</form>
</td>
</table>




<?php
}
else
{
	
	 @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET pw = \"$upw\" WHERE email='$email' AND pw='$pw'") or die(mysql_error('Error'));
	
	session_unregister('pw');
		$pw = $upw;
	session_register('pw');
	  
	 
 }


?>



</table><!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>



<? php /*<table border="1" bordercolor="#808080" align=center width="80%">
  <form method=post action="preferences.php">
	<tr>
	  <td class=main height=25>Change Email Address</td>
	    <tr>	
		  <td class=inner2>New Email:<input type="text" name="1"><br><br>
	   	    <br><br>
		     <center> <input type="submit" name="email" value="Change Email"></center>
</form>
</td>
</table>

<table border="1" bordercolor="#808080"   align=center width="80%">
  <form method=post action="preferences.php">
	<tr>
	   <td class=main height=25>Delete Account</td>
	     <tr>	
		   <td class=inner2>Email:<input type="text" name="1"><br><br>
	   	       Password:<input type="text" name="pw"><br><br>
		          <center> <input type="submit" name="submit" value="Delete Account"></center>
				  
</form>

*/?>


