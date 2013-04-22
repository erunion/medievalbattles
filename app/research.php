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
		
					<table border="0" bordercolor="#808080" align=center width="80%">
						<tr><td colspan=7 class=main><b class=top>Research</b></td>
						<tr><td colspan=7 class=main2>You currently have <?php  echo"$ascientists"; ?> scientists to send out to research.
						<br>The more labs that you construct the more topics that will become available.</td>
						<tr><form method=get action="research.php">
							<td class=main2><b class=reg>#</b></td>
							<td class=main2><b class=reg>Topic</b></td>
							<td class=main2><b class=reg>Type</b></td>
							<td class=main2><b class=reg>Scientists Researching</b></td>
							<td class=main2><b class=reg>Progress</b></td>
							<td class=main2><b class=reg>Scientists to send</b></td>
							
							
	<?php
	if(!IsSet($first))
{
 ?> 
					
							<tr>
								<td>1</td>
								<td class=inner2>Enhanced Weapons</td>
								<td class=inner2>Weaponry</td>
								<td class=inner2><?php echo"$r1"; ?></td>
								<td class=inner2><?php echo"$r1points"; ?>/40,000</td>
								<td class=inner2>

								  <input type="number" name="ur1" size=5 maxlength=10></td>
								
				 
							<tr>
								<td>2</td>
								<td class=inner2>Enhanced Spell Casting</td>
								<td class=inner2>Magic</td>
								<td class=inner2><?php echo"$r2"; ?></td>
								<td class=inner2><?php echo"$r2points"; ?>/40,000</td>
								<td class=inner2>
								  <input type="number" name="ur2" size=5 maxlength=10></td>
								
							
							

							

							<tr>
								<td>3</td>
								<td class=inner2>Advanced Gold Mining</td>
								<td class=inner2>Empire</td>
								<td class=inner2><?php echo"$r3"; ?></td>
								<td class=inner2><?php echo"$r3points"; ?>/40,000</td>
								<td class=inner2>
								  <input type="number" name="ur3" size=5 maxlength=10></td>
								
							<tr>
								<td>4</td>
								<td class=inner2>Advanced Iron Mining</td>
								<td class=inner2>Empire</td>
								<td class=inner2><?php echo"$r4"; ?></td>
								<td class=inner2><?php echo"$r4points"; ?>/40,000</td>
								<td class=inner2>
								  <input type="number" name="ur4" size=5 maxlength=10></td>
								
							
							<tr>
								<td>5</td>
								<td class=inner2>Advanced Stone Mining</td>
								<td class=inner2>Empire</td>
								<td class=inner2><?php echo"$r5"; ?></td>
								<td class=inner2><?php echo"$r5points"; ?>/40,000</td>
								<td class=inner2>
								  <input type="number" name="ur5" size=5 maxlength=10></td>
								
										
						</table>
						<br><br>
						<center><input class=button type="submit" name="first" value="Research">
								<input type="hidden" name="first" value=1></center>
								</form>
<?php
}
else
{
	if (!IsSet($second) && $second =="2")
	{ print""; die();
	}
	
	elseif($ascientists < $ur1 + $ur2 + $ur3 + $ur4 + $ur5)
		{print "You do not have enough scientists."; die();
		}
		else
			{
	 
	 
	 
	 $scientists = $scientists - ($ur1 + $ur2 + $ur3 + $ur4 + $ur5);
	 $r1 = $r1 + $ur1;
	 $r2 = $r2 + $ur2;
     $r3 = $r3 + $ur3;
	 $r4 = $r4 + $ur4;
     $r5 = $r5 + $ur5;

	  @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	   
	  mysql_query("UPDATE military SET scientists =\"$scientists\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE research SET r1 =\"$r1\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE research SET r2 =\"$r2\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r3 =\"$r3\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r4 =\"$r4\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r5 =\"$r5\" WHERE email='$email' AND pw='$pw'");
	 
			            }
     }


?>
<br>
	<?php 
	if(!IsSet($second))
{
 ?> 
						<form method="post" action="research.php">
					<center><input type="submit" name="second" value="Cancel Scientists">
								<input type="hidden" name="second" value=2></center>
						
								</form>
		  	<?php
}
else
{
	
	    if (!IsSet($first) && $first =="1")
		{print ""; die();
		}
		else
			{ 
	 
	 
	 
	 $scientists = $scientists + ($r1 + $r2 + $r3 + $r4 + $r5);
	 $r1 = $r1 - $r1;
	 $r2 = $r2 - $r2;
     $r3 = $r3 - $r3;
	 $r4 = $r4 - $r4;
     $r5 = $r5 - $r5;

	  @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	   
	  mysql_query("UPDATE military SET scientists =\"$scientists\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE research SET r1 =\"$r1\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE research SET r2 =\"$r2\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r3 =\"$r3\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r4 =\"$r4\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE research SET r5 =\"$r5\" WHERE email='$email' AND pw='$pw'");
	 
			            }
     }


?> 

			</td>
			</tr>
			</table>
		

	<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>