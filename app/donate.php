<?php include("include/igtop.php");?>

<?php
	if (!IsSet($donate))
{
?>

		<? include("include/S_DONATE.php"); ?>

<?php
}
else
{

include("include/nexplode.php");
		
if($donateg == "" AND $donatei == "")
	{echo"<div align=center><font class=yellow>You did not donate anything.</font></div>";include("include/S_DONATE.php");die();
	}
elseif($donateg < 0 OR $donatei < 0)
	{echo"<div align=center><font class=yellow>You cannot donate negative gold or iron.</font></div>"; include("include/S_DONATE.php");die();
	}
elseif($gp < $donateg OR $iron < $donatei)
	{echo"<div align=center><font class=yellow>You cannot donate that much.</font></div>"; include("include/S_DONATE.php"); die();
	}
	else{
		

			
				

			

			$yyourgold = mysql($dbnam, "SELECT fgold FROM settlement WHERE setid = '$setid'");	
			$yourgold = mysql_result($yyourgold,"yourgold");

			$yyouriron = mysql($dbnam, "SELECT firon FROM settlement WHERE setid = '$setid'");	
			$youriron = mysql_result($yyouriron,"youriron");

			$gp = $gp - $donateg;
			$iron = $iron - $donatei;
			
			mysql_query("UPDATE user SET gp =\"$gp\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE user SET iron =\"$iron\" WHERE  email='$email' AND pw='$pw'"); 
			
			$fgold = $yourgold + $donateg;
			$firon = $youriron + $donatei;

			mysql_query("UPDATE settlement SET fgold =\"$fgold\" WHERE setid='$setid'");
			mysql_query("UPDATE settlement SET firon =\"$firon\" WHERE  setid='$setid'"); 


			if($donateg != "" AND $donatei == 0 AND $donatei == "")
				{$donatei = number_format($donatei);$donateg = number_format($donateg);$thenews = "<font class=green>$ename has donated $donateg gp to the fund</font>";
				}	
			if($donateg == "" AND $donatei > 0)
				{$donatei = number_format($donatei);$donateg = number_format($donateg);$thenews = "<font class=green>$ename has donated $donatei iron to the fund</font>";
				}
			if($donateg > 0 AND $donatei > 0)
				{$donatei = number_format($donatei);$donateg = number_format($donateg);$thenews = "<font class=green>$ename has donated $donateg gp and $donatei iron to the funds</font>";
				}
		
			
			mysql_query("INSERT INTO setnews (date, news, setid) 
				VALUES	('$clock', \"$thenews\", '$setid') ");
			
			echo"<br><div align=center><font class=yellow>You have successfully donated to the funds.</font></div>";
			include("include/S_DONATE.php");die();
		}
}
?>
<!-- body ends here -->	
</TD>
</TR>
</TABLE>
</BODY>
</HTML>