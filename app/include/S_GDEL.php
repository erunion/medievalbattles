<?
echo "
<form type='get' action='guildconfig.php'>
<table border='0' width='60%' align='center'>
	<tr>
		<td class='main' colspan='2'><b class='reg'>Delete Guild</b></td>
	</tr>
	<tr>
		<td class='main2' colspan='2'>Once you click the button, your guild will be deleted.</td>
	</tr>
	<tr>
		<td class='main2'><b class='reg'>Deletion Passwod</b></td>
		<td class='inner2'><input type='password' name='cpw' size='20'></td>
	</tr>
	<tr>
		<td align='center' colspan='2'>
			<input class='button' type='submit' name='deleteg' value='Delete Guild'>
			<input type='hidden' name='deleteg' value='4'>
		</td>
	</tr>
</table>
</form>";

?>