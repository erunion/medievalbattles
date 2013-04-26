<?
echo "
<form type='get' action='gc.php'>
<table border='0' width='60%' align='center'>
	<tr>
		<td class='main' colspan='2'><b class='reg'>Create Guild</b></td>
	<tr>
		<td class='main2'><b class='reg'>Name of Guild</b> *</td>
		<td class='inner2'><input type='text' name='gname' size='25' maxlength='15'></td>
	<tr>
		<td class='main2'><b class='reg'>Deletion Password</b> *</td>
		<td class='inner2'><input type='password' name='cpw' size='25'></td>
    <tr>
		<td class='main2'><b class='reg'>Confirm Deletion Password</b> *</td>
		<td class='inner2'><input type='password' name='ccpw' size='25'></td>
	<tr>
		<td class='main2'><b class='reg'>Guild Info</b></td>
		<td class='inner2'><input type='text' name='info' maxlength='60' size='25'></td>
	<tr>
		<td align='center' colspan='2'>* = Required</td>
	</tr>
</table>
<br>
<center><input class='button' type='submit' name='create' value='Create Guild'></center>
<input type='hidden' name='create' value='1'>
</form>";

?>