<?php

 

 
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start('login');
// Unset all of the session variables.
session_unset('email');
session_unset('pw');
// Finally, destroy the session.
session_destroy('login');

 $login = 0;
?>



<html>
<body>
 <a href="mblogin.php">Return to the Login Page</a>
</body>
</html>

