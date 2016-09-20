<?php
  //This will start a new session
  session_start();

  //user sends the username, the sever saves that into the session
  $_SESSION["name"] = "Session name";

  //echoing the name parameter of the session
  echo $_SESSION["name"];


?>
