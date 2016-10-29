<?php 

	if (!isset($_GET['key']) || !isset($_GET['email'])) {
		echo "No `key` or `email` was given";
		header('Location: email_not_found.html');
		// You are not verified
	} else {
		$sKey = $_GET['key'];
		$sEmail = $_GET['email'];
		$sEmails = file_get_contents("verification_id.json");
		$jEmails = json_decode($sEmails);

		$bFound = false;
		$bVerified = false;
		$bCorrectKey = false;
		for ($i=0; $i < sizeof($jEmails); $i++) { 
			if ($jEmails[$i]->email == $sEmail) {
				$bFound = true;
				$bVerified = $jEmails[$i]->verified;
				$bCorrectKey = $sKey == $jEmails[$i]->key;
			}
		}

		if (!$bFound || !$bCorrectKey) {
			header('Location: email_not_found.html');
			exit();
		}

		if ($bFound && $bVerified) {
			header('Location: already_verified.html');
			exit();
		}

		if ($bFound && !$bVerified) {
			header('Location: verified.html');
			exit();
		}

	}

 ?>