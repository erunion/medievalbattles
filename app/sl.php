<?
include("include/igtop.php");

if($sl == no)	{
	echo"<center><b class=yellow>You are not a SL!</b>";
	die();
}
else	{
}

if(!IsSet($update))	{
	include("include/S_SINFO.php");
}
else	{
	
	include("include/S_SINFOS.php");

	mysql_query("UPDATE settlement SET setpic ='$theseturl' WHERE setid='$setid'");
	mysql_query("UPDATE settlement SET setname ='$thesetname' WHERE  setid='$setid'");
	mysql_query("UPDATE settlement SET setnotice ='$thesetnotice' WHERE  setid='$setid'");

	echo "<div align=center>Your settlement information has been updated.</div>";
	include("include/S_SINFO.php");
	die();

}
?>

</td>
</tr>
</table>
</body>
</html>	