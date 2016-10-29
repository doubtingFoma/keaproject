<?php 
	
	$iRandomNumber1 = rand(0,1000);
	$iRandomNumber2 = rand(0,1000);
	$iRandomNumber3 = rand(0,1000);

	$uniqid1 = uniqid();
	$uniqid2 = uniqid();
	$uniqid3 = uniqid();

	$jCompanies = '[
		{"id": "'. $uniqid1 .'", "name": "Microsoft", "price": '. $iRandomNumber1 .', "icon": "fa-windows"},
		{"id": "'. $uniqid2 .'", "name": "Google", "price": '. $iRandomNumber2 .', "icon": "fa-google"},
		{"id": "'. $uniqid3 .'", "name": "Apple", "price": '. $iRandomNumber3 .', "icon": "fa-apple"}
		]';
	echo $jCompanies;
 ?>