<?php
  //This will start a new session
  session_start();

  //echoing the name parameter of the session, but without first giving a value
  //to it. We actually read the name parameter that was created in the
  //session test file
  echo $_SESSION["name"];


?>
