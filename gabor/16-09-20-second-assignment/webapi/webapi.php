<?php 
	// If request is not set, exit
	if (!isset($_GET['request'])) {
		echo "400"; // Bad request
		exit();
	}

	$sRequest = $_GET['request'];

	switch ($sRequest) {
		case "login":
			loginUser();
			break;
		default:
			break;
	}

	function loginUser(){
		if (isset($_GET['sUserName']) && isset($_GET['sUserPassword'])) {
			$sUserName = $_GET['sUserName'];
			$sUserPassword = $_GET['sUserPassword'];
			
			if ($sUserName == "gabor" && $sUserPassword == "123") {
				echo "ok";
			} else {
				echo "not ok";
			}
		} else {
			echo "not ok";
		}
	}


?>