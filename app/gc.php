<?php include("include/igtop.php");?>
<?php
	if(!IsSet($sendmessage))
{
  ?> 					  
 
<?php
}
else
{
	
	if($umessage == "")
		{ echo"<div align=center><font class=yellow>You did not type anything to send.</font></div>";include("include/S_MESS.php"); die();
		}
		else
			{

				include("include/connect.php");

					
				$guild_name = mysql($dbnam, "SELECT gname FROM guild WHERE gid = \"$gid\"");	
				$g_name = mysql_result($guild_name,"g_name");
		
				
				$owner_g = mysql($dbnam, "SELECT owner FROM guild WHERE gid = \"$gid\"");	
				$owner = mysql_result($owner_g,"owner");

				$empire_id = mysql($dbnam, "SELECT userid FROM user WHERE ename = \"$owner\"");	
				$emp_userid = mysql_result($empire_id,"emp_userid");	

				$THE_MNO = mysql($dbnam, "SELECT mno FROM user WHERE userid = \"$emp_userid\"");	
				$T_MNO = mysql_result($THE_MNO,"T_MNO");

				$yourmid = mysql($dbnam, "SELECT max(mid) FROM messages");	
				$ymid = mysql_result($yourmid,"ymid");

				$ymid = $ymid + 1;
	
	 
				$thenum = $T_MNO + 1;
	  
				mysql_query("UPDATE user SET mno =\"$thenum\" WHERE userid=\"$emp_userid\"");

				$umessage = "<font class=red><b>Sent by Guild Center:</b></font>&nbsp;&nbsp;" . "$umessage";
				mysql_query("INSERT INTO messages (origin, datesent, yourid, message, mid) 
					VALUES	('$ename', '$clock', '$emp_userid', '$umessage', '$ymid') ");
	

				echo"<div align=center><font class=yellow><b>Your message has been sent to the Guild Leader of $g_name.</b></font></div></center>";
				 session_unregister('gid'); 
	  
			}
}


?>
<? if ($pageid == 'mgl'){?>
		<? session_register('gid'); ?>

		 <form type=post action=gc.php>
		 <table border="0" bordercolor="silver" width="80%"  align=center>
		   <tr>
		    <td align=center><textarea name="umessage" rows=15 cols=50 wrap></textarea>
	 	  </table>
			      <center><input type="submit" name="sendmessage" value="Send Message" class=button></center>
				  <input type="hidden" name="sendmessage" value="1">

 <? die(); ?>
<? } ?>

<?php
 			session_unregister('gid');

			include("include/connect.php");
			$tablename = "user";
echo "  <br><br>
		<table border=0 width=90% align=center cellpadding=5>
		<tr>
	      <td class=main colspan=4><b class=reg>Current Guilds</b></td>
		<tr>
		  <td class=main2 colspan=4><font class=yellow size=2px><b>Only 5 settlements per guild</b></font></td>
		<tr>
		  <td class=main2 width=\"20%\"><b class=reg>Name</b></td>
		  <td class=main2 width=\"60%\"><b class=reg>Info</b></td>
		  <td class=main2 width=\"4%\"><b class=reg>Settlements</b></td>
		  <td class=main2 width=\"16%\"><b class=reg>Created</b></td>
	
";

		$query_string = "SELECT gname, info, mem, datemade, gid FROM guild ORDER BY mem DESC";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {
				print("<TR ALIGN=center VALIGN=TOP colspan=6>
				   <td bgcolor=#404040><a href=gc.php?pageid=mgl&gid=$row[4]>$row[0]</a></td>
				   <td bgcolor=#404040 align=left>$row[1]</td>
				   <td bgcolor=#404040>$row[2]</td>
				   <td bgcolor=#404040>$row[3]</td>");
				 
		    }



		echo"</table><br><br>";


?>
<?php
	if(!IsSet($create))
{
   ?> 
	
			<? include("include/S_GM.php"); ?>

<?php
}
else
{

		// check to see if guild name is being used
			$query = ("SELECT gname FROM guild WHERE gname=\"$gname\"");
			$result = mysql_query($query);
			$namecheck = mysql_fetch_array($result);
 
		// check to see if he/shes allready a GL
			$cquery = ("SELECT owner FROM guild WHERE owner=\"$ename\"");
			$cresult = mysql_query($cquery);
			$cenamec = mysql_fetch_array($cresult);
 			
			$GNAME_lower = strtolower($gname);
			$SEL_G_lower = strtolower($namecheck[0]);
			

	if($gname == "")
		{echo"<div align=center><font class=yellow>You did not specify a guild name.</font></div>";include("include/S_GM.php");die();
		}
	elseif($cenamec[0] == $ename)
		{echo"<div align=center><font class=yellow>You are allready in charge of a guild.</font></div>";include("include/S_GM.php");die();
		}
	elseif($GNAME_lower == $SEL_G_lower) 
		{echo"<div align=center><font class=yellow>Someone is using that as their guild name allready.</font></div>";include("include/S_GM.php");die();
		}
	elseif($epw != $cepw OR $cpw != $ccpw)
		{echo"<div align=center><font class=yellow>Your passwords do not match.</font></div>";include("include/S_GM.php");die();
		}
	elseif($epw == "" OR $cpw =="" OR $ccpw == "" OR $cepw == "")
		{echo"<div align=center><font class=yellow>You did not specify a password for one or more of the fields.</font></div>";include("include/S_GM.php");die();
		}
		else
			{
					//SELECT MAX GUILD ID
						$M_gid = mysql($dbnam, "SELECT max(gid) FROM guild");	
						$mgid = mysql_result($M_gid,"mgid");	
		

						$gid = $mgid + 1;
		 				include("include/connect.php");
		 				mysql_query("INSERT INTO guild (gname, epw, info, gid,datemade, cpw, owner) 
							VALUES	(\"$gname\", '$epw', \"$info\", '$gid','$clock','$cpw',\"$ename\") ");
						
						$gname = ereg_replace(" ", "", "$gname");

						$tblname = "$gname" . "main" . "$gid";
						$tblname2 = "$gname" . "msgs" . "$gid";

						mysql_query("CREATE TABLE  $tblname (topicid smallint(6) not null unique auto_increment, name varchar(30) null, host varchar(50) null, topic varchar(60) null, lastpost varchar(20) default 0 null, lastposter varchar(255) default 0 null, replies smallint(6) default 0 null, message text null, datestamp varchar(20) default 0 null);");			
						mysql_query("CREATE TABLE  $tblname2 (messageid smallint(6) not null unique auto_increment, name varchar(30) null, host varchar(50) null, topic varchar(60) null, topicid smallint(6) null, message text null, datestamp varchar(20) default 0 null);");
		
						echo"<div align=center><font class=yellow><b>$gname has been successfully created!</b></font></div>";
						include("include/S_GM.php");
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