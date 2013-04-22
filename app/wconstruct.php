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
		 <b class=reg></a> | <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a></b>
		</center>
		<br><br>

<table border=0 width="80%" align=center>
  <tr>
    <td class=main colspan=5><b class=reg>Weapon Construction</b></td>
  <tr>
    <td class=main2 colspan=5>You have <? echo"$iron"; ?> Iron</td>
  <tr>
	<td class=main2><b class=reg></b></td>
    <td class=main2><b class=reg>Type</b></td>
	<td class=main2><b class=reg>GP cost</b></td>
	<td class=main2><b class=reg>Iron cost</b></td>
	<td class=main2><b class=reg>Construct</b></td>
<?php
	if(!IsSet($update))
{
 ?>
<form type=get action="wconstruct.php">
  <tr>
	<td><center><img src="images/weapons/shortsword.gif"><center></td>
    <td class=inner2>Short Sword</td>
	<td class=inner2>50,000</td>
	<td class=inner2>5,000</td>
	<td class=inner2>
	<? 
	if($ssword < 1)
	{echo"$ssbutton";
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
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update =="5" or !IsSet($update6) && $update =="6")
		{echo""; die();
		}
		elseif($gp < 50000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 5000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 5000;
					$gp = $gp - 50000;
				    $exp2 = $exp2 + 3000;
					$ssword = $ssword + 1;
	 
		 @mysql_connect (localhost, ziccarelli, pa724);
		  mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE military SET ssword = \"$ssword\" WHERE email='$email' AND pw='$pw'");
	 }
}
?>
</form>
<?php
	if(!IsSet($update2))
{
 ?>
<form type=get action="wconstruct.php">
 <tr>
	<td><center><img src="images/weapons/longsword.gif"></center></td>
    <td class=inner2>Long Sword</td>
	<td class=inner2>75,000</td>
	<td class=inner2>10,000</td>
	<td class=inner2>
		<?  
	if($lsword < 1)
	{echo"$lsbutton";
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
	if (!IsSet($update1) && $update =="1" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update =="5" or !IsSet($update6) && $update =="6")
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
					$lsword = $lsword + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			 mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp 2=\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET lsword =\"$lsword\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>

<?php
	if(!IsSet($update3))
{
 ?>
<form type=get action="wconstruct.php">
 <tr>
	<td><center><img src="images/weapons/axe.gif"></center></td>
    <td class=inner2>Axe</td>
	<td class=inner2>125,000</td>
	<td class=inner2>18,000</td>
	<td class=inner2>
	<?  
	if($axe < 1)
	{echo"$abutton";
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
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update) && $update =="1" or !IsSet($update4) && $update4 =="4" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update =="6")
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
				
					$axe = $axe + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET axe =\"$axe\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>
<?php
	if(!IsSet($update4))
{
 ?>
<form type=get action="wconstruct.php">
 <tr>
	<td><center><img src="images/weapons/club.gif"></center></td>
    <td class=inner2>Club</td>
	<td class=inner2>150,000</td>
	<td class=inner2>8,000</td>
	<td class=inner2>
<?  
	if($qstaff < 1)
	{echo"$qsbutton";
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
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update) && $update =="1" or !IsSet($update5) && $update5 =="5" or !IsSet($update6) && $update =="6")
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
					$club = $club + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET club =\"$club\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>
 <?php
	if(!IsSet($update5))
{
 ?>
<form type=get action="wconstruct.php">
 <tr>
	<td><center><img src="images/weapons/greataxe.gif"></center></td>
    <td class=inner2>Great Axe</td>
	<td class=inner2>250,000</td>
	<td class=inner2>30,000</td>
	<td class=inner2>
	<?  
	if($gaxe < 1)
	{echo"$gabutton";
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
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update) && $update =="1" or !IsSet($update6) && $update =="6")
		{echo""; die();
		}
	elseif($gp < 250000)
			{print "You do not have enough gold.";die();
			}
			elseif ($iron < 30000) 
				{ print "You do not have enough iron."; die(); 
				} 
				else 
					{ 

					$iron = $iron - 30000;
					$gp = $gp - 250000;
				    $exp2 = $exp2 + 25000;
					$gaxe = $gaxe + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET gaxe =\"$gaxe\" WHERE email='$email' AND pw='$pw'");
	  }
}
?>
</form>
 <?php
	if(!IsSet($update6))
{
 ?>
<form type=get action="wconstruct.php">
 <tr>
	<td><center><img src="images/weapons/icesword.gif"></center></td>
    <td class=inner2>Ice Sword</td>
	<td class=inner2>500,000</td>
	<td class=inner2>50,000</td>
	<td class=inner2>
	<?  
	if($icesowrd < 1)
	{echo"$isbutton";
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
	if (!IsSet($update2) && $update2 =="2" or !IsSet($update3) && $update3 =="3" or !IsSet($update4) && $update4 =="4" or !IsSet($update) && $update =="1")
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
					$icesword = $icesword + 1;
	 
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);
	  mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  mysql_query("UPDATE military SET icesword =\"$icesword\" WHERE email='$email' AND pw='$pw'");
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