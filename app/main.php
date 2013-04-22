<?php include("include/igtop.php");?>


<?
echo"
  <table border=0 cellpadding=2 cellspacing=0 width=100% valign=top>
   <tr>
	<td>
	 <table border=0 bordercolor=\"#808080\" align=center width=70%>
	  <tr><td colspan=7 class=main><b class=top>Main Menu</b></td>
	  <tr><td colspan=7 class=main2>The empire of <b class=top> $ename ($setid)</td>
	  <tr>
	   <td class=inner2><b><font class=red>Class:</font></b> $class</td>
	   <td class=inner2><b><font class=red>Civilians:</font></b> $civ</td>
	  <tr>
	   <td class=inner2><b><font class=red>Experience:</font></b> $exp</td>
	   <td class=inner2><b><font class=red>Iron:</font></b> $iron</td>
	  <tr>
	   <td class=inner2><b><font class=red>Land:</font></b> $land</td>
	   <td class=inner2><b><font class=red>Mountains:</font></b> $mts</td>	
	  <tr>
	   <td class=inner2><b><font class=red>Gold Pieces:</font></b> $gp</td>
	   <td class=inner2><b><font class=red>Food:</font></b> $food</td>
	<tr>";
		 if($r6pts >= 125000)
		{echo"
			<td class=inner2><b><font class=red>Lumber:</font></b> $lumber</td>
			<td class=inner2><b><font class=red>Empire Defense:</font></b> $tdefense</td>
				";
		}
		else{echo" <td class=inner2 colspan=2><b><font class=red>Empire Defense:</font></b> $tdefense</td>";}
		
?>
	   
     </td>
	</tr>
   </table>
  <br><br>
<? if ($pageid == 'news'){?>

<? 	
	$empnews_sel = mysql($dbnam, "SELECT count(yourid) FROM empnews WHERE yourid='$userid'");	
	$emp_sel = mysql_result($empnews_sel,"emp_sel");
	
	if($emp_sel == 0 OR $emp_sel == "")
	{echo"<div align=center><font class=yellow>You do not have any news to display.</font></div>";die();
	}

?>

<?php
		mysql_query("UPDATE user SET nno =\"0\" WHERE email='$email' AND pw='$pw'");

	include("include/connect.php");
	$tablename = user;
	function display_db_table($tablename, $var)
	{	


			global $userid;
			$query_string = "SELECT date, news FROM empnews WHERE yourid = '$userid' ORDER BY date DESC";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			 
			while ($row = mysql_fetch_row($result_id))
		
		{
				print("<TR ALIGN=left VALIGN=TOP>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
		
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		
		print("</TABLE>\n");
	}
?>

<table border=0 bordercolor="#404040" width="80%" align=center cellspacing=1>
	  <tr>
	    <td colspan=3 class=main><b class=reg>Your News</b></td>
	  <tr>
		<td class=main2><b class=reg>Date</b></td>
		<td class=main2><b class=reg>News</b></td>
	  <tr>
        <td><?php display_db_table("user", $var);?></td>
</table>
</td></table>
<? } ?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>