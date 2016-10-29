<?php 
	$sCompanies = file_get_contents('companies.json');
	// $obj = json_decode($sCompanies); // we don't need to convert it to JSON as we can only pass string
	echo $sCompanies;
 ?>