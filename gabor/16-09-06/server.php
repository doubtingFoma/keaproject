<?php 
	// Identify Task
	$isTaskSet = isset($_GET['task']);
	if ($isTaskSet){
		// switch case
		$sTextNumber = $_GET['task'];

		// Identify task
		switch($sTextNumber){
			case "1":
				task1();
				break;
			case "3":
				task3();
				break;
			case "4":
				task4();
				break;
			default:
				wrongTask();
				break;
		}
	} else {
		wrongTask();
	}

	// Task 1
	function task1(){
		$isNameSet = isset($_GET['name']);
		if (!$isNameSet) {
			echo "You are not Gabor";
		} else {
			$sText = $_GET['name'];
			if ($sText !== "Gabor") {
				echo "You are not Gabor";
			}  else {
				$iRandomNumber = rand();
				echo $iRandomNumber;
			}
		}
	}

	function task3(){
		$content = file_get_contents("http://ecuanota.com/2016-fall-web-dev/test-me.php");
		echo $content;
	}

	function task4(){
		// $content = file_get_contents("http://ecuanota.com/2016-fall-web-dev/wallstreet.php");

		// Getting companies
		$aCompanyUrls = [
			"http://mukkefabrikken.dk/plznohack/server.php",
			"http://holaola.dk/KEA/ajax/save-me.php",
			//"http://rasmus-seindal.dk/proxy/test-me.php",
			"http://johannes-gade.dk/test-me.php",
			"http://keasofiek.com/AJAX/test-me.php",
			"http://vpp.comli.com/stocks/stocks.php",
			"http://gaborpinter.net/webapps/keaproject/get-stock/get-stock.php",
			"http://gradel.dk/kea/test-me.php",
			//"http://lynnphana.dk/test-me.php",
			"http://ecuanota.com/2016-fall-web-dev/test-me.php",
			"http://myfreedomain.altervista.org/06sept2016WebDev/test-me.php",
			"http://alexduxx.com/test-school/stock-file.php",
			"http://thao.dk/test-me.php",
			"http://nadiant.com/serverTest/serverTest.php",
			"http://particledesigns.dk/ralfpatric/server.php"
			];

		$aCompanies = [];

		// Iterating through URLs
		for ($i=0; $i < sizeof($aCompanyUrls); $i++) { 
			
			// Convert to JSON, add to array
			$sCompany = file_get_contents($aCompanyUrls[$i]);
			$jCompany = json_decode($sCompany);
			array_push($aCompanies, $jCompany);
		}

		// Convert array (json) to string and pass
		$sCompanies = json_encode($aCompanies);
		echo $sCompanies;
	}

	// Wrong task
	function wrongTask(){
		echo "You have provided a wrong task number or no task number at all.";
	}
	
 ?>