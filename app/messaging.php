<?php
		include("include/igtop.php");
?>
 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>

<center>
<form type=post action="messaging.php">
<b class=reg>Settlement:</b><input type="number" name="snum" size=3 maxlength=3>
<input type="hidden" name="setchg" value="1">
<input type="submit" value="Change">
</form>
<br><br>

<?php
	if(!IsSet($sendmessage))
{
  ?> 

			<? include("include/S_MESS.php"); ?>

<?php
}
else
{
	
	if($empvalue == ns) 
		{echo"<div align=center><font class=yellow>You did not select an empire to message.</font></div>"; include("include/S_MESS.php"); die();
		}
	elseif($umessage === "")
		{ echo"<div align=center><font class=yellow>You did not type anything to send.</font></div>";include("include/S_MESS.php"); die();
		}
		else
			{

				include("include/connect.php");

				$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = \"$empvalue\"");	
				$empireattacked = mysql_result($empattacked,"empireattacked");
		
	

				$THE_MNO = mysql($dbnam, "SELECT mno FROM user WHERE userid = \"$empvalue\"");	
				$T_MNO = mysql_result($THE_MNO,"T_MNO");

				$yourmid = mysql($dbnam, "SELECT max(mid) FROM messages");	
				$ymid = mysql_result($yourmid,"ymid");

				$ymid = $ymid + 1;
	
	 
				$thenum = $T_MNO + 1;
	  
				mysql_query("UPDATE user SET mno =\"$thenum\" WHERE userid='$empvalue'");

				mysql_query("INSERT INTO messages (origin, datesent, yourid, message, mid) 
					VALUES	('$ename', '$clock', '$empvalue', '$umessage', '$ymid') ");
	

				echo"<div align=center><font class=yellow>Your message has been sent to $empireattacked.</font></div></center>";
				include("include/S_MESS.php"); 
				die();
	  
			}
}


?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>