<?
/*$settleID = 1;

While($settleID  <= 40)
{
	include("include/connect.php");
	$tablename = "user"
//$query_string = "SELECT count(ename) FROM user WHERE setid='$settleID'";

	$query_string = "SELECT gname, mem, strength FROM guild ORDER BY strength DESC LIMIT 0,10";
	$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

				echo"$row[0], $row[1]";

				
	$settleID = $settleID + 1;
				
				
		    }		
}*/	
?>
	
<?php
/*
	include("include/connect.php");
	$tablename = "user";



		$query_string = "SELECT ename FROM user ";
		$result_id = mysql_query($query_string, $var);
		while ($row = mysql_fetch_row($result_id))
		    {

		

				

					 $placeno = $placeno + 1;

		    	print("<TR ALIGN=center VALIGN=TOP colspan=7>
				<td bgcolor=#404040>$placeno</td>
				<td bgcolor=#404040 align=left>$row[0]</td>
				<td bgcolor=#404040>$row[1]</td>
				<td bgcolor=#404040>$row[2]</td><br><br>
			
												");
				
		    }

*/
	include("include/connect.php");


	//WHERE setid >= $from AND setid < $to or something, then use mysql_fetch_array() ?


/*
$query = "SELECT count(ename) FROM user WHERE setid >= 1 AND setid < 40";
$result = mysql_query($query); 
$ret = mysql_fetch_array($result); 
print $ret[0]; */


/*$query = "SELECT count(ename) FROM user WHERE setid='1'";
$result = mysql_query($query); 
$ret = mysql_fetch_array($result); 
print $ret[0];*/

/*
	$query = "SELECT ename FROM user";
	$result = mysql_query($query);
	$data = array();
	while($row = @mysql_fetch_assoc($result))
	$data[] = $row; 
	print $data[2]['ename'];

*/

/*While($ret[0] != 5 AND 
$snum = rand(1, 40);
*/
/*
$query = "SELECT count(ename) FROM user WHERE setid='1'";
$result = mysql_query($query); 
$ret = mysql_fetch_array($result); 
print $ret[0]; */


$SeL_LastSet = mysql($dbnam, "SELECT lastset FROM Game_Info");
$Last_Set = mysql_result($SeL_LastSet,"Last_Set");


$SeL_LastSet = mysql($dbnam, "SELECT lastset FROM Game_Info");
	$Last_Set = mysql_result($SeL_LastSet,"Last_Set");

	$snum = $Last_Set + 1;

	$query = "SELECT count(ename) FROM user WHERE setid='$snum'";
	$result = mysql_query($query); 
	$ret = mysql_fetch_array($result);

	

	If($ret[0] == 5)
		{
			While($ret[0] == 5)
				{
					$snum = rand(1,40);

					$query = "SELECT count(ename) FROM user WHERE setid='$snum'";
					$result = mysql_query($query); 
					$ret = mysql_fetch_array($result);

				}	

		}



?>