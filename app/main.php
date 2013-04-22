<?php
	include("include/igtop.php");
?>

<br>

 <!-- BODY OF PAGE BEGINS HERE -->
  <table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
   <tr>
	<td>
	 <table border="0" bordercolor="#808080" align=center width="70%">
	  <tr><td colspan=7 class=main><b class=top>Main Menu</b></td>
	  <tr><td colspan=7 class=main2>The empire of <b class=top><? echo"$ename"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Class:</b ><? echo "$class"; ?></td>
	   <td class=inner2><b class=reg>Civilians:</b> <? echo"$civ"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Experience:</b> <? echo"$exp"; ?></td>
	   <td class=inner2><b class=reg>Iron:</b> <? echo"$iron"; ?></td>
	  <tr>
	   <td class=inner2><b class=reg>Land:</b> <? echo"$land"; ?></td>
	   <td class=inner2><b class=reg>Mountains:</b> <? echo"$mts"; ?></td>	
	  <tr>
	   <td class=inner2><b class=reg>Gold Pieces:</b> <? echo"$gp"; ?></td>
	   <td class=inner2><b class=reg>Food:</b> <? echo"$food"; ?></td>
	<tr>
		<? if($r6pts >= 125000)
		{echo"
			<td class=inner2><b class=reg>Lumber:</b> $lumber</td>
			<td class=inner2><b class=reg>Empire Defense:</b> $tdefense</td>
				";
		}
		else{echo"
			 <td class=inner2 colspan=2><b class=reg>Empire Defense:</b> $tdefense</td>
			";
			 }
		
		?>
	   
     </td>
	</tr>
   </table>
   
	
     <br><br>

<? if($pageid == 'tickinfo'){?>
<font class=orange>Ticks are going every half hour now.  It may remain this way, or it may change to one hour.  Make sure when you enter in numbers for fields you don't put commas, it doesnt seem to work right with them.</font>

<? } ?>
 		
<?

$R_num = rand(1,10000);  

if($R_num == 357)
	{echo"<br><div align=center><font class=yellow>You have found 30 uninhabited land!</font></div>";
		$new_a_land = $aland + 30;
		$newland = $land + 30;
		mysql_query("UPDATE buildings SET aland = \"$new_a_land\" WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET land = \"$newland\" WHERE email='$email' AND pw='$pw'");
	}
if($R_num == 2001)
	{echo"<br><div align=center><font class=yellow>You have found 15 mines!</font></div>";
		$new_a_mts = $amts + 30;
		$newmts = $mts + 30;
		mysql_query("UPDATE buildings SET amts = \"$new_a_mts\" WHERE email='$email' AND pw='$pw'");
		mysql_query("UPDATE user SET mts = \"$newmts\" WHERE email='$email' AND pw='$pw'");
	}



?>




<? if ($pageid == 'news'){?>




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