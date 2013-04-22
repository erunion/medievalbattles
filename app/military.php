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
  
	  
		<table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
 		<tr>
		<td><br><br><br>
         
		 <center>
		 <b class=reg> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a></b>
		</center>
<br><br>
<?php
	if(!IsSet($recruited))
{
 ?>


		<form type=get action="military.php">
		<table border="0" bordercolor="#808080" align=center width="80%">
		  <tr>
			<td colspan=7 class=main><b class=top>Recruit Civilians</b></td>
		  <tr>
			<td class=main2>You currently have <?php echo"$maxciv"; ?> civilians available to recruit<br>  
			<? echo"It costs 150 gp per civilian recruited"; ?>
		  <tr>
			 <td class=inner2>Amount of civilians to recruit:<input type="number" name="urecruit" size=5>
			   <br><br>
				<center>
				  <input class=button type="submit" name="recruit" value="Recruit Civilians"></center>
				     <input type="hidden" name="recruited" value="1">
					 </form>
			  </td>
		</table>

<?php
}
else
{
	if (!IsSet($trains) && $trains =="2" or !IsSet($advance) && $advance =="3")
		{echo""; die();
		}
		elseif($civ < $urecruit)
			{print "You cannot recruit that many civilians.";die();
			}
			elseif ($gp < $urecruit * 100) 
				{ print "You do not have enough gold to carry out your orders."; die(); 
				} 
				else 
					{ 
	
	 
	 
	 $gp = $gp - ($urecruit * 150);
	 $gp=floor($gp);
	 
	 $maxciv = $maxciv - $urecruit;
	 
	 $recruits = $recruits + $urecruit;
	 $newexp = $exp2 + ($urecruit * 2);
		
		
	  @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
	
	  mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET recruits =\"$recruits\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET maxciv =\"$maxciv\" WHERE email='$email' AND pw='$pw'");
	 
			}
}


?>
<br><br>

		<form type=get action="military.php">
		<table border="0" bordercolor="#808080" align=center width="80%">
		  <tr>
			<td colspan=5 class=main><b class=top>Train Recruits</b></td>
		  <tr>
			<td class=main2 colspan=5You currently have <?php echo"$recruits"; ?> recruits available </td>
		 <tr>
			<td class=main2><b class=reg>Unit</b></td>
			<td class=main2><b class=reg>You own</b></td>
			<td class=main2><b class=reg>Cost</b></td>
			<td class=main2><b class=reg>Hr 1 Amount</b></td>
			<td class=main2><b class=reg>Amount</b></td>
			
		  
<?php
	if(!IsSet($trains))
{
  ?>
		  <tr  align=center>
			<td class=inner>Scientist</td>
			<td class=inner><?php ; echo"$tscientists"; ?></td>
			<td class=inner>500</td>
			<td class=inner2><? echo"$dbscientist"; ?></td>
			<td class=inner><input type="number" name="uscientist" size=5></td>
		  <tr align=center>
			<td class=inner>Thief</td>
			<td class=inner><?php echo"$thieves"; ?></td>
			<td class=inner>200</td>
			<td class=inner2><? echo"$dbthief"; ?></td>
			<td class=inner><input type="number" name="uthief" size=5></td>
		  <tr align=center>
			<td class=inner>Explorer</td>
			<td class=inner><?php echo"$texplorers"; ?></td>
			<td class=inner>1,000</td>
			<td class=inner2><? echo"$dbexplorer"; ?></td>
			<td class=inner><input type="number" name="uexplorer" size=5></td>
			
					
				</table>
	<br>
		<center><input  class=button type="submit" name="trains" value="Train Recruits"></center>
		<input type="hidden" name="trains" value=2>
		</form>

<?php
}
else
{
	if (!IsSet($recruited) && $recruited =="1" or !IsSet($advance) && $advance =="3")
	{echo""; die();
	}
	elseif($recruits < $uthief + $uscientist + $uexplorer)
		{print "You do not have enough recruits.";die();
		}
		elseif ($gp < ($uthief * 200) + ($uexplorer * 1000) + ($uscientist * 500)) 
			{ print "You do not have enough gold to carry out your orders."; die(); 
			} 
			else 
				{ 
	
	 
	 
	 $gp = $gp - (($uthief * 200) + ($uscientist * 500) + ($uexplorer * 1000));
	 $gp=floor($gp);

     $recruits = $recruits - ($uexplorer + $uthief + $uscientist);
	 $newexplorers = $dbexplorer + $uexplorer;
	 $newscien = $dbscientist + $uscientist;
	 $newthief = $dbthief + $uthief;
	 $newexp2 = $exp2 + (($uscientist + $uthief + $uexplorer) * 10);
	

	  @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
	
	  mysql_query("UPDATE user SET exp2 =\"$newexp2\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET recruits =\"$recruits\" WHERE email='$email' AND pw='$pw'");
	 
	  mysql_query("UPDATE military SET dbscientist =\"$newscien\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET dbthief =\"$newthief\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET dbexplorer =\"$newexplorers\" WHERE email='$email' AND pw='$pw'");
	 
	 
	 
			}
}


?>

<br><br>
 
		<form type=get action="military.php">
	<table border=0 bordercolor="#808080" align=center width="80%">
	  <tr>
	    <td class=main colspan=5><b class=reg>Hire</b></td>
	<tr>
			<td class=main2 colspan=5>You currently have <?php echo"$recruits"; ?> recruits available </td>
	  <tr>
	    <td class=main2><b class=reg>Unit</b></td>
		<td class=main2><b class=reg>GP cost</b></td>
		
		<td class=main2><b class=reg>Trading Time</b></td>
		<td class=main2><b class=reg>You own</b></td>
		<td class=main2><b class=reg>Amount</b></td>
		
	  <tr>
<?php
	if(!IsSet($advance))
{
   ?> 
		<td class=inner2>Warrior</td>
		<td class=inner2><? echo"$warriorc"; ?></td>
		
		<td class=inner2>15</td>
		<td class=inner2><? echo"$twarriors"; ?></td>
		<td class=inner2><center><input type="number" name="uwarrior" size=2></center></td>
		

	  <tr>
		<td class=inner2>Wizard</td>
		<td class=inner2><? echo"$wizardc"; ?></td>
		<td class=inner2>12</td>
		<td class=inner2><? echo"$twizards"; ?></td>
		<td class=inner2><center><input type="number" name="uwizard" size=2></center></td>
		
	 
	<tr>
		<td class=inner2>Priest</td>
		<td class=inner2><? echo"$priestc"; ?></td>
		<td class=inner2>10</td>
		<td class=inner2><? echo"$tpriests"; ?></td>
		<td class=inner2><center><input type="number" name="upriest" size=2></center></td>
		</table>

<br>
		<center><center><input class=button type="submit" name="advance" value="Hire"></center>
				<input type="hidden" name="advance" value="3">
				</form>
				
<?php
}
else
{

if (!IsSet($recruited) && $recruited =="1" or !IsSet($trains) && $trains =="2")
	{echo""; die();
	}
	elseif($gp < ($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior))
		{print "You do not have enough gold."; die();
		}
		elseif ($recruits < ($priestr * $upriest) + ($warriorr * $uwarrior) + ($wizardr * $uwizard)) 
			{ print "You do not have enough recruits."; die(); 
				}
				else
					{
	 
	 $gp = $gp - (($priestc * $upriest) + ($wizardc * $uwizard) + ($warriorc * $uwarrior));
	 $gp=floor($gp);
	 
	 $recruits = $recruits - ($upriest + $uwizard + $uwarrior);
	 $newpri = $dbpri2 + $upriest;
	 $newiz = $dbwiz2 + $uwizard;
	 $newar = $dbwar2 + $uwarrior; 
	 $newexp2 = $exp2 + (($uwizard * $wizexp) + ($uwarrior * $warexp) + ($upriest * $priexp));
	 
	 @mysql_connect (localhost, ziccarelli, pa724);
	  mysql_select_db (medievalbattles_com);
		
      mysql_query("UPDATE user SET exp2 =\"$newexp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET recruits =\"$recruits\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET dbpri2 =\"$newpri\" WHERE email='$email' AND pw='$pw'");
      mysql_query("UPDATE military SET dbwiz2 =\"$newiz\" WHERE email='$email' AND pw='$pw'");
	  mysql_query("UPDATE military SET dbwar2 =\"$newar\" WHERE email='$email' AND pw='$pw'");
	 
			            }
}


?>
<br><br>	
	
	
<!-- body ends here -->

</form>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>