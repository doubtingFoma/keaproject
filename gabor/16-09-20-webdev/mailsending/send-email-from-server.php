<?php

	$toEmail = $_GET['toEmail'];
	$subject = $_GET['subject'];
	$comments = $_GET['comments'];

	if ( mail($toEmail, $subject, $comments) ){
		echo "YES";
	}else{
		echo "NO";
	}

?>