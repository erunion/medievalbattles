<?php

  @mysql_connect (localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(deadon4thline);
$dbnam = "medievalbattles_com";
// save time() in a session var, and on the session start, if that var is older than however long, delete the //session
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
 <br><br><br>


<center><a href="donate.php"><b class=reg>| Donate to funds |</b></a></center>


<table border="1" bordercolor="#000000" align=center width="80%">
	<tr>
	
		  <td colspan=5>
			<form method="post" action="govt.php">
			<center>
			
 <?php
	if(!IsSet($change))
{
  ?> 

<?php

	$var =  @mysql_connect(localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Select an Empire-</option>
		";

/* Download list of Presidents */
$query_string = "SELECT userid, ename FROM user WHERE setid = '$setid'";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))
    {
    print("<option value=$row[0]>$row[1]\n</option>");
    }


echo "
		
		</select>
<br><br>";

?>
			
			<input type="submit" name="change" value="Vote" class=button>
			<input type="hidden" name="change" value="1">
			</center>
			
			</td>
<?php
}
else
{
			@mysql_connect (localhost, ziccarelli, pa724);
			mysql_select_db (medievalbattles_com);	
			$dbnam = "medievalbattles_com";

	$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
	$maxvoteno = mysql_result($themaxvote,"maxvoteno");

	if($empvalue == ns)
		{print "You did not vote for anyone!"; die();
		}
		
	elseif($votefor == None)
		{ 
			

			//voted for ename
		$selename = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$fename = mysql_result($selename,"fename");
			
			//set votefore
		mysql_query("UPDATE user SET votefor =\"$fename\" WHERE email='$email' AND pw='$pw'"); 
			
			//select vote where empire  = empire selected
		$selectedempvotes = mysql($dbnam, "SELECT vote FROM user WHERE userid = '$empvalue'");	
	    $selempvotes = mysql_result($selectedempvotes,"selempvotes");
	 
		$newvotecount = $selempvotes + 1;
			
			//set votes where empire selected
		mysql_query("UPDATE user SET vote = \"$newvotecount\" WHERE ename = '$fename'");
		 
			//remove SL then add SL to person with highest votes
		mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");	

		
		
			//grant SL with highest votes
		$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
		$maxvoteno = mysql_result($themaxvote,"maxvoteno");
		mysql_query("UPDATE user SET sl = \"yes\" WHERE vote='$maxvoteno'");	
			
		
	 die();
		}
		else
	{
				//subtract votes from old empire
		$theoldempv = mysql($dbnam, "SELECT vote FROM user WHERE ename = '$votefor'");	
		$oldempv = mysql_result($theoldempv,"oldempv");
	 
				//set old empire vote
		$oldempirevotes = $oldempv - 1;
		mysql_query("UPDATE user SET vote = \"$oldempirevotes\" WHERE ename='$votefor'");

			//voted for ename
		$selename = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$fename = mysql_result($selename,"fename");
			
			//set votefore
		mysql_query("UPDATE user SET votefor =\"$fename\" WHERE email='$email' AND pw='$pw'"); 
			
			//select vote where empire  = empire selected
		$selectedempvotes = mysql($dbnam, "SELECT vote FROM user WHERE ename = '$fename'");	
	    $selempvotes = mysql_result($selectedempvotes,"selempvotes");
	 
		$newvotecount = $selempvotes + 1;
			
			//set votes where empire selected
		mysql_query("UPDATE user SET vote = \"$newvotecount\" WHERE ename = '$fename'");
		 
			//remove SL then add SL to person with highest votes
		mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");	

		
		
			//grant SL with highest votes
		$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
		$maxvoteno = mysql_result($themaxvote,"maxvoteno");
		mysql_query("UPDATE user SET sl = \"yes\" WHERE vote='$maxvoteno'");	
			

		die();
			            }
}


?>	
</form>
<!-- --------------------------- -->
<?php
if (!IsSet($change))
{
?>	

<?php

	$var =  @mysql_connect(localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";
	function display_db_table($tablename, $var)
	{	
		global $setid;
			$query_string = "SELECT ename, aim, vote, votefor, sl FROM user WHERE setid='$setid'";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			while ($row = mysql_fetch_row($result_id))
		{
				print("<TR ALIGN=center VALIGN=TOP colspan=4>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
					
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		print("</TABLE>\n");
	}

echo "
		<tr>
		  <td class=\"main\" colspan=\"4\"><b class=\"reg\">Settlement Votes</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">AIM</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Votes Received</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Voting For</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">SL</b></td>
		  
		<tr colspan=\"4\">
		  <td colspan=\"4\">"; 
				display_db_table("user", $var);
echo "

				</td>

	    </table>";
}
else
{


	$var =  @mysql_connect(localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";
	function display_db_table($tablename, $var)
	{	
		global $snum;
			$query_string = "SELECT ename, vote FROM user WHERE setid='$snum'";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			while ($row = mysql_fetch_row($result_id))
		{
				print("<TR ALIGN=center VALIGN=TOP colspan=4>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
					
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		print("</TABLE>\n");
	}
echo "
		<tr>
		  <td class=\"main\" colspan=\"5\"><b class=\"reg\">Settlement Votes</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Votes Recieved</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Voting For</b></td>
		  
		<tr colspan=\"4\">
		  <td colspan=\"4\">"; 
				display_db_table("user", $var);
echo "
				</td>

	    </table>";

 }
?>

<br>

<!-- body ends here -->	
  </table>
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
