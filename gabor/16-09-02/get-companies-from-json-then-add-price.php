<?php 
	$sCompanies = file_get_contents('companies.json');
	$jCompanies = json_decode($sCompanies);

	foreach ($jCompanies as &$jCompany) {
	    $jCompany -> price = rand(0, 10000);
	}

	$sCompanies = json_encode($jCompanies);
	echo $sCompanies;
 ?>