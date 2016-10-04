<?php 

	$sAddress = "gaboratorium@gmail.com";
	$sSubject = "Sign-up conformation";
	$sMessage = "Please go to <a href='http://localhost/projects/keaproject/gabor/16-10-04-webdev/verification/home.php'>http://localhost/projects/keaproject/gabor/16-10-04-webdev/verification/home.php</a>";

	mail($sAddress, $sSubject, $sMessage);
 ?>