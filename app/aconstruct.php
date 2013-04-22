<?php
		include("include/igtop.php");
	?>

		<!-- BODY OF PAGE BEGINS HERE -->
	
		<br><br>
        
		 <center>
		 <b class=reg>| <a href="equip.php"> -Equip- </a> | <a href="wconstruct.php"> -Construct Weapon- </a> | <a href="aconstruct.php"> -Construct Armor- </a></b>
		</center>
		<br><br>


			

<?php
	if(!IsSet($update2))
{
 ?>

		   
			<? include("include/S_CS.php"); ?>


<?php
}
else
{
	if($gp < 75000)
		{echo"<div align=center>You do not have enough gold.</div>";include("include/S_CS.php");include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");die();
		}
	elseif($iron < 10000) 
		{echo"<div align=center>You do not have enough iron.</div>";include("include/S_CS.php");include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");die(); 
		} 
		else 
			{

					$iron = $iron - 10000;
					$gp = $gp - 75000;
				    $exp2 = $exp2 + 5000;
					$cs = $cs + 1;
	 				include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET cs =\"$cs\" WHERE email='$email' AND pw='$pw'");
					
					echo"<div align=center>You have successfully constructed Chain Shirts for your army.</div>";
					include("include/S_CS.php");include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");
					die();
			}
}
?>


<?php
	if(!IsSet($update3))
{
 ?>
				
			<? include("include/S_CM.php"); ?>


<?php
}
else
{
	if($gp < 125000)
			{echo"<div align=center>You do not have enough gold.</div>";include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");die();
			}
			elseif ($iron < 18000) 
				{echo"<div align=center>You do not have enough iron.</div>";include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");die(); 
				} 
				else 
					{ 

					$iron = $iron - 18000;
					$gp = $gp - 125000;
				    $exp2 = $exp2 + 10000;
					$cm = $cm + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET cm =\"$cm\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center>You have successfully constructed Chain Mail for your army.</div>";
					include("include/S_CM.php");include("include/S_BP.php");include("include/S_FP.php");
					die();

					}
}
?>

<?php
	if(!IsSet($update4))
{
 ?>
					
				<? include("include/S_BP.php"); ?>

<?php
}
else
{
		if($gp < 150000)
			{echo"<div align=center>You do not have enough gold.</div>";include("include/S_BP.php");include("include/S_FP.php");die();
			}
		elseif($iron < 25000) 
			{echo"<div align=center>You do not have enough iron.</div>";include("include/S_BP.php");include("include/S_FP.php");die();
			} 
			else 
				{ 

					$iron = $iron - 25000;
					$gp = $gp - 150000;
				    $exp2 = $exp2 + 15000;
					$bp = $bp + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET bp =\"$bp\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center>You have successfully constructed Breast Plates for your army.</div>";
					include("include/S_BP.php");include("include/S_FP.php");
					die();
				}

}
?>

 <?php
	if(!IsSet($update6))
{
 ?>
				
			<? include("include/S_FP.php"); ?>

<?php
}
else
{
		if($gp < 500000)
			{echo"<div align=center>You do not have enough gold.</div>";include("include/S_FP.php");die();
			}
		elseif($iron < 50000) 
			{echo"<div align=center>You do not have enough iron.</div>";include("include/S_FP.php");die(); 
			} 
			else 
				{ 

					$iron = $iron - 50000;
					$gp = $gp - 500000;
				    $exp2 = $exp2 + 35000;
					$fp = $fp + 1;
	 
					include("include/connect.php");
	  				mysql_query("UPDATE user SET iron =\"$iron\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET exp2 =\"$exp2\" WHERE email='$email' AND pw='$pw'"); 
	  				mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");  
	  				mysql_query("UPDATE military SET fp =\"$fp\" WHERE email='$email' AND pw='$pw'");

					echo"<div align=center>You have successfully constructed Medieval Armor for your army.</center>";
					include("include/S_FP.php");
					die();
				}
}
?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>