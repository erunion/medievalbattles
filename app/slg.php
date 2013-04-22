<?php include("include/igtop.php");?>

<? if($sl === no){echo"<div align=center><font class=yellow>You are not a SL!</font>";die();}?>

<?php
	if(!IsSet($leave))
{
?> 		
	
	<form type=post action="slg.php">
	 <center>
	  <input type="submit" name="leave" value="Click here to confirm leaving" class=button>
	  <input type="hidden" name="leave" value="4">
	 </center>
	</td>
		
<?php
}
else
{
					
	if($setguild == None)
  	  {echo"<div align=center><font class=yellow>You are not in a guild.</font></div>";die();}
	   else
		  {	
				//SELECT GUILD CURRENTLY IN
				$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$setid'");	
				$setguild = mysql_result($thesetguild,"setguild");
	
				mysql_query("INSERT INTO setnews (date, news, setid) 
					VALUES	('$clock', '<font class=blue>Your settlement has left <b>$setguild</b>!</font>', '$setid') ");
				mysql_query("INSERT INTO guildnews (date, news, setid) 
					VALUES	('$clock', '<font class=red>Settlement $setid has left <b>$setguild</b>!</font>', '$setid') ");
			
				echo"<div align=center><font class=yellow>You have left $setguild!</font></div>";
						

				//SELECT MEMBERS IN NEW GUILD
				$numberofmem = mysql($dbnam, "SELECT mem FROM guild WHERE gname='$setguild'");	
				$nomem = mysql_result($numberofmem,"nomem");
				$GUILDsetnot = mysql($dbnam, "SELECT gsetno FROM settlement WHERE setid='$setid'");	
				$gsetnot = mysql_result($GUILDsetnot,"gsetnot");
					
				//SET GSETNO IN SETTLEMENT = 0 AND IN GUILD PAGE SET IT TO 0
				mysql_query("UPDATE guild SET $gsetnot =\"0\" WHERE gname='$setguild'");
				mysql_query("UPDATE settlement SET gsetno =\"0\" WHERE setid='$setid'");

					$newmem = $nomem - 1;
				mysql_query("UPDATE guild SET mem =\"$newmem\" WHERE gname='$setguild'");
				mysql_query("UPDATE settlement SET setguild =\"None\" WHERE setid='$setid'");
				die();
			}		
}
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>