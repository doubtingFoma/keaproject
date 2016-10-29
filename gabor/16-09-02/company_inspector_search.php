<?php 
	/* Create new object from input */
	// $jNewCompany = new stdClass();
	// $jNewCompany->price = $_GET['companyPrice'];

	$sCompanies = file_get_contents("company_inspector.txt");
	$jCompanies = JSON_decode($sCompanies);



	$sCompanyName = $_GET['companyName'];
	$aCompaniesFound = [];

	for ($i=0; $i < sizeof($jCompanies); $i++) { 

		if (strpos($jCompanies[$i]->name, $sCompanyName) !== false) {
			array_push($aCompaniesFound, $jCompanies[$i]);
		};
	}

	// array_push($jCompanies, $jNewCompany);
	$sCompaniesFound = JSON_encode($aCompaniesFound);

	// file_put_contents("company_inspector.txt", $sCompanies);
	echo $sCompaniesFound;
 ?>