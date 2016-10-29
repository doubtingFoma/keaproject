<?php

  //getting text from the json file
  $sProducts = file_get_contents ("products.json");
  //convert the string into a variable
  $aProducts = json_decode($sProducts);

  //get the new ID, name and price from URL
  $sEditID = $_GET["id"];
  $sNewName = $_GET["name"];
  $sNewPrice = $_GET["price"];
  $fNewPrice = floatval($sNewPrice);

  //search for the item we want to edit
  for ($i=0; $i < count($aProducts); $i++) {
    if ($aProducts[$i]->id == $sEditID) {
      //change the name
      $aProducts[$i]->name = $sNewName;
      //change the price
      $aProducts[$i]->price = $fNewPrice;
      //exit the for loop to reduce calculation time
      break;
    }
  }
  
  $sWriteToFile = json_encode($aProducts);
  //write the converted string into the file
  file_put_contents("products.json", $sWriteToFile);







?>
