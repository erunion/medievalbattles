<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
<br><br>

<?php
	if(!IsSet($barter))
{
   ?> 
		<form type=get action="barter.php">
		<table border="1" bordercolor="#000000" align=center width="80%">	
<?php
			 include("include/connect.php");
			 $tablename = user;
echo "
		<table border=1 bordercolor=#000000 align=center width=\"90%\" cellpadding=0>
		<tr>
		  <td class=\"main\" colspan=\"5\"><b class=\"reg\">Bartering</b></td>
		<tr>
		  <td class=\"main2\" width=\"20%\"><b class=\"reg\">Seller</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Type</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Amount</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">GP Cost</b></td>
		  <td class=\"main2\" width=\"20%\"><b class=\"reg\">Barter</b></td>
";

		$query_string = "SELECT seller, type, amount, gp, barterid FROM barter";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {
						$setid_sel = mysql($dbnam, "SELECT setid FROM user WHERE ename=\"$row[0]\"");
						$s_sel = mysql_result($setid_sel,"s_sel");
			if($row[0] == $ename)
				{$endnow = End;}
		    print("<TR ALIGN=center VALIGN=TOP colspan=5>
				   <td bgcolor=#404040><a href=\"messaging.php?value=$row[0]&snum=$s_sel&setchg=1\">$row[0]($s_sel)</a>$endnow</td>
				   <td bgcolor=#404040>$row[1]</td>
				   <td bgcolor=#404040>$row[2]</td>
				   <td bgcolor=#404040>$row[3]</td>
				   <td bgcolor=#404040><a href=barter.php?barter=1&bid=$row[4]>Barter</a></td>\n");
		    }

		echo "
				</table>
				<br>
		";

?>
	 <br>
		<center><input class=button type=submit name=barter value=barter></center>
		<input type="hidden" name="barter" value="1">
	</form>
<?
}
else
{
					$query = "SELECT barterid FROM barter WHERE barterid='$bid'";
					$result = mysql_query($query); 
					$barterid_check = mysql_fetch_array($result);

					if($barterid_check[0] != $bid)
						{echo"<font class=yellow><div align=center>There is no such barter.</font></div>";die();
						}

						$barter_gp = mysql($dbnam, "SELECT gp FROM barter WHERE barterid='$bid'");
						$b_gp = mysql_result($barter_gp,"b_gp");
						
						$barter_type = mysql($dbnam, "SELECT type FROM barter WHERE barterid='$bid'");
						$b_type = mysql_result($barter_type,"b_type");
						
						$barter_amount = mysql($dbnam, "SELECT amount FROM barter WHERE barterid='$bid'");
						$b_amount = mysql_result($barter_amount,"b_amount");
						
						$barter_seller = mysql($dbnam, "SELECT seller FROM barter WHERE barterid='$bid'");
						$b_seller = mysql_result($barter_seller,"b_seller");
						
						$barter_userid = mysql($dbnam, "SELECT userid FROM barter WHERE barterid='$bid'");
						$b_userid = mysql_result($barter_userid,"b_userid");

						$barterers_gp = mysql($dbnam, "SELECT gp FROM user WHERE userid='$b_userid'");
						$barts_gp = mysql_result($barterers_gp,"barts_gp");

						
						$barter_nno = mysql($dbnam, "SELECT nno FROM user WHERE userid='$b_userid'");
						$b_nno = mysql_result($barter_nno,"b_nno");

			if($b_userid == $userid)
				{echo"<font class=yellow><div align=center>You cannot buy your own things.</font></div><br><br>";die();
				}
			elseif($gp < $b_gp)
				{echo"<font class=yellow><div align=center>You do not have enough gold.</font></div><br><br>";die();
				}
				
				if($b_type == "Warrior")
					{
					$B_NEW_GP = $barts_gp + $b_gp;
					$newwarriors = $warriors + $b_amount;
					$newgp = $gp - $b_gp;
					$newexp = $exp2 + ($b_amount * $warexp);
					mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET warriors =\"$newwarriors\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$newgp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$B_NEW_GP\" WHERE userid='$b_userid'");
					}
				if($b_type == "Wizard")
					{
					$B_NEW_GP = $barts_gp + $b_gp;
					$newwizards = $wizards + $b_amount;
					$newgp = $gp - $b_gp;
					$newexp = $exp2 + ($b_amount * $wizexp);
					mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET wizards =\"$newwizards\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$newgp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$B_NEW_GP\" WHERE userid='$b_userid'");
					}
				if($b_type == "Priest")
					{
					$B_NEW_GP = $barts_gp + $b_gp;
					$newpriests = $priests + $b_amount;
					$newgp = $gp - $b_gp;
					$newexp = $exp2 + ($b_amount * $priexp);
					mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE military SET priests =\"$newpriests\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$newgp\" WHERE email='$email' AND pw='$pw'");
					mysql_query("UPDATE user SET gp =\"$B_NEW_GP\" WHERE userid='$b_userid'");
					}

					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>$ename has bought $b_amount $b_type(s) for $b_gp gp</font>\" , '$b_userid') ");
				
					mysql_query("INSERT INTO empnews (date, news, yourid) 
						VALUES	('$clock', \"<font class=yellow>You have bought $b_amount $b_type(s) for $b_gp gp from $b_seller</font>\" , '$userid') ");

					$your_new_nno = $nno + 1;
					$their_new = $b_nno + 1;
					mysql_query("DELETE FROM barter WHERE barterid='$bid'"); 
					mysql_query("UPDATE user SET nno =\"$their_new\" WHERE userid='$b_userid'");
					mysql_query("UPDATE user SET nno =\"$your_new_nno\" WHERE userid='$userid'");
					echo"<font class=yellow><div align=center>You have bartered with $b_seller.</font></div>";
}
?>
<?php
	if(!IsSet($add))
{
   ?> 

<form type=get action="barter.php">
	<table border=0 width="60%" align=center>
	 <tr>
	   <td class=main colspan=2><b class=reg>Add</b></td>
	 <tr>
		<td class=main2 colspan=2>
		<select name="type">
	    <option selected value="ns">-Choose type-</option>
		<option value="Warrior">Warrior</option>
		<option value="Wizard">Wizard</option>
		<option value="Priest">Priest</option>
		</select></td>
	 <tr>
	   <td class=main2><b class=reg>Amount:</b></td><td class=inner><center><input type="number" name="amount" size=15></center></td>
	<tr>
	   <td class=main2><b class=reg>GP Cost:</b></td><td class=inner><center><input type="number" name="cost" size=15></center></td>
	 

	 </table>
	  <br>
		<center><input class=button type=submit name=add value=Add></center>
		<input type="hidden" name="add" value="1">
	</form>


<?php
}
else
{


		if($type == ns OR $gp == "" OR $amount == "")
			{echo"<font class=yellow><div align=center>You must have something for each field</font></div><br><br>."; die();
			}
		elseif($cost < 0)
			{echo"<font class=yellow><div align=center>You do not have that much gold</font></div><br><br>.";die();
			}
		elseif($type == "Warrior" AND $warriors < $amount AND $warriors <= 0)
			{echo"<font class=yellow><div align=center>You do not have that many warriors.</font></div><br><br>"; die();
			}
		elseif($type == "Wizard" AND $wizards < $amount AND $wizards <= 0)
			{echo"<font class=yellow><div align=center>You do not have that many wizards.</font></div><br><br>"; die();
			}
		elseif($type == "Priest" AND $priests < $amount AND $priests <= 0)
			{echo"<font class=yellow><div align=center>You do not have that many priests.</font></div><br><br>"; die();
			}
			else
				{
					include("include/connect.php");

					$themaxbarterid = mysql($dbnam, "SELECT max(barterid) FROM barter");
					$maxbid = mysql_result($themaxbarterid,"maxbid");
									
					$maxbid = $maxbid + 1;
					 mysql_query("INSERT INTO barter (seller, gp, type, amount, barterid, userid) 
						VALUES	(\"$ename\", '$cost', '$type', '$amount', '$maxbid', '$userid') ");
					
					if($type == "Warrior")
						{
						$newwar= $warriors - $amount;
						$newexp = $exp2 - ($amount * $warexp);
						mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET warriors =\"$newwar\" WHERE email='$email' AND pw='$pw'");
					
						}
					if($type == "Wizard")
						{
						$newwiz= $wizards - $amount;
						$newexp = $exp2 - ($amount * $wizexp);
						mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET wizards =\"$newwiz\" WHERE email='$email' AND pw='$pw'");
						
						}
					if($type == "Priest")
						{
						$newpri= $priests - $amount;
						$newexp = $exp2 - ($amount * $priexp);
						mysql_query("UPDATE user SET exp2 =\"$newexp\" WHERE email='$email' AND pw='$pw'");
						mysql_query("UPDATE military SET priests =\"$newpri\" WHERE email='$email' AND pw='$pw'");
						
						}
					echo"<font class=yellow><div align=center>Your units are up for bartering.</font></div><br><br>";die();

				}
}

?>
<!-- body ends here -->
</TD>
</TR>
</TABLE>
</BODY>
</HTML>
