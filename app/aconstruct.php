<?php

$var =  @mysql_connect (localhost, ziccarelli, pa724);
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
		 <b class=reg>| <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a></b>
		</center>
		<br><br>

<table border=0 width="80%" align=center>
  <tr>
    <td class=main colspan=5><b class=reg>Armor Construction</b></td>
  <tr>
    <td class=main2 colspan=5>You have <? echo"$iron"; ?> Iron</td>
  <tr>
	<td class=main2><b class=reg></b></td>
    <td class=main2><b class=reg>Type</b></td>
	<td class=main2><b class=reg>GP cost</b></td>
	<td class=main2><b class=reg>Iron cost</b></td>
	<td class=main2><b class=reg>Construct</b></td>

<?php
	if(!IsSet($update2))
{
 ?>
<form type=get action="aconstruct.php">
 <tr>
	<td><center><img src="images/armors/cs.gif"></center></td>
    <td class=inner2>Chain Shirt</td>
	<td class=inner2>75,000</td>
	<td class=inner2>10,000</td>
	<td class=inner2>
		<?  
	if($cs < 1)
	{echo"$csbutton";
	}
	else
	{		echo"<i>Completed</i>"; 
	}
    ?>
	</td>
<?php
}
else
{
	if (!IsSet($update1) && $update =="1" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo"update 1 is set"; die();
		}
	elseif($gp < 75000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 10000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 10000;
					$gp = $gp - 75000;
				    $exp2 = $exp2 + 5000;
					$cs = $cs + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			 mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET cs =\"$cs\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>

<?php
	if(!IsSet($update3))
{
 ?>
<form type=get action="aconstruct.php">
 <tr>
	<td><center><img src="images/armors/cm.gif"></center></td>
    <td class=inner2>Chain Mail</td>
	<td class=inner2>125,000</td>
	<td class=inner2>18,000</td>
	<td class=inner2>
	<?  
	if($cm < 1)
	{echo"$cmbutton";
	}
	else
	{		echo"<i>Completed</i>"; 
	}
    ?>
	</td>
<?php
}
else
{
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update) && $update =="1" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($gp < 125000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 18000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 18000;
					$gp = $gp - 125000;
				    $exp2 = $exp2 + 10000;
					$cm = $cm + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET cm =\"$cm\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>
<?php
	if(!IsSet($update4))
{
 ?>
<form type=get action="aconstruct.php">
 <tr>
	<td><center><img src="images/armors/bp.gif"></center></td>
    <td class=inner2>Breast Plate</td>
	<td class=inner2>150,000</td>
	<td class=inner2>8,000</td>
	<td class=inner2>
<?  
	if($bp < 1)
	{echo"$bpbutton";
	}
	else
	{		echo"<i>Completed</i>"; 
	}
    ?>
	</td>
<?php
}
else
{
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update) && $update =="1" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update6 =="6")
		{echo""; die();
		}
	elseif($gp < 150000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 8000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 8000;
					$gp = $gp - 150000;
				    $exp2 = $exp2 + 15000;
					$bp = $bp + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET bp =\"$bp\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>

 <?php
	if(!IsSet($update6))
{
 ?>
<form type=get action="aconstruct.php">
 <tr>
	<td><center><img src="images/armors/enchanted.gif"></center></td>
    <td class=inner2>Medieval Armor</td>
	<td class=inner2>500,000</td>
	<td class=inner2>50,000</td>
	<td class=inner2>
	<?  
	if($fp < 1)
	{echo"$fpbutton";
	}
	else
	{		echo"<i>Completed</i>"; 
	}
    ?>
	</td>
<?php
}
else
{
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update) && $update =="1" or !IsSet($update5) && $update5 =="5")
		{echo""; die();
		}
	elseif($gp < 500000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 50000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 50000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 35000;
					$fp = $fp + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET fp =\"$fp\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>



	
		
<!-- body ends here -->

</form>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>