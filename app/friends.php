<?PHP

include("include/igtop.php");
echo "<CENTER>\n";


switch ($action) {
	case "add":
		echo "
		Note: If you do not enter the name of a Medieval Battles empire,<BR>
		nothing will show up on your friends list.<BR><BR>
		<FORM action=\"friends.php\" method=\"post\">
			<INPUT type=\"hidden\" name=\"action\" value=\"add2\">
			Empire name: <INPUT type=\"text\" name=\"fn_ename\"><BR><BR>
			<INPUT type=\"submit\" value=\"Add friend\">
		</FORM>
		";
	break;

	case "add2":
		//$fn_ename = trim($fn_ename);
		//if (!$fn_ename || $fn_ename = '') {die("You must enter the empire's name you wish to add.");};
		$query = "INSERT INTO friends (useremail, friendename) values ('$email', '$fn_ename')";
		mysql_db_query($dbnam, $query, $var) or die("Error: Unable to add friend.<BR><BR>" . mysql_error());
		echo "Friend <B>$fn_ename</B> added succesfully.<BR><A href=\"friends.php\">Click here to return.</A>";
	break;

	case "delete":
		$query = "DELETE FROM friends WHERE useremail = '$email' AND friendename = '$fd_ename'";
		mysql_db_query($dbnam, $query, $var) or die("Error: Unable to delete friend.<BR><BR>" . mysql_error());
		echo "Friend <B>$fd_ename</B> was removed from your friends list.<BR><A href=\"friends.php\">Click here to return.</A>";
	break;

	default:
		echo "<a href=\"friends.php?action=add\"><B>Add new friend</B></a><BR><BR><BR>";
		$query = "SELECT u.userid, u.ename, u.setid, u.online FROM user u LEFT JOIN friends f ON u.ename = f.friendename WHERE f.useremail = '$email' ORDER BY u.online";
		$result = mysql_db_query($dbnam, $query, $var) or die("Error: Unable to retrieve list of friends.<BR><BR>" . mysql_error() . "<BR><BR>");
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
			[$f_setid] (<A href=\"friends.php?action=delete&fd_ename=$f_ename\">delete</A>)<BR>";
		};
		break;
};

echo "</CENTER>";

?>