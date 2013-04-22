<table cellspacing=1 cellpadding=1 width=450 bgcolor=#990000 border=1 bordercolor=#990000>
	<tr>
		<td bgcolor=#000000>
			<font face=tahoma color=#ffffff size=2>
			<center><b>Signup</b></center>
			</font>
		</td>
	</tr>
	<tr>
		<td bgcolor=#000000><form type=post action=checksignup.php>
			<table>
			<tr><td class=signup>Email Address:</td><td><input type=text name=email size=15 maxlength=50></td></tr>
			<tr><td class=signup>Confirm Email:</td><td><input type=text name=cemail size=15 maxlength=50></td></tr>
			<tr><td class=signup>Password:</td><td class=signup><input type=password name=pw size=10 maxlength=15></td></tr>
			<tr><td class=signup>Confirm Password:</td><td><input type=password size=10 name=cpw maxlength=15></td></tr>
			<tr><td class=signup>Empire Name:</td><td><input type=text name=ename size=15 maxlength=25></td></tr>
			<tr><td class=signup>Race:</td>
				<td><select name=race>
					<option selected value=ns>-----------</option>
					<option value=Human>Human</option>
					<option value=Orc>Orc</option>
					<option value=Dwarf>Dwarf</option>
					<option value=Elf>Elf</option>
					<option value=Giant>Giant</option>
					</select></td></tr>
			<tr><td class=signup>Class:</td>
				<td><select name=class>
					<option selected value=ns>-----------</option>
					<option value=Fighter>Fighter</option>
					<option value=Cleric>Cleric</option>
					<option value=Mage>Mage</option>
					<option value=Ranger>Ranger</option> 
					</select></td></tr>
			<tr><td class=signup>MSN:</td><td><input type=text name=msn maxlength=50></td></tr>
			<tr><td class=signup>AIM:</td><td><input type=text name=aim maxlength=20></td></tr>
			<tr><td></td></tr>
			<tr><td colspan=2><input class=button type=submit name=signup value="Sign-Up (click only once)"></td></tr>
			</table>
		</td>
	</tr>
</table>
</form>
