<?php

function callback($buffer) {
  return (ereg_replace("nothing", "nothing", $buffer));
}
ob_start("callback");


if(($username == "mako") AND ($pw == "quickshot"))	{
	echo "<a href=main.php>You may continue.</a>";
	die();

}
else	{
	echo "Get away!";
	die();
}

// close buffer
ob_end_flush();

?>
