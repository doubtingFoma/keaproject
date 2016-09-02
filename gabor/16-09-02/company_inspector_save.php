<?php 
	/* Create new object from input */
	$jNewCompany = new stdClass();
	$jNewCompany->name = $_GET['companyName'];
	$jNewCompany->price = $_GET['companyPrice'];

	$sCompanies = file_get_contents("company_inspector.txt");
	$jCompanies = JSON_decode($sCompanies);

	array_push($jCompanies, $jNewCompany);
	$sCompanies = JSON_encode($jCompanies);

	file_put_contents("company_inspector.txt", $sCompanies);
	echo "Success!";
 ?>