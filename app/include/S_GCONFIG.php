<?
echo "
<form type='get' action='guildconfig.php'>
<table border='0' width='80%' align='center'>
	<tr>
		<td class='main' colspan='2'><b class='reg'>Change Guild Settings</b></td>
	</tr>
	<tr>
		<td class='main2'><b class='reg'>Guild Leader Notice</b></td>
		<td class='inner'><center><input type='text' name='notice' size='45' maxlength='60' value='$gnotice'></center></td>
	</tr>
	<tr>
		<td class='main2'><b class='reg'>Guild Info</b></td>
		<td class='inner'><center><input type='text' name='info' size='45' maxlength='60' value='$ginfo'></center></td>
	</tr>
	<tr>
		<td class='main2'><b class='reg'>Guild Flag</b></td>
		<td class='inner'><center><input type='text' name='flag' size='45' maxlength='255' value='$gflag'></center></td>
	</tr>
	<tr>
		<td align='center' colspan='2'><input class='button' type='submit' name='change' value='Change'><input type='hidden' name='change' value='1'></td>
	</tr>
</table>
</form>";
?>