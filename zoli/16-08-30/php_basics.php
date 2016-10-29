<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>PHP Basics</title>
    <meta name="description" content="DESCRIPTION">
    <style>
      .testHi{
        color: #ff0000;
      }
      .testName{
        color: #0025ff;
      }
      .testLastName{
        color: #ffbf00;
      }
    </style>

  </head>

  <body>
    <?php
//----------------------------------------------------------------------------//
      echo "Hello world";
      echo "<br>";

      //creating a variable
      $sName = "Zoltán";
      $sLastName = "Fraknói";

      //writing the variables on the html page
      echo $sName." ".$sLastName;

      //echoing a line break
      echo "<br><br>";

      //you ALWAYS have to put the $ before every variable
      $iYear = 2016;

      //In this case we pass the value of $iYear to $iFinalYear and THEN increase the value of $iYear!!
      $iFinalYear = $iYear++;  // $iFinalYear will be 2016 and NOT 2017

      //just reset to the default
      $iYear = 2016;

      //In this case we increase the value of $iYear and THEN make $iFinalYear equal to $iYear!!
      $iFinalYear = ++$iYear;  // $iFinalYear will be 2017 and NOT 2016

      echo $iFinalYear;

      echo "<br><br>";
//--------------------------------EXERCISE------------------------------------//

    /* Create a PHP script that chekcs email, phone, and password && || */

      $sPhone = "A";
      $sEmail = "B";
      $sPassword = "asd";

      //checking the user name OR the phone, AND the password
      //phone and email doesn't have to match at the same time, if
      //at least one of them matches, it will be fine. But password have
      //to match at any time
      if ( ($sPhone == "A" || $sEmail == "B") && $sPassword == "asd" ) {
        echo 'SUCCESS';
      } else {
        echo 'ERROR';
      }

      echo "<br><br>";
//---------------------------------EXERCISE-----------------------------------//
      // HI NAME AND LAST NAME IN DIFFERENT COLORS AND FROM PHP VARIABLES

      $sName = "Zoltán";
      $sLastName = "Fraknói";
      $sGreeting = "Hello";

    ?>

    <?php
      //double quotes can handle variables (slower performance)
      echo "<div>Hi $sName</div>";
      //single quotes cannot handle variables (faster performance, but will only echo the text you see here)
      echo '<div>Hi $sName</div>';
      echo "<br>";

      //backslash allows the next character to be anything, even double quotes without closing the main echo's double quotes
      echo "<span class=\"test\">Hello</span> my name is $sName and my last name is $sLastName</div>";
      echo "<br>";

     ?>

     <?php
      //arrays

      $aNew = ["A", "B"]; // this is relevant only from PHP 5.4
      $aOld = array("A", "B"); //this is the original PHP array syntax

     ?>


    <span class="testHi"><?php echo $sGreeting; ?></span>
    <span class="testName"><?php echo $sName; ?></span>
    <span class="testLastName"><?php echo $sLastName; ?></span>
    <br><br>


    <?php
      $aLetters = ["A", "B", "C", "D"];
      //add a new element to the array (same as javascript push)
      array_push($aLetters, "E");

      //for loop
      for ($i=0; $i < count($aLetters); $i++) {
        echo "<div>$aLetters[$i]</div>";
      }
      //write out the content of the array
      var_dump($aLetters);

      echo "<br><br>";

    ?>

    <?php

      $sTest = "Hello, how are you";
      //replacing in a string
      //First parameter is the replaced text, the second is what
      //we want to be in the new text, the third is the variable we are replacing in
      echo str_replace("you", "you?", $sTest);

      echo "<br><br>";

      $sName = "A";
      $sLastName = "B";
      $sTest = "Hi, my name is X and my last name is Y.";
/*
      //we replace X with the $sName variable and store it in the $sTest
      $sTest = str_replace("X", $sName, $sTest);
      //we replace Y with the $sLastName variable and store it in the $sTest
      $sTest = str_replace("Y", $sLastName, $sTest);
*/
      //this is a simpler way to replace multiple elements (and store it in the $sTest variable)
      $sTest = str_replace(array("X","Y"),array($sName,$sLastName), $sTest);

      //Show $sTest
      echo $sTest;

      echo "<br><br>";
    ?>

    <?php
      //JSON and PHP

      //this is a string that's formatted as a JSON object
      $sPerson = '{"name": "Zoltán", "lastname":"Fraknói"}';

      //convert the string into a JSON object, and store it in the $jPerson
      $jPerson = json_decode($sPerson);
      //echo the individual values of the object
      echo $jPerson->name . " " . $jPerson->lastname;

      echo "<br><br>";

//--------------------------------EXERCISE------------------------------------//
    /*
      Create a string that looks like an array containing 3 companies.
      Show the name of each company in a different div.
    */

      //a string which is formatted like an array that contains objects
      $sCompanies = '[{"name":"Apple", "id":1}, {"name":"Bapple", "id":2}, {"name":"Capple", "id":3}]';
      //convert the string into an array
      $aCompanies = json_decode($sCompanies);

      for ($i=0; $i < count($aCompanies); $i++) {
        echo "<div>" . $aCompanies[$i]->name . " " . $aCompanies[$i]->id . "</div>";
      }

      echo "<br>";
//----------------------------------------------------------------------------//
      //importing data from the data.txt
      $sImport = file_get_contents("data.txt");
      //convert it to an array
      $aImport = json_decode($sImport);
      var_dump($aImport);
      echo "<br>";
      //another way to write the content of the array
      print_r($aImport);

      echo "<br><br>";

      //foreach loop
      foreach ($aImport as $jPerson) {
        echo $jPerson->name;
      }

    ?>



    <!-- Pass a variable from PHP to Javascript -->
    <?php
      $sName = "A"
    ?>
    <script>
      var name = "<?php echo $sName; ?>";
      console.log(name);
    </script>

    <!-- Pass an object from PHP to Javascript -->
    <?php
      $sObject = '{"name":"A", "ID":2}';
      $jObject = json_decode($sObject);
    ?>
    <script>
      var jObject = JSON.parse('<?php echo $sObject ?>');
      console.log(jObject);
    </script>



  </body>

</html>
