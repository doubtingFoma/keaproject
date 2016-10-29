<?php
	$toEmail 	= urlencode ( "toEmail@address.com" );
	$subject 	= urlencode ( "Hi, can you help me ?");
	$comments = urlencode ( "My internet doesn't work" );

	$sFinalLink = "http://YOUR_DOMAIN/send-email-from-server.php?toEmail=$toEmail&subject=$subject&comments=$comments";

	echo file_get_contents($sFinalLink);
?>
