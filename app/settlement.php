<?php include("include/igtop.php");?>


<form method="post" action="settlement.php">
<center>			  
<?
$maxset0 = mysql_db_query($dbnam, "SELECT max(setid) AS maxset FROM settlement");
	$maxset = mysql_result($maxset0,"maxset");

if($snum != "")	 {	$csnum=$snum-1;	}

echo"<a href=settlement.php?change=1&snum=$csnum><-- &nbsp; </a>"; 
echo"<font class=red>|</font> <a href=settlement.php?change=1&snum=$setid>Home</a> <font class=red>|</font>";
$nnum = rand(1,$maxset);
echo" <a href=settlement.php?change=1&snum=$nnum>Random</a> <font class=red>|</font>";

if($snum != "")	 {	$csnum=$snum+1;	}
echo"<a href=settlement.php?change=1&snum=$csnum>&nbsp; --></a>"; 
?>
<br><br>
<b class=reg><font class=red>View Settlement:</font></b> <input type="number" name="snum" size="3" maxlength="2">
<input type="submit" name="change" value="Change" class=button>
<input type="hidden" name="change" value="1">
<br><br>
</center>
</form>
	
<?php
if (!IsSet($change))	{
	include("include/S_SET.php"); 
}
else	{
	
	if($snum < 1 OR $snum > $maxset)	 {
		echo"<center>Settlement $snum does not exist.</center>";
		die();
	}

	if($snum != "")	 {	$N_NUM = $snum;	}
	if($snum == "")	{	$N_NUM = $csnum;	}

	mysql_query("UPDATE user SET csnum='$N_NUM' WHERE email='$email'");	

	include("include/S_SET.php");
}
 
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>