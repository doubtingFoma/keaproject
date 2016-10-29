<?php 
	session_start();
	
	if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
		$requestedUser = $_POST['userName'];
		$requestedPassword = $_POST['userPassword'];
		if ($requestedUser == "gabor" && $requestedPassword == "1234") {
			// Set session
			$_SESSION['userId'] = "gabor";

			// Send conf mail from API
			// file_get_contents("email-sender.php?to=gaboratorium@gmail.com&subject=Login&content=You have logged in succesfully");
			
			// Send conf mail from here
			if (mail("gaboratorium@gmail.com", "Login", "You have logged in.")) {
				echo "E-mail has been sent";
			} else {
				echo "E-mail has been not sent";
			}
			
		}
	}
	
	header('Location: ../index.php');

?>