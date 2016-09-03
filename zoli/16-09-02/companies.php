<?php

  //create a random value for each company (between 0 and 100)
  $RandomMicrosoft = rand(0, 100);
  $RandomTesla = rand(0, 100);
  $RandomGoogle = rand(0, 100);

  //uniqid() is a function that creates a unique hexadecimal ID number.
  //It should be treated as a string, because hexadecimal numbers
  //contain letters form A-F

  //create the "JSON objects" (in string) with the correct random numbers
  $sCompanies = '[
                  {"id":"' . uniqid() . '", "name":"Microsoft", "price":' . $RandomMicrosoft . ', "icon":"fa fa-windows"},
                  {"id":"' . uniqid() . '", "name":"Tesla", "price":' . $RandomTesla . ', "icon":"fa fa-bolt"},
                  {"id":"' . uniqid() . '", "name":"Google", "price":'. $RandomGoogle . ', "icon":"fa fa-google"}
                 ]';


  echo $sCompanies;
?>
