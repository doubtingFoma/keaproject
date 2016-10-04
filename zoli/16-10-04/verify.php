<?php
	//get the verification-key of the user
	$sKey = $_GET['verification-key'];

	// get the contact from verification-id.txt
	$sData = file_get_contents("verification-id.txt");

	// convert into object
	$oData = json_decode( $sData );
	$sValidKey = $oData->validKey;
	$iStatus = $oData->verified;

	//check the verification status and the key
	if( $sKey == $sValidKey &&  $iStatus == 0 ){
		$oData->verified = 1;
		// convert the object to text
		$sFinalData = json_encode( $oData );
		// write back to the file
		file_put_contents( "verification-id.txt", $sFinalData );
		header("Location: verified.html");
		exit;
	}
	else if( $sKey == $sValidKey && $iStatus == 1 ){
		header("Location: already-verified.html");
		exit;
	}

	header("Location: not-verified.html");

?>
