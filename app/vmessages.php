<?php include("include/igtop.php");?>

<?
		mysql_query("UPDATE user SET mno =\"0\" WHERE email='$email' AND pw='$pw'"); 
		$MSG_COUNT = mysql($dbnam, "SELECT count(message) FROM messages WHERE yourid = '$userid'");	
		$MSG_C = mysql_result($MSG_COUNT,"MSG_C");
	
		if($MSG_C == 0)
			{echo"<div align=center><font class=yellow>You do not have any messages to display.</font></center>";die();
			}
?>	

<?php
if(!IsSet($deletem))
	{
?>

	<form type="post" action="vmessages.php">
	  <center><input type="submit" name="deletem" value="DELETE ALL"></center>
	  <input type="hidden" name="deletem" value="1">
     </form>

<?php
}
else
{

	    include("include/connect.php");

		mysql_query("DELETE FROM messages WHERE yourid='$userid'"); 
		echo"<div align=center><font class=yellow>All of your messages have been deleted.</font></div>";include("include/S_VMESS.php");die();

}
?>
<?php
if(!IsSet($delete))
	{
?>

		<? include("include/S_VMESS.php"); ?>

<?
}
else
{
	mysql_query("DELETE FROM messages WHERE yourid='$userid' AND mid='$check'"); 
	echo"<font class=yellow><div align=center>The selected messages have been deleted.</font></div>";include("include/S_VMESS.php");
}
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>