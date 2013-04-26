<?php
$ssettlementpic = mysql_db_query($dbnam, "SELECT setpic FROM settlement WHERE setid = '$setid'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
$ssettlementname = mysql_db_query($dbnam, "SELECT setname FROM settlement WHERE setid = '$setid'");	
	$settlename = mysql_result($ssettlementname,"settlename"); 
$setnotice = mysql_db_query($dbnam, "SELECT setnotice FROM settlement WHERE setid = '$setid'");	
	$notice = mysql_result($setnotice,"notice");
						   ?>


<form type=post action=sl.php>
<table border=0 width=60% align=center>
	<tr>
		<td colspan=2 class=main><b class=reg>Settlement Options</b></td>
	<tr>
		<td colspan=2 class=main2>Here you can make a Settlement Name, a Settlement Picture, declare your NAP's and a SL Notice.</td>
	<tr>
		<td class=inner2><b class=other>Settlement Name:</b></td>
		<td class=inner2><input type="text" name="thesetname" value="<? echo"$settlename"; ?>" maxlength=35 size=50></td>
	<tr>
		<td class=inner2><b class=other>Settlement Picture URL:</b></td>
		<td class=inner2><input type="text" name="theseturl" value="<? echo"$settlepic"; ?>" size=50></td>
	<tr>
		<td class=inner2><b class=other>Settlement Leader Notice:</b></td>
		<td class=inner2><input type="text" name="thesetnotice" value="<? echo"$notice"; ?>" size=50></td>
	<tr>
		<td class=inner2 colspan=2><center><input type="submit" name="update" value="Update" class=button></center><input type="hidden" name="update" value="1"></td>
		</table>
	   </form>