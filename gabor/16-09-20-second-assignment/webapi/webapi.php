<?php
	include_once "../config/config.php";

	// The webapi handles requests, and sends response objects.
	// Response object:
	//  - Status code
	//  - Package (can be null)
	//  - Status message
	// Status codes:
	// 200 - OK
	// 400 - Bad request - request not ok
	// 403 - Forbidden - request ok, access not ok
	// 404 - Not found - request ok, access ok, but information not found
	
	// Handle unset request endpoint
	if (!isset($_GET[$config->sUrlVarRequest])) {
		sendResponse(400, null, "Missing '".$config->sUrlVarRequest."' parameter.");
	}

	// Handle request endpoint
	$sRequest = $_GET[$config->sUrlVarRequest];
	switch ($sRequest) {
		
		// Login request
		case "login":
			loginUser($config);
			break;

		// Signup request
		case "signup":
			signupUser();
			break;

		// Undefined (bad) request
		default:
			sendResponse(400, null, "Unknown request type ('".$config->sUrlVarRequest."' parameter is invalid).");
			break;
	}

	function loginUser($config){
		if (!isset($_GET['sUserName']) || !isset($_GET['sUserPassword'])) {
			sendResponse("400", null, "No 'sUserName' or 'sUserPassword' was provided.");
		}

		// Identify requested user
		$sUserName = $_GET['sUserName'];
		$sUserPassword = $_GET['sUserPassword'];

		// Get users
		$sUsersPath = "../" . $config->sDatabaseUsersPath;
		$sUsers = file_get_contents($sUsersPath);
		$aUsers = json_decode($sUsers);

		// Look for requested user
		for ($i=0; $i < sizeof($aUsers); $i++) { 
			
			// User found - set up user session
			if ($sUserName == $aUsers[$i]->userName && $sUserPassword == $aUsers[$i]->userPassword) {
				session_start();
				$_SESSION['userId'] = $aUsers[$i]->userName;
				$_SESSION['userRole'] = $aUsers[$i]->userRole;
				sendResponse(200, $aUsers[$i]);
			}
		}

		// Not found
		sendResponse(404, null, "User with this password cannot be found.");
	}

	// Expects a status code (number) and an object, message is optional. Outputs them as a response object.
	function sendResponse($iStatusCode, $jPackage, $sMessage = "No response message was provided."){
		$jResponseObject = new stdClass();
		$jResponseObject->iStatusCode = $iStatusCode;
		$jResponseObject->jPackage = $jPackage;
		$jResponseObject->sMessage = $sMessage;
		$sResponseObject = json_encode($jResponseObject);
		echo $sResponseObject;
		exit();
	}


?>