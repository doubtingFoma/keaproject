<?php

  $aCompanies = [
  "http://mukkefabrikken.dk/plznohack/server.php",
  "http://holaola.dk/KEA/ajax/save-me.php",
  //"http://rasmus-seindal.dk/proxy/test-me.php",
  "http://johannes-gade.dk/test-me.php",
  "http://keasofiek.com/AJAX/test-me.php",
  //"http://vpp.comli.com/stocks/stocks.php",
  "http://gaborpinter.net/webapps/keaproject/get-stock/get-stock.php",
  "http://gradel.dk/kea/test-me.php",
  //"http://lynnphana.dk/test-me.php",
  "http://ecuanota.com/2016-fall-web-dev/test-me.php",
  "http://myfreedomain.altervista.org/06sept2016WebDev/test-me.php",
  "http://alexduxx.com/test-school/stock-file.php",
  "http://thao.dk/test-me.php",
  "http://nadiant.com/serverTest/serverTest.php",
  "http://particledesigns.dk/ralfpatric/server.php"
  ];

  $aSendCompanies = [];

  for ($i=0; $i < count($aCompanies); $i++) {
    $sData = file_get_contents($aCompanies[$i]);
    $jData = json_decode($sData);
    array_push($aSendCompanies, $jData);
  }

  $sSendCompanies = json_encode($aSendCompanies);
  echo $sSendCompanies;



?>
