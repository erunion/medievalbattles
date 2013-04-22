<? include ("include/top.php"); ?>
		
		    <center><b>Sign Up</b></center>
			<hr class=main>
			<!-- BODY STARTS -->

		<table border=0 width=400 align=center>
	 <tr>

	  <form type="post" action="signup.php">
      <td><b class=other>Email Address:</b></td>
	  <td><input type="text" name="email"></td>
	 <tr>
	  <td><b class=other>Confirm Email:</b></td>
	  <td><input type="text" name="cemail"></td>
	 <tr>
	  <td><b class=other>Password:</b></td>
	  <td><input type="password" name="pw" maxlength="15"></td>
	 <tr>
	  <td><b class=other>Confirm Password:</b></td>
	  <td><input type="password" name="cpw" maxlength="15"></td>
	 <tr>	
	  <td><b class=other>Empire Name:</b></td>
	  <td><input type="text" name="ename" maxlength="15"></td>
	 <tr>
	  <td><b class=other>Class:</b></td>
	  <td><select name="class">
	    <option selected value="0">-Choose your Class-</option>
		<option value="Fighter">Fighter</option>
		<option value="Cleric">Cleric</option>
		<option value="Mage">Mage</option>
		</select></td>
	 <tr>
	   <td><b class=other>Unit Name:</b></td>
	   <td><input type="text" name="unitname"></td>
	 <tr>
	  <td><b class=other>MSN:</b></td>
	  <td><input type="text" name="msn" maxlength="20"></td>
	 <tr>
	  <td><b class=other>AIM:</b></td>
	  <td><input type="text" name="aim" maxlength="20"></td>
	  <td><input type="hidden" name="signup" value="1"></td> 
	 <tr>
	  
		 </table>


			<!-- BODY ENDS -->
			<hr class=main>

<? include ("include/bottom.php"); ?>		
	