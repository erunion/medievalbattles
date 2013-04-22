<?php
		include("include/igtop.php");
	?>


 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>
			<form method="post" action="settlement.php">
			<center>			  <?
			     //$nnum = $csnum -1; echo"<a href=settlement.php?change=1&snum=$nnum><-- &nbsp; </a>"; 
			     $nnum = $setid; echo"| <a href=settlement.php?change=1&snum=$nnum>Home</a> |";
				 $nnum = rand(1,40);  echo" <a href=settlement.php?change=1&snum=$nnum>Random</a> |";
				 //$nnum = $csnum +1; echo"<a href=settlement.php?change=1&snum=$nnum>&nbsp; --></a>"; 
			     
			  ?><br><br>
			<b class=reg>View Settlement:</b> <input type="number" name="snum" size="3" maxlength="2">
			<input type="submit" name="change" value="Change" class=button>
			<input type="hidden" name="change" value="1">
			<br><br>

			</center>
			</form>
	
<?php
if (!IsSet($change))
{
?>	

<?php 
	$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$csnum'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
	$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$csnum'");	
	$settlename = mysql_result($ssettlementname,"settlename");
	$thenap = mysql($dbnam, "SELECT nap FROM settlement WHERE setid = '$csnum'");	
	$nap = mysql_result($thenap,"nap");

	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$csnum'");	
	$setguild = mysql_result($thesetguild,"setguild");
		

	echo "
		<div align=center>	
		<table border=0 width=\"300\" align=center>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>Name:</b> $settlename</td>
		  <tr>
			<td colspan=2><img src=$settlepic width=300 height=200></td>
      	  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>NAP:</b> $nap</td>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>Guild:</b> $setguild</td>
		</table>
		</div>
		 ";
?>

<?php
 

			include("include/connect.php");
			$tablename = "user";
echo "  <br><br>
		<table border=1 bordercolor=#000000 align=center width=\"80%\" cellpadding = 0 cellspacing = 0>
		<tr>
		  <td class=\"main\" colspan=\"5\"><b class=\"reg\">Settlement: $csnum</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Class</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Mountains</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Land</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
";

		$query_string = "SELECT userid, ename, class, mts, land, exp FROM user WHERE setid = '$csnum'";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

				$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE ename='$row[1]'");	
				$OLINE = mysql_result($ONLINE_NO,"OLINE");
	
			if($OLINE == 1)
				{$O_line = "<font class=red>*</font>";}
			else{$O_line = "";}
				
			//CHECK TO SEE IF SL IS THERE
						$SL_query = ("SELECT sl FROM user WHERE ename='$row[1]'");
						$SL_result = mysql_query($SL_query);
						$SLcheck = mysql_fetch_array($SL_result);
							if($SLcheck[0] == yes)
								{$color = "#632910";
										$SL_SELECT = mysql($dbnam, "SELECT ename FROM user WHERE sl='yes' AND setid='$setid'");	
	    								$SL_S = mysql_result($SL_SELECT,"SL_S");
								}
							if($SLcheck[0] != yes)
								{$color = "#404040";} 
							if($row[1] == "$ename")
								{$color = "#635208";}

					
		    print("<TR ALIGN=center VALIGN=TOP colspan=6>
				   <td bgcolor=$color><a href=\"messaging.php?value=$row[0]&snum=$csnum&setchg=1\">$row[1]</a>$O_line</td>
				   <td bgcolor=$color>$row[2]</td>
				   <td bgcolor=$color>$row[3]</td>
				   <td bgcolor=$color>$row[4]</td>
				   <td bgcolor=$color>$row[5]</td>\n");
		    }
$COUNT_MEMBERS = mysql($dbnam, "SELECT count(userid) FROM user WHERE setid = '$csnum'");	
	$C_MEM = mysql_result($COUNT_MEMBERS,"C_MEM");

	$totT = $C_MEM;

	While($C_MEM < 5 AND $totT < 5)
		{	echo"
 		 <tr>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
				";
			$totT = $totT + 1;
		}
	


		echo "
				</table>
				<br>
		";

	include("include/connect.php");
	$SET_STRENGTH = mysql($dbnam, "SELECT sum(exp) FROM user WHERE setid = '$csnum'");	
	$S_STRENGTH = mysql_result($SET_STRENGTH,"S_STRENGTH");
	echo "<br><div align=center><b class=rtop>Settlement Strength:</b> $S_STRENGTH</div></td></table>";

	}
	else
	{

		if($snum < 1 OR $snum > 40) 
			{echo"<center>Settlement $snum does not exist $ename.</center>";die();
			}
		else
		{
			mysql_query("UPDATE user SET csnum = \"$snum\" WHERE email = \"$email\"");
			if($snum == 0 OR $snum == "")
				{mysql_query("UPDATE user SET csnum = \"$nnum\" WHERE email = \"$email\"");
				}
	$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$snum'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
	$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$snum'");	
	$settlename = mysql_result($ssettlementname,"settlename");
	$thenap = mysql($dbnam, "SELECT nap FROM settlement WHERE setid = '$snum'");	
	$nap = mysql_result($thenap,"nap");

	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$snum'");	
	$setguild = mysql_result($thesetguild,"setguild");
		

	echo "
		<div align=center>	
		<table border=0 width=\"300\" align=center>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>Name:</b> $settlename</td>
		  <tr><td colspan=2><img src=$settlepic width=300 height=200></td>
      	  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>NAP:</b> $nap</td>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b class=rtop>Guild:</b> $setguild</td>
		</table>
		</div>
		 ";



			include("include/connect.php");
			$tablename = "user";
echo "<br><br>
		<table border=1 bordercolor=#000000 align=center width=\"80%\" cellpadding = 0 cellspacing = 0>
		<tr>
		  <td class=\"main\" colspan=\"5\"><b class=\"reg\">Settlement: $snum</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Class</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Mountains</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Land</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
";

		$query_string = "SELECT userid, ename, class, mts, land, exp FROM user WHERE setid = '$snum'";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {


			$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE ename='$row[1]'");	
			$OLINE = mysql_result($ONLINE_NO,"OLINE");
	
			if($OLINE == 1)
				{$O_line = "<font class=red>*</font>";}
			else{$O_line = "";}

				//CHECK TO SEE IF SL IS THERE
						$SL_query = ("SELECT sl FROM user WHERE ename='$row[1]'");
						$SL_result = mysql_query($SL_query);
						$SLcheck = mysql_fetch_array($SL_result);
							if($SLcheck[0] == yes)
								{$color = "#632910";}
							if($SLcheck[0] != yes)
								{$color = "#404040";} 
							if($row[1] == "$ename")
								{$color = "#635208";}

		    print("<TR ALIGN=center VALIGN=TOP colspan=6>
				   <td bgcolor=$color><a href=\"messaging.php?snum=$snum&setchg=1\">$row[1]</a>$O_line</td>
				   <td bgcolor=$color>$row[2]</td>
				   <td bgcolor=$color>$row[3]</td>
				   <td bgcolor=$color>$row[4]</td>
				   <td bgcolor=$color>$row[5]</td>\n");

				


		    }
	
	$COUNT_MEMBERS = mysql($dbnam, "SELECT count(userid) FROM user WHERE setid = '$snum'");	
	$C_MEM = mysql_result($COUNT_MEMBERS,"C_MEM");
	
	$totT = $C_MEM;

	While($C_MEM < 5 AND $totT < 5)
		{	echo"
 		 <tr>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">NONE</b></td>
				";
			$totT = $totT + 1;
		}


		echo "
				</table>
				<br>
		";

  

	include("include/connect.php");
	$SET_STRENGTH = mysql($dbnam, "SELECT sum(exp) FROM user WHERE setid = '$snum'");	
	$S_STRENGTH = mysql_result($SET_STRENGTH,"S_STRENGTH");
	echo"<br><div align=center><b class=rtop>Settlement Strength:</b> $S_STRENGTH</div></td></table>";
			
		}
 }



?>
 
 
 
 <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>