<?php
		include("include/igtop.php");
	?>
 <!-- BODY OF PAGE BEGINS HERE -->
 <br><br><br>

<center><b class=reg>|<a href="donate.php"> Donate to funds </a>|</center></b>
<br>

<?

					########AUTO-RUN SCRIPT############

					//SELECT MAX AMOUNT OF VOTES IN YOUR SET
				$_themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
				$_maxvoteno = mysql_result($_themaxvote,"_maxvoteno");	

					//SELECT EMPIRE WITH MOST VOTES
				$MV_empire = mysql($dbnam, "SELECT ename FROM user WHERE setid = '$setid' AND vote='$_maxvoteno'");	
	    		$MV_emp = mysql_result($MV_empire,"MV_emp");
		
				mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
				if($_maxvoteno != 0)
					{
						mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
						mysql_query("UPDATE user SET sl = \"yes\" WHERE ename = \"$MV_emp\" AND setid='$setid'");
						
					}
					########AUTO-RUN END#################
				

?>

		<table border="1" bordercolor="#000000" align=center width="80%">
		  <tr>
	  		<td colspan=6>
			<form method="post" action="govt.php">
			<center>
 <?php
	if(!IsSet($change))
{
  ?> 

<?php

	 include("include/connect.php");
	$tablename = "user";


echo "
	<select name=\"empvalue\">
	    <option selected value=ns>-Select an Empire-</option>
		<option select value=NOemp>-None-</option>
		";


$query_string = "SELECT userid, ename FROM user WHERE setid = '$setid' ORDER BY userid ASC";
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
		 include("include/connect.php");

			//SELECT MAX AMOUNT OF VOTES IN YOUR SET
				$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
				$maxvoteno = mysql_result($themaxvote,"maxvoteno");	


	if($empvalue == ns)
		{echo"<div align=center><font class=yellow>You did not specify anyone to vote for.</font></div><br>"; include ("include/S_GOVT.php");die();
		}
	elseif($empvalue == NOemp)
		{

			if($votefor == None)
				{echo"<font class=yellow><div align=center>You are not voting for anyone.</font></div><br>";include ("include/S_GOVT.php");die();
				}
			else
				{
						//SUBTRACTS VOTES WHERE VOTEFOR AND SETS VOTEFOR TO NONE AND SELECTS NEW SL

							 include("include/connect.php");

				
					

					//SELECT VOTES FROM OLD EMPIRE
				$theoldempv = mysql($dbnam, "SELECT vote FROM user WHERE ename = \"$votefor\"");	
				$oldempv = mysql_result($theoldempv,"oldempv");
	 
					//SUBTRACT A VOTE FROM OLD EMPIRE AND SET VOTEFOR TO NONE
				$oldempirevotes = $oldempv - 1;
				mysql_query("UPDATE user SET vote = \"$oldempirevotes\" WHERE ename=\"$votefor\"");
				mysql_query("UPDATE user SET votefor = \"None\" WHERE ename=\"$ename\"");

					
			########AUTO-RUN SCRIPT############

					//SELECT MAX AMOUNT OF VOTES IN YOUR SET
				$_themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
				$_maxvoteno = mysql_result($_themaxvote,"_maxvoteno");	

					//SELECT EMPIRE WITH MOST VOTES
				$MV_empire = mysql($dbnam, "SELECT ename FROM user WHERE setid = '$setid' AND vote='_$maxvoteno'");	
	    		$MV_emp = mysql_result($MV_empire,"MV_emp");
		
				mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
				if($_maxvoteno != 0)
					{
						mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
						mysql_query("UPDATE user SET sl = \"yes\" WHERE ename = \"$MV_emp\" AND setid='$setid'");
					}
			########AUTO-RUN END#################
			

					echo"<div align=center><font class=yellow>You are now voting for no one.</font></div><br>";
					include ("include/S_GOVT.php"); 
					die();
		
				}
		



		}
	elseif($votefor == None)
		{ 


		
		include("include/connect.php");

			//ENAME JUST VOTED FOR
		$selename = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$fename = mysql_result($selename,"fename");
			
			//SELECT SETID
		$SELECT_SETID = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
		$SEL_SID = mysql_result($SELECT_SETID,"SEL_SID");


			if($SEL_SID != $setid)
				{echo"<div align=center><font class=yellow>This empire is not in your settlement.</font></div>";include ("include/S_GOVT.php"); die();
				}
			
		 include("include/connect.php");


			//SET YOUR VOTEFOR TO EMPIRE VOTED FOR
		mysql_query("UPDATE user SET votefor =\"$fename\" WHERE email='$email' AND pw='$pw'"); 
			
			//SELECT VOTE COUNT FOR EMPIRE YOU VOTED FOR
		$selectedempvotes = mysql($dbnam, "SELECT vote FROM user WHERE userid = '$empvalue'");	
	    $selempvotes = mysql_result($selectedempvotes,"selempvotes");
	 	
			//NEW VOTE COUNT FOR EMPIRE VOTED FOR
		$newvotecount = $selempvotes + 1;
			
			//SET NO OF VOTES FOR EMPIRE YOU VOTED FOR
		mysql_query("UPDATE user SET vote = \"$newvotecount\" WHERE   userid='$empvalue'");
		 
				//SELECT MAX AMOUNT OF VOTES IN YOUR SET
		$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
		$maxvoteno = mysql_result($themaxvote,"maxvoteno");	

				//SELECT EMPIRE WITH MOST VOTES
		$MV_empire = mysql($dbnam, "SELECT ename FROM user WHERE setid = '$setid' AND vote='$maxvoteno'");	
	    $MV_emp = mysql_result($MV_empire,"MV_emp");
			
					if($maxvoteno != 0)
						{
						mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
						mysql_query("UPDATE user SET sl = \"yes\" WHERE ename = '$MV_emp' AND setid='$setid'");
						}
				
			
 			echo"<div align=center><font class=yellow>You have voted for $fename.</font></div><br>";
			include ("include/S_GOVT.php");		
			die();

		}
		else
			{
		
		 include("include/connect.php");

			//ENAME VOTED FOR
		$selename = mysql($dbnam, "SELECT ename FROM user WHERE userid = '$empvalue'");	
		$fename = mysql_result($selename,"fename");

			//SELECT SETID
		$SELECT_SETID = mysql($dbnam, "SELECT setid FROM user WHERE userid = '$empvalue'");	
		$SEL_SID = mysql_result($SELECT_SETID,"SEL_SID");


			if($SEL_SID != $setid)
				{echo"<div align=center><font class=yellow>This empire is not in your settlement.</font></div><br>";include ("include/S_GOVT.php"); die();
				}

			 include("include/connect.php");


			//SUBTRACT OLD VOTES FROM OLD EMPIRE
		$theoldempv = mysql($dbnam, "SELECT vote FROM user WHERE ename = \"$votefor\"");	
		$oldempv = mysql_result($theoldempv,"oldempv");
	 
			//ADD TO NEW EMPIRES VOTES
		$oldempirevotes = $oldempv - 1;
		mysql_query("UPDATE user SET vote = \"$oldempirevotes\" WHERE ename=\"$votefor\"");

		


			//SET VOTEFOR
		mysql_query("UPDATE user SET votefor =\"$fename\" WHERE email='$email' AND pw='$pw'"); 
			
			//SELECT VOTE WHERE EMPIRE SELECTED
		$selectedempvotes = mysql($dbnam, "SELECT vote FROM user WHERE ename = \"$fename\"");	
	    $selempvotes = mysql_result($selectedempvotes,"selempvotes");
	 
		$newvotecount = $selempvotes + 1;
			
			//SET VOTE +1 WHERE EMPIRE SELECTED
		mysql_query("UPDATE user SET vote = \"$newvotecount\" WHERE ename = \"$fename\"");
		 
			//SELECT MAX AMOUNT OF VOTES IN YOUR SET
		$themaxvote = mysql($dbnam, "SELECT max(vote) FROM user WHERE setid = '$setid'");	
		$maxvoteno = mysql_result($themaxvote,"maxvoteno");	

			//SELECT EMPIRE WITH MOST VOTES
		$MV_empire = mysql($dbnam, "SELECT ename FROM user WHERE setid = '$setid' AND vote='$maxvoteno'");	
	    $MV_emp = mysql_result($MV_empire,"MV_emp");
	
				if($maxvoteno != 0)
						{
						mysql_query("UPDATE user SET sl = \"no\" WHERE setid='$setid'");
						mysql_query("UPDATE user SET sl = \"yes\" WHERE ename = '$MV_emp' AND setid='$setid'");
						}
				



			
					echo"<div align=center><font class=yellow>You have voted for $fename.</font></div><br>";
					include("include/S_GOVT.php");
					die();
			
 				}
			
			}
?>	



		<? include("include/S_GOVT.php"); ?>


<!-- body ends here -->	
</TD>
</TR>
</TABLE>
</BODY>
</HTML>