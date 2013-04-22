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
			  <tr>
<?php
	if(!IsSet($explore))
{
  ?> 

					<table border="0" bordercolor="#808080" align=center width="80%">
						<tr><td colspan=5 class=main><b class=top>Explore</b></td>
						<tr><td colspan=5 class=main2>You have <?php echo"$aexplorers"; ?> explorers you can send.</td>
						<tr><form method=get action="explore.php">
							<td class=main2><b class=reg>Type</b></td>
							<td class=main2><b class=reg>Explorers Exploring</b></td>
							<td class=main2><b class=reg>Hours in Exploration</b></td>
							<td class=main2><b class=reg>Explorers to send</b></td>
							<td class=main2><b class=reg>Explorers to cancel</b></td>
							
							
							
							
							
							<tr>
								<td class=inner2>Land</td>
								<td class=inner2><?php echo"$expland"; ?></td>
								<td class=inner2><?php echo"$landhrs"; ?></td>
								<td class=inner2><input type="number" name="exploreland" size=10></td>
								<td class=inner2><input type="number" name="cexploreland" size=10></td>
								
							
							<tr>
								<td class=inner2>Mountain</td>
								<td class=inner2><?php echo"$expmt"; ?></td>
								<td class=inner2><?php echo"$mthrs"; ?></td>
								<td class=inner2><input type="number" name="exploremt" size=10></td>
								<td class=inner2><input type="number" name="cexploremt" size=10></td>

								</table>
				<br><br>				
			<center><center><input class=button type="submit" name="explore" value="Send"></center>
				<input type="hidden" name="explore" value="1">
				
							
							
			<?php
}
else
{
	if (!IsSet($cancel) && $cancel =="2")
	{print""; die();
	}
	elseif($aexplorers < $exploreland + $exploremt)
		{print "You do not have enough explorers to send."; die();
		}
		else
			{ 
				
     $explorers = $explorers - ($exploreland + $exploremt);
	 $expland = $expland + $exploreland;
	 $expmt = $expmt + $exploremt;

	 @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	  mysql_query("UPDATE military SET explorers =\"$explorers\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE explore SET expland =\"$expland\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE explore SET expmt =\"$expmt\" WHERE email='$email' AND pw='$pw'");
      
	 
			            }
}


?>	

<?php
	if(!IsSet($cancel))
{
  ?> 
						
						<br>
						<center><input type="submit" name="cancel" value="Cancel">
								<input type="hidden" name="cancel" value=2></center>
								
<?php
}
else
{
	if (!IsSet($explore) && $explore =="1")
	{print""; die();
	}
	elseif($expland + $expmt < $cexploreland + $cexploremt)
		{print "You cannot cancel that many explorers."; die();
		}
		else
			{ 
				
     $explorers = $explorers + ($cexploreland + $cexploremt);
	 $expland = $expland - $cexploreland;
	 $expmt = $expmt - $cexploremt;

	 @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	  mysql_query("UPDATE military SET explorers =\"$explorers\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE explore SET expland =\"$expland\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE explore SET expmt =\"$expmt\" WHERE email='$email' AND pw='$pw'");
      
	 
			            }
}


?>	
		  	
			</td>
			</tr>
			</table>
		
<br><br>

	<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>