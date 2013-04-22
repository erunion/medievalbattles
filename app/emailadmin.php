<?

if($emailadmin)	 {

	if($contact == ns)	{
		echo "If you want to email one of us, you need to select one of our names.";
		die();
	}
	else	{
		if($contact == "Mako")	{	$email = "mako@medievalbattles.com";	 }
		elseif($contact == "Shredder")	{	$email = "shredder@medievalbattles.com";	}
		elseif($contact == "Cyrus")	{	$email = "cyrus@medievalbattles.com";	}
		
		$subject = "Message Sent Via Contact Form On MB";

		$from = "From: $sendemail\r\nbcc: phb@sendhost\r\nContent-type: text/plain\r\nX-mailer: PHP/" . phpversion();
		$mailsend = mail("$email", "$subject", "$body", "$from");
	
		echo "Your email has been sent";
	}
}
else	{
	echo "If you want to send one of us an email, <a href=index.php?contact=yes>go here</a>";
	die();
}

?>