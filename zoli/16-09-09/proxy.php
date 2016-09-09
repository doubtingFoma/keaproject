<?php

  //yes, there is a company_data.json, I used it for testing

  $CompanySheet = $_GET["spreadsheet"];
  $companies = file_get_contents( $CompanySheet );
  echo $companies;

//https://spreadsheets.google.com/feeds/list/1rFcllNZj2nxRHwvqHeDLLma3-uC-2soFFClqbQkSv_A/1/public/full?alt=json
?>
