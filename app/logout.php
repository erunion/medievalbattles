<?

include("include/connect.php");

session_register('email');
session_register('pw');

mysql_query("UPDATE user SET online='0' WHERE email='$email' AND pw='$pw'");

session_unset('email');
session_unset('pw');

echo "You have successfully logged out. <a href=index.php>Click here</a> to log back in.";

?>