<?php

function callback($buffer) {

  return (ereg_replace("nothing", "nothing", $buffer));
}

ob_start("callback");

?>
	    
<?php

if(!IsSet($login))
{
session_register('login');
?>

<table border=1 align=center cellspacing=0 cellpadding=0>
<form type="post" action="index.php">
 <tr>
  <td colspan=2><center><b>Administrator Login</b></center></td>
 <tr>
  <td><b>Name:</td>
  <td><input type="text" name="loginn" maxlength=50></td>
 <tr>
  <td><b>Password:</td>
  <td><input type="password" name="pw" maxlength=15></td>
 <tr>
  <td><b>Access Number:</b></td>
  <td><input type="number" name="no" maxlength=15></td></td>
 <tr>
  <td colspan=2><center><input type="submit" name="login" value="Login"></center></td>
	<input type="hidden" name="login" value="1">
</table>

<?php
}
elseif($login == 1)
{
}
elseif($loginn == CHANGEME AND $pw == CHAGNEME AND $no == CHANGEME)
	{
	session_register('login');
	$pw = CHANGEME;
	session_register('pw');
	
	header("Location: gameconfig.php");
	exit;
	}
 else
	{
	
	session_unregister($login);
	
	echo "If you keep try to figure out the email, password, identification number again, you will be banned from MB!";
	die();
	 }
?>

<?php

ob_end_flush();

?>	