<form method=post action="preferences.php">
	<table border="0" bordercolor="#000000" align=center width="40%">
	<tr>
	  <td class=main colspan=2><b>Update Preferences</b></td>
    <tr>
	  <td class=main2><b>Email:</b></td>
	  <td class=inner2><input type="text" name="newemail" maxlength=50 value="<? echo"$email"; ?>"></td>
	<tr>
	  <td class=main2><b>Password:</b></td>
	  <td class=inner2><input type="password" name="upw" maxlength=15 value="<? echo"$pw"; ?>"></td>
	<tr>
	  <td class=main2><b>AIM:</b></td>
	  <td class=inner2><input type="text" name="newaim" maxlength=20 value="<? echo"$aim"; ?>"></td>
	<tr>
	  <td class=main2><b>MSN:</b></td>
	  <td class=inner2><input type="text" name="newmsn" maxlength=50 value="<? echo"$msn"; ?>"></td>
  </table>

    <br><br>
				  <center> <input class=button type="submit" name="update" value="Update Account"></center>
				  <input type="hidden" name="update" value="1">

</form>