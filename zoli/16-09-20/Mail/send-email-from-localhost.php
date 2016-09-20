
<?php
	//the receiver's email address
	$toEmail = "fraknoiz@gmail.com";
	//convert the email to a url friendly text
	$toEmail = urlencode($toEmail);

	$subject = "Hi, can you help me?";
	//convert the subject to a url friendly text (eg: spaces)
	$subject = urlencode($subject);

	$comments = "My internet doesn't work";
	//convert the comments to a url friendly text (eg: spaces)
	$comments = urlencode($comments);

	$headers =  'MIME-Version: 1.0' . "\r\n";
	$headers .= 'From: Your name <info@address.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers = urlencode($headers);
	
	//create the final link
	// $sFinalLink = "http://ecuanota.com/2016-fall-web-dev/send-email-from-server.php?toEmail=$toEmail&subject=$subject&comments=$comments";
	$sFinalLink = "http://localhost:1000/16-09-20/Mail/send-email-from-server.php?toEmail=$toEmail&subject=$subject&comments=$comments&headers=$headers";

	//open the link and write the data we got back to the DOM
	echo file_get_contents($sFinalLink);
?>
