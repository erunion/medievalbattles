<?php

include("include/igtop.php");

echo "<br><br><br><br>";

//	select max amount of votes in your settlement
$_themaxvote = mysql_db_query($dbnam, "SELECT max(vote) FROM user WHERE setid='$setid'");	
	$_maxvoteno = mysql_result($_themaxvote, "_maxvoteno");	
//	select empire wtih most votes
$MV_empire = mysql_db_query($dbnam, "SELECT ename FROM user WHERE setid='$setid' AND vote='$_maxvoteno'");	
	$MV_emp = mysql_result($MV_empire, "MV_emp");
		
mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
if($_maxvoteno != 0)	{
	mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
	mysql_query("UPDATE user SET sl='yes' WHERE ename='$MV_emp' AND setid='$setid'");
}

echo "
<table border=1 bordercolor=#000000 align=center width=80%>
	<tr>
		<td colspan=6>
<form method=post action=govt.php>
			<center>";
 
if(!IsSet($change))	{

echo "
			<select name=empvalue>
				<option selected value=ns>-Select an Empire-</option>
					<option select value=NOemp>-None-</option>";

$query_string = "SELECT userid, ename FROM user WHERE setid='$setid' ORDER BY userid ASC";
$result_id = mysql_query($query_string, $var);
while ($row = mysql_fetch_row($result_id))	{
	echo "<option value=$row[0]>$row[1]\n</option>";
}


echo "
			</select><br><br>
			<input type=submit name=change value=Vote class=button>
			<input type=hidden name=change value=1>
			</center></td>";
}
else	{
	include("include/connect.php");

	//	select max amount of votes in your settlement
	$themaxvote = mysql_db_query($dbnam, "SELECT max(vote) FROM user WHERE setid='$setid'");	
		$maxvoteno = mysql_result($themaxvote, "maxvoteno");	

	if($empvalue == ns)	{
		echo"<div align=center><font class=yellow>You did not specify anyone to vote for.</font></div><br>"; 
		include("include/S_GOVT.php");
		die();
	}
	elseif($empvalue == NOemp)	{

		if($votefor == None)	 {
			echo"<font class=yellow><div align=center>You are not voting for anyone.</font></div><br>";
			include("include/S_GOVT.php");
			die();
		}
		else	{
			
			//	select votes from old empire
			$theoldempv = mysql_db_query($dbnam, "SELECT vote FROM user WHERE ename='$votefor'");	
				$oldempv = mysql_result($theoldempv, "oldempv");
	 
			//	subtract a vote form old empire and set votefor to none
			$oldempirevotes = $oldempv - 1;
			mysql_query("UPDATE user SET vote='$oldempirevotes' WHERE ename='$votefor'");
			mysql_query("UPDATE user SET votefor='None' WHERE ename='$ename'");

			//	select max amount of votes in your set
			$_themaxvote = mysql_db_query($dbnam, "SELECT max(vote) FROM user WHERE setid='$setid'");	
				$_maxvoteno = mysql_result($_themaxvote, "_maxvoteno");	

			//	select empire with most votes
			$MV_empire = mysql_db_query($dbnam, "SELECT ename FROM user WHERE setid='$setid' AND vote='_$maxvoteno'");	
	    		$MV_emp = mysql_result($MV_empire, "MV_emp");
		
			mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
			if($_maxvoteno != 0)	{
				mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
				mysql_query("UPDATE user SET sl='yes' WHERE ename='$MV_emp' AND setid='$setid'");
			}
		
			echo"<div align=center><font class=yellow>You are now voting for no one.</font></div><br>";
			include ("include/S_GOVT.php"); 
			die();
		}
	}
	elseif($votefor == None)	{ 
		
		//	ename just voted for
		$selename = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid='$empvalue'");	
			$fename = mysql_result($selename, "fename");
			
		//	select setid
		$SELECT_SETID = mysql_db_query($dbnam, "SELECT setid FROM user WHERE userid='$empvalue'");	
			$SEL_SID = mysql_result($SELECT_SETID, "SEL_SID");

		if($SEL_SID != $setid)	{
			echo"<div align=center><font class=yellow>This empire is not in your settlement.</font></div>";
			include("include/S_GOVT.php"); 
			die();
		}
			
		//	set your votefor to empire voted for
		mysql_query("UPDATE user SET votefor='$fename' WHERE email='$email' AND pw='$pw'"); 
			
		//	select vote count for empire you voted for
		$selectedempvotes = mysql_db_query($dbnam, "SELECT vote FROM user WHERE userid='$empvalue'");	
			$selempvotes = mysql_result($selectedempvotes, "selempvotes");
	 	
		//	new vote count for empire voted for
		$newvotecount = $selempvotes + 1;
			
		//	set  number of votes for empire you voted for
		mysql_query("UPDATE user SET vote='$newvotecount' WHERE userid='$empvalue'");
		 
		//	select max amount of votes in your settlement
		$themaxvote = mysql_db_query($dbnam, "SELECT max(vote) FROM user WHERE setid='$setid'");	
			$maxvoteno = mysql_result($themaxvote, "maxvoteno");	

		//	select empire with most votes
		$MV_empire = mysql_db_query($dbnam, "SELECT ename FROM user WHERE setid='$setid' AND vote='$maxvoteno'");	
			$MV_emp = mysql_result($MV_empire, "MV_emp");
			
		if($maxvoteno != 0)	{
			mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
			mysql_query("UPDATE user SET sl='yes' WHERE ename = '$MV_emp' AND setid='$setid'");
		}
				
		echo"<div align=center><font class=yellow>You have voted for $fename.</font></div><br>";
		include ("include/S_GOVT.php");		
		die();
	}
	else	{
		
		//	ename voted for
		$selename = mysql_db_query($dbnam, "SELECT ename FROM user WHERE userid='$empvalue'");	
			$fename = mysql_result($selename, "fename");

		//	select setid
		$SELECT_SETID = mysql_db_query($dbnam, "SELECT setid FROM user WHERE userid='$empvalue'");	
			$SEL_SID = mysql_result($SELECT_SETID, "SEL_SID");

		if($SEL_SID != $setid)	{
			echo"<div align=center><font class=yellow>This empire is not in your settlement.</font></div><br>";
			include("include/S_GOVT.php"); 
			die();
		}

		//	subtract old votes from old empire
		$theoldempv = mysql_db_query($dbnam, "SELECT vote FROM user WHERE ename='$votefor'");	
			$oldempv = mysql_result($theoldempv, "oldempv");
	 
		//	add to new empires votes
		$oldempirevotes = $oldempv - 1;
		mysql_query("UPDATE user SET vote='$oldempirevotes' WHERE ename='$votefor'");

		//	set votefor
		mysql_query("UPDATE user SET votefor='$fename' WHERE email='$email' AND pw='$pw'"); 
			
		//	select vote where empire selected
		$selectedempvotes = mysql_db_query($dbnam, "SELECT vote FROM user WHERE ename='$fename'");	
			$selempvotes = mysql_result($selectedempvotes,"selempvotes");
	 
		$newvotecount = $selempvotes + 1;
			
		//	set vote+1 where empire selected
		mysql_query("UPDATE user SET vote='$newvotecount' WHERE ename='$fename'");
		 
		//	select max amount of votes in your set
		$themaxvote = mysql_db_query($dbnam, "SELECT max(vote) FROM user WHERE setid='$setid'");	
			$maxvoteno = mysql_result($themaxvote, "maxvoteno");	

		//	select empire with most votes
		$MV_empire = mysql_db_query($dbnam, "SELECT ename FROM user WHERE setid='$setid' AND vote='$maxvoteno'");	
			$MV_emp = mysql_result($MV_empire, "MV_emp");
	
		if($maxvoteno != 0)	{
			mysql_query("UPDATE user SET sl='no' WHERE setid='$setid'");
			mysql_query("UPDATE user SET sl='yes' WHERE ename='$MV_emp' AND setid='$setid'");
		}
				
		echo"<div align=center><font class=yellow>You have voted for $fename.</font></div><br>";
		include("include/S_GOVT.php");
		die();
	}
}

include("include/S_GOVT.php"); 

?>

</td>
</tr>
</table>
</body>
</html>