<?php
	include_once "../config/config.php";

	// 1. Handle request endpoint
	// 2. Request endpoint methods
	// 3. Send response

	// The webapi handles requests, and sends response objects back.
	// Response object contains:
	//  - Status code
	//  - Requested package (can be null)
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

		// Logout request
		case "logout":
			logoutUser($config);
			break;

		// Signup request
		case "signup":
			signupUser($config);
			break;

		// Get lit of users
		case "get-users":
			getUsers($config);
			break;

		// Get lit of companies
		case "get-companies":
			getCompanies($config);
			break;

		// Delete a company
		case "delete-company":
			deleteCompany($config);
			break;

		// Delete a company
		case "update-company":
			updateCompany($config);
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
		// Validate request, send back 400 if bad request
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

		// If loop ends without success -> Not found
		sendResponse(404, null, "User with this password cannot be found.");
	}

	function logoutUser($config){
		session_start();
		session_destroy();
		sendResponse(200, null);
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

		// Look for taken e-mail address or user name
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
		$uUser->userRole = "customer";
		$uUser->userPassword = $sUserPassword;
		$uUser->userRegDate = date("D M d, Y G:i");

		// Add user object to array, save it to file
		array_push($aUsers, $uUser);
		$sUsers = json_encode($aUsers);
		file_put_contents($sUsersPath, $sUsers);

		sendResponse(200, null);
	}

	function getUsers($config){
		
		session_start();
		// User is not logged in
		if (!isset($_SESSION['userRole'])){
			sendResponse(403, null, "Access forbidden. You need to log in.");
		}

		// User is not an admin
		if ($_SESSION['userRole'] !== 'admin') {
			sendResponse(403, null, "Access forbidden. Only admins can see the list of users.");
		}

		// Send list of users back
		$sUsersPath = "../" . $config->sDatabaseUsersPath;
		$sUsers = file_get_contents($sUsersPath);
		$aUsers = json_decode($sUsers);
		sendResponse(200, $aUsers);
	}

	function getCompanies($config){
		
		session_start();
		// User is not logged in
		if (!isset($_SESSION['userRole'])){
			sendResponse(403, null, "Access forbidden. You need to log in.");
		}

		// Send list of users back
		$sCompaniesPath = "../" . $config->sDatabaseCompaniesPath;
		$sCompanies = file_get_contents($sCompaniesPath);
		$aCompanies = json_decode($sCompanies);
		sendResponse(200, $aCompanies);
	}

	function deleteCompany($config){
		//If id is not set
		if (!isset($_GET['companyId'])) {
			sendResponse(400, null, "Company ID (`companyId`)was not set");
		}

		//If user is not logged in
		session_start();
		if (!isset($_SESSION['userRole'])){
			sendResponse(403, null, "Access forbidden. You need to log in.");
		}

		//If user is not admin
		if ($_SESSION['userRole'] !== 'admin') {
			sendResponse(403, null, "Access forbidden. You need to be an administrator.");
		}

		// Get companies
		$sCompaniesPath = "../" . $config->sDatabaseCompaniesPath;
		$sCompanies = file_get_contents($sCompaniesPath);
		$aCompanies = json_decode($sCompanies);

		$iCompanyId = $_GET["companyId"];

		// Look companies with given ID
		for ($i=0; $i < sizeof($aCompanies); $i++) { 
			
			// ID found
			if ($iCompanyId == $aCompanies[$i]->companyId) {
				
				// Delete
				array_splice($aCompanies, $i, 1);
				
				// Save
				$sCompanies = json_encode($aCompanies);
				$sCompaniesPath = "../" . $config->sDatabaseCompaniesPath;
				file_put_contents($sCompaniesPath, $sCompanies);

				// Send response
				sendResponse(200, null);
			}
		}

		// Company was not found
		sendResponse(404, null, "Company was not found with given id: " . $iCompanyId);
	}

	function updateCompany($config){
		//If required parameters are not set
		if (
			!isset($_GET['companyId']) || 
			!isset($_GET['companyName']) ||
			!isset($_GET['companyShares']) ||
			!isset($_GET['companySharePrice'])
			) {
			sendResponse(400, null, "One or more of the following parameters were not set: `companyId`, `companyName`, `companyShares`, `companySharePrice`");
		}

		//If user is not logged in
		session_start();
		if (!isset($_SESSION['userRole'])){
			sendResponse(403, null, "Access forbidden. You need to log in.");
		}

		//If user is not admin
		if ($_SESSION['userRole'] !== 'admin') {
			sendResponse(403, null, "Access forbidden. You need to be an administrator.");
		}

		// Get companies
		$sCompaniesPath = "../" . $config->sDatabaseCompaniesPath;
		$sCompanies = file_get_contents($sCompaniesPath);
		$aCompanies = json_decode($sCompanies);

		$iCompanyId = $_GET["companyId"];
		$sCompanyName = $_GET["companyName"];
		$sCompanyShares = $_GET["companyShares"];
		$sCompanySharePrice = $_GET["companySharePrice"];

		// Look companies with given ID
		for ($i=0; $i < sizeof($aCompanies); $i++) { 
			
			// ID found, update array, save it to file
			if ($iCompanyId == $aCompanies[$i]->companyId) {
			
				$aCompanies[$i]->companyName = $sCompanyName;
				$aCompanies[$i]->companyShares = $sCompanyShares;
				$aCompanies[$i]->companySharePrice = $sCompanySharePrice;

				$sCompanies = json_encode($aCompanies);
				file_put_contents($sCompaniesPath, $sCompanies);
				sendResponse(200, $aCompanies);
			}
		}

		sendResponse(404, null, "Company was found with this ID: " . $iCompanyId);
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
