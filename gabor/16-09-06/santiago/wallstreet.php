<?php 

	
	$aCompanies = [
	"http://mukkefabrikken.dk/plznohack/server.php",
	"http://holaola.dk/KEA/ajax/save-me.php",
	// "http://rasmus-seindal.dk/proxy/test-me.php",
	"http://johannes-gade.dk/test-me.php",
	"http://keasofiek.com/AJAX/test-me.php",
	// "http://vpp.comli.com/stocks/stocks.php",
	"http://gaborpinter.net/webapps/keaproject/get-stock/get-stock.php",
	"http://gradel.dk/kea/test-me.php",
	// "http://lynnphana.dk/test-me.php",
	"http://ecuanota.com/2016-fall-web-dev/test-me.php",
	"http://myfreedomain.altervista.org/06sept2016WebDev/test-me.php",
	"http://alexduxx.com/test-school/stock-file.php",
	"http://thao.dk/test-me.php",
	"http://nadiant.com/serverTest/serverTest.php",
	"http://particledesigns.dk/ralfpatric/server.php"
	];


	// Solution 1 - without protection	
	/*$ajCompanies = [];
	foreach($aCompanies as $sCompanyLink){
		// echo $sCompanyLink."<br/>";
		$sCompany = file_get_contents($sCompanyLink);
		// echo $sCompany."<br/>";
		$jCompany = json_decode($sCompany);
		// echo $jCompany->stockName."<br/>";
		// var_dump($jCompany);
		array_push($ajCompanies, $jCompany);
	}

	echo json_encode( $ajCompanies );*/

	$aVerifiedCompanyNames = [
		"Gabor",
		"Michael",
		"bing"
	];

	// Solution 2 - with protection
	$ajCompanies = [];
	foreach($aCompanies as $sCompanyLink){

		$sCompany = file_get_contents($sCompanyLink);

		if( json_decode($sCompany) == true ){
			$jCompany = json_decode($sCompany);

			for ($i=0; $i < sizeof($aVerifiedCompanyNames); $i++) { 
				if ($jCompany->stockName == $aVerifiedCompanyNames[$i]){
					$jCompany->verified = true;
				}
				# code...
			}

			array_push($ajCompanies, $jCompany);
			}
	}

	echo json_encode( $ajCompanies );

?>