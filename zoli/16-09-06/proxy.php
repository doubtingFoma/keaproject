<?php


  $sUrl = $_GET['url'];

  //fetch data from Santiago's site
//  echo file_get_contents("http://ecuanota.com/2016-fall-web-dev/test-me.php");


  echo file_get_contents($sUrl);

?>
