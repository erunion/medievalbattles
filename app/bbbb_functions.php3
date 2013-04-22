<?php
/* 
Version 1.37
*/

mysql_connect(localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com);
$dbnam = "medievalbattles_com";
$uforumname = mysql($dbnam, "SELECT ename FROM user WHERE email = '$email' AND pw = '$pw'");
$forumname = mysql_result($uforumname,"ename");

/*****  strip extended chars, verify email, chop overlong bodies *****/

function charparse($forumname, $email, $topic, $body) {

	global $Anonymous, $NoTopic, $IsTooBig;
		
	if (strlen($topic) < 2) { $topic = $NoTopic; }
	
	$forumname = htmlspecialchars($forumname);
	$forumname = ereg_replace("'", "&#039;", $forumname);	

	if (!ereg(".+@.+\\..+", $email)) { $email = ""; }
	else {
		$email = htmlspecialchars($email);
		$email = ereg_replace("'", "", $email);
	}

	$topic = htmlspecialchars($topic);
	$topic = ereg_replace("'", "&#039;", $topic);
		
	if ($IsTooBig && (strlen($body) > $IsTooBig)) {
		$body = substr($body, 1, $IsTooBig) . "[...]";
	}

	$body = nl2br(htmlspecialchars($body));
	$body = ereg_replace("'", "&#039;", $body);

	$retval = array($forumname, $email, $topic, $body);
	return $retval;

}




/*****  delete inactive threads    *****/

function deleteoldthreads() {

	global $sTable, $IsOldPeriod;
	
	if ($IsOldPeriod) {
		$isoldthreshold = (time() - 86400 * $IsOldPeriod);

		$query = dbq5($sTable, $isoldthreshold);
		$Result = db_query($query);
		$nRows = db_countrows($Result);
		
		for ($i = 0; $i < $nRows; $i++) {
			$arr = db_fetchrow($Result);
			$query = dbq_del($sTable, $arr[thread], "thread");
			db_query($query);
		}
	}
}




/*****  notify email recipients / add new recipients  *****/
                      
function emailnotice($topic, $forumname, $email, $depth, $thread, $emailnotice, $hostaddress, $id) {

	global $emailTable, $sTable, $AllowNukeing, $AllowEmailNotice, $EmailFromText,
	       $EmailFromAddr, $MyURL;

		
	if ($depth != 1 && $AllowEmailNotice) {
		$query = dbq_sel($emailTable, $thread, "thread");
		$Result = db_query($query);
		$nRows = db_countrows($Result);

		for ($i = 0; $i < $nRows; $i++) {			
			$a = db_fetchrow($Result);
			$passwd = $a[passwd];
			$parsed_email = urlencode($a[email]);

			include("bbbb-emailtext.php3");
			mail($a[email], $EmailFromText, $EmailnoticeText, "From: ".$EmailFromAddr);
		}
	}
	
	$passwd = gmdate("Ym", time()) . substr((uniqid(0)), 9, 4);
	
	if ($email) {
		include("bbbb-emailtext.php3");
		if ($emailnotice && $AllowEmailNotice) {
			$query = dbq7($emailTable, "email", "thread", "passwd", $email, $thread, $passwd);
			db_query($query);
		}
		if ($AllowNukeing) {
			mail($email, $EmailFromText, $EmailnukeingText, "From: ".$EmailFromAddr);
			$query = dbq7($emailTable, "email", "thread", "passwd", $hostaddress, 0, $passwd);
			db_query($query);
		}
	}		
}




/******* get search result table  *********/

function findresult($question) {

	global $sTable, $DisplayFrontText2, $NewThreadHeaderText; 

	$text = $DisplayFrontText2;
	$head = $NewThreadHeaderText;

	$query = dbq1($sTable, $question);
	$Result = db_query($query);
	$nRows = db_countrows($Result);

	$retval = array($nRows, $Result, $text, $head);
	return $retval;

}




/*****  get poster's hostname  *****/

function gethostname() {

	$hostaddress = getenv('REMOTE_ADDR');
	if (!$hostaddress) { $hostaddress = getenv('REMOTE_HOST'); }
	$hostaddress = @GetHostByAddr($hostaddress);

	return $hostaddress;
}




/**** insert posted msg  ******/
			
function insertpost($forumname, $emailnotice, $topic, $body, $childof, $thread) {

	global $sTable, $DisplayFrontText1, $NewThreadHeaderText;

	list($forumname, $email, $topic, $body) = charparse($forumname, $email, $topic, $body);

	$hostaddress = gethostname(); 
	$datestamp = time();
	$text = $DisplayFrontText1;
	$head = $NewThreadHeaderText;

	$oldid = noreload($forumname, $topic, $body, $hostaddress, $datestamp);

	if (!$oldid) {
		db_lock($sTable);  /* mysql doesn´t really need this...*/
		
		$thread = recalcpossimple($thread);

		list($depth, $pos) = recalcposthread($thread, $childof);

		$query = dbq8($sTable, "name", "email", "topic", "body", "thread", "host", "datestamp", "depth", "childof", "pos",
		                        $forumname, $email, $topic, $body, $thread, $hostaddress, $datestamp, $depth, $childof, $pos);
		$Result = db_query($query);
		$nRows = db_countrows($Result);
		$id = dbq6($sTable, $datestamp);
		
		db_unlock($sTable);

		emailnotice($topic, $forumname, $email, $depth, $thread, $emailnotice, $hostaddress, $id);
		if ($depth == 1) { deleteoldthreads(); }
	}
	else {$id = $oldid;}
	
	$retval = array($id, $text, $head);
	return $retval;
}




/*****  determine if article is 'new'  *****/

function isitnew($rowdate) {

	global $IsNewMarker, $IsNewPeriod;

	$isnewthreshold = (time() - 86400 * $IsNewPeriod);
	if ($rowdate < $isnewthreshold) { $marker = "&nbsp;&nbsp;"; }
	else { $marker = $IsNewMarker; }

	return $marker;
}




/********** choose language  ***********/

function language() {
	
	global $DetectLanguage, $DefaultLanguage, $AvailableLanguages;
	
	$languagefile = "bbbb_lang_".$DefaultLanguage.".php3";
	
	if ($DetectLanguage) {
		$language = substr(getenv('HTTP_ACCEPT_LANGUAGE'), 0, 2);
		$available = explode(",", $AvailableLanguages);
		for ($i = 0; $i < count($available); $i++) {
			if ($language == $available[$i]) {
				$languagefile = "bbbb_lang_".$language.".php3";
				break;
			}
		}
	}

	return $languagefile;
}




/*****  assemble matching navigation bars  *****/

function navbar($currpos, $thisthread, $type) {

	global $sTable, $UpIndex, $NextThread, $PrevThread, $NextMessage, $PrevMessage,
               $DisplayRowsAtOnce, $OlderMessages, $NewerMessages,  $PHP_SELF;

	if ($type == "read") {
		$pr_art = $currpos-1;
		$ne_art = $currpos+1;
		$query = dbq_sel2($sTable, $ne_art, "pos", $thisthread, "thread");
		$Result = db_query($query);
		$nextid = db_fetchcell($Result, 0, "id");
		$query = dbq_sel2($sTable, $pr_art, "pos", $thisthread, "thread");
		$Result = db_query($query);
		$previd = db_fetchcell($Result, 0, "id");
		
		$Previd = "";
		$Prevth = "";

		if ($previd) { $Previd = "<a href=\"$PHP_SELF?request=$previd\">[$PrevMessage]</a>"; }
		if ($nextid) { $Nextid = "<a href=\"$PHP_SELF?request=$nextid\">[$NextMessage]</a>"; }
		
		$ne_thr = $thisthread - 1;
		$pr_thr = $thisthread + 1;
		$query =  dbq_sel2($sTable, $ne_thr, "thread", 1, "depth");
		$Result = db_query($query);
		$nextth = db_fetchcell($Result, 0, "id");
		$query = dbq_sel2($sTable, $pr_thr, "thread", 1, "depth");
		$Result = db_query($query);
		$prevth = db_fetchcell($Result, 0, "id");
		
		$Nextth = "";
		$Prevth = "";

		if ($nextth) { $Nextth = "<a href=\"$PHP_SELF?request=$nextth\">[$NextThread]</a>"; }
		if ($prevth) { $Prevth = "<a href=\"$PHP_SELF?request=$prevth\">[$PrevThread]</a>"; }
		
		$NavBar = "$Prevth&nbsp;$Previd&nbsp;[<a href=\"$PHP_SELF\">$UpIndex</a>]&nbsp;$Nextid&nbsp;$Nextth<br><br>";
	}
	elseif ($type == "find") { $NavBar = "[<a href=\"$PHP_SELF\">$UpIndex</a>]<br><br>"; }
	elseif (($type = "index") && ($DisplayRowsAtOnce != 0)) {
		$last_older = $currpos - $DisplayRowsAtOnce;
		$last_newer = $currpos + $DisplayRowsAtOnce;

		if ($last_older < 0) {$last_older = "";}
		else {$last_older = "[<a href=\"$PHP_SELF?last=$last_older\">$NewerMessages</a>]&nbsp;";}

		$query = dbq_sela($sTable);
		$Result = db_query($query);
		$nRows = db_countrows($Result);

		if ($nRows > $last_newer) { $last_newer = "[<a href=\"$PHP_SELF?last=$last_newer\">$OlderMessages</a>]"; }
		else {$last_newer = "";}

		$NavBar = $last_older . $last_newer;
		
	}
	elseif ($type == "index" && ($DisplayRowsAtOnce == 0)) { $NavBar = ""; }

	return $NavBar;		
}




/***** prevent accidental double messages with ´Reload´ ******/

function noreload($forumname, $topic, $body, $hostaddress, $datestamp) {

	global $sTable;
	
	$query = dbq9($sTable, "host", "topic", "name", "body", $hostaddress, $topic, $forumname, $body);
	$Result = db_query($query);
	$prevdate = db_fetchcell($Result, 0, "datestamp");
	$pr_id = db_fetchcell($Result, 0, "id");

	if (($datestamp - $prevdate) < 180) { return $pr_id; }
	else { return 0; }
}




/*****  user deletes own message or subscription *****/

function nukemessage($request, $ident, $passquery) {
		
	global $sTable, $emailTable, $Anonymous;
	
	$ident = urldecode($ident);
	$query = dbq_sel2($emailTable, "'$passquery'", "passwd", "'$ident'", "email");
	$Result = db_query($query);
	$nRows = db_countrows($Result);
	
	if ($nRows) {
		$query = dbq2($sTable, $request, $Anonymous);
		db_query($query);

		$query = dbq_del2($emailTable, "'$passquery'", "passwd", "'$ident'", "email");
		db_query($query);
	}
	else {echo "<h1>Unauthorized</h1>";}

	return $request;		
}




/*****  re-allow some html  *****/

function parsehtml($body)  {

	global $AllowHTML;
	
	if($AllowHTML) {
		$item = explode(",", $AllowHTML);

		for ($i = 0; $i < (count($item)); $i++) {
			$item_old = $item[$i];
			$item_old = ereg_replace(">", "&gt;", $item_old);
			$item_old = ereg_replace("<", "&lt;", $item_old);
			$item_old = ereg_replace('"', "&quot;", $item_old);
			$body = eregi_replace($item_old, $item[$i], $body);
		}
	}

	return $body;
}




/*****  retrieve values for read display  *****/

function readdisplay($request) {

	global $sTable, $TimestringFormat, $OffsetGMT, $NoEmailSpam;

	$query =  dbq_sel($sTable, $request, "id");
	$Result = db_query($query);
	$a = db_fetchrow($Result);

	$a[topic] = substr($a[topic], 0, 50);
	$a[date] = gmdate($TimestringFormat, ($a[datestamp] + 3600 * ($OffsetGMT)));	
	$a[name] = substr($a[name], 0, 25);
	$a[revalue] = "Re: ".(eregi_replace("Re: ", "", $a[topic]));
	$a[body] = parsehtml($a[body]);

	if ($NoEmailSpam == 1 && $a[email]) {$a[email] = $a[email] . ".REMOVEME!";}
	
	return $a;
}




/**** calculate positioning and reshuffle this thread ****/


function  recalcposthread($thread, $momsid) {
	
	global $sTable;
		
	if ($momsid == 0) { 
		$depth = 1;
		$pos = 1;
	}
	else {	
		$query = dbq_sel($sTable, $momsid, "id");
		$Result = db_query($query);
		$tmp = db_fetchrow($Result);
		
		$depth = $tmp[depth] + 1;
		 
		$query = dbq10($sTable, $thread, $tmp[pos], $tmp[depth]);
		$Result = db_query($query);
		$pos = db_fetchcell($Result, 0, "pos");
		
		if ($pos) {     /* not the last in thread */
			$query = dbq14($sTable, $thread, $pos);
			$Result = db_query($query);
		}
		else {         /* last in thread */
			$query = dbq15($sTable, $thread);
			$Result = db_query($query);
			$pos = db_fetchcell($Result, 0, "pos") + 1;
		}


	}	

	$retval = array($depth, $pos);
	return $retval;
}




/*****  reshuffle display positioning (thread simple)  *****/

function recalcpossimple($thread) {

	global  $sTable, $sDB;

	if ($thread == "0") {
		$query = dbq11($sTable);
		$Result = db_query($query);
		$thread = db_fetchcell($Result, 0, "thread") + 1;

		$query = dbq12($sTable);
	
	}
	else {$query = dbq13($sTable, $thread);}
		
	db_query($query);

	return $thread;
}



/*****  reshuffle display positioning   *****/

function recalcposinthread($thread) {
	
	global  $sTable;

	if (Sthread == "0") {$query = dbq12($sTable);}	
	else {$query = dbq13($sTable, $thread);}
	
	db_query($query);
}




/*****  trim and adapt table rows  *****/

function showtablerow($a) {

	global $TimestringFormat, $OffsetGMT, $NoEmailSpam, $IsEmailMarker;
	
	$a[topic] = substr($a[topic], 0, 50);
	$a[date] = gmdate($TimestringFormat, ($a[datestamp] + 3600 * ($OffsetGMT)));	
	$a[name] = substr($a[name], 0, 25);
	if ($NoEmailSpam == 1) {$a[email] = $a[email] . ".REMOVEME!";}
	if (strstr($a[email], "@")) {
		$a[em_pre] = "<a href=\"mailto: $a[email]\">";
		$a[em_suf] = $IsEmailMarker . "</a>&nbsp;";
	}
	  	
	return $a;
}




function showthread($thisthread) {
	
	global $sTable, $DisplayFrontText0, $ReplyHeaderText;

		$text = $DisplayFrontText0;
		$head = $ReplyHeaderText;

		$query = dbq16($sTable, $thisthread);
		$Result = db_query($query);
		$nRows = db_countrows($Result);
		
		$retval = array($nRows, $Result, $text, $head);
		return $retval;
}



/******  show table  ****/

function showwholetable($lastitem) {

	global $sTable, $DisplayRowsAtOnce, $DisplayFrontText1,$NewThreadHeaderText; 
		
	 $text = $DisplayFrontText1;
	 $head = $NewThreadHeaderText;

	 $query = dbq4($sTable, $lastitem, $DisplayRowsAtOnce);
	 $Result = db_query($query);
	 $nRows = db_countrows($Result);
	 
	 $retval = array($nRows, $Result, $text, $head);
	 return $retval;
}




/*****  get display row background color  *****/

function whichcolor($row)  {

	global $ThreadColor1, $ThreadColor2;

	if ($row % 2) { $Color = $ThreadColor1; }
	else { $Color = $ThreadColor2; }

	return $Color;
}



/*****  assembly of indent depth  *****/

function  whichindent($depth) {

	$pic = "";
	for ($i = 1; $i < $depth; $i++) {$pic = $pic . "&nbsp;&nbsp;";}

	return $pic;
}

          


/****   nuke message or subscription? *****/

function whichnukequestion($req) {

	global $NukeMessage, $NukeSubscription;
	
	if ($req) { $question = $NukeMessage; }
	else { $question = $NukeSubscription; }

	return $question;
}	
	


/****** get the database wrapper file ******/

function whichdb() {

	global $Databasetype;
	
	$dbfile = "bbbb-" . $Databasetype .".php3";

	return $dbfile;
}


/*-------- end -----------*/

?>
