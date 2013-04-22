<?php

$var =  @mysql_connect(localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";

	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>
<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">
</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>
</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->

		<table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
 		<tr>
		<td><br><br><br>
		
							
		<table border="0" bordercolor="#808080" align=center width="60%">
	
				<tr><td class=main colspan=2><b class=top>Empire Status</b></td>
				<tr><td class=main2><b class=top>Type</b><td class=main2><b class=top>Hourly</b>
				
					<tr>
						<td class=inner>Iron</td>
							<td class=inner2><? echo"$imhourly"; ?></td>
					<tr>
						<td class=inner>Gold</td>
							<td class=inner2><? echo"$gmhourly"; ?></td>
					<tr>
						<td class=inner>Civilian</td>
							<td class=inner2><? echo"$civhourly"; ?></td>
					<tr>
						<td class=inner>Food</td>
							<td class=inner2><? echo"$foodhourly"; ?></td>

		</table>
<br><br>
		<table border="0" bordercolor="#808080" width="60%" align=center>

				<tr><td class=main colspan=7><b class=top>Land Status</b></td>
				<tr align=center>
					<td class=main2>Home</td>
					<td class=main2>Barrack</td>
					<td class=main2>Farm</td>
					<td class=main2>Lab</td>
					

				<tr align=center>	
					<td class=inner2><? echo"$dhome"; ?></td>	
					<td class=inner2><? echo"$dbarrack"; ?></td>
					<td class=inner2><? echo"$dfarm"; ?></td>
					<td class=inner2><? echo"$dlab"; ?></td>
					
		</table>

<br><br>
		<table border="0" bordercolor="#808080"  width="60%" align=center>

			<tr><td class=main colspan=2><b class=top>Mining Status</b></td>
			<tr align=center>
				<td class=main2>Gold Mines</td>
				<td class=main2>Iron Mines</td>
				

			<tr align=center>
				<td class=inner2><? echo"$dgm"; ?></td>
				<td class=inner2><? echo"$dim"; ?></td>
				
		</table>
<br><br>
	
		  	
			</td>
			</tr>
			</table>
		
<table border=0 bordercolor="#808080" align=center width="60%">
	  <tr>
	    <td class=main colspan=5><b class=reg>Hourly Status</b></td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>Hour 1 Amount</b></td>
		<td class=main2><b class=reg>Hour 2 Amount</b></td>
	  <tr> 
		<td class=inner2>Warrior</td>
		<td class=inner2><? echo"$dbwar"; ?></td>
		<td class=inner2><? echo"$dbwar2"; ?></td>
	  <tr>
		<td class=inner2>Wizard</td>
		<td class=inner2><? echo"$dbwiz"; ?></td>
		<td class=inner2><? echo"$dbwiz2"; ?></td>
	  <tr>
		<td class=inner2>Priest</td>
		<td class=inner2><? echo"$dbpri"; ?></td>
		<td class=inner2><? echo"$dbpri2"; ?></td>
	</table>
<br><br>
	<table border=0 bordercolor="#808080" align=center width="60%">
	  <tr>
	    <td class=main colspan=4><b class=reg>Hourly Status</b></td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>Hour 1 Amount</b></td>
		
	  <tr> 
		<td class=inner2>Scientist</td>
		<td class=inner2><? echo"$dbscientist"; ?></td>
	  <tr>
		<td class=inner2>Thief</td>
		<td class=inner2><? echo"$dbthief"; ?></td>
	  <tr>
		<td class=inner2>Explorer</td>
		<td class=inner2><? echo"$dbexplorer"; ?></td>
		
	</table>	
	<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>