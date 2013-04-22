						 <?php
							$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$setid'");	
							$settlepic = mysql_result($ssettlementpic,"settlepic");	
							$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$setid'");	
							$settlename = mysql_result($ssettlementname,"settlename"); 
							$thenap = mysql($dbnam, "SELECT nap FROM settlement WHERE setid = '$setid'");	
							$nap = mysql_result($thenap,"nap");
						   ?>


<form type=post action=sl.php>
		 <table border=0 width=\"60%\" align=center>
			<tr>
			  <td colspan=2 class=main><b class=reg>Settlement Options</b></td>
			<tr>
			  <td colspan=2 class=main2>Here, you can select a settlement name and picture for your settlement.</td>
			<tr>
			  <td class=inner2><b class=other>Settlement Name:</b></td><td class=inner2><input type="text" name="thesetname" value="<? echo"$settlename"; ?>" maxlength=35></td>
			<tr>
			  <td class=inner2><b class=other>Settlement pic URL:</b></td><td class=inner2><input type="text" name="theseturl" value="<? echo"$settlepic"; ?>"></td>
			<tr>
			  <td class=inner2><b class=other>NAP's:</b></td><td class=inner2><input type=text name="thenap" value="<? echo"$nap"; ?>" maxlength=20></td>
			<tr>
			  <td class=inner2 colspan=2><center><input type="submit" name="update" value="Update" class=button></center>
												<input type="hidden" name="update" value="1"></td>
		</table>
	   </form>