<?php 

	// Email sender API

	$email = $_GET['to'];
	$subject = $_GET['subject'];
	$content = $_GET['content'];

	if ( mail($toEmail, $subject, $comments) ){
		// success
	}else{
		// fail
	}
 ?>