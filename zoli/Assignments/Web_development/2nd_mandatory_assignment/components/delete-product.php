<?php

  //getting text from the json file
  $sProducts = file_get_contents ("products.json");
  //convert the string into a variable
  $aProducts = json_decode($sProducts);

  //get ID from URL
  $sDeleteId = $_GET["id"];


  for ($i=0; $i < count($aProducts); $i++) {
    if ($aProducts[$i]->id == $sDeleteId) {
      array_splice($aProducts, $i, 1);
      break;
    }
  }

  $sWriteToFile = json_encode($aProducts);
  //write the converted string into the file
  file_put_contents("products.json", $sWriteToFile);



?>
