	<form type=get action="gc.php">
	<table border=0 width="60%" align=center>
	 <tr>
	   <td class=main colspan=2><b class=reg>Create Guild</b></td>
	
	 <tr>
	   <td class=main2 colspan=2>A SL will need the guild name and entry password to be apart of your guild.</td>
	 <tr>
	   <td class=main2 colspan=2>If you are making a guild, dont make it for the heck of it. Make sure you have a settlement or 2 to join before creating.</td>
	  <tr>
	   <td class=main2><b class=reg>Guild Name</b></td><td class=inner><center><input type="text" name=gname size=15 maxlength=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Entry Password</b></td><td class=inner><center><input type="text" name="epw" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Confirm Entry Password</b></td><td class=inner><center><input type="text" name="cepw" size=15></center></td>

	 <tr>
	   <td class=main2><b class=reg>Config. Password</b></td><td class=inner><center><input type="text" name="cpw" size=15></center></td>
     <tr>
	   <td class=main2><b class=reg>Confirm Config. Password</b></td><td class=inner><center><input type="text" name="ccpw" size=15></center></td>
	 <tr>
	   <td class=main2><b class=reg>Guild Info</b></td><td class=inner><center><textarea name=info rows=6 cols=20 wrap></textarea></center></td>
	 </table>
	 <br>
	<center><input class=button type=submit name=create value=Create></center>
	<input type="hidden" name="create" value="1">
	</form>