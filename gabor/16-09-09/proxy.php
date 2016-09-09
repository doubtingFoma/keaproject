<?php 

	$url = $_GET['url'];
	
	$sCompanies = file_get_contents($url);

	echo $sCompanies;
 ?>