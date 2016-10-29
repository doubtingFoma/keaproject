<?php
  //you can fetch data from this site using another website.
  //you can replace the * with a URL to only allow requests
  //from a specific website. The * means, it will allow
  //every request you send.
  header('Access-Control-Allow-Origin: *');

  $sName = $_GET['name'];
  $sLastName = $_GET['lastName'];

  $jPerson = new stdClass(); //creating a new class/object
  $jPerson->name = $sName;
  $jPerson->lastName = $sLastName;

  $sPerson = json_encode($jPerson);
  echo $sPerson;

?>
