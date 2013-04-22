<?php

function callback($buffer) {

  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

?>

		
		    
			
			<!-- BODY STARTS -->

		<?php



if(!IsSet($login))
{
session_register('login');
?>
		<table border=1 align=center bgcolor=#630000 bordercolor="#bfbfbf" cellspacing=0 cellpadding=0>
			<form type="post" action="gameadmin.php">
			<tr>
				<td colspan=2 bgcolor="#404040"><center><b><font color="#ffffff">Game Admin Login</font></b></center></td>
			<tr>
				<td><b><font color="#ffffff">Login:</font></td>
				<td><input type="text" name="loginn" maxlength=50></td>
			<tr>
				<td><b><font color="#ffffff">Password:</font></td>
				<td><input type="password" name="pw" maxlength=15></td>
			<tr>
				<td><b><font color="#ffffff">Number:</font></b></td>
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
elseif($loginn == fuji AND $pw == melvin AND $no == 414141)
	{
	session_register('login');
	$pw = melvin;
	session_register('pw');
	
	header("Location: gameconfig.php");
	 exit;
	}
 else
	{
	
	session_unregister($login);
	
	echo"<center>If you keep try to figure out the email, password, identification number again, you will be banned from MB!</center>";die();
	 }
	


?>

			

	
<?php

ob_end_flush();

?>	