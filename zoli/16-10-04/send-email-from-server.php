<?php
	//creating an email
	$toEmail = 'fraknoiz@gmail.com';
	$subject = 'ACTIVATE YOUR ACCOUNT';
	$comments = 'http://localhost/04-TUE-OCT/verify.php?verification-key=A1B2C3';

	//sending an email
 	mail($toEmail, $subject, $comments);
 	echo "YES";


?>
