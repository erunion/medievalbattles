<?php
$ssettlementpic = mysql_db_query($dbnam, "SELECT setpic FROM settlement WHERE setid = '$setid'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
$ssettlementname = mysql_db_query($dbnam, "SELECT setname FROM settlement WHERE setid = '$setid'");	
	$settlename = mysql_result($ssettlementname,"settlename"); 
$setnotice = mysql_db_query($dbnam, "SELECT setnotice FROM settlement WHERE setid = '$setid'");	
	$notice = mysql_result($setnotice,"notice");

echo "
<form type='post' action='sl.php'>
<table border='0' width='80%' align='center'>
	<tr>
		<td colspan='2' class='main'><b class='reg'>Settlement Options</b></td>
	</tr>
	<tr>
		<td class='main2'><b class='other'>Settlement Name:</b></td>
		<td class='inner2'><input type='text' name='thesetname' value='$settlename' maxlength='35' size='50'></td>
	</tr>
	<tr>
		<td class='main2'><b class='other'>Settlement Picture URL:</b></td>
		<td class='inner2'><input type='text' name='theseturl' value='$settlepic' size='50'></td>
	</tr>
	<tr>
		<td class='main2'><b class='other'>Settlement Leader Notice:</b></td>
		<td class='inner2'><input type='text' name='thesetnotice' value='$notice' size=50></td>
	</tr>
	<tr>
		<td align='center' colspan='2'><input type='submit' name='update' value='Update' class='button'><input type='hidden' name='update' value='1'></td>
	</tr>
</table>
</form>";

?>