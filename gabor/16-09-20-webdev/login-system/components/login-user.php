<?php 
	session_start();
	
	if (isset($_POST['userName'])) {
		$requestedUser = $_POST['userName'];
		if ($requestedUser == "gabor") {
			$_SESSION['userId'] = "gabor";
			echo "ok";
		}
		echo "not ok";
	}
	
	echo "not ok";
	header('Location: ../index.php');

?>