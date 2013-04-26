<?
include("include/act_igtop.php");

$subject = "Account Activation Code";
$body = "
Welcome to Medieval Battles! Before you can do anything with your account, you must activate it first. To actiavte your account, click this link.

http://www.medievalbattles.com/activate_account.php?activate=true&act_userid=$userid&act_code=$code

If you do not activate your account upon 24 hours of signing up, your account will be deleted.";

$from = "From: support@medievalbattles.com\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
$mailsend = mail("$email","$subject","$body","$from");

echo"<div align=center><font class=yellow size=2px><b>Your account activation code has been resent to the email you provided upon sign up.</b></font></div>";	

echo "
</td>
</tr>
</table>
</body>
</html>";
?>