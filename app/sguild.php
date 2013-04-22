<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
 <br><br>
	<table border=1 bordercolor="#000000" align=center width="25%">
	<tr>
	  <td class=inner2><a href="esscores.php">Strongest Empires</a></td>
	 <tr>
	  <td class=inner2><a href="emland.php">Most Land</a></td>
	 <tr>
	  <td class=inner2><a href="emmountains.php">Most Mountains</a></td>
	 <tr>
	  <td class=inner2><a href="setstrength.php">Strongest Settlements</a></td>
	 <tr>
	  <td class=inner2><a href="sguild.php">Strongest Guilds</a></td>
	 </table>
	
<?php

	include("include/connect.php");
	$tablename = "user";

echo "
			<br><br>
	
		

	
	<table border=0 bordercolor=#404040 width=80% align=center cellspacing=1>
	  <tr>
	    <td colspan=5 class=main><b class=reg>Strongest Guilds</b></td>
	  <tr>
		<td class=main2></td>
		<td class=main2 width=50%><b class=reg>Guild</b></td>
		<td class=main2><b class=reg width=15%>Settlements</b></td>
		<td class=main2><b class=reg width=15%>Strength</b></td>
		
";


						$query_string = "SELECT gname, mem, strength FROM guild ORDER BY strength DESC LIMIT 0,10";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

		

				

					 $placeno = $placeno + 1;
						$row[2] = number_format($row[2]);
		    	print("<TR ALIGN=center VALIGN=TOP colspan=7>
				<td bgcolor=#404040>$placeno</td>
				<td bgcolor=#404040 align=left>$row[0]</td>
				<td bgcolor=#404040>$row[1]</td>
				<td bgcolor=#404040>$row[2]</td>
			
												");
				
		    }

		echo "</table>"; 

?>

</body>
</html>


