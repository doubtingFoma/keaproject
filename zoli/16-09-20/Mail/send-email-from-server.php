<?php

	$toEmail = $_GET['toEmail']; //Get the email address
	$subject = $_GET['subject']; //get the subject
	$comments = $_GET['comments']; //get the comments
  $headers = $_GET['headers'];

  //create a simple response message
  echo "The email is: " . $toEmail . " subject is: " . $subject. " comments are: " . $comments;
  echo "<br>";
  //send email
  if ( mail($toEmail, $subject, $comments, $headers) ) {
    echo "Mail sent";
  } else {
    echo "Mail error";
  }

?>
