<?php
  //getting text from the json file
  $sCompanies = file_get_contents ("company-inspector-data.json");
  //convert the string into a variable
  $aCompanies = json_decode($sCompanies);

  //search phrase we look for in the array
  $sSearch = $_GET["search"];

  //the temporary storage array for the search results (they are simple strings)
  $aSearchResult = [];

  //look for the phrase in every element of the json file
  for ($i=0; $i < count($aCompanies); $i++) {
    //stripos function is the string search function (this is CASE-INSENSITIVE)
    $bFound = stripos($aCompanies[$i]->name, $sSearch);
    //stripos returns with a FALSE if it didn't find anything, otherwise
    //returns with the position of the first character that was found.
    //In our case, we want to see if it found anything, so we check if the returns
    //value is FALSE or not.
    if ( $bFound !== FALSE ) {
      $sFound =  $aCompanies[$i]->name;
      //we push the name of the company we found to the array
      array_push($aSearchResult, $sFound);
    }
  }
  //convert the array to string
  $sSearchResult = json_encode($aSearchResult);
  //pass the string to the client
  echo $sSearchResult;

?>
