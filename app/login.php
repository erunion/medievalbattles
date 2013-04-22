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

<form type=get action="checklogin.php">

		<table border=0 align=center>
			
			<tr>
			<td colspan=2>
			<?
				
				if($error == 1)
				{echo"<b class=3>Invalid email or password.</b>";}else{}?>
				
			</td>
			<tr>
				<td><b class=other>Email:</td>
				<td><input type="text" name="email" maxlength=50> </td>
			<tr>
				<td><b class=other>Password:</td>
				<td><input type="password" name="pw" maxlength=15></td>
				<td><input type="hidden" name="login" value="1"></td>

			<tr>
				<td colspan=2><input class=button type="submit" value="Login"></td>
				
		</table>


			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>		
<?php

ob_end_flush();

?>	