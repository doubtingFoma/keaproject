<?php
  // this goes in save-company.php
  // get the name from the "address bar"
  // it is from AJAX via GET

  //getting text from the json file
  $sUsers = file_get_contents ("data1.json");
  //convert the string into a variable
  $aUsers = json_decode($sUsers);
  //create a new class for the users
  $jUser = new stdClass();

  //get firstname from the URL
  $sName = $_GET["name"];
  //get lastname from the URL
  $sLastName = $_GET["lastname"];

  //add a firstname and a lastname parameter to the jUser object
  $jUser->firstname = $sName;
  $jUser->lastname = $sLastName;

  //push the jUser object into the array that contains all users
  array_push($aUsers, $jUser);

  //convert the array into text again
  $sWriteToFile = json_encode($aUsers);

  //write the converted string into the file
  file_put_contents("data1.json", $sWriteToFile);


?>
