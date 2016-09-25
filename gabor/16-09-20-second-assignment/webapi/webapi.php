<?php
	include_once "../config/config.php";

	// 1. Handle request endpoint
	// 2. Request endpoint methods
	// 3. Send response

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

	///////////////////////////////////////////////////////////////////////////
	// 1. Handle request endpoint
	//////////////////////////////////////////////////////////////////////////
	$sRequest = $_GET[$config->sUrlVarRequest];
	switch ($sRequest) {
		
		// Login request
		case "login":
			loginUser($config);
			break;

		// Signup request
		case "signup":
			signupUser($config);
			break;

		// Undefined (bad) request
		default:
			sendResponse(400, null, "Unknown request type ('".$config->sUrlVarRequest."' parameter is invalid).");
			break;
	}

	///////////////////////////////////////////////////////////////////////////
	// 2. Request endpoint methods
	//////////////////////////////////////////////////////////////////////////
	function loginUser($config){
		// Validate request
		if (!isset($_GET['sUserEmail']) || !isset($_GET['sUserPassword'])) {
			sendResponse("400", null, "No 'sUserEmail' or 'sUserPassword' was provided.");
		}

		// Identify requested user
		$sUserEmail = $_GET['sUserEmail'];
		$sUserPassword = $_GET['sUserPassword'];

		// Get users
		$sUsersPath = "../" . $config->sDatabaseUsersPath;
		$sUsers = file_get_contents($sUsersPath);
		$aUsers = json_decode($sUsers);

		// Look for requested user
		for ($i=0; $i < sizeof($aUsers); $i++) { 
			
			// User found - set up user session
			if ($sUserEmail == $aUsers[$i]->userEmail && $sUserPassword == $aUsers[$i]->userPassword) {
				session_start();
				$_SESSION['userId'] = $aUsers[$i]->userName;
				$_SESSION['userRole'] = $aUsers[$i]->userRole;
				sendResponse(200, $aUsers[$i]);
			}
		}

		// Not found
		sendResponse(404, null, "User with this password cannot be found.");
	}

	function signupUser($config){
		// Validate request
		if (!isset($_GET['sUserName']) || !isset($_GET['sUserEmail']) || !isset($_GET['sUserPassword'])) {
			sendResponse("400", null, "No 'sUserEmail' or 'sUserPassword' or 'sUserName' was provided.");
		}

		// Identify requested registration object
		$sUserName = $_GET['sUserName'];
		$sUserEmail = $_GET['sUserEmail'];
		$sUserPassword = $_GET['sUserPassword'];

		// Get users
		$sUsersPath = "../" . $config->sDatabaseUsersPath;
		$sUsers = file_get_contents($sUsersPath);
		$aUsers = json_decode($sUsers);

		// Look for requested user
		for ($i=0; $i < sizeof($aUsers); $i++) { 
			
			// Email taken
			if ($sUserEmail == $aUsers[$i]->userEmail) {
				sendResponse(403, null, "E-mail address is taken.");
			}

			// User name taken
			if ($sUserName == $aUsers[$i]->userName) {
				sendResponse(403, null, "User name is taken.");
			}
		}

		// Create new user object
		$uUser = new stdClass();
		$uUser->userId = uniqid();
		$uUser->userName = $sUserName;
		$uUser->userEmail = $sUserEmail;
		$uUser->userRole = "costumer";
		$uUser->userPassword = $sUserPassword;

		// Add user object to array, save it to file
		array_push($aUsers, $uUser);
		$sUsers = json_encode($aUsers);
		file_put_contents($sUsersPath, $sUsers);
		
		sendResponse(200, null);
	}


	///////////////////////////////////////////////////////////////////////////
	// 3. Send response
	//////////////////////////////////////////////////////////////////////////
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