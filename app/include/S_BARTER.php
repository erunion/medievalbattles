<form type=get action="barter.php">
		<table border="1" bordercolor="#000000" align=center width="80%">	
<?php
			 include("include/connect.php");
			 $tablename = user;
echo "
		<table border=1 bordercolor=#000000 align=center width=\"90%\" cellpadding=0>
		<tr>
		  <td class=\"main\" colspan=\"7\"><b class=\"reg\">Bartering</b></td>
		<tr>
		  <td class=main2></td>
		  <td class=\"main2\" width=\"20%\"><b class=\"reg\">Seller</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Type</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Amount</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Method</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Cost</b></td>
		  <td class=\"main2\" width=\"20%\"><b class=\"reg\">Barter</b></td>
";

		$query_string = "SELECT seller, type, amount, method, cost, barterid,userid FROM barter ORDER BY type ASC";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

			$query = ("SELECT setid FROM user WHERE userid='$row[6]'");
			$result = mysql_query($query);
			$s_sel = mysql_fetch_array($result);
			$s_sel = $s_sel[0];
			if($s_sel == "")
			{mysql_query("DELETE FROM barter WHERE userid='$row[6]'"); 
			}

			if($row[0] == "$ename")
				{$endnow = "<br><a href=barter.php?end=true&bid=$row[5]>End</a>";}
			else{$endnow = "";}
			if($row[3] == gp)
				{$row[3] = "Gold";}
			else{$row[3] = "Iron";}
			$row[2] = number_format($row[2]);
			$row[4] = number_format($row[4]);
			$row_num = $row_num + 1;
		    print("<TR ALIGN=center VALIGN=TOP colspan=5>
				   <td bgcolor=#404040>$row_num</td>
				   <td bgcolor=#404040><a href=\"messaging.php?value=$row[0]&snum=$s_sel&setchg=1\">$row[0]($s_sel)</a></td>
				   <td bgcolor=#404040>$row[1]</td>
				   <td bgcolor=#404040>$row[2]</td>
				   <td bgcolor=#404040>$row[3]</td>
				   <td bgcolor=#404040>$row[4]</td>
				   <td bgcolor=#404040><a href=barter.php?barter=1&bid=$row[5]>Barter</a>$endnow</td>\n");
		    }

		echo "
				</table>
				<br>
		";

?>
	 
	
	</form>