<?
$data = "
<table width='100%' border='1' bordercolor='#990000' cellspacing='3' cellpadding='8'>
	<tr>
		<td width='15%' bgcolor='#000000' valign='top'>
			<table align='center'>
				<tr>
					<td align='center'>
						<hr color='#660000' width='45%'>
						<center><b>Sign Up</b></center>
						<hr color='#660000' width='45%'>
							<table width='100%'>
<form type='post' action='checksignup.php'>
								<tr><td>Email Address:</td><td><input type='text' name='email' size='30' maxlength='50'></td></tr>
								<tr><td>Confirm Email:</td><td><input type='text' name='cemail' size='30' maxlength='50'></td></tr>
								<tr><td>Password:</td><td><input type='password' name='pw' size='30' maxlength='15'></td></tr>
								<tr><td>Confirm Password:</td><td><input type='password' size='30' name='cpw' maxlength='15'></td></tr>
								<tr><td>Empire Name:</td><td><input type='text' name='ename' size='30' maxlength='25'></td></tr>
								<tr><td>Race:</td>
									<td><select name='race'>
										<option selected value='ns'>-----------</option>
										<option value='Angel'>Angel</option>
										<option value='Demon'>Demon</option>
										<option value='Dwarf'>Dwarf</option>
										<option value='Elf'>Elf</option>
										<option value='Giant'>Giant</option>
										<option value='Human'>Human</option>
										<option value='Night Elf'>Night Elf</option>
									</select></td></tr>
								<tr><td>Class:</td>
									<td><select name='class'>
										<option selected value='ns'>-------------------</option>
										<option value='Cleric'>Cleric</option>
										<option value='Fighter'>Fighter</option>
										<option value='Insurrectionist'>Insurrectionist</option>
										<option value='Mage'>Mage</option>
										<option value='Ranger'>Ranger</option> 
										<option value='Savant'>Savant</option>
										<option value='Warlock'>Warlock</option>
									</select></td></tr>
								<tr><td>MSN:</td><td><input type='text' name='msn' size='30' maxlength='50'></td></tr>
								<tr><td>AIM:</td><td><input type='text' name='aim' size='30' maxlength='20'></td></tr>
								<tr><td></td></tr>
								<tr align='center'><td colspan='2'><input class='button' type='submit' name='signup' value='Sign up (click only once)'></td></tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>";
?>