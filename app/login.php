<?php

function callback($buffer) {

  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

?>
<? include ("include/top.php"); ?>
		
		    <center><b>Login</b></center>
			<hr class=main>
			<!-- BODY STARTS -->

		<?php



if(!IsSet($login))
{

  ?>
		<table border=0 align=center>
			<form type="post" action="login.php">
			<tr>
				<td><b class=other>Email:</td>
				<td><input type="text" name="email" maxlength=50></td>
			<tr>
				<td><b class=other>Password:</td>
				<td><input type="password" name="pw" maxlength=15></td>
				<td><input type="hidden" name="login" value="1"></td>

			<tr>
				<td colspan=2><input class=button type="submit" value="Login"></td>
				
		</table>
<?php
}
elseif($login == 1)
{

// connect to db
mysql_connect(localhost);
mysql_select_db(mb);

	
// check user
$query = ("SELECT pw FROM user WHERE email='$email'");
$result = mysql_query($query);
$pwcheck = mysql_fetch_array($result);
 if($pwcheck[0] == $pw) 
	{
	session_register('login');
	session_register('email');
	session_register('pw');

     header("Location: main.php?email=$email&pw=$pw");
	 exit;
	}
 else
	{
	print("<center>Whoops! Either your email or password is wrong!</center>");
	die();}
};
?>

			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>		
<?php

ob_end_flush();

?>	