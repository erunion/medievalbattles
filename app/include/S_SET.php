<?

		if($snum != "")
			{$N_NUM = $snum;}
		if($snum == "")
			{$N_NUM = $csnum;}
	
	$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$N_NUM'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
	$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$N_NUM'");	
	$settlename = mysql_result($ssettlementname,"settlename");
	$thenap = mysql($dbnam, "SELECT nap FROM settlement WHERE setid = '$N_NUM'");	
	$nap = mysql_result($thenap,"nap");
	$thesetguild = mysql($dbnam, "SELECT setguild FROM settlement WHERE setid = '$N_NUM'");	
	$setguild = mysql_result($thesetguild,"setguild");
		

	echo "
		<div align=center>	
		<table border=0 width=\"300\" align=center>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b><font class=red>Name:</font></b> $settlename <font class=red>[</font>$N_NUM<font class=red>]</font></td>
		  <tr>
			<td colspan=2><img src=$settlepic width=300 height=200></td>
      	  <tr>
			<td width=\"20%\" align=center colspan=2><b><font class=red>NAP:</font></b> $nap</td>
		  <tr>
			<td width=\"20%\" align=center colspan=2><b><font class=red>Guild:</font></b> $setguild</td>
		</table>
		</div>
		 ";

echo"<center><br><br><font class=red>Empire is a settlement leader</font><br><font class=orange>Empire is in safe mode</font><br><font class=blue>Your empire</font></center><br><br>";

			include("include/connect.php");
			$tablename = "user";
echo "
		<table border=1 bordercolor=#000000 align=center width=\"80%\" cellpadding = 0 cellspacing = 0>
		<tr>
		  <td class=\"main\" colspan=\"7\"><b class=\"reg\">Settlement: $N_NUM</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Race</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Class</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Mountains</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Land</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
";

		$query_string = "SELECT userid, ename, race, class, mts, land, exp FROM user WHERE setid = '$N_NUM' ORDER BY userid ASC";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {


				$ONLINE_NO = mysql($dbnam, "SELECT online FROM user WHERE userid='$row[0]'");	
				$OLINE = mysql_result($ONLINE_NO,"OLINE");
	
				if($OLINE == 1)
					{$O_line = "<font class=red>*</font>";
					}
				else{$O_line = "";
					}

					//CHECK TO SEE IF SL IS THERE
						$SL_query = ("SELECT sl FROM user WHERE userid='$row[0]'");
						$SL_result = mysql_query($SL_query);
						$SLcheck = mysql_fetch_array($SL_result);
							
							if($SLcheck[0] == yes)
								{
								 
								 $SL_SELECT = mysql($dbnam, "SELECT ename FROM user WHERE sl='yes' AND setid='$N_NUM'");	
	    						 $SL_S = mysql_result($SL_SELECT,"SL_S");
								}
						
						$SAFEMODECHECK = mysql($dbnam, "SELECT safemode FROM user WHERE  userid='$row[0]'");	
	    				$S_M_CHECK = mysql_result($SAFEMODECHECK,"S_M_CHECK");
						   
							$color = "#404040";
							$yclass = "grey";

							if($S_M_CHECK > 0)
								{$yclass= "orange";}
							if($row[1] == "$SL_S")
								{$yclass= "red";}
							if($row[1] == "$ename")
								{$yclass = "blue";}
						
						

			$row[4] = number_format($row[4]);
			$row[5] = number_format($row[5]);
			$row[6] = number_format($row[6]);

				 print("<TR ALIGN=center VALIGN=TOP colspan=7>
				   <td bgcolor=$color><a href=\"messaging.php?value=$row[0]&snum=$N_NUM&setchg=1\"><font class=$yclass>$row[1]</a>$O_line</td>
				   <td bgcolor=$color><font class=$yclass>$row[2]</td>
				   <td bgcolor=$color><font class=$yclass>$row[3]</td>
				   <td bgcolor=$color><font class=$yclass>$row[4]</td>
				   <td bgcolor=$color><font class=$yclass>$row[5]</td>
				   <td bgcolor=$color><font class=$yclass>$row[6]</td>\n");
				 }
	
	$COUNT_MEMBERS = mysql($dbnam, "SELECT count(userid) FROM user WHERE setid = '$N_NUM'");	
	$C_MEM = mysql_result($COUNT_MEMBERS,"C_MEM");
	
	$totT = $C_MEM;

	While($C_MEM < 10 AND $totT < 10)
		{	echo"
 		 <tr>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
		  <td class=\"inner2\" width=><b class=\"reg\">--</b></td>
				";
			$totT = $totT + 1;
		}
	
		echo "</table><br>";

		include("include/connect.php");

			$SET_STRENGTH = mysql($dbnam, "SELECT sum(exp) FROM user WHERE setid = '$N_NUM'");	
			$S_STRENGTH = mysql_result($SET_STRENGTH,"S_STRENGTH");
			$S_STRENGTH = number_format($S_STRENGTH);

		echo"<br><div align=center><b><font class=red>Settlement Strength:</font></b> $S_STRENGTH</div></td></table>";
			
?>