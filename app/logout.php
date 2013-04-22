<?php
  include("include/connect.php");

	session_register('login');
	session_register('email');
	session_register('pw');
mysql_query("UPDATE user SET online = \"0\" WHERE email = \"$email\"");


function callback($buffer) {

  // replace all the apples with oranges
  return (ereg_replace("nothing", "nothing", $buffer));

}

ob_start("callback");

?>
<? include ("include/top.php"); ?>
		
		    <center><b>Logout</b></center>
			<hr class=main>
			<!-- BODY STARTS -->
<table width="60%" align=center><tr><td>

	
<?php

session_start('login');
session_unset('email');
session_unset('pw');

 $login = 0;
?>
<? if ($pageid == 'timeout'){?>
<center><b class=3>You are logged out of your account because your session has timed out.</b>
<br><br><a href="login.php">Return to the Login Page</a></center>
</td></table>
			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>	
<? die(); } ?>
 <center><b class=3>You have logged out of your account.</b><br><br><a href="login.php">Return to the Login Page</a></center>

</td></table>
			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>	

<?php

ob_end_flush();

?>