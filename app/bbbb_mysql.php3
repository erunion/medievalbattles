<?php

/*

version 1.37  -- mysql wrapper STABLE

*/




function db_connect($user, $passwd) {

	global $sHostname;
	
	$retval = @mysql_connect($sHostname, $user, $passwd);
	return $retval;

}



function db_query($query) {

	global $sDB;

	$retval = @mysql($sDB, $query);
	return $retval;
}



function db_countrows($query) {

	$retval = @mysql_numrows($query);
	return $retval;
}


function db_fetchrow($query) {

	$retval = @mysql_fetch_array($query);
	return $retval;
}



function db_fetchcell($query, $row, $cellname) {

	$retval = @mysql_result($query, $row, $cellname);
	return $retval;
}



function db_lock($table) {
	
	global $sDB;

	@mysql($sDB, "Lock Tables $table Write");  
}


function db_unlock($table) {
        
        global $sDB;
        	
	@mysql($sDB, "Unlock Tables");
}	





/* ------ queries --------- */

/* common sql*/

function dbq_del($table, $val, $a) {

	return "Delete from $table where $a = $val";
}


function dbq_del2($table, $val, $a, $val2, $a2) {

	return "Delete from $table where $a = $val and $a2 = $val2";
}


function dbq_sel($table, $val, $a) {

	return "Select * from $table where $a = $val";
}


function dbq_sel2($table, $val, $a, $val2, $a2) {

	return "Select * from $table where $a = $val and $a2 = $val2";
}


function dbq_sela($table) {

	return "Select * from $table";
}




/* generic */

function dbq1($table, $val) { 
	return "Select * from $table Having body regexp '$val'";
}


function dbq2($table, $val, $anonymous) {
	return "Update $table Set name = '$anonymous', body ='[...]', host ='', email = '' where id = $val";	
}
      

function dbq4($table, $lastitem, $DisplayRowsAtOnce) {
	if ($DisplayRowsAtOnce) {
		if (!$lastitem) {$lastitem = 0;}
	$limit = "limit $lastitem, $DisplayRowsAtOnce";
	}
	else {$limit = "";}

	return "Select * from $table Order by pos $limit";
}


function dbq5($table, $val) {
	return "Select distinct max(datestamp) as datestamp, thread from $table where datestamp < '$val' Group by thread";
}


function dbq6($table, $val) {	
	return mysql_insert_id();
}


function dbq7($table, $a1, $a2, $a3, $val1, $val2, $val3) {	
	return "Insert Into $table ($a1, $a2, $a3) values ('$val1', $val2, '$val3')";
}


function dbq8($table, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10) {
	return "Insert Into $table ( $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10) values ('$val1', '$val2', '$val3', '$val4', $val5, '$val6', $val7, $val8, $val9, $val10)";
}


function dbq9($table, $a1, $a2, $a3, $a4, $val1, $val2, $val3, $val4) {
	return "Select * from $table where $a1 = '$val1' and $a2 = '$val2' and $a3 = '$val3' and $a4 = '$val4'";
}


function dbq10($table, $val1, $val2, $val3) {
	return "select * from $table where thread = $val1 and pos > $val2 and depth <= $val3 order by pos";
}

function dbq11($table) {
	return "select * from $table order by thread desc";
}


function dbq12($table) {
	return "Update $table Set pos = pos+1 where thread > 0";
}


function dbq13($table, $val) {
	return "Update $table Set pos = pos+1 where thread < $val";
}


function dbq14($table, $val1, $val2) {
	return "Update $table Set pos = pos+1 where thread = $val1 and pos >= $val2";
}


function dbq15($table, $val) {
	return "select * from $table where thread = $val order by pos desc";
}

function dbq16($table, $val) {
	return "select * from $table where thread = $val order by pos";
}


function dbq17($table, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10, $val11){
	return "Replace Into $table (name, email, topic, body, thread, host, datestamp, depth, childof, pos, id) values ('$val1', '$val2', '$val3', '$val4', $val5, '$val6', '$val7', $val8, $val9, $val10, $val11)";
}


function dbq18($table, $val) {
	return "Update $table Set thread = thread-1 where thread > $val";
}


function dbq19($table, $val) {
	return "Update $table Set pos = pos-1 where pos > $val";
}


/*---------  end --------------*/
?>
