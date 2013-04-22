<?PHP

$query = "SELECT u.userid, u.ename, u.setid, u.online FROM user u LEFT JOIN friends f ON u.ename = f.friendename WHERE f.useremail = '$email' AND u.online = '1' ORDER BY u.online";
$result = mysql_db_query($dbnam, $query, $var) or die("Error: Unable to retrieve list of friends.<BR><BR>" . mysql_error() . "<BR><BR>");

if (!mysql_num_rows) {
	echo "You have no friends online.<BR><BR>";
} else {
	echo "Your online friends:<BR><BR>"
while ($myrow = mysql_fetch_array($result)) {
	$f_ename = $myrow["ename"];
	$f_online = $myrow["online"];
	$f_setid = $myrow["setid"];
	$f_userid = $myrow["userid"];

	if ($f_online == 1) {
		echo "<FONT color=\"red\">*</FONT>";
	} else {
		echo "&nbsp;";
	};
			
	echo "<A href=\"messaging.php?value=$f_userid&snum=$f_setid&setchg=1\">$f_ename</A>
	[$f_setid]<BR>";
};

?>