<?php 
	// Init
	$action = $_GET['action'];
	$myFile = "messages.txt";
	
	// Identifying request
	switch ($action) {
		case "get":
			getMessages($myFile);
			break;
		case "send":
			sendMessages($myFile);
			break;
		default:
			unknownRequest();
			break;
	}

	// Request actions
	function sendMessages($myFile){
		// Composing new message
		$jMessage = new stdClass();
		$jMessage->from = "Gabor"; // $_GET['from'];
		$jMessage->date = "Today"; // $_GET['date'];
		$jMessage->to = "Everyone"; // $_GET['to'];
		$jMessage->message = $_GET['message'];

		// Update messages
		$sMessages = file_get_contents($myFile);
		$jMessages = json_decode($sMessages);
		array_push($jMessages, $jMessage);
		$sMessages = json_encode($jMessages);
		file_put_contents($myFile, $sMessages);

		// Response
		echo "Message succesfully sent!";
	}

	function getMessages($myFile){
		// Get messages, send as response
		$sMessages = file_get_contents($myFile);
		echo $sMessages;
	}

	function unknownRequest(){
		// Response
		echo "Unknown request. Try `get` or `send`";
	}
 ?>