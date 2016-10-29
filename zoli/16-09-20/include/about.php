<?php
  //loading the header.php file (and its content), but if it doesn't exist,
  //the page won't load at all. Not even the html content below
  require "header.php";

  //Same as require, but it only loads the page once, regardless of HRTime\StopWatch
  //many times you write this line in the code!
  /* require_once "header.php"; */

  //For include and include_once see index.php!

?>
  <h1>About</h1>
  <p>
    peek-a-boo...This is the about page
  </p>
  <br>
  <a href="index.php">Index page</a>

</body>

</html>
