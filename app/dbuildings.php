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
      <td class=top><b>Gold Pieces:</b><?php echo"$gp"; ?></td>
      <td class=top><b>Civilians:</b><?php echo"$civ"; ?></td>
      <td class=top><b>Land:</b><?php echo"$land"; ?></td>
      <td class=top><b>Mountains:</b><?php echo"$mts"; ?></td>
      <td class=top><b>Experience:</b><?php echo"$exp"; ?></td>
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
  

	
<?php
	if(!IsSet($update))
{
  ?> 
  

	<form type=get action="dbuildings.php">
   <table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
    <tr>
	 <td><br><br><br>


	  <table border="1" bordercolor="#000000" align=center width="80%">
	   <tr>
	    <td colspan=7 class=main><b class=top>Land</b></td>
		<tr>
	    <td colspan=7 class=main2>It costs 75 gp to demolish a building</td>
	   <tr><form method=get action="buildings.php">
	   <td class=main2><b class=reg>#</b></td>
		<td class=main2><b class=reg>Building Type</b></td>
		<td class=main2><b class=reg>Owned</b></td>
		
		<td class=main2><b class=reg>Demolish</b></td>
	   <tr>
		<td class=num>1</td>
		<td class=inner2>Home</td>
		<td class=inner2> <?php echo"$home"; ?></td>
		
		<td class=inner2><input type="number" name="uhome" size=5></td>
	   <tr>
		<td class=num>2</td>
		<td class=inner2>Barrack</td>
		<td class=inner2><?php echo"$barrack"; ?></td>
		
		<td class=inner2><input type="number" name="ubarrack" size=5></td>
	   <tr>
		<td class=num>3</td>
		<td class=inner2>Farm</td>
		<td class=inner2><?php echo"$farm"; ?></td>
		
		<td class=inner2><input type="number" name="ufarm" size=5></td>
	   <tr>
		<td class=num>4</td>
		<td class=inner2>Lab</td>
		<td class=inner2><?php echo"$lab"; ?></td>
		
		<td class=inner2><input type="number" name="ulab" size=5></td>
	  </table>


<br><br>


		<form type=get action="buildings.php">
       <table border="1" bordercolor="#000000" align=center width="80%">
	   <tr>
	    <td colspan=7 class=main><b class=top>Mountains</b></td>
	   <tr>
	    <td colspan=7 class=main2>It costs 75 gp to demolish a mine</td>
	   <tr><form method=get action="script.url">
		<td class=main2><b class=reg>#</b></td>
		<td class=main2><b class=reg>Mine Type</b></td>
		<td class=main2><b class=reg>Owned</b></td>
		<td class=main2><b class=reg>Demolish</b></td>
	   <tr>
		<td class=num>1</td>
		<td class=inner2>Gold Mines</td>
		<td class=inner2><?php echo"$gm"; ?></td>
	    <td class=inner2><input type="number" name="ugm" size=5>
	   <tr>
		<td class=num>2</td>
		<td class=inner2>Iron Mines</td>
		<td class=inner2><?php echo"$im"; ?></td>
		<td class=inner2><input type="number" name="uim" size=5></td>
	   </tr>
	  </table>
<br><br>	   
<center>
<input  type="submit" name="develop" value="Demolish Buildings">
<input type="hidden" name="update" value="1"> 
</center> 


<?php
}
else
{
	if($ugm > $gm) 
	{print "You cannot demolish that many mines.";die();
	}
	elseif($uim > $im)
		{print "You cannot demolish that many mines.";die();
		}
	elseif ($uhome > $home) 
		{ print "You cannot demolish that many buildings."; die(); 
		} 
	elseif ($ubarrack > $barrack) 
		{ print "You cannot demolish that many buildings."; die(); 
		} 
	elseif ($ufarm > $farm) 
		{ print "You cannot demolish that many buildings."; die(); 
		} 
	elseif ($ulab > $lab) 
		{ print "You cannot demolish that many buildings."; die(); 
		} 
		else 
			{ 
	
	
	$gp = $gp - (($ugm + $uim + $uhome + $ubarrack + $ufarm + $ulab) * 75);
	 $gp=floor($gp);
	 
	 $amts = $amts + ($ugm + $uim);
	 $aland = $aland + ($uhome + $ubarrack + $ufarm + $ulab);

	$forexp2 = $exp2 - (($uhome + $ubarrack + $ufarm + $ulab) * $landexp) + (($ugm + $uim) * $mtexp); 
	
	
	 @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE user SET exp2 =\"$forexp2\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE buildings SET gm =gm-$ugm WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE buildings SET im=im-$uim WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE buildings SET amts =\"$amts\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE buildings SET home=home-$uhome WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE buildings SET barrack =barrack-$ubarrack WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE buildings SET farm = farm-$ufarm WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE buildings SET lab = lab-$ulab WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE buildings SET aland =\"$aland \" WHERE email='$email' AND pw='$pw'");
	 
	  
			}
}


?>
<!-- body ends here -->
     </TD>
    </TR>
   </TABLE>
</BODY>
</HTML>