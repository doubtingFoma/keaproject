<?php
  // this goes in save-company.php
  // get the name from the "address bar"
  // it is from AJAX via GET

  //getting text from the json file
  $sCompanies = file_get_contents ("company-inspector-data.json");
  //convert the string into a variable
  $aCompanies = json_decode($sCompanies);
  //create a new class for the users
  $jCompany = new stdClass();

  //get firstname from the URL
  $sName = $_GET["name"];
  //get price from the URL
  $sPrice = $_GET["price"];

  $iPrice = floatval($sPrice);

  //add a firstname and a price parameter to the jCompany object
  $jCompany->name = $sName;
  $jCompany->price = $sPrice;

  //push the jCompany object into the array that contains all users
  array_push($aCompanies, $jCompany);

  //convert the array into text again
  $sWriteToFile = json_encode($aCompanies);

  //write the converted string into the file
  file_put_contents("company-inspector-data.json", $sWriteToFile);

  echo "Success";
?>
