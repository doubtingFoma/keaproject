<?php 
	/* Get source */
	$sNames = file_get_contents("names.txt");
	$jNames = JSON_decode($sNames);
	
	/* Create json if can't decode */
	if ((json_last_error() == 4)) {

		/* Get file content as string, explode the rows*/
		$jNames = [];
		$jNameRows = explode("\r\n", $sNames);

		/* Explode a row into words, create new object*/
		for ($i=0; $i < sizeof($jNameRows); $i++) { 
			$jNamePartials = explode(" ", $jNameRows[$i]);
			
			$jCurrentName = new stdClass();
			$jCurrentName->firstname = $jNamePartials[0];
			$jCurrentName->lastname = $jNamePartials[1];

			/* Push it to names */
			array_push($jNames, $jCurrentName);
		}
	}

	/* Get input and create new object */
	$name = new stdClass();
	$name->firstname = $_GET['firstname'];
	$name->lastname = $_GET['lastname'];

	/* Push new object */
	array_push($jNames, $name);

	/* Save Data*/
	$sNames = JSON_encode($jNames);
	file_put_contents("names.txt", $sNames);
 ?>