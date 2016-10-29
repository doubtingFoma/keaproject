<?php

  //getting text from the json file
  $sProducts = file_get_contents ("products.json");
  //convert the string into a variable
  $aProducts = json_decode($sProducts);
  //create a new class for the products
  $jProduct = new stdClass();
  //get ID from URL
  $sId = $_GET["id"];
  //get name from the URL
  $sName = $_GET["name"];
  //get price from the URL
  $sPrice = $_GET["price"];
  //add a name and a price parameter to the jProduct object
  $jProduct->id = $sId;
  $jProduct->name = $sName;
  $jProduct->price = floatval($sPrice);
  //push the jProduct object into the array that contains all products
  array_push($aProducts, $jProduct);
  //convert the array into text again
  $sWriteToFile = json_encode($aProducts);
  //write the converted string into the file
  file_put_contents("products.json", $sWriteToFile);


?>
