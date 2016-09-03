<?php
  //fetch data from the json object
  $sCompanies = file_get_contents ("company-data.json");
  //convert the string we got to an array (and json elements)
  $aCompanies = json_decode($sCompanies);

  //cycle through every item, and generate a price value for every company
  for ($i=0; $i < count($aCompanies); $i++) {
    $aCompanies[$i]->price = rand(0, 100);
  }

  // convert the array back to string
  $sCompaniesEcho = json_encode($aCompanies);
  // echo/pass the string to the client(s)
  echo $sCompaniesEcho;

?>
