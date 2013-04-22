<html>
 <head>
  <title>Medieval Battles</title>
   <link rel=stylesheet type="text/css" href="css/mbstyles.css">
    </head>
     <body bgcolor="black" text="white">
     <table border="0" cellpadding=0 cellspacing=0 width="80%" align=center>
      <tr>
	   <td width="100%" background="images/top.gif"  height="100"><img src="images/logo.gif" align=right></td>
        </table>

         <?php
		    include ("include/mainnavbar.php");
             ?>


          <!-- This table keeps going from the navbar and begins body-->
      <td width="80%" valign=top>	
        <br><br><br>

             <!-- bar -->
           <table border=0 width="100%" align=center>
            <tr>
	          <td colspan=3><center><img src="images/barmain.gif"></center></td>
               </table>
                   <!-- bar end -->

                   <hr class=main>
	                <blockquote>

      <!-- WRITTEN BODY STARTS HERE -->
  <br><br>
	<table border=1 bordercolor="#000000" align=center width="25%">
	<tr>
	  <td class=inner2><a href="strongeste.php">Strongest Empires</a></td>
	 <tr>
	  <td class=inner2><a href="mostland.php">Most Land</a></td>
	 <tr>
	  <td class=inner2><a href="mostmts.php">Most Mountains</a></td>
	 <tr>
	  <td class=inner2>Strongest Settlements</td>
	 <tr>
	  <td class=inner2>Strongest Guilds</td>
	 </table>
	


<?php
	$var =  @mysql_connect (localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = user;
	function display_db_table($tablename, $var)
	{	
			$query_string = "SELECT ename, mts, land, exp FROM user ORDER BY exp DESC LIMIT 0,10";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			 
			while ($row = mysql_fetch_row($result_id))
		
		{
				print("<TR ALIGN=center VALIGN=TOP>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
		
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		
		print("</TABLE>\n");
	}
	?>

<br><br>
	
<table border=0 align=center width="75%" >	
   <tr>
    <td>
			<table border=0 cellspacing=1 align=left valign=top width="5%" >
			<tr><td><b class=black>.</b></td>
			<tr><td><b class=black>.</b></td>
			<tr><td class=main2>1</td>
			<tr><td class=main2>2</td>
			<tr><td class=main2>3</td>
			<tr><td class=main2>4</td>
			<tr><td class=main2>5</td>
			<tr><td class=main2>6</td>
			<tr><td class=main2>7</td>
			<tr><td class=main2>8</td>
			<tr><td class=main2>9</td>
			<tr><td class=main2>10</td>
			</table>


	
	<table border=0 bordercolor="#404040" width="95%" align=right cellspacing=1>
	  <tr>
	    <td colspan=4 class=main><b class=reg>Strongest Empires</b></td>
	  <tr>
		<td class=main2 width="50%"><b class=reg>Empire</b></td>
		<td class=main2><b class=reg width="15%">Mountains</b></td>
		<td class=main2><b class=reg width="15%">Land</b></td>
		<td class=main2><b class=reg width="20%">Experience</b></td>
	  <tr>
        <td><?php display_db_table("user", $var);?></td>
	</table>
</td></table>


				         <!-- WRITTEN BODY ENDS HERE -->

	                </blockquote>
	                <hr class=main>

                        <!-- bar -->
                  <table border=0 width="100%" align=center>
                 <tr>
	            <td colspan=3><center><img src="images/bar1.gif"></center></td>
               </table>
                       <!-- bar end -->
     
            </td>
               <!-- this tag above closes the body -->	
          <TR>
         <TD width="20%" height="100" background="images/bleft.gif"></TD>
        </TABLE>
       </HTML>