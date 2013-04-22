<?php

$var =  @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";
// save time() in a session var, and on the session start, if that var is older than however long, delete the //session
	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>
<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">

</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>
</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->
<br><br>



<table border="0" bordercolor="silver" width="400"  align=center>
	<tr>
		<td align=center>Settlement:<input type="text" name="set" size=5>
			<input type="submit" name="changes" value="Change Settlement" class=button><br><br>
</td>
</table>
<center>

<form type=post action="messaging.php">
<?php
	if(!IsSet($sendmessage))
{
  ?> 

<?php

	$var =  @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Select Empire-</option>
		";

/* Empire Dropwdown*/
$query_string = "SELECT userid, ename FROM user WHERE setid = '$setid'";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
    print("<option value=$row[0]>$row[1]\n</option>");
    }


echo "</select><br><br>";

?>

</center>





	<table border="0" bordercolor="silver" width="80%"  align=center>
		<tr>
		  <td align=center><textarea name="umessage" rows=15 cols=50 wrap></textarea>
	 	   </table>
			  <center><input type="submit" name="sendmessage" value="Send Message" class=button></center>
				 <input type="hidden" name="sendmessage" value="1">


<?php
}
else
{
	
	if($empvalue === ns) 
	{echo"You did not select an empire to message.";die();
	}
	elseif($umessage === "")
		{ echo"You did not type anything to send!";
		}
		else
			{
		$empattacked = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$empireattacked = mysql_result($empattacked,"empireattacked");

		$yourmid = mysql($dbnam, "SELECT max(mid) FROM messages");	
		$ymid = mysql_result($yourmid,"ymid");

		$ymid = $ymid + 1;
	
	 	@mysql_connect (localhost, ziccarelli, pa724);
	 	 mysql_select_db (medievalbattles_com);
		
	 
	  


	mysql_query("INSERT INTO messages (origin, datesent, yourid, message, mid) 
			VALUES	('$ename', '$clock', '$empvalue', '$umessage', '$ymid') ");
	echo"Your message has been sent to $empireattacked.";
	  
			}
}


?>
</form>
<!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>






