<?php
		include("include/igtop.php");
	?>

<!-- BODY OF PAGE BEGINS HERE -->
<br><br>


<?	// check votefor
			$SN_query = ("SELECT setid FROM setnews WHERE setid='$setid'");
			$SN_result = mysql_query($SN_query);
			$SN_check = mysql_fetch_array($SN_result); 
			if($SN_check[0] == "" OR $SN_check[0] == 0)
				{echo"<div align=center>Your settlement does not have any news to display.</div>";die();}


?>	   
<div align=center>		
	<font class=red>Empire Joining/Deleting</font><br>
	<font class=green>Donating/Receiving from Funds</font><br>
	<font class=blue>Leaving/Joining a Guild</font><br>
	<font class=yellow>Attacking (successful/unsuccessful)</font><br>
	<font class=orange>Successfully defended empire</font><br>
	<font class=lg>Unsuccessfully defended empire</font><br>
</div>


<?php
	include("include/connect.php");
	$tablename = user;
	function display_db_table($tablename, $var)
	{	

			
		
			Global $setid;

			$query_string = "SELECT date, news FROM setnews  WHERE setid='$setid' ORDER BY date DESC";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			 
			while ($row = mysql_fetch_row($result_id))
		
		{
				print("<TR ALIGN=center VALIGN=TOP>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
		
					print("<TD bgcolor=#404040 align=left>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		
		print("</TABLE>\n");
	}

	?>
	

		
		<table border=0 bordercolor="#404040" width="95%" align=center cellspacing=1>
	  <tr>
	    <td colspan=4 class=main><b class=reg>News for settlement <? echo"$setid"; ?></b></td>
	  <tr align=left>
		<td class=main2 width="20%" align=left><b class=reg>Date/Time</b></td>
		<td class=main2 align=left><b class=reg width="80%">News</b></td>
		
	  <?php display_db_table("user", $var);?>
	


   <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>